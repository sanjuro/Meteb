<?php

/**
 * FrontendClientForm form.
 *
 * @package    meteb
 * @subpackage form
 * @author     Shadley Wentzel
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class FrontendClientForm extends BasesfGuardUserForm
{
  public function configure()
  {
  	parent::configure();
	
    unset(
      $this['id'], $this['algorithm'],
      $this['first_name'], $this['last_name'],
      $this['salt'], $this['is_active'],
      $this['is_super_admin'], $this['last_login'],
      $this['created_at'], $this['updated_at'],
      $this['groups_list'], $this['permissions_list']
    );

	/**
	 * Embed UserProfile Form
	 */
	if(!$this->isNew()) 	
	{
		$userProfileObjs = $this->getObject()->getUserProfile()->execute(); 
	}else{
		$userProfileObjs = array();
	}
	
	if (count($userProfileObjs) < 1){
	      $userProfileObj = new UserProfile();  
	      $userProfileObjs[] = $userProfileObj;
	}
	
	$userProfilesForm = new sfForm();
	  
	$count = 0;    
	
  	if(!$this->isNew())
	{	
		foreach( $userProfileObjs as $key => $userProfileObj )
		{	 
			  $userProfilesForm->embedForm($key, new FrontendUserProfileForm( $userProfileObj ) );
	     
		}  
	}else{
		 $userProfilesForm->embedForm( 0, new FrontendUserProfileForm( $userProfileObj ) );
	}
	// embed the contacts forms
    $this->embedForm('userProfiles', $userProfilesForm);
    
  }

  public function bind(array $taintedValues = null, array $taintedFiles = null)
  {
	if ($this->isNew())
	{
    $userProfilesForm = new sfForm();
  
    foreach($taintedValues['userProfiles'] as $key => $new_occurrence)
    {
      $userProfileObj = new UserProfile();
      $userProfileObj->setsfGuardUser($this->getObject());  
      $userProfileObj_form = new FrontendUserProfileForm($userProfileObj);
	
      $userProfilesForm->embedForm( $key, $userProfileObj_form );
    }
	
    $this->embedForm('userProfiles', $userProfilesForm);
	}
	
	
    parent::bind($taintedValues, $taintedFiles);
  }
  
  public function updateObject($values = null)
  { 
    if (is_null($values))
    {
      $values = $this->values;
    }
    
    $values['username'] = $values['email_address'];
	
	$values = $this->processValues($values);
		 
	$this->object->fromArray($values);
	   	 
	$this->updateObjectEmbeddedForms($values);
	   	 
	return $this->object;	
  }
  
  protected function doSave($con = null)
  { 
    if (is_null($con))
    {
      $con = $this->getConnection();
    }    
    
    $this->updateObject();
	
    $this->object->save($con);      

    $sfGuardUserGroup = new sfGuardUserGroup();
	$sfGuardUserGroup->setUserId($this->object->getId());
	$sfGuardUserGroup->setGroupId(3);
	$sfGuardUserGroup->save();
	
   	
    $values['userProfiles'][0]['sfuser_id'] = $this->object->getId();
	    
    // embedded forms
   	parent::saveEmbeddedForms($con); 

  }
  
}
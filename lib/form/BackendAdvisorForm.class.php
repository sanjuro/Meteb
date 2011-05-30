<?php

/**
 * BackendAdvisorForm form.
 *
 * @package    meteb
 * @subpackage form
 * @author     Shadley Wentzel
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BackendAdvisorForm extends sfGuardUserForm
{
  public function configure()
  {
    parent::configure();
  	
  	if ($this->getOption("currentUser") instanceof sfUser && ($this->getOption("currentUser")))
	{
	    $currentUser = $this->getOption("currentUser");	    
	}
  
    unset(
      $this['id'], $this['algorithm'],
      $this['first_name'], $this['last_name'],
      $this['salt'], 
      $this['is_super_admin'], $this['last_login'],
      $this['created_at'], $this['updated_at'],
      $this['groups_list'], $this['permissions_list']
    );

	/**
	 * Embed UserProfile Form
	 */
	if(!$this->isNew()) 	
	{
		$userProfileObjs = $this->getObject()->getUserProfile(); 
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
			  $userProfilesForm->embedForm($key, new BackendAdvisorUserProfileForm( $userProfileObj, array('currentUser' => $currentUser) ) );
	     
		}  
	}else{
		 $userProfilesForm->embedForm( 0, new BackendAdvisorUserProfileForm( $userProfileObj, array('currentUser' => $currentUser) ) );
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


    if ($this->isNew())
    {
	    $sfGuardUserGroup = new sfGuardUserGroup();
		$sfGuardUserGroup->setUserId($this->object->getId());
		$sfGuardUserGroup->setGroupId(2);
		$sfGuardUserGroup->save();
    }
	

    $this->saveEmbeddedForms($con); 
  }
  
  public function saveEmbeddedForms($con = null, $forms = null)
  {
    if (null === $con)
    {
      $con = $this->getConnection();
    }

    if (null === $forms)
    {
      $forms = $this->embeddedForms;
    }

    foreach ($forms as $form)
    {
      if ($form instanceof sfFormObject)
      {

      	$form->saveEmbeddedForms($con);
      	$form->getObject()->setSfGuardUser($this->object);
        $form->getObject()->save($con);
      }
      else
      {
        $this->saveEmbeddedForms($con, $form->getEmbeddedForms());
      }
    }
  }
  
}
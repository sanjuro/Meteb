<?php

/**
 * FrontendClientForm form.
 *
 * @package    meteb
 * @subpackage form
 * @author     Shadley Wentzel
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class FrontendGuyForm extends BasesfGuardUserForm
{
  public function configure()
  {
  	parent::configure();
	
    $this->embedRelation('UserProfiles');
    
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
    
    $values['first_name'] = $values['userProfiles'][0]['name'];
    
    $values['last_name'] = $values['userProfiles'][0]['surname'];
	
	$values = $this->processValues($values);
		 
	$this->object->fromArray($values);
	
    // $values['userProfiles'][0]['sfuser_id'] = $this->object->getId();
	   	 
	// $this->updateObjectEmbeddedForms($values);
	   	 
	// return $this->object;

	 parent::updateObject();
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
	
   		    
    // embedded forms
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
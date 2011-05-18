<?php

/**
 * Client form.
 *
 * @package    meteb
 * @subpackage form
 * @author     Shadley Wentzel
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class FrontendAdvisorForm extends BaseUserProfileForm
{
  public $sfGuardUser;
	
  public function configure()
  {
  	parent::configure();
  	
	$this->embedRelation('sfGuardUser');
	
    if ($this->getOption("sfGuardUser") instanceof sfGuardUser)
	{
	    $this->sfGuardUser = $this->getOption("sfGuardUser");
	}
  	
    unset(
      $this['id'], $this['algorithm'],$this['user_profile_id'],
      $this['first_name'], $this['last_name'],
      $this['salt'], $this['is_active'],
      $this['is_super_admin'], $this['last_login'],
      $this['created_at'], $this['updated_at'],
      $this['groups_list'], $this['permissions_list']
    );
    
  }
  
  public function updateObject($values = null)
  { 
    if (is_null($values))
    {
      $values = $this->values;
    }
    	
    $values['sfuser_id'] = $this->sfGuardUser->getId();
    
    $values['sfGuardUser']['username'] = $values['idnumber'];
    
    $values['sfGuardUser']['first_name'] = $values['name'];
    
    $values['sfGuardUser']['last_name'] = $values['surname'];
    
    parent::updateObject($values);
  }
  
  protected function doSave($con = null)
  { 
    if (is_null($con))
    {
      $con = $this->getConnection();
    }
    
    if ($this->sfGuardUser && $this->sfGuardUser->getId())  
    {	   
	    $this->object = $this->sfGuardUser;
    	
    	$sfGuardUserGroup = new sfGuardUserGroup();
	    $sfGuardUserGroup->setUserId($this->sfGuardUser->getId());
	    $sfGuardUserGroup->setGroupId(2);
	    $sfGuardUserGroup->save();

    }else {
   	 	$this->updateObject();
	
    	$this->object->save($con);      

    	$sfGuardUserGroup = new sfGuardUserGroup();
	    $sfGuardUserGroup->setUserId($this->sfGuardUser->getId());
	    $sfGuardUserGroup->setGroupId(2);
	    $sfGuardUserGroup->save();
	    
    	// embedded forms
   	 	parent::saveEmbeddedForms($con); 
    }
  }
}

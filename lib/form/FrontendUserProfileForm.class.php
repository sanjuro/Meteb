<?php

class FrontendUserProfileForm extends BaseUserProfileForm
{
  public $currentUser;
	
  public function configure()
  {
    parent::configure();
  	
  	if ($this->getOption("currentUser") instanceof sfUser && ($this->getOption("currentUser")))
	{
	    $currentUser = $this->getOption("currentUser");	    
	}
  	
  	unset(
      $this['user_profile_id'], $this['created_at'], $this['updated_at'],
      $this['status_id']
    );
    
    if (isset($currentUser) && ( $currentUser->hasGroup('administrator') || $currentUser->isSuperAdmin()) ){
	    $this->widgetSchema['parent_user_id'] = new sfWidgetFormChoice(
	     	array( 'label' => 'Parent', 'choices' => $this->getAvailibleParents()));
    }else{
    	$this->widgetSchema['parent_user_id'] = new sfWidgetFormInputHidden();
    	
    	$this->setDefault('parent_user_id', $this->currentUser->getGuardUser()->getId());
    }
     	
	$this->widgetSchema['dob'] = new sfWidgetFormJQueryDate();
	
	$this->widgetSchema['spousedob'] = new sfWidgetFormJQueryDate();

  }
  
  public function getAvailibleParents()
  {
	  $q = Doctrine_Query::create()
	      ->from('UserProfile up')
	      ->leftJoin('up.sfGuardUser sfgu')
	      ->leftJoin('sfgu.sfGuardUserGroup sfug')
	      ->where('sfug.group_id = 2');
	      
	  $choices = array();
	  
	  foreach($q->fetchArray() as $key => $parent){
	  	$choices[$key] = $parent['name'].' '.$parent['surname'];
	  }
	  	  
	  return $choices;
  }
}
?>
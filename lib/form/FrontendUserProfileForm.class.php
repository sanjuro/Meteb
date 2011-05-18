<?php

class FrontendUserProfileForm extends BaseUserProfileForm
{
  public function configure()
  {
    unset(
      $this['user_profile_id'], $this['created_at'], $this['updated_at']
    );
    
     $this->widgetSchema['parent_user_profile_id'] = new sfWidgetFormChoice(
     	array( 'label' => 'Parent', 'choices' => $this->getAvailibleParents()));
     	
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
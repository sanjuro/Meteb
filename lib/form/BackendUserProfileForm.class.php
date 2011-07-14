<?php
/**
 * BackendUserProfileForm form, this extends the base user profile form
 * also changes some labels and adds the Jquery date picker
 *
 * @package    meteb
 * @subpackage form
 * @author     Shadley Wentzel
 * @version    GIT: 
 */
class BackendUserProfileForm extends BaseUserProfileForm
{
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
   
    if (isset($currentUser) && !$this->object->getSfGuardUser()->hasGroup('administrator') 
    	&& ( $currentUser->hasGroup('administrator') || $currentUser->isSuperAdmin()) ){    
	
	    $this->widgetSchema['parent_user_id'] = new sfWidgetFormChoice(
	     	array( 'label' => 'Parent', 'choices' => $this->getAvailibleParents()));
	     	
	    $this->validatorSchema['parent_user_id'] = new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ParentUser'), 'required' => false));
	    
    }else{
    	$this->widgetSchema['parent_user_id'] = new sfWidgetFormInputHidden();
    	
    	$this->validatorSchema['parent_user_id'] = new sfValidatorString(array('min_length' => 1));
    	
    	if($this->isNew()){
    		$this->setDefault('parent_user_id', $currentUser->getGuardUser()->getId());
    	}else{
    		$this->setDefault('parent_user_id', $this->object->getParentUserId());
    	}
    } 
    
    $this->widgetSchema['postaladdress'] = new sfWidgetFormInputText( array( 'label' => 'Postal Address'));
    
    $this->widgetSchema['streetaddress'] = new sfWidgetFormInputText( array( 'label' => 'Street Address'));
    	
	$this->widgetSchema['dob'] = new sfWidgetFormDateJQueryUI(
			array("label" => "Date of Birth", "change_month" => true, "change_year" => true));
	
	$this->widgetSchema['spouse_dob'] = new sfWidgetFormDateJQueryUI(
			array("label" => "Spouse Date of Birth", "change_month" => true, "change_year" => true));
			
	$this->validatorSchema['spouse_name'] = new sfValidatorString(array('required' => false));
	
	$this->validatorSchema['spouse_surname'] = new sfValidatorString(array('required' => false));
	
	$this->validatorSchema['spouse_dob'] = new sfValidatorString(array('required' => false));
	
	$this->validatorSchema['spouseidnumber'] = new sfValidatorString(array('required' => false));
	
	$this->validatorSchema['spouse_gender_id'] = new sfValidatorString(array('required' => false));
			
    // Only check if this is a new user being added
    if($this->isNew()){
	    $this->validatorSchema->setPostValidator(
	      new sfValidatorAnd(array(
	        new sfValidatorDoctrineUnique(array('model' => 'UserProfile', 'column' => array('idnumber'))),
	      ))
	    );
    }
	
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
	  	$choices[$parent['id']] = $parent['name'].' '.$parent['surname'];
	  }
	  	  
	  return $choices;
  }
}
?>
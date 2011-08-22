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
  	$years = range(date('Y') - 90, date('Y')); 
  	
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
    
    $this->widgetSchema['idnumber'] = new sfWidgetFormInputText(array('label' => 'ID Number'), array('size' => '50'));
    
	$this->widgetSchema['dob'] = new sfWidgetFormDate(
			array("label" => "Date of Birth", "format" => "%day%/%month%/%year%", 'years' => array_combine($years, $years)) );
	
	$this->widgetSchema['spouse_dob'] = new sfWidgetFormDate(
			array("label" => "Spouse Date Date of Birth", "format" => "%day%/%month%/%year%", 'years' => array_combine($years, $years)) );
			
	$this->widgetSchema['spouse_gender_id'] = new sfWidgetFormDoctrineChoice(
	     	array( 'model' => 'Gender',  'label' => 'Spouse Gender', 'add_empty' => "Select a gender"), array ( ));  
	
    $this->widgetSchema['postaladdress'] = new sfWidgetFormInputText(array('label' => 'Postal Address'), array('size' => '50'));
    
    $this->widgetSchema['streetaddress'] = new sfWidgetFormInputText(array('label' => 'Street Address'), array('size' => '50'));		

    $this->widgetSchema['spouseidnumber'] = new sfWidgetFormInputText(array('label' => 'Spouse ID Number'), array('size' => '50'));
	
    $this->widgetSchema['spouse_name'] = new sfWidgetFormInputText(array('label' => 'Spouse Name'), array('size' => '25'));
    
    $this->widgetSchema['spouse_surname'] = new sfWidgetFormInputText(array('label' => 'Spouse Surname'), array('size' => '25'));    
    
			
	$this->validatorSchema['spouse_name'] = new sfValidatorString(array('required' => false));
	
	$this->validatorSchema['spouse_surname'] = new sfValidatorString(array('required' => false));
	
	$this->validatorSchema['spouse_dob'] = new sfValidatorString(array('required' => false));
	
	$this->validatorSchema['spouseidnumber'] = new sfValidatorString(array('required' => false));
	
			
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
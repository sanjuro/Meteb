<?php
/**
 * BackendUserProfileForm form.
 *
 * @package    meteb
 * @subpackage form
 * @author     Shadley Wentzel
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BackendAdvisorUserProfileForm extends BaseUserProfileForm
{
  public $currentUser;
	
  public function configure()
  {
  	$years = range(date('Y') - 90, date('Y'));   	
  	
    parent::configure();
  	
  	if ($this->getOption("currentUser") instanceof sfUser && ($this->getOption("currentUser")))
	{
	    $this->currentUser = $this->getOption("currentUser");	    
	}
 
    	unset(
      $this['user_profile_id'], $this['created_at'], $this['updated_at'],
      $this['status_id'], $this['spouseidnumber'], $this['spouse_dob'], 
      $this['spouse_gender_id'], $this['spouse_name'], $this['spouse_surname']
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
    		$this->setDefault('parent_user_id', $this->currentUser->getGuardUser()->getId());
    	}else{
    		$this->setDefault('parent_user_id', $this->object->getParentUserId());
    	}
    } 
    
    $this->widgetSchema['idnumber'] = new sfWidgetFormInputText(array('label' => 'ID Number'), array('size' => '50'));
    
	$this->widgetSchema['dob'] = new sfWidgetFormDate(
			array("label" => "Date of Birth", "format" => "%day%/%month%/%year%", 'years' => array_combine($years, $years)) );
			
	$this->widgetSchema['gender_id'] = new sfWidgetFormDoctrineChoice(
	     	array( 'model' => 'Gender',  'label' => 'Gender', 'add_empty' => "Select a gender"), array ( ));  
		
    $this->widgetSchema['postaladdress'] = new sfWidgetFormInputText(array('label' => 'Postal Address'), array('size' => '50'));
    
    $this->widgetSchema['streetaddress'] = new sfWidgetFormInputText(array('label' => 'Street Address'), array('size' => '50'));		
    
			
	$this->validatorSchema['gender_id'] = new sfValidatorDoctrineChoice(array('multiple' => false, 'model' => 'Gender'));
    	
	
	$this->validatorSchema['postaladdress'] = new sfValidatorString(array('required' => false));
	
	$this->validatorSchema['streetaddress'] = new sfValidatorString(array('required' => false));
	
	$this->validatorSchema['mobile'] = new sfValidatorString(array('required' => false));
	
	$this->validatorSchema['fax'] = new sfValidatorString(array('required' => false));	
	
	$this->validatorSchema['company'] = new sfValidatorString(array('required' => false));
	    
	
    // Only check if this is a new user being added
    if($this->isNew()){
	    $this->validatorSchema->setPostValidator(
	      new sfValidatorAnd(array(
	        new sfValidatorDoctrineUnique(array('model' => 'UserProfile', 'column' => array('idnumber'))),
	      ))
	    );
    }
	
  }
  
  public function updateObject($values = null)
  { 
    if (is_null($values))
    {
      $values = $this->values;
    }
    
    $values['parent_user_id'] =  $this->currentUser->getGuardUser()->getId();

	$values = $this->processValues($values);
	
    $this->doUpdateObject($values);

    // embedded forms
    $this->updateObjectEmbeddedForms($values);

    return $this->getObject();
  }
  
  public function getAvailibleParents()
  {
	  $q = Doctrine_Query::create()
	      ->from('UserProfile up')
	      ->leftJoin('up.sfGuardUser sfgu')
	      ->leftJoin('sfgu.sfGuardUserGroup sfug')
	      ->where('sfug.group_id = 1');
	      
	  $choices = array();
	  
	  foreach($q->fetchArray() as $key => $parent){
	  	$choices[$parent['id']] = $parent['name'].' '.$parent['surname'];
	  }
	  	  
	  return $choices;
  }
}
?>
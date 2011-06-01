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
    parent::configure();
  	
  	if ($this->getOption("currentUser") instanceof sfUser && ($this->getOption("currentUser")))
	{
	    $this->currentUser = $this->getOption("currentUser");	    
	}
  	
  	unset(
      $this['user_profile_id'], $this['created_at'], $this['updated_at'],
      $this['spouse_name'], $this['spouse_surname'], $this['spouseidnumber'],
      $this['spouse_gender_id'], $this['spouse_dob']
    );
    
    if (isset($this->currentUser) && ( $this->currentUser->hasGroup('administrator') || $this->currentUser->isSuperAdmin()) ){
	    $this->widgetSchema['parent_user_id'] = new sfWidgetFormChoice(
	     	array( 'label' => 'Parent', 'choices' => $this->getAvailibleParents()));
	     	
	    $this->validatorSchema['parent_user_id'] = new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ParentUser'), 'required' => false));
    }else{
    	$this->widgetSchema['parent_user_id'] = new sfWidgetFormInputHidden();
    	
    	$this->setDefault('parent_user_id', $this->currentUser->getGuardUser()->getId());
    }
         	
    $this->setDefault('password', '');
    
	$this->widgetSchema['dob'] = new sfWidgetFormDateJQueryUI(array("change_month" => true, "change_year" => true));

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
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
      $this['spouse_gender_id'], $this['spouse_dob'], $this['parent_user_id']
    );
         	
	$this->widgetSchema['dob'] = new sfWidgetFormJQueryDate();
	
	$this->widgetSchema['spousedob'] = new sfWidgetFormJQueryDate();

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
}
?>
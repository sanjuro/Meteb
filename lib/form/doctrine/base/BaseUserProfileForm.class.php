<?php

/**
 * UserProfile form base class.
 *
 * @method UserProfile getObject() Returns the current form's model object
 *
 * @package    meteb
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUserProfileForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'sfuser_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'gender_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Gender'), 'add_empty' => true)),
      'spouse_gender_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SpouseGender'), 'add_empty' => true)),
      'status_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ClientStatus'), 'add_empty' => true)),
      'parent_user_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ParentUser'), 'add_empty' => true)),
      'fsp_license_number' => new sfWidgetFormInputText(),
      'title'              => new sfWidgetFormInputText(),
      'name'               => new sfWidgetFormInputText(),
      'surname'            => new sfWidgetFormInputText(),
      'dob'                => new sfWidgetFormDate(),
      'telephone'          => new sfWidgetFormInputText(),
      'mobile'             => new sfWidgetFormInputText(),
      'idnumber'           => new sfWidgetFormInputText(),
      'fax'                => new sfWidgetFormInputText(),
      'postaladdress'      => new sfWidgetFormInputText(),
      'streetaddress'      => new sfWidgetFormInputText(),
      'spouse_name'        => new sfWidgetFormInputText(),
      'spouse_surname'     => new sfWidgetFormInputText(),
      'spouse_dob'         => new sfWidgetFormDate(),
      'spouseidnumber'     => new sfWidgetFormInputText(),
      'company'            => new sfWidgetFormInputText(),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'sfuser_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'required' => false)),
      'gender_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Gender'), 'required' => false)),
      'spouse_gender_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SpouseGender'), 'required' => false)),
      'status_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ClientStatus'), 'required' => false)),
      'parent_user_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ParentUser'), 'required' => false)),
      'fsp_license_number' => new sfValidatorString(array('max_length' => 12, 'required' => false)),
      'title'              => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'name'               => new sfValidatorString(array('max_length' => 30)),
      'surname'            => new sfValidatorString(array('max_length' => 30)),
      'dob'                => new sfValidatorDate(),
      'telephone'          => new sfValidatorString(array('max_length' => 20)),
      'mobile'             => new sfValidatorString(array('max_length' => 20)),
      'idnumber'           => new sfValidatorString(array('max_length' => 20)),
      'fax'                => new sfValidatorString(array('max_length' => 20)),
      'postaladdress'      => new sfValidatorString(array('max_length' => 100)),
      'streetaddress'      => new sfValidatorString(array('max_length' => 100)),
      'spouse_name'        => new sfValidatorString(array('max_length' => 30)),
      'spouse_surname'     => new sfValidatorString(array('max_length' => 30)),
      'spouse_dob'         => new sfValidatorDate(array('required' => false)),
      'spouseidnumber'     => new sfValidatorString(array('max_length' => 20)),
      'company'            => new sfValidatorString(array('max_length' => 30)),
      'created_at'         => new sfValidatorDateTime(),
      'updated_at'         => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('user_profile[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'UserProfile';
  }

}

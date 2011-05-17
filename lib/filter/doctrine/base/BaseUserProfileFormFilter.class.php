<?php

/**
 * UserProfile filter form base class.
 *
 * @package    meteb
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseUserProfileFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'sfuser_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'gender_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Gender'), 'add_empty' => true)),
      'spouse_gender_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SpouseGender'), 'add_empty' => true)),
      'status_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ClientStatus'), 'add_empty' => true)),
      'user_profile_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Parent'), 'add_empty' => true)),
      'name'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'surname'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'dob'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'telephone'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'mobile'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'idnumber'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fax'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'postaladdress'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'streetaddress'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'spousename'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'spousesurname'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'spousedob'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'spouseidnumber'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'company'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'sfuser_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
      'gender_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Gender'), 'column' => 'id')),
      'spouse_gender_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SpouseGender'), 'column' => 'id')),
      'status_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ClientStatus'), 'column' => 'id')),
      'user_profile_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Parent'), 'column' => 'id')),
      'name'             => new sfValidatorPass(array('required' => false)),
      'surname'          => new sfValidatorPass(array('required' => false)),
      'dob'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'telephone'        => new sfValidatorPass(array('required' => false)),
      'mobile'           => new sfValidatorPass(array('required' => false)),
      'idnumber'         => new sfValidatorPass(array('required' => false)),
      'fax'              => new sfValidatorPass(array('required' => false)),
      'postaladdress'    => new sfValidatorPass(array('required' => false)),
      'streetaddress'    => new sfValidatorPass(array('required' => false)),
      'spousename'       => new sfValidatorPass(array('required' => false)),
      'spousesurname'    => new sfValidatorPass(array('required' => false)),
      'spousedob'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'spouseidnumber'   => new sfValidatorPass(array('required' => false)),
      'company'          => new sfValidatorPass(array('required' => false)),
      'created_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('user_profile_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'UserProfile';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'sfuser_id'        => 'ForeignKey',
      'gender_id'        => 'ForeignKey',
      'spouse_gender_id' => 'ForeignKey',
      'status_id'        => 'ForeignKey',
      'user_profile_id'  => 'ForeignKey',
      'name'             => 'Text',
      'surname'          => 'Text',
      'dob'              => 'Date',
      'telephone'        => 'Text',
      'mobile'           => 'Text',
      'idnumber'         => 'Text',
      'fax'              => 'Text',
      'postaladdress'    => 'Text',
      'streetaddress'    => 'Text',
      'spousename'       => 'Text',
      'spousesurname'    => 'Text',
      'spousedob'        => 'Date',
      'spouseidnumber'   => 'Text',
      'company'          => 'Text',
      'created_at'       => 'Date',
      'updated_at'       => 'Date',
    );
  }
}

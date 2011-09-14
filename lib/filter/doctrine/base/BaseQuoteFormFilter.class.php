<?php

/**
 * Quote filter form base class.
 *
 * @package    meteb
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseQuoteFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'client_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Client'), 'add_empty' => true)),
      'quote_type_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('QuoteType'), 'add_empty' => true)),
      'created_by'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Parent'), 'add_empty' => true)),
      'second_life'         => new sfWidgetFormFilterInput(),
      'main_sex'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Gender'), 'add_empty' => true)),
      'main_dob'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'spouse_sex'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SpouseGender'), 'add_empty' => true)),
      'spouse_dob'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'gp'                  => new sfWidgetFormFilterInput(),
      'spouse_reversion_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SpouseReversion'), 'add_empty' => true)),
      'pri_id'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Pri'), 'add_empty' => true)),
      'annuity'             => new sfWidgetFormFilterInput(),
      'purchase_price'      => new sfWidgetFormFilterInput(),
      'commission_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Commission'), 'add_empty' => true)),
      'commence_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'expires_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'created_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'client_id'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Client'), 'column' => 'id')),
      'quote_type_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('QuoteType'), 'column' => 'id')),
      'created_by'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Parent'), 'column' => 'id')),
      'second_life'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'main_sex'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Gender'), 'column' => 'id')),
      'main_dob'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'spouse_sex'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SpouseGender'), 'column' => 'id')),
      'spouse_dob'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'gp'                  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'spouse_reversion_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SpouseReversion'), 'column' => 'id')),
      'pri_id'              => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Pri'), 'column' => 'id')),
      'annuity'             => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'purchase_price'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'commission_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Commission'), 'column' => 'id')),
      'commence_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'expires_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('quote_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Quote';
  }

  public function getFields()
  {
    return array(
      'id'                  => 'Number',
      'client_id'           => 'ForeignKey',
      'quote_type_id'       => 'ForeignKey',
      'created_by'          => 'ForeignKey',
      'second_life'         => 'Number',
      'main_sex'            => 'ForeignKey',
      'main_dob'            => 'Date',
      'spouse_sex'          => 'ForeignKey',
      'spouse_dob'          => 'Date',
      'gp'                  => 'Number',
      'spouse_reversion_id' => 'ForeignKey',
      'pri_id'              => 'ForeignKey',
      'annuity'             => 'Number',
      'purchase_price'      => 'Number',
      'commission_id'       => 'ForeignKey',
      'commence_at'         => 'Date',
      'expires_at'          => 'Date',
      'created_at'          => 'Date',
      'updated_at'          => 'Date',
    );
  }
}

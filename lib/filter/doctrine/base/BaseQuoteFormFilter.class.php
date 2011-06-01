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
      'client_id'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Client'), 'add_empty' => true)),
      'created_by'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Parent'), 'add_empty' => true)),
      'second_life'            => new sfWidgetFormFilterInput(),
      'guarantee_period'       => new sfWidgetFormFilterInput(),
      'main_sex'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GEnder'), 'add_empty' => true)),
      'main_dob'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'spouse_sex'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SpouseGender'), 'add_empty' => true)),
      'spouse_dob'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'gp'                     => new sfWidgetFormFilterInput(),
      'spouse_reversion'       => new sfWidgetFormFilterInput(),
      'pri'                    => new sfWidgetFormFilterInput(),
      'purchase_price'         => new sfWidgetFormFilterInput(),
      'initial_gross_annuity'  => new sfWidgetFormFilterInput(),
      'initial_net_annuity'    => new sfWidgetFormFilterInput(),
      'commence_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'first_annuity_increase' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'guaranteed_terms'       => new sfWidgetFormFilterInput(),
      'premium_charge'         => new sfWidgetFormFilterInput(),
      'fund_charge'            => new sfWidgetFormFilterInput(),
      'administrative_charge'  => new sfWidgetFormFilterInput(),
      'created_at'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'client_id'              => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Client'), 'column' => 'id')),
      'created_by'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Parent'), 'column' => 'id')),
      'second_life'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'guarantee_period'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'main_sex'               => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('GEnder'), 'column' => 'id')),
      'main_dob'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'spouse_sex'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SpouseGender'), 'column' => 'id')),
      'spouse_dob'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'gp'                     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'spouse_reversion'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'pri'                    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'purchase_price'         => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'initial_gross_annuity'  => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'initial_net_annuity'    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'commence_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'first_annuity_increase' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'guaranteed_terms'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'premium_charge'         => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'fund_charge'            => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'administrative_charge'  => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'created_at'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
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
      'id'                     => 'Number',
      'client_id'              => 'ForeignKey',
      'created_by'             => 'ForeignKey',
      'second_life'            => 'Number',
      'guarantee_period'       => 'Number',
      'main_sex'               => 'ForeignKey',
      'main_dob'               => 'Date',
      'spouse_sex'             => 'ForeignKey',
      'spouse_dob'             => 'Date',
      'gp'                     => 'Number',
      'spouse_reversion'       => 'Number',
      'pri'                    => 'Number',
      'purchase_price'         => 'Number',
      'initial_gross_annuity'  => 'Number',
      'initial_net_annuity'    => 'Number',
      'commence_at'            => 'Date',
      'first_annuity_increase' => 'Date',
      'guaranteed_terms'       => 'Number',
      'premium_charge'         => 'Number',
      'fund_charge'            => 'Number',
      'administrative_charge'  => 'Number',
      'created_at'             => 'Date',
      'updated_at'             => 'Date',
    );
  }
}

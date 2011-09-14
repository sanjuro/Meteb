<?php

/**
 * QuoteOutputTypeValue filter form base class.
 *
 * @package    meteb
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseQuoteOutputTypeValueFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'quote_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Quote'), 'add_empty' => true)),
      'quote_output_type_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('QuoteOutputType'), 'add_empty' => true)),
      'value'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'quote_id'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Quote'), 'column' => 'id')),
      'quote_output_type_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('QuoteOutputType'), 'column' => 'id')),
      'value'                => new sfValidatorPass(array('required' => false)),
      'created_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('quote_output_type_value_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'QuoteOutputTypeValue';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'quote_id'             => 'ForeignKey',
      'quote_output_type_id' => 'ForeignKey',
      'value'                => 'Text',
      'created_at'           => 'Date',
      'updated_at'           => 'Date',
    );
  }
}

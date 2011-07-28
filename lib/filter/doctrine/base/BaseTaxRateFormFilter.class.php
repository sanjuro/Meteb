<?php

/**
 * TaxRate filter form base class.
 *
 * @package    meteb
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTaxRateFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'tax_rate'      => new sfWidgetFormFilterInput(),
      'start_bracket' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'tax_rate'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'start_bracket' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('tax_rate_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TaxRate';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'tax_rate'      => 'Number',
      'start_bracket' => 'Number',
    );
  }
}

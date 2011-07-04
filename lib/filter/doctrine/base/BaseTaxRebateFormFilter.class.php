<?php

/**
 * TaxRebate filter form base class.
 *
 * @package    meteb
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTaxRebateFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'age'    => new sfWidgetFormFilterInput(),
      'rebate' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'age'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'rebate' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('tax_rebate_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TaxRebate';
  }

  public function getFields()
  {
    return array(
      'id'     => 'Number',
      'age'    => 'Number',
      'rebate' => 'Number',
    );
  }
}

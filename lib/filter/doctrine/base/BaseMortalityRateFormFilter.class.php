<?php

/**
 * MortalityRate filter form base class.
 *
 * @package    meteb
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMortalityRateFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'age'              => new sfWidgetFormFilterInput(),
      'mortality_male'   => new sfWidgetFormFilterInput(),
      'mortality_female' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'age'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'mortality_male'   => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'mortality_female' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('mortality_rate_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MortalityRate';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'age'              => 'Number',
      'mortality_male'   => 'Number',
      'mortality_female' => 'Number',
    );
  }
}

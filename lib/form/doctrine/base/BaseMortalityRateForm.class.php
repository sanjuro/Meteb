<?php

/**
 * MortalityRate form base class.
 *
 * @method MortalityRate getObject() Returns the current form's model object
 *
 * @package    meteb
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMortalityRateForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'age'              => new sfWidgetFormInputText(),
      'mortality_male'   => new sfWidgetFormInputText(),
      'mortality_female' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'age'              => new sfValidatorInteger(array('required' => false)),
      'mortality_male'   => new sfValidatorNumber(array('required' => false)),
      'mortality_female' => new sfValidatorNumber(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('mortality_rate[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MortalityRate';
  }

}

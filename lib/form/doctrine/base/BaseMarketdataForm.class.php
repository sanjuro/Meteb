<?php

/**
 * Marketdata form base class.
 *
 * @method Marketdata getObject() Returns the current form's model object
 *
 * @package    meteb
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMarketdataForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'uploaded_at'       => new sfWidgetFormDateTime(),
      'month_array'       => new sfWidgetFormTextarea(),
      'discounting_array' => new sfWidgetFormTextarea(),
      'dhfactors_matrix'  => new sfWidgetFormTextarea(),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'uploaded_at'       => new sfValidatorDateTime(),
      'month_array'       => new sfValidatorString(),
      'discounting_array' => new sfValidatorString(),
      'dhfactors_matrix'  => new sfValidatorString(),
      'created_at'        => new sfValidatorDateTime(),
      'updated_at'        => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('marketdata[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Marketdata';
  }

}

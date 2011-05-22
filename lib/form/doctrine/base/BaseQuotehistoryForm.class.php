<?php

/**
 * Quotehistory form base class.
 *
 * @method Quotehistory getObject() Returns the current form's model object
 *
 * @package    meteb
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseQuotehistoryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'client_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Client'), 'add_empty' => true)),
      'financialadvisor_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Advisor'), 'add_empty' => true)),
      'created_at'          => new sfWidgetFormDateTime(),
      'updated_at'          => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'client_id'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Client'), 'required' => false)),
      'financialadvisor_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Advisor'), 'required' => false)),
      'created_at'          => new sfValidatorDateTime(),
      'updated_at'          => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('quotehistory[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Quotehistory';
  }

}

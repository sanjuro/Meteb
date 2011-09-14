<?php

/**
 * QuoteOutputTypeValue form base class.
 *
 * @method QuoteOutputTypeValue getObject() Returns the current form's model object
 *
 * @package    meteb
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseQuoteOutputTypeValueForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'quote_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Quote'), 'add_empty' => true)),
      'quote_output_type_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('QuoteOutputType'), 'add_empty' => true)),
      'value'                => new sfWidgetFormInputText(),
      'created_at'           => new sfWidgetFormDateTime(),
      'updated_at'           => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'quote_id'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Quote'), 'required' => false)),
      'quote_output_type_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('QuoteOutputType'), 'required' => false)),
      'value'                => new sfValidatorString(array('max_length' => 255)),
      'created_at'           => new sfValidatorDateTime(),
      'updated_at'           => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('quote_output_type_value[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'QuoteOutputTypeValue';
  }

}

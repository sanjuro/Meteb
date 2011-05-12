<?php

/**
 * Expensedata form base class.
 *
 * @method Expensedata getObject() Returns the current form's model object
 *
 * @package    meteb
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseExpensedataForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'renewal_expenses'  => new sfWidgetFormInputText(),
      'expense_inflation' => new sfWidgetFormInputText(),
      'initial_expenses'  => new sfWidgetFormInputText(),
      'loadings'          => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'renewal_expenses'  => new sfValidatorString(array('max_length' => 20)),
      'expense_inflation' => new sfValidatorString(array('max_length' => 20)),
      'initial_expenses'  => new sfValidatorString(array('max_length' => 20)),
      'loadings'          => new sfValidatorString(array('max_length' => 20)),
    ));

    $this->widgetSchema->setNameFormat('expensedata[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Expensedata';
  }

}

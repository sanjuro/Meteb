<?php

/**
 * Expensedata filter form base class.
 *
 * @package    meteb
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseExpensedataFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'renewal_expenses'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'expense_inflation' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'initial_expenses'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'loadings'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'renewal_expenses'  => new sfValidatorPass(array('required' => false)),
      'expense_inflation' => new sfValidatorPass(array('required' => false)),
      'initial_expenses'  => new sfValidatorPass(array('required' => false)),
      'loadings'          => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('expensedata_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Expensedata';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'renewal_expenses'  => 'Text',
      'expense_inflation' => 'Text',
      'initial_expenses'  => 'Text',
      'loadings'          => 'Text',
    );
  }
}

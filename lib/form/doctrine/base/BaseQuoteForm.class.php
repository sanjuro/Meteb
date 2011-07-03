<?php

/**
 * Quote form base class.
 *
 * @method Quote getObject() Returns the current form's model object
 *
 * @package    meteb
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseQuoteForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                     => new sfWidgetFormInputHidden(),
      'client_id'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Client'), 'add_empty' => true)),
      'created_by'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Parent'), 'add_empty' => true)),
      'second_life'            => new sfWidgetFormInputText(),
      'main_sex'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('GEnder'), 'add_empty' => true)),
      'main_dob'               => new sfWidgetFormDateTime(),
      'spouse_sex'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SpouseGender'), 'add_empty' => true)),
      'spouse_dob'             => new sfWidgetFormDateTime(),
      'gp'                     => new sfWidgetFormInputText(),
      'spouse_reversion'       => new sfWidgetFormInputText(),
      'pri'                    => new sfWidgetFormInputText(),
      'purchase_price'         => new sfWidgetFormInputText(),
      'initial_gross_annuity'  => new sfWidgetFormInputText(),
      'initial_net_annuity'    => new sfWidgetFormInputText(),
      'commission'             => new sfWidgetFormInputText(),
      'commence_at'            => new sfWidgetFormDateTime(),
      'first_annuity_increase' => new sfWidgetFormDateTime(),
      'guaranteed_terms'       => new sfWidgetFormInputText(),
      'premium_charge'         => new sfWidgetFormInputText(),
      'fund_charge'            => new sfWidgetFormInputText(),
      'administrative_charge'  => new sfWidgetFormInputText(),
      'created_at'             => new sfWidgetFormDateTime(),
      'updated_at'             => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'client_id'              => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Client'), 'required' => false)),
      'created_by'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Parent'), 'required' => false)),
      'second_life'            => new sfValidatorInteger(array('required' => false)),
      'main_sex'               => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('GEnder'), 'required' => false)),
      'main_dob'               => new sfValidatorDateTime(),
      'spouse_sex'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SpouseGender'), 'required' => false)),
      'spouse_dob'             => new sfValidatorDateTime(),
      'gp'                     => new sfValidatorInteger(array('required' => false)),
      'spouse_reversion'       => new sfValidatorNumber(array('required' => false)),
      'pri'                    => new sfValidatorNumber(array('required' => false)),
      'purchase_price'         => new sfValidatorNumber(array('required' => false)),
      'initial_gross_annuity'  => new sfValidatorNumber(array('required' => false)),
      'initial_net_annuity'    => new sfValidatorNumber(array('required' => false)),
      'commission'             => new sfValidatorNumber(array('required' => false)),
      'commence_at'            => new sfValidatorDateTime(),
      'first_annuity_increase' => new sfValidatorDateTime(),
      'guaranteed_terms'       => new sfValidatorInteger(array('required' => false)),
      'premium_charge'         => new sfValidatorNumber(array('required' => false)),
      'fund_charge'            => new sfValidatorNumber(array('required' => false)),
      'administrative_charge'  => new sfValidatorNumber(array('required' => false)),
      'created_at'             => new sfValidatorDateTime(),
      'updated_at'             => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('quote[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Quote';
  }

}

<?php

/**
 * SpouseReversion filter form base class.
 *
 * @package    meteb
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSpouseReversionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'title' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'title' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('spouse_reversion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SpouseReversion';
  }

  public function getFields()
  {
    return array(
      'id'    => 'Number',
      'title' => 'Number',
    );
  }
}

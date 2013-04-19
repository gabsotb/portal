<?php

/**
 * Plannedperformance form base class.
 *
 * @method Plannedperformance getObject() Returns the current form's model object
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePlannedperformanceForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'business_plan' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('InvestmentApplication'), 'add_empty' => false)),
      'year1'         => new sfWidgetFormInputText(),
      'year2'         => new sfWidgetFormInputText(),
      'year3'         => new sfWidgetFormInputText(),
      'year4'         => new sfWidgetFormInputText(),
      'year5'         => new sfWidgetFormInputText(),
      'token'         => new sfWidgetFormInputText(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
      'created_by'    => new sfWidgetFormTextarea(),
      'updated_by'    => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'business_plan' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('InvestmentApplication'))),
      'year1'         => new sfValidatorInteger(array('required' => false)),
      'year2'         => new sfValidatorInteger(array('required' => false)),
      'year3'         => new sfValidatorInteger(array('required' => false)),
      'year4'         => new sfValidatorInteger(array('required' => false)),
      'year5'         => new sfValidatorInteger(array('required' => false)),
      'token'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
      'created_by'    => new sfValidatorString(array('required' => false)),
      'updated_by'    => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('plannedperformance[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Plannedperformance';
  }

}

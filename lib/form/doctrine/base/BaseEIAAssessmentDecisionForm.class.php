<?php

/**
 * EIAAssessmentDecision form base class.
 *
 * @method EIAAssessmentDecision getObject() Returns the current form's model object
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEIAAssessmentDecisionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'taskassignment_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('EITaskAssignment'), 'add_empty' => false)),
      'verdict'           => new sfWidgetFormTextarea(),
      'remarks'           => new sfWidgetFormInputText(),
      'token'             => new sfWidgetFormInputText(),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
      'created_by'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'        => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'taskassignment_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('EITaskAssignment'))),
      'verdict'           => new sfValidatorString(),
      'remarks'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'token'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'        => new sfValidatorDateTime(),
      'updated_at'        => new sfValidatorDateTime(),
      'created_by'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'required' => false)),
      'updated_by'        => new sfValidatorString(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'EIAAssessmentDecision', 'column' => array('taskassignment_id')))
    );

    $this->widgetSchema->setNameFormat('eia_assessment_decision[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EIAAssessmentDecision';
  }

}

<?php

/**
 * EIAReportDecision form base class.
 *
 * @method EIAReportDecision getObject() Returns the current form's model object
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEIAReportDecisionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'report_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('EIAReports'), 'add_empty' => false)),
      'decision'   => new sfWidgetFormInputText(),
      'comment'    => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
      'created_by' => new sfWidgetFormTextarea(),
      'updated_by' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'report_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('EIAReports'))),
      'decision'   => new sfValidatorInteger(),
      'comment'    => new sfValidatorString(array('max_length' => 200)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
      'created_by' => new sfValidatorString(array('required' => false)),
      'updated_by' => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('eia_report_decision[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EIAReportDecision';
  }

}

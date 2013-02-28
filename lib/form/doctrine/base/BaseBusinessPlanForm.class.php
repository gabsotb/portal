<?php

/**
 * BusinessPlan form base class.
 *
 * @method BusinessPlan getObject() Returns the current form's model object
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBusinessPlanForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'investment_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('InvestmentApplication'), 'add_empty' => false)),
      'executive_summary'   => new sfWidgetFormTextarea(),
      'promoter_profile'    => new sfWidgetFormTextarea(),
      'project_background'  => new sfWidgetFormTextarea(),
      'equity_financing'    => new sfWidgetFormTextarea(),
      'income_statement'    => new sfWidgetFormTextarea(),
      'cashflow_statement'  => new sfWidgetFormTextarea(),
      'payback_period'      => new sfWidgetFormTextarea(),
      'npv'                 => new sfWidgetFormTextarea(),
      'loan_amortization'   => new sfWidgetFormTextarea(),
      'implementation_plan' => new sfWidgetFormTextarea(),
      'notes'               => new sfWidgetFormTextarea(),
      'created_at'          => new sfWidgetFormDateTime(),
      'updated_at'          => new sfWidgetFormDateTime(),
      'created_by'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'          => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'investment_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('InvestmentApplication'))),
      'executive_summary'   => new sfValidatorString(array('max_length' => 400)),
      'promoter_profile'    => new sfValidatorString(array('max_length' => 400)),
      'project_background'  => new sfValidatorString(array('max_length' => 400)),
      'equity_financing'    => new sfValidatorString(array('max_length' => 400)),
      'income_statement'    => new sfValidatorString(array('max_length' => 400)),
      'cashflow_statement'  => new sfValidatorString(array('max_length' => 400)),
      'payback_period'      => new sfValidatorString(array('max_length' => 400)),
      'npv'                 => new sfValidatorString(array('max_length' => 400)),
      'loan_amortization'   => new sfValidatorString(array('max_length' => 400)),
      'implementation_plan' => new sfValidatorString(array('max_length' => 400)),
      'notes'               => new sfValidatorString(array('max_length' => 400)),
      'created_at'          => new sfValidatorDateTime(),
      'updated_at'          => new sfValidatorDateTime(),
      'created_by'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'required' => false)),
      'updated_by'          => new sfValidatorString(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'BusinessPlan', 'column' => array('investment_id')))
    );

    $this->widgetSchema->setNameFormat('business_plan[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BusinessPlan';
  }

}

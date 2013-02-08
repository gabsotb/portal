<?php

/**
 * BusinessPlan filter form base class.
 *
 * @package    rdbeportal
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseBusinessPlanFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'investment_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('InvestmentApplication'), 'add_empty' => true)),
      'executive_summary'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'promoter_profile'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'project_background'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'equity_financing'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'income_statement'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cashflow_statement'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'payback_period'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'npv'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'loan_amortization'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'implementation_plan' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'notes'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'created_by'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'          => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'investment_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('InvestmentApplication'), 'column' => 'id')),
      'executive_summary'   => new sfValidatorPass(array('required' => false)),
      'promoter_profile'    => new sfValidatorPass(array('required' => false)),
      'project_background'  => new sfValidatorPass(array('required' => false)),
      'equity_financing'    => new sfValidatorPass(array('required' => false)),
      'income_statement'    => new sfValidatorPass(array('required' => false)),
      'cashflow_statement'  => new sfValidatorPass(array('required' => false)),
      'payback_period'      => new sfValidatorPass(array('required' => false)),
      'npv'                 => new sfValidatorPass(array('required' => false)),
      'loan_amortization'   => new sfValidatorPass(array('required' => false)),
      'implementation_plan' => new sfValidatorPass(array('required' => false)),
      'notes'               => new sfValidatorPass(array('required' => false)),
      'created_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_by'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Creator'), 'column' => 'id')),
      'updated_by'          => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('business_plan_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BusinessPlan';
  }

  public function getFields()
  {
    return array(
      'id'                  => 'Number',
      'investment_id'       => 'ForeignKey',
      'executive_summary'   => 'Text',
      'promoter_profile'    => 'Text',
      'project_background'  => 'Text',
      'equity_financing'    => 'Text',
      'income_statement'    => 'Text',
      'cashflow_statement'  => 'Text',
      'payback_period'      => 'Text',
      'npv'                 => 'Text',
      'loan_amortization'   => 'Text',
      'implementation_plan' => 'Text',
      'notes'               => 'Text',
      'created_at'          => 'Date',
      'updated_at'          => 'Date',
      'created_by'          => 'ForeignKey',
      'updated_by'          => 'Text',
    );
  }
}

<?php

/**
 * InvestmentApplication filter form base class.
 *
 * @package    rdbeportal
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseInvestmentApplicationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'business_name'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'email_address'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'phone_number'       => new sfWidgetFormFilterInput(),
      'application_letter' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'executive_summary'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'promoter_profile'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'project_backgroud'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'market_study'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'investment_plan'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'equity_financing'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'income_expenditure' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'balance_sheet'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cash_flow'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'payback_period'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'loan_amortazation'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'username_logged'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'business_name'      => new sfValidatorPass(array('required' => false)),
      'email_address'      => new sfValidatorPass(array('required' => false)),
      'phone_number'       => new sfValidatorPass(array('required' => false)),
      'application_letter' => new sfValidatorPass(array('required' => false)),
      'executive_summary'  => new sfValidatorPass(array('required' => false)),
      'promoter_profile'   => new sfValidatorPass(array('required' => false)),
      'project_backgroud'  => new sfValidatorPass(array('required' => false)),
      'market_study'       => new sfValidatorPass(array('required' => false)),
      'investment_plan'    => new sfValidatorPass(array('required' => false)),
      'equity_financing'   => new sfValidatorPass(array('required' => false)),
      'income_expenditure' => new sfValidatorPass(array('required' => false)),
      'balance_sheet'      => new sfValidatorPass(array('required' => false)),
      'cash_flow'          => new sfValidatorPass(array('required' => false)),
      'payback_period'     => new sfValidatorPass(array('required' => false)),
      'loan_amortazation'  => new sfValidatorPass(array('required' => false)),
      'username_logged'    => new sfValidatorPass(array('required' => false)),
      'created_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('investment_application_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'InvestmentApplication';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'business_name'      => 'Text',
      'email_address'      => 'Text',
      'phone_number'       => 'Text',
      'application_letter' => 'Text',
      'executive_summary'  => 'Text',
      'promoter_profile'   => 'Text',
      'project_backgroud'  => 'Text',
      'market_study'       => 'Text',
      'investment_plan'    => 'Text',
      'equity_financing'   => 'Text',
      'income_expenditure' => 'Text',
      'balance_sheet'      => 'Text',
      'cash_flow'          => 'Text',
      'payback_period'     => 'Text',
      'loan_amortazation'  => 'Text',
      'username_logged'    => 'Text',
      'created_at'         => 'Date',
      'updated_at'         => 'Date',
    );
  }
}

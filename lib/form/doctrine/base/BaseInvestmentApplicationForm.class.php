<?php

/**
 * InvestmentApplication form base class.
 *
 * @method InvestmentApplication getObject() Returns the current form's model object
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseInvestmentApplicationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'business_name'      => new sfWidgetFormInputText(),
      'email_address'      => new sfWidgetFormInputText(),
      'phone_number'       => new sfWidgetFormInputText(),
      'application_letter' => new sfWidgetFormInputText(),
      'executive_summary'  => new sfWidgetFormTextarea(),
      'promoter_profile'   => new sfWidgetFormTextarea(),
      'project_backgroud'  => new sfWidgetFormTextarea(),
      'market_study'       => new sfWidgetFormTextarea(),
      'investment_plan'    => new sfWidgetFormTextarea(),
      'equity_financing'   => new sfWidgetFormTextarea(),
      'income_expenditure' => new sfWidgetFormTextarea(),
      'balance_sheet'      => new sfWidgetFormTextarea(),
      'cash_flow'          => new sfWidgetFormTextarea(),
      'payback_period'     => new sfWidgetFormTextarea(),
      'loan_amortazation'  => new sfWidgetFormTextarea(),
      'username_logged'    => new sfWidgetFormInputText(),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'business_name'      => new sfValidatorString(array('max_length' => 255)),
      'email_address'      => new sfValidatorString(array('max_length' => 255)),
      'phone_number'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'application_letter' => new sfValidatorString(array('max_length' => 255)),
      'executive_summary'  => new sfValidatorString(array('max_length' => 400)),
      'promoter_profile'   => new sfValidatorString(array('max_length' => 400)),
      'project_backgroud'  => new sfValidatorString(array('max_length' => 400)),
      'market_study'       => new sfValidatorString(array('max_length' => 400)),
      'investment_plan'    => new sfValidatorString(array('max_length' => 400)),
      'equity_financing'   => new sfValidatorString(array('max_length' => 400)),
      'income_expenditure' => new sfValidatorString(array('max_length' => 400)),
      'balance_sheet'      => new sfValidatorString(array('max_length' => 400)),
      'cash_flow'          => new sfValidatorString(array('max_length' => 400)),
      'payback_period'     => new sfValidatorString(array('max_length' => 400)),
      'loan_amortazation'  => new sfValidatorString(array('max_length' => 400)),
      'username_logged'    => new sfValidatorString(array('max_length' => 255)),
      'created_at'         => new sfValidatorDateTime(),
      'updated_at'         => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('investment_application[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'InvestmentApplication';
  }

}

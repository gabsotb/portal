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
      'id'                        => new sfWidgetFormInputHidden(),
      'name'                      => new sfWidgetFormInputText(),
      'registration_number'       => new sfWidgetFormInputText(),
      'company_address'           => new sfWidgetFormInputText(),
      'job_created'               => new sfWidgetFormInputText(),
      'job_category'              => new sfWidgetFormTextarea(),
      'company_legal_nature'      => new sfWidgetFormTextarea(),
      'company_representative'    => new sfWidgetFormInputText(),
      'application_letter'        => new sfWidgetFormInputText(),
      'incorporation_certificate' => new sfWidgetFormInputText(),
      'shareholding_list'         => new sfWidgetFormInputText(),
      'company_logo'              => new sfWidgetFormInputText(),
      'created_at'                => new sfWidgetFormDateTime(),
      'updated_at'                => new sfWidgetFormDateTime(),
      'created_by'                => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'                => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'                        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'                      => new sfValidatorString(array('max_length' => 255)),
      'registration_number'       => new sfValidatorString(array('max_length' => 255)),
      'company_address'           => new sfValidatorString(array('max_length' => 255)),
      'job_created'               => new sfValidatorInteger(),
      'job_category'              => new sfValidatorString(array('max_length' => 4000)),
      'company_legal_nature'      => new sfValidatorString(array('max_length' => 400)),
      'company_representative'    => new sfValidatorString(array('max_length' => 255)),
      'application_letter'        => new sfValidatorString(array('max_length' => 255)),
      'incorporation_certificate' => new sfValidatorString(array('max_length' => 255)),
      'shareholding_list'         => new sfValidatorString(array('max_length' => 255)),
      'company_logo'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'                => new sfValidatorDateTime(),
      'updated_at'                => new sfValidatorDateTime(),
      'created_by'                => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'required' => false)),
      'updated_by'                => new sfValidatorString(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'InvestmentApplication', 'column' => array('name'))),
        new sfValidatorDoctrineUnique(array('model' => 'InvestmentApplication', 'column' => array('registration_number'))),
      ))
    );

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

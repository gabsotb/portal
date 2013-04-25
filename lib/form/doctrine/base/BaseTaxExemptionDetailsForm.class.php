<?php

/**
 * TaxExemptionDetails form base class.
 *
 * @method TaxExemptionDetails getObject() Returns the current form's model object
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTaxExemptionDetailsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                                  => new sfWidgetFormInputHidden(),
      'office_name'                         => new sfWidgetFormInputText(),
      'office_code'                         => new sfWidgetFormInputText(),
      'company_name'                        => new sfWidgetFormInputText(),
      'investment_certificate'              => new sfWidgetFormInputText(),
      'company_tin'                         => new sfWidgetFormInputText(),
      'declarant_name'                      => new sfWidgetFormInputText(),
      'declarant_reference'                 => new sfWidgetFormInputText(),
      'declarant_code'                      => new sfWidgetFormInputText(),
      'electronic_request_number'           => new sfWidgetFormInputText(),
      'electronic_authrization_number'      => new sfWidgetFormInputText(),
      'customs_declaration_reference'       => new sfWidgetFormInputText(),
      'revenue_officer'                     => new sfWidgetFormInputText(),
      'revenue_officer_e_verification_date' => new sfWidgetFormDateTime(),
      'revenue_officer_remarks'             => new sfWidgetFormTextarea(),
      'rdb_officer_remarks'                 => new sfWidgetFormTextarea(),
      'status'                              => new sfWidgetFormInputText(),
      'created_at'                          => new sfWidgetFormDateTime(),
      'updated_at'                          => new sfWidgetFormDateTime(),
      'created_by'                          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'                          => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'                                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'office_name'                         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'office_code'                         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'company_name'                        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'investment_certificate'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'company_tin'                         => new sfValidatorInteger(array('required' => false)),
      'declarant_name'                      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'declarant_reference'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'declarant_code'                      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'electronic_request_number'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'electronic_authrization_number'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'customs_declaration_reference'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'revenue_officer'                     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'revenue_officer_e_verification_date' => new sfValidatorDateTime(array('required' => false)),
      'revenue_officer_remarks'             => new sfValidatorString(array('max_length' => 2000, 'required' => false)),
      'rdb_officer_remarks'                 => new sfValidatorString(array('max_length' => 2000, 'required' => false)),
      'status'                              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'                          => new sfValidatorDateTime(),
      'updated_at'                          => new sfValidatorDateTime(),
      'created_by'                          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'required' => false)),
      'updated_by'                          => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tax_exemption_details[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TaxExemptionDetails';
  }

}

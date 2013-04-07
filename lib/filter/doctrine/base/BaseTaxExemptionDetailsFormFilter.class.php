<?php

/**
 * TaxExemptionDetails filter form base class.
 *
 * @package    rdbeportal
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTaxExemptionDetailsFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'office_name'                         => new sfWidgetFormFilterInput(),
      'office_code'                         => new sfWidgetFormFilterInput(),
      'company_name'                        => new sfWidgetFormFilterInput(),
      'investment_certificate'              => new sfWidgetFormFilterInput(),
      'company_tin'                         => new sfWidgetFormFilterInput(),
      'declarant_name'                      => new sfWidgetFormFilterInput(),
      'declarant_reference'                 => new sfWidgetFormFilterInput(),
      'declarant_code'                      => new sfWidgetFormFilterInput(),
      'electronic_request_number'           => new sfWidgetFormFilterInput(),
      'electronic_authrization_number'      => new sfWidgetFormFilterInput(),
      'customs_declaration_reference'       => new sfWidgetFormFilterInput(),
      'revenue_officer'                     => new sfWidgetFormFilterInput(),
      'revenue_officer_e_verification_date' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'revenue_officer_remarks'             => new sfWidgetFormFilterInput(),
      'rdb_officer_remarks'                 => new sfWidgetFormFilterInput(),
      'status'                              => new sfWidgetFormFilterInput(),
      'created_at'                          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'                          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'created_by'                          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'                          => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'office_name'                         => new sfValidatorPass(array('required' => false)),
      'office_code'                         => new sfValidatorPass(array('required' => false)),
      'company_name'                        => new sfValidatorPass(array('required' => false)),
      'investment_certificate'              => new sfValidatorPass(array('required' => false)),
      'company_tin'                         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'declarant_name'                      => new sfValidatorPass(array('required' => false)),
      'declarant_reference'                 => new sfValidatorPass(array('required' => false)),
      'declarant_code'                      => new sfValidatorPass(array('required' => false)),
      'electronic_request_number'           => new sfValidatorPass(array('required' => false)),
      'electronic_authrization_number'      => new sfValidatorPass(array('required' => false)),
      'customs_declaration_reference'       => new sfValidatorPass(array('required' => false)),
      'revenue_officer'                     => new sfValidatorPass(array('required' => false)),
      'revenue_officer_e_verification_date' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'revenue_officer_remarks'             => new sfValidatorPass(array('required' => false)),
      'rdb_officer_remarks'                 => new sfValidatorPass(array('required' => false)),
      'status'                              => new sfValidatorPass(array('required' => false)),
      'created_at'                          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'                          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_by'                          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Creator'), 'column' => 'id')),
      'updated_by'                          => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tax_exemption_details_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TaxExemptionDetails';
  }

  public function getFields()
  {
    return array(
      'id'                                  => 'Number',
      'office_name'                         => 'Text',
      'office_code'                         => 'Text',
      'company_name'                        => 'Text',
      'investment_certificate'              => 'Text',
      'company_tin'                         => 'Number',
      'declarant_name'                      => 'Text',
      'declarant_reference'                 => 'Text',
      'declarant_code'                      => 'Text',
      'electronic_request_number'           => 'Text',
      'electronic_authrization_number'      => 'Text',
      'customs_declaration_reference'       => 'Text',
      'revenue_officer'                     => 'Text',
      'revenue_officer_e_verification_date' => 'Date',
      'revenue_officer_remarks'             => 'Text',
      'rdb_officer_remarks'                 => 'Text',
      'status'                              => 'Text',
      'created_at'                          => 'Date',
      'updated_at'                          => 'Date',
      'created_by'                          => 'ForeignKey',
      'updated_by'                          => 'Text',
    );
  }
}

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
      'name'                      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'registration_number'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'company_address'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'job_created'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'job_category'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'company_legal_nature'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'company_representative'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'application_letter'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'incorporation_certificate' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'shareholding_list'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'company_logo'              => new sfWidgetFormFilterInput(),
      'created_at'                => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'                => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'created_by'                => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'                => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'                      => new sfValidatorPass(array('required' => false)),
      'registration_number'       => new sfValidatorPass(array('required' => false)),
      'company_address'           => new sfValidatorPass(array('required' => false)),
      'job_created'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'job_category'              => new sfValidatorPass(array('required' => false)),
      'company_legal_nature'      => new sfValidatorPass(array('required' => false)),
      'company_representative'    => new sfValidatorPass(array('required' => false)),
      'application_letter'        => new sfValidatorPass(array('required' => false)),
      'incorporation_certificate' => new sfValidatorPass(array('required' => false)),
      'shareholding_list'         => new sfValidatorPass(array('required' => false)),
      'company_logo'              => new sfValidatorPass(array('required' => false)),
      'created_at'                => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'                => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_by'                => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Creator'), 'column' => 'id')),
      'updated_by'                => new sfValidatorPass(array('required' => false)),
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
      'id'                        => 'Number',
      'name'                      => 'Text',
      'registration_number'       => 'Text',
      'company_address'           => 'Text',
      'job_created'               => 'Number',
      'job_category'              => 'Text',
      'company_legal_nature'      => 'Text',
      'company_representative'    => 'Text',
      'application_letter'        => 'Text',
      'incorporation_certificate' => 'Text',
      'shareholding_list'         => 'Text',
      'company_logo'              => 'Text',
      'created_at'                => 'Date',
      'updated_at'                => 'Date',
      'created_by'                => 'ForeignKey',
      'updated_by'                => 'Text',
    );
  }
}

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
      'name'                       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'registration_number'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'title_in_company'           => new sfWidgetFormFilterInput(),
      'business_sector'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'business_category'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'representative_name'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'currency_type'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'office_telephone'           => new sfWidgetFormFilterInput(),
      'fax'                        => new sfWidgetFormFilterInput(),
      'post_box'                   => new sfWidgetFormFilterInput(),
      'location'                   => new sfWidgetFormFilterInput(),
      'sector'                     => new sfWidgetFormFilterInput(),
      'district'                   => new sfWidgetFormFilterInput(),
      'city_province'              => new sfWidgetFormFilterInput(),
      'applicant_reference_number' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'token'                      => new sfWidgetFormFilterInput(),
      'created_at'                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'created_by'                 => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'                 => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'                       => new sfValidatorPass(array('required' => false)),
      'registration_number'        => new sfValidatorPass(array('required' => false)),
      'title_in_company'           => new sfValidatorPass(array('required' => false)),
      'business_sector'            => new sfValidatorPass(array('required' => false)),
      'business_category'          => new sfValidatorPass(array('required' => false)),
      'representative_name'        => new sfValidatorPass(array('required' => false)),
      'currency_type'              => new sfValidatorPass(array('required' => false)),
      'office_telephone'           => new sfValidatorPass(array('required' => false)),
      'fax'                        => new sfValidatorPass(array('required' => false)),
      'post_box'                   => new sfValidatorPass(array('required' => false)),
      'location'                   => new sfValidatorPass(array('required' => false)),
      'sector'                     => new sfValidatorPass(array('required' => false)),
      'district'                   => new sfValidatorPass(array('required' => false)),
      'city_province'              => new sfValidatorPass(array('required' => false)),
      'applicant_reference_number' => new sfValidatorPass(array('required' => false)),
      'token'                      => new sfValidatorPass(array('required' => false)),
      'created_at'                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_by'                 => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Creator'), 'column' => 'id')),
      'updated_by'                 => new sfValidatorPass(array('required' => false)),
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
      'id'                         => 'Number',
      'name'                       => 'Text',
      'registration_number'        => 'Text',
      'title_in_company'           => 'Text',
      'business_sector'            => 'Text',
      'business_category'          => 'Text',
      'representative_name'        => 'Text',
      'currency_type'              => 'Text',
      'office_telephone'           => 'Text',
      'fax'                        => 'Text',
      'post_box'                   => 'Text',
      'location'                   => 'Text',
      'sector'                     => 'Text',
      'district'                   => 'Text',
      'city_province'              => 'Text',
      'applicant_reference_number' => 'Text',
      'token'                      => 'Text',
      'created_at'                 => 'Date',
      'updated_at'                 => 'Date',
      'created_by'                 => 'ForeignKey',
      'updated_by'                 => 'Text',
    );
  }
}

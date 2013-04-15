<?php

/**
 * ApprovedApplications filter form base class.
 *
 * @package    rdbeportal
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseApprovedApplicationsFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'business_id'                => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('InvestmentApplication'), 'add_empty' => true)),
      'applicant_reference_number' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'business_registration'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'application_type'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'comment'                    => new sfWidgetFormFilterInput(),
      'token'                      => new sfWidgetFormFilterInput(),
      'created_at'                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'created_by'                 => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'                 => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'business_id'                => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('InvestmentApplication'), 'column' => 'id')),
      'applicant_reference_number' => new sfValidatorPass(array('required' => false)),
      'business_registration'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'application_type'           => new sfValidatorPass(array('required' => false)),
      'comment'                    => new sfValidatorPass(array('required' => false)),
      'token'                      => new sfValidatorPass(array('required' => false)),
      'created_at'                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_by'                 => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Creator'), 'column' => 'id')),
      'updated_by'                 => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('approved_applications_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ApprovedApplications';
  }

  public function getFields()
  {
    return array(
      'id'                         => 'Number',
      'business_id'                => 'ForeignKey',
      'applicant_reference_number' => 'Text',
      'business_registration'      => 'Number',
      'application_type'           => 'Text',
      'comment'                    => 'Text',
      'token'                      => 'Text',
      'created_at'                 => 'Date',
      'updated_at'                 => 'Date',
      'created_by'                 => 'ForeignKey',
      'updated_by'                 => 'Text',
    );
  }
}

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
      'investment_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('InvestmentApplication'), 'add_empty' => true)),
      'project_brief'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'exemption_on_machinery'  => new sfWidgetFormFilterInput(),
      'exemption_raw_materials' => new sfWidgetFormFilterInput(),
      'land_ownership_document' => new sfWidgetFormFilterInput(),
      'bill_of_quantiy'         => new sfWidgetFormFilterInput(),
      'drawings'                => new sfWidgetFormFilterInput(),
      'construction_permits'    => new sfWidgetFormFilterInput(),
      'investment_allowances'   => new sfWidgetFormFilterInput(),
      'additional_incentives'   => new sfWidgetFormFilterInput(),
      'visa_work_permits'       => new sfWidgetFormFilterInput(),
      'token'                   => new sfWidgetFormFilterInput(),
      'created_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'created_by'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'              => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'investment_id'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('InvestmentApplication'), 'column' => 'id')),
      'project_brief'           => new sfValidatorPass(array('required' => false)),
      'exemption_on_machinery'  => new sfValidatorPass(array('required' => false)),
      'exemption_raw_materials' => new sfValidatorPass(array('required' => false)),
      'land_ownership_document' => new sfValidatorPass(array('required' => false)),
      'bill_of_quantiy'         => new sfValidatorPass(array('required' => false)),
      'drawings'                => new sfValidatorPass(array('required' => false)),
      'construction_permits'    => new sfValidatorPass(array('required' => false)),
      'investment_allowances'   => new sfValidatorPass(array('required' => false)),
      'additional_incentives'   => new sfValidatorPass(array('required' => false)),
      'visa_work_permits'       => new sfValidatorPass(array('required' => false)),
      'token'                   => new sfValidatorPass(array('required' => false)),
      'created_at'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_by'              => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Creator'), 'column' => 'id')),
      'updated_by'              => new sfValidatorPass(array('required' => false)),
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
      'id'                      => 'Number',
      'investment_id'           => 'ForeignKey',
      'project_brief'           => 'Text',
      'exemption_on_machinery'  => 'Text',
      'exemption_raw_materials' => 'Text',
      'land_ownership_document' => 'Text',
      'bill_of_quantiy'         => 'Text',
      'drawings'                => 'Text',
      'construction_permits'    => 'Text',
      'investment_allowances'   => 'Text',
      'additional_incentives'   => 'Text',
      'visa_work_permits'       => 'Text',
      'token'                   => 'Text',
      'created_at'              => 'Date',
      'updated_at'              => 'Date',
      'created_by'              => 'ForeignKey',
      'updated_by'              => 'Text',
    );
  }
}

<?php

/**
 * ProjectSummary filter form base class.
 *
 * @package    rdbeportal
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseProjectSummaryFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'investment_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('InvestmentApplication'), 'add_empty' => true)),
      'business_sector'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'techinical_viability' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'planned_investment'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'employment_created'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'job_categories'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'created_by'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'           => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'investment_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('InvestmentApplication'), 'column' => 'id')),
      'business_sector'      => new sfValidatorPass(array('required' => false)),
      'techinical_viability' => new sfValidatorPass(array('required' => false)),
      'planned_investment'   => new sfValidatorPass(array('required' => false)),
      'employment_created'   => new sfValidatorPass(array('required' => false)),
      'job_categories'       => new sfValidatorPass(array('required' => false)),
      'created_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_by'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Creator'), 'column' => 'id')),
      'updated_by'           => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('project_summary_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProjectSummary';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'investment_id'        => 'ForeignKey',
      'business_sector'      => 'Text',
      'techinical_viability' => 'Text',
      'planned_investment'   => 'Text',
      'employment_created'   => 'Text',
      'job_categories'       => 'Text',
      'created_at'           => 'Date',
      'updated_at'           => 'Date',
      'created_by'           => 'ForeignKey',
      'updated_by'           => 'Text',
    );
  }
}

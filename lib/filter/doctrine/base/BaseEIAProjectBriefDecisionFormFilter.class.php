<?php

/**
 * EIAProjectBriefDecision filter form base class.
 *
 * @package    rdbeportal
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEIAProjectBriefDecisionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'eiaproject_id'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('EIAProjectDetail'), 'add_empty' => true)),
      'decision'                    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'comments'                    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'processed_by'                => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'all_form'                    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'project_detail'              => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'project_developer'           => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'project_description'         => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'project_surrounding'         => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'project_surrounding_species' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'project_social_economic'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'project_impact_measures'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'project_operation_phase'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'project_attachment'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'token'                       => new sfWidgetFormFilterInput(),
      'created_at'                  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'                  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'created_by'                  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'                  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'eiaproject_id'               => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('EIAProjectDetail'), 'column' => 'id')),
      'decision'                    => new sfValidatorPass(array('required' => false)),
      'comments'                    => new sfValidatorPass(array('required' => false)),
      'processed_by'                => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
      'all_form'                    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'project_detail'              => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'project_developer'           => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'project_description'         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'project_surrounding'         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'project_surrounding_species' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'project_social_economic'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'project_impact_measures'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'project_operation_phase'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'project_attachment'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'token'                       => new sfValidatorPass(array('required' => false)),
      'created_at'                  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'                  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_by'                  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Creator'), 'column' => 'id')),
      'updated_by'                  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('eia_project_brief_decision_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EIAProjectBriefDecision';
  }

  public function getFields()
  {
    return array(
      'id'                          => 'Number',
      'eiaproject_id'               => 'ForeignKey',
      'decision'                    => 'Text',
      'comments'                    => 'Text',
      'processed_by'                => 'ForeignKey',
      'all_form'                    => 'Boolean',
      'project_detail'              => 'Boolean',
      'project_developer'           => 'Boolean',
      'project_description'         => 'Boolean',
      'project_surrounding'         => 'Boolean',
      'project_surrounding_species' => 'Boolean',
      'project_social_economic'     => 'Boolean',
      'project_impact_measures'     => 'Boolean',
      'project_operation_phase'     => 'Boolean',
      'project_attachment'          => 'Boolean',
      'token'                       => 'Text',
      'created_at'                  => 'Date',
      'updated_at'                  => 'Date',
      'created_by'                  => 'ForeignKey',
      'updated_by'                  => 'Text',
    );
  }
}

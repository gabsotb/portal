<?php

/**
 * EIAProjectOperationPhase filter form base class.
 *
 * @package    rdbeportal
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEIAProjectOperationPhaseFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'eiaproject_id'                    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('EIAProjectDetail'), 'add_empty' => true)),
      'domestic_influence'               => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'domestic_wastewater_treatment'    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'domestic_influence_remarks'       => new sfWidgetFormFilterInput(),
      'solid_wastes'                     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'solid_wastes_segregation'         => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'solid_wastes_proper_collection'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'solid_wastes_proper_housekeeping' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'solid_wastes_remarks'             => new sfWidgetFormFilterInput(),
      'increased_traffic'                => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'increased_traffic_rules_adhere'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'increased_traffic_signables'      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'increased_traffice_remarks'       => new sfWidgetFormFilterInput(),
      'fire_risk'                        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'fire_risk_extinguishers'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'fire_risk_exit_stairs'            => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'fire_risk_remarks'                => new sfWidgetFormFilterInput(),
      'token'                            => new sfWidgetFormFilterInput(),
      'created_at'                       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'                       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'created_by'                       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'                       => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'eiaproject_id'                    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('EIAProjectDetail'), 'column' => 'id')),
      'domestic_influence'               => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'domestic_wastewater_treatment'    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'domestic_influence_remarks'       => new sfValidatorPass(array('required' => false)),
      'solid_wastes'                     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'solid_wastes_segregation'         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'solid_wastes_proper_collection'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'solid_wastes_proper_housekeeping' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'solid_wastes_remarks'             => new sfValidatorPass(array('required' => false)),
      'increased_traffic'                => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'increased_traffic_rules_adhere'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'increased_traffic_signables'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'increased_traffice_remarks'       => new sfValidatorPass(array('required' => false)),
      'fire_risk'                        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'fire_risk_extinguishers'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'fire_risk_exit_stairs'            => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'fire_risk_remarks'                => new sfValidatorPass(array('required' => false)),
      'token'                            => new sfValidatorPass(array('required' => false)),
      'created_at'                       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'                       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_by'                       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Creator'), 'column' => 'id')),
      'updated_by'                       => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('eia_project_operation_phase_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EIAProjectOperationPhase';
  }

  public function getFields()
  {
    return array(
      'id'                               => 'Number',
      'eiaproject_id'                    => 'ForeignKey',
      'domestic_influence'               => 'Boolean',
      'domestic_wastewater_treatment'    => 'Boolean',
      'domestic_influence_remarks'       => 'Text',
      'solid_wastes'                     => 'Boolean',
      'solid_wastes_segregation'         => 'Boolean',
      'solid_wastes_proper_collection'   => 'Boolean',
      'solid_wastes_proper_housekeeping' => 'Boolean',
      'solid_wastes_remarks'             => 'Text',
      'increased_traffic'                => 'Boolean',
      'increased_traffic_rules_adhere'   => 'Boolean',
      'increased_traffic_signables'      => 'Boolean',
      'increased_traffice_remarks'       => 'Text',
      'fire_risk'                        => 'Boolean',
      'fire_risk_extinguishers'          => 'Boolean',
      'fire_risk_exit_stairs'            => 'Boolean',
      'fire_risk_remarks'                => 'Text',
      'token'                            => 'Text',
      'created_at'                       => 'Date',
      'updated_at'                       => 'Date',
      'created_by'                       => 'ForeignKey',
      'updated_by'                       => 'Text',
    );
  }
}

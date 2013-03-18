<?php

/**
 * EIAProjectDescription filter form base class.
 *
 * @package    rdbeportal
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEIAProjectDescriptionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'eiaproject_id'                       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('EIAProjectDetail'), 'add_empty' => true)),
      'project_nature'                      => new sfWidgetFormFilterInput(),
      'project_total_cost'                  => new sfWidgetFormFilterInput(),
      'project_working_capital'             => new sfWidgetFormFilterInput(),
      'total_land_area'                     => new sfWidgetFormFilterInput(),
      'existing_land_use'                   => new sfWidgetFormFilterInput(),
      'site_location_developed_area'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'site_location_undeveloped_area'      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'site_location_other'                 => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'site_location_other_specify'         => new sfWidgetFormFilterInput(),
      'land_use_residential'                => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'land_use_industrial'                 => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'land_use_tourism'                    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'land_use_commercial'                 => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'land_use_instituational'             => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'land_use_openspace'                  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'land_use_other'                      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'land_use_other_specify'              => new sfWidgetFormFilterInput(),
      'project_components'                  => new sfWidgetFormFilterInput(),
      'project_activities'                  => new sfWidgetFormFilterInput(),
      'water_demand_during_implementation'  => new sfWidgetFormFilterInput(),
      'water_demand_during_operation'       => new sfWidgetFormFilterInput(),
      'public_water_supply'                 => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'water_treatment'                     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'sewage_system'                       => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'sewage_system_modern'                => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'sewage_system_ecosan'                => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'sewage_system_biogas'                => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'sewage_system_other'                 => new sfWidgetFormFilterInput(),
      'sewage_system_capacity'              => new sfWidgetFormFilterInput(),
      'power_supply_local_electricity'      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'power_supply_own_generator'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'power_supply_local_electricity_size' => new sfWidgetFormFilterInput(),
      'power_supply_own_generator_capacity' => new sfWidgetFormFilterInput(),
      'power_supply_other'                  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'power_supply_other_specify'          => new sfWidgetFormFilterInput(),
      'man_power_employment_implementation' => new sfWidgetFormFilterInput(),
      'man_power_employment_operation'      => new sfWidgetFormFilterInput(),
      'implementation_duration'             => new sfWidgetFormFilterInput(),
      'token'                               => new sfWidgetFormFilterInput(),
      'created_at'                          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'                          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'created_by'                          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'                          => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'eiaproject_id'                       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('EIAProjectDetail'), 'column' => 'id')),
      'project_nature'                      => new sfValidatorPass(array('required' => false)),
      'project_total_cost'                  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'project_working_capital'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'total_land_area'                     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'existing_land_use'                   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'site_location_developed_area'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'site_location_undeveloped_area'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'site_location_other'                 => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'site_location_other_specify'         => new sfValidatorPass(array('required' => false)),
      'land_use_residential'                => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'land_use_industrial'                 => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'land_use_tourism'                    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'land_use_commercial'                 => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'land_use_instituational'             => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'land_use_openspace'                  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'land_use_other'                      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'land_use_other_specify'              => new sfValidatorPass(array('required' => false)),
      'project_components'                  => new sfValidatorPass(array('required' => false)),
      'project_activities'                  => new sfValidatorPass(array('required' => false)),
      'water_demand_during_implementation'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'water_demand_during_operation'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'public_water_supply'                 => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'water_treatment'                     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'sewage_system'                       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'sewage_system_modern'                => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'sewage_system_ecosan'                => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'sewage_system_biogas'                => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'sewage_system_other'                 => new sfValidatorPass(array('required' => false)),
      'sewage_system_capacity'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'power_supply_local_electricity'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'power_supply_own_generator'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'power_supply_local_electricity_size' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'power_supply_own_generator_capacity' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'power_supply_other'                  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'power_supply_other_specify'          => new sfValidatorPass(array('required' => false)),
      'man_power_employment_implementation' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'man_power_employment_operation'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'implementation_duration'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'token'                               => new sfValidatorPass(array('required' => false)),
      'created_at'                          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'                          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_by'                          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Creator'), 'column' => 'id')),
      'updated_by'                          => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('eia_project_description_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EIAProjectDescription';
  }

  public function getFields()
  {
    return array(
      'id'                                  => 'Number',
      'eiaproject_id'                       => 'ForeignKey',
      'project_nature'                      => 'Text',
      'project_total_cost'                  => 'Number',
      'project_working_capital'             => 'Number',
      'total_land_area'                     => 'Number',
      'existing_land_use'                   => 'Number',
      'site_location_developed_area'        => 'Boolean',
      'site_location_undeveloped_area'      => 'Boolean',
      'site_location_other'                 => 'Boolean',
      'site_location_other_specify'         => 'Text',
      'land_use_residential'                => 'Boolean',
      'land_use_industrial'                 => 'Boolean',
      'land_use_tourism'                    => 'Boolean',
      'land_use_commercial'                 => 'Boolean',
      'land_use_instituational'             => 'Boolean',
      'land_use_openspace'                  => 'Boolean',
      'land_use_other'                      => 'Boolean',
      'land_use_other_specify'              => 'Text',
      'project_components'                  => 'Text',
      'project_activities'                  => 'Text',
      'water_demand_during_implementation'  => 'Number',
      'water_demand_during_operation'       => 'Number',
      'public_water_supply'                 => 'Boolean',
      'water_treatment'                     => 'Boolean',
      'sewage_system'                       => 'Boolean',
      'sewage_system_modern'                => 'Boolean',
      'sewage_system_ecosan'                => 'Boolean',
      'sewage_system_biogas'                => 'Boolean',
      'sewage_system_other'                 => 'Text',
      'sewage_system_capacity'              => 'Number',
      'power_supply_local_electricity'      => 'Boolean',
      'power_supply_own_generator'          => 'Boolean',
      'power_supply_local_electricity_size' => 'Number',
      'power_supply_own_generator_capacity' => 'Number',
      'power_supply_other'                  => 'Boolean',
      'power_supply_other_specify'          => 'Text',
      'man_power_employment_implementation' => 'Number',
      'man_power_employment_operation'      => 'Number',
      'implementation_duration'             => 'Number',
      'token'                               => 'Text',
      'created_at'                          => 'Date',
      'updated_at'                          => 'Date',
      'created_by'                          => 'ForeignKey',
      'updated_by'                          => 'Text',
    );
  }
}
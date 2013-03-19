<?php

/**
 * EIAProjectDescription form base class.
 *
 * @method EIAProjectDescription getObject() Returns the current form's model object
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEIAProjectDescriptionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                                  => new sfWidgetFormInputHidden(),
      'eiaproject_id'                       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('EIAProjectDetail'), 'add_empty' => false)),
      'project_nature'                      => new sfWidgetFormInputText(),
      'project_objective'                   => new sfWidgetFormTextarea(),
      'project_total_cost'                  => new sfWidgetFormInputText(),
      'project_working_capital'             => new sfWidgetFormInputText(),
      'total_land_area'                     => new sfWidgetFormInputText(),
      'existing_land_use'                   => new sfWidgetFormInputText(),
      'site_location_developed_area'        => new sfWidgetFormInputCheckbox(),
      'site_location_undeveloped_area'      => new sfWidgetFormInputCheckbox(),
      'site_location_other'                 => new sfWidgetFormInputCheckbox(),
      'site_location_other_specify'         => new sfWidgetFormTextarea(),
      'land_use_residential'                => new sfWidgetFormInputCheckbox(),
      'land_use_industrial'                 => new sfWidgetFormInputCheckbox(),
      'land_use_tourism'                    => new sfWidgetFormInputCheckbox(),
      'land_use_commercial'                 => new sfWidgetFormInputCheckbox(),
      'land_use_instituational'             => new sfWidgetFormInputCheckbox(),
      'land_use_openspace'                  => new sfWidgetFormInputCheckbox(),
      'land_use_other'                      => new sfWidgetFormInputCheckbox(),
      'land_use_other_specify'              => new sfWidgetFormTextarea(),
      'project_components'                  => new sfWidgetFormTextarea(),
      'project_activities'                  => new sfWidgetFormTextarea(),
      'water_demand_during_implementation'  => new sfWidgetFormInputText(),
      'water_demand_during_operation'       => new sfWidgetFormInputText(),
      'public_water_supply'                 => new sfWidgetFormInputCheckbox(),
      'water_treatment'                     => new sfWidgetFormInputCheckbox(),
      'sewage_system'                       => new sfWidgetFormInputCheckbox(),
      'sewage_system_modern'                => new sfWidgetFormInputCheckbox(),
      'sewage_system_ecosan'                => new sfWidgetFormInputCheckbox(),
      'sewage_system_biogas'                => new sfWidgetFormInputCheckbox(),
      'sewage_system_other'                 => new sfWidgetFormInputCheckbox(),
      'sewage_system_other_specify'         => new sfWidgetFormInputText(),
      'sewage_system_capacity'              => new sfWidgetFormInputText(),
      'power_supply_local_electricity'      => new sfWidgetFormInputCheckbox(),
      'power_supply_own_generator'          => new sfWidgetFormInputCheckbox(),
      'power_supply_local_electricity_size' => new sfWidgetFormInputText(),
      'power_supply_own_generator_capacity' => new sfWidgetFormInputText(),
      'power_supply_other'                  => new sfWidgetFormInputCheckbox(),
      'power_supply_other_specify'          => new sfWidgetFormTextarea(),
      'solid_waste_ecological'              => new sfWidgetFormInputCheckbox(),
      'solid_waste_dumpsite'                => new sfWidgetFormInputCheckbox(),
      'solid_waste_municipal'               => new sfWidgetFormInputCheckbox(),
      'solid_waste_others'                  => new sfWidgetFormInputCheckbox(),
      'solid_waste_others_specify'          => new sfWidgetFormTextarea(),
      'man_power_employment_implementation' => new sfWidgetFormInputText(),
      'man_power_employment_operation'      => new sfWidgetFormInputText(),
      'implementation_duration'             => new sfWidgetFormInputText(),
      'token'                               => new sfWidgetFormInputText(),
      'created_at'                          => new sfWidgetFormDateTime(),
      'updated_at'                          => new sfWidgetFormDateTime(),
      'created_by'                          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'                          => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'                                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'eiaproject_id'                       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('EIAProjectDetail'))),
      'project_nature'                      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'project_objective'                   => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
      'project_total_cost'                  => new sfValidatorInteger(array('required' => false)),
      'project_working_capital'             => new sfValidatorInteger(array('required' => false)),
      'total_land_area'                     => new sfValidatorInteger(array('required' => false)),
      'existing_land_use'                   => new sfValidatorInteger(array('required' => false)),
      'site_location_developed_area'        => new sfValidatorBoolean(array('required' => false)),
      'site_location_undeveloped_area'      => new sfValidatorBoolean(array('required' => false)),
      'site_location_other'                 => new sfValidatorBoolean(array('required' => false)),
      'site_location_other_specify'         => new sfValidatorString(array('max_length' => 400, 'required' => false)),
      'land_use_residential'                => new sfValidatorBoolean(array('required' => false)),
      'land_use_industrial'                 => new sfValidatorBoolean(array('required' => false)),
      'land_use_tourism'                    => new sfValidatorBoolean(array('required' => false)),
      'land_use_commercial'                 => new sfValidatorBoolean(array('required' => false)),
      'land_use_instituational'             => new sfValidatorBoolean(array('required' => false)),
      'land_use_openspace'                  => new sfValidatorBoolean(array('required' => false)),
      'land_use_other'                      => new sfValidatorBoolean(array('required' => false)),
      'land_use_other_specify'              => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
      'project_components'                  => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
      'project_activities'                  => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
      'water_demand_during_implementation'  => new sfValidatorInteger(array('required' => false)),
      'water_demand_during_operation'       => new sfValidatorInteger(array('required' => false)),
      'public_water_supply'                 => new sfValidatorBoolean(array('required' => false)),
      'water_treatment'                     => new sfValidatorBoolean(array('required' => false)),
      'sewage_system'                       => new sfValidatorBoolean(array('required' => false)),
      'sewage_system_modern'                => new sfValidatorBoolean(array('required' => false)),
      'sewage_system_ecosan'                => new sfValidatorBoolean(array('required' => false)),
      'sewage_system_biogas'                => new sfValidatorBoolean(array('required' => false)),
      'sewage_system_other'                 => new sfValidatorBoolean(array('required' => false)),
      'sewage_system_other_specify'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'sewage_system_capacity'              => new sfValidatorInteger(array('required' => false)),
      'power_supply_local_electricity'      => new sfValidatorBoolean(array('required' => false)),
      'power_supply_own_generator'          => new sfValidatorBoolean(array('required' => false)),
      'power_supply_local_electricity_size' => new sfValidatorInteger(array('required' => false)),
      'power_supply_own_generator_capacity' => new sfValidatorInteger(array('required' => false)),
      'power_supply_other'                  => new sfValidatorBoolean(array('required' => false)),
      'power_supply_other_specify'          => new sfValidatorString(array('max_length' => 400, 'required' => false)),
      'solid_waste_ecological'              => new sfValidatorBoolean(array('required' => false)),
      'solid_waste_dumpsite'                => new sfValidatorBoolean(array('required' => false)),
      'solid_waste_municipal'               => new sfValidatorBoolean(array('required' => false)),
      'solid_waste_others'                  => new sfValidatorBoolean(array('required' => false)),
      'solid_waste_others_specify'          => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
      'man_power_employment_implementation' => new sfValidatorInteger(array('required' => false)),
      'man_power_employment_operation'      => new sfValidatorInteger(array('required' => false)),
      'implementation_duration'             => new sfValidatorInteger(array('required' => false)),
      'token'                               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'                          => new sfValidatorDateTime(),
      'updated_at'                          => new sfValidatorDateTime(),
      'created_by'                          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'required' => false)),
      'updated_by'                          => new sfValidatorString(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'EIAProjectDescription', 'column' => array('eiaproject_id')))
    );

    $this->widgetSchema->setNameFormat('eia_project_description[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EIAProjectDescription';
  }

}

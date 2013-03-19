<?php

/**
 * EIAProjectImpactMeasures form base class.
 *
 * @method EIAProjectImpactMeasures getObject() Returns the current form's model object
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEIAProjectImpactMeasuresForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                                         => new sfWidgetFormInputHidden(),
      'eiaproject_id'                              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('EIAProjectDetail'), 'add_empty' => false)),
      'dust_generation'                            => new sfWidgetFormInputCheckbox(),
      'dust_generation_watering'                   => new sfWidgetFormInputCheckbox(),
      'dust_generation_remove_soil'                => new sfWidgetFormInputCheckbox(),
      'dust_generation_hauling_trucks'             => new sfWidgetFormInputCheckbox(),
      'dust_generation_temporary_fence'            => new sfWidgetFormInputCheckbox(),
      'dust_generation_remarks'                    => new sfWidgetFormInputCheckbox(),
      'soil_removal'                               => new sfWidgetFormInputCheckbox(),
      'soil_removal_mitigate_stockpile'            => new sfWidgetFormInputCheckbox(),
      'soil_removal_mitigate_revegetate'           => new sfWidgetFormInputCheckbox(),
      'soil_removal_remarks'                       => new sfWidgetFormInputText(),
      'erosion_from_cuts'                          => new sfWidgetFormInputCheckbox(),
      'erosion_mitigate_construct_dryseason'       => new sfWidgetFormInputCheckbox(),
      'erosion_mitigate_avoid_exposure'            => new sfWidgetFormInputCheckbox(),
      'erosion_mitigate_barrier_nets'              => new sfWidgetFormInputCheckbox(),
      'erosion_remarks'                            => new sfWidgetFormInputText(),
      'sedimentation'                              => new sfWidgetFormInputCheckbox(),
      'sedimentation_mitigate_silt_trap'           => new sfWidgetFormInputCheckbox(),
      'sedimentation_mitigate_proper_stockpilling' => new sfWidgetFormInputCheckbox(),
      'sedimentation_mitigate_filling_materials'   => new sfWidgetFormInputCheckbox(),
      'sedimentation_remarks'                      => new sfWidgetFormInputText(),
      'pollution'                                  => new sfWidgetFormInputCheckbox(),
      'pollution_mitigate_temporary_disposal'      => new sfWidgetFormInputCheckbox(),
      'pollution_mitigate_toilet_facilities'       => new sfWidgetFormInputCheckbox(),
      'pollution_mitigate_contract_observe'        => new sfWidgetFormInputCheckbox(),
      'pollution_remarks'                          => new sfWidgetFormInputText(),
      'vegetation_loss'                            => new sfWidgetFormInputCheckbox(),
      'vegetation_limit_clearing'                  => new sfWidgetFormInputCheckbox(),
      'vegetation_provide_clearing'                => new sfWidgetFormInputCheckbox(),
      'vegetation_use_markers'                     => new sfWidgetFormInputCheckbox(),
      'vegetation_replant'                         => new sfWidgetFormInputCheckbox(),
      'vegetation_remarks'                         => new sfWidgetFormInputText(),
      'disturbance'                                => new sfWidgetFormInputCheckbox(),
      'disturbance_reestablish'                    => new sfWidgetFormInputCheckbox(),
      'disturbance_schedule'                       => new sfWidgetFormInputCheckbox(),
      'disturbance_maintenance'                    => new sfWidgetFormInputCheckbox(),
      'disturbance_remarks'                        => new sfWidgetFormInputText(),
      'noise_generation'                           => new sfWidgetFormInputCheckbox(),
      'nosie_generation_schedule'                  => new sfWidgetFormInputCheckbox(),
      'noise_generation_undertake'                 => new sfWidgetFormInputCheckbox(),
      'noise_generation_remark'                    => new sfWidgetFormInputText(),
      'generation_employment'                      => new sfWidgetFormInputCheckbox(),
      'generation_employment_hiring'               => new sfWidgetFormInputCheckbox(),
      'generation_employment_remarks'              => new sfWidgetFormInputCheckbox(),
      'conflicts'                                  => new sfWidgetFormInputCheckbox(),
      'conflict_conslutation'                      => new sfWidgetFormInputCheckbox(),
      'conflict_remarks'                           => new sfWidgetFormInputText(),
      'traffic_congestion'                         => new sfWidgetFormInputCheckbox(),
      'traffic_rules_adherance'                    => new sfWidgetFormInputCheckbox(),
      'traffice_aid_provision'                     => new sfWidgetFormInputCheckbox(),
      'traffic_congestion_remarks'                 => new sfWidgetFormInputText(),
      'crimes_accidents'                           => new sfWidgetFormInputCheckbox(),
      'crimes_accidents_safety_rules'              => new sfWidgetFormInputCheckbox(),
      'crime_accidents_remarks'                    => new sfWidgetFormInputCheckbox(),
      'token'                                      => new sfWidgetFormInputText(),
      'created_at'                                 => new sfWidgetFormDateTime(),
      'updated_at'                                 => new sfWidgetFormDateTime(),
      'created_by'                                 => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'                                 => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'                                         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'eiaproject_id'                              => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('EIAProjectDetail'))),
      'dust_generation'                            => new sfValidatorBoolean(array('required' => false)),
      'dust_generation_watering'                   => new sfValidatorBoolean(array('required' => false)),
      'dust_generation_remove_soil'                => new sfValidatorBoolean(array('required' => false)),
      'dust_generation_hauling_trucks'             => new sfValidatorBoolean(array('required' => false)),
      'dust_generation_temporary_fence'            => new sfValidatorBoolean(array('required' => false)),
      'dust_generation_remarks'                    => new sfValidatorBoolean(array('required' => false)),
      'soil_removal'                               => new sfValidatorBoolean(array('required' => false)),
      'soil_removal_mitigate_stockpile'            => new sfValidatorBoolean(array('required' => false)),
      'soil_removal_mitigate_revegetate'           => new sfValidatorBoolean(array('required' => false)),
      'soil_removal_remarks'                       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'erosion_from_cuts'                          => new sfValidatorBoolean(array('required' => false)),
      'erosion_mitigate_construct_dryseason'       => new sfValidatorBoolean(array('required' => false)),
      'erosion_mitigate_avoid_exposure'            => new sfValidatorBoolean(array('required' => false)),
      'erosion_mitigate_barrier_nets'              => new sfValidatorBoolean(array('required' => false)),
      'erosion_remarks'                            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'sedimentation'                              => new sfValidatorBoolean(array('required' => false)),
      'sedimentation_mitigate_silt_trap'           => new sfValidatorBoolean(array('required' => false)),
      'sedimentation_mitigate_proper_stockpilling' => new sfValidatorBoolean(array('required' => false)),
      'sedimentation_mitigate_filling_materials'   => new sfValidatorBoolean(array('required' => false)),
      'sedimentation_remarks'                      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'pollution'                                  => new sfValidatorBoolean(array('required' => false)),
      'pollution_mitigate_temporary_disposal'      => new sfValidatorBoolean(array('required' => false)),
      'pollution_mitigate_toilet_facilities'       => new sfValidatorBoolean(array('required' => false)),
      'pollution_mitigate_contract_observe'        => new sfValidatorBoolean(array('required' => false)),
      'pollution_remarks'                          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'vegetation_loss'                            => new sfValidatorBoolean(array('required' => false)),
      'vegetation_limit_clearing'                  => new sfValidatorBoolean(array('required' => false)),
      'vegetation_provide_clearing'                => new sfValidatorBoolean(array('required' => false)),
      'vegetation_use_markers'                     => new sfValidatorBoolean(array('required' => false)),
      'vegetation_replant'                         => new sfValidatorBoolean(array('required' => false)),
      'vegetation_remarks'                         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'disturbance'                                => new sfValidatorBoolean(array('required' => false)),
      'disturbance_reestablish'                    => new sfValidatorBoolean(array('required' => false)),
      'disturbance_schedule'                       => new sfValidatorBoolean(array('required' => false)),
      'disturbance_maintenance'                    => new sfValidatorBoolean(array('required' => false)),
      'disturbance_remarks'                        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'noise_generation'                           => new sfValidatorBoolean(array('required' => false)),
      'nosie_generation_schedule'                  => new sfValidatorBoolean(array('required' => false)),
      'noise_generation_undertake'                 => new sfValidatorBoolean(array('required' => false)),
      'noise_generation_remark'                    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'generation_employment'                      => new sfValidatorBoolean(array('required' => false)),
      'generation_employment_hiring'               => new sfValidatorBoolean(array('required' => false)),
      'generation_employment_remarks'              => new sfValidatorBoolean(array('required' => false)),
      'conflicts'                                  => new sfValidatorBoolean(array('required' => false)),
      'conflict_conslutation'                      => new sfValidatorBoolean(array('required' => false)),
      'conflict_remarks'                           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'traffic_congestion'                         => new sfValidatorBoolean(array('required' => false)),
      'traffic_rules_adherance'                    => new sfValidatorBoolean(array('required' => false)),
      'traffice_aid_provision'                     => new sfValidatorBoolean(array('required' => false)),
      'traffic_congestion_remarks'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'crimes_accidents'                           => new sfValidatorBoolean(array('required' => false)),
      'crimes_accidents_safety_rules'              => new sfValidatorBoolean(array('required' => false)),
      'crime_accidents_remarks'                    => new sfValidatorBoolean(array('required' => false)),
      'token'                                      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'                                 => new sfValidatorDateTime(),
      'updated_at'                                 => new sfValidatorDateTime(),
      'created_by'                                 => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'required' => false)),
      'updated_by'                                 => new sfValidatorString(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'EIAProjectImpactMeasures', 'column' => array('eiaproject_id')))
    );

    $this->widgetSchema->setNameFormat('eia_project_impact_measures[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EIAProjectImpactMeasures';
  }

}

<?php

/**
 * EIAProjectSurrounding form base class.
 *
 * @method EIAProjectSurrounding getObject() Returns the current form's model object
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEIAProjectSurroundingForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                            => new sfWidgetFormInputHidden(),
      'eiaproject_id'                 => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('EIAProjectDetail'), 'add_empty' => false)),
      'project_general_elevation'     => new sfWidgetFormInputText(),
      'soil_erosion'                  => new sfWidgetFormInputCheckbox(),
      'soil_erosion_heavy_rains'      => new sfWidgetFormInputCheckbox(),
      'soil_erosion_unstable'         => new sfWidgetFormInputCheckbox(),
      'soil_erosion_others'           => new sfWidgetFormInputCheckbox(),
      'soil_erosion_others_specify'   => new sfWidgetFormInputText(),
      'existing_water_body'           => new sfWidgetFormInputCheckbox(),
      'existing_water_body_remark'    => new sfWidgetFormInputText(),
      'access_road'                   => new sfWidgetFormInputCheckbox(),
      'access_road_distance'          => new sfWidgetFormInputText(),
      'access_road_type'              => new sfWidgetFormInputText(),
      'site_conform_approval'         => new sfWidgetFormInputCheckbox(),
      'site_conform_remark'           => new sfWidgetFormInputText(),
      'site_existing_structure'       => new sfWidgetFormInputCheckbox(),
      'site_existing_remark'          => new sfWidgetFormInputText(),
      'land_use_agriculture'          => new sfWidgetFormInputCheckbox(),
      'land_use_grassland'            => new sfWidgetFormInputCheckbox(),
      'land_use_builtup'              => new sfWidgetFormInputCheckbox(),
      'land_use_marshland'            => new sfWidgetFormInputCheckbox(),
      'land_use_other'                => new sfWidgetFormInputCheckbox(),
      'land_use_other_specify'        => new sfWidgetFormInputText(),
      'existing_trees'                => new sfWidgetFormInputCheckbox(),
      'existing_trees_remark'         => new sfWidgetFormInputText(),
      'wildlife_existing'             => new sfWidgetFormInputCheckbox(),
      'wildlife_existing_remark'      => new sfWidgetFormInputText(),
      'fishery_existing'              => new sfWidgetFormInputCheckbox(),
      'fishery_existing_remark'       => new sfWidgetFormInputText(),
      'watershed_existing'            => new sfWidgetFormInputCheckbox(),
      'watershed_near_distance'       => new sfWidgetFormInputText(),
      'watershed_near_distance_units' => new sfWidgetFormTextarea(),
      'watershed_within_name'         => new sfWidgetFormInputText(),
      'token'                         => new sfWidgetFormInputText(),
      'created_at'                    => new sfWidgetFormDateTime(),
      'updated_at'                    => new sfWidgetFormDateTime(),
      'created_by'                    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'                    => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'                            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'eiaproject_id'                 => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('EIAProjectDetail'))),
      'project_general_elevation'     => new sfValidatorInteger(array('required' => false)),
      'soil_erosion'                  => new sfValidatorBoolean(array('required' => false)),
      'soil_erosion_heavy_rains'      => new sfValidatorBoolean(array('required' => false)),
      'soil_erosion_unstable'         => new sfValidatorBoolean(array('required' => false)),
      'soil_erosion_others'           => new sfValidatorBoolean(array('required' => false)),
      'soil_erosion_others_specify'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'existing_water_body'           => new sfValidatorBoolean(array('required' => false)),
      'existing_water_body_remark'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'access_road'                   => new sfValidatorBoolean(array('required' => false)),
      'access_road_distance'          => new sfValidatorInteger(array('required' => false)),
      'access_road_type'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'site_conform_approval'         => new sfValidatorBoolean(array('required' => false)),
      'site_conform_remark'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'site_existing_structure'       => new sfValidatorBoolean(array('required' => false)),
      'site_existing_remark'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'land_use_agriculture'          => new sfValidatorBoolean(array('required' => false)),
      'land_use_grassland'            => new sfValidatorBoolean(array('required' => false)),
      'land_use_builtup'              => new sfValidatorBoolean(array('required' => false)),
      'land_use_marshland'            => new sfValidatorBoolean(array('required' => false)),
      'land_use_other'                => new sfValidatorBoolean(array('required' => false)),
      'land_use_other_specify'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'existing_trees'                => new sfValidatorBoolean(array('required' => false)),
      'existing_trees_remark'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'wildlife_existing'             => new sfValidatorBoolean(array('required' => false)),
      'wildlife_existing_remark'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'fishery_existing'              => new sfValidatorBoolean(array('required' => false)),
      'fishery_existing_remark'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'watershed_existing'            => new sfValidatorBoolean(array('required' => false)),
      'watershed_near_distance'       => new sfValidatorInteger(array('required' => false)),
      'watershed_near_distance_units' => new sfValidatorString(array('required' => false)),
      'watershed_within_name'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'token'                         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'                    => new sfValidatorDateTime(),
      'updated_at'                    => new sfValidatorDateTime(),
      'created_by'                    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'required' => false)),
      'updated_by'                    => new sfValidatorString(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'EIAProjectSurrounding', 'column' => array('eiaproject_id')))
    );

    $this->widgetSchema->setNameFormat('eia_project_surrounding[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EIAProjectSurrounding';
  }

}

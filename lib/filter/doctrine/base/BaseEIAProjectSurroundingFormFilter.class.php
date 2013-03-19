<?php

/**
 * EIAProjectSurrounding filter form base class.
 *
 * @package    rdbeportal
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEIAProjectSurroundingFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'eiaproject_id'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('EIAProjectDetail'), 'add_empty' => true)),
      'project_general_elevation'   => new sfWidgetFormFilterInput(),
      'soil_erosion'                => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'soil_erosion_heavy_rains'    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'soil_erosion_unstable'       => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'soil_erosion_others'         => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'soil_erosion_others_specify' => new sfWidgetFormFilterInput(),
      'existing_water_body'         => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'existing_water_body_remark'  => new sfWidgetFormFilterInput(),
      'access_road'                 => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'access_road_distance'        => new sfWidgetFormFilterInput(),
      'access_road_type'            => new sfWidgetFormFilterInput(),
      'site_conform_approval'       => new sfWidgetFormFilterInput(),
      'site_conform_remark'         => new sfWidgetFormFilterInput(),
      'site_existing_structure'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'site_existing_remark'        => new sfWidgetFormFilterInput(),
      'land_use_agriculture'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'land_use_grassland'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'land_use_builtup'            => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'land_use_marshland'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'land_use_other'              => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'land_use_other_specify'      => new sfWidgetFormFilterInput(),
      'existing_trees'              => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'existing_trees_remark'       => new sfWidgetFormFilterInput(),
      'wildlife_existing'           => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'wildlife_existing_remark'    => new sfWidgetFormFilterInput(),
      'fishery_existing'            => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'fishery_existing_remark'     => new sfWidgetFormFilterInput(),
      'watershed_existing'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'watershed_existing_remark'   => new sfWidgetFormFilterInput(),
      'watershed_near_name'         => new sfWidgetFormFilterInput(),
      'watershed_within_name'       => new sfWidgetFormFilterInput(),
      'token'                       => new sfWidgetFormFilterInput(),
      'created_at'                  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'                  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'created_by'                  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'                  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'eiaproject_id'               => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('EIAProjectDetail'), 'column' => 'id')),
      'project_general_elevation'   => new sfValidatorPass(array('required' => false)),
      'soil_erosion'                => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'soil_erosion_heavy_rains'    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'soil_erosion_unstable'       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'soil_erosion_others'         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'soil_erosion_others_specify' => new sfValidatorPass(array('required' => false)),
      'existing_water_body'         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'existing_water_body_remark'  => new sfValidatorPass(array('required' => false)),
      'access_road'                 => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'access_road_distance'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'access_road_type'            => new sfValidatorPass(array('required' => false)),
      'site_conform_approval'       => new sfValidatorPass(array('required' => false)),
      'site_conform_remark'         => new sfValidatorPass(array('required' => false)),
      'site_existing_structure'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'site_existing_remark'        => new sfValidatorPass(array('required' => false)),
      'land_use_agriculture'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'land_use_grassland'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'land_use_builtup'            => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'land_use_marshland'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'land_use_other'              => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'land_use_other_specify'      => new sfValidatorPass(array('required' => false)),
      'existing_trees'              => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'existing_trees_remark'       => new sfValidatorPass(array('required' => false)),
      'wildlife_existing'           => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'wildlife_existing_remark'    => new sfValidatorPass(array('required' => false)),
      'fishery_existing'            => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'fishery_existing_remark'     => new sfValidatorPass(array('required' => false)),
      'watershed_existing'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'watershed_existing_remark'   => new sfValidatorPass(array('required' => false)),
      'watershed_near_name'         => new sfValidatorPass(array('required' => false)),
      'watershed_within_name'       => new sfValidatorPass(array('required' => false)),
      'token'                       => new sfValidatorPass(array('required' => false)),
      'created_at'                  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'                  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_by'                  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Creator'), 'column' => 'id')),
      'updated_by'                  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('eia_project_surrounding_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EIAProjectSurrounding';
  }

  public function getFields()
  {
    return array(
      'id'                          => 'Number',
      'eiaproject_id'               => 'ForeignKey',
      'project_general_elevation'   => 'Text',
      'soil_erosion'                => 'Boolean',
      'soil_erosion_heavy_rains'    => 'Boolean',
      'soil_erosion_unstable'       => 'Boolean',
      'soil_erosion_others'         => 'Boolean',
      'soil_erosion_others_specify' => 'Text',
      'existing_water_body'         => 'Boolean',
      'existing_water_body_remark'  => 'Text',
      'access_road'                 => 'Boolean',
      'access_road_distance'        => 'Number',
      'access_road_type'            => 'Text',
      'site_conform_approval'       => 'Text',
      'site_conform_remark'         => 'Text',
      'site_existing_structure'     => 'Boolean',
      'site_existing_remark'        => 'Text',
      'land_use_agriculture'        => 'Boolean',
      'land_use_grassland'          => 'Boolean',
      'land_use_builtup'            => 'Boolean',
      'land_use_marshland'          => 'Boolean',
      'land_use_other'              => 'Boolean',
      'land_use_other_specify'      => 'Text',
      'existing_trees'              => 'Boolean',
      'existing_trees_remark'       => 'Text',
      'wildlife_existing'           => 'Boolean',
      'wildlife_existing_remark'    => 'Text',
      'fishery_existing'            => 'Boolean',
      'fishery_existing_remark'     => 'Text',
      'watershed_existing'          => 'Boolean',
      'watershed_existing_remark'   => 'Text',
      'watershed_near_name'         => 'Text',
      'watershed_within_name'       => 'Text',
      'token'                       => 'Text',
      'created_at'                  => 'Date',
      'updated_at'                  => 'Date',
      'created_by'                  => 'ForeignKey',
      'updated_by'                  => 'Text',
    );
  }
}

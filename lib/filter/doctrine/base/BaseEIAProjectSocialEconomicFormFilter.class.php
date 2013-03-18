<?php

/**
 * EIAProjectSocialEconomic filter form base class.
 *
 * @package    rdbeportal
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEIAProjectSocialEconomicFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'eiaproject_id'                  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('EIAProjectDetail'), 'add_empty' => true)),
      'existing_settlements'           => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'existing_settlements_remark'    => new sfWidgetFormFilterInput(),
      'average_family_size'            => new sfWidgetFormFilterInput(),
      'average_family_size_remark'     => new sfWidgetFormFilterInput(),
      'livelihood_farming'             => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'livelihood_fishing'             => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'livelihood_vending'             => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'livelihood_others'              => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'livelihood_others_specify'      => new sfWidgetFormFilterInput(),
      'local_organization'             => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'local_organization_description' => new sfWidgetFormFilterInput(),
      'social_infrastructures'         => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'social_health_centers'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'social_hospital'                => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'social_transportation'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'social_communication'           => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'social_churches'                => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'social_roads'                   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'social_others'                  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'social_others_specify'          => new sfWidgetFormFilterInput(),
      'token'                          => new sfWidgetFormFilterInput(),
      'created_at'                     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'                     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'created_by'                     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'                     => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'eiaproject_id'                  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('EIAProjectDetail'), 'column' => 'id')),
      'existing_settlements'           => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'existing_settlements_remark'    => new sfValidatorPass(array('required' => false)),
      'average_family_size'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'average_family_size_remark'     => new sfValidatorPass(array('required' => false)),
      'livelihood_farming'             => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'livelihood_fishing'             => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'livelihood_vending'             => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'livelihood_others'              => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'livelihood_others_specify'      => new sfValidatorPass(array('required' => false)),
      'local_organization'             => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'local_organization_description' => new sfValidatorPass(array('required' => false)),
      'social_infrastructures'         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'social_health_centers'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'social_hospital'                => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'social_transportation'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'social_communication'           => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'social_churches'                => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'social_roads'                   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'social_others'                  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'social_others_specify'          => new sfValidatorPass(array('required' => false)),
      'token'                          => new sfValidatorPass(array('required' => false)),
      'created_at'                     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'                     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_by'                     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Creator'), 'column' => 'id')),
      'updated_by'                     => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('eia_project_social_economic_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EIAProjectSocialEconomic';
  }

  public function getFields()
  {
    return array(
      'id'                             => 'Number',
      'eiaproject_id'                  => 'ForeignKey',
      'existing_settlements'           => 'Boolean',
      'existing_settlements_remark'    => 'Text',
      'average_family_size'            => 'Number',
      'average_family_size_remark'     => 'Text',
      'livelihood_farming'             => 'Boolean',
      'livelihood_fishing'             => 'Boolean',
      'livelihood_vending'             => 'Boolean',
      'livelihood_others'              => 'Boolean',
      'livelihood_others_specify'      => 'Text',
      'local_organization'             => 'Boolean',
      'local_organization_description' => 'Text',
      'social_infrastructures'         => 'Boolean',
      'social_health_centers'          => 'Boolean',
      'social_hospital'                => 'Boolean',
      'social_transportation'          => 'Boolean',
      'social_communication'           => 'Boolean',
      'social_churches'                => 'Boolean',
      'social_roads'                   => 'Boolean',
      'social_others'                  => 'Boolean',
      'social_others_specify'          => 'Text',
      'token'                          => 'Text',
      'created_at'                     => 'Date',
      'updated_at'                     => 'Date',
      'created_by'                     => 'ForeignKey',
      'updated_by'                     => 'Text',
    );
  }
}

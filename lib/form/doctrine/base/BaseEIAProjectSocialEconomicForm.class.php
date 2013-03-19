<?php

/**
 * EIAProjectSocialEconomic form base class.
 *
 * @method EIAProjectSocialEconomic getObject() Returns the current form's model object
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEIAProjectSocialEconomicForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                             => new sfWidgetFormInputHidden(),
      'eiaproject_id'                  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('EIAProjectDetail'), 'add_empty' => false)),
      'existing_settlements'           => new sfWidgetFormInputCheckbox(),
      'existing_settlements_remark'    => new sfWidgetFormTextarea(),
      'average_family_size'            => new sfWidgetFormInputText(),
      'average_family_size_remark'     => new sfWidgetFormTextarea(),
      'livelihood_farming'             => new sfWidgetFormInputCheckbox(),
      'livelihood_fishing'             => new sfWidgetFormInputCheckbox(),
      'livelihood_vending'             => new sfWidgetFormInputCheckbox(),
      'livelihood_others'              => new sfWidgetFormInputCheckbox(),
      'livelihood_others_specify'      => new sfWidgetFormTextarea(),
      'livelihood_remarks'             => new sfWidgetFormTextarea(),
      'local_organization'             => new sfWidgetFormInputCheckbox(),
      'local_organization_description' => new sfWidgetFormTextarea(),
      'social_infrastructures'         => new sfWidgetFormInputCheckbox(),
      'social_schools'                 => new sfWidgetFormInputCheckbox(),
      'social_health_centers'          => new sfWidgetFormInputCheckbox(),
      'social_hospital'                => new sfWidgetFormInputCheckbox(),
      'social_transportation'          => new sfWidgetFormInputCheckbox(),
      'social_communication'           => new sfWidgetFormInputCheckbox(),
      'social_churches'                => new sfWidgetFormInputCheckbox(),
      'social_roads'                   => new sfWidgetFormInputCheckbox(),
      'social_others'                  => new sfWidgetFormInputCheckbox(),
      'social_others_specify'          => new sfWidgetFormTextarea(),
      'token'                          => new sfWidgetFormInputText(),
      'created_at'                     => new sfWidgetFormDateTime(),
      'updated_at'                     => new sfWidgetFormDateTime(),
      'created_by'                     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'                     => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'                             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'eiaproject_id'                  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('EIAProjectDetail'))),
      'existing_settlements'           => new sfValidatorBoolean(array('required' => false)),
      'existing_settlements_remark'    => new sfValidatorString(array('max_length' => 800, 'required' => false)),
      'average_family_size'            => new sfValidatorInteger(array('required' => false)),
      'average_family_size_remark'     => new sfValidatorString(array('max_length' => 800, 'required' => false)),
      'livelihood_farming'             => new sfValidatorBoolean(array('required' => false)),
      'livelihood_fishing'             => new sfValidatorBoolean(array('required' => false)),
      'livelihood_vending'             => new sfValidatorBoolean(array('required' => false)),
      'livelihood_others'              => new sfValidatorBoolean(array('required' => false)),
      'livelihood_others_specify'      => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
      'livelihood_remarks'             => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
      'local_organization'             => new sfValidatorBoolean(array('required' => false)),
      'local_organization_description' => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
      'social_infrastructures'         => new sfValidatorBoolean(array('required' => false)),
      'social_schools'                 => new sfValidatorBoolean(array('required' => false)),
      'social_health_centers'          => new sfValidatorBoolean(array('required' => false)),
      'social_hospital'                => new sfValidatorBoolean(array('required' => false)),
      'social_transportation'          => new sfValidatorBoolean(array('required' => false)),
      'social_communication'           => new sfValidatorBoolean(array('required' => false)),
      'social_churches'                => new sfValidatorBoolean(array('required' => false)),
      'social_roads'                   => new sfValidatorBoolean(array('required' => false)),
      'social_others'                  => new sfValidatorBoolean(array('required' => false)),
      'social_others_specify'          => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
      'token'                          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'                     => new sfValidatorDateTime(),
      'updated_at'                     => new sfValidatorDateTime(),
      'created_by'                     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'required' => false)),
      'updated_by'                     => new sfValidatorString(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'EIAProjectSocialEconomic', 'column' => array('eiaproject_id')))
    );

    $this->widgetSchema->setNameFormat('eia_project_social_economic[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EIAProjectSocialEconomic';
  }

}

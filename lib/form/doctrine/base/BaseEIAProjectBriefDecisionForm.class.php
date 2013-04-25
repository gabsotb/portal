<?php

/**
 * EIAProjectBriefDecision form base class.
 *
 * @method EIAProjectBriefDecision getObject() Returns the current form's model object
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEIAProjectBriefDecisionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                          => new sfWidgetFormInputHidden(),
      'eiaproject_id'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('EIAProjectDetail'), 'add_empty' => false)),
      'decision'                    => new sfWidgetFormInputText(),
      'comments'                    => new sfWidgetFormInputText(),
      'processed_by'                => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => false)),
      'all_form'                    => new sfWidgetFormInputCheckbox(),
      'project_detail'              => new sfWidgetFormInputCheckbox(),
      'project_developer'           => new sfWidgetFormInputCheckbox(),
      'project_description'         => new sfWidgetFormInputCheckbox(),
      'project_surrounding'         => new sfWidgetFormInputCheckbox(),
      'project_surrounding_species' => new sfWidgetFormInputCheckbox(),
      'project_social_economic'     => new sfWidgetFormInputCheckbox(),
      'project_impact_measures'     => new sfWidgetFormInputCheckbox(),
      'project_operation_phase'     => new sfWidgetFormInputCheckbox(),
      'project_attachment'          => new sfWidgetFormInputCheckbox(),
      'token'                       => new sfWidgetFormInputText(),
      'created_at'                  => new sfWidgetFormDateTime(),
      'updated_at'                  => new sfWidgetFormDateTime(),
      'created_by'                  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'                  => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'                          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'eiaproject_id'               => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('EIAProjectDetail'))),
      'decision'                    => new sfValidatorString(array('max_length' => 255)),
      'comments'                    => new sfValidatorString(array('max_length' => 255)),
      'processed_by'                => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'))),
      'all_form'                    => new sfValidatorBoolean(array('required' => false)),
      'project_detail'              => new sfValidatorBoolean(array('required' => false)),
      'project_developer'           => new sfValidatorBoolean(array('required' => false)),
      'project_description'         => new sfValidatorBoolean(array('required' => false)),
      'project_surrounding'         => new sfValidatorBoolean(array('required' => false)),
      'project_surrounding_species' => new sfValidatorBoolean(array('required' => false)),
      'project_social_economic'     => new sfValidatorBoolean(array('required' => false)),
      'project_impact_measures'     => new sfValidatorBoolean(array('required' => false)),
      'project_operation_phase'     => new sfValidatorBoolean(array('required' => false)),
      'project_attachment'          => new sfValidatorBoolean(array('required' => false)),
      'token'                       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'                  => new sfValidatorDateTime(),
      'updated_at'                  => new sfValidatorDateTime(),
      'created_by'                  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'required' => false)),
      'updated_by'                  => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('eia_project_brief_decision[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EIAProjectBriefDecision';
  }

}

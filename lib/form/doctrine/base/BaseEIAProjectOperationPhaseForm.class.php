<?php

/**
 * EIAProjectOperationPhase form base class.
 *
 * @method EIAProjectOperationPhase getObject() Returns the current form's model object
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEIAProjectOperationPhaseForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                               => new sfWidgetFormInputHidden(),
      'eiaproject_id'                    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('EIAProjectDetail'), 'add_empty' => false)),
      'domestic_influence'               => new sfWidgetFormInputCheckbox(),
      'domestic_wastewater_treatment'    => new sfWidgetFormInputCheckbox(),
      'domestic_influence_remarks'       => new sfWidgetFormInputText(),
      'solid_wastes'                     => new sfWidgetFormInputCheckbox(),
      'solid_wastes_segregation'         => new sfWidgetFormInputCheckbox(),
      'solid_wastes_proper_collection'   => new sfWidgetFormInputCheckbox(),
      'solid_wastes_proper_housekeeping' => new sfWidgetFormInputCheckbox(),
      'solid_wastes_remarks'             => new sfWidgetFormInputText(),
      'increased_traffic'                => new sfWidgetFormInputCheckbox(),
      'increased_traffic_rules_adhere'   => new sfWidgetFormInputCheckbox(),
      'increased_traffic_signables'      => new sfWidgetFormInputCheckbox(),
      'increased_traffice_remarks'       => new sfWidgetFormInputText(),
      'fire_risk'                        => new sfWidgetFormInputCheckbox(),
      'fire_risk_extinguishers'          => new sfWidgetFormInputCheckbox(),
      'fire_risk_exit_stairs'            => new sfWidgetFormInputCheckbox(),
      'fire_risk_remarks'                => new sfWidgetFormInputText(),
      'token'                            => new sfWidgetFormInputText(),
      'created_at'                       => new sfWidgetFormDateTime(),
      'updated_at'                       => new sfWidgetFormDateTime(),
      'created_by'                       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'                       => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'                               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'eiaproject_id'                    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('EIAProjectDetail'))),
      'domestic_influence'               => new sfValidatorBoolean(array('required' => false)),
      'domestic_wastewater_treatment'    => new sfValidatorBoolean(array('required' => false)),
      'domestic_influence_remarks'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'solid_wastes'                     => new sfValidatorBoolean(array('required' => false)),
      'solid_wastes_segregation'         => new sfValidatorBoolean(array('required' => false)),
      'solid_wastes_proper_collection'   => new sfValidatorBoolean(array('required' => false)),
      'solid_wastes_proper_housekeeping' => new sfValidatorBoolean(array('required' => false)),
      'solid_wastes_remarks'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'increased_traffic'                => new sfValidatorBoolean(array('required' => false)),
      'increased_traffic_rules_adhere'   => new sfValidatorBoolean(array('required' => false)),
      'increased_traffic_signables'      => new sfValidatorBoolean(array('required' => false)),
      'increased_traffice_remarks'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'fire_risk'                        => new sfValidatorBoolean(array('required' => false)),
      'fire_risk_extinguishers'          => new sfValidatorBoolean(array('required' => false)),
      'fire_risk_exit_stairs'            => new sfValidatorBoolean(array('required' => false)),
      'fire_risk_remarks'                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'token'                            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'                       => new sfValidatorDateTime(),
      'updated_at'                       => new sfValidatorDateTime(),
      'created_by'                       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'required' => false)),
      'updated_by'                       => new sfValidatorString(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'EIAProjectOperationPhase', 'column' => array('eiaproject_id')))
    );

    $this->widgetSchema->setNameFormat('eia_project_operation_phase[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EIAProjectOperationPhase';
  }

}

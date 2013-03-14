<?php

/**
 * BusinessPlan form base class.
 *
 * @method BusinessPlan getObject() Returns the current form's model object
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBusinessPlanForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                      => new sfWidgetFormInputHidden(),
      'investment_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('InvestmentApplication'), 'add_empty' => false)),
      'project_brief'           => new sfWidgetFormTextarea(),
      'exemption_on_machinery'  => new sfWidgetFormInputText(),
      'exemption_raw_materials' => new sfWidgetFormTextarea(),
      'land_ownership_document' => new sfWidgetFormInputText(),
      'bill_of_quantiy'         => new sfWidgetFormInputText(),
      'drawings'                => new sfWidgetFormInputText(),
      'construction_permits'    => new sfWidgetFormInputText(),
      'investment_allowances'   => new sfWidgetFormInputText(),
      'additional_incentives'   => new sfWidgetFormTextarea(),
      'visa_work_permits'       => new sfWidgetFormTextarea(),
      'created_at'              => new sfWidgetFormDateTime(),
      'updated_at'              => new sfWidgetFormDateTime(),
      'created_by'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'              => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'                      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'investment_id'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('InvestmentApplication'))),
      'project_brief'           => new sfValidatorString(array('max_length' => 4000)),
      'exemption_on_machinery'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'exemption_raw_materials' => new sfValidatorString(array('max_length' => 4000, 'required' => false)),
      'land_ownership_document' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'bill_of_quantiy'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'drawings'                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'construction_permits'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'investment_allowances'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'additional_incentives'   => new sfValidatorString(array('max_length' => 4000, 'required' => false)),
      'visa_work_permits'       => new sfValidatorString(array('max_length' => 4000, 'required' => false)),
      'created_at'              => new sfValidatorDateTime(),
      'updated_at'              => new sfValidatorDateTime(),
      'created_by'              => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'required' => false)),
      'updated_by'              => new sfValidatorString(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'BusinessPlan', 'column' => array('investment_id')))
    );

    $this->widgetSchema->setNameFormat('business_plan[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BusinessPlan';
  }

}

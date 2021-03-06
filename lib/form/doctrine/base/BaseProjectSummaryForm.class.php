<?php

/**
 * ProjectSummary form base class.
 *
 * @method ProjectSummary getObject() Returns the current form's model object
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseProjectSummaryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                          => new sfWidgetFormInputHidden(),
      'investment_id'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('InvestmentApplication'), 'add_empty' => false)),
      'business_sector'             => new sfWidgetFormTextarea(),
      'business_sector_description' => new sfWidgetFormTextarea(),
      'techinical_viability'        => new sfWidgetFormTextarea(),
      'planned_investment'          => new sfWidgetFormInputText(),
      'employment_created'          => new sfWidgetFormInputText(),
      'job_categories'              => new sfWidgetFormTextarea(),
      'token'                       => new sfWidgetFormInputText(),
      'created_at'                  => new sfWidgetFormDateTime(),
      'updated_at'                  => new sfWidgetFormDateTime(),
      'created_by'                  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'                  => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'                          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'investment_id'               => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('InvestmentApplication'))),
      'business_sector'             => new sfValidatorString(array('max_length' => 500)),
      'business_sector_description' => new sfValidatorString(array('max_length' => 500)),
      'techinical_viability'        => new sfValidatorString(array('max_length' => 20000)),
      'planned_investment'          => new sfValidatorInteger(),
      'employment_created'          => new sfValidatorInteger(),
      'job_categories'              => new sfValidatorString(array('max_length' => 5000)),
      'token'                       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'                  => new sfValidatorDateTime(),
      'updated_at'                  => new sfValidatorDateTime(),
      'created_by'                  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'required' => false)),
      'updated_by'                  => new sfValidatorString(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'ProjectSummary', 'column' => array('investment_id')))
    );

    $this->widgetSchema->setNameFormat('project_summary[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProjectSummary';
  }

}

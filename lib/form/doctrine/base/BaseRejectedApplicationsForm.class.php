<?php

/**
 * RejectedApplications form base class.
 *
 * @method RejectedApplications getObject() Returns the current form's model object
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseRejectedApplicationsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                         => new sfWidgetFormInputHidden(),
      'business_id'                => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('InvestmentApplication'), 'add_empty' => false)),
      'applicant_reference_number' => new sfWidgetFormInputText(),
      'business_registration'      => new sfWidgetFormInputText(),
      'application_type'           => new sfWidgetFormInputText(),
      'reasons'                    => new sfWidgetFormTextarea(),
      'comments'                   => new sfWidgetFormTextarea(),
      'token'                      => new sfWidgetFormInputText(),
      'created_at'                 => new sfWidgetFormDateTime(),
      'updated_at'                 => new sfWidgetFormDateTime(),
      'created_by'                 => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'                 => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'                         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'business_id'                => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('InvestmentApplication'))),
      'applicant_reference_number' => new sfValidatorString(array('max_length' => 255)),
      'business_registration'      => new sfValidatorInteger(),
      'application_type'           => new sfValidatorString(array('max_length' => 255)),
      'reasons'                    => new sfValidatorString(array('max_length' => 5000, 'required' => false)),
      'comments'                   => new sfValidatorString(array('max_length' => 5000, 'required' => false)),
      'token'                      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'                 => new sfValidatorDateTime(),
      'updated_at'                 => new sfValidatorDateTime(),
      'created_by'                 => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'required' => false)),
      'updated_by'                 => new sfValidatorString(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'RejectedApplications', 'column' => array('applicant_reference_number')))
    );

    $this->widgetSchema->setNameFormat('rejected_applications[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'RejectedApplications';
  }

}

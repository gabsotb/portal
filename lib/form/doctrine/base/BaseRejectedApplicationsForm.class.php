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
      'id'               => new sfWidgetFormInputHidden(),
      'business_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('InvestmentApplication'), 'add_empty' => false)),
      'application_type' => new sfWidgetFormInputText(),
      'comment'          => new sfWidgetFormInputText(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'business_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('InvestmentApplication'))),
      'application_type' => new sfValidatorString(array('max_length' => 255)),
      'comment'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'       => new sfValidatorDateTime(),
      'updated_at'       => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'RejectedApplications', 'column' => array('business_id')))
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

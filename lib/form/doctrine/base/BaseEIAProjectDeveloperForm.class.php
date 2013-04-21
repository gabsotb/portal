<?php

/**
 * EIAProjectDeveloper form base class.
 *
 * @method EIAProjectDeveloper getObject() Returns the current form's model object
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEIAProjectDeveloperForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'eiaproject_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('EIAProjectDetail'), 'add_empty' => false)),
      'developer_name'       => new sfWidgetFormInputText(),
      'contact_person'       => new sfWidgetFormInputText(),
      'address'              => new sfWidgetFormInputText(),
      'telephone'            => new sfWidgetFormInputText(),
      'mobile_phone'         => new sfWidgetFormInputText(),
      'email_address'        => new sfWidgetFormInputText(),
      'communication_mode'   => new sfWidgetFormInputText(),
      'social_media_account' => new sfWidgetFormInputText(),
      'token'                => new sfWidgetFormInputText(),
      'resubmit'             => new sfWidgetFormTextarea(),
      'created_at'           => new sfWidgetFormDateTime(),
      'updated_at'           => new sfWidgetFormDateTime(),
      'created_by'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'           => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'eiaproject_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('EIAProjectDetail'))),
      'developer_name'       => new sfValidatorString(array('max_length' => 255)),
      'contact_person'       => new sfValidatorString(array('max_length' => 255)),
      'address'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'telephone'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'mobile_phone'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email_address'        => new sfValidatorString(array('max_length' => 255)),
      'communication_mode'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'social_media_account' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'token'                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'resubmit'             => new sfValidatorString(array('required' => false)),
      'created_at'           => new sfValidatorDateTime(),
      'updated_at'           => new sfValidatorDateTime(),
      'created_by'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'required' => false)),
      'updated_by'           => new sfValidatorString(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'EIAProjectDeveloper', 'column' => array('eiaproject_id')))
    );

    $this->widgetSchema->setNameFormat('eia_project_developer[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EIAProjectDeveloper';
  }

}

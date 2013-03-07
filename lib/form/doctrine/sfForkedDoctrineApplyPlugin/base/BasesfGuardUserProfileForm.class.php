<?php

/**
 * sfGuardUserProfile form base class.
 *
 * @method sfGuardUserProfile getObject() Returns the current form's model object
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasesfGuardUserProfileForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'user_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => false)),
      'email_new'    => new sfWidgetFormInputText(),
      'firstname'    => new sfWidgetFormInputText(),
      'lastname'     => new sfWidgetFormInputText(),
      'validate_at'  => new sfWidgetFormDateTime(),
      'validate'     => new sfWidgetFormInputText(),
      'salutation'   => new sfWidgetFormInputText(),
      'citizenship'  => new sfWidgetFormInputText(),
      'surname'      => new sfWidgetFormInputText(),
      'phone_number' => new sfWidgetFormInputText(),
      'id_passport'  => new sfWidgetFormInputText(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'user_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'))),
      'email_new'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'firstname'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'lastname'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'validate_at'  => new sfValidatorDateTime(array('required' => false)),
      'validate'     => new sfValidatorString(array('max_length' => 33, 'required' => false)),
      'salutation'   => new sfValidatorString(array('max_length' => 255)),
      'citizenship'  => new sfValidatorString(array('max_length' => 255)),
      'surname'      => new sfValidatorString(array('max_length' => 255)),
      'phone_number' => new sfValidatorString(array('max_length' => 255)),
      'id_passport'  => new sfValidatorString(array('max_length' => 255)),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'sfGuardUserProfile', 'column' => array('user_id'))),
        new sfValidatorDoctrineUnique(array('model' => 'sfGuardUserProfile', 'column' => array('email_new'))),
      ))
    );

    $this->widgetSchema->setNameFormat('sf_guard_user_profile[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfGuardUserProfile';
  }

}

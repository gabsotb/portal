<?php

/**
 * Messages form base class.
 *
 * @method Messages getObject() Returns the current form's model object
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMessagesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'sender'          => new sfWidgetFormInputText(),
      'recepient'       => new sfWidgetFormInputText(),
      'sender_email'    => new sfWidgetFormInputText(),
      'recepient_email' => new sfWidgetFormInputText(),
      'cc_email'        => new sfWidgetFormInputText(),
      'message_subject' => new sfWidgetFormInputText(),
      'message'         => new sfWidgetFormTextarea(),
      'attachement'     => new sfWidgetFormInputText(),
      'token'           => new sfWidgetFormInputText(),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
      'created_by'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'      => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'sender'          => new sfValidatorString(array('max_length' => 255)),
      'recepient'       => new sfValidatorString(array('max_length' => 255)),
      'sender_email'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'recepient_email' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cc_email'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'message_subject' => new sfValidatorString(array('max_length' => 255)),
      'message'         => new sfValidatorString(array('max_length' => 20000)),
      'attachement'     => new sfValidatorString(array('max_length' => 255)),
      'token'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'      => new sfValidatorDateTime(),
      'updated_at'      => new sfValidatorDateTime(),
      'created_by'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'required' => false)),
      'updated_by'      => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('messages[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Messages';
  }

}

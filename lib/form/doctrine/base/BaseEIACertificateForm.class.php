<?php

/**
 * EIACertificate form base class.
 *
 * @method EIACertificate getObject() Returns the current form's model object
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEIACertificateForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'serial_number' => new sfWidgetFormInputText(),
      'eireport_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('EIReport'), 'add_empty' => false)),
      'active'        => new sfWidgetFormInputCheckbox(),
      'token'         => new sfWidgetFormInputText(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'serial_number' => new sfValidatorString(array('max_length' => 255)),
      'eireport_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('EIReport'))),
      'active'        => new sfValidatorBoolean(array('required' => false)),
      'token'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'EIACertificate', 'column' => array('serial_number'))),
        new sfValidatorDoctrineUnique(array('model' => 'EIACertificate', 'column' => array('eireport_id'))),
      ))
    );

    $this->widgetSchema->setNameFormat('eia_certificate[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EIACertificate';
  }

}

<?php

/**
 * Country form base class.
 *
 * @method Country getObject() Returns the current form's model object
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCountryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'name'       => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
      'created_by' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'       => new sfValidatorString(array('max_length' => 255)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
      'created_by' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'required' => false)),
      'updated_by' => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('country[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Country';
  }

}

<?php

/**
 * EIAProjectSurroundingSpecies form base class.
 *
 * @method EIAProjectSurroundingSpecies getObject() Returns the current form's model object
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEIAProjectSurroundingSpeciesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                     => new sfWidgetFormInputHidden(),
      'project_surrounding_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('EIAProjectSurrounding'), 'add_empty' => false)),
      'birds_animals'          => new sfWidgetFormInputText(),
      'trees_vegetation'       => new sfWidgetFormInputText(),
      'fisheries'              => new sfWidgetFormInputText(),
      'token'                  => new sfWidgetFormInputText(),
      'resubmit'               => new sfWidgetFormTextarea(),
      'created_at'             => new sfWidgetFormDateTime(),
      'updated_at'             => new sfWidgetFormDateTime(),
      'created_by'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'             => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'                     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'project_surrounding_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('EIAProjectSurrounding'))),
      'birds_animals'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'trees_vegetation'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'fisheries'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'token'                  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'resubmit'               => new sfValidatorString(array('required' => false)),
      'created_at'             => new sfValidatorDateTime(),
      'updated_at'             => new sfValidatorDateTime(),
      'created_by'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'required' => false)),
      'updated_by'             => new sfValidatorString(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'EIAProjectSurroundingSpecies', 'column' => array('project_surrounding_id')))
    );

    $this->widgetSchema->setNameFormat('eia_project_surrounding_species[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EIAProjectSurroundingSpecies';
  }

}

<?php

/**
 * EIAProjectDetail form base class.
 *
 * @method EIAProjectDetail getObject() Returns the current form's model object
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEIAProjectDetailForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                       => new sfWidgetFormInputHidden(),
      'project_reference_number' => new sfWidgetFormInputText(),
      'project_title'            => new sfWidgetFormInputText(),
      'project_plot_number'      => new sfWidgetFormInputText(),
      'village'                  => new sfWidgetFormInputText(),
      'cell'                     => new sfWidgetFormInputText(),
      'sector'                   => new sfWidgetFormInputText(),
      'district'                 => new sfWidgetFormInputText(),
      'province'                 => new sfWidgetFormInputText(),
      'name'                     => new sfWidgetFormInputText(),
      'token'                    => new sfWidgetFormInputText(),
      'resubmit'                 => new sfWidgetFormTextarea(),
      'created_at'               => new sfWidgetFormDateTime(),
      'updated_at'               => new sfWidgetFormDateTime(),
      'created_by'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'               => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'                       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'project_reference_number' => new sfValidatorString(array('max_length' => 255)),
      'project_title'            => new sfValidatorString(array('max_length' => 255)),
      'project_plot_number'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'village'                  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cell'                     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'sector'                   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'district'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'province'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'name'                     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'token'                    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'resubmit'                 => new sfValidatorString(array('required' => false)),
      'created_at'               => new sfValidatorDateTime(),
      'updated_at'               => new sfValidatorDateTime(),
      'created_by'               => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'required' => false)),
      'updated_by'               => new sfValidatorString(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'EIAProjectDetail', 'column' => array('project_reference_number')))
    );

    $this->widgetSchema->setNameFormat('eia_project_detail[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EIAProjectDetail';
  }

}

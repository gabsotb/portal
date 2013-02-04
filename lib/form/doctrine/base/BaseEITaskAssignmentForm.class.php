<?php

/**
 * EITaskAssignment form base class.
 *
 * @method EITaskAssignment getObject() Returns the current form's model object
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEITaskAssignmentForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'user_assigned'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => false)),
      'user_assigning' => new sfWidgetFormInputText(),
      'company_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('EIApplication'), 'add_empty' => false)),
      'instructions'   => new sfWidgetFormInputText(),
      'duedate'        => new sfWidgetFormDateTime(),
      'work_status'    => new sfWidgetFormInputText(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
      'created_by'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'     => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'user_assigned'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'))),
      'user_assigning' => new sfValidatorString(array('max_length' => 255)),
      'company_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('EIApplication'))),
      'instructions'   => new sfValidatorString(array('max_length' => 255)),
      'duedate'        => new sfValidatorDateTime(),
      'work_status'    => new sfValidatorString(array('max_length' => 255)),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
      'created_by'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'required' => false)),
      'updated_by'     => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ei_task_assignment[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EITaskAssignment';
  }

}

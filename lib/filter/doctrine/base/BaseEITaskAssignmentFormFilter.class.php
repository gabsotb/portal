<?php

/**
 * EITaskAssignment filter form base class.
 *
 * @package    rdbeportal
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEITaskAssignmentFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_assigned' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'eiaproject_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('EIAProjectDetail'), 'add_empty' => true)),
      'instructions'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'duedate'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'work_status'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'stage'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'token'         => new sfWidgetFormFilterInput(),
      'created_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'created_by'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'user_assigned' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
      'eiaproject_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('EIAProjectDetail'), 'column' => 'id')),
      'instructions'  => new sfValidatorPass(array('required' => false)),
      'duedate'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'work_status'   => new sfValidatorPass(array('required' => false)),
      'stage'         => new sfValidatorPass(array('required' => false)),
      'token'         => new sfValidatorPass(array('required' => false)),
      'created_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_by'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Creator'), 'column' => 'id')),
      'updated_by'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ei_task_assignment_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EITaskAssignment';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'user_assigned' => 'ForeignKey',
      'eiaproject_id' => 'ForeignKey',
      'instructions'  => 'Text',
      'duedate'       => 'Date',
      'work_status'   => 'Text',
      'stage'         => 'Text',
      'token'         => 'Text',
      'created_at'    => 'Date',
      'updated_at'    => 'Date',
      'created_by'    => 'ForeignKey',
      'updated_by'    => 'Text',
    );
  }
}

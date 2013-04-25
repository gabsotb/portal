<?php

/**
 * MessageLogs filter form base class.
 *
 * @package    rdbeportal
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMessageLogsFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'message_sender'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'message_recipient' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'message'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'created_by'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'message_sender'    => new sfValidatorPass(array('required' => false)),
      'message_recipient' => new sfValidatorPass(array('required' => false)),
      'message'           => new sfValidatorPass(array('required' => false)),
      'created_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_by'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Creator'), 'column' => 'id')),
      'updated_by'        => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('message_logs_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MessageLogs';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'message_sender'    => 'Text',
      'message_recipient' => 'Text',
      'message'           => 'Text',
      'created_at'        => 'Date',
      'updated_at'        => 'Date',
      'created_by'        => 'ForeignKey',
      'updated_by'        => 'Text',
    );
  }
}

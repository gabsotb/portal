<?php

/**
 * Messages filter form base class.
 *
 * @package    rdbeportal
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMessagesFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'sender'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'recepient'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'sender_email'    => new sfWidgetFormFilterInput(),
      'recepient_email' => new sfWidgetFormFilterInput(),
      'cc_email'        => new sfWidgetFormFilterInput(),
      'message_subject' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'message'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'attachement'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'token'           => new sfWidgetFormFilterInput(),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'sender'          => new sfValidatorPass(array('required' => false)),
      'recepient'       => new sfValidatorPass(array('required' => false)),
      'sender_email'    => new sfValidatorPass(array('required' => false)),
      'recepient_email' => new sfValidatorPass(array('required' => false)),
      'cc_email'        => new sfValidatorPass(array('required' => false)),
      'message_subject' => new sfValidatorPass(array('required' => false)),
      'message'         => new sfValidatorPass(array('required' => false)),
      'attachement'     => new sfValidatorPass(array('required' => false)),
      'token'           => new sfValidatorPass(array('required' => false)),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('messages_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Messages';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'sender'          => 'Text',
      'recepient'       => 'Text',
      'sender_email'    => 'Text',
      'recepient_email' => 'Text',
      'cc_email'        => 'Text',
      'message_subject' => 'Text',
      'message'         => 'Text',
      'attachement'     => 'Text',
      'token'           => 'Text',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
    );
  }
}

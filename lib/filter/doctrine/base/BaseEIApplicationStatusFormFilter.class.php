<?php

/**
 * EIApplicationStatus filter form base class.
 *
 * @package    rdbeportal
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEIApplicationStatusFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'eiaproject_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('EIAProjectDetail'), 'add_empty' => true)),
      'application_status' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'comments'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'percentage'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'token'              => new sfWidgetFormFilterInput(),
      'created_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'eiaproject_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('EIAProjectDetail'), 'column' => 'id')),
      'application_status' => new sfValidatorPass(array('required' => false)),
      'comments'           => new sfValidatorPass(array('required' => false)),
      'percentage'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'token'              => new sfValidatorPass(array('required' => false)),
      'created_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('ei_application_status_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EIApplicationStatus';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'eiaproject_id'      => 'ForeignKey',
      'application_status' => 'Text',
      'comments'           => 'Text',
      'percentage'         => 'Number',
      'token'              => 'Text',
      'created_at'         => 'Date',
      'updated_at'         => 'Date',
    );
  }
}

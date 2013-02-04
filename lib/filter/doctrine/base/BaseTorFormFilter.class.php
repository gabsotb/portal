<?php

/**
 * Tor filter form base class.
 *
 * @package    rdbeportal
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTorFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'impact_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ProjectImpact'), 'add_empty' => true)),
      'issues_assessed' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'specific_tasks'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'stake_holders'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'experts'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'created_by'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'      => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'impact_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ProjectImpact'), 'column' => 'id')),
      'issues_assessed' => new sfValidatorPass(array('required' => false)),
      'specific_tasks'  => new sfValidatorPass(array('required' => false)),
      'stake_holders'   => new sfValidatorPass(array('required' => false)),
      'experts'         => new sfValidatorPass(array('required' => false)),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_by'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Creator'), 'column' => 'id')),
      'updated_by'      => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tor_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tor';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'impact_id'       => 'ForeignKey',
      'issues_assessed' => 'Text',
      'specific_tasks'  => 'Text',
      'stake_holders'   => 'Text',
      'experts'         => 'Text',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
      'created_by'      => 'ForeignKey',
      'updated_by'      => 'Text',
    );
  }
}

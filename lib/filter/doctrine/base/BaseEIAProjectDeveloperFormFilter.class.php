<?php

/**
 * EIAProjectDeveloper filter form base class.
 *
 * @package    rdbeportal
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEIAProjectDeveloperFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'eiaproject_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('EIAProjectDetail'), 'add_empty' => true)),
      'developer_name'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'contact_person'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'address'              => new sfWidgetFormFilterInput(),
      'telephone'            => new sfWidgetFormFilterInput(),
      'mobile_phone'         => new sfWidgetFormFilterInput(),
      'email_address'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'communication_mode'   => new sfWidgetFormFilterInput(),
      'social_media_account' => new sfWidgetFormFilterInput(),
      'token'                => new sfWidgetFormFilterInput(),
      'resubmit'             => new sfWidgetFormFilterInput(),
      'created_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'created_by'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'           => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'eiaproject_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('EIAProjectDetail'), 'column' => 'id')),
      'developer_name'       => new sfValidatorPass(array('required' => false)),
      'contact_person'       => new sfValidatorPass(array('required' => false)),
      'address'              => new sfValidatorPass(array('required' => false)),
      'telephone'            => new sfValidatorPass(array('required' => false)),
      'mobile_phone'         => new sfValidatorPass(array('required' => false)),
      'email_address'        => new sfValidatorPass(array('required' => false)),
      'communication_mode'   => new sfValidatorPass(array('required' => false)),
      'social_media_account' => new sfValidatorPass(array('required' => false)),
      'token'                => new sfValidatorPass(array('required' => false)),
      'resubmit'             => new sfValidatorPass(array('required' => false)),
      'created_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_by'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Creator'), 'column' => 'id')),
      'updated_by'           => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('eia_project_developer_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EIAProjectDeveloper';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'eiaproject_id'        => 'ForeignKey',
      'developer_name'       => 'Text',
      'contact_person'       => 'Text',
      'address'              => 'Text',
      'telephone'            => 'Text',
      'mobile_phone'         => 'Text',
      'email_address'        => 'Text',
      'communication_mode'   => 'Text',
      'social_media_account' => 'Text',
      'token'                => 'Text',
      'resubmit'             => 'Text',
      'created_at'           => 'Date',
      'updated_at'           => 'Date',
      'created_by'           => 'ForeignKey',
      'updated_by'           => 'Text',
    );
  }
}

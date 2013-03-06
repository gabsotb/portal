<?php

/**
 * EIApplication filter form base class.
 *
 * @package    rdbeportal
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEIApplicationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'company_regno'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'developer_title'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'developer_address'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'project_name'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'project_purpose'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'project_nature'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'project_site'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'project_sitelaws'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'environment_impacts' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'other_alternatives'  => new sfWidgetFormFilterInput(),
      'other_information'   => new sfWidgetFormFilterInput(),
      'created_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'created_by'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'          => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'                => new sfValidatorPass(array('required' => false)),
      'company_regno'       => new sfValidatorPass(array('required' => false)),
      'developer_title'     => new sfValidatorPass(array('required' => false)),
      'developer_address'   => new sfValidatorPass(array('required' => false)),
      'project_name'        => new sfValidatorPass(array('required' => false)),
      'project_purpose'     => new sfValidatorPass(array('required' => false)),
      'project_nature'      => new sfValidatorPass(array('required' => false)),
      'project_site'        => new sfValidatorPass(array('required' => false)),
      'project_sitelaws'    => new sfValidatorPass(array('required' => false)),
      'environment_impacts' => new sfValidatorPass(array('required' => false)),
      'other_alternatives'  => new sfValidatorPass(array('required' => false)),
      'other_information'   => new sfValidatorPass(array('required' => false)),
      'created_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_by'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Creator'), 'column' => 'id')),
      'updated_by'          => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ei_application_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EIApplication';
  }

  public function getFields()
  {
    return array(
      'id'                  => 'Number',
      'name'                => 'Text',
      'company_regno'       => 'Text',
      'developer_title'     => 'Text',
      'developer_address'   => 'Text',
      'project_name'        => 'Text',
      'project_purpose'     => 'Text',
      'project_nature'      => 'Text',
      'project_site'        => 'Text',
      'project_sitelaws'    => 'Text',
      'environment_impacts' => 'Text',
      'other_alternatives'  => 'Text',
      'other_information'   => 'Text',
      'created_at'          => 'Date',
      'updated_at'          => 'Date',
      'created_by'          => 'ForeignKey',
      'updated_by'          => 'Text',
    );
  }
}

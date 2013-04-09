<?php

/**
 * EIAProjectDetail filter form base class.
 *
 * @package    rdbeportal
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEIAProjectDetailFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'project_reference_number' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'project_title'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'project_plot_number'      => new sfWidgetFormFilterInput(),
      'village'                  => new sfWidgetFormFilterInput(),
      'cell'                     => new sfWidgetFormFilterInput(),
      'sector'                   => new sfWidgetFormFilterInput(),
      'district'                 => new sfWidgetFormFilterInput(),
      'province'                 => new sfWidgetFormFilterInput(),
      'name'                     => new sfWidgetFormFilterInput(),
      'token'                    => new sfWidgetFormFilterInput(),
      'created_at'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'created_by'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'               => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'project_reference_number' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'project_title'            => new sfValidatorPass(array('required' => false)),
      'project_plot_number'      => new sfValidatorPass(array('required' => false)),
      'village'                  => new sfValidatorPass(array('required' => false)),
      'cell'                     => new sfValidatorPass(array('required' => false)),
      'sector'                   => new sfValidatorPass(array('required' => false)),
      'district'                 => new sfValidatorPass(array('required' => false)),
      'province'                 => new sfValidatorPass(array('required' => false)),
      'name'                     => new sfValidatorPass(array('required' => false)),
      'token'                    => new sfValidatorPass(array('required' => false)),
      'created_at'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_by'               => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Creator'), 'column' => 'id')),
      'updated_by'               => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('eia_project_detail_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EIAProjectDetail';
  }

  public function getFields()
  {
    return array(
      'id'                       => 'Number',
      'project_reference_number' => 'Number',
      'project_title'            => 'Text',
      'project_plot_number'      => 'Text',
      'village'                  => 'Text',
      'cell'                     => 'Text',
      'sector'                   => 'Text',
      'district'                 => 'Text',
      'province'                 => 'Text',
      'name'                     => 'Text',
      'token'                    => 'Text',
      'created_at'               => 'Date',
      'updated_at'               => 'Date',
      'created_by'               => 'ForeignKey',
      'updated_by'               => 'Text',
    );
  }
}

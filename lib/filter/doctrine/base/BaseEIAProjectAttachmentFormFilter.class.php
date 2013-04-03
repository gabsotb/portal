<?php

/**
 * EIAProjectAttachment filter form base class.
 *
 * @package    rdbeportal
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEIAProjectAttachmentFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'eiaproject_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('EIAProjectDetail'), 'add_empty' => true)),
      'panoramic_view'            => new sfWidgetFormFilterInput(),
      'perspective_site_impact'   => new sfWidgetFormFilterInput(),
      'preliminary_approval'      => new sfWidgetFormFilterInput(),
      'land_ownership_doc'        => new sfWidgetFormFilterInput(),
      'ministrial_document'       => new sfWidgetFormFilterInput(),
      'perimeter_area_map'        => new sfWidgetFormFilterInput(),
      'location_area_map'         => new sfWidgetFormFilterInput(),
      'other_supporting_document' => new sfWidgetFormFilterInput(),
      'project_reference_number'  => new sfWidgetFormFilterInput(),
      'token'                     => new sfWidgetFormFilterInput(),
      'created_at'                => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'                => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'created_by'                => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'                => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'eiaproject_id'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('EIAProjectDetail'), 'column' => 'id')),
      'panoramic_view'            => new sfValidatorPass(array('required' => false)),
      'perspective_site_impact'   => new sfValidatorPass(array('required' => false)),
      'preliminary_approval'      => new sfValidatorPass(array('required' => false)),
      'land_ownership_doc'        => new sfValidatorPass(array('required' => false)),
      'ministrial_document'       => new sfValidatorPass(array('required' => false)),
      'perimeter_area_map'        => new sfValidatorPass(array('required' => false)),
      'location_area_map'         => new sfValidatorPass(array('required' => false)),
      'other_supporting_document' => new sfValidatorPass(array('required' => false)),
      'project_reference_number'  => new sfValidatorPass(array('required' => false)),
      'token'                     => new sfValidatorPass(array('required' => false)),
      'created_at'                => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'                => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_by'                => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Creator'), 'column' => 'id')),
      'updated_by'                => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('eia_project_attachment_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EIAProjectAttachment';
  }

  public function getFields()
  {
    return array(
      'id'                        => 'Number',
      'eiaproject_id'             => 'ForeignKey',
      'panoramic_view'            => 'Text',
      'perspective_site_impact'   => 'Text',
      'preliminary_approval'      => 'Text',
      'land_ownership_doc'        => 'Text',
      'ministrial_document'       => 'Text',
      'perimeter_area_map'        => 'Text',
      'location_area_map'         => 'Text',
      'other_supporting_document' => 'Text',
      'project_reference_number'  => 'Text',
      'token'                     => 'Text',
      'created_at'                => 'Date',
      'updated_at'                => 'Date',
      'created_by'                => 'ForeignKey',
      'updated_by'                => 'Text',
    );
  }
}

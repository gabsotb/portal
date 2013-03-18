<?php

/**
 * EIAProjectAttachment form base class.
 *
 * @method EIAProjectAttachment getObject() Returns the current form's model object
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEIAProjectAttachmentForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                        => new sfWidgetFormInputHidden(),
      'eiaproject_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('EIAProjectDetail'), 'add_empty' => false)),
      'panoramic_view'            => new sfWidgetFormInputText(),
      'perspective_site_impact'   => new sfWidgetFormInputText(),
      'preliminary_approval'      => new sfWidgetFormInputText(),
      'land_ownership_doc'        => new sfWidgetFormInputText(),
      'ministrial_document'       => new sfWidgetFormInputText(),
      'perimeter_area_map'        => new sfWidgetFormInputText(),
      'other_supporting_document' => new sfWidgetFormInputText(),
      'token'                     => new sfWidgetFormInputText(),
      'created_at'                => new sfWidgetFormDateTime(),
      'updated_at'                => new sfWidgetFormDateTime(),
      'created_by'                => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'                => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'                        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'eiaproject_id'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('EIAProjectDetail'))),
      'panoramic_view'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'perspective_site_impact'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'preliminary_approval'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'land_ownership_doc'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'ministrial_document'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'perimeter_area_map'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'other_supporting_document' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'token'                     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'                => new sfValidatorDateTime(),
      'updated_at'                => new sfValidatorDateTime(),
      'created_by'                => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'required' => false)),
      'updated_by'                => new sfValidatorString(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'EIAProjectAttachment', 'column' => array('eiaproject_id')))
    );

    $this->widgetSchema->setNameFormat('eia_project_attachment[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EIAProjectAttachment';
  }

}

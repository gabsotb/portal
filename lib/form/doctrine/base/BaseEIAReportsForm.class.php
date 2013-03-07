<?php

/**
 * EIAReports form base class.
 *
 * @method EIAReports getObject() Returns the current form's model object
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEIAReportsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'module'          => new sfWidgetFormInputText(),
      'module_id'       => new sfWidgetFormInputText(),
      'recommendations' => new sfWidgetFormTextarea(),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
      'created_by'      => new sfWidgetFormTextarea(),
      'updated_by'      => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'module'          => new sfValidatorString(array('max_length' => 200)),
      'module_id'       => new sfValidatorInteger(),
      'recommendations' => new sfValidatorString(array('max_length' => 400)),
      'created_at'      => new sfValidatorDateTime(),
      'updated_at'      => new sfValidatorDateTime(),
      'created_by'      => new sfValidatorString(array('required' => false)),
      'updated_by'      => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('eia_reports[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EIAReports';
  }

}

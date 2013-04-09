<?php

/**
 * TaxExemptionItems form base class.
 *
 * @method TaxExemptionItems getObject() Returns the current form's model object
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTaxExemptionItemsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'tax_details_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TaxExemptionDetails'), 'add_empty' => false)),
      'rdb'            => new sfWidgetFormInputCheckbox(),
      'rra'            => new sfWidgetFormInputCheckbox(),
      'hs_code'        => new sfWidgetFormInputText(),
      'description'    => new sfWidgetFormTextarea(),
      'cif'            => new sfWidgetFormInputText(),
      'quantity'       => new sfWidgetFormInputText(),
      'import_duties'  => new sfWidgetFormInputText(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
      'created_by'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'     => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'tax_details_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TaxExemptionDetails'))),
      'rdb'            => new sfValidatorBoolean(array('required' => false)),
      'rra'            => new sfValidatorBoolean(array('required' => false)),
      'hs_code'        => new sfValidatorInteger(array('required' => false)),
      'description'    => new sfValidatorString(array('max_length' => 600, 'required' => false)),
      'cif'            => new sfValidatorInteger(array('required' => false)),
      'quantity'       => new sfValidatorInteger(array('required' => false)),
      'import_duties'  => new sfValidatorInteger(array('required' => false)),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
      'created_by'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'required' => false)),
      'updated_by'     => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tax_exemption_items[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TaxExemptionItems';
  }

}

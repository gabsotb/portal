<?php

/**
 * TaxExemptionItems filter form base class.
 *
 * @package    rdbeportal
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTaxExemptionItemsFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'tax_details_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TaxExemptionDetails'), 'add_empty' => true)),
      'rdb'            => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'rra'            => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'hs_code'        => new sfWidgetFormFilterInput(),
      'description'    => new sfWidgetFormFilterInput(),
      'cif'            => new sfWidgetFormFilterInput(),
      'quantity'       => new sfWidgetFormFilterInput(),
      'import_duties'  => new sfWidgetFormFilterInput(),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'created_by'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'     => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'tax_details_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TaxExemptionDetails'), 'column' => 'id')),
      'rdb'            => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'rra'            => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'hs_code'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'description'    => new sfValidatorPass(array('required' => false)),
      'cif'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'quantity'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'import_duties'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_by'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Creator'), 'column' => 'id')),
      'updated_by'     => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tax_exemption_items_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TaxExemptionItems';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'tax_details_id' => 'ForeignKey',
      'rdb'            => 'Boolean',
      'rra'            => 'Boolean',
      'hs_code'        => 'Number',
      'description'    => 'Text',
      'cif'            => 'Number',
      'quantity'       => 'Number',
      'import_duties'  => 'Number',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
      'created_by'     => 'ForeignKey',
      'updated_by'     => 'Text',
    );
  }
}

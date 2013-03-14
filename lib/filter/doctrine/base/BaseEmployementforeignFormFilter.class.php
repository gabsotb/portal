<?php

/**
 * Employementforeign filter form base class.
 *
 * @package    rdbeportal
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEmployementforeignFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'business_plan' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('InvestmentApplication'), 'add_empty' => true)),
      'year1'         => new sfWidgetFormFilterInput(),
      'year2'         => new sfWidgetFormFilterInput(),
      'year3'         => new sfWidgetFormFilterInput(),
      'year4'         => new sfWidgetFormFilterInput(),
      'year5'         => new sfWidgetFormFilterInput(),
      'created_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'created_by'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'updated_by'    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'business_plan' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('InvestmentApplication'), 'column' => 'id')),
      'year1'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'year2'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'year3'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'year4'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'year5'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_by'    => new sfValidatorPass(array('required' => false)),
      'updated_by'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('employementforeign_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Employementforeign';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'business_plan' => 'ForeignKey',
      'year1'         => 'Number',
      'year2'         => 'Number',
      'year3'         => 'Number',
      'year4'         => 'Number',
      'year5'         => 'Number',
      'created_at'    => 'Date',
      'updated_at'    => 'Date',
      'created_by'    => 'Text',
      'updated_by'    => 'Text',
    );
  }
}

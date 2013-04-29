<?php

/**
 * InvestmentCertificate filter form base class.
 *
 * @package    rdbeportal
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseInvestmentCertificateFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'serial_number' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'business_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('InvestmentApplication'), 'add_empty' => true)),
      'active'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'token'         => new sfWidgetFormFilterInput(),
      'created_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'created_by'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'updated_by'    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'serial_number' => new sfValidatorPass(array('required' => false)),
      'business_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('InvestmentApplication'), 'column' => 'id')),
      'active'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'token'         => new sfValidatorPass(array('required' => false)),
      'created_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_by'    => new sfValidatorPass(array('required' => false)),
      'updated_by'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('investment_certificate_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'InvestmentCertificate';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'serial_number' => 'Text',
      'business_id'   => 'ForeignKey',
      'active'        => 'Boolean',
      'token'         => 'Text',
      'created_at'    => 'Date',
      'updated_at'    => 'Date',
      'created_by'    => 'Text',
      'updated_by'    => 'Text',
    );
  }
}

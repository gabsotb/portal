<?php

/**
 * BusinessRegistration filter form base class.
 *
 * @package    rdbeportal
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseBusinessRegistrationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'business_name'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'business_regno'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'business_sector'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'office_telephone' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fax'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'post_box'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'location'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'sector'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'district'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'city_province'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'token'            => new sfWidgetFormFilterInput(),
      'created_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'business_name'    => new sfValidatorPass(array('required' => false)),
      'business_regno'   => new sfValidatorPass(array('required' => false)),
      'business_sector'  => new sfValidatorPass(array('required' => false)),
      'office_telephone' => new sfValidatorPass(array('required' => false)),
      'fax'              => new sfValidatorPass(array('required' => false)),
      'post_box'         => new sfValidatorPass(array('required' => false)),
      'location'         => new sfValidatorPass(array('required' => false)),
      'sector'           => new sfValidatorPass(array('required' => false)),
      'district'         => new sfValidatorPass(array('required' => false)),
      'city_province'    => new sfValidatorPass(array('required' => false)),
      'token'            => new sfValidatorPass(array('required' => false)),
      'created_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('business_registration_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BusinessRegistration';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'business_name'    => 'Text',
      'business_regno'   => 'Text',
      'business_sector'  => 'Text',
      'office_telephone' => 'Text',
      'fax'              => 'Text',
      'post_box'         => 'Text',
      'location'         => 'Text',
      'sector'           => 'Text',
      'district'         => 'Text',
      'city_province'    => 'Text',
      'token'            => 'Text',
      'created_at'       => 'Date',
      'updated_at'       => 'Date',
    );
  }
}

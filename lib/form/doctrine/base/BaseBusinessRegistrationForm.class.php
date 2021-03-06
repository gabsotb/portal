<?php

/**
 * BusinessRegistration form base class.
 *
 * @method BusinessRegistration getObject() Returns the current form's model object
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBusinessRegistrationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'business_name'    => new sfWidgetFormInputText(),
      'business_regno'   => new sfWidgetFormInputText(),
      'business_sector'  => new sfWidgetFormInputText(),
      'office_telephone' => new sfWidgetFormInputText(),
      'fax'              => new sfWidgetFormInputText(),
      'post_box'         => new sfWidgetFormInputText(),
      'location'         => new sfWidgetFormInputText(),
      'sector'           => new sfWidgetFormInputText(),
      'district'         => new sfWidgetFormInputText(),
      'city_province'    => new sfWidgetFormInputText(),
      'token'            => new sfWidgetFormInputText(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'business_name'    => new sfValidatorString(array('max_length' => 255)),
      'business_regno'   => new sfValidatorString(array('max_length' => 255)),
      'business_sector'  => new sfValidatorString(array('max_length' => 255)),
      'office_telephone' => new sfValidatorString(array('max_length' => 255)),
      'fax'              => new sfValidatorString(array('max_length' => 255)),
      'post_box'         => new sfValidatorString(array('max_length' => 255)),
      'location'         => new sfValidatorString(array('max_length' => 255)),
      'sector'           => new sfValidatorString(array('max_length' => 255)),
      'district'         => new sfValidatorString(array('max_length' => 255)),
      'city_province'    => new sfValidatorString(array('max_length' => 255)),
      'token'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'       => new sfValidatorDateTime(),
      'updated_at'       => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('business_registration[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BusinessRegistration';
  }

}

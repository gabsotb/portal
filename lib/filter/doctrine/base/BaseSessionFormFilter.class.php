<?php

/**
 * Session filter form base class.
 *
 * @package    rdbeportal
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSessionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'sessiondata' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'time'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'token'       => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'sessiondata' => new sfValidatorPass(array('required' => false)),
      'time'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'token'       => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('session_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Session';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Text',
      'sessiondata' => 'Text',
      'time'        => 'Number',
      'token'       => 'Text',
    );
  }
}

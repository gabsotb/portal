<?php

/**
 * Tor form base class.
 *
 * @method Tor getObject() Returns the current form's model object
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTorForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'impact_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ProjectImpact'), 'add_empty' => false)),
      'issues_assessed' => new sfWidgetFormTextarea(),
      'specific_tasks'  => new sfWidgetFormTextarea(),
      'stake_holders'   => new sfWidgetFormTextarea(),
      'experts'         => new sfWidgetFormTextarea(),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
      'created_by'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => true)),
      'updated_by'      => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'impact_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ProjectImpact'))),
      'issues_assessed' => new sfValidatorString(array('max_length' => 400)),
      'specific_tasks'  => new sfValidatorString(array('max_length' => 400)),
      'stake_holders'   => new sfValidatorString(array('max_length' => 400)),
      'experts'         => new sfValidatorString(array('max_length' => 400)),
      'created_at'      => new sfValidatorDateTime(),
      'updated_at'      => new sfValidatorDateTime(),
      'created_by'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'required' => false)),
      'updated_by'      => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tor[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tor';
  }

}

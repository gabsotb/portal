<?php

/**
 * EIAAssessmentDecision form.
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EIAAssessmentDecisionForm extends BaseEIAAssessmentDecisionForm
{
  public function configure()
  {
    unset($this['created_at'],$this['updated_at'], $this['created_by'], $this['updated_by'] , $this['token'], $this['taskassignment_id']);
	
	$this->widgetSchema['verdict']= new sfWidgetFormChoice(array(
		'choices' => Doctrine_Core::getTable('EIAAssessmentDecision')->getDecisions(),
		'multiple' => false,
		'expanded' => false,
	));
	$this->validatorSchema['verdict'] = new sfValidatorChoice(array(
	  'choices' => array_keys(Doctrine_Core::getTable('EIAAssessmentDecision')->getDecisions()),
	));  
	$this->widgetSchema['eia_stage']= new sfWidgetFormChoice(array(
		'choices' => Doctrine_Core::getTable('EIAAssessmentDecision')->getStages(),
		'multiple' => false,
		'expanded' => false,
	));
	$this->validatorSchema['eia_stage'] = new sfValidatorChoice(array(
	  'choices' => array_keys(Doctrine_Core::getTable('EIAAssessmentDecision')->getStages()),
	));  
	$this->widgetSchema['remarks'] = new sfWidgetFormTextarea();
  }
}

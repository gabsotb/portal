<?php

/**
 * EIAProjectOperationPhase form.
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EIAProjectOperationPhaseForm extends BaseEIAProjectOperationPhaseForm
{
  public function configure()
  {
     unset($this['created_at'],$this['updated_at'], $this['created_by'], $this['updated_by'] , $this['token']);
	$this->setDefault('created_at',date('Y-m-d 00:00:00'));
	///
	$this->widgetSchema['domestic_influence'] = new sfWidgetFormChoice(array(
	 # 'label' => 'Category',
	  'choices'  => Doctrine_Core::getTable('EIAProjectDescription')->getQuestionValues(),
	  'expanded' => false,
    ));
	$this->widgetSchema['increased_traffic'] = new sfWidgetFormChoice(array(
	 # 'label' => 'Category',
	  'choices'  => Doctrine_Core::getTable('EIAProjectDescription')->getQuestionValues(),
	  'expanded' => false,
    ));
	$this->widgetSchema['solid_wastes'] = new sfWidgetFormChoice(array(
	 # 'label' => 'Category',
	  'choices'  => Doctrine_Core::getTable('EIAProjectDescription')->getQuestionValues(),
	  'expanded' => false,
    ));
	$this->widgetSchema['fire_risk'] = new sfWidgetFormChoice(array(
	 # 'label' => 'Category',
	  'choices'  => Doctrine_Core::getTable('EIAProjectDescription')->getQuestionValues(),
	  'expanded' => false,
    ));
	$this->widgetSchema['eiaproject_id'] = new sfWidgetFormInputHidden() ;
	$this->setDefault('eiaproject_id', Doctrine_Core::getTable('EIAProjectDetail')->getProjectId());
	$this->widgetSchema['resubmit'] = new sfWidgetFormInputHidden();
	
  }
}

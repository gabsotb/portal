<?php

/**
 * EIAProjectImpactMeasures form.
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EIAProjectImpactMeasuresForm extends BaseEIAProjectImpactMeasuresForm
{
  public function configure()
  {
    unset($this['created_at'],$this['updated_at'], $this['created_by'], $this['updated_by'] , $this['token']);
	$this->setDefault('created_at',date('Y-m-d 00:00:00'));
	///
	$this->widgetSchema['dust_generation'] = new sfWidgetFormChoice(array(
	 # 'label' => 'Category',
	  'choices'  => Doctrine_Core::getTable('EIAProjectDescription')->getQuestionValues(),
	  'expanded' => false,
    ));
	$this->widgetSchema['soil_removal'] = new sfWidgetFormChoice(array(
	 # 'label' => 'Category',
	  'choices'  => Doctrine_Core::getTable('EIAProjectDescription')->getQuestionValues(),
	  'expanded' => false,
    ));
	$this->widgetSchema['erosion_from_cuts'] = new sfWidgetFormChoice(array(
	 # 'label' => 'Category',
	  'choices'  => Doctrine_Core::getTable('EIAProjectDescription')->getQuestionValues(),
	  'expanded' => false,
    ));
	$this->widgetSchema['sedimentation'] = new sfWidgetFormChoice(array(
	 # 'label' => 'Category',
	  'choices'  => Doctrine_Core::getTable('EIAProjectDescription')->getQuestionValues(),
	  'expanded' => false,
    ));
	$this->widgetSchema['pollution'] = new sfWidgetFormChoice(array(
	 # 'label' => 'Category',
	  'choices'  => Doctrine_Core::getTable('EIAProjectDescription')->getQuestionValues(),
	  'expanded' => false,
    ));
	$this->widgetSchema['vegetation_loss'] = new sfWidgetFormChoice(array(
	 # 'label' => 'Category',
	  'choices'  => Doctrine_Core::getTable('EIAProjectDescription')->getQuestionValues(),
	  'expanded' => false,
    ));
	$this->widgetSchema['disturbance'] = new sfWidgetFormChoice(array(
	 # 'label' => 'Category',
	  'choices'  => Doctrine_Core::getTable('EIAProjectDescription')->getQuestionValues(),
	  'expanded' => false,
    ));
	$this->widgetSchema['noise_generation'] = new sfWidgetFormChoice(array(
	 # 'label' => 'Category',
	  'choices'  => Doctrine_Core::getTable('EIAProjectDescription')->getQuestionValues(),
	  'expanded' => false,
    ));
	$this->widgetSchema['generation_employment'] = new sfWidgetFormChoice(array(
	 # 'label' => 'Category',
	  'choices'  => Doctrine_Core::getTable('EIAProjectDescription')->getQuestionValues(),
	  'expanded' => false,
    ));
	$this->widgetSchema['conflicts'] = new sfWidgetFormChoice(array(
	 # 'label' => 'Category',
	  'choices'  => Doctrine_Core::getTable('EIAProjectDescription')->getQuestionValues(),
	  'expanded' => false,
    ));
	$this->widgetSchema['traffic_congestion'] = new sfWidgetFormChoice(array(
	 # 'label' => 'Category',
	  'choices'  => Doctrine_Core::getTable('EIAProjectDescription')->getQuestionValues(),
	  'expanded' => false,
    ));
	$this->widgetSchema['crimes_accidents'] = new sfWidgetFormChoice(array(
	 # 'label' => 'Category',
	  'choices'  => Doctrine_Core::getTable('EIAProjectDescription')->getQuestionValues(),
	  'expanded' => false,
    ));
  }
}

<?php

/**
 * EIAProjectDescription form.
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EIAProjectDescriptionForm extends BaseEIAProjectDescriptionForm
{
  public function configure()
  {
   unset($this['created_at'],$this['updated_at'], $this['created_by'], $this['updated_by'] , $this['token']);
	$this->setDefault('created_at',date('Y-m-d 00:00:00'));
	//
	//natures
   $this->widgetSchema['project_nature'] = new sfWidgetFormChoice(array(
	 # 'label' => 'Category',
	  'choices'  => Doctrine_Core::getTable('EIAProjectDescription')->getNatures(),
	  'expanded' => false,
    )); 
	/////set Labels and text
	$this->widgetSchema['site_location_developed_area']->setLabel('Developed Area(within a built up area with presence of utility systems or network, especially water supply,roads and power supply)');
	$this->widgetSchema['site_location_undeveloped_area']->setLabel('Underdevelopment Area(relatively far from the urban center with predominant absence of utility system)');
	$this->widgetSchema['site_location_other']->setLabel('Other Particulars, Specify below');
	$this->widgetSchema['site_location_other_specify']->setLabel('You Clicked, Others please be specific');
	//set labels
	$this->widgetSchema->setLabels(array(
	'land_use_residential'=>'Residential',
	'land_use_industrial'=>'Industrial',
	'land_use_tourism'=>'Tourism',
	'land_use_commercial'=>'Commercial',
	'land_use_instituational'=>'Institutional',
	'land_use_openspace' =>'Open Space',
	'land_use_other' =>'Others, specify Below',
	'sewage_system_modern' => 'Modern waste water treatment plant', 
	'sewage_system_ecosan' => 'Ecosan Toilets',
	'sewage_system_biogas' => 'Biogas Plant',
	'sewage_system_capacity' => 'Sewage Design: Capacity in Population Equivalent(PE):',
	));
	///
	 $this->widgetSchema['public_water_supply'] = new sfWidgetFormChoice(array(
	 # 'label' => 'Category',
	  'choices'  => Doctrine_Core::getTable('EIAProjectDescription')->getQuestionValues(),
	  'expanded' => false,
    )); 
	$this->widgetSchema['water_treatment'] = new sfWidgetFormChoice(array(
	 # 'label' => 'Category',
	  'choices'  => Doctrine_Core::getTable('EIAProjectDescription')->getQuestionValues(),
	  'expanded' => false,
    ));
	
  }
}

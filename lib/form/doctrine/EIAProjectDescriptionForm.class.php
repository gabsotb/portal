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
	$this->widgetSchema['eiaproject_id']=new sfWidgetFormInputHidden();
	$this->setDefault('eiaproject_id', Doctrine_Core::getTable('EIAProjectDetail')->getProjectId());
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
	'power_supply_local_electricity' => 'Local Electric EWSA',
	'power_supply_own_generator' => 'Own Generator',
	'power_supply_local_electricity_size' => 'grid:',
	'power_supply_own_generator_capacity' => 'Capacity(KVA):',
	'power_supply_other_specify' => 'please specify:',
	'power_supply_other' => 'Others',
	'solid_waste_ecological' => 'Ecological solid waste management(e.g. compositing)',
	'solid_waste_dumpsite' => 'Open dumpsite outside of the project site',
	'solid_waste_municipal' => 'Municipal/City landfill area',
	'solid_waste_others' => 'Others',
	'solid_waste_others_specify' => 'Please Specify',
	'total_land_area' => 'Total Land Area(in ha)',
	'existing_land_use' => 'Existing Land use',
	'project_total_cost' => 'Total Project Cost',
	'project_working_capital' => 'Working Capital',
	'project_objective' => 'Project Description & Objectives',
	'project_nature' => 'Project Nature(ISIC Rev 4 UN 2008 Stardards)',
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
	$this->widgetSchema['existing_land_use'] = new sfWidgetFormTextarea();
	$this->widgetSchema['resubmit'] = new sfWidgetFormInputHidden();
  }
}

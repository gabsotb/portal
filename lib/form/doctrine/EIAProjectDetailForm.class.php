<?php

/**
 * EIAProjectDetail form.
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EIAProjectDetailForm extends BaseEIAProjectDetailForm
{
  public function configure()
  {
    unset($this['created_at'],$this['updated_at'], $this['created_by'], $this['updated_by'] , $this['token']);
	$number = Doctrine_Core::getTable('EIAProjectDetail')->createIncrementalReferenceNumber();
	//$this->setProjectReferenceNumber($number);
	$this->setDefault('project_reference_number', $number) ;
	///
	$this->widgetSchema['project_reference_number'] = new sfWidgetFormInputHidden();
	$this->setDefault('created_at',date('Y-m-d 00:00:00'));
	//////we also generate a unique reference number for each application of a user
	//set some default Fields Text
	$this->widgetSchema['project_title']->setLabel('Project Title');
	$this->widgetSchema['project_plot_number']->setLabel('Plot Number');
  	//we will use check box to set some default values, Village, Sectors and Provinces
	//sector
	 $this->widgetSchema['sector'] = new sfWidgetFormChoice(array(
	 # 'label' => 'Category',
	  'choices'  => Doctrine_Core::getTable('EIAProjectDetail')->getSectors(),
	  'expanded' => false,
    ));
	//districts
	 $this->widgetSchema['district'] = new sfWidgetFormChoice(array(
	 # 'label' => 'Category',
	  'choices'  => Doctrine_Core::getTable('EIAProjectDetail')->getDistricts(),
	  'expanded' => false,
    ));
	//provinces
	 $this->widgetSchema['province'] = new sfWidgetFormChoice(array(
	 # 'label' => 'Category',
	  'choices'  => Doctrine_Core::getTable('EIAProjectDetail')->getProvinces(),
	  'expanded' => false,
    ));
	
  }
  
}

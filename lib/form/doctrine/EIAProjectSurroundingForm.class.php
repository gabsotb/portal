<?php

/**
 * EIAProjectSurrounding form.
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EIAProjectSurroundingForm extends BaseEIAProjectSurroundingForm
{
  public function configure()
  {
	unset( $this['updated_at'],$this['updated_by'], 
			$this['created_by'],$this['created_at'], 
			$this['token'] 
		);
	
	$this->widgetSchema['eiaproject_id'] = new sfWidgetFormInputHidden() ;
	$this->setDefault('eiaproject_id', Doctrine_Core::getTable('EIAProjectDetail')->getProjectId());
	$this->widgetSchema['watershed_near_distance_units'] = new sfWidgetFormChoice(array(
	'choices'  => Doctrine_Core::getTable('EIAProjectSurrounding')->getUnits(),
	'multiple' => false,
	'expanded' => false,
	));
	
	$this->validatorSchema['watershed_near_distance_units'] = new sfValidatorChoice(array(
	'choices' => array_keys(Doctrine_Core::getTable('EIAProjectSurrounding')->getUnits()),
	));
	
	$widgets=array('existing_water_body_remark','site_conform_remark','site_existing_remark','existing_trees_remark','wildlife_existing_remark','fishery_existing_remark','watershed_within_name');
	
	foreach($widgets as $widget)
	{
		$this->widgetSchema[$widget] = new sfWidgetFormTextarea();
	}
	//function to retieve id
	$this->setDefault('eiaproject_id', Doctrine_Core::getTable('EIAProjectDetail')->getProjectId());
	$this->widgetSchema['resubmit'] = new sfWidgetFormInputHidden();
    /*$this->widgetSchema->setLabels(array(
     ));*/
	
	
  }
}

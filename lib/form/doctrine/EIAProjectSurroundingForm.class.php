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
	//function to retieve id
	//$this->setDefault('eiaproject_id', $id);
	
    /*$this->widgetSchema->setLabels(array(
      'category_id'    => 'Category',
      'is_public'      => 'Public?',
      'how_to_apply'   => 'How to apply?',
    ));*/
	
	
	$this->widgetSchema->setHelp('existing_water_body','existence of creeks, stream or lakes'); 
	$this->widgetSchema->setHelp('existing_trees','Exisiting trees and other tyes of vegetation');
	
	/*$widgets=array(
		'soil_erosion','soil_erosion_heavy_rains','soil_erosion_unstable','soil_erosion_others','existing_water_body','access_road','site_existing_structure','land_use_agriculture','land_use_grassland','land_use_builtup','land_use_marshland','land_use_other','existing_trees','wildlife_existing','fishery_existing','watershed_existing'
	);
	foreach($widgets as $widget){
		$this->widgetSchema[$widget] = new sfWidgetFormInputCheckbox();
	}*/
	
  }
}

<?php

/**
 * EIAProjectSurroundingSpecies form.
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EIAProjectSurroundingSpeciesForm extends BaseEIAProjectSurroundingSpeciesForm
{
  public function configure()
  {
   unset($this['created_at'],$this['updated_at'], $this['created_by'], $this['updated_by'] , $this['token']);
	$this->setDefault('created_at',date('Y-m-d 00:00:00'));
	
	$this->widgetSchema['project_surrounding_id'] = new sfWidgetFormInputHidden() ;
	$this->setDefault('project_surrounding_id', Doctrine_Core::getTable('EIAProjectSurrounding')->getProjectSurroundingId());
	$this->widgetSchema['resubmit'] = new sfWidgetFormInputHidden();
  }
}

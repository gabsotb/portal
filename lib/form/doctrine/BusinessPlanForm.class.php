<?php

/**
 * BusinessPlan form.
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BusinessPlanForm extends BaseBusinessPlanForm
{
  public function configure()
  {
    $this->setDefault('created_at',date('Y-m-d H:i:s')); 
	unset($this['updated_at'],$this['updated_by'],$this['created_by']);
	///
	$this->widgetSchema->setLabels(array(
			  'created_at'    => 'Date',
			  'investment_id'   => 'Business Name'
			));
  }
}

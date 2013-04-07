<?php

/**
 * RejectedApplications form.
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class RejectedApplicationsForm extends BaseRejectedApplicationsForm
{
  public function configure()
  {
    unset($this['created_at'],$this['updated_at'], $this['created_by'], $this['updated_by'], $this['token']);
	///
	//
	$this->widgetSchema['application_type'] = new sfWidgetFormChoice(array(
	  'label' => 'Application For',
	  'choices'  => Doctrine_Core::getTable('RejectedApplications')->getCategories(),
	  'expanded' => false,
    )); 
	$this->widgetSchema->setLabel('applicant_reference_number', 'Enter Refernce Number');
	//
	$this->widgetSchema['applicant_reference_number'] = new sfWidgetFormInputText();
	$this->widgetSchema['business_id'] = new sfWidgetFormInputHidden();
  }
}

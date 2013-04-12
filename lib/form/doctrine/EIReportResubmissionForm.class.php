<?php

/**
 * EIReportResubmission form.
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EIReportResubmissionForm extends BaseEIReportResubmissionForm
{
  public function configure()
  {
    unset($this['created_at'],$this['updated_at'], $this['created_by'], $this['updated_by']);
	//set default
	$eireport_id = sfContext::getInstance()->getUser()->getAttribute('project_id_resubmit');
	//
	$this->setDefault('eiaproject_id', $eireport_id);
	//hide
	$this->widgetSchema['eiaproject_id'] = new sfWidgetFormInputHidden();
	//set default for status
	$status = "awaitingresubmission";
	$this->setDefault('status',$status);
	//hide
	$this->widgetSchema['status'] = new sfWidgetFormInputHidden();
	$this->widgetSchema->setLabel('comments','Please Inform the investor why you are requesting for resubmission/changes required ');
	
  }
}

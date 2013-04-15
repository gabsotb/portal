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
	///
	//$this->widgetSchema->setLabel('commets_doc', 'Please Attach A word Document with Comments for user resubmission');
	///
	$this->widgetSchema['commets_doc'] = new sfWidgetFormInputFileEditable(array(
	   'label'=>'Please Attach A word Document with Comments for user resubmission',
	   'file_src' =>'/uploads/documents/eia_documents/user_eireports'.$this->getObject()->getCommetsDoc(),
	   #'is_image' => true,
	   'edit_mode' => !$this->isNew(),
	   'template' => '<div>%file%<br/>%input%<br/>%delete% %delete_label%</div>',
	   ));
	   $this->validatorSchema['commets_doc'] = new sfValidatorFile(array(
	   'required' => true,
	   'path' =>sfConfig::get('sf_upload_dir').'/documents/eia_documents/user_eireports',
	   )); 
	  // $this->widgetSchema['commets_doc'] = new sfWidgetFormInputHidden();
	  // $this->validatorSchema['commets_doc'] = new sfValidatorPass(); 
	
  }
}

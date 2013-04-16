<?php

/**
 * EIReport form.
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EIReportForm extends BaseEIReportForm
{
  public function configure()
  {
   unset($this['created_at'],$this['updated_at'], $this['created_by'], $this['updated_by']);
   //
   $this->widgetSchema['eiaproject_id'] = new sfWidgetFormInputHidden();
   //default status when this report is submitted by user
   $status = "awaitinganalysis";
   $this->setDefault('status', $status);
   $this->widgetSchema['status'] = new sfWidgetFormInputHidden();
   ///
   $this->setDefault('eiaproject_id', 1); // we will set it later
   $this->widgetSchema['token'] = new sfWidgetFormInputHidden();
   $token = sha1(date('Y-m-d').rand(11111, 99999));
   $this->setDefault('token',$token); 
   //
      $this->widgetSchema['word_doc'] = new sfWidgetFormInputFileEditable(array(
	  # 'label'=>'ShareHolders List',
	   'file_src' =>'/uploads/documents/eia_documents/user_eireports'.$this->getObject()->getWordDoc(),
	   #'is_image' => true,
	   'edit_mode' => !$this->isNew(),
	   'template' => '<div>%file%<br/>%input%<br/>%delete% %delete_label%</div>',
	   ));
	   $this->widgetSchema['word_doc_delete'] = new sfWidgetFormInputHidden();
	   $this->validatorSchema['word_doc_delete'] = new sfValidatorPass(); 
	//  
	   //also change the default validator
	  //  $this->validatorSchema['word_doc'] = new sfValidatorPass();  
	 $this->validatorSchema['word_doc'] = new sfValidatorFile(array(
	   'required' => true,
	   'path' =>sfConfig::get('sf_upload_dir').'/documents/eia_documents/user_eireports',
	   )); 
	   
	   //
	    $this->widgetSchema['pdf_doc'] = new sfWidgetFormInputFileEditable(array(
	  # 'label'=>'ShareHolders List',
	   'file_src' =>'/uploads/documents/eia_documents/user_eireports'.$this->getObject()->getPdfDoc(),
	   #'is_image' => true,
	   'edit_mode' => !$this->isNew(),
	   'template' => '<div>%file%<br/>%input%<br/>%delete% %delete_label%</div>',
	   ));
	   //$this->validatorSchema['pdf_doc_delete'] = new sfValidatorPass();
	   //also change the default validator
	 $this->validatorSchema['pdf_doc'] = new sfValidatorFile(array(
	   'required' => true,
	   'path' =>sfConfig::get('sf_upload_dir').'/documents/eia_documents/user_eireports',
	   )); 
	  $this->widgetSchema['pdf_doc_delete'] = new sfWidgetFormInputHidden();  
	   $this->validatorSchema['pdf_doc_delete'] = new sfValidatorPass(); 
	   ///
	   
	   $this->widgetSchema->setLabels(array('word_doc'=>'Report In Word Document Format:', 'pdf_doc' =>'Report In PDF Document Format:'));
	   ////////////////////////////////////

  }
  
}

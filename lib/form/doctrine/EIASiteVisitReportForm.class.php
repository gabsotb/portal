<?php

/**
 * EIASiteVisitReport form.
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EIASiteVisitReportForm extends BaseEIASiteVisitReportForm
{
  public function configure()
  {
	unset($this['created_at'],$this['updated_at'], $this['created_by'], $this['updated_by'] , $this['token'], $this['eiasitevisit_id']);
	$this->widgetSchema['tor'] = new sfWidgetFormInputFileEditable(array(
	   'label'=>'Terms of Reference',
	   'file_src' =>'/uploads/documents/eia_documents/tor'.$this->getObject()->getTor(),
	   #'is_image' => true,
	   'edit_mode' => !$this->isNew(),
	   'template' => '<div>%file%<br/>%input%<br/>%delete% %delete_label%</div>',
	   ));
	   //also change the default validator
	  $this->validatorSchema['tor'] = new sfValidatorFile(array(
	   'required' => false,
	   'path' =>sfConfig::get('sf_upload_dir').'/documents/eia_documents/tor',
	   ));
	    $this->widgetSchema['tor_delete'] = new sfWidgetFormInputHidden();
	   $this->validatorSchema['tor_delete'] = new sfValidatorPass(); 
  }
}

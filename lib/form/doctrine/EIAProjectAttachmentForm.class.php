<?php

/**
 * EIAProjectAttachment form.
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EIAProjectAttachmentForm extends BaseEIAProjectAttachmentForm
{
  public function configure()
  {
    unset($this['created_at'],$this['updated_at'], $this['created_by'], $this['updated_by'] , $this['token']);
	$this->setDefault('created_at',date('Y-m-d 00:00:00'));
	//////////////////////////////////////////////////
	 $this->widgetSchema['panoramic_view'] = new sfWidgetFormInputFileEditable(array(
	  # 'label'=>'ShareHolders List',
	   'file_src' =>'/uploads/documents/eia_documents'.$this->getObject()->getPanoramicView(),
	   #'is_image' => true,
	   'edit_mode' => !$this->isNew(),
	   'template' => '<div>%file%<br/>%input%<br/>%delete% %delete_label%</div>',
	   ));
	   //also change the default validator
	  $this->validatorSchema['panoramic_view'] = new sfValidatorFile(array(
	   'required' => false,
	   'path' =>sfConfig::get('sf_upload_dir').'/documents/eia_documents',
	   )); 
	 //////
	 $this->widgetSchema['perspective_site_impact'] = new sfWidgetFormInputFileEditable(array(
	  # 'label'=>'ShareHolders List',
	   'file_src' =>'/uploads/documents/eia_documents'.$this->getObject()->getPanoramicView(),
	   #'is_image' => true,
	   'edit_mode' => !$this->isNew(),
	   'template' => '<div>%file%<br/>%input%<br/>%delete% %delete_label%</div>',
	   ));
	   //also change the default validator
	  $this->validatorSchema['perspective_site_impact'] = new sfValidatorFile(array(
	   'required' => false,
	   'path' =>sfConfig::get('sf_upload_dir').'/documents/eia_documents',
	   )); 
	   /////
	    $this->widgetSchema['preliminary_approval'] = new sfWidgetFormInputFileEditable(array(
	  # 'label'=>'ShareHolders List',
	   'file_src' =>'/uploads/documents/eia_documents'.$this->getObject()->getPanoramicView(),
	   #'is_image' => true,
	   'edit_mode' => !$this->isNew(),
	   'template' => '<div>%file%<br/>%input%<br/>%delete% %delete_label%</div>',
	   ));
	   //also change the default validator
	  $this->validatorSchema['preliminary_approval'] = new sfValidatorFile(array(
	   'required' => false,
	   'path' =>sfConfig::get('sf_upload_dir').'/documents/eia_documents',
	   )); 
	   ////
	   $this->widgetSchema['land_ownership_doc'] = new sfWidgetFormInputFileEditable(array(
	  # 'label'=>'ShareHolders List',
	   'file_src' =>'/uploads/documents/eia_documents'.$this->getObject()->getPanoramicView(),
	   #'is_image' => true,
	   'edit_mode' => !$this->isNew(),
	   'template' => '<div>%file%<br/>%input%<br/>%delete% %delete_label%</div>',
	   ));
	   //also change the default validator
	  $this->validatorSchema['land_ownership_doc'] = new sfValidatorFile(array(
	   'required' => false,
	   'path' =>sfConfig::get('sf_upload_dir').'/documents/eia_documents',
	   )); 
	   ////
	    $this->widgetSchema['ministrial_document'] = new sfWidgetFormInputFileEditable(array(
	  # 'label'=>'ShareHolders List',
	   'file_src' =>'/uploads/documents/eia_documents'.$this->getObject()->getPanoramicView(),
	   #'is_image' => true,
	   'edit_mode' => !$this->isNew(),
	   'template' => '<div>%file%<br/>%input%<br/>%delete% %delete_label%</div>',
	   ));
	   //also change the default validator
	  $this->validatorSchema['ministrial_document'] = new sfValidatorFile(array(
	   'required' => false,
	   'path' =>sfConfig::get('sf_upload_dir').'/documents/eia_documents',
	   )); 
	   ////
	   $this->widgetSchema['perimeter_area_map'] = new sfWidgetFormInputFileEditable(array(
	  # 'label'=>'ShareHolders List',
	   'file_src' =>'/uploads/documents/eia_documents'.$this->getObject()->getPanoramicView(),
	   #'is_image' => true,
	   'edit_mode' => !$this->isNew(),
	   'template' => '<div>%file%<br/>%input%<br/>%delete% %delete_label%</div>',
	   ));
	   //also change the default validator
	  $this->validatorSchema['perimeter_area_map'] = new sfValidatorFile(array(
	   'required' => false,
	   'path' =>sfConfig::get('sf_upload_dir').'/documents/eia_documents',
	   )); 
	   ///
	   $this->widgetSchema['location_area_map'] = new sfWidgetFormInputFileEditable(array(
	  # 'label'=>'ShareHolders List',
	   'file_src' =>'/uploads/documents/eia_documents'.$this->getObject()->getPanoramicView(),
	   #'is_image' => true,
	   'edit_mode' => !$this->isNew(),
	   'template' => '<div>%file%<br/>%input%<br/>%delete% %delete_label%</div>',
	   ));
	   //also change the default validator
	  $this->validatorSchema['location_area_map'] = new sfValidatorFile(array(
	   'required' => false,
	   'path' =>sfConfig::get('sf_upload_dir').'/documents/eia_documents',
	   )); 
	   ////
	   $this->widgetSchema['other_supporting_document'] = new sfWidgetFormInputFileEditable(array(
	  # 'label'=>'ShareHolders List',
	   'file_src' =>'/uploads/documents/eia_documents'.$this->getObject()->getPanoramicView(),
	   #'is_image' => true,
	   'edit_mode' => !$this->isNew(),
	   'template' => '<div>%file%<br/>%input%<br/>%delete% %delete_label%</div>',
	   ));
	   //also change the default validator
	  $this->validatorSchema['other_supporting_document'] = new sfValidatorFile(array(
	   'required' => false,
	   'path' =>sfConfig::get('sf_upload_dir').'/documents/eia_documents',
	   )); 
	   ////
	    $this->widgetSchema['location_area_map'] = new sfWidgetFormInputFileEditable(array(
	  # 'label'=>'ShareHolders List',
	   'file_src' =>'/uploads/documents/eia_documents'.$this->getObject()->getPanoramicView(),
	   #'is_image' => true,
	   'edit_mode' => !$this->isNew(),
	   'template' => '<div>%file%<br/>%input%<br/>%delete% %delete_label%</div>',
	   ));
	   //also change the default validator
	  $this->validatorSchema['location_area_map'] = new sfValidatorFile(array(
	   'required' => false,
	   'path' =>sfConfig::get('sf_upload_dir').'/documents/eia_documents',
	   )); 
	$this->widgetSchema['eiaproject_id'] = new sfWidgetFormInputHidden() ;
	$this->setDefault('eiaproject_id', Doctrine_Core::getTable('EIAProjectDetail')->getProjectId());
  }
}

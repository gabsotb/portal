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
   //print_r( $this->getBusiness($business) ); exit;
   ////////
    $this->setDefault('created_at', date('Y-m-d H:i:s')); 
	
	///
	$this->widgetSchema->setLabels(array(
			  'created_at'    => 'Date'
			)); 
	//this is just a test
    $id = Doctrine_Core::getTable('InvestmentApplication')->getOnlyUserBusinesses();
	//print $id; exit;
	//print $id; exit;
    $this->setDefault('investment_id', $id);	
	//$this->widgetSchema['company_legal_nature'] = new sfWidgetFormSelect(array('choices' => self::legalNatureValues()));
	$this->widgetSchema['investment_id'] = new sfWidgetFormInputHidden() ;
	
	$this->widgetSchema['additional_incentives'] = new sfWidgetFormTextarea();
	$this->widgetSchema['visa_work_permits'] = new sfWidgetFormTextarea();
	//set labels
	$this->widgetSchema['project_brief']->setLabel('Summary of Your Project. i.e. Project Brief');
	////////////////
	 $this->widgetSchema['exemption_on_machinery'] = new sfWidgetFormInputFileEditable(array(
	  # 'label'=>'ShareHolders List',
	   'file_src' =>'/uploads/documents/investment_docs'.$this->getObject()->getExemptionOnMachinery(),
	   #'is_image' => true,
	   'edit_mode' => !$this->isNew(),
	   'template' => '<div>%file%<br/>%input%<br/>%delete% %delete_label%</div>',
	   ));
	   //also change the default validator
	  $this->validatorSchema['exemption_on_machinery'] = new sfValidatorFile(array(
	   'required' => false,
	   'path' =>sfConfig::get('sf_upload_dir').'/documents/investment_docs',
	   )); 
	    $this->widgetSchema['exemption_on_machinery_delete'] = new sfWidgetFormInputHidden();
	   $this->validatorSchema['exemption_on_machinery_delete'] = new sfValidatorPass(); 
	   /////
	    $this->widgetSchema['exemption_raw_materials'] = new sfWidgetFormInputFileEditable(array(
	  # 'label'=>'ShareHolders List',
	   'file_src' =>'/uploads/documents/investment_docs'.$this->getObject()->getExemptionRawMaterials(),
	   #'is_image' => true,
	   'edit_mode' => !$this->isNew(),
	   'template' => '<div>%file%<br/>%input%<br/>%delete% %delete_label%</div>',
	   ));
	   //also change the default validator
	  $this->validatorSchema['exemption_raw_materials'] = new sfValidatorFile(array(
	   'required' => false,
	   'path' =>sfConfig::get('sf_upload_dir').'/documents/investment_docs',
	   )); 
	    $this->widgetSchema['exemption_raw_materials_delete'] = new sfWidgetFormInputHidden();
	   $this->validatorSchema['exemption_raw_materials_delete'] = new sfValidatorPass(); 
	   ///
	     $this->widgetSchema['land_ownership_document'] = new sfWidgetFormInputFileEditable(array(
	  # 'label'=>'ShareHolders List',
	   'file_src' =>'/uploads/documents/investment_docs'.$this->getObject()->getLandOwnershipDocument(),
	   #'is_image' => true,
	   'edit_mode' => !$this->isNew(),
	   'template' => '<div>%file%<br/>%input%<br/>%delete% %delete_label%</div>',
	   )
	   );
	   $this->validatorSchema['land_ownership_document'] = new sfValidatorFile(array(
	   'required' => false,
	   'path' =>sfConfig::get('sf_upload_dir').'/documents/investment_docs',
	   ));
	   $this->widgetSchema['land_ownership_document_delete'] = new sfWidgetFormInputHidden();
	   $this->validatorSchema['land_ownership_document_delete'] = new sfValidatorPass(); 
	   ///
	     $this->widgetSchema['bill_of_quantiy'] = new sfWidgetFormInputFileEditable(array(
	  # 'label'=>'ShareHolders List',
	   'file_src' =>'/uploads/documents/investment_docs'.$this->getObject()->getBillOfQuantiy(),
	   #'is_image' => true,
	   'edit_mode' => !$this->isNew(),
	   'template' => '<div>%file%<br/>%input%<br/>%delete% %delete_label%</div>',
	   )
	   );
	     $this->validatorSchema['bill_of_quantiy'] = new sfValidatorFile(array(
	   'required' => false,
	   'path' =>sfConfig::get('sf_upload_dir').'/documents/investment_docs',
	   ));
	   $this->widgetSchema['bill_of_quantiy_delete'] = new sfWidgetFormInputHidden();
	   $this->validatorSchema['bill_of_quantiy_delete'] = new sfValidatorPass(); 
	   //
	        $this->widgetSchema['construction_permits'] = new sfWidgetFormInputFileEditable(array(
	  # 'label'=>'ShareHolders List',
	   'file_src' =>'/uploads/documents/investment_docs'.$this->getObject()->getConstructionPermits(),
	   #'is_image' => true,
	   'edit_mode' => !$this->isNew(),
	   'template' => '<div>%file%<br/>%input%<br/>%delete% %delete_label%</div>',
	   )
	   );
	   //
	     $this->validatorSchema['construction_permits'] = new sfValidatorFile(array(
	   'required' => false,
	   'path' =>sfConfig::get('sf_upload_dir').'/documents/investment_docs',
	   ));
	   $this->widgetSchema['drawings_delete'] = new sfWidgetFormInputHidden();
	   $this->validatorSchema['drawings_delete'] = new sfValidatorPass(); 
	   //
	   $this->widgetSchema['drawings'] = new sfWidgetFormInputFileEditable(array(
	  # 'label'=>'ShareHolders List',
	   'file_src' =>'/uploads/documents/investment_docs'.$this->getObject()->getDrawings(),
	   #'is_image' => true,
	   'edit_mode' => !$this->isNew(),
	   'template' => '<div>%file%<br/>%input%<br/>%delete% %delete_label%</div>',
	   )
	   );
	   //
	     $this->validatorSchema['drawings'] = new sfValidatorFile(array(
	   'required' => false,
	   'path' =>sfConfig::get('sf_upload_dir').'/documents/investment_docs',
	   ));
	     $this->widgetSchema['construction_permits_delete'] = new sfWidgetFormInputHidden();
	   $this->validatorSchema['construction_permits_delete'] = new sfValidatorPass(); 
	   //
	   // $this->validatorSchema['file_delete'] = new sfValidatorPass();
		//Input choice
		$this->widgetSchema['investment_allowances'] = new sfWidgetFormChoice(array(
		#  'label' => 'Category',
		  'choices'  => Doctrine_Core::getTable('BusinessPlan')->getAllowance(),
		  'expanded' => false,
		));
    ////////////
    unset($this['updated_at'],$this['updated_by'], $this['created_by'],$this['created_at'] );
  }
  
}

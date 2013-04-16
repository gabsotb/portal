<?php

/**
 * TorSubmit form.
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TorSubmitForm extends BaseTorSubmitForm
{
  public function configure()
  {
    unset($this['created_at'],$this['updated_at'], $this['created_by'], $this['updated_by'], $this['token']);
	$this->widgetSchema['eiaproject_id'] = new sfWidgetFormInputHidden();
	$this->widgetSchema['attachement'] = new sfWidgetFormInputFileEditable(array(
	   'label'=>'Attach file',
	   'file_src' =>'/uploads/documents/eia_documents/tor'.$this->getObject()->getAttachement(),
	   #'is_image' => true,
	   'edit_mode' => !$this->isNew(),
	   'template' => '<div>%file%<br/>%input%<br/>%delete% %delete_label%</div>',
	   ));
	   //also change the default validator
	  $this->validatorSchema['attachement'] = new sfValidatorFile(array(
	   'required' => true,
	   'path' =>sfConfig::get('sf_upload_dir').'/documents/eia_documents/tor',
	   ));
	//$this->setDefault('eiaproject_id',1);		
  }
}

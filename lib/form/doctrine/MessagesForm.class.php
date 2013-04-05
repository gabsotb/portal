<?php

/**
 * Messages form.
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MessagesForm extends BaseMessagesForm
{
  public function configure()
  {
    unset($this['created_at'],$this['updated_at'], $this['created_by'], $this['updated_by'], $this['token']);
	$this->setDefault('created_at',date('Y-m-d 00:00:00'));
	///
	//$userId = sfContext::getInstance()->getUser()->getGuardUser()->getId();
	$username = sfContext::getInstance()->getUser()->getGuardUser()->getUsername();
	//
	$this->setDefault('sender', $username);
	//
	$this->widgetSchema['sender'] = new sfWidgetFormInputHidden();
	//$this->widgetSchema->setLabel('attachement','Any Attachment?');
	///
	$this->widgetSchema['attachement'] = new sfWidgetFormInputFileEditable(array(
	   'label'=>'Any Attachment?',
	   'file_src' =>'/uploads/documents/messages_docs'.$this->getObject()->getAttachement(),
	   #'is_image' => true,
	   'edit_mode' => !$this->isNew(),
	   'template' => '<div>%file%<br/>%input%<br/>%delete% %delete_label%</div>',
	   ));
	   //also change the default validator
	  $this->validatorSchema['attachement'] = new sfValidatorFile(array(
	   'required' => false,
	   'path' =>sfConfig::get('sf_upload_dir').'/documents/messages_docs',
	   ));
  }
}

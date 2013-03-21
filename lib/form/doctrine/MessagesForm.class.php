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
	$userId = sfContext::getInstance()->getUser()->getGuardUser()->getId();
	//
	$this->setDefault('sender', $userId);
	//
	$this->widgetSchema['sender'] = new sfWidgetFormInputHidden();
  }
}

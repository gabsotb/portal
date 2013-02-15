<?php 

/* This is a Custom class for creating a form that will be used to verify payment of a business for issue
of Certificate
Author: Mwendia.bonface4@gmail.com
 */
class ConfirmForm extends BaseForm
{
 public function configure()
  {
    $this->setWidgets(array(
      'number'    => new sfWidgetFormInputText()
    ));
	$this->widgetSchema->setLabel('number', 'Please Enter Receipt Number');
  }
}
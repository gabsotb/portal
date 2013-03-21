<?php

/**
 * InvestmentResubmission form.
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class InvestmentResubmissionForm extends BaseInvestmentResubmissionForm
{
  public function configure()
  {
   unset($this['created_at'],$this['updated_at'], $this['created_by'], $this['updated_by']);
	$this->setDefault('created_at',date('Y-m-d 00:00:00'));
    //we get a session variable for this user
     $this->id = sfContext::getInstance()->getUser()->getAttribute('business_id');
	 //
    $this->setDefault('business_id',$this->id);	 
	$this->widgetSchema['business_id'] = new sfWidgetFormInputHidden() ;
  }
}

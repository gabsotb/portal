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
    $this->setDefault('investment_id', $id);	
	//$this->widgetSchema['company_legal_nature'] = new sfWidgetFormSelect(array('choices' => self::legalNatureValues()));
	$this->widgetSchema['investment_id'] = new sfWidgetFormInputHidden() ;
    ////
    unset($this['updated_at'],$this['updated_by'], $this['created_by'],$this['created_at'] );
  }
  
}

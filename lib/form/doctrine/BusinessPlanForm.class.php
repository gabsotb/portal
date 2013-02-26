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
  // print_r( $this->getBusiness("Smartline") ); exit;
   ////////
    $this->setDefault('created_at', date('Y-m-d H:i:s')); 
	unset($this['updated_at'],$this['updated_by'], $this['created_by']);
	///
	$this->widgetSchema->setLabels(array(
			  'created_at'    => 'Date',
			  'investment_id'   => 'Business Name'
			));
			
	//$this->widgetSchema['company_legal_nature'] = new sfWidgetFormSelect(array('choices' => self::legalNatureValues()));
    ////
    /* $this->widgetSchema['investment_id'] =  new sfWidgetFormSelect(array(
	  'multiple' => 'false',
	  'choices'  => $this->getBusiness("edwincompany"),
	  'default'  => array('en', 0)
	));	*/
  }
  //a method to return the correct business for the user submitting applications
  public function getBusiness($id)
  {
    $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("
	SELECT investment_application.id,investment_application.name FROM investment_application
	WHERE investment_application.name = '$id' ");
	///
	$values = array();
	foreach($query as $q)
	{
	 $values = array($q['id'] => $q['name']);
	}
	return $values;
  }
}

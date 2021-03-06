<?php

/**
 * InvestmentApplication form.
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class InvestmentApplicationForm extends BaseInvestmentApplicationForm
{
  
  
  
  public function generateNumbers()
  {
   $numbers = array();
   for ($i = 0; $i < 500; ++$i) 
        {
			$numbers[] = $i;
		}
		return $numbers;
  }
 
 
  
  public function configure()
  {
   //Labels
   $this->widgetSchema->setLabel('created_at', 'Date');
   $this->widgetSchema->setLabel('registration_number','TIN Number');
   $this->widgetSchema->setLabel('name','Company Name');
   //set default date and time
   $this->setDefault('created_at',date('Y-m-d H:i:s')); 
  // unset($this['username_id']);
   //unset some fields
   unset($this['created_at'],$this['updated_at'], $this['created_by'], $this['updated_by']);
   ///
    $this->widgetSchema['business_category'] = new sfWidgetFormChoice(array(
	  'label' => 'Category',
	  'choices'  => Doctrine_Core::getTable('InvestmentApplication')->getCategories(),
	  'expanded' => false,
    ));
	/////
	 $this->widgetSchema['currency_type'] = new sfWidgetFormChoice(array(
	  'label' => 'Choose Currency Type',
	  'choices'  => Doctrine_Core::getTable('InvestmentApplication')->getCurrencies(),
	  'expanded' => false,
    ));
   ////
   $this->widgetSchema['token'] = new sfWidgetFormInputHidden();
   $token = sha1(date('Y-m-d').rand(11111, 99999));
   $this->setDefault('token',$token); 
  //applicant reference number
   $this->widgetSchema['applicant_reference_number'] = new sfWidgetFormInputHidden();
   $applicant_reference_number = Doctrine_Core::getTable('InvestmentApplication')->createIncrementalReferenceNumber();
    ////  
   $this->setDefault('applicant_reference_number',$applicant_reference_number); 
  //customize error messages
  $this->validatorSchema['name']  = new sfValidatorString(array(), array('required' => 'Please Provide Company name'));
  $this->validatorSchema['registration_number']  = new sfValidatorString(array(),array('required' => 'The Company Registration Number is Required?'));
  ///setting default values
 /* $this->widgetSchema['district'] = new sfWidgetFormChoice(array(
	  'label' => 'Select District',
	  'choices'  => Doctrine_Core::getTable('InvestmentApplication')->getDistricts(),
	  'expanded' => false,
    ));
    $this->widgetSchema['city_province'] = new sfWidgetFormChoice(array(
	  'label' => 'Select Province',
	  'choices'  => Doctrine_Core::getTable('InvestmentApplication')->getProvinces(),
	  'expanded' => false,
    )); */
  }
}

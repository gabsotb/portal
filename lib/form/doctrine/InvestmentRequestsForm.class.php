<?php

/**
 * InvestmentRequests form.
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class InvestmentRequestsForm extends BaseInvestmentRequestsForm
{
  public function configure()
  {
   unset($this['created_at'],$this['updated_at'], $this['created_by'], $this['updated_by']);
   ///we create select fields for users who have role investment data admins
    $group = "investmentcertadmins";
    $this->widgetSchema['requestor'] = new sfWidgetFormChoice(array(
	  'label' => 'Data Admin Requesting',
	  'choices'  => Doctrine_Core::getTable('InvestmentApplication')->getInvestmentCertUsers($group),
	  'expanded' => false,
    ));
	//
	$this->widgetSchema['request_type'] = new sfWidgetFormChoice(array(
	  'label' => 'Select Request Type',
	  'choices'  => Doctrine_Core::getTable('InvestmentRequests')->getRequestTypes(),
	  'expanded' => false,
    ));
	///
	$this->widgetSchema['status'] = new sfWidgetFormChoice(array(
	  'label' => 'Your Verdict',
	  'choices'  => Doctrine_Core::getTable('InvestmentRequests')->getStatus(),
	  'expanded' => false,
    ));
	//set label
	$this->widgetSchema->setLabel('reference_number','Enter Business Application Reference Number');
  }
}

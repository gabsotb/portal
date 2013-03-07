<?php

/**
 * Portlets form.
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PortletsForm extends BasePortletsForm
{
  public function configure()
  {
    unset($this['updated_at'], $this['created_by'], $this['updated_by'],$this['created_at']);
    //$this->widgetSchema->setLabel('created_at', 'Date');
	$this->widgetSchema->setLabel('investment_certificate', 'Investment Certificates');
	$this->widgetSchema->setLabel('eia_certificate', 'EIA Certificates');
	$this->widgetSchema->setLabel('tax_exemptions', 'Tax Exemptions');
	$this->setDefault('created_at',date('Y-m-d H:i:s')); 
	///
  }
}

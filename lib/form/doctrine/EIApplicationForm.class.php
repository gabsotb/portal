<?php

/**
 * EIApplication form.
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EIApplicationForm extends BaseEIApplicationForm
{
  public function configure()
  {
	unset(
		$this['created_at'], $this['updated_at'], $this['updated_by'], $this['created_by']
		);
	
	$this->widgetSchema->setlabels(array(
		'company_regno' => 'Company Registration No.'
		
		));
	
  }
}

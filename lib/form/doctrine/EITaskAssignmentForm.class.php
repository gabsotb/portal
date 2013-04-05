<?php

/**
 * EITaskAssignment form.
 *
 * @package    rdbeportal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EITaskAssignmentForm extends BaseEITaskAssignmentForm
{
  public function configure()
  {
	unset(
		$this['created_by'], $this['updated_by'], $this['created_at'], $this['updated_at']
	);
	
	$this->setDefault('work_status','notstarted');
	$this->widgetSchema['work_status'] = new sfWidgetFormInputHidden();

	$this->setDefault('duedate',date('Y-m-d G:i:s',time()+ 86400*2 ));
	$this->widgetSchema['duedate'] = new sfWidgetFormInputText();
	$this->widgetSchema['instructions'] = new sfWidgetFormTextarea();
	$this->widgetSchema['token'] = new sfWidgetFormInputHidden();
  }
  
}

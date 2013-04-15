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

	$this->setDefault('duedate',date('Y-m-d',time()+ 86400*2 ));
	$this->widgetSchema['duedate'] = new sfWidgetFormInputText();
	$this->widgetSchema['instructions'] = new sfWidgetFormTextarea();
	$this->widgetSchema['token'] = new sfWidgetFormInputHidden();
	///
	$this->widgetSchema->setLabel('user_assigned', 'Assign To') ;
	////
	$data_admins = "eiacertadmins";
	$managers = "departmentadmins" ;
	 $this->widgetSchema['user_assigned'] = new sfWidgetFormChoice(array(
	  'label' => 'Assign To',
	  'choices'  => Doctrine_Core::getTable('EIAProjectDetail')->getAllEIACertWorkers($data_admins,$managers),
	  'expanded' => false,
    ));
	///
	$this->widgetSchema['eiaproject_id'] = new sfWidgetFormInputHidden();
	$eiaproject_id = sfContext::getInstance()->getUser()->getAttribute('eiaprojectdetail_id');
	///
	$this->setDefault('eiaproject_id',$eiaproject_id);
	//$this->widgetSchema->setLabel('eiaproject_id', 'Project Name') ;
  }
  
}

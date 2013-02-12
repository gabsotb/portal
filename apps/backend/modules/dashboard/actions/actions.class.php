<?php

/**
 * dashboard actions.
 *
 * @package    rdbeportal
 * @subpackage dashboard
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class dashboardActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    //$this->forward('default', 'module');
	//we call method to select records from InvestmentApplications submitted who's status is submitted i.e. not assigned to a staff.
	 $status = 'submitted';
	$this->new_applications = Doctrine_Core::getTable('InvestmentApplication')->getUnassignedApplications($status); // pass status for the where clause
	///we need to call a function to return user available tasks
	//action to retrieve assigned tasks for currently logged in admin
	//let us retrieve the id of logged in user
   $userId = sfContext::getInstance()->getUser()->getGuardUser()->getId();
   $this->mytasks = Doctrine_Core::getTable('TaskAssignment')->getUserTasks($userId) ;
	
  } 
}

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
   //echo $userId; exit;
   $this->mytasks = Doctrine_Core::getTable('TaskAssignment')->getUserTasks($userId);
   $this->mytasksnotcomplete = Doctrine_Core::getTable('TaskAssignment')->getUserTasksNotComplete($userId);
	
  } 
    //function download letter of application
  public function executeDownload1(sfwebRequest $request)
  {
   //echo "value is" .$request->getParameter('investmentapp_id'); exit;
    $blog_user = Doctrine_Core::getTable('InvestmentApplication')->find($request->getParameter('id'));
    $this->forward404Unless($blog_user);

    header('content-type:');
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($blog_user->getApplicationLetter()));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . filesize($blog_user->getApplicationLetter()));
    ob_clean();
    flush();

    readfile($blog_user->getApplicationLetter());

    return sfView::NONE;
  }
  //function for start work
  public function executeStart(sfWebRequest $request)
  {
    
	$this->value = $request->getParameter('id'); // here we get the parameter 
	
	/*Since we have the id of the business, we now retrieve all details for this application for investment certificate from
	the three tables. InvestmentApplication, BusinessPlan and TaskAssignment*/
	$this->details = Doctrine_Core::getTable('TaskAssignment')->getApplicationDetails($this->value);
	$this->forward404Unless($this->details);
	
  }
}

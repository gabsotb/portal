<?php

/**
 * eireportresubmit actions.
 *
 * @package    rdbeportal
 * @subpackage eireportresubmit
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class eireportresubmitActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->ei_report_resubmissions = Doctrine_Core::getTable('EIReportResubmission')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->ei_report_resubmission = Doctrine_Core::getTable('EIReportResubmission')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->ei_report_resubmission);
  }

  public function executeNew(sfWebRequest $request)
  {
    //we retrieve the project id value
	$project_id = $request->getParameter('id');
	//print $project_id; exit;
	//we will check the existance of this id in EIATaskAssignmentTable if not found, we forward to 
	$validate_query = Doctrine_Core::getTable('EITaskAssignment')->checkEiaExistance($project_id);
	//print $validate_query; exit;
	//
	$validate_id = null ;
	foreach($validate_query as $q)
	{
	 $validate_id = $q['id'] ;
	}
	//
	if($validate_id == null)
	{
	 $this->forward404(sprintf('Validation Error.'));
	}
	else if($validate_id != null)
	{
	 //set a session id for the project_id
	$this->getUser()->setAttribute('project_id_resubmit', $project_id);
	
	
   $this->form = new EIReportResubmissionForm();
	}
	
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new EIReportResubmissionForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($ei_report_resubmission = Doctrine_Core::getTable('EIReportResubmission')->find(array($request->getParameter('id'))), sprintf('Object ei_report_resubmission does not exist (%s).', $request->getParameter('id')));
    $this->form = new EIReportResubmissionForm($ei_report_resubmission);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($ei_report_resubmission = Doctrine_Core::getTable('EIReportResubmission')->find(array($request->getParameter('id'))), sprintf('Object ei_report_resubmission does not exist (%s).', $request->getParameter('id')));
    $this->form = new EIReportResubmissionForm($ei_report_resubmission);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($ei_report_resubmission = Doctrine_Core::getTable('EIReportResubmission')->find(array($request->getParameter('id'))), sprintf('Object ei_report_resubmission does not exist (%s).', $request->getParameter('id')));
    $ei_report_resubmission->delete();

    $this->redirect('eireportresubmit/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
        
       //we notify the client/investor that of this request from the data admin
        //retrieve the session id and use it to get the email address of the client and username.
		$project_id = $this->getUser()->getAttribute('project_id_resubmit');
		//get values from form
	   $allFormValues = $request->getParameter($this->form->getName());
		//
		$message = $allFormValues['comments'];
		
		
		//retrieve the client username and password.
		$query_investor = Doctrine_Core::getTable('EIAProjectDetail')->getInvestorInfo($project_id);
		$investor_name = null;
		$investor_email = null ;
		//loop
		foreach($query_investor  as $q)
		{
		 $investor_name = $q['updated_by'];
		 $investor_email = $q['email_address'];
		}
		//pass values to method resposible for messaging
		//print $message; exit;
		
	    $ei_report_resubmission = $form->save();
		$this->sendMessages($investor_name, $investor_email,$message);
		$this->updateEIReportStatus($project_id);
     // $this->redirect('eireportresubmit/edit?id='.$ei_report_resubmission->getId());
	   $this->redirect('dashboard/index');
    }
  }
  //custom method to send emails and notifications
  public function sendMessages($investor_name, $investor_email,$msg)
  {
   //get current logged in username
		//$logged_user = sfContext::getInstance()->getUser()->getGuardUser()->getUserName();
		 $logged_user = sfContext::getInstance()->getUser()->getGuardUser()->getUserName();
		 $logged_user_email = sfContext::getInstance()->getUser()->getGuardUser()->getEmailAddress();
		//print  $logged_user; exit;
		//
		$message = new Messages();
		$message->sender = $logged_user ;
		$message->recepient = $investor_name;
		$message->sender_email = $logged_user_email;
		$message->recepient_email = $investor_email;
		$message->message = $msg;
		$message->created_at = date('Y-m-d H:i:s');
		$message->save();
		/// notifications
		//notify the user logged of successful request sent
		$notifications = new Notifications();
		$notifications->recepient = $logged_user ;
		$notifications->message = "Request for EIReport Resubmission sent successfuly." ;
		$notifications->save();
		//we also update the status of the EIReport
		
  }
  //custom method to update the status of eireport
  public function updateEIReportStatus($eiaproject_id)
	{
	 $value = "awaitingresubmission";
	 //
      $q = Doctrine_Query::create()
	 ->UPDATE('EIReport')
	 ->SET('status ', '?' , $value)
	 ->WHERE('eiaproject_id = ?', $eiaproject_id);
	 $q->execute();
	}
}

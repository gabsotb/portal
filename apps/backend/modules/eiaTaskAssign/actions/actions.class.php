<?php

/**
 * eiaTaskAssign actions.
 *
 * @package    rdbeportal
 * @subpackage eiaTaskAssign
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class eiaTaskAssignActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->ei_task_assignments = Doctrine_Core::getTable('EITaskAssignment')
      ->createQuery('a')
      ->execute();
	  //we write a function that retrieves records
	  $this->ei_task_assignments = Doctrine_Core::getTable('EITaskAssignment')->getCurrentLoggedUserAssignTasks();
 }

  public function executeShow(sfWebRequest $request)
  {
    $this->ei_task_assignment = Doctrine_Core::getTable('EITaskAssignment')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->ei_task_assignment);
  }

  public function executeNew(sfWebRequest $request)
  {
	$this->forward404Unless($status = Doctrine_Core::getTable('EIApplicationStatus')->find(array($request->getParameter('id'))),'No such application exist');
	//get the parameter and use it to set a session variable.
	$parameter = $request->getParameter('id');
	///
	$this->getUser()->setAttribute('eiaprojectdetail_id',$parameter);
	//Update status
	/*if($status)
	{
		$status->setApplicationStatus('assigning');
		$status->setComments('Your application is been assigned.');
		$status->setPercentage(20);
		$status->save();
	}*/
    $this->form = new EITaskAssignmentForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new EITaskAssignmentForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($ei_task_assignment = Doctrine_Core::getTable('EITaskAssignment')->find(array($request->getParameter('id'))), sprintf('Object ei_task_assignment does not exist (%s).', $request->getParameter('id')));
    $this->form = new EITaskAssignmentForm($ei_task_assignment);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($ei_task_assignment = Doctrine_Core::getTable('EITaskAssignment')->find(array($request->getParameter('id'))), sprintf('Object ei_task_assignment does not exist (%s).', $request->getParameter('id')));
    $this->form = new EITaskAssignmentForm($ei_task_assignment);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($ei_task_assignment = Doctrine_Core::getTable('EITaskAssignment')->find(array($request->getParameter('id'))), sprintf('Object ei_task_assignment does not exist (%s).', $request->getParameter('id')));
    $ei_task_assignment->delete();

    $this->redirect('eiaTaskAssign/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $ei_task_assignment = $form->save();
		if($ei_task_assignment->getWorkStatus() == 'notstarted')
		{
		Doctrine_Core::getTable('EIApplicationStatus')->updateStatus($ei_task_assignment->getEiaprojectId(),'assigned');
		Doctrine_Core::getTable('EIApplicationStatus')->updateComment($ei_task_assignment->getEiaprojectId(),'Your application has been assigned.');
		Doctrine_Core::getTable('EIApplicationStatus')->updatePercentage($ei_task_assignment->getEiaprojectId(),30);
		
     //we send message to the investor informing them of successful application
	 //get the current logged in user email address
				$email = sfContext::getInstance()->getUser()->getGuardUser()->getEmailAddress();
				$receiver = sfContext::getInstance()->getUser()->getGuardUser()->getUsername();
				$namesAdmin=$ei_task_assignment->getSfGuardUser();
				$nameAdmin=$ei_task_assignment->getSfGuardUser()->getUserName();
				$adminMail=$ei_task_assignment->getSfGuardUser()->getOutlookAddress();
				$project=$ei_task_assignment->getEIAProjectDetail()->getProjectTitle();
				$investor=$ei_task_assignment->getEIAProjectDetail()->getUpdatedBy();
				$due=date('D, j M y g:i a',$ei_task_assignment->getDateTimeobject('duedate')->format('U'));
				//Notify data admin who has been assigned
				  $this->getMailer()->composeAndSend('noreply@rdb.com',
										$adminMail ,
										'New Application ',
										"A New application for Environmental Impact Assessment Certificate has been received and assigned to you.\n".
										 "Please login to your account to review it. Use the link below\n".
										 "http://198.154.203.38:8234/backend.php"
													  ); 
					//Message content								  
				  $msgAdmin = new Messages();
				  $msgAdmin->sender = "noreply@rdb.com";
				  $msgAdmin->recepient = $nameAdmin;
				  $msgAdmin->message = "A New application for Environmental Impact Assessment Certificate has been received and assigned to you." ;
				  $msgAdmin->created_at = date('Y-m-d H:i:s');
				  $msgAdmin->save();
				  /////////////Also we add a new notification
				  $notifyAdmin = new Notifications();
				  $notifyAdmin->recepient = $nameAdmin;
				  $notifyAdmin->message = "New application";
				  $notifyAdmin->created_at = date('Y-m-d H:i:s');
				  $notifyAdmin->save();
				  //////////////////////////////////////////
				//Notify Investor
				  $msgInvestor = new Messages();
				  //set message content
				  $sender = "noreply@rdb.com";
				  $receipient = $investor;
				  $content = "Your application has been assigned to '$namesAdmin'.Timeline for completion is on: '$due'" ;
				  //
				  $msgInvestor->sender = $sender;
				  $msgInvestor->recepient = $receipient;
				  $msgInvestor->message = $content ;
				  $msgInvestor->created_at = date('Y-m-d H:i:s');
				  $msgInvestor->save();
				  /////////////Also we add a new notification
				  $notifyUser = new Notifications();
				  $notifyUser->recepient = $receipient;
				  $notifyUser->message = "Your application has been assigned";
				  $notifyUser->created_at = date('Y-m-d H:i:s');
				  $notifyUser->save();
				 ///we also send a mail to user inbox account of our system
				  $msgUser = new Messages();
				  //set message content
				  $sender = "noreply@rdb.com";
				  $receipient = $receiver;
				  $content = "You have assigned '$namesAdmin' the following project: '$project' successfully.Due on '$due'" ;
				  //
				  $msgUser->sender = $sender;
				  $msgUser->recepient = $receipient;
				  $msgUser->message = $content ;
				  $msgUser->created_at = date('Y-m-d H:i:s');
				  $msgUser->save();
				  /////////////Also we add a new notification
				  $notifyUser = new Notifications();
				  $notifyUser->recepient = $receipient;
				  $notifyUser->message = "Job assigned successfully.";
				  $notifyUser->created_at = date('Y-m-d H:i:s');
				  $notifyUser->save();
				  ///we want to also notify managers 
				  //we will use the business plan table for that purpose
				  //get email managers addresses
				  $manageraddresses = array() ;
				  $group = "departmentadmins";
				  $manager = Doctrine_Core::getTable('BusinessPlan')->getUsers($group);
				  $managercontent = "New job assigned by '$receiver' to '$namesAdmin' for the following project: '$project' due on '$due'";
				$managernotification = "New job assigned";						 
				  //
				  $msg = new Messages();
				  $notify = new Notifications();
				  foreach($manager as $v)
				  {
				    $manageraddresses  [] = $v['email_address'];
					//System Internal Notifications
					//Messages to All Managers
			          $msg->sender = "noreply@rdb.com";
					  $msg->recepient = $v['username'];
					  $msg->message = $managercontent;
					  $msg->created_at = date('Y-m-d H:i:s');
					  
					//Notifications to All Managers
					 $notify->recepient = $v['username'];
				     $notify->message = $managernotification;
				     $notify->created_at = date('Y-m-d H:i:s');
				  }
				   $msg->save();
				   $notify->save();
				  sfContext::getInstance()->getUser()->getAttributeHolder()->remove('eiaprojectdetail_id'); //clear session variable
	             /////////////////////////////////////////////////
			}
      $this->redirect('@homepage');
    }
  }
  /*public function executeTaskAssign(sfWebRequest $request)
  {
	$taskAssign = new EITaskAssignment();
	$taskAssign->eiaproject_id=$request->getParameter('id');
	$taskAssign->save();
	$taskId=Doctrine_Core::getTable('EITaskAssignment')->findByEiaprojectId($request->getParameter('id'));
	$this->redirect('eiaTaskAssign/edit?id='.$taskId[0]['id']);
  }*/
	
}

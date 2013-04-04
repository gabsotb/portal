<?php

/**
 * InvestmentCertTaskAssignment actions.
 *
 * @package    rdbeportal
 * @subpackage InvestmentCertTaskAssignment
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class InvestmentCertTaskAssignmentActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    /*$this->task_assignments = Doctrine_Core::getTable('TaskAssignment')
      ->createQuery('a')
      ->execute(); */
	    
	  //We select Tasks That this administrator has assigned to data administrators
	   $username = sfContext::getInstance()->getUser()->getGuardUser()->getUsername();
	   $this->task_assignments = Doctrine_Core::getTable('TaskAssignment')->getAssignedTasks($username);
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->task_assignment = Doctrine_Core::getTable('TaskAssignment')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->task_assignment);
  }

  public function executeNew(sfWebRequest $request)
  {
   //before we create a form we get the necessary parameters from url
   $regno = $request->getParameter('registration') ;
   $token = $request->getParameter('token') ;
  // $variable = $name ;
  // print $name; exit;
   //$group = $request->getParameter('group');
   //if parameters are empty invalid, we also get the business parameter and counter check it from the database and make sure that it exists.
    $this->validity = Doctrine_Core::getTable('InvestmentApplication')->ValidateBusiness($regno,$token);
	//print ($this->validity); exit;
	$this->forward404Unless($this->validity);
    /// then if this business is valid, we pass necessary parameters to our methods to help us in task assignment
	/*$value = new TaskAssignmentTable();
	$value->getDataAdmins($group);
	$value->getCompanyName($name); */
	/*$groupValue = Doctrine_Core::getTable('TaskAssignment')->getDataAdmins($group);
	$nameValue = Doctrine_Core::getTable('TaskAssignment')->getCompanyName($name);*/
	///
	
	////
	//$access = new TaskAssignment();
	//$access->user_assigned = $values->getGroup();
	//$access->investmentapp_id = $values->getCompany();
	
	///
	///////////////
    $this->form = new TaskAssignmentForm();
	
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new TaskAssignmentForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($task_assignment = Doctrine_Core::getTable('TaskAssignment')->find(array($request->getParameter('id'))), sprintf('Object task_assignment does not exist (%s).', $request->getParameter('id')));
    $this->form = new TaskAssignmentForm($task_assignment);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($task_assignment = Doctrine_Core::getTable('TaskAssignment')->find(array($request->getParameter('id'))), sprintf('Object task_assignment does not exist (%s).', $request->getParameter('id')));
    $this->form = new TaskAssignmentForm($task_assignment);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($task_assignment = Doctrine_Core::getTable('TaskAssignment')->find(array($request->getParameter('id'))), sprintf('Object task_assignment does not exist (%s).', $request->getParameter('id')));
    $task_assignment->delete();

    $this->redirect('InvestmentCertTaskAssignment/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $task_assignment = $form->save();
      //we will notify the data admin assigned to that job 
	  $this->form = new TaskAssignmentForm();
	///////////////////////////////////////////
	 $allFormValues = $request->getParameter($this->form->getName());
	 //access value
	 
	   $id = $allFormValues['user_assigned'];
	   //we will send notifications and email messages
	   $query = Doctrine_Core::getTable('TaskAssignment')->getUserEmailAddress($id);
	   $email = null;
	   $name = null;
		foreach($query as $r)
		{
		 $email = $r['email_address'];
		 $name = $r['username'];
		}
		//send email
        $this->getMailer()->composeAndSend('noreply@rdb.com',
										$email ,
										'New Task ',
										"You have been assigned a new task by the manager i.e. You are expected to process application
										for Investment Registration Certificate.\n".
										 "Please login to your account and start work. Use the link below\n".
										 "http://198.154.203.38:8234/backend.php"
													  ); 		
		//also when this data admin logins in, he/she is supposed to see the notifications and system internal message of the new task assigned
		          $notify = new Notifications();
				  $notify->recepient = $name;
				  $notify->message = "You have a New task!";
				  $notify->created_at = date('Y-m-d H:i:s');
				  $notify->save();
				  ////
				  $msg = new Messages();
				  $msg->sender = "noreply@rdb.com";
				  $msg->recepient = $name;
				  $msg->message = "The Manager Has assigned you a new task to process an application for investment certificate\n
				  Please start working on it asap. Thank you" ;
				  $msg->created_at = date('Y-m-d H:i:s');
				  $msg->save();
      //$this->redirect('InvestmentCertTaskAssignment/edit?id='.$task_assignment->getId());
	  $this->redirect('InvestmentCertTaskAssignment/index');
    }
  }
}

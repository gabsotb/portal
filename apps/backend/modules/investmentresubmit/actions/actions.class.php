<?php

/**
 * investmentresubmit actions.
 *
 * @package    rdbeportal
 * @subpackage investmentresubmit
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class investmentresubmitActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->investment_resubmissions = Doctrine_Core::getTable('InvestmentResubmission')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->investment_resubmission = Doctrine_Core::getTable('InvestmentResubmission')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->investment_resubmission);
  }

  public function executeNew(sfWebRequest $request)
  {
   $business_id = $request->getParameter('id');
   //trying to use a session and save the id
   sfContext::getInstance()->getUser()->setAttribute('business_id',$business_id);
   $this->forward404Unless($business_id);   
    $this->form = new InvestmentResubmissionForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new InvestmentResubmissionForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($investment_resubmission = Doctrine_Core::getTable('InvestmentResubmission')->find(array($request->getParameter('id'))), sprintf('Object investment_resubmission does not exist (%s).', $request->getParameter('id')));
    $this->form = new InvestmentResubmissionForm($investment_resubmission);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($investment_resubmission = Doctrine_Core::getTable('InvestmentResubmission')->find(array($request->getParameter('id'))), sprintf('Object investment_resubmission does not exist (%s).', $request->getParameter('id')));
    $this->form = new InvestmentResubmissionForm($investment_resubmission);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($investment_resubmission = Doctrine_Core::getTable('InvestmentResubmission')->find(array($request->getParameter('id'))), sprintf('Object investment_resubmission does not exist (%s).', $request->getParameter('id')));
    $investment_resubmission->delete();

    $this->redirect('investmentresubmit/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
     $investment_resubmission = $form->save();
       //we also remove the variable from session
	  sfContext::getInstance()->getUser()->getAttributeHolder()->remove('business_id');
	  //we send message to the manager who assigned this particular task to this data admin and also we notify the client
	  $this->form = new InvestmentResubmissionForm();
	 $allFormValues = $request->getParameter($this->form->getName());
	 //access values
     $business_id = $allFormValues['business_id'];
	 $message_subject = $allFormValues['message_subject'];
	 $message = $allFormValues['message'];
	 ///first, we retrieve email address of the client
	 $investor_id = Doctrine_Core::getTable('BusinessPlan')->getUserId($business_id);
	 //get email address of the investor
	 $investor_query = Doctrine_Core::getTable('TaskAssignment')->getUserEmailAddress($investor_id) ;
	 $investor_email = null;
	  $investor_name = null;
	 //
	 foreach($investor_query as $q)
	 {
	  $investor_email = $q['email_address'];
	  $investor_name = $q['username'];
	 }
	 //we also get email address of the logged in data admin
	 $admin_id =  sfContext::getInstance()->getUser()->getGuardUser()->getId();
	 $admin_email = null;
	 $admin_name = null;
	 $data_admin_query = Doctrine_Core::getTable('TaskAssignment')->getUserEmailAddress($admin_id) ;
	 ///
	 foreach($data_admin_query as $q)
	 {
	  $admin_email = $q['outlook_address'];
	  $admin_name = $q['username'];
	 }
	 //send an email to the Investor
	  $this->getMailer()->composeAndSend($admin_email,
										$investor_email ,
										$message_subject,
										$message);
	//system internal notifications	for investor								
	 $notify = new Notifications();
	 $notify->recepient = $investor_name;
	 $notify->message = "Hi, You have been requested to resubmit your work for Investment Certificate Application. Check you email and inbox for more";
	 $notify->created_at = date('Y-m-d H:i:s');
	 $notify->save(); 
	 //system internal message for investor
	 $msg = new Messages();
	  $msg->sender = $admin_email;
	  $msg->recepient = $investor_name;
	  $msg->message = $message;
	  $msg->created_at = date('Y-m-d H:i:s');
	  $msg->save();
	  //we notifiy the data admin that there request was sent to investor
	     $notify2 = new Notifications();
		 $notify2->recepient = $admin_name;
		 $notify2->message = "Hi, Your request for document resubmission for client '$investor_name' was sent successfuly ";
		 $notify2->created_at = date('Y-m-d H:i:s');
		 $notify2->save(); 
	  //let us also notify the Manager or Supervisor who assigned this task to this data admin 
	  //that she/he has requested for document resubmission, i.e.
	  $manager_id = Doctrine_Core::getTable('TaskAssignment')->getManagerSupervisorId($business_id );
	  $data_manager_query = Doctrine_Core::getTable('TaskAssignment')->getUserEmailAddress($manager_id) ;
	  //
	  $manager_email = null;
	  $manager_name = null ;
	  ///
	  foreach($data_manager_query as $q)
	  {
	   $manager_email = $q['outlook_address'] ;
	   $manager_name = $q['username'] ;
	  }
	  //
	  $this->getMailer()->composeAndSend('noreply@rdb.com',
										$manager_email ,
										"The Data Admin has sent a resubmission request for processing Investment Certificate for
										'$investor_name' ",
										"This is the Message Content <br/> ('$message'), sent by '$admin_email' ");
	 //Notify Manager Internally									
	  $msg2 = new Messages();
	  $msg2->sender = "noreply@rbb.com";
	  $msg2->recepient = $manager_name;
	  $msg2->message = "The Data Admin has sent a resubmission 
	                    request for processing Investment Certificate for
										'$investor_name. This is Message Content ('$message') sent to Investor by '$admin_email' ";
	  $msg2->created_at = date('Y-m-d H:i:s');
	  $msg2->save();
	  ///
	     $notify3 = new Notifications();
		 $notify3->recepient = $manager_name;
		 $notify3->message = " '$admin_name' has sent a resubmission request for application of Investment Certificates to $investor_name ";
		 $notify3->created_at = date('Y-m-d H:i:s');
		 $notify3->save(); 
	 //we call a method to update business application status
      $update_status = Doctrine_Core::getTable('TaskAssignment')->updateBusinessStatusResubmission($business_id);	 
	 //after this tedious task, redirect to dashboard
	 $this->redirect('dashboard/index');
      //$this->redirect('investmentresubmit/edit?id='.$investment_resubmission->getId());
    }
  }
}

<?php

/**
 * investmentrejected actions.
 *
 * @package    rdbeportal
 * @subpackage investmentrejected
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class investmentrejectedActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->rejected_applicationss = Doctrine_Core::getTable('RejectedApplications')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->rejected_applications = Doctrine_Core::getTable('RejectedApplications')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->rejected_applications);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new RejectedApplicationsForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new RejectedApplicationsForm();
	   
     
    $this->processForm($request, $this->form);
     ////
	 
	 /////
    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($rejected_applications = Doctrine_Core::getTable('RejectedApplications')->find(array($request->getParameter('id'))), sprintf('Object rejected_applications does not exist (%s).', $request->getParameter('id')));
    $this->form = new RejectedApplicationsForm($rejected_applications);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($rejected_applications = Doctrine_Core::getTable('RejectedApplications')->find(array($request->getParameter('id'))), sprintf('Object rejected_applications does not exist (%s).', $request->getParameter('id')));
    $this->form = new RejectedApplicationsForm($rejected_applications);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($rejected_applications = Doctrine_Core::getTable('RejectedApplications')->find(array($request->getParameter('id'))), sprintf('Object rejected_applications does not exist (%s).', $request->getParameter('id')));
    $rejected_applications->delete();

    $this->redirect('investmentrejected/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
	  $allFormValues = $request->getParameter($this->form->getName()); // get form values
	  $business_registration = $allFormValues['business_registration']; //we get business registration
	  
	  $reasons = $allFormValues['reason']; //get reason for rejection
	  
	  //we change the status of application 
	  
	  //we inform the investor of rejection
	  // 1. we need email_address and username of the investor
	  $query = Doctrine_Core::getTable('InvestmentApplication')->getEmailAndUsername($business_registration);
	  $investor_email = null;
	  $investor_username = null;
	  ///loop
	  foreach($query  as $q)
	  {
	   $investor_email = $q['email_address'];
	   $investor_username = $q['updated_by'];
	  }
	 // print $investor_email; exit;
	 // print $investor_username; exit;
	  //now notify investor
	              $notify = new Notifications();
				  $notify->recepient = $investor_username;
				  $notify->message = "Your Application for Investment Certificate Declined. ";
				  $notify->created_at = date('Y-m-d H:i:s');
				  $notify->save();
				  //
				  $msg = new Messages();
				  $sender = "noreply@rdb.com";
				  $receipient = $investor_username;
				  $content = "Your Application for Investment Certificate Declined.<br/> ".$reasons ;
				  ///
				  $msg->sender = $sender;
				  $msg->recepient = $receipient;
				  $msg->message = $content ;
				//  $msg->created_at = date('Y-m-d H:i:s');
				  $msg->save();
				  ///send email investor
				  $this->getMailer()->composeAndSend('noreply@rdb.com',
										$investor_email ,
										'Your Application for Investment Certificate Declined',
										$reasons
										 );
				  ///notify Supervisor/Manager
				   $business_id = Doctrine_Core::getTable('InvestmentApplication')->getBusinessIdentity($business_registration);
				   $logged_id = sfContext::getInstance()->getUser()->getGuardUser()->getId();
				   $logged_username = sfContext::getInstance()->getUser()->getGuardUser()->getUserName();
				   //print $logged_id; exit;
				  //
				  $query2 = Doctrine_Core::getTable('TaskAssignment')->getManagerSupervisor($business_id, $logged_id) ;
				  //print_r ($query2); exit;
				  $manager_email = null;
	              $manager_username = null;
				  //loop
				  foreach($query2 as $q2)
				  {
				    $manager_email = $q2['email_address'];
					$manager_username = $q2['updated_by'];
				  }
				  //print "Manager is".$manager_email; exit;
				  
				  //notify manager also
				  $notify2 = new Notifications();
				  $notify2->recepient = $manager_username;
				  $notify2->message = $logged_username." has declined application for Investment Certificate for ".$investor_username. "business";
				  $notify2->created_at = date('Y-m-d H:i:s');
				  $notify2->save();
				  ///
				  $msg2 = new Messages();
				  $sender2 = "noreply@rdb.com";
				  $receipient2 = $manager_username;
				  $content2 = $logged_username." has declined application for Investment Certificate for ".$investor_username. "business. The reasons ".$reasons;
				  ///
				  $msg2->sender = $sender2;
				  $msg2->recepient = $receipient2;
				  $msg2->message = $content2 ;
				 // $msg2->created_at = date('Y-m-d H:i:s');
				  $msg2->save();
				  ///
				  ///send email manager/supervisor
				  $this->getMailer()->composeAndSend('noreply@rdb.com',
										$manager_email ,
										$logged_username." has declined application for Investment Certificate for ".$investor_username. "business. ",
										"Reasons ->".$reasons
										 );
				///notify data admin of successful rejection and notifications sent
				  $notify3 = new Notifications();
				  $notify3->recepient = $logged_username;
				  $notify3->message = "The manager and investor have been informed of your action. i.e. rejection for 
				  application for Investment Certificate for ".$investor_username. "business. Thank you.";
				  $notify3->created_at = date('Y-m-d H:i:s');
				  $notify3->save();
	  //we also change the status of application. we will do in the class file i.e. RejectedApplications.class
	  
     $rejected_applications = $form->save(); //actual rejection saving

     // $this->redirect('investmentrejected/edit?id='.$rejected_applications->getId());
	  $this->redirect('dashboard/index');
    }
  }
}

<?php

/**
 * eia actions.
 *
 * @package    rdbeportal
 * @subpackage eia
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class eiaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->ei_applications = Doctrine_Core::getTable('EIApplication')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new EIApplicationForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new EIApplicationForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($ei_application = Doctrine_Core::getTable('EIApplication')->find(array($request->getParameter('id'))), sprintf('Object ei_application does not exist (%s).', $request->getParameter('id')));
    $this->form = new EIApplicationForm($ei_application);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($ei_application = Doctrine_Core::getTable('EIApplication')->find(array($request->getParameter('id'))), sprintf('Object ei_application does not exist (%s).', $request->getParameter('id')));
    $this->form = new EIApplicationForm($ei_application);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($ei_application = Doctrine_Core::getTable('EIApplication')->find(array($request->getParameter('id'))), sprintf('Object ei_application does not exist (%s).', $request->getParameter('id')));
    $ei_application->delete();

    $this->redirect('eia/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $ei_application = $form->save();
           //we send message to the investor informing them of successful application
	 //get the current logged in user email address
				  $email = sfContext::getInstance()->getUser()->getGuardUser()->getEmailAddress();
				  $receiver = sfContext::getInstance()->getUser()->getGuardUser()->getUsername();
				  $message = Swift_Message::newInstance()
				  ->setFrom('noreply@rdb.com')
				  ->setTo($email)
				  ->setSubject('Application For EIA Certifcate')
				  ->setBody('We are pleased to inform you that you application for EIA certificate has been received. 
				  Your documents will be assigned to a staff for further processing. Please monitor the status using the Progress monitor window
				  in your account. Thank you');
				  $this->getMailer()->send($message);
				 ///we also send a mail to user inbox account of our system
				  $msg = new Messages();
				  //set message content
				  $sender = "noreply@rdb.com";
				  $receipient = $receiver;
				  $content = "We are pleased to inform you that you application for EIA certificate has been received. 
				  Your documents will be assigned to a staff for further processing. Please monitor the status using the Progress monitor window
				  in your account. Thank you" ;
				  //
				  $msg->sender = $sender;
				  $msg->recepient = $receipient;
				  $msg->message = $content ;
				  $msg->created_at = date('Y-m-d H:i:s');
				  $msg->save();
				  /////////////Also we add a new notification
				  $notify = new Notifications();
				  $notify->recepient = $receipient;
				  $notify->message = "Your application for EIA certificate received";
				  $notify->created_at = date('Y-m-d H:i:s');
				  $notify->save();
				  ///
				  ///we want to also notify managers that this investor has submitted an application for investment certificate so.....
				  //we will use the business plan table for that purpose
				  //get email managers addresses
				  $manageraddresses = array() ;
				  $group = "departmentadmins";
				  $manager = Doctrine_Core::getTable('BusinessPlan')->getUsers($group);
				  $managercontent = "A New application for EIA Certificate has been received.\n".
										 "from '$receipient' Please Assign it to a data administrator";
				 $managernotification = "New Application for EIA Certificate";						 
				  //
				  //
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
				  /////we will also notify the supervisors that an application has been submitted and that they should assign it to someone.
				  //get email address for EIA supervisors admins
				  $msg2 = new Messages(); //Second object
				  $notify2 = new Notifications(); //second object
				  
					  $investsupervisorsaddresses = array() ;
					  $group = "eiasupervisors";
					  $supervisors = Doctrine_Core::getTable('BusinessPlan')->getUsers($group);
					  $supervisorscontent = "A New application for EIA Certificate has been received.\n".
											 "from '$receipient' Please Assign it to a data administrator";
					 $supervisorsnotification = "New Application for EIA Certificate";
					 //
				 foreach($supervisors as $v)
				  {
				    $investsupervisorsaddresses  [] = $v['email_address'];
					//System Internal Notifications
					//Messages to All Managers
			          $msg2->sender = "noreply@rdb.com";
					  $msg2->recepient = $v['username'];
					  $msg2->message = $managercontent;
					  $msg2->created_at = date('Y-m-d H:i:s');
					  
					//Notifications to All Managers
					 $notify2->recepient = $v['username'];
				     $notify2->message = $supervisorsnotification;
				     $notify2->created_at = date('Y-m-d H:i:s');
				  }
				  //
				   $msg2->save();
				   $notify2->save();
				  //send mail to managers
				  $this->getMailer()->composeAndSend('noreply@rdb.com',
										$manageraddresses ,
										'New Application for EIA Registration Certificate ',
										"A New application for EIA Certificate has been received.\n".
										 "Please login to your account and assign it to a data admin staff. Use the link below\n".
										 "http://198.154.203.38:8234/backend.php"
													  ); 
				  //////////////////////////////////////////
				  ///send mail to EIA registration supervisors
				  $this->getMailer()->composeAndSend('noreply@rdb.com',
										$investsupervisorsaddresses ,
										'New Application for EIA Registration Certificate ',
										"A New application for EIA Certificate has been received.\n".
										 "Please login to your account and assign it to a data admin staff. Use the link below\n".
										 "http://198.154.203.38:8234/backend.php");
				  
        
	  $this->redirect('@homepage');
    }
  }
}

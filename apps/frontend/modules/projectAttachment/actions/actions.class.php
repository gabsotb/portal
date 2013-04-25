<?php

/**
 * projectAttachment actions.
 *
 * @package    rdbeportal
 * @subpackage projectAttachment
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class projectAttachmentActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->eia_project_attachments = Doctrine_Core::getTable('EIAProjectAttachment')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->eia_project_attachment = Doctrine_Core::getTable('EIAProjectAttachment')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->eia_project_attachment);
  }

  public function executeNew(sfWebRequest $request)
  {
	if(!is_null($phase=Doctrine_Core::getTable('EIAProjectOperationPhase')->find(array($request->getParameter('id')))) && $phase->getToken()==$request->getParameter('token'))
	{
		$this->form = new EIAProjectAttachmentForm();
		
	}else{
		$this->getUser()->setFlash('notice','Please Fill in this form first before proceeding');
		$this->redirect('@project_detail'); 
	}
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new EIAProjectAttachmentForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($eia_project_attachment = Doctrine_Core::getTable('EIAProjectAttachment')->find(array($request->getParameter('id'))), sprintf('Object eia_project_attachment does not exist (%s).', $request->getParameter('id')));
    $this->form = new EIAProjectAttachmentForm($eia_project_attachment);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($eia_project_attachment = Doctrine_Core::getTable('EIAProjectAttachment')->find(array($request->getParameter('id'))), sprintf('Object eia_project_attachment does not exist (%s).', $request->getParameter('id')));
    $this->form = new EIAProjectAttachmentForm($eia_project_attachment);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($eia_project_attachment = Doctrine_Core::getTable('EIAProjectAttachment')->find(array($request->getParameter('id'))), sprintf('Object eia_project_attachment does not exist (%s).', $request->getParameter('id')));
    $eia_project_attachment->delete();

    $this->redirect('projectAttachment/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $eia_project_attachment = $form->save();
	  if(!$eia_project_attachment->getResubmit())
	  {
	  //Update status
		$status = new EIApplicationStatus();
		$status->eiaproject_id=$eia_project_attachment->getEiaprojectId();
		$status->application_status='submitted';
		$status->comments='Your Application has been submitted.Awaiting RDB admin to assign your application to a Staff';
		$status->percentage=10;
		$status->save();
     //we send message to the investor informing them of successful application
	 //get the current logged in user email address
				$email = sfContext::getInstance()->getUser()->getGuardUser()->getEmailAddress();
				$receiver = sfContext::getInstance()->getUser()->getGuardUser()->getUsername();
				$message = Swift_Message::newInstance()
				->setFrom('noreply@rdb.com')
				->setTo($email)
				->setSubject('Application For Environmental Impact Assessment Certificate')
				->setBody('We are pleased to inform you that you application for Environmental Impact Assessment certificate has been received. 
				  Your documents will be assigned to a staff for further processing. Please monitor the status using the Progress monitor window
				  in your account. Thank you');
				  $this->getMailer()->send($message);
				 ///we also send a mail to user inbox account of our system
				  $msgUser = new Messages();
				  //set message content
				  $sender = "noreply@rdb.com";
				  $receipient = $receiver;
				  $content = "We are pleased to inform you that you application for Environmental Impact Assessment certificate has been received. 
				  Your documents will be assigned to a staff for further processing. Please monitor the status using the Progress monitor window
				  in your account. Thank you" ;
				  //
				  $msgUser->sender = $sender;
				  $msgUser->recepient = $receipient;
				  $msgUser->message = $content ;
				  $msgUser->created_at = date('Y-m-d H:i:s');
				  $msgUser->save();
				  /////////////Also we add a new notification
				  $notifyUser = new Notifications();
				  $notifyUser->recepient = $receipient;
				  $notifyUser->message = "Your application for Environmental Impact Assessment certificate has been received";
				  $notifyUser->created_at = date('Y-m-d H:i:s');
				  $notifyUser->save();
				  ///we want to also notify managers that this investor has submitted an application for Environmental Impact Assessment certificate so.....
				  //we will use the business plan table for that purpose
				  //get email managers addresses
				  $manageraddresses = array() ;
				  $group = "departmentadmins";
				  $manager = Doctrine_Core::getTable('BusinessPlan')->getUsers($group);
				  $managercontent = "A New application for Environmental Impact Assessment Certificate has been received.\n".
										 "from '$receipient' Please Assign it to a data administrator";
				 $managernotification = "New Application for Environmental Impact Assessment Certificate";						 
				  //
				  $msg = new Messages();
				  $notify = new Notifications();
				  foreach($manager as $v)
				  {
				    $manageraddresses  [] = $v['outlook_address'];
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
				  //get email address for investment supervisors admins
				  $msg2 = new Messages(); //Second object
				  $notify2 = new Notifications(); //second object
				  
					  $eiasupervisorsaddresses = array() ;
					  $group = "eiasupervisors";
					  $supervisors = Doctrine_Core::getTable('BusinessPlan')->getUsers($group);
					  $supervisorscontent = "A New application for Environmental Impact Assessment Certificate has been received.\n".
											 "from '$receipient' Please Assign it to a data administrator";
					 $supervisorsnotification = "New Application for Environmental Impact Assessment Certificate";
					 //
				 foreach($supervisors as $v)
				  {
				    $eiasupervisorsaddresses  [] = $v['outlook_address'];
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
										'New Application for Environmental Impact Assessment Certificate ',
										"A New application for Environmental Impact Assessment Certificate has been received.\n".
										 "Please login to your account and assign it to a data admin staff. Use the link below\n".
										 "http://198.154.203.38:8234/backend.php"
													  ); 
				  //////////////////////////////////////////
				  ///send mail to eia registration supervisors
				  $this->getMailer()->composeAndSend('noreply@rdb.com',
										$eiasupervisorsaddresses ,
										'New Application for Environmental Impact Assessment Certificate ',
										"A New application for Environmental Impact Assessment Certificate has been received.\n".
										 "Please login to your account and assign it to a data admin staff. Use the link below\n".
										 "http://198.154.203.38:8234/backend.php");
				  
	             /////////////////////////////////////////////////
		}
		if($eia_project_attachment->getResubmit() == 'all' || $eia_project_attachment->getResubmit() == 'only')
		{
			Doctrine_Core::getTable('EIApplicationStatus')->updateStatus($eia_project_attachment->getEiaprojectId(),'resubmitted');
			Doctrine_Core::getTable('EIApplicationStatus')->updateComment($eia_project_attachment->getEiaprojectId(),'Resubmission assessment');
			Doctrine_Core::getTable('EITaskAssignment')->updateWorkStatus($eia_project_attachment->getEiaprojectId(),'resubmitted');
			Doctrine_Core::getTable('EIAProjectAttachment')->find($eia_project_attachment->getId())->setResubmit('done')->save();
			sfContext::getInstance()->getUser()->resetResubmissionForm();
		}
      $this->redirect('@homepage');
    }
  }
}

<?php

/**
 * businessplan actions.
 *
 * @package    rdbeportal
 * @subpackage businessplan
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class businessplanActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->business_plans = Doctrine_Core::getTable('BusinessPlan')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->business_plan = Doctrine_Core::getTable('BusinessPlan')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->business_plan);
  }

  public function executeNew(sfWebRequest $request)
  {
   //now we get the parameter passed by the form and make sure the business exists in the database
   //if not so, we forward to 404
    $this->business_name = $request->getParameter('id');
		
	//we call a function that will check the business name exist if not we 404
	$query = Doctrine_Core::getTable('InvestmentApplication')->checkBusinessExistance($this->business_name);
	$business = null;
	  foreach($query as $q)
	  { 
	   $business = $q['name'];
	  }
	  //now forward 404
	  if($business == null)
	  {
	  // $this->forward404();
	  //instead of forwarding to 404, we assume this user has not passed step 1 and we redirect him
	  $this->redirect('investmentapp/new');
	  }
	  if($business != null)
	  {
	    $this->form = new BusinessPlanForm();
	
	  }
   
	
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new BusinessPlanForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($business_plan = Doctrine_Core::getTable('BusinessPlan')->find(array($request->getParameter('id'))), sprintf('Object business_plan does not exist (%s).', $request->getParameter('id')));
    $this->form = new BusinessPlanForm($business_plan);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($business_plan = Doctrine_Core::getTable('BusinessPlan')->find(array($request->getParameter('id'))), sprintf('Object business_plan does not exist (%s).', $request->getParameter('id')));
    $this->form = new BusinessPlanForm($business_plan);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($business_plan = Doctrine_Core::getTable('BusinessPlan')->find(array($request->getParameter('id'))), sprintf('Object business_plan does not exist (%s).', $request->getParameter('id')));
    $business_plan->delete();

    $this->redirect('businessplan/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $business_plan = $form->save();

     //we send message to the investor informing them of successful application
	 //get the current logged in user email address
				  $email = sfContext::getInstance()->getUser()->getGuardUser()->getEmailAddress();
				  $receiver = sfContext::getInstance()->getUser()->getGuardUser()->getUsername();
				  $message = Swift_Message::newInstance()
				  ->setFrom('noreply@rdb.com')
				  ->setTo($email)
				  ->setSubject('Application For Investment Certifcate')
				  ->setBody('We are pleased to inform you that you application for investment certificate has been received. 
				  Your documents will be assigned to a staff for further processing. Please monitor the status using the Progress monitor window
				  in your account. Thank you');
				  $this->getMailer()->send($message);
				 ///we also send a mail to user inbox account of our system
				  $msg = new Messages();
				  //set message content
				  $sender = "noreply@rdb.com";
				  $receipient = $receiver;
				  $content = "We are pleased to inform you that you application for investment certificate has been received. 
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
				  $notify->message = "Your application for investment certificate received";
				  $notify->created_at = date('Y-m-d H:i:s');
				  $notify->save();
				  ///we want to also notify managers that this investor has submitted an application for investment certificate so.....
				  //we will use the business plan table for that purpose
				  //get email admin addresses
				  $adminaddresses = array() ;
				  $role = "departmentadmins";
				  $admins = Doctrine_Core::getTable('BusinessPlan')->getUsers($role);
				  //
				  foreach($admins as $v)
				  {
				    $adminaddresses  [] = $v['email_address'];
				  }
				  //send mail to admins
				  $this->getMailer()->composeAndSend('noreply@ttfa.net',
										$adminaddresses ,
										'New Application for Investment Certificate ',
										"A New application for Investment Certificate has been received.\n".
										 "Please login to your account and assign it to a data admin staff. Use the link below\n".
										 "http://198.154.203.38:8234/backend.php"
													  ); 
				  //////////////////////////////////////////
				  
	             /////////////////////////////////////////////////
	 $this->redirect('investmentapp/index');
    }
  }
}

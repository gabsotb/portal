<?php

/**
 * investmentrequest actions.
 *
 * @package    rdbeportal
 * @subpackage investmentrequest
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class investmentrequestActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->investment_requestss = Doctrine_Core::getTable('InvestmentRequests')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->investment_requests = Doctrine_Core::getTable('InvestmentRequests')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->investment_requests);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new InvestmentRequestsForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new InvestmentRequestsForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($investment_requests = Doctrine_Core::getTable('InvestmentRequests')->find(array($request->getParameter('id'))), sprintf('Object investment_requests does not exist (%s).', $request->getParameter('id')));
	//////
	//remove set variables
	
    $this->form = new InvestmentRequestsForm($investment_requests);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($investment_requests = Doctrine_Core::getTable('InvestmentRequests')->find(array($request->getParameter('id'))), sprintf('Object investment_requests does not exist (%s).', $request->getParameter('id')));
    $this->form = new InvestmentRequestsForm($investment_requests);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($investment_requests = Doctrine_Core::getTable('InvestmentRequests')->find(array($request->getParameter('id'))), sprintf('Object investment_requests does not exist (%s).', $request->getParameter('id')));
    $investment_requests->delete();

    $this->redirect('investmentrequest/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
	  $allFormValues = $request->getParameter($this->form->getName()); // get form values
	  $data_admin_id = $allFormValues['requestor'];
	  //now get the username using data_admin value from the form
	  $data_admin = Doctrine_Core::getTable('InvestmentRequests')->getUserName($data_admin_id);
	  //before we allow this user to save we make sure that the user is assigned that task
	  $reference_number =  $allFormValues['reference_number'];
	  $id_task = Doctrine_Core::getTable('InvestmentApplication')->getIdFromReferenceNumber($reference_number);
	  //////////Validation. Trying to give permission to a user who has not been assigned a task is an error.
	 
	  $query_assignments = Doctrine_Core::getTable('TaskAssignment')->checkAssignment($data_admin_id, $id_task);
	//  print_r($query_assignments); exit;
	  if($query_assignments == null)
	  {
	    $this->forward404(sprintf('Trying to Permit a user who has not been Assigned a task. Sorry Assign Task to This user '));
	  }
	  else if($query_assignments != null)
	  {
	     //////////
	  $status =  $allFormValues['status'];
	  $comments = $allFormValues['comments'];
	  $permission_type = $allFormValues['request_type'];
      $investment_requests = $form->save();
	  //after successful save, we inform the data admin of request status
	              $notify = new Notifications();
				  $notify->recepient = $data_admin;
				  $notify->message = $status."-Your request for permission processed. ";
				  $notify->created_at = date('Y-m-d H:i:s');
				  $notify->save();
                  ///
				  $msg = new Messages();
				  $sender = "noreply@rdb.com";
				  $receipient = $data_admin;
				  $content = $status."-Your request for permission processed. Manager/Supervisor comments > ".$comments;
				  $msg->sender = $sender;
				  $msg->recepient = $receipient;
				  $msg->message = $content ;
				  $msg->created_at = date('Y-m-d H:i:s');
				  $msg->save();
				  //we also inform the sender that record was successfuly processed.
				  $logged_username = sfContext::getInstance()->getUser()->getGuardUser()->getUserName();
				  $notify2 = new Notifications();
				  $notify2->recepient = $logged_username;
				  $notify2->message = "Request processed. Permission to ".$permission_type ." Granted to ". $data_admin;
				  $notify2->created_at = date('Y-m-d H:i:s');
				  $notify2->save();
     // $this->redirect('investmentrequest/edit?id='.$investment_requests->getId());
	 $this->redirect('investmentrequest/index');
	  }
	 
    }
  }
}

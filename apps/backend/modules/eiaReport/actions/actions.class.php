<?php

/**
 * eiaReport actions.
 *
 * @package    rdbeportal
 * @subpackage eiaReport
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class eiaReportActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->eia_reportss = Doctrine_Core::getTable('EIAReports')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->eia_reports = Doctrine_Core::getTable('EIAReports')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->eia_reports);
  }

  public function executeNew(sfWebRequest $request)
  {
   
   $this->form = new EIAReportsForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new EIAReportsForm();
    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($eia_reports = Doctrine_Core::getTable('EIAReports')->find(array($request->getParameter('id'))), sprintf('Object eia_reports does not exist (%s).', $request->getParameter('id')));
    $this->form = new EIAReportsForm($eia_reports);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($eia_reports = Doctrine_Core::getTable('EIAReports')->find(array($request->getParameter('id'))), sprintf('Object eia_reports does not exist (%s).', $request->getParameter('id')));
    $this->form = new EIAReportsForm($eia_reports);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($eia_reports = Doctrine_Core::getTable('EIAReports')->find(array($request->getParameter('id'))), sprintf('Object eia_reports does not exist (%s).', $request->getParameter('id')));
    $eia_reports->delete();

    $this->redirect('eiaReport/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $eia_reports = $form->save();

      $this->redirect('eiaReport/edit?id='.$eia_reports->getId());
    }
  }
  //this is a method used to approve iereport by a data admin
  public function executeApprove(sfWebRequest $request)
  {
   //this basically means we simply change the status of eireport in the table. we need the id of item to change status for.
   //we also change the updated_by value and created_by value to reflect the individual who has updated this record
   $eiaproject_id = $request->getParameter('id');
   //
   $report_status = "done" ; //we set report status to done
   //get current logged user info
    $id = sfContext::getInstance()->getUser()->getGuardUser()->getId();
	$username = sfContext::getInstance()->getUser()->getGuardUser()->getUserName();
	  $q = Doctrine_Query::create()
	 ->UPDATE('EIReport')
	 ->SET('status', '?' , $report_status)
	 ->SET('created_by', '?' , $id)
	 ->SET('updated_by', '?' , $username)
	 ->WHERE('eiaproject_id = ?', $eiaproject_id);
	 $q->execute();
	 ///
	 $q = Doctrine_Query::create()
	 ->UPDATE('EIReportResubmission')
	 ->SET('status', '?' , $report_status)
	 ->SET('created_by', '?' , $id)
	 ->SET('updated_by', '?' , $username)
	 ->WHERE('eiaproject_id = ?', $eiaproject_id);
	 $q->execute();
	 //Notifications
	 //Infor Data admin of successful approval
	 $notify = new Notifications();
	 $notify->recepient = $username;
	 $notify->message = "EIReport Approved Successfuly";
	 $notify->created_at = date('Y-m-d H:i:s');
	 $notify->save();
	 //inform invesstor
	 $query_investor = Doctrine_Core::getTable('EIReport')-> getInvestor($eiaproject_id);
	 $investor_name = null;
	 foreach($query_investor as $q)
	 {
	  $investor_name = $q['updated_by'];
	 }
	 //investor inform
	 $notify2 = new Notifications();
	 $notify2->recepient = $investor_name;
	 $notify2->message = "Congrats Your EIReport has been Approved!";
	 $notify2->created_at = date('Y-m-d H:i:s');
	 $notify2->save();
	 
	 //redirect
	 $this->redirect('dashboard/index');
  }
}

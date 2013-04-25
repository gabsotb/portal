<?php

/**
 * eireport actions.
 *
 * @package    rdbeportal
 * @subpackage eireport
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class eireportActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->ei_reports = Doctrine_Core::getTable('EIReport')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->ei_report = Doctrine_Core::getTable('EIReport')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->ei_report);
  }

  public function executeNew(sfWebRequest $request)
  {
    ////
	 $this->getUser()->setAttribute('project_id', $request->getParameter('id'));
	////
    $this->form = new EIReportForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new EIReportForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($ei_report = Doctrine_Core::getTable('EIReport')->find(array($request->getParameter('id'))), sprintf('Object ei_report does not exist (%s).', $request->getParameter('id')));
	//we also set a session variable for status
	sfContext::getInstance()->getUser()->setAttribute('eireport_submission_status',$request->getParameter('status'));
    $this->form = new EIReportForm($ei_report);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($ei_report = Doctrine_Core::getTable('EIReport')->find(array($request->getParameter('id'))), sprintf('Object ei_report does not exist (%s).', $request->getParameter('id')));
    $this->form = new EIReportForm($ei_report);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($ei_report = Doctrine_Core::getTable('EIReport')->find(array($request->getParameter('id'))), sprintf('Object ei_report does not exist (%s).', $request->getParameter('id')));
    $ei_report->delete();

    $this->redirect('eireport/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $ei_report = $form->save();
	  /////
	  $this->getUser()->getAttributeHolder()->remove('project_id');
      ///
	  $allFormValues = $request->getParameter($this->form->getName());
	  $project_id = $allFormValues['eiaproject_id'];
	  //we access a method that updates the status in EIReport and EIReportSubmission
	  $this->updateStatus($project_id);
	  $tasks=Doctrine_Core::getTable('EITaskAssignment')->findByEiaprojectId($ei_report->getEiaprojectId());
	  Doctrine_Core::getTable('EITaskAssignment')->find($tasks[0]['id'])->setWorkStatus('submitted')->setStage('ei-report')->save();
	  Doctrine_Core::getTable('EIApplicationStatus')->updateStatus($ei_report->getEiaprojectId(),'EIReport');
	  Doctrine_Core::getTable('EIApplicationStatus')->updateComment($ei_report->getEiaprojectId(),'Environmental Impact Report Assessment');
	  Doctrine_Core::getTable('EIApplicationStatus')->updatePercentage($ei_report->getEiaprojectId(),90);
     // $this->redirect('eireport/edit?id='.$ei_report->getId());
	 $this->redirect('investmentapp/index');
    }
  }
  //update status for submission
  public function updateStatus($project_id)
  {
   Doctrine_Core::getTable('EIReport')->updateStatus($project_id);
   Doctrine_Core::getTable('EIReportResubmission')->updateStatus($project_id);
  }
}

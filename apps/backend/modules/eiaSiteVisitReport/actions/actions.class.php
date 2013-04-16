<?php

/**
 * eiaSiteVisitReport actions.
 *
 * @package    rdbeportal
 * @subpackage eiaSiteVisitReport
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class eiaSiteVisitReportActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->eia_site_visit_reports = Doctrine_Core::getTable('EIASiteVisitReport')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->eia_site_visit_report = Doctrine_Core::getTable('EIASiteVisitReport')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->eia_site_visit_report);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new EIASiteVisitReportForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new EIASiteVisitReportForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($eia_site_visit_report = Doctrine_Core::getTable('EIASiteVisitReport')->find(array($request->getParameter('id'))), sprintf('Object eia_site_visit_report does not exist (%s).', $request->getParameter('id')));
    $this->form = new EIASiteVisitReportForm($eia_site_visit_report);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($eia_site_visit_report = Doctrine_Core::getTable('EIASiteVisitReport')->find(array($request->getParameter('id'))), sprintf('Object eia_site_visit_report does not exist (%s).', $request->getParameter('id')));
    $this->form = new EIASiteVisitReportForm($eia_site_visit_report);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($eia_site_visit_report = Doctrine_Core::getTable('EIASiteVisitReport')->find(array($request->getParameter('id'))), sprintf('Object eia_site_visit_report does not exist (%s).', $request->getParameter('id')));
    $eia_site_visit_report->delete();

    $this->redirect('eiaSiteVisitReport/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $eia_site_visit_report = $form->save();
	  //Update status
	  if($eia_site_visit_report->getReport())
	  {
		$statusId=Doctrine_Core::getTable('EIApplicationStatus')->findByEiaprojectId($eia_site_visit_report->getEIASiteVisit()->getEiaprojectId());
		Doctrine_Core::getTable('EIApplicationStatus')->find($statusId[0]['id'])->setApplicationStatus('Site visit assessment')->setPercentage(50)->save();
		Doctrine_Core::getTable('EIASiteVisit')->find($eia_site_visit_report->getEiasitevisitId())->setVisited(1)->save();
	  }
		$this->redirect('eiaDataAdmin/impact?id='.$eia_site_visit_report->getEIASiteVisit()->getEiaprojectId());
    }
  }
}

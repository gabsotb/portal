<?php

/**
 * eiReport actions.
 *
 * @package    rdbeportal
 * @subpackage eiReport
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class eiReportActions extends sfActions
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

    $this->redirect('eiReport/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $ei_report = $form->save();

      $this->redirect('eiReport/edit?id='.$ei_report->getId());
    }
  }
}
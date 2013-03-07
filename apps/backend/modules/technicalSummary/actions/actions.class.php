<?php

/**
 * technicalSummary actions.
 *
 * @package    rdbeportal
 * @subpackage technicalSummary
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class technicalSummaryActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->technical_summarys = Doctrine_Core::getTable('TechnicalSummary')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->technical_summary = Doctrine_Core::getTable('TechnicalSummary')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->technical_summary);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new TechnicalSummaryForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new TechnicalSummaryForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($technical_summary = Doctrine_Core::getTable('TechnicalSummary')->find(array($request->getParameter('id'))), sprintf('Object technical_summary does not exist (%s).', $request->getParameter('id')));
    $this->form = new TechnicalSummaryForm($technical_summary);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($technical_summary = Doctrine_Core::getTable('TechnicalSummary')->find(array($request->getParameter('id'))), sprintf('Object technical_summary does not exist (%s).', $request->getParameter('id')));
    $this->form = new TechnicalSummaryForm($technical_summary);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($technical_summary = Doctrine_Core::getTable('TechnicalSummary')->find(array($request->getParameter('id'))), sprintf('Object technical_summary does not exist (%s).', $request->getParameter('id')));
    $technical_summary->delete();

    $this->redirect('technicalSummary/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $technical_summary = $form->save();

      $this->redirect('technicalSummary/edit?id='.$technical_summary->getId());
    }
  }
}

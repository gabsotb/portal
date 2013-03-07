<?php

/**
 * decision actions.
 *
 * @package    rdbeportal
 * @subpackage decision
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class decisionActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->record_decisions = Doctrine_Core::getTable('RecordDecision')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->record_decision = Doctrine_Core::getTable('RecordDecision')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->record_decision);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new RecordDecisionForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new RecordDecisionForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($record_decision = Doctrine_Core::getTable('RecordDecision')->find(array($request->getParameter('id'))), sprintf('Object record_decision does not exist (%s).', $request->getParameter('id')));
    $this->form = new RecordDecisionForm($record_decision);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($record_decision = Doctrine_Core::getTable('RecordDecision')->find(array($request->getParameter('id'))), sprintf('Object record_decision does not exist (%s).', $request->getParameter('id')));
    $this->form = new RecordDecisionForm($record_decision);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($record_decision = Doctrine_Core::getTable('RecordDecision')->find(array($request->getParameter('id'))), sprintf('Object record_decision does not exist (%s).', $request->getParameter('id')));
    $record_decision->delete();

    $this->redirect('decision/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $record_decision = $form->save();

      $this->redirect('decision/edit?id='.$record_decision->getId());
    }
  }
}

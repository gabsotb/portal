<?php

/**
 * torDecision actions.
 *
 * @package    rdbeportal
 * @subpackage torDecision
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class torDecisionActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->tor_decisionss = Doctrine_Core::getTable('TorDecisions')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new TorDecisionsForm();
	$this->name = $request->getParameter('name');
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new TorDecisionsForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($tor_decisions = Doctrine_Core::getTable('TorDecisions')->find(array($request->getParameter('id'))), sprintf('Object tor_decisions does not exist (%s).', $request->getParameter('id')));
    $this->form = new TorDecisionsForm($tor_decisions);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($tor_decisions = Doctrine_Core::getTable('TorDecisions')->find(array($request->getParameter('id'))), sprintf('Object tor_decisions does not exist (%s).', $request->getParameter('id')));
    $this->form = new TorDecisionsForm($tor_decisions);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($tor_decisions = Doctrine_Core::getTable('TorDecisions')->find(array($request->getParameter('id'))), sprintf('Object tor_decisions does not exist (%s).', $request->getParameter('id')));
    $tor_decisions->delete();

    $this->redirect('torDecision/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $tor_decisions = $form->save();

      $this->redirect('dashboard/index');
    }
  }
}

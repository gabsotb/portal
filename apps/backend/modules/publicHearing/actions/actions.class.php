<?php

/**
 * publicHearing actions.
 *
 * @package    rdbeportal
 * @subpackage publicHearing
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class publicHearingActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->public_hearings = Doctrine_Core::getTable('PublicHearing')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->public_hearing = Doctrine_Core::getTable('PublicHearing')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->public_hearing);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new PublicHearingForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new PublicHearingForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($public_hearing = Doctrine_Core::getTable('PublicHearing')->find(array($request->getParameter('id'))), sprintf('Object public_hearing does not exist (%s).', $request->getParameter('id')));
    $this->form = new PublicHearingForm($public_hearing);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($public_hearing = Doctrine_Core::getTable('PublicHearing')->find(array($request->getParameter('id'))), sprintf('Object public_hearing does not exist (%s).', $request->getParameter('id')));
    $this->form = new PublicHearingForm($public_hearing);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($public_hearing = Doctrine_Core::getTable('PublicHearing')->find(array($request->getParameter('id'))), sprintf('Object public_hearing does not exist (%s).', $request->getParameter('id')));
    $public_hearing->delete();

    $this->redirect('publicHearing/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $public_hearing = $form->save();

      $this->redirect('publicHearing/edit?id='.$public_hearing->getId());
    }
  }
}

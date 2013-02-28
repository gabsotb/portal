<?php

/**
 * tor actions.
 *
 * @package    rdbeportal
 * @subpackage tor
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class torActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->tors = Doctrine_Core::getTable('Tor')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->tor = Doctrine_Core::getTable('Tor')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->tor);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new TorForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new TorForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($tor = Doctrine_Core::getTable('Tor')->find(array($request->getParameter('id'))), sprintf('Object tor does not exist (%s).', $request->getParameter('id')));
    $this->form = new TorForm($tor);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($tor = Doctrine_Core::getTable('Tor')->find(array($request->getParameter('id'))), sprintf('Object tor does not exist (%s).', $request->getParameter('id')));
    $this->form = new TorForm($tor);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($tor = Doctrine_Core::getTable('Tor')->find(array($request->getParameter('id'))), sprintf('Object tor does not exist (%s).', $request->getParameter('id')));
    $tor->delete();

    $this->redirect('tor/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $tor = $form->save();

      $this->redirect('tor/edit?id='.$tor->getId());
    }
  }
}

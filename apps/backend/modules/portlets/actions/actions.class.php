<?php

/**
 * portlets actions.
 *
 * @package    rdbeportal
 * @subpackage portlets
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class portletsActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->portletss = Doctrine_Core::getTable('Portlets')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->portlets = Doctrine_Core::getTable('Portlets')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->portlets);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new PortletsForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new PortletsForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($portlets = Doctrine_Core::getTable('Portlets')->find(array($request->getParameter('id'))), sprintf('Object portlets does not exist (%s).', $request->getParameter('id')));
    $this->form = new PortletsForm($portlets);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($portlets = Doctrine_Core::getTable('Portlets')->find(array($request->getParameter('id'))), sprintf('Object portlets does not exist (%s).', $request->getParameter('id')));
    $this->form = new PortletsForm($portlets);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($portlets = Doctrine_Core::getTable('Portlets')->find(array($request->getParameter('id'))), sprintf('Object portlets does not exist (%s).', $request->getParameter('id')));
    $portlets->delete();

    $this->redirect('portlets/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $portlets = $form->save();

      $this->redirect('portlets/edit?id='.$portlets->getId());
    }
  }
}

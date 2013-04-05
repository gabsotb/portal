<?php

/**
 * investmentrejected actions.
 *
 * @package    rdbeportal
 * @subpackage investmentrejected
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class investmentrejectedActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->rejected_applicationss = Doctrine_Core::getTable('RejectedApplications')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->rejected_applications = Doctrine_Core::getTable('RejectedApplications')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->rejected_applications);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new RejectedApplicationsForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new RejectedApplicationsForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($rejected_applications = Doctrine_Core::getTable('RejectedApplications')->find(array($request->getParameter('id'))), sprintf('Object rejected_applications does not exist (%s).', $request->getParameter('id')));
    $this->form = new RejectedApplicationsForm($rejected_applications);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($rejected_applications = Doctrine_Core::getTable('RejectedApplications')->find(array($request->getParameter('id'))), sprintf('Object rejected_applications does not exist (%s).', $request->getParameter('id')));
    $this->form = new RejectedApplicationsForm($rejected_applications);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($rejected_applications = Doctrine_Core::getTable('RejectedApplications')->find(array($request->getParameter('id'))), sprintf('Object rejected_applications does not exist (%s).', $request->getParameter('id')));
    $rejected_applications->delete();

    $this->redirect('investmentrejected/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $rejected_applications = $form->save();

      $this->redirect('investmentrejected/edit?id='.$rejected_applications->getId());
    }
  }
}

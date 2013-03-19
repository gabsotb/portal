<?php

/**
 * eiaProjectDeveloper actions.
 *
 * @package    rdbeportal
 * @subpackage eiaProjectDeveloper
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class eiaProjectDeveloperActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->eia_project_developers = Doctrine_Core::getTable('EIAProjectDeveloper')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->eia_project_developer = Doctrine_Core::getTable('EIAProjectDeveloper')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->eia_project_developer);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new EIAProjectDeveloperForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new EIAProjectDeveloperForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($eia_project_developer = Doctrine_Core::getTable('EIAProjectDeveloper')->find(array($request->getParameter('id'))), sprintf('Object eia_project_developer does not exist (%s).', $request->getParameter('id')));
    $this->form = new EIAProjectDeveloperForm($eia_project_developer);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($eia_project_developer = Doctrine_Core::getTable('EIAProjectDeveloper')->find(array($request->getParameter('id'))), sprintf('Object eia_project_developer does not exist (%s).', $request->getParameter('id')));
    $this->form = new EIAProjectDeveloperForm($eia_project_developer);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($eia_project_developer = Doctrine_Core::getTable('EIAProjectDeveloper')->find(array($request->getParameter('id'))), sprintf('Object eia_project_developer does not exist (%s).', $request->getParameter('id')));
    $eia_project_developer->delete();

    $this->redirect('eiaProjectDeveloper/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $eia_project_developer = $form->save();

      $this->redirect('eiaProjectDeveloper/edit?id='.$eia_project_developer->getId());
    }
  }
}

<?php

/**
 * apps actions.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage apps
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class autoAppsActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->investment_applications = Doctrine_Core::getTable('InvestmentApplication')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->investment_application = Doctrine_Core::getTable('InvestmentApplication')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->investment_application);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new InvestmentApplicationForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new InvestmentApplicationForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($investment_application = Doctrine_Core::getTable('InvestmentApplication')->find(array($request->getParameter('id'))), sprintf('Object investment_application does not exist (%s).', $request->getParameter('id')));
    $this->form = new InvestmentApplicationForm($investment_application);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($investment_application = Doctrine_Core::getTable('InvestmentApplication')->find(array($request->getParameter('id'))), sprintf('Object investment_application does not exist (%s).', $request->getParameter('id')));
    $this->form = new InvestmentApplicationForm($investment_application);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($investment_application = Doctrine_Core::getTable('InvestmentApplication')->find(array($request->getParameter('id'))), sprintf('Object investment_application does not exist (%s).', $request->getParameter('id')));
    $investment_application->delete();

    $this->redirect('apps/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $investment_application = $form->save();

      $this->redirect('apps/edit?id='.$investment_application->getId());
    }
  }
}

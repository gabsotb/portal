<?php

/**
 * projectSummary actions.
 *
 * @package    rdbeportal
 * @subpackage projectSummary
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class projectSummaryActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->project_summarys = Doctrine_Core::getTable('ProjectSummary')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->project_summary = Doctrine_Core::getTable('ProjectSummary')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->project_summary);
  }

  public function executeNew(sfWebRequest $request)
  {
    //we validate the ID passed is Valid and Exist, Later we use token to hide the ID from Hackers. if 
	//some1 tries to access this url with a valid ID we forward to 404 page
    $this->validate = Doctrine_Core::getTable('InvestmentApplication')->find(array($request->getParameter('id')));
	$this->form = new ProjectSummaryForm();
	$this->forward404Unless($this->validate);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ProjectSummaryForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($project_summary = Doctrine_Core::getTable('ProjectSummary')->find(array($request->getParameter('id'))), sprintf('Object project_summary does not exist (%s).', $request->getParameter('id')));
    $this->form = new ProjectSummaryForm($project_summary);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($project_summary = Doctrine_Core::getTable('ProjectSummary')->find(array($request->getParameter('id'))), sprintf('Object project_summary does not exist (%s).', $request->getParameter('id')));
    $this->form = new ProjectSummaryForm($project_summary);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($project_summary = Doctrine_Core::getTable('ProjectSummary')->find(array($request->getParameter('id'))), sprintf('Object project_summary does not exist (%s).', $request->getParameter('id')));
    $project_summary->delete();

    $this->redirect('projectSummary/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $project_summary = $form->save();

      $this->redirect('projectSummary/edit?id='.$project_summary->getId());
    }
  }
}

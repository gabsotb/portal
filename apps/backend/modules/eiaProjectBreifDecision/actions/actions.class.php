<?php

/**
 * eiaProjectBreifDecision actions.
 *
 * @package    rdbeportal
 * @subpackage eiaProjectBreifDecision
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class eiaProjectBreifDecisionActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->eia_project_brief_decisions = Doctrine_Core::getTable('EIAProjectBriefDecision')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->eia_project_brief_decision = Doctrine_Core::getTable('EIAProjectBriefDecision')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->eia_project_brief_decision);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new EIAProjectBriefDecisionForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new EIAProjectBriefDecisionForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
	$this->forward404Unless($eia_project_brief_decision = Doctrine_Core::getTable('EIAProjectBriefDecision')->find(array($request->getParameter('id'))), sprintf('Object eia_project_brief_decision does not exist (%s).', $request->getParameter('id')));
	if($request->getParameter('act') == 'resubmit')
	{
		$this->actionDetails=Doctrine_Core::getTable('EIAProjectBriefDecision')->getActionResubmit();
	}elseif($request->getParameter('act') == 'reject')
	{
		$this->actionDetails=Doctrine_Core::getTable('EIAProjectBriefDecision')->getActionReject();
	}else
	{
		$this->actionDetails=array();
	}
    $this->form = new EIAProjectBriefDecisionForm($eia_project_brief_decision);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($eia_project_brief_decision = Doctrine_Core::getTable('EIAProjectBriefDecision')->find(array($request->getParameter('id'))), sprintf('Object eia_project_brief_decision does not exist (%s).', $request->getParameter('id')));
    $this->form = new EIAProjectBriefDecisionForm($eia_project_brief_decision);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($eia_project_brief_decision = Doctrine_Core::getTable('EIAProjectBriefDecision')->find(array($request->getParameter('id'))), sprintf('Object eia_project_brief_decision does not exist (%s).', $request->getParameter('id')));
    $eia_project_brief_decision->delete();

    $this->redirect('eiaProjectBreifDecision/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $eia_project_brief_decision = $form->save();

      $this->redirect('@homepage');
    }
  }
}

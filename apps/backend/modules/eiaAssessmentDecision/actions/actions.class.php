<?php

/**
 * eiaAssessmentDecision actions.
 *
 * @package    rdbeportal
 * @subpackage eiaAssessmentDecision
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class eiaAssessmentDecisionActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->eia_assessment_decisions = Doctrine_Core::getTable('EIAAssessmentDecision')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new EIAAssessmentDecisionForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new EIAAssessmentDecisionForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($eia_assessment_decision = Doctrine_Core::getTable('EIAAssessmentDecision')->find(array($request->getParameter('id'))), sprintf('Object eia_assessment_decision does not exist (%s).', $request->getParameter('id')));
	$eiaprojectId=Doctrine_Core::getTable('EITaskAssignment')->find(array($eia_assessment_decision['taskassignment_id']));
	if($projectImpacts=Doctrine_Core::getTable('ProjectImpact')->findByEiaprojectId($eiaprojectId['eiaproject_id']))
	{	
		$this->projectImpact=$projectImpacts;
	}
	if($briefDecisions=Doctrine_Core::getTable('EIAProjectBriefDecision')->findByEiaprojectId($eiaprojectId['eiaproject_id']))
	{
		$this->briefDecision=$briefDecisions;
	}
    $this->form = new EIAAssessmentDecisionForm($eia_assessment_decision);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($eia_assessment_decision = Doctrine_Core::getTable('EIAAssessmentDecision')->find(array($request->getParameter('id'))), sprintf('Object eia_assessment_decision does not exist (%s).', $request->getParameter('id')));
    $this->form = new EIAAssessmentDecisionForm($eia_assessment_decision);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($eia_assessment_decision = Doctrine_Core::getTable('EIAAssessmentDecision')->find(array($request->getParameter('id'))), sprintf('Object eia_assessment_decision does not exist (%s).', $request->getParameter('id')));
    $eia_assessment_decision->delete();

    $this->redirect('eiaAssessmentDecision/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $eia_assessment_decision = $form->save();
	  
	  if($eia_assessment_decision->getVerdict() == 'accept')
	  {
		$notify = new Notifications();
		$notify->recepient=$eia_assessment_decision->getEITaskAssignment()->getSfGuardUser()->getUsername();
		$notify->message="Request approved";
		$notify->save();
	  }
	  if($eia_assessment_decision->getVerdict() == 'decline')
	  {
		$notify = new Notifications();
		$notify->recepient=$eia_assessment_decision->getEITaskAssignment()->getSfGuardUser()->getUsername();
		$notify->message="Request declined";
		$notify->save();
	  }
	  if($eia_assessment_decision->getVerdict())
	  {
		Doctrine_Core::getTable('EITaskAssignment')->find(array($eia_assessment_decision->getTaskassignmentId()))->setWorkStatus('assessed')->save();
	  }
      $this->redirect('@homepage');
    }
  }
}

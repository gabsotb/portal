<?php

/**
 * eiaSiteVisit actions.
 *
 * @package    rdbeportal
 * @subpackage eiaSiteVisit
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class eiaSiteVisitActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->eia_site_visits = Doctrine_Core::getTable('EIASiteVisit')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new EIASiteVisitForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new EIASiteVisitForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($eia_site_visit = Doctrine_Core::getTable('EIASiteVisit')->find(array($request->getParameter('id'))), sprintf('Object eia_site_visit does not exist (%s).', $request->getParameter('id')));
	if($request->getParameter('act'))
	{
		$this->action=Doctrine_Core::getTable('EIASiteVisit')->getReschedule();
	}else
	{
		$this->action=Doctrine_Core::getTable('EIASiteVisit')->getSchedule();
	}
    $this->form = new EIASiteVisitForm($eia_site_visit);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($eia_site_visit = Doctrine_Core::getTable('EIASiteVisit')->find(array($request->getParameter('id'))), sprintf('Object eia_site_visit does not exist (%s).', $request->getParameter('id')));
    $this->form = new EIASiteVisitForm($eia_site_visit);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($eia_site_visit = Doctrine_Core::getTable('EIASiteVisit')->find(array($request->getParameter('id'))), sprintf('Object eia_site_visit does not exist (%s).', $request->getParameter('id')));
    $eia_site_visit->delete();

    $this->redirect('eiaSiteVisit/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $eia_site_visit = $form->save();
	  //check if the eiaprojectId is set in table EIAAssessmentDecision
	  $tasks=Doctrine_Core::getTable('EITaskAssignment')->findByEiaprojectId($eia_site_visit->getEiaprojectId());
	  $assessment=Doctrine_Core::getTable('EIAAssessmentDecision')->getAssessment($tasks[0]['id'],'site-visit');
	  $decision=Doctrine_Core::getTable('EIAAssessmentDecision')->find($assessment[0]['id']);
	  if($eia_site_visit->getDateTimeObject('site_visit')->format('U') != 0 && !$decision)
	  {
		Doctrine_Core::getTable('EITaskAssignment')->find(array($tasks[0]['id']))->setWorkStatus('assess')->setStage('site-visit')->save();
		$statusId=Doctrine_Core::getTable('EIApplicationStatus')->findByEiaprojectId($eia_site_visit->getEiaprojectId());
		$status=Doctrine_Core::getTable('EIApplicationStatus')->find($statusId[0]['id']);
		$status->application_status="reviewing";
		$status->comments="Application is been reviewed";
		$status->percentage=40;
		$status->save();
		$notify= new Notifications();
		$notify->recepient=Doctrine_Core::getTable('sfGuardUser')->find($tasks[0]['created_by'])->getUsername();
		$notify->message="An application is awaiting assessment";
		$notify->save();
	  }
	  if($decision && $decision->getVerdict() != 'reviewed')
	  {//update verdict on assessment
		$decision->setVerdict('reviewed')->save();
		$notify= new Notifications();
		$notify->recepient=Doctrine_Core::getTable('sfGuardUser')->find($tasks[0]['created_by'])->getUsername();
		$notify->message="Assessed application reviewed.New site visit date:".$eia_site_visit->getDateTimeObject('site_visit')->format('jS M Y');
		$notify->save();
	  }
	  if($decision && ($decision->getVerdict() == 'reviewed'|| $decision->getVerdict() == 'accept'))
	  {
		$decision->setVerdict('review')->save();
		Doctrine_Core::getTable('EITaskAssignment')->find(array($tasks[0]['id']))->setWorkStatus('assess')->save();
		$notify= new Notifications();
		$notify->recepient=Doctrine_Core::getTable('sfGuardUser')->find($tasks[0]['created_by'])->getUsername();
		$notify->message="An application requires a re-assessment";
		$notify->save();
	  }
	  
      $this->redirect('@homepage');
    }
  }
}

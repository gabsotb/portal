<?php

/**
 * eiaDataAdmin actions.
 *
 * @package    rdbeportal
 * @subpackage eiaDataAdmin
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class eiaDataAdminActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->tasks = Doctrine_Core::getTable('EITaskAssignment')->getTasks();
	//$this->tors = Doctrine_Core::getTable('Tor')->
  }
  
	public function executeShow(sfWebRequest $request)
	{
			
		$this->detail=Doctrine_Core::getTable('EITaskAssignment')->find(array($request->getParameter('id')));
		//Update status////
		if($this->detail->getWorkStatus() == 'notstarted')
		{
			$this->updateStatus($this->detail->getEiaprojectId(),'processing','Your application is been processed',30);
			$this->detail->setWorkStatus('started')->save();
		}
		///////////
		$this->developers=Doctrine_Core::getTable('EIAProjectDeveloper')->findByEiaprojectId($this->detail->getEiaprojectId());
		$this->applicant=Doctrine_Core::getTable('sfGuardUser')->find($this->developers[0]['created_by']);
		$this->descriptions=Doctrine_Core::getTable('EIAProjectDescription')->findByEiaprojectId($this->detail->getEiaprojectId());
		$this->surroundings=Doctrine_Core::getTable('EIAProjectSurrounding')->findByEiaprojectId($this->detail->getEiaprojectId());
		$this->economics=Doctrine_Core::getTable('EIAProjectSocialEconomic')->findByEiaprojectId($this->detail->getEiaprojectId());
		$this->impacts=Doctrine_Core::getTable('EIAProjectImpactMeasures')->findByEiaprojectId($this->detail->getEiaprojectId());
		$this->impactsOperation=Doctrine_Core::getTable('EIAProjectOperationPhase')->findByEiaprojectId($this->detail->getEiaprojectId());
		$this->attachments=Doctrine_Core::getTable('EIAProjectAttachment')->findByEiaprojectId($this->detail->getEiaprojectId());
	}
  
	public function updateStatus($eiaProjectId,$state,$comment,$percent)
	{	
		$this->forward404Unless($statues=Doctrine_Core::getTable('EIApplicationStatus')->findByEiaprojectId($eiaProjectId));
		$id=NULL;
		foreach($statues as $status)
		{
			$id=$status->getId();
		}
		$s=Doctrine_Core::getTable('EIApplicationStatus')->find(array($id));
		$s->setApplicationStatus($state);
		$s->setComments($comment);
		$s->setPercentage($percent);
		$s->save();
	}
	
	public function executeResubmission(sfWebRequest $request)
	{
		$eiaProjectId=$request->getParameter('id');
		$decision= new EIAProjectBriefDecision();
		$decision->eiaproject_id=$eiaProjectId;
		$decision->decision="resubmit";
		$decision->processed_by=sfContext::getInstance()->getUser()->getGuardUser()->getId();
		$decision->save();
		$this->updateStatus($eiaProjectId,'resubmit','Request for resubmission',50);
		$assignment=Doctrine_Core::getTable('EITaskAssignment')->findByEiaprojectId($request->getParameter('id'));
		Doctrine_Core::getTable('EITaskAssignment')->find(array($assignment[0]['id']))->setWorkStatus('resubmission')->save();
		$assignment=Doctrine_Core::getTable('EITaskAssignment')->findByEiaprojectId($request->getParameter('id'));
		Doctrine_Core::getTable('EITaskAssignment')->find(array($assignment[0]['id']))->setWorkStatus('assess')->save();
		$id=NULL;
		foreach(Doctrine_Core::getTable('EIAProjectBriefDecision')->findByEiaprojectId($eiaProjectId) as $decision)
		{ 
			$id=$decision->getId();
		}
		$this->redirect('eiaProjectBreifDecision/edit?id='.$id.'&act=resubmit');
	}
	
	public function executeImpact(sfWebRequest $request)
	{
		$impact= new ProjectImpact();
		$impact->eiaproject_id=$request->getParameter('id');
		$impact->save();
		//$this->updateStatus($request->getParameter('id'),'assessing','Accessing application',60);
		//$assignment=Doctrine_Core::getTable('EITaskAssignment')->findByEiaprojectId($request->getParameter('id'));
		//Doctrine_Core::getTable('EITaskAssignment')->find(array($assignment[0]['id']))->setWorkStatus('assess')->save();
		foreach(Doctrine_Core::getTable('ProjectImpact')->findByEiaprojectId($request->getParameter('id')) as $projetcImpact)
		{
			$impactId=$projetcImpact->getId();
		}
		$this->redirect('eiaProjectImpact/edit?id='.$impactId);
	}
	
	public function executeReject(sfWebRequest $request)
	{
		$reject = new EIAProjectBriefDecision();
		$reject->eiaproject_id=$request->getParameter('id');
		$reject->decision="rejected";
		$reject->processed_by=sfContext::getInstance()->getUser()->getGuardUser()->getId();
		$reject->save();
		$this->updateStatus($request->getParameter('id'),'rejected','Application has been rejected',60);
		$assignment=Doctrine_Core::getTable('EITaskAssignment')->findByEiaprojectId($request->getParameter('id'));
		Doctrine_Core::getTable('EITaskAssignment')->find(array($assignment[0]['id']))->setWorkStatus('rejected')->save();
		foreach(Doctrine_Core::getTable('EIAProjectBriefDecision')->findByEiaprojectId($request->getParameter('id')) as $rejectDecision)
		{ 
			$id=$rejectDecision->getId();
		}
		$this->redirect('eiaProjectBreifDecision/edit?id='.$id.'&act=reject');
	}	
	
	public function executeSiteVisit(sfWebRequest $request)
	{
		$site = new EIASiteVisit();
		$site->eiaproject_id=$request->getParameter('id');
		$site->visited=false;
		$site->save();
		$visits=Doctrine_Core::getTable('EIASiteVisit')->findByEiaprojectId($request->getParameter('id'));
		$this->redirect('eiaSiteVisit/edit?id='.$visits[0]['id']);
	}
	public function executeProcess(sfWebRequest $request)
	{
		$this->projectDetail=Doctrine_Core::getTable('EIAProjectDetail')->find(array($request->getParameter('id')));
		$this->projectDeveloper=Doctrine_Core::getTable('EIAProjectDeveloper')->findByEiaprojectId($request->getParameter('id'));
		$this->projectDescription=Doctrine_Core::getTable('EIAProjectDescription')->findByEiaprojectId($request->getParameter('id'));
		$this->siteVisit=Doctrine_Core::getTable('EIASiteVisit')->findByEiaprojectId($request->getParameter('id'));
		$this->tasks=Doctrine_Core::getTable('EITaskAssignment')->findByEiaprojectId($request->getParameter('id'));
		$this->assessmentSiteVisit=Doctrine_Core::getTable('EIAAssessmentDecision')->getAssessment($this->tasks[0]['id'],'site-visit');
		$this->assessmentImpact=Doctrine_Core::getTable('EIAAssessmentDecision')->getAssessment($this->tasks[0]['id'],'impact-level');
		$this->applicantEmail=Doctrine_Core::getTable('sfGuardUser')->find($this->projectDetail['created_by']);
		$this->projectImpact=Doctrine_Core::getTable('ProjectImpact')->findByEiaprojectId($request->getParameter('id'));
	}
	public function executeMessage(sfWebRequest $request)
	{
		$message = new Messages();
		$message->sender=sfContext::getInstance()->getUser()->getGuardUser()->getUsername();
		$message->sender_email=sfContext::getInstance()->getUser()->getGuardUser()->getEmailAddress();
		$message->recepient=$request->getParameter('applicant');
		$applicant=Doctrine_Core::getTable('sfGuardUser')->findByUsername($request->getParameter('applicant'));
		$message->recepient_email=$applicant[0]['email_address'];
		$message->save();
		/*change status
		$statusId=Doctrine_Core::getTable('EIApplicationStatus')->findByEiaprojectId($request->getParameter('id'));
		$status=Doctrine_Core::getTable('EIApplicationStatus')->find($statusId[0]['id']);
		$status->application_status="site visit";
		$status->comments="Site visit scheduled";
		$status->percentage=50;
		$status->save();*/
		$messageId=Doctrine_Core::getTable('Messages')->getMessageId($request->getParameter('applicant'));	
		$this->redirect('messages/edit?id='.$messageId[0]['id'].'&user=dataAdmin');
	}
	public function executeMessageTor(sfWebRequest $request)
	{
		$message = new Messages();
		$message->sender=sfContext::getInstance()->getUser()->getGuardUser()->getUsername();
		$message->sender_email=sfContext::getInstance()->getUser()->getGuardUser()->getEmailAddress();
		$message->recepient=$request->getParameter('applicant');
		$applicant=Doctrine_Core::getTable('sfGuardUser')->findByUsername($request->getParameter('applicant'));
		$message->recepient_email=$applicant[0]['email_address'];
		$message->save();
		//change status
		$statusId=Doctrine_Core::getTable('EIApplicationStatus')->findByEiaprojectId($request->getParameter('id'));
		$status=Doctrine_Core::getTable('EIApplicationStatus')->find($statusId[0]['id']);
		$status->application_status="T.O.R";
		$status->comments="Terms of Reference assessment";
		$status->percentage=70;
		$status->save();
		$messageId=Doctrine_Core::getTable('Messages')->getMessageId($request->getParameter('applicant'));	
		$this->redirect('messages/edit?id='.$messageId[0]['id'].'&user=dataAdmin');
	}
	public function executeSiteVisitReport(sfWebRequest $request)
	{
		$report = new EIASiteVisitReport();
		$report->eiasitevisit_id=$request->getParameter('id');
		$report->save();
		$report_id=Doctrine_Core::getTable('EIASiteVisitReport')->findByEiasitevisitId($request->getParameter('id'));
		
		$this->redirect('eiaSiteVisitReport/edit?id='.$report_id[0]['id']); 
	}
	//public function executeTorSubmit(sfWebRequest $request)
	//{
		

}

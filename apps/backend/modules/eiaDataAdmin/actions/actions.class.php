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
		$this->updateStatus($this->detail->getEiaprojectId(),'processing','Your application is been processed',40);
		$this->detail->setWorkStatus('started')->save();
		///////////
		$this->developers=Doctrine_Core::getTable('EIAProjectDeveloper')->findByEiaprojectId($this->detail->getEiaprojectId());
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
		$decision->decision="resubmission";
		$decision->processed_by=sfContext::getInstance()->getUser()->getGuardUser()->getId();
		$decision->save();
		$this->updateStatus($eiaProjectId,'resubmit','Request for resubmission',50);
		$id=NULL;
		foreach(Doctrine_Core::getTable('EIAProjectBriefDecision')->findByEiaprojectId($eiaProjectId) as $decision)
		{ 
			$id=$decision->getId();
		}
		$this->redirect('eiaProjectBreifDecision/edit?id='.$id);
	}

}

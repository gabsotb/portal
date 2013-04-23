<?php

/**
 * projectOperationPhase actions.
 *
 * @package    rdbeportal
 * @subpackage projectOperationPhase
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class projectOperationPhaseActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->eia_project_operation_phases = Doctrine_Core::getTable('EIAProjectOperationPhase')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->eia_project_operation_phase = Doctrine_Core::getTable('EIAProjectOperationPhase')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->eia_project_operation_phase);
  }

  public function executeNew(sfWebRequest $request)
  {
	if(!is_null($species=Doctrine_Core::getTable('EIAProjectImpactMeasures')->find(array($request->getParameter('id')))) && $species->getToken()==$request->getParameter('token'))
	{
		$this->form = new EIAProjectOperationPhaseForm();
		
	}else{
		$this->getUser()->setFlash('notice','Please Fill in this form first before proceeding');
		$this->redirect('@project_detail'); 
	}
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new EIAProjectOperationPhaseForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($eia_project_operation_phase = Doctrine_Core::getTable('EIAProjectOperationPhase')->find(array($request->getParameter('id'))), sprintf('Object eia_project_operation_phase does not exist (%s).', $request->getParameter('id')));
    $this->form = new EIAProjectOperationPhaseForm($eia_project_operation_phase);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($eia_project_operation_phase = Doctrine_Core::getTable('EIAProjectOperationPhase')->find(array($request->getParameter('id'))), sprintf('Object eia_project_operation_phase does not exist (%s).', $request->getParameter('id')));
    $this->form = new EIAProjectOperationPhaseForm($eia_project_operation_phase);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($eia_project_operation_phase = Doctrine_Core::getTable('EIAProjectOperationPhase')->find(array($request->getParameter('id'))), sprintf('Object eia_project_operation_phase does not exist (%s).', $request->getParameter('id')));
    $eia_project_operation_phase->delete();

    $this->redirect('projectOperationPhase/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $eia_project_operation_phase = $form->save();
       ///
	   sfContext::getInstance()->getUser()->setAttribute('eiaprojectid',$eia_project_operation_phase->getEiaprojectId());
	    ////////
	if(sfContext::getInstance()->getUser()->getAttribute('eiaprojectid'))
	{
	  $project_id = sfContext::getInstance()->getUser()->getAttribute('eiaprojectid');
	}else{
	$project_id=$eia_project_operation_phase->getEiaprojectId();
	}
	 $query2 = Doctrine_Core::getTable('EIAProjectAttachment')->queryForId($project_id);
	 $queried_id = null ;
	 $queried_token = null;
	 foreach($query2 as $q)
	 {
	  $queried_id = $q['id'];
	  $queried_token = $q['token'];
	 }
	// print $queried_id; exit;
	 //
	 if($queried_id != null) //edit, we redirect to editing method
	 {
		if($eia_project_operation_phase->getResubmit() == 'all')
		{
		//$developer=Doctrine_Core::getTable('EIAProjectAttachment')->findByEiaprojectId($eia_project_operation_phase->getEiaproject_id());
		$this->redirect('projectAttachment/edit?id='.$queried_id);
		}elseif($eia_project_operation_phase->getResubmit() == 'only')
		{
			$resubmit=$this->getUser()->getAttribute('resubmit');
			if($resubmit['EIAProjectAttachment'])
			{
			Doctrine_Core::getTable('EIAProjectOperationPhase')->find($eia_project_operation_phase->getId())->setResubmit('done')->save();
				$this->redirect('projectAttachment/edit?id='.$resubmit['EIAProjectAttachment']);
			}else{
			Doctrine_Core::getTable('EIApplicationStatus')->updateStatus($eia_project_operation_phase->getEiaprojectId(),'resubmitted');
			Doctrine_Core::getTable('EIApplicationStatus')->updateComment($eia_project_operation_phase->getEiaprojectId(),'Resubmission assessment');
			Doctrine_Core::getTable('EITaskAssignment')->updateWorkStatus($eia_project_operation_phase->getEiaprojectId(),'resubmitted');
			Doctrine_Core::getTable('EIAProjectOperationPhase')->find($eia_project_operation_phase->getId())->setResubmit('done')->save();
			sfContext::getInstance()->getUser()->resetResubmissionForm();
			$this->redirect('@homepage');
			}
		}else
		{
		$this->redirect('projectAttachment/edit?id='.$queried_id.'&token='.$queried_token);
		}
	 }
	 else if($queried_id  == null ) //new, we redirect to new method
	 {
		$this->redirect('projectAttachment/new?id='.$eia_project_operation_phase->getId().'&token='.$eia_project_operation_phase->getToken());
	 }
		////////
      
    }
  }
}

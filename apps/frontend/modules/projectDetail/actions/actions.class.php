<?php

/**
 * projectDetail actions.
 *
 * @package    rdbeportal
 * @subpackage projectDetail
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class projectDetailActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->eia_project_details = Doctrine_Core::getTable('EIAProjectDetail')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->eia_project_detail = Doctrine_Core::getTable('EIAProjectDetail')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->eia_project_detail);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new EIAProjectDetailForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new EIAProjectDetailForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($eia_project_detail = Doctrine_Core::getTable('EIAProjectDetail')->find(array($request->getParameter('id'))) , sprintf('Object eia_project_detail does not exist (%s).', $request->getParameter('id')));
   // $this->forward404Unless($eia_project_detail->getToken == $request->getParameter('token'),'No such token exists');
	$this->form = new EIAProjectDetailForm($eia_project_detail);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($eia_project_detail = Doctrine_Core::getTable('EIAProjectDetail')->find(array($request->getParameter('id'))), sprintf('Object eia_project_detail does not exist (%s).', $request->getParameter('id')));
    $this->form = new EIAProjectDetailForm($eia_project_detail);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($eia_project_detail = Doctrine_Core::getTable('EIAProjectDetail')->find(array($request->getParameter('id'))), sprintf('Object eia_project_detail does not exist (%s).', $request->getParameter('id')));
    $eia_project_detail->delete();

    $this->redirect('projectDetail/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $eia_project_detail = $form->save();
	  //Retieve values from the form and redirect
		
		//$this->getUser()->addFormHistory($eia_project_detail->getId(),$eia_project_detail->getToken());
		//we will set a session id value to eiaprojectid for the current logged user application and delete it when the user
		//completes the last step
	  $this->getUser()->setAttribute('eiaprojectid',$eia_project_detail->getId());
	  //get the setAttribute
	  $project_id = $this->getUser()->getAttribute('eiaprojectid');
	  //we also control if it new or edit action to be execute for eiaprojectdeveloper module
	  //
	 $query2 = Doctrine_Core::getTable('EIAProjectDeveloper')->queryForId($project_id);
	 $queried_id = null ;
	 foreach($query2 as $q)
	 {
	  $queried_id = $q['id'];
	 }
	// print $queried_id; exit;
	 //
	 if($queried_id != null) //edit, we redirect to editing method
	 {
		if($eia_project_detail->getResubmit() == 'all')
		{
			//$developer=Doctrine_Core::getTable('EIAProjectDeveloper')->findByEiaprojectId($eia_project_detail->getId());
			$this->redirect('eiaProjectDeveloper/edit?id='.$queried_id);
		}elseif($eia_project_detail->getResubmit() == 'only')
		{
			$resubmit=$this->getUser()->getAttribute('resubmit');
			if($resubmit['EIAProjectDeveloper'])
			{
			Doctrine_Core::getTable('EIAProjectDetail')->find($eia_project_detail->getId())->setResubmit('done')->save();
				$this->redirect('eiaProjectDeveloper/edit?id='.$resubmit['EIAProjectDeveloper']);
			}elseif($resubmit['EIAProjectDescription'])
			{
			Doctrine_Core::getTable('EIAProjectDetail')->find($eia_project_detail->getId())->setResubmit('done')->save();
				$this->redirect('projectDescription/edit?id='.$resubmit['EIAProjectDescription']);
			}elseif($resubmit['EIAProjectSurrounding'])
			{
			Doctrine_Core::getTable('EIAProjectDetail')->find($eia_project_detail->getId())->setResubmit('done')->save();
				$this->redirect('eiaProjectSurrounding/edit?id='.$resubmit['EIAProjectSurrounding']);
			}elseif($resubmit['EIAProjectSurroundingSpecies'])
			{
			Doctrine_Core::getTable('EIAProjectDetail')->find($eia_project_detail->getId())->setResubmit('done')->save();
				$this->redirect('projectSorroundingSpecies/edit?id='.$resubmit['EIAProjectSurroundingSpecies']);
			}elseif($resubmit['EIAProjectSocialEconomic'])
			{
			Doctrine_Core::getTable('EIAProjectDetail')->find($eia_project_detail->getId())->setResubmit('done')->save();
				$this->redirect('projectSocialEconomic/edit?id='.$resubmit['EIAProjectSocialEconomic']);
			}elseif($resubmit['EIAProjectImpactMeasures'])
			{
			Doctrine_Core::getTable('EIAProjectDetail')->find($eia_project_detail->getId())->setResubmit('done')->save();
				$this->redirect('projectImpactMeasures/edit?id='.$resubmit['EIAProjectImpactMeasures']);
			}elseif($resubmit['EIAProjectOperationPhase'])
			{
			Doctrine_Core::getTable('EIAProjectDetail')->find($eia_project_detail->getId())->setResubmit('done')->save();
				$this->redirect('projectOperationPhase/edit?id='.$resubmit['EIAProjectOperationPhase']);
			}elseif($resubmit['EIAProjectAttachment'])
			{
			Doctrine_Core::getTable('EIAProjectDetail')->find($eia_project_detail->getId())->setResubmit('done')->save();
				$this->redirect('projectAttachment/edit?id='.$resubmit['EIAProjectAttachment']);
			}else
			{
			Doctrine_Core::getTable('EIApplicationStatus')->updateStatus($eia_project_detail->getId(),'resubmitted');
			Doctrine_Core::getTable('EIApplicationStatus')->updateComment($eia_project_detail->getId(),'Resubmission assessment');
			Doctrine_Core::getTable('EITaskAssignment')->updateWorkStatus($eia_project_detail->getId(),'resubmitted');
			Doctrine_Core::getTable('EIAProjectDetail')->find($eia_project_detail->getId())->setResubmit('done')->save();
			$this->getUser()->resetResubmissionForm();
			$this->redirect('@homepage');
			}
		}else
		{
			$this->redirect('eiaProjectDeveloper/edit?id='.$queried_id);
		}
	 }
	 else if($queried_id  == null ) //new, we redirect to new method
	 {
		$this->redirect('eiaProjectDeveloper/new?id='.$eia_project_detail->getId().'&token='.$eia_project_detail->getToken());
	 }
      
    }
  }
}

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
	if(!is_null($projectDetail=Doctrine_Core::getTable('EIAProjectDetail')->find(array($request->getParameter('id')))) && $projectDetail->getToken()==$request->getParameter('token'))
	{
		$this->form = new EIAProjectDeveloperForm();
		
	}else{
		$this->getUser()->setFlash('notice','Please Fill in this form first before proceeding');
		$this->redirect('@project_detail'); 
	}
		
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
      ///
	   //get the setAttribute
		if($this->getUser()->getAttribute('eiaprojectid'))
		{
		$project_id = $this->getUser()->getAttribute('eiaprojectid');
		}else
		{
			$project_id=$eia_project_developer->getEiaprojectId();
		}
	  //we also control if it new or edit action to be execute for eiaprojectdeveloper module
	  //
	 $query2 = Doctrine_Core::getTable('EIAProjectDescription')->queryForId($project_id);
	 $queried_id = null ;
	 $queried_token = null ;
	 foreach($query2 as $q)
	 {
	  $queried_id = $q['id'];
	  $queried_token  = $q['token'];
	 }
	// print $queried_id; exit;
	 //
	 if($queried_id != null) //edit, we redirect to editing method
	 {
		if($eia_project_developer->getResubmit() == 'all')
		{
		//$projectDescription=Doctrine_Core::getTable('EIAProjectDescription')->findByEiaprojectId($eia_project_developer->getEiaproject_id());
			$this->redirect('projectDescription/edit?id='.$queried_id);
		}elseif($eia_project_developer->getResubmit() == 'only')
		{
			$resubmit=$this->getUser()->getAttribute('resubmit');
			if($resubmit['EIAProjectDescription'])
			{
			Doctrine_Core::getTable('EIAProjectDeveloper')->find($eia_project_developer->getId())->setResubmit('done')->save();
				$this->redirect('projectDescription/edit?id='.$resubmit['EIAProjectDescription']);
			}elseif($resubmit['EIAProjectSurrounding'])
			{
			Doctrine_Core::getTable('EIAProjectDeveloper')->find($eia_project_developer->getId())->setResubmit('done')->save();
				$this->redirect('eiaProjectSurrounding/edit?id='.$resubmit['EIAProjectSurrounding']);
			}elseif($resubmit['EIAProjectSurroundingSpecies'])
			{
			Doctrine_Core::getTable('EIAProjectDeveloper')->find($eia_project_developer->getId())->setResubmit('done')->save();
				$this->redirect('projectSorroundingSpecies/edit?id='.$resubmit['EIAProjectSurroundingSpecies']);
			}elseif($resubmit['EIAProjectSocialEconomic'])
			{
			Doctrine_Core::getTable('EIAProjectDeveloper')->find($eia_project_developer->getId())->setResubmit('done')->save();
				$this->redirect('projectSocialEconomic/edit?id='.$resubmit['EIAProjectSocialEconomic']);
			}elseif($resubmit['EIAProjectImpactMeasures'])
			{
			Doctrine_Core::getTable('EIAProjectDeveloper')->find($eia_project_developer->getId())->setResubmit('done')->save();
				$this->redirect('projectImpactMeasures/edit?id='.$resubmit['EIAProjectImpactMeasures']);
			}elseif($resubmit['EIAProjectOperationPhase'])
			{
			Doctrine_Core::getTable('EIAProjectDeveloper')->find($eia_project_developer->getId())->setResubmit('done')->save();
				$this->redirect('projectOperationPhase/edit?id='.$resubmit['EIAProjectOperationPhase']);
			}elseif($resubmit['EIAProjectAttachment'])
			{
			Doctrine_Core::getTable('EIAProjectDeveloper')->find($eia_project_developer->getId())->setResubmit('done')->save();
				$this->redirect('projectAttachment/edit?id='.$resubmit['EIAProjectAttachment']);
			}else{
			Doctrine_Core::getTable('EIApplicationStatus')->updateStatus($eia_project_developer->getEiaprojectId(),'resubmitted');
			Doctrine_Core::getTable('EIApplicationStatus')->updateComment($eia_project_developer->getEiaprojectId(),'Resubmission assessment');
			Doctrine_Core::getTable('EITaskAssignment')->updateWorkStatus($eia_project_developer->getEiaprojectId(),'resubmitted');
			Doctrine_Core::getTable('EIAProjectDeveloper')->find($eia_project_developer->getId())->setResubmit('done')->save();
			$this->getUser()->resetResubmissionForm();
			$this->redirect('@homepage');
			}
		}else
		{
		$this->redirect('projectDescription/edit?id='.$queried_id.'&token='.$queried_token);
		}
	 }
	 else if($queried_id  == null ) //new, we redirect to new method
	 {
		$this->redirect('projectDescription/new?id='.$eia_project_developer->getId().'&token='.$eia_project_developer->getToken());
	 }
	  
	  ///
	  
	  
	  
      
    }
  }
}

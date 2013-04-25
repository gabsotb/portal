<?php

/**
 * eiaProjectSurrounding actions.
 *
 * @package    rdbeportal
 * @subpackage eiaProjectSurrounding
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class eiaProjectSurroundingActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->eia_project_surroundings = Doctrine_Core::getTable('EIAProjectSurrounding')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
	if(!is_null($projectDescription=Doctrine_Core::getTable('EIAProjectDescription')->find(array($request->getParameter('id')))) && $projectDescription->getToken()==$request->getParameter('token'))
	{
		$this->form = new EIAProjectSurroundingForm();
		
	}else{
		$this->getUser()->setFlash('notice','Please Fill in this form first before proceeding');
		$this->redirect('@project_detail'); 
	}
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new EIAProjectSurroundingForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($eia_project_surrounding = Doctrine_Core::getTable('EIAProjectSurrounding')->find(array($request->getParameter('id'))), sprintf('Object eia_project_surrounding does not exist (%s).', $request->getParameter('id')));
    $this->form = new EIAProjectSurroundingForm($eia_project_surrounding);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($eia_project_surrounding = Doctrine_Core::getTable('EIAProjectSurrounding')->find(array($request->getParameter('id'))), sprintf('Object eia_project_surrounding does not exist (%s).', $request->getParameter('id')));
    $this->form = new EIAProjectSurroundingForm($eia_project_surrounding);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($eia_project_surrounding = Doctrine_Core::getTable('EIAProjectSurrounding')->find(array($request->getParameter('id'))), sprintf('Object eia_project_surrounding does not exist (%s).', $request->getParameter('id')));
    $eia_project_surrounding->delete();

    $this->redirect('eiaProjectSurrounding/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $eia_project_surrounding = $form->save();
       ///
	    //get the setAttribute
		if($this->getUser()->getAttribute('eiaprojectid'))
		{
		$project_id = $this->getUser()->getAttribute('eiaprojectid');
		}else{
		$project_id = $eia_project_surrounding->getEiaprojectId();
		}
	  //we also control if it new or edit action to be execute for eiaprojectdeveloper module
	  //
	 $query2 = Doctrine_Core::getTable('EIAProjectSurroundingSpecies')->queryForId($project_id);
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
		if($eia_project_surrounding->getResubmit() == 'all')
		{
		//$projectSorroundingSpecies=Doctrine_Core::getTable('EIAProjectSurroundingSpecies')->findByProjectSurroundingId($eia_project_surrounding->getId());
		$this->redirect('projectSorroundingSpecies/edit?id='.$queried_id);
		}elseif($eia_project_surrounding->getResubmit() == 'only')
		{
			$resubmit=$this->getUser()->getAttribute('resubmit');
			if($resubmit['EIAProjectSurroundingSpecies'])
			{
			Doctrine_Core::getTable('EIAProjectSurrounding')->find($eia_project_surrounding->getId())->setResubmit('done')->save();
				$this->redirect('projectSorroundingSpecies/edit?id='.$resubmit['EIAProjectSurroundingSpecies']);
			}elseif($resubmit['EIAProjectSocialEconomic'])
			{
			Doctrine_Core::getTable('EIAProjectSurrounding')->find($eia_project_surrounding->getId())->setResubmit('done')->save();
				$this->redirect('projectSocialEconomic/edit?id='.$resubmit['EIAProjectSocialEconomic']);
			}elseif($resubmit['EIAProjectImpactMeasures'])
			{
			Doctrine_Core::getTable('EIAProjectSurrounding')->find($eia_project_surrounding->getId())->setResubmit('done')->save();
				$this->redirect('projectImpactMeasures/edit?id='.$resubmit['EIAProjectImpactMeasures']);
			}elseif($resubmit['EIAProjectOperationPhase'])
			{
			Doctrine_Core::getTable('EIAProjectSurrounding')->find($eia_project_surrounding->getId())->setResubmit('done')->save();
				$this->redirect('projectOperationPhase/edit?id='.$resubmit['EIAProjectOperationPhase']);
			}elseif($resubmit['EIAProjectAttachment'])
			{
			Doctrine_Core::getTable('EIAProjectSurrounding')->find($eia_project_surrounding->getId())->setResubmit('done')->save();
				$this->redirect('projectAttachment/edit?id='.$resubmit['EIAProjectAttachment']);
			}else{
			Doctrine_Core::getTable('EIApplicationStatus')->updateStatus($eia_project_surrounding->getEiaprojectId(),'resubmitted');
			Doctrine_Core::getTable('EIApplicationStatus')->updateComment($eia_project_surrounding->getEiaprojectId(),'Resubmission assessment');
			Doctrine_Core::getTable('EITaskAssignment')->updateWorkStatus($eia_project_surrounding->getEiaprojectId(),'resubmitted');
			Doctrine_Core::getTable('EIAProjectSurrounding')->updateResubmit('done',$eia_project_surrounding->getId());
			$this->getUser()->resetResubmissionForm();
			$this->redirect('@homepage');
			}
		}else
		{
		$this->redirect('projectSorroundingSpecies/edit?id='.$queried_id.'&token='.$queried_token);
		}
	 }
	 else if($queried_id  == null ) //new, we redirect to new method
	 {
		$this->redirect('projectSorroundingSpecies/new?id='.$eia_project_surrounding->getId().'&token='.$eia_project_surrounding->getToken());
	 }
	   
	   
	   
	   
	   
      
    }
  }
}

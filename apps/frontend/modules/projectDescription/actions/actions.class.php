<?php

/**
 * projectDescription actions.
 *
 * @package    rdbeportal
 * @subpackage projectDescription
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class projectDescriptionActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->eia_project_descriptions = Doctrine_Core::getTable('EIAProjectDescription')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->eia_project_description = Doctrine_Core::getTable('EIAProjectDescription')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->eia_project_description);
  }

  public function executeNew(sfWebRequest $request)
  {
	if(!is_null($developer=Doctrine_Core::getTable('EIAProjectDeveloper')->find(array($request->getParameter('id')))) && $developer->getToken()==$request->getParameter('token')){
	
		$this->form = new EIAProjectDescriptionForm();
	}
	else{
		$this->getUser()->setFlash('notice','Please fill in this form first before proceeding');
		$this->redirect('@project_detail');
	}
  }
  

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new EIAProjectDescriptionForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($eia_project_description = Doctrine_Core::getTable('EIAProjectDescription')->find(array($request->getParameter('id'))), sprintf('Object eia_project_description does not exist (%s).', $request->getParameter('id')));
    $this->form = new EIAProjectDescriptionForm($eia_project_description);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($eia_project_description = Doctrine_Core::getTable('EIAProjectDescription')->find(array($request->getParameter('id'))), sprintf('Object eia_project_description does not exist (%s).', $request->getParameter('id')));
    $this->form = new EIAProjectDescriptionForm($eia_project_description);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($eia_project_description = Doctrine_Core::getTable('EIAProjectDescription')->find(array($request->getParameter('id'))), sprintf('Object eia_project_description does not exist (%s).', $request->getParameter('id')));
    $eia_project_description->delete();

    $this->redirect('projectDescription/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $eia_project_description = $form->save();
	  if($this->getUser()->getAttribute('eiaprojectid'))
	  {
	  $project_id = $this->getUser()->getAttribute('eiaprojectid');
	  }else{
	  $project_id =$eia_project_description->getEiaprojectId();
	  }
	  $surrounding=Doctrine_Core::getTable('EIAProjectSurrounding')->queryForId($project_id);
	 if($surrounding[0]['id'] != null)
	  {
		if($eia_project_description->getResubmit() == 'all')
		{
		//$eiaProjectSurrounding=Doctrine_Core::getTable('EIAProjectSurrounding')->findByEiaprojectId($eia_project_description->getEiaproject_id());
			$this->redirect('eiaProjectSurrounding/edit?id='.$surrounding[0]['id']);
		}elseif($eia_project_description->getResubmit() == 'only')
		{
			$resubmit=$this->getUser()->getAttribute('resubmit');
			if($resubmit['EIAProjectSurrounding'])
			{
			Doctrine_Core::getTable('EIAProjectDescription')->find($eia_project_description->getId())->setResubmit('done')->save();
				$this->redirect('eiaProjectSurrounding/edit?id='.$resubmit['EIAProjectSurrounding']);
			}elseif($resubmit['EIAProjectSurroundingSpecies'])
			{
			Doctrine_Core::getTable('EIAProjectDescription')->find($eia_project_description->getId())->setResubmit('done')->save();
				$this->redirect('projectSorroundingSpecies/edit?id='.$resubmit['EIAProjectSurroundingSpecies']);
			}elseif($resubmit['EIAProjectSocialEconomic'])
			{
			Doctrine_Core::getTable('EIAProjectDescription')->find($eia_project_description->getId())->setResubmit('done')->save();
				$this->redirect('projectSocialEconomic/edit?id='.$resubmit['EIAProjectSocialEconomic']);
			}elseif($resubmit['EIAProjectImpactMeasures'])
			{
			Doctrine_Core::getTable('EIAProjectDescription')->find($eia_project_description->getId())->setResubmit('done')->save();
				$this->redirect('projectImpactMeasures/edit?id='.$resubmit['EIAProjectImpactMeasures']);
			}elseif($resubmit['EIAProjectOperationPhase'])
			{
			Doctrine_Core::getTable('EIAProjectDescription')->find($eia_project_description->getId())->setResubmit('done')->save();
				$this->redirect('projectOperationPhase/edit?id='.$resubmit['EIAProjectOperationPhase']);
			}elseif($resubmit['EIAProjectAttachment'])
			{
			Doctrine_Core::getTable('EIAProjectDescription')->find($eia_project_description->getId())->setResubmit('done')->save();
				$this->redirect('projectAttachment/edit?id='.$resubmit['EIAProjectAttachment']);
			}else{
			Doctrine_Core::getTable('EIApplicationStatus')->updateStatus($eia_project_description->getEiaprojectId(),'resubmitted');
			Doctrine_Core::getTable('EIApplicationStatus')->updateComment($eia_project_description->getEiaprojectId(),'Resubmission assessment');
			Doctrine_Core::getTable('EITaskAssignment')->updateWorkStatus($eia_project_description->getEiaprojectId(),'resubmitted');
			Doctrine_Core::getTable('EIAProjectDescription')->find($eia_project_description->getId())->setResubmit('done')->save();
			$this->getUser()->resetResubmissionForm();
			$this->redirect('@homepage');
			}
		}
		}else
		{

			$this->redirect('eiaProjectSurrounding/new?id='.$eia_project_description->getId().'&token='.$eia_project_description->getToken());
		}
    }
  }
}

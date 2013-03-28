<?php

/**
 * projectImpactMeasures actions.
 *
 * @package    rdbeportal
 * @subpackage projectImpactMeasures
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class projectImpactMeasuresActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->eia_project_impact_measuress = Doctrine_Core::getTable('EIAProjectImpactMeasures')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->eia_project_impact_measures = Doctrine_Core::getTable('EIAProjectImpactMeasures')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->eia_project_impact_measures);
  }

  public function executeNew(sfWebRequest $request)
  {
	if(!is_null($species=Doctrine_Core::getTable('EIAProjectSocialEconomic')->find(array($request->getParameter('id')))) && $species->getToken()==$request->getParameter('token'))
	{
		$this->form = new EIAProjectImpactMeasuresForm();
		
	}else{
		$this->getUser()->setFlash('notice','Please Fill in this form first before proceeding');
		$this->redirect('@project_detail'); 
	}
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new EIAProjectImpactMeasuresForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($eia_project_impact_measures = Doctrine_Core::getTable('EIAProjectImpactMeasures')->find(array($request->getParameter('id'))), sprintf('Object eia_project_impact_measures does not exist (%s).', $request->getParameter('id')));
    $this->form = new EIAProjectImpactMeasuresForm($eia_project_impact_measures);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($eia_project_impact_measures = Doctrine_Core::getTable('EIAProjectImpactMeasures')->find(array($request->getParameter('id'))), sprintf('Object eia_project_impact_measures does not exist (%s).', $request->getParameter('id')));
    $this->form = new EIAProjectImpactMeasuresForm($eia_project_impact_measures);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($eia_project_impact_measures = Doctrine_Core::getTable('EIAProjectImpactMeasures')->find(array($request->getParameter('id'))), sprintf('Object eia_project_impact_measures does not exist (%s).', $request->getParameter('id')));
    $eia_project_impact_measures->delete();

    $this->redirect('projectImpactMeasures/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $eia_project_impact_measures = $form->save();

      $this->redirect('projectOperationPhase/new?id='.$eia_project_impact_measures->getId().'&token='.$eia_project_impact_measures->getToken());
    }
  }
}

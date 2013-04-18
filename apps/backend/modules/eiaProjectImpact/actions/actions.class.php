<?php

/**
 * eiaProjectImpact actions.
 *
 * @package    rdbeportal
 * @subpackage eiaProjectImpact
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class eiaProjectImpactActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->project_impacts = Doctrine_Core::getTable('ProjectImpact')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ProjectImpactForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ProjectImpactForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($project_impact = Doctrine_Core::getTable('ProjectImpact')->find(array($request->getParameter('id'))), sprintf('Object project_impact does not exist (%s).', $request->getParameter('id')));
    $this->form = new ProjectImpactForm($project_impact);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($project_impact = Doctrine_Core::getTable('ProjectImpact')->find(array($request->getParameter('id'))), sprintf('Object project_impact does not exist (%s).', $request->getParameter('id')));
    $this->form = new ProjectImpactForm($project_impact);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($project_impact = Doctrine_Core::getTable('ProjectImpact')->find(array($request->getParameter('id'))), sprintf('Object project_impact does not exist (%s).', $request->getParameter('id')));
    $project_impact->delete();

    $this->redirect('eiaProjectImpact/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $project_impact = $form->save();
	  
	  if($project_impact->getImpactLevel())
	  {
		//Doctrine_Core::getTable('EITaskAssignment')->updateWorkStatus($project_impact->getEiaprojectId(),"assess");
		$taskId=Doctrine_Core::getTable('EITaskAssignment')->findByEiaprojectId($project_impact->getEiaprojectId());
		Doctrine_Core::getTable('EITaskAssignment')->find($taskId[0]['id'])->setWorkStatus('assess')->setStage('impact-level')->save();
		$notify= new Notifications();
		$notify->recepient=Doctrine_Core::getTable('sfGuardUser')->find($taskId[0]['created_by'])->getUsername();
		$notify->message="An application is awaiting assessment";
		$notify->save();
	  }
	  $this->redirect('@homepage');
    }
  }
}

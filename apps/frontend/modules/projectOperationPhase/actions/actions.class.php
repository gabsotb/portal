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
    $this->form = new EIAProjectOperationPhaseForm();
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

      $this->redirect('projectOperationPhase/edit?id='.$eia_project_operation_phase->getId());
    }
  }
}

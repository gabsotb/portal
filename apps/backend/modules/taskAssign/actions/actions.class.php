<?php

/**
 * taskAssign actions.
 *
 * @package    rdbeportal
 * @subpackage taskAssign
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class taskAssignActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->task_assignments = Doctrine_Core::getTable('TaskAssignment')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->task_assignment = Doctrine_Core::getTable('TaskAssignment')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->task_assignment);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new TaskAssignmentForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new TaskAssignmentForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($task_assignment = Doctrine_Core::getTable('TaskAssignment')->find(array($request->getParameter('id'))), sprintf('Object task_assignment does not exist (%s).', $request->getParameter('id')));
    $this->form = new TaskAssignmentForm($task_assignment);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($task_assignment = Doctrine_Core::getTable('TaskAssignment')->find(array($request->getParameter('id'))), sprintf('Object task_assignment does not exist (%s).', $request->getParameter('id')));
    $this->form = new TaskAssignmentForm($task_assignment);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($task_assignment = Doctrine_Core::getTable('TaskAssignment')->find(array($request->getParameter('id'))), sprintf('Object task_assignment does not exist (%s).', $request->getParameter('id')));
    $task_assignment->delete();

    $this->redirect('taskAssign/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $task_assignment = $form->save();

      $this->redirect('taskAssign/edit?id='.$task_assignment->getId());
    }
  }
}

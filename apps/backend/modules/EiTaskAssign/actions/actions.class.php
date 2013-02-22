<?php

/**
 * EiTaskAssign actions.
 *
 * @package    rdbeportal
 * @subpackage EiTaskAssign
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EiTaskAssignActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }
  
	public function executeNew(sfWebRequest $request)
	{
		$this->form = new EITaskAssignmentForm();
	}
	 
	public function executeCreate(sfWebRequest $request)
	{
	  $this->form = new EITaskAssignmentForm();
	  $this->processForm($request, $this->form);
	  $this->setTemplate('new');
	}
	 
	public function executeEdit(sfWebRequest $request)
	{
	  $this->form = new EITaskAssignmentForm($this->getRoute()->getObject());
	}
	 
	public function executeUpdate(sfWebRequest $request)
	{
	  $this->form = new EITaskAssignmentForm($this->getRoute()->getObject());
	  $this->processForm($request, $this->form);
	  $this->setTemplate('edit');
	}
	 
	public function executeDelete(sfWebRequest $request)
	{
	  $request->checkCSRFProtection();
	 
	  $task = $this->getRoute()->getObject();
	  $task->delete();
	 
	  $this->redirect('@homepage');
	}
	 
	protected function processForm(sfWebRequest $request, sfForm $form)
	{
	  $form->bind(
		$request->getParameter($form->getName()),
		$request->getFiles($form->getName())
	  );
	 
	  if ($form->isValid())
	  {
		$task = $form->save();
	 
		$this->redirect('homepage', $task);
	  }
	}
	
	public function executeAssignment(sfWebRequest $request)
	{
		$this->jobs = Doctrine_Core::getTable('EITaskAssignment')->getJob();
	}
	
	public function executeImpactNew(sfWebRequest $request)
	{
		$this->form = new ProjectImpactForm();
	}
	
	public function executeImpactCreate(sfWebRequest $request)
	{
		$this->form = new ProjectImpactForm();
		$this->processForm($request, $this->form);
		$this->setTemplate('impactNew');
	}
	
	public function executeImpactUpdate(sfWebRequest $request)
	{
		$this->form = new ProjectImpactForm($this->getRoute()->getObject());
		$this->processForm($request, $this->form);
		$this->setTemplate('impactEdit');
	}
}

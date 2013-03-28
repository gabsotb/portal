<?php

/**
 * eiaDataAdmin actions.
 *
 * @package    rdbeportal
 * @subpackage eiaDataAdmin
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class eiaDataAdminActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->tasks = Doctrine_Core::getTable('EITaskAssignment')->getTasks();
	//$this->tors = Doctrine_Core::getTable('Tor')->
  }
  
	public function executeShow(sfWebRequest $request)
	{
		$this->task=Doctrine_Core::getTable('EITaskAssignment')->find(array($request->getParameter('id')));
	}
  
    public function executeShowEia(sfWebRequest $request)
	{
		$this->eia = Doctrine_Core::getTable('EIApplication')->find(array($request->getParameter('id')));
		$this->forward404Unless($this->eia);
		Doctrine_Core::getTable('EIApplicationStatus')->updateApplicationStatus('processing',$request->getParameter('id'));
		Doctrine_Core::getTable('EIApplicationStatus')->updateComment('Your Document is been processed',$request->getParameter('id'));
		Doctrine_Core::getTable('EIApplicationStatus')->updatePercentage('20',$request->getParameter('id'));
	}
	
	public function executeShowTor(sfWebRequest $request)
	{
		$this->tor = Doctrine_Core::getTable('Tor')->getTor($request->getParameter('id'));
		$this->forward404Unless($this->tor);
	}

}

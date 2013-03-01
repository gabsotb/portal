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
  
    public function executeShowEia(sfWebRequest $request)
	{
		$this->eia = Doctrine_Core::getTable('EIApplication')->find(array($request->getParameter('id')));
		$this->forward404Unless($this->eia);
	}

}

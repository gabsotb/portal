<?php

/**
 * confirm actions.
 *
 * @package    rdbeportal
 * @subpackage confirm
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class confirmActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
     $this->validate = Doctrine_Core::getTable('InvestmentApplication')->find(array($request->getParameter('id')));
     $this->form = new ConfirmForm();
	 $this->forward404Unless($this->validate);
  }
  
}

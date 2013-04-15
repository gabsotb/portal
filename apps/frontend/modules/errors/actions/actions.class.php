<?php

/**
 * errors actions.
 *
 * @package    rdbeportal
 * @subpackage errors
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class errorsActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
	public function executeIndex(sfWebRequest $request)
	{
	 
	}

	public function executeError404(sfWebRequest $request)
	{
	 throw new sfError404Exception("An Error Occured -->".$request->getMessage());
	}

	public function executeError500(sfWebRequest $request)
	{
	 
	}
	//Added by anut for Forbidden errors ST-339
	public function executeError403(sfWebRequest $request)
	{
	 
	}
  
}

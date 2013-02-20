<?php

/**
 * EIA actions.
 *
 * @package    rdbeportal
 * @subpackage EIA
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EIAActions extends sfActions
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
		$this->form=new EIApplicationForm();
	}
	public function executeCreate(sfWebRequest $request)
	{
		$this->forward404Unless($request->isMethod(sfRequest::POST));

		$this->form = new EIApplicationForm();
		///////////////////////////////////////////
		
			
		
		$this->processForm($request, $this->form);
		$this->setTemplate('new');
	}
	 
	public function executeEdit(sfWebRequest $request)
	{
		 $this->forward404Unless($EIA = Doctrine_Core::getTable('EIAApplication')->find(array($request->getParameter('id'))), sprintf('Object EIA_application does not exist (%s).', $request->getParameter('id')));
		
		$this->form = new EIApplicationForm($EIA);
	}
	 
	public function executeUpdate(sfWebRequest $request)
	{
		$this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
		$this->forward404Unless($EIA_application = Doctrine_Core::getTable('EIAApplication')->find(array($request->getParameter('id'))), sprintf('Object EIAApplication does not exist (%s).', $request->getParameter('id')));
		$this->form = new EIApplicationForm($EIA_application);
		$this->processForm($request, $this->form);
		$this->setTemplate('edit');
	}
	 
	public function executeDelete(sfWebRequest $request)
	{
	  $request->checkCSRFProtection();
	
		$this->forward404Unless($EIA = Doctrine_Core::getTable('EIAApplication')->find(array($request->getParameter('id'))), sprintf('Object EIA_application does not exist (%s).', $request->getParameter('id')));
	 
	  $EIA->delete();
	 
	  $this->redirect('EIA/index');
	}
	 
	protected function processForm(sfWebRequest $request, sfForm $form)
	{
	  $form->bind(
		$request->getParameter($form->getName()),
		$request->getFiles($form->getName())
	  );
	 
	  if ($form->isValid())
	  {
		$allFormValues = $request->getParameter($this->form->getName());
		//access values
		 $name = $allFormValues['developer_name'];
		 $regno = $allFormValues['company_regno'];
		 
		 //class to access method
		 $business = new EIApplication();
		 
		if($business->validateBusiness($name, $regno) == null)
		{
			// Invalid Business. Not Registered
			$this->redirect('investmentapp/invalid');
		}
		else
		{
			
			$EIA = $form->save();
			$this->redirect('investmentapp/index');
		}
	  }
	}
}

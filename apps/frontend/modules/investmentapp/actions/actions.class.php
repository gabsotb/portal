<?php

/**
 * investmentapp actions.
 *
 * @package    rdbeportal
 * @subpackage investmentapp
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class investmentappActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
   /*
   We need to transfer the model access code to the model class to fully comply with MVC
   */
   //call method to count and the current logged in user applications for Investment Certificates
    $this->investment_applications = Doctrine_Core::getTable('InvestmentApplication')->getUserInvestmentApplications();
	//now call this method to check if the user has any EIA Certificate applications
	$this->eia_applications = Doctrine_Core::getTable('InvestmentApplication')->getEIApplications();
	///////////// Below is for the overall report  ///////////////////////
	 //Get total Investment Certificate Applications
	$this->overall_investmentapps = Doctrine_Core::getTable('InvestmentApplication')->getTotalInvestmentApplications();
	//Get total EIA Certificates 
	$this->overall_ieapplications = Doctrine_Core::getTable('InvestmentApplication')->getOverallEIATotal();
	//Get Total Tax Exemptions Grantet to Investors with Certificates IGNORE FOR NOW
	//Get the Status of application for Investment Certificate for each business for this user
	$this->applications = Doctrine_Core::getTable('InvestmentApplication')->getApplicationStatus();
	$this->eiaStatus = Doctrine_Core::getTable('EIApplication')->getStatus();
	
	
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->investment_application = Doctrine_Core::getTable('InvestmentApplication')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->investment_application);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new InvestmentApplicationForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new InvestmentApplicationForm();
	///////////////////////////////////////////
	 $allFormValues = $request->getParameter($this->form->getName());
	 //access values
     $name = $allFormValues['name'];
	 $regno = $allFormValues['registration_number'];
	 //class to access method
	 $business = new InvestmentApplication();
	 $confirm = $business->validateBusiness($name, $regno);
			  if($confirm == null)
			  {
			   // Invalid Business. Not Registered
			    $this->redirect('investmentapp/invalid');
				
			  }
	//////////////////////////////////////////

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }
 // This method informs the user that the business is invalid and also offers a link to the Business Registration System
  public function executeInvalid(sfWebRequest $request)
  {
   
  }
  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($investment_application = Doctrine_Core::getTable('InvestmentApplication')->find(array($request->getParameter('id'))), sprintf('Object investment_application does not exist (%s).', $request->getParameter('id')));
    $this->form = new InvestmentApplicationForm($investment_application);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($investment_application = Doctrine_Core::getTable('InvestmentApplication')->find(array($request->getParameter('id'))), sprintf('Object investment_application does not exist (%s).', $request->getParameter('id')));
    $this->form = new InvestmentApplicationForm($investment_application);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($investment_application = Doctrine_Core::getTable('InvestmentApplication')->find(array($request->getParameter('id'))), sprintf('Object investment_application does not exist (%s).', $request->getParameter('id')));
    $investment_application->delete();

    $this->redirect('investmentapp/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
     $investment_application = $form->save();
	 $this->redirect('businessplan/new');
    }
  }
  ////now this is tricky he he he 
  //method to create a new form for filling in Business Plan details
  
  public function executeBusinessplan()
  {
  
  }
}

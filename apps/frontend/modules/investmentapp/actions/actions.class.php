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
      //$languages = $this->getRequest()->getLanguages();
	 // print_r( $languages); exit; 
     ////////////////////// setting user culture
	  if (!$request->getParameter('sf_culture'))
	  {
		if ($this->getUser()->isFirstRequest())
		{
		  $culture = $request->getPreferredCulture(array('en', 'fr', 'rw'));
		  $this->getUser()->setCulture($culture);
		  $this->getUser()->isFirstRequest(false);
		}
		else
		{
		  $culture = $this->getUser()->getCulture();
		}
	 
		$this->redirect('localized_homepage');
	  }
	 //////////////////////
   /*
   We need to transfer the model access code to the model class to fully comply with MVC
   */
   //call method to count and the current logged in user applications for Investment Certificates
    $this->investment_applications = Doctrine_Core::getTable('InvestmentApplication')->getUserInvestmentApplications();
	//now call this method to check if the user has any EIA Certificate applications
	//$this->eia_applications = Doctrine_Core::getTable('EIApplication')->getUserEIApplications();
	///////////// Below is for the overall report  ///////////////////////
	 //Get total Investment Certificate Applications
	$this->overall_investmentapps = Doctrine_Core::getTable('InvestmentApplication')->getTotalInvestmentApplications();
	//Get total EIA Certificates 
	//$this->overall_ieapplications = Doctrine_Core::getTable('InvestmentApplication')->getOverallEIATotal();
	//Get Total Tax Exemptions Grantet to Investors with Certificates IGNORE FOR NOW
	//Get the Status of application for Investment Certificate for each business for this user
	$this->applications = Doctrine_Core::getTable('InvestmentApplication')->getApplicationStatus();
	//we want a user to apply for another certificate if he/she has completed and successfuly applied for another business
	//get the current logged in user id
	$userid = sfContext::getInstance()->getUser()->getGuardUser()->getId();
	
	$this->checkCertificationStatus = Doctrine_Core::getTable('InvestmentApplication')->getCertificationStatus($userid);
	//print_r($this->checkCertificationStatus); exit;
	////////// EIA ///////////
	//eia status for current user
	$this->eiaStatus = Doctrine_Core::getTable('EIApplicationStatus')->getUserStatus();
	//Get Project impact
	//$this->impacts = Doctrine_Core::getTable('ProjectImpact')->getImpacts();
	//$this->torStatus=Doctrine_Core::getTable('TorStatus')->getStatus();
	//$this->torDecision=Doctrine_Core::getTable('TorDecisions')->getTorDecision();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->investment_application = Doctrine_Core::getTable('InvestmentApplication')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->investment_application);
  }

  public function executeNew(sfWebRequest $request)
  {
    //we want to do a trick here. 
	//if we have a situation where a parameter is passed here, that means the value is for a business name for which
	//application for investment certificate has been rejected and thus this user is now applying a fresh for investment certificate.
	//we want to archive the previous application for history reasons and future requirements and we will use the passed parameter
	//name of the business. so
	//$name = $request->getParameter('id');
	$reference = $request->getParameter('reference');
	//we check the status of this application, if it is rejected, we hide it and allow the investor to re-apply
	//otherwise we continue with normal system flow.
	$business_id = Doctrine_Core::getTable('InvestmentApplication')->getIdFromReferenceNumber($reference);
	//we update status of business application
	$tasks = new TaskAssignment(); 
	$status = "rejected_completed"; //Status used to hide this applicant application. Final for Rejection
	$tasks->updateStatus($business_id,$status);
	
	//now with the name. we archive these records.
      	
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
	///
	//use the token for securing application
	$token = $request->getParameter('token');
	
	//we check if this token exist if not, we forward to 404 page
	$query = Doctrine_Core::getTable('InvestmentApplication')->checkToken($token);
	
	//
	$value = null;
	foreach($query as $q)
	{
	 $value = $q['token'];
	}
	if($value == null)
	{
	 $this->forward404();
	}
	if($value != null)
	{
	   $this->form = new InvestmentApplicationForm($investment_application);
	}
   
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($investment_application = Doctrine_Core::getTable('InvestmentApplication')->find(array($request->getParameter('id'))), sprintf('Object investment_application does not exist (%s).', $request->getParameter('id')));
    $this->form = new InvestmentApplicationForm($investment_application);

    $this->processForm($request, $this->form);
	//

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
	 ///we will retrieve the value of business name from the form
	 $this->form = new InvestmentApplicationForm();
	 $allFormValues = $request->getParameter($this->form->getName());
	 //access values
     $name = $allFormValues['name'];
	 $token = $allFormValues['token'];
	 //we will control the redirect procedure incase it is editing, we direct to edit of businessplan also
	 //so, we will check if this user has any request to resubmit his or her work, since we have the name of the company we retrieve the 
	 //id and check for record in InvestmentResubmission
	 $business_id = Doctrine_Core::getTable('InvestmentApplication')->getBusinessId($name);
	 //now we check for existance of $business_id in InvestmentResubmission table
	 $id = Doctrine_Core::getTable('InvestmentResubmission')->checkIdExistance($business_id);
	 //
     if($id == null)
	 {
	  $this->redirect('businessplan/new?id='.$name.'&token='.$token);
	 }	 
	 //
	 if($id != null)
	 {
	  $this->redirect('businessplan/edit?id='.$id.'&token='.$token);
	 }
    }
  }
  ////now this is tricky he he he 
  //method to retrieve user details
  
  public function executeDetails(sfWebRequest $request)
  {
    $info = array();
    $tinNumber = $request->getParameter('id');
	///
	$data = Doctrine_Core::getTable('InvestmentApplication')->getClientDetails($tinNumber);
	/// loop
	foreach($data as $d)
	{
	  //
	  $info[] = array( 'business_name' =>$d['business_name'], 'business_sector' => $d['GROUP_CONCAT( business_sector )'], 'office_telephone' => $d['office_telephone'] , 
	'fax' => $d['fax'] , 'post_box' => $d['post_box'] , 'location' => $d['location'],'sector' => $d['sector'],'district' => $d['district'],'city_province' => $d['city_province']
	);
	}
	
	
	echo json_encode($info);
	exit; 
	$this->redirect('investmentapp/new');
	//print "Value is ".$value ;exit
  }
  
}

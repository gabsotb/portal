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
	//show rejected/resubmit request
	if(count($this->eiaStatus)!=0)
	{
		if($briefDecision=Doctrine_Core::getTable('EIAProjectBriefDecision')->findByEiaprojectId($this->eiaStatus[0]['id']))
		{
			$this->briefDecision=$briefDecision;
			//Resubmission
			if($briefDecision[0]['decision'] == 'resubmit')
			{
				if($briefDecision[0]['all_form'])
				{
					Doctrine_Core::getTable('EIAProjectDetail')->find($this->eiaStatus[0]['id'])->setResubmit('all')->save();
					$EIAProjectDeveloper=Doctrine_Core::getTable('EIAProjectDeveloper')->findByEiaprojectId($this->eiaStatus[0]['id']);
					Doctrine_Core::getTable('EIAProjectDeveloper')->find($EIAProjectDeveloper[0]['id'])->setResubmit('all')->save();
					$EIAProjectDescription=Doctrine_Core::getTable('EIAProjectDescription')->findByEiaprojectId($this->eiaStatus[0]['id']);
					Doctrine_Core::getTable('EIAProjectDescription')->find($EIAProjectDescription[0]['id'])->setResubmit('all')->save();
					$EIAProjectSurrounding=Doctrine_Core::getTable('EIAProjectSurrounding')->findByEiaprojectId($this->eiaStatus[0]['id']);
					Doctrine_Core::getTable('EIAProjectSurrounding')->find($EIAProjectSurrounding[0]['id'])->setResubmit('all')->save();
					//$surroundings=Doctrine_Core::getTable('EIAProjectSurrounding')->findByEiaprojectId($this->eiaStatus[0]['id']);
					$EIAProjectSurroundingSpecies=Doctrine_Core::getTable('EIAProjectSurroundingSpecies')->findByProjectSurroundingId($EIAProjectSurrounding[0]['id']);
					Doctrine_Core::getTable('EIAProjectSurroundingSpecies')->find($EIAProjectSurroundingSpecies[0]['id'])->setResubmit('all')->save();
					$EIAProjectSocialEconomic=Doctrine_Core::getTable('EIAProjectSocialEconomic')->findByEiaprojectId($this->eiaStatus[0]['id']);
					Doctrine_Core::getTable('EIAProjectSocialEconomic')->find($EIAProjectSocialEconomic[0]['id'])->setResubmit('all')->save();
					$EIAProjectImpactMeasures=Doctrine_Core::getTable('EIAProjectImpactMeasures')->findByEiaprojectId($this->eiaStatus[0]['id']);
					Doctrine_Core::getTable('EIAProjectImpactMeasures')->find($EIAProjectImpactMeasures[0]['id'])->setResubmit('all')->save();
					$EIAProjectOperationPhase=Doctrine_Core::getTable('EIAProjectOperationPhase')->findByEiaprojectId($this->eiaStatus[0]['id']);
					Doctrine_Core::getTable('EIAProjectOperationPhase')->find($EIAProjectOperationPhase[0]['id'])->setResubmit('all')->save();
					$EIAProjectAttachment=Doctrine_Core::getTable('EIAProjectAttachment')->findByEiaprojectId($this->eiaStatus[0]['id']);
					Doctrine_Core::getTable('EIAProjectAttachment')->find($EIAProjectAttachment[0]['id'])->setResubmit('all')->save();
					$this->resubmit_id=$this->eiaStatus[0]['id'];
					//$this->getUser()->addResubmissionForm('all',$this->eiaStatus[0]['id']);
					
				}
				if($briefDecision[0]['project_detail'])
				{
					Doctrine_Core::getTable('EIAProjectDetail')->find($this->eiaStatus[0]['id'])->setResubmit('only')->save();
					$this->resubmit_id=$this->eiaStatus[0]['id'];
					//$this->getUser()->addResubmissionForm('EIAProjectDetail',$this->eiaStatus[0]['id']);
				}
				if($briefDecision[0]['project_developer'])
				{
					$form_id=Doctrine_Core::getTable('EIAProjectDeveloper')->findByEiaprojectId($this->eiaStatus[0]['id']);
					Doctrine_Core::getTable('EIAProjectDeveloper')->find($form_id[0]['id'])->setResubmit('only')->save();
					$this->resubmit_id=$form_id[0]['id'];
					$this->getUser()->addResubmissionForm('EIAProjectDeveloper',$form_id[0]['id']);
				}
				if($briefDecision[0]['project_description'])
				{
					$form_id=Doctrine_Core::getTable('EIAProjectDescription')->findByEiaprojectId($this->eiaStatus[0]['id']);
					Doctrine_Core::getTable('EIAProjectDescription')->find($form_id[0]['id'])->setResubmit('only')->save();
					$this->resubmit_id=$form_id[0]['id'];
					$this->getUser()->addResubmissionForm('EIAProjectDescription',$form_id[0]['id']);
				}
				if($briefDecision[0]['project_surrounding'])
				{
					$form_id=Doctrine_Core::getTable('EIAProjectSurrounding')->findByEiaprojectId($this->eiaStatus[0]['id']);
					Doctrine_Core::getTable('EIAProjectSurrounding')->find($form_id[0]['id'])->setResubmit('only')->save();
					$this->resubmit_id=$form_id[0]['id'];
					$this->getUser()->addResubmissionForm('EIAProjectSurrounding',$form_id[0]['id']);
				}
				if($briefDecision[0]['project_surrounding_species'])
				{
					$surroundings=Doctrine_Core::getTable('EIAProjectSurrounding')->findByEiaprojectId($this->eiaStatus[0]['id']);
					$form_id=Doctrine_Core::getTable('EIAProjectSurroundingSpecies')->findByProjectSurroundingId($surroundings[0]['id']);
					Doctrine_Core::getTable('EIAProjectSurroundingSpecies')->find($form_id[0]['id'])->setResubmit('only')->save();
					$this->resubmit_id=$form_id[0]['id'];
					$this->getUser()->addResubmissionForm('EIAProjectSurroundingSpecies',$form_id[0]['id']);
				}
				if($briefDecision[0]['project_social_economic'])
				{
					$form_id=Doctrine_Core::getTable('EIAProjectSocialEconomic')->findByEiaprojectId($this->eiaStatus[0]['id']);
					Doctrine_Core::getTable('EIAProjectSocialEconomic')->find($form_id[0]['id'])->setResubmit('only')->save();
					$this->resubmit_id=$form_id[0]['id'];
					$this->getUser()->addResubmissionForm('EIAProjectSocialEconomic',$form_id[0]['id']);
				}
				if($briefDecision[0]['project_impact_measures'])
				{
					$form_id=Doctrine_Core::getTable('EIAProjectImpactMeasures')->findByEiaprojectId($this->eiaStatus[0]['id']);
					Doctrine_Core::getTable('EIAProjectImpactMeasures')->find($form_id[0]['id'])->setResubmit('only')->save();
					$this->resubmit_id=$form_id[0]['id'];
					$this->getUser()->addResubmissionForm('EIAProjectImpactMeasures',$form_id[0]['id']);
				}
				if($briefDecision[0]['project_operation_phase'])
				{
					$form_id=Doctrine_Core::getTable('EIAProjectOperationPhase')->findByEiaprojectId($this->eiaStatus[0]['id']);
					Doctrine_Core::getTable('EIAProjectOperationPhase')->find($form_id[0]['id'])->setResubmit('only')->save();
					$this->resubmit_id=$form_id[0]['id'];
					$this->getUser()->addResubmissionForm('EIAProjectOperationPhase',$form_id[0]['id']);
				}
				if($briefDecision[0]['project_attachment'])
				{
					$form_id=Doctrine_Core::getTable('EIAProjectAttachment')->findByEiaprojectId($this->eiaStatus[0]['id']);
					Doctrine_Core::getTable('EIAProjectAttachment')->find($form_id[0]['id'])->setResubmit('only')->save();
					$this->resubmit_id=$form_id[0]['id'];
					$this->getUser()->addResubmissionForm('EIAProjectAttachment',$form_id[0]['id']);
				}
			}
		}
	}
	
	//Get Project impact
	//$this->impacts = Doctrine_Core::getTable('ProjectImpact')->getImpacts();
	//$this->torStatus=Doctrine_Core::getTable('TorStatus')->getStatus();
	//$this->torDecision=Doctrine_Core::getTable('TorDecisions')->getTorDecision();
	//Simple reports. show the number of certificates issued to an individual EIA and Investment Certificates.
	
	
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
	//reset all variables
	//$this->getUser()->getAttributeHolder()->clear();
	//$this->forward404Unless($reference);
	//we check the status of this application, if it is rejected, we hide it and allow the investor to re-apply
	//otherwise we continue with normal system flow.
	if($reference != "new")
	{
	 $business_id = Doctrine_Core::getTable('InvestmentApplication')->getIdFromReferenceNumber($reference);
	//we update status of business application
	$tasks = new TaskAssignment(); 
	$status = "rejected_completed"; //Status used to hide this applicant application. Final for Rejection
	$tasks->updateStatus($business_id,$status);
      ///////////
	  $this->form = new InvestmentApplicationForm();
	}
    else if ($reference == "new")
	{
	 //$session = $this->getUser()->getAttribute('session_business_id');
	 //print 'sess'.$session;
	// exit;
      
    $this->form = new InvestmentApplicationForm();
	//print "he";
  // $this->form = new BusinessPlanForm();
	 // exit;
	}
	
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
     
	 ///we will retrieve the value of business name from the form
	 $this->form = new InvestmentApplicationForm();
	 $allFormValues = $request->getParameter($this->form->getName());
	 //access values
     $name = $allFormValues['name'];
	 $token = $allFormValues['token'];
	 $tinNumber = $allFormValues['registration_number'];
	 //we will retrieve the tin number and make sure that this business is not issued with certificate.
	$query_number = Doctrine_Core::getTable('InvestmentApplication')->checkTinNumber($tinNumber);
	$company = null;
	$reference_no = null;
	$business_id = null;
	foreach($query_number as $q)
    {
	 $company = $q['name'];
	 $reference_no = $q['applicant_reference_number'];
	 $business_id = $q['id'];
	}
	//print $business_id; exit;
	//then we check this id existance in the table with certificates information.
	$check_id = Doctrine_Core::getTable('InvestmentCertificate')->searchBusiness($business_id);
	$exists = null ;
	/////
	 foreach($check_id as $c)
	 {
	  $exists = $c['id'];
	 }
	/////
	if($exists == null) //process application
	{
				   $investment_application = $form->save();
				   //we will control the redirect procedure incase it is editing, we direct to edit of businessplan also
				 //so, we will check if this user has any request to resubmit his or her work, since we have the name of the company we retrieve the 
				 //id and check for record in InvestmentResubmission
				 $business_id = Doctrine_Core::getTable('InvestmentApplication')->getBusinessId($name);
				 //now we check for existance of $business_id in InvestmentResubmission table
				 $id = Doctrine_Core::getTable('InvestmentResubmission')->checkIdExistance($business_id);
				 //
				 if($id == null)
				 {
				  //set a session variable
				 // $session = sfContext::getInstance()->getUserd()->getUser()->setAttribute('business_id',$business_id );
				 // print $session; exit;
				  $this->redirect('businessplan/new?id='.$name.'&token='.$token.'&id_value='.$business_id);
				  
				 }	 
				 //
				 if($id != null)
				 {
				 //
				  $value = Doctrine_Core::getTable('BusinessPlan')->queryForId($id);
				  ///
				  sfContext::getInstance()->getUser()->setAttribute('session_biz',$id);
				  $this->redirect('businessplan/edit?id='.$value.'&token='.$token);
				 }
	}
	else if($exists != null)
	{
	 $this->redirect('investmentapp/issued?company='.$company.'&reference='.$reference_no);
	}
	
    }
  }
  //executed if a business tin number has already been issued with a certificate.
  public function executeIssued(sfWebRequest $request)
  {
   $applicant_reference = $request->getParameter('reference');
  // print $applicant_reference; exit;
   $this->query_info = Doctrine_Core::getTable('InvestmentApplication')->getCertificateDetails($applicant_reference);//return certificate details and company info
  }
  //show user issued certificates list.
  public function executeMyCertificates(sfWebRequest $request)
  {
   //we use the username to retrieve the user issued certificates.
   $user_id = $this->getUser()->getGuardUser()->getId();
  // print $user_id; exit;
   $this->certificates = Doctrine_Core::getTable('InvestmentCertificate')->getMyCertificates($user_id);
  }
  public function executePrintCert(sfWebRequest $request) //print a specific business certificate.
  {
     $business_id = $request->getParameter('id');
     //We also make sure that the business is not already issued with a certificate if so we just print the existing certificate instead of
	  //saving a new record
       //print "Scopion"; exit;
	  ////Then we get the Applicant details for printing the certificate. we will use the business_id saved in the InvestmentCertificate Table
	  $query = Doctrine_Core::getTable('InvestmentCertificate')->getApplicantDetails($business_id);
	  //loop over the result and set necessary variables
	  $date = null ;
	  $year = null ;
	  $company = null ;
	  $serial = null;
	  $rep = null;
	  $issuerF = null;
	  $issuerL = null;
	  $sector = null;
	  $nofojobs = null;
	  $expjobs = 0;
	  $invstment = 0;
	  $currency = null ;
	  foreach($query as $q)
	  {
	    $date = $q['created_at'] ;
		$year = $q['created_at'] ;
		$company = $q['name'] ;
		$serial = $q['serial_number'] ;
		$rep = $q['representative_name'] ;
		$issuerF = $q['first_name'] ;
		$issuerL = $q['last_name'] ;
		$sector = $q['business_sector'] ;
		$noofjobs = $q['employment_created'] ;
		$invstment = $q['planned_investment'];
		$currency = $q['currency_type'];
		
	  }
	   $d = new DateTime($date);
	   $day = $d->format('d-m-Y');
	   ///
	   $y = new DateTime($year);
	   $year =  $y->format('Y');
	  
	 // $serial = "C/$number/$year";
	  
	  ////////////////////////////////////////////////////////////////////////////
	
	  ////////////////////////////////////////////////////////////////////////////
	  //execute action for printing pdf document of this report
	  /* I have used another class specifically for investment Certificates only */
	      $config = sfTCPDFPluginConfigHandlerInvstCert::loadConfig('invst_configs');
          sfTCPDFPluginConfigHandlerInvstCert::includeLangFile($this->getUser()->getCulture());
	///////////////////////////Certificate Configuration //////////////////////////////////////////////////////////////////////	  
//create new PDF document (document units are set by default to millimeters)
          $pdf = new sfTCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true);
         // set document information
/*$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 062');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide'); */

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 062', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

//set auto page breaks
//$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->SetAutoPageBreak(false);


//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
//$pdf->setLanguageArray($l);

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 18);

// add a page
$pdf->AddPage();

// start a new XObject Template
$template_id = $pdf->startTemplate(95, 165);

// create Template content
// ...................................................................

$border = array('LRTB' => array('width' => 0.1, 'cap' => 'square', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
 $img_file = K_PATH_IMAGES.'edited2.jpg';
 
$pdf->Image($img_file, 0, 0, 50, 50, 'JPG', '', '', false, 1000, '', false, false, $border, false, false, false);

//Image Calling inside the html has a problem hence we hand code it but we will change it later - Boniface Irunguh
// ...................................................................

// end the current Template
$pdf->endTemplate();

// print the selected Template various times
$pdf->printTemplate($template_id, 0, 0, 550, 710, '', '', false);

// ---------------------------------------------------------
 // Set some content to print
$html = '                               <div style="text-align:center"> 
                                       
										 <p style= "font-size: xx-small;text-align:left ">
										  <i>No</i>: <b>'.$serial.'</b>
										   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   <i>Date:</i> <b>'.$day.'</b>
										 </p><br/><br/>
										 <p style= "font-size: xx-small;text-align:left ">
										Issued To .............<span style="border-bottom: 10px solid #f00;"><b>'.$company.'</b></span>........... Represented by <span style="border-bottom: 10px solid #f00;">........<b>'.$rep.'</b>.....</span>
										<br/><br/>
										Business Sector ...................<span style="border-bottom: 10px solid #f00;"><b>'.$sector.' </span></b> <br/><br/>
										Planned investment amount ........................... <span style="border-bottom: 10px solid #f00;"><b>'.$invstment.'</span></b> '.$currency.'<br/><br/>
										Total Number of jobs planned .....................<span style="border-bottom: 10px solid #f00;"><b>'.$noofjobs.'</span></b><br/><br/>
										Local jobs..................<span style="border-bottom: 10px solid #f00;"><b>'.$noofjobs.'</span></b> and  Jobs For expatriates ........................ <span style="border-bottom: 10px solid #f00;"><b>'.$expjobs.'</span></b>
										 </p>
										 
									<p style= "font-size: xx-small;text-align:left ">
										   This Certificate has been issued to <b>'.$company.'</b> under the seal of 
										   RDB in accordance with law no 26/2005 EAC customs management act atests &nbsp;&nbsp;that the company is duly registered and entitled to the rights and obligations contained in the law.
										  </p>
										
										  
										  <p style= "font-size: xx-small;text-align:left ">
										  &nbsp;&nbsp;<i>THE CHIEF EXECUTIVE OFFICER</i>, 
										  &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										    &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										    &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   <i>COMPANY REPRESENTATIVE</i>,
										  <br/>
										   &nbsp;&nbsp;&nbsp;&nbsp;RDB,
										   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										    &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										    &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										    &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										    &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
										   '.$rep.'
										   <br/>
										   &nbsp;&nbsp;&nbsp;&nbsp;'.$issuerF.' '.$issuerL.'
										    <br/>
										   
										 </p>
										 </div> 
										
                                      
';

// Print text using writeHTMLCell()
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
         
//Close and output PDF document
    $pdf->Output('certificates.pdf', 'I'); // output 
	exit;
	 /////////////////////////////////////////////////////////
	 ////////////

	//print "Cert printed"; exit;
	///////////////////////////////End Certificate Configuration ///////////////////////////////////////////
          // Stop symfony process */
          //throw new sfStopException();
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
	
	

	//$this->redirect('investmentapp/new');
	//print "Value is ".$value ;exit
  }
  //this function is used to populate the graph data
  public function populateGraph()
  {
    $query = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc("SELECT COUNT(serial_number) from investment_certificate");
	
  }
  
}

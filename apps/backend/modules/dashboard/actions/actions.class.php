<?php

/**
 * dashboard actions.
 *
 * @package    rdbeportal
 * @subpackage dashboard
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class dashboardActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
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
    //$this->forward('default', 'module');
	//we call method to select records from InvestmentApplications submitted who's status is submitted i.e. not assigned to a staff.
	 $status = 'submitted';
	$this->new_applications = Doctrine_Core::getTable('InvestmentApplication')->getUnassignedApplications($status); // pass status for the where clause
	///we need to call a function to return user available tasks
	//action to retrieve assigned tasks for currently logged in admin
		//let us retrieve the id of logged in user
	   $userId = sfContext::getInstance()->getUser()->getGuardUser()->getId();
	   //echo $userId; exit;
	   $this->mytasks = Doctrine_Core::getTable('TaskAssignment')->getUserTasks($userId);
	   $this->mytasksnotcomplete = Doctrine_Core::getTable('TaskAssignment')->getUserTasksNotComplete($userId);
	   ////////////EIA////////////
	$this->unassigned= Doctrine_Core::getTable('EIApplicationStatus')->getApplicationStatus('submitted');
	$this->assessments=Doctrine_Core::getTable('EITaskAssignment')->getAwaitingApproval();
	$this->jobAdmin= Doctrine_Core::getTable('EITaskAssignment')->findByUserAssigned($userId);
	   //////////TOR/////
	 //  $this->tors = Doctrine_Core::getTable('Tor')->getRecentTor();
	   //////////////////////////
 
   	
  } 
  ///////////////////////////////////////////////////////////////////////////////////////////
  //function for start work
  public function executeStart(sfWebRequest $request)
  {
    
	$this->value = $request->getParameter('id'); // here we get the parameter 
	//we also use the token to validate this request
	$this->token = $request->getParameter('token');
	//$this->validation = Doctrine_Core::getTable('TaskAssignment')->validateToken($this->token);
	//print_r ($this->validation); exit;
	//if(count($this->validation) == 0)
	//{
	// $this->forward404Unless($this->validation,sprintf('Validation Error'));
	//}
	
	/*Since we have the id of the business, we now retrieve all details for this application for investment certificate from
	the three tables. InvestmentApplication, BusinessPlan and TaskAssignment*/
	$this->details = Doctrine_Core::getTable('TaskAssignment')->getApplicationDetails($this->value,$this->token);
//	print_r($this->details);exit;
	//select Investment and financing schedule &Capital cost Details
	$this->investment_financial = Doctrine_Core::getTable('TaskAssignment')->getInvestmentFinancialDetails($this->value);
	$this->forward404Unless($this->details,sprintf('Validation Error. Invalid parameters for this request'));
	//
	$this->form = new InvestmentResubmissionForm();
	
  }
  //we write functions to retrive relevant records
  //this method loads financial schedule information of a particular investor for admin processing
  public function executeLoadfinancial(sfWebRequest $request)
  {
     /* We use the Symfony inbuilt method to get connection and retrieve data*/
				try {
				   $id = $request->getParameter('id');
				   //$data = Doctrine_Core::getTable('TaskAssignment')->getInvestmentFinancialDetails($id) ;
				   $db = Doctrine_Manager::getInstance()->getCurrentConnection();
				   ///
				 /* $data =  $db->fetchAssoc("SELECT * FROM task_assignment LEFT JOIN business_plan ON business_plan.investment_id = task_assignment.investmentapp_id LEFT JOIN costs ON costs.business_plan = business_plan.id WHERE task_assignment.investmentapp_id = '$id' limit 5 ") ; */
				 $data =  $db->fetchAssoc("SELECT id, year1, year2, year3, year4, year5 FROM costs  where business_plan = '$id'  limit 5 ") ;
				
				   
				   $out = array('financial' => $data) ;
				   echo(json_encode($out)); 
				   
				   exit;	
					
				 }
				 
				
				catch (Exception $e) {
				  print 'Exception : ' . $e->getMessage();
				}
  }
  public function executeLoadstartup(sfWebRequest $request)
  {
     /* We use the Symfony inbuilt method to get connection and retrieve data*/
				try {
				   $id = $request->getParameter('id');
				   //$data = Doctrine_Core::getTable('TaskAssignment')->getInvestmentFinancialDetails($id) ;
				   $db = Doctrine_Manager::getInstance()->getCurrentConnection();
				   ///
				 /* $data =  $db->fetchAssoc("SELECT * FROM task_assignment LEFT JOIN business_plan ON business_plan.investment_id = task_assignment.investmentapp_id LEFT JOIN startupexpenses ON startupexpenses.business_plan = business_plan.id WHERE task_assignment.investmentapp_id = '$id' limit 5 ") ; */
				 $data =  $db->fetchAssoc("SELECT id, year1, year2, year3, year4, year5 FROM startupexpenses  where business_plan = '$id'  limit 5 ") ;
                   				  
				   $out = array('startupexpenses' => $data) ;
				   echo(json_encode($out)); exit;	
					
				 }
				 
				
				catch (Exception $e) {
				  print 'Exception : ' . $e->getMessage();
				}
  }
    public function executeLoadstructure(sfWebRequest $request)
	  {
		 /* We use the Symfony inbuilt method to get connection and retrieve data*/
					try {
					   $id = $request->getParameter('id');
					   //$data = Doctrine_Core::getTable('TaskAssignment')->getInvestmentFinancialDetails($id) ;
					   $db = Doctrine_Manager::getInstance()->getCurrentConnection();
					   ///
					/*  $data =  $db->fetchAssoc("SELECT * FROM task_assignment LEFT JOIN business_plan ON business_plan.investment_id = task_assignment.investmentapp_id LEFT JOIN structurefinancial ON structurefinancial.business_plan = business_plan.id WHERE task_assignment.investmentapp_id = '$id' limit 5 ") ;    */
					   $data =  $db->fetchAssoc("SELECT id, local_source, foreign_source FROM structurefinancial  where business_plan = '$id'  limit 5 ") ;
					   $out = array('structurefinancial' => $data) ;
					   echo(json_encode($out)); exit;	
						
					 }
					 
					
					catch (Exception $e) {
					  print 'Exception : ' . $e->getMessage();
					}
	  }
//
  public function executeLoadlocal(sfWebRequest $request)
	  {
		 /* We use the Symfony inbuilt method to get connection and retrieve data*/
					try {
					   $id = $request->getParameter('id');
					   //$data = Doctrine_Core::getTable('TaskAssignment')->getInvestmentFinancialDetails($id) ;
					   $db = Doctrine_Manager::getInstance()->getCurrentConnection();
					   ///
					  /*$data =  $db->fetchAssoc("SELECT * FROM task_assignment LEFT JOIN business_plan ON business_plan.investment_id = task_assignment.investmentapp_id LEFT JOIN employementlocal ON employementlocal.business_plan = business_plan.id WHERE task_assignment.investmentapp_id = '$id' limit 5 ") ;   */ ///
					   $data =  $db->fetchAssoc("SELECT id, year1, year2, year3, year4, year5 FROM  employementlocal  where business_plan = '$id'  limit 5 ") ;
					   $out = array('localjobs' => $data) ;
					   echo(json_encode($out)); exit;	
						
					 }
					 
					
					catch (Exception $e) {
					  print 'Exception : ' . $e->getMessage();
					}
	  }
///
  public function executeLoadforeign(sfWebRequest $request)
	  {
		 /* We use the Symfony inbuilt method to get connection and retrieve data*/
					try {
					   $id = $request->getParameter('id');
					   //$data = Doctrine_Core::getTable('TaskAssignment')->getInvestmentFinancialDetails($id) ;
					   $db = Doctrine_Manager::getInstance()->getCurrentConnection();
					   ///
					/*  $data =  $db->fetchAssoc("SELECT * FROM task_assignment LEFT JOIN business_plan ON business_plan.investment_id = task_assignment.investmentapp_id LEFT JOIN employementforeign ON employementforeign.business_plan = business_plan.id WHERE task_assignment.investmentapp_id = '$id' limit 5 ") ;   */
//
                        $data =  $db->fetchAssoc("SELECT id, year1, year2, year3, year4, year5 FROM  employementforeign  where business_plan = '$id'  limit 5 ") ;					  
					   $out = array('foreignjobs' => $data) ;
					   echo(json_encode($out)); exit;	
						
					 }
					 
					
					catch (Exception $e) {
					  print 'Exception : ' . $e->getMessage();
					}
	  }	  
/////
  public function executeLoadplanned(sfWebRequest $request)
	  {
		 /* We use the Symfony inbuilt method to get connection and retrieve data*/
					try {
					   $id = $request->getParameter('id');
					   //$data = Doctrine_Core::getTable('TaskAssignment')->getInvestmentFinancialDetails($id) ;
					   $db = Doctrine_Manager::getInstance()->getCurrentConnection();
					   ///
					/*  $data =  $db->fetchAssoc("SELECT * FROM task_assignment LEFT JOIN business_plan ON business_plan.investment_id = task_assignment.investmentapp_id LEFT JOIN plannedperformance ON plannedperformance.business_plan = business_plan.id WHERE task_assignment.investmentapp_id = '$id' limit 5 ") ; 
					*/
                     ///
                     $data =  $db->fetchAssoc("SELECT id, year1, year2, year3, year4, year5 FROM  plannedperformance  where business_plan = '$id'  limit 5 ") ;					 
					   $out = array('plannedperformance' => $data) ;
					   echo(json_encode($out)); exit;	
						
					 }
					 
					
					catch (Exception $e) {
					  print 'Exception : ' . $e->getMessage();
					}
	  }	  
  public function executePayment(sfWebRequest $request)
  {
    /*
	We assume we have access to the Financial Payment system and we retrieve payment done by a particular individual using the business id
	and the receipt id. 
	*/
	$this->forward404Unless($request->isMethod('post')); // we will use a new way of validation here 
	$params = $request->getParameter('number');
	//print $params; exit;
	//we get the parameter and confirm if the number exists
	$this->confirmation = Doctrine_Core::getTable('Payment')->getConfirmPayment($params);
	$serial = null; 
	foreach($this->confirmation as $con)
	{
	 $serial = $con['slip_number'];
	}
	   //if the returned serial is not equal to passed form variable
		if($serial != $params )
		{
		 //not paid

		 $this->redirect('dashboard/notpaid?serial='.$params);
		}
		//else if equal
		if($serial == $params)
		{
		$this->business = $request->getParameter('business');
		//since payment was successful, let informed the user that payment was successful.
		//we only have business name, since it is unique, we can use it to get the Taskid by joining TaskAssignment with InvestmentApplication
		$this->result = Doctrine_Core::getTable('TaskAssignment')->updatingPaymentStatus($this->business);
		$taskId = null;
		foreach($this->result as $r)
		{
		 $taskId = $r['investmentapp_id'] ;
		}
		$this->update = Doctrine_Core::getTable('TaskAssignment')->updateUserTaskStatus3($taskId);
		}
	
  }
  //not paid method
  public function executeNotpaid(sfWebRequest $request)
  {
    
  }
  //Very Important Method. This method is called by the data admin after successful confirmation of payment of 
  //required fee for investment certificate registration.
  public function executeInvestcert(sfWebRequest $request)
  {
    // here we will need to do various tasks
	/*
	 1. Confirm that this business has not been issued with the certificate
	 2. Make Sure that this business actualy exists in our database if not 404 error
	 3. Generate a unique serial number for the certificate that Increments when a new Certificate is Created
	 
	*/
	 $param = $request->getParameter('business'); // now now now, let validate this business. we will reuse this function and retrieve the id
	 $this->result = Doctrine_Core::getTable('TaskAssignment')->updatingPaymentStatus($param);
	 
		$taskId = null;
		foreach($this->result as $r)
		{
		 $taskId = $r['investmentapp_id'] ;
		}
		
		//we will make sure that this business is legit and have paid
	$this->status = Doctrine_Core::getTable('TaskAssignment')->getStatus($taskId);
	 $st = null;
	 
	  foreach($this->status as $v)
	  {
	    $st = $v['work_status'] ;
	  }
	  $x = "paymentconfirmed";
	  $y = "complete" ;
	 ////
	 switch($st)
	 {
	   case $x :
	    $this->scorpionPayment($taskId);
		break;
	   case  $y:
		$this->scorpionComplete($taskId);
		break;
	   default:
         $this->forward404();	   
         	   
	 }
	 exit;
	 
	  
  }
  ///this function will be called inside the switch statement
  public function scorpionPayment($taskId)
  {
      ///if payment is successful, continue
	  //confirm that this business has not been issued with a Certificate
	  //
	 
	  /*Certificate Values
	  */
	  //Incremental Number
	  $start = 1093 ;
	  $newNumber = $start + 1;
	  //We also make sure that the business is not already issued with a certificate if so we just print the existing certificate instead of
	  //saving a new record
	  $q = Doctrine_Core::getTable('InvestmentCertificate')->searchBusiness($taskId);
	  if(count($q) > 0)
	  {
	  //since this business has been issued with certificate, we just print it.
	  //do nothing
	  }
	  if(count($q) <= 0)
	  {
						//this is the first time therefore we save and print the certificate
						//but we want to increment it whenever a new record is inserted. hence we fast make sure that the $start number variable
					  //is not set in the database;
					  $no = null;
					  $query = Doctrine_Core::getTable('InvestmentCertificate')->getLastRow();
					   foreach($query as $q)
					   {
						$no = $q['serial_number'];
					   }
					  if($no != null)
					  {
					   
					   //we first check and make sure that there exist a number, then we increment it by 1
					   //and save it.
						  $cert = new InvestmentCertificate();
						  $cert->business_id = $taskId ;
						  $cert->serial_number = $no + 1 ;
						  $cert->save();
						  //we then update the Status of application i.e. BusinessApplicationStatus
						  //now this is the final step of application for investment certificate. 
						  //we set values
						  $value1 = "certificateissued"; //status
						  $value2 = "You have been issued with Investment Registration Certificate.
       						 Please check your email and download the attached certificate. Thankyou. "; //comment
						  $value3 = 100; //percentage
						  $query1 = Doctrine_Core::getTable('TaskAssignment')->updateBusinessApplicationStatus($taskId,$value1,$value2,$value3);
						  //we also update the status of work for this data admin.
						  $query1 = Doctrine_Core::getTable('TaskAssignment')->updateUserTaskStatus4($taskId);
					  }
					  if($no == null)
					  {
					   $no = $start ;
					   //if this is the first record, then we set default value
					   //and save
						  $cert = new InvestmentCertificate();
						  $cert->business_id = $taskId ;
						  $cert->serial_number = $no + 1 ;
						  $cert->save();
						  //we then update the Status of application i.e. BusinessApplicationStatus
						  //now this is the final step of application for investment certificate. 
						  $value1 = "certificateissued"; //status
						  $value2 = "You have been issued with Investment Registration Certificate.
       						 Please check your email and download the attached certificate. Thankyou. "; //comment
						  $value3 = 100; //percentage
						  $query1 = Doctrine_Core::getTable('TaskAssignment')->updateBusinessApplicationStatus($taskId,$value1,$value2,$value3);
						  //we also update the status of work for this data admin.
						  $query1 = Doctrine_Core::getTable('TaskAssignment')->updateUserTaskStatus4($taskId);
					  }
	 
		
	  }
	  
	  
	  ////Then we get the Applicant details for printing the certificate. we will use the business_id saved in the InvestmentCertificate Table
	  $query = Doctrine_Core::getTable('InvestmentCertificate')->getApplicantDetails($taskId);
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
	  foreach($query as $q)
	  {
	    $date = $q['created_at'] ;
		$year = $q['created_at'] ;
		$company = $q['name'] ;
		$serial = $q['serial_number'] ;
		$rep = $q['name'] ;
		$issuerF = $q['first_name'] ;
		$issuerL = $q['last_name'] ;
		$sector = $q['business_sector'] ;
		$noofjobs = $q['employment_created'] ;
		$invstment = $q['planned_investment'];
		
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
$pdf->SetFont('courier', 'I', 18);

// add a page
$pdf->AddPage();

// start a new XObject Template
$template_id = $pdf->startTemplate(95, 165);

// create Template content
// ...................................................................

$border = array('LRTB' => array('width' => 0.1, 'cap' => 'square', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
 $img_file = K_PATH_IMAGES.'bg.jpg';
 
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
                                         <img src="../plugins/sfTCPDFPlugin/lib/tcpdf/images/rdblogo.jpg" alt="RDB" width="600" height="200" border="0" />
										 <h1 style="font-size: medium; color: #3C7E98">Investment Registration Certificate</h1>
										 <p style= "font-size: xx-small;text-align:left ">
										  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; No: <b>C/'.$serial.'/'.$year.'</b>
										   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   Date: <b>'.$day.'</b>
										 </p>
										 <p style= "font-size: xx-small;text-align:left ">
										&nbsp;&nbsp;&nbsp;Issued To <b>'.$company.'</b> Represented by <b>'.$rep.'</b>
										 </p>
										 <p style= "font-size: xx-small;text-align:left ">
										  &nbsp;Business Sector <b>'.$sector.' </b>
										 </p>
										  
										  <p style= "font-size: xx-small;text-align:left ">
										  &nbsp;Planned investment amount <b>'.$invstment.'</b>
										  </p>
										  <p style= "font-size: xx-small;text-align:left ">
										  &nbsp;Total Number of jobs planned <b>'.$noofjobs.'</b>
										  </p>
										 <p style= "font-size: xx-small;text-align:left ">
										  &nbsp;Local jobs  <b>'.$noofjobs.'</b> Jobs For expatriates <b>'.$expjobs.'</b>
										 </p>
										  <p style= "font-size: xx-small;text-align:left ">
										  &nbsp;This Certificate has been issued to <b>'.$company.'</b> under the seal of <br/>
										  &nbsp;&nbsp;&nbsp;RDB in accordance with law no 26/2005 EAC customs management act atests that <br/> &nbsp;&nbsp;&nbsp;the company is duly 
										  registered and entitled to the rights and obligations <br/> &nbsp;&nbsp;&nbsp;contained in the law.
										  </p>
										  <p style= "font-size: xx-small;text-align:left ">
										  &nbsp;&nbsp;THE CHIEF EXECUTIVE OFFICER, 
										  &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;COMPANY REPRESENTATIVE,
										  <br/>
										   &nbsp;&nbsp;&nbsp;&nbsp;RDB,
										   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
//$pdf->Output('certificate.pdf', 'I');
$pdf->Output(sfConfig::get('sf_web_dir').'\uploads\documents\certificate.pdf','F'); //save
	 
	 //we will output the file and send it to the Investors email address. Get the email address of the investor
	 $userEmail = null;
	 $email = Doctrine_Core::getTable('InvestmentCertificate')->getInvestorEmail($taskId);
	 //get email
	 foreach($email as $em)
	 {
	    $userEmail = $em['email_address'] ;
	 }
	 //
	   /*$target_path = "uploads/documents/certificate.pdf";
	
			 
	    $message = Swift_Message::newInstance()
			  ->setFrom('admin@rdb.com')
			  ->setTo($userEmail)
			  ->setSubject('Investment Certificate')
			  ->setBody('You have been issued with Investment Registration Certificate. Please download it. Thankyou')
			   ->attach(Swift_Attachment::fromPath($target_path));
			 // $file =  sfConfig::get('sf_web_dir')/beibora/web/uploads/companies/;
			 

			$this->getMailer()->send($message); */
			$this->getMailer()->composeAndSend('noreply@rdb.com',
										$userEmail ,
										'Investment Registration Certificate ',
										"Congratulations! You Have been Issued with The Investment Registration Certificate. \n
										You are advised to come and collect it at our Offices at Rwanda Development Board (RDB). Thankyou and
										welcome."
													  ); 
	 /////////////////////////////////////////////
	 //
	
	///////////////////////////////End Certificate Configuration ///////////////////////////////////////////
          // Stop symfony process */
          throw new sfStopException();
  }
  ///
  public function scorpionComplete($taskId)
  {
     //We also make sure that the business is not already issued with a certificate if so we just print the existing certificate instead of
	  //saving a new record
 
	  ////Then we get the Applicant details for printing the certificate. we will use the business_id saved in the InvestmentCertificate Table
	  $query = Doctrine_Core::getTable('InvestmentCertificate')->getApplicantDetails($taskId);
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
	  foreach($query as $q)
	  {
	    $date = $q['created_at'] ;
		$year = $q['created_at'] ;
		$company = $q['name'] ;
		$serial = $q['serial_number'] ;
		$rep = $q['name'] ;
		$issuerF = $q['first_name'] ;
		$issuerL = $q['last_name'] ;
		$sector = $q['business_sector'] ;
		$noofjobs = $q['employment_created'] ;
		$invstment = $q['planned_investment'];
		
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
$pdf->SetFont('courier', 'I', 18);

// add a page
$pdf->AddPage();

// start a new XObject Template
$template_id = $pdf->startTemplate(95, 165);

// create Template content
// ...................................................................

$border = array('LRTB' => array('width' => 0.1, 'cap' => 'square', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
 $img_file = K_PATH_IMAGES.'cert6.jpg';
 
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
                                         <img src="../plugins/sfTCPDFPlugin/lib/tcpdf/images/rdblogo.jpg" alt="RDB" width="600" height="200" border="0" />
										 <h1 style="font-size: medium; color: #3C7E98">Investment Registration Certificate</h1>
										 <p style= "font-size: xx-small;text-align:left ">
										  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; No: <b>C/'.$serial.'/'.$year.'</b>
										   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   Date: <b>'.$day.'</b>
										 </p>
										 <p style= "font-size: xx-small;text-align:left ">
										&nbsp;&nbsp;&nbsp;Issued To <b>'.$company.'</b> Represented by <b>'.$rep.'</b>
										 </p>
										 <p style= "font-size: xx-small;text-align:left ">
										  &nbsp;Business Sector <b>'.$sector.' </b>
										 </p>
										  
										  <p style= "font-size: xx-small;text-align:left ">
										  &nbsp;Planned investment amount <b>'.$invstment.'</b>
										  </p>
										  <p style= "font-size: xx-small;text-align:left ">
										  &nbsp;Total Number of jobs planned <b>'.$noofjobs.'</b>
										  </p>
										 <p style= "font-size: xx-small;text-align:left ">
										  &nbsp;Local jobs  <b>'.$noofjobs.'</b> Jobs For expatriates <b>'.$expjobs.'</b>
										 </p>
										  <p style= "font-size: xx-small;text-align:left ">
										  &nbsp;This Certificate has been issued to <b>'.$company.'</b> under the seal of <br/>
										  &nbsp;&nbsp;&nbsp;RDB in accordance with law no 26/2005 EAC customs management act atests that <br/> &nbsp;&nbsp;&nbsp;the company is duly 
										  registered and entitled to the rights and obligations <br/> &nbsp;&nbsp;&nbsp;contained in the law.
										  </p>
										  <p style= "font-size: xx-small;text-align:left ">
										  &nbsp;&nbsp;THE CHIEF EXECUTIVE OFFICER, 
										  &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;COMPANY REPRESENTATIVE,
										  <br/>
										   &nbsp;&nbsp;&nbsp;&nbsp;RDB,
										   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
    $pdf->Output('certificate.pdf', 'I'); // output 
	 /////////////////////////////////////////////////////////
	 ////////////

	
	///////////////////////////////End Certificate Configuration ///////////////////////////////////////////
          // Stop symfony process */
          throw new sfStopException();
  }
  //method to print an investor business proposal summary
   public function executeProposal(sfWebRequest $request)
	{
	   
	   $this->value = $request->getParameter('id'); // here we get the parameter 
	
		/*Since we have the id of the business, we now retrieve all details for this application for investment certificate from
		the three tables. InvestmentApplication, BusinessPlan and TaskAssignment*/
		$details = Doctrine_Core::getTable('TaskAssignment')->getApplicationDetails($this->value);
		//select Investment and financing schedule &Capital cost Details
		$investment_financial = Doctrine_Core::getTable('TaskAssignment')->getInvestmentFinancialDetails($this->value);
		$this->forward404Unless($details);
		///////////////////////Now we get the user current details //////////////////////////////
		//get the business application information
	    foreach($details as $data)
		 {
		  $id = $data['id'];
		  $name = $data['name']; 
		  $project_brief = $data['project_brief'];
		  $business_name = $data['name'];
		  $business_nature = $data['business_sector'];
		  $business_category = $data['business_category'];
		  $office_telephone = $data['office_telephone'];
		  $fax = $data['fax'];
		  $post_box = $data['post_box'];
		  $location = $data['location'];
		  $sector = $data['sector'];
		  $district = $data['district'];
		  $city_province = $data['city_province'];
		  $exemption_on_machinery = $data['exemption_on_machinery'];
		  //Variables for the table land costs
		  
		 }
		 /////
		 $applicantId = Doctrine_Core::getTable('TaskAssignment')->getApplicantId($request->getParameter('id')) ;
											   
			   ///
			   $applicant_details = Doctrine_Core::getTable('TaskAssignment')->getApplicantInformation($applicantId);
			   /// variables
			   $first_name = null;
			   $last_name = null;
			   $salutation = null;
			   $phone_number = null;
			   $citizenship = null;
			   $surname = null ;
			   $id_passport = null ;
			   $email_address = null ;
				foreach($applicant_details as $d)
				{
				   $first_name = $d['first_name'] ;
				   $last_name = $d['last_name'] ;
				   $salutation = $d['salutation'] ;
				   $phone_number = $d['phone_number'] ;
				   $citizenship = $d['citizenship'] ;
				   $surname = $d['surname'] ;
				   $id_passport = $d['id_passport'] ;
				   $email_address = $d['email_address'] ;
				}
											   
		 ///
		 //set variables here
	  //  personal details
		$brief_title = $this->getContext()->getI18N()->__('PROJECT BRIEF');
		$brief_part1 = $this->getContext()->getI18N()->__('This is the business proposal for:');
		$brief_part2 = $this->getContext()->getI18N()->__('Please Read it Carefully before generating report.');
		$personal_details_title = $this->getContext()->getI18N()->__('APPLICANT PERSONAL DETAILS');
		$names_title = $this->getContext()->getI18N()->__('APPLICANT FULL NAMES:');
		$company_title = $this->getContext()->getI18N()->__('TITLE IN THE COMPANY:');
		$citizenship_title = $this->getContext()->getI18N()->__('CITIZENSHIP:');
		$telephone_title = $this->getContext()->getI18N()->__('TELEPHONE:');
		$fax_title = $this->getContext()->getI18N()->__('FAX:');
		$email_title = $this->getContext()->getI18N()->__('PERSONAL E-MAIL:');
		//company details
		$company_details_title = $this->getContext()->getI18N()->__('COMPANY DETAILS:');
		$business_title = $this->getContext()->getI18N()->__('BUSINESS NAME:');
		$business_sector_title = $this->getContext()->getI18N()->__('NATURE OF BUSINESS/SECTOR:');
		$business_category_title = $this->getContext()->getI18N()->__('BUSINESS CATEGORY:');
		$business_telephone_title = $this->getContext()->getI18N()->__('TELEPHONE (mobile):');
		$business_fax_title = $this->getContext()->getI18N()->__('FAX:');
		$business_box_title = $this->getContext()->getI18N()->__('P.O BOX:');
		$business_location_title = $this->getContext()->getI18N()->__('LOCATION:');
		//$business_sector_title = $this->getContext()->getI18N()->__('SECTOR:');
		$business_district_title = $this->getContext()->getI18N()->__('DISTRICT:');
		$business_province_title = $this->getContext()->getI18N()->__('CITY/PROVINCE:');
	    //financial_costs
        $financial_costs_title = $this->getContext()->getI18N()->__('INVESTMENT AND FINANCING SCHEDULE & CAPITAL COST:');
		// echo $project_brief ; exit;
		$config = sfTCPDFPluginConfigHandler::loadConfig();
    
    // pdf object
    $pdf = new sfTCPDF();

    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('E-Portal');
    $pdf->SetTitle('Business Proposal');
    $pdf->SetSubject('Business Proposal for business name');
    //$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING);

    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    //set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    //set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    //set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    // ---------------------------------------------------------

    // set default font subsetting mode
    $pdf->setFontSubsetting(true);

    // Set font
    // dejavusans is a UTF-8 Unicode font, if you only need to
    // print standard ASCII chars, you can use core fonts like
    // helvetica or times to reduce file size.
    $pdf->SetFont('times', '', 10, '', true);

    // Add a page
    // This method has several options, check the source code documentation for more information.
    $pdf->AddPage();
      
    // Set some content to print
	
	
	///////
    
        // output some RTL HTML content
			$html = '<div style="text-align:center"><u> '.$brief_part1.''.$name.''.$brief_part2.' </u> <br/> </div>';
			$pdf->writeHTML($html, true, false, true, false, '');

			// test some inline CSS
			$html = '<p> '.$brief_title.': <br/>
			'.$project_brief.' <br/><br/>
			</p>';

			$pdf->writeHTML($html, true, false, true, false, '');
			///
			$html = '<h4> '.$personal_details_title.': <h4/>
			</p>';
			$pdf->writeHTML($html, true, false, true, false, '');
			//
			$html = '<ul class="item-list scroller padding" data-height="307" data-always-visible="1">
			    <li>
				
				<span>'.$names_title.' </span>
				<span> '.$first_name. ' '.$last_name.' </span>
				</li>
				<li>
				
				<span>'.$company_title.' </span>
				<span></span>  
				
				</li>
				<li>
				
				
				<span>'.$citizenship_title.' </span>
			    <span>'.$citizenship.'</span>

				</li>
				<li>
                 
				<span>'.$telephone_title.' </span>
			    <span>'.$phone_number.'</span>

				</li>
				<li>
                   
				   <span>'.$fax_title.' </span>
			       <span>'.$fax.'</span>

				</li>
				<li> 
				   
				   <span>'.$email_title.' </span>
			       <span>'.$email_address.'</span>
                 				
				</li>
			</ul> <br/> <br/>';

			$pdf->writeHTML($html, true, false, true, false, '');
			////
			$html = '<h4> '.$company_details_title.': <h4/>
			</p>';
			$pdf->writeHTML($html, true, false, true, false, '');
			$html = '<ul class="item-list scroller padding" data-height="307" data-always-visible="1">
			    <li>
				
				<span>'.$business_title.' </span>
				<span> '.$business_name.' </span>
				</li>
				<li>
				
				<span>'.$business_sector_title.' </span>
				<span>'.$business_nature.'</span>  
				
				</li>
				<li>
				
				
				<span>'.$business_category_title.' </span>
			    <span>'.$business_category.'</span>

				</li>
				<li>
                  
				<span>'.$business_telephone_title.' </span>
			    <span>'.$office_telephone.'</span>

				</li>
				<li>
                   
				   <span>'.$business_fax_title.' </span>
			       <span>'.$fax.'</span>

				</li>
				<li> 
				   
				   <span>'.$business_box_title.' </span>
			       <span>'.$post_box.'</span>
                 				
				</li>
				<li> 
				   
				   <span>'.$business_location_title.' </span>
			       <span>'.$location.'</span>
                 				
				</li>
				<li> 
				   <span><i class="icon-globe"></i></span>
				   <span>'.$email_title.' </span>
			       <span>'.$office_telephone.'</span>
                 				
				</li>
				
				<li> 
				  
				   <span>'.$business_box_title.' </span>
			       <span>'.$office_telephone.'</span>
                 				
				</li>
				<li> 
				   <span><i class="icon-globe"></i></span>
				   <span>'.$business_location_title.' </span>
			       <span>'.$office_telephone.'</span>
                 				
				</li>
				<li> 
				   <span><i class="icon-globe"></i></span>
				   <span>'.$business_location_title.' </span>
			       <span>'.$office_telephone.'</span>
                 				
				</li>
				<li> 
				   
				   <span>'.$business_sector_title.' </span>
			       <span>'.$sector.'</span>
                 				
				</li>
				<li> 
				   
				   <span>'.$business_district_title.' </span>
			       <span>'.$district.'</span>
                 				
				</li>
				<li> 
				  
				   <span>'.$business_province_title.' </span>
			       <span>'.$city_province.'</span>
                 				
				</li>
			</ul> <br/> <br/>';

			$pdf->writeHTML($html, true, false, true, false, '');
			////
			$html = '<h4> '.$financial_costs_title.': <h4/>
			</p>';
			$pdf->writeHTML($html, true, false, true, false, '');
			//Table Financial Schedule and Investment
			     $id = $request->getParameter('id');
				   //$data = Doctrine_Core::getTable('TaskAssignment')->getInvestmentFinancialDetails($id) ;
				   $db = Doctrine_Manager::getInstance()->getCurrentConnection();
				   ///we will have to echo 1 row at a time. then we will look for a better solution for this task
				  $financial_row1 =  $db->fetchAssoc("SELECT * FROM task_assignment LEFT JOIN business_plan ON business_plan.investment_id = task_assignment.investmentapp_id LEFT JOIN costs ON costs.business_plan = business_plan.id WHERE task_assignment.investmentapp_id = '$id' limit 1 ") ; 
				
			  $head = '
			<table style="background-color:#fff;">
			  <thead>
				<tr style="background-color:#000;color:#fff;">
				  <th>Fixed Assets</th>
				  <th>Year1</th>
				  <th>Year2</th>
				  <th>Year3</th>
				  <th>Year4</th>
				  <th>Year5</th>
				</tr>
			  </thead>
			  ';
	     $body = '';
		 $assets = array("Land","Construction", "Plant/Machinery", "Furniture","Others") ;
		 $item = null;
		 foreach($assets as $v)
		   {
		   
			 
		   }
          	   foreach ($financial_row1 as $q){
		        $value = "Land" ;
			    $body .= '
				  <tr bgcolor="#cccccc">
					<td>'.$value .'</td>
					<td>'.$q['year1'].'</td>
					<td>'.$q['year2'].'</td>
					<td>'.$q['year3'].'</td>
					<td>'.$q['year4'].'</td>
					<td>'.$q['year5'].'</td>
				  </tr>
				  ';	}  
		       ///
			   foreach ($financial_row2 as $q){
		        $value = "Construction" ;
			    $body .= '
				  <tr bgcolor="#cccccc">
					<td>'.$value .'</td>
					<td>'.$q['year1'].'</td>
					<td>'.$q['year2'].'</td>
					<td>'.$q['year3'].'</td>
					<td>'.$q['year4'].'</td>
					<td>'.$q['year5'].'</td>
				  </tr>
				  ';	} 
		 
 		$tail = '</table>'; 
		$pdf->writeHTML($head.$body.$tail, true, false, true, false, '');
			//end table
			
			
			
		ob_end_clean();
		$pdf->Output('business_proposal.pdf', 'I');
		throw new sfStopException();	
		 /////////////////////////////////////////////////
		 
  }
  
	public function executeAssessmentDecision(sfWebRequest $request)
	{
		$decision = new EIAAssessmentDecision();
		$decision->taskassignment_id= $request->getParameter('id');
		$decision->save();
		$accessments=Doctrine_Core::getTable('EIAAssessmentDecision')->findByTaskassignmentId($request->getParameter('id'));
		
		$this->redirect('eiaAssessmentDecision/edit?id='.$accessments[0]['id']);
	
	}
  
}


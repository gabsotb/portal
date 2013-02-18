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
   
   $this->unassigned= Doctrine_Core::getTable('EIApplication')->getApplications('Submitted');
   //we need to call a function that we get the status of task assigned to the user logged in.
   //if the user has started and generate a report, the user cannot make a new report again. wen he/she logins in 
   //next time, they will be redirected to the page of accepting application of the investor. we will hide the process button and replace it with
   //show report button
   //so lets create a function that retrieves the status of application after a user has clicked make report. 
   	
  } 
    //function download letter of application
  public function executeDownload1(sfwebRequest $request)
  {
   //echo "value is" .$request->getParameter('investmentapp_id'); exit;
    $blog_user = Doctrine_Core::getTable('InvestmentApplication')->find($request->getParameter('id'));
    $this->forward404Unless($blog_user);

    header('content-type:');
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($blog_user->getApplicationLetter()));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . filesize($blog_user->getApplicationLetter()));
    ob_clean();
    flush();

    readfile($blog_user->getApplicationLetter());

    return sfView::NONE;
  }
  //function for start work
  public function executeStart(sfWebRequest $request)
  {
    
	$this->value = $request->getParameter('id'); // here we get the parameter 
	
	/*Since we have the id of the business, we now retrieve all details for this application for investment certificate from
	the three tables. InvestmentApplication, BusinessPlan and TaskAssignment*/
	$this->details = Doctrine_Core::getTable('TaskAssignment')->getApplicationDetails($this->value);
	$this->forward404Unless($this->details);
	
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
	  if($st !="paymentconfirmed")
	  {
	   $this->forward404();
	  }
	  ///if payment is successful, continue
	  //confirm that this business has not been issued with a Certificate
	  //
	 /* $cert = new InvestmentCertificate();
	  $cert->business_id = $taskId ;
	  $cert->serial_number = 563646;
	  $cert->save();
	  print "Maybe successful"; exit; */
	  ////////////////////////////////////////////////////////////////////////////
	  //execute action for printing pdf document of this report
	  $config = sfTCPDFPluginConfigHandler::loadConfig();
          sfTCPDFPluginConfigHandler::includeLangFile($this->getUser()->getCulture());

          $doc_title    = "RDB - Appliaction For Investment Certificates";
          $doc_subject  = "Investment Certificate";
          $doc_keywords = "RDB";
          $htmlcontent  = "&lt; &euro; €אטילעש &copy; &gt;<br />
		<p>
		 
		
		</p>";

          //create new PDF document (document units are set by default to millimeters)
          $pdf = new sfTCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true);

          // set document information
          $pdf->SetCreator(PDF_CREATOR);
          $pdf->SetAuthor(PDF_AUTHOR);
          $pdf->SetTitle($doc_title);
          $pdf->SetSubject($doc_subject);
          $pdf->SetKeywords($doc_keywords);

          $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

          //set margins
          $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

          //set auto page breaks
          $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
          $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
          $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
          $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO); //set image scale factor

          $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
          $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

          //initialize document
          $pdf->AliasNbPages();
          $pdf->AddPage();
         

          // add page header/footer
          $pdf->setPrintHeader(true);
          $pdf->setPrintFooter(true);

         // Set some content to print
$html = <<<EOD
                                          <center><b>Investment Registration Certificate</b></center>
EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
       $pdf->Output('certificate.pdf', 'I');
    /*We need to change the status of application to accepted for the user and and inform him to make payment of 500USD and also send him this pdf letter
	as a message and an attachment 
	We also change the status of Task to accepted and show a button for confirming payment. wen the user clicks on it, the system checks
	if the serial number of receipt is valid and automaticaly generates a certificate if successful other shows an error. The send a message
	to the client with the cert.  Demm!! This code is complex he he hehe he !!!
	
	
          // Stop symfony process */
          throw new sfStopException();
	  ///////////////////////////////////////////////////////////////////////////
  }
}

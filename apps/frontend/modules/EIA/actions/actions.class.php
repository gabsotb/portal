<?php

/**
 * eia actions.
 *
 * @package    rdbeportal
 * @subpackage eia
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class eiaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
	//$userId = sfContext::getInstance()->getUser()->getGuardUser()->getId();
    //$this->ei_applications = Doctrine_Core::getTable('EIApplication')
     // ->createQuery('a')
	  //->andWhere('a.created_by = ?',$userId)
      //->execute();
	  $this->status=Doctrine_Core::getTable('EIApplication')->getStatus();
	  $this->torStatus=Doctrine_Core::getTable('TorStatus')->getStatus();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new EIApplicationForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new EIApplicationForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($ei_application = Doctrine_Core::getTable('EIApplication')->find(array($request->getParameter('id'))), sprintf('Object ei_application does not exist (%s).', $request->getParameter('id')));
    $this->form = new EIApplicationForm($ei_application);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($ei_application = Doctrine_Core::getTable('EIApplication')->find(array($request->getParameter('id'))), sprintf('Object ei_application does not exist (%s).', $request->getParameter('id')));
    $this->form = new EIApplicationForm($ei_application);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($ei_application = Doctrine_Core::getTable('EIApplication')->find(array($request->getParameter('id'))), sprintf('Object ei_application does not exist (%s).', $request->getParameter('id')));
    $ei_application->delete();

    $this->redirect('eia/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $ei_application = $form->save();

      $this->redirect('@homepage');
    }
  }
  //This action is called when the data admins decides to accept this application
  public function executeClearance(sfWebRequest $request)
  {
    //we will validate this business and make sure that it is valid
	// $this->validate = Doctrine_Core::getTable('InvestmentApplication')->find(array($request->getParameter('id')));
	 //now let us call a method to retrieve information about this investor
	// $query = Doctrine_Core::getTable('InvestmentApplication')->getApplicantDetails($request->getParameter('id'));
	// print_r($query); exit;
	 $company = "default" ;
	 $fname = "default";
	 $lname = "default";
	 $address = "default";
	 $date  = date('l jS  F Y');
	 $userF = sfContext::getInstance()->getUser()->getGuardUser()->getFirstName();
	 $userL = sfContext::getInstance()->getUser()->getGuardUser()->getLastName();
	 //loop through the result returned
	/* foreach($query as $q)
	 {
	  $company = $q['name'];
	  $fname = $q['first_name'];
	  $lname = $q['last_name'];
	  $address = $q['location'];
	 } 
     $this->forward404Unless($this->validate); */
	 ///we get email address of the applicant
	  //we will output the file and send it to the Investors email address. Get the email address of the investor
	 $userEmail = null;
	 $email = Doctrine_Core::getTable('InvestmentCertificate')->getInvestorEmail($request->getParameter('id'));
	 //get email
	 foreach($email as $em)
	 {
	    $userEmail = $em['email_address'] ;
	 }
	 
   //execute action for printing pdf document of this report
	  $config = sfTCPDFPluginConfigHandler::loadConfig();
          sfTCPDFPluginConfigHandler::includeLangFile($this->getUser()->getCulture());

          $doc_title    = "RDB - Appliaction For Investment Certificates";
          $doc_subject  = "Letter Of Acceptance";
          $doc_keywords = "test keywords";
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
   <i>Mr/Ms $fname $lname </i> <br/>
   <i>$company</i><br/>
   <i>$address</i><br/>
   <i>Date: $date </i>
   
<h2>RE: Clearence Letter</h2>
<p>This is a sample clearence letter.</p>

<p><b>Yours Sincerely:</b><br/>
   <i> $userF $userL</i> <br/>
   <i>RDB EIA Certificate Officer</i>

<p>
EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
       //$pdf->Output('letterofacceptance.pdf', 'I');
    /*We need to change the status of application to accepted for the user and and inform him to make payment of 500USD and also send him this pdf letter
	as a message and an attachment 
	We also change the status of Task to accepted and show a button for confirming payment. wen the user clicks on it, the system checks
	if the serial number of receipt is valid and automaticaly generates a certificate if successful other shows an error. The send a message
	to the client with the cert.  Demm!! This code is complex he he hehe he !!!
	
	*/
	//save pdf
	/*
	$pdf->Output(sfConfig::get('sf_web_dir').'\uploads\documents\letter.pdf','F');
	$target_path = "uploads/documents/letter.pdf";
	   
			 
	    $message = Swift_Message::newInstance()
			  ->setFrom('admin@rdb.com')
			  ->setTo($userEmail)
			  ->setSubject('Application For Investment Certifcate')
			  ->setBody('We are pleased to inform you that your companys application 
			  for investment registration was approved by RDB. Please See attached letter. Thankyou')
			   ->attach(Swift_Attachment::fromPath($target_path));
			 // $file =  sfConfig::get('sf_web_dir')/beibora/web/uploads/companies/;
			 

			$this->getMailer()->send($message);
			//after sending email, we also need to change the status of this business application. 
			$this->updatestatus = Doctrine_Core::getTable('TaskAssignment')->updateUserTaskStatus2($this->validate);
	       $this->redirect('dashboard/index'); */
		   $pdf->Output('clearenceLetter.pdf', 'I');
          // Stop symfony process
          throw new sfStopException();
		  
  }
}

<?php

/**
 * eiacertificates actions.
 *
 * @package    rdbeportal
 * @subpackage eiacertificates
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class eiacertificatesActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->eia_certificates = Doctrine_Core::getTable('EIACertificate')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->eia_certificate = Doctrine_Core::getTable('EIACertificate')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->eia_certificate);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new EIACertificateForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new EIACertificateForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($eia_certificate = Doctrine_Core::getTable('EIACertificate')->find(array($request->getParameter('id'))), sprintf('Object eia_certificate does not exist (%s).', $request->getParameter('id')));
    $this->form = new EIACertificateForm($eia_certificate);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($eia_certificate = Doctrine_Core::getTable('EIACertificate')->find(array($request->getParameter('id'))), sprintf('Object eia_certificate does not exist (%s).', $request->getParameter('id')));
    $this->form = new EIACertificateForm($eia_certificate);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($eia_certificate = Doctrine_Core::getTable('EIACertificate')->find(array($request->getParameter('id'))), sprintf('Object eia_certificate does not exist (%s).', $request->getParameter('id')));
    $eia_certificate->delete();

    $this->redirect('eiacertificates/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $eia_certificate = $form->save();

      $this->redirect('eiacertificates/edit?id='.$eia_certificate->getId());
    }
  }
  //
  public function executeIssue(sfWebRequest $request)
  {
    ///if payment is successful, continue
	  //confirm that this business has not been issued with a Certificate
	  //
	 
	  /*Certificate Values
	  */
	  //Incremental Number */
	  $start = 1 ;
	  $newNumber = $start + 1;
	  //We also make sure that the business is not already issued with a certificate if so we just print the existing certificate instead of
	  //saving a new record
	  $q = Doctrine_Core::getTable('EIACertificate')->findByEireportId($request->getParameter('id'));
	  if(count($q) != 0)
	  {
	  //since this business has been issued with certificate, we just print it.
	  //do nothing
	  }
	  if(count($q) == 0)
	  {
						//this is the first time therefore we save and print the certificate
						//but we want to increment it whenever a new record is inserted. hence we fast make sure that the $start number variable
					  //is not set in the database;
					  $no = null;
					  $query = Doctrine_Core::getTable('EIACertificate')->getLastRow();
					   foreach($query as $q)
					   {
						$no = $q['serial_number'];
					   }
					  if($no != null)
					  {
					   
					   //we first check and make sure that there exist a number, then we increment it by 1
					   //and save it.
						  $cert = new EIACertificate();
						  $cert->eireport_id = $request->getParameter('id') ;
						  $cert->serial_number = $no + 1 ;
						  $cert->save();
						  //we then update the Status of application i.e. BusinessApplicationStatus
						  //now this is the final step of application for investment certificate. 
						  //we set values
						 /* $value1 = "certificateissued"; //status
						  $value2 = "You have been issued with Environmental Impact Assessment Certificate.
       						 Please check your email and download the attached certificate. Thankyou. "; //comment
						  $value3 = 100; //percentage
						  $query1 = Doctrine_Core::getTable('TaskAssignment')->updateBusinessApplicationStatus($taskId,$value1,$value2,$value3);
						  //we also update the status of work for this data admin.
						  $query1 = Doctrine_Core::getTable('TaskAssignment')->updateUserTaskStatus4($taskId);*/
						  $eiaproject_id=Doctrine_Core::getTable('EIReport')->find($request->getParameter('id'))->getEiaprojectId();
						  Doctrine_Core::getTable('EIApplicationStatus')->updateStatus($eiaproject_id,'certificate');
						  Doctrine_Core::getTable('EIApplicationStatus')->updateComment($eiaproject_id,'Certificate issued');
						  Doctrine_Core::getTable('EIApplicationStatus')->updatePercentage($eiaproject_id,100);
						  $task_id=Doctrine_Core::getTable('EITaskAssignment')->findByEiaprojectId($eiaproject_id);
						  Doctrine_Core::getTable('EITaskAssignment')->find($task_id[0]['id'])->setWorkStatus('complete')->setStage('certificate')->save();
					  }
						if($no == null)
					  {
					   $no = $start ;
					   //if this is the first record, then we set default value
					   //and save
						  $cert = new EIACertificate();
						  $cert->eireport_id = $request->getParameter('id') ;
						  $cert->serial_number = $no + 1 ;
						  $cert->save();
						  //we then update the Status of application i.e. BusinessApplicationStatus
						  //now this is the final step of application for investment certificate. 
						  /*$value1 = "certificateissued"; //status
						  $value2 = "You have been issued with Investment Registration Certificate.
       						 Please check your email and download the attached certificate. Thankyou. "; //comment
						  $value3 = 100; //percentage
						  $query1 = Doctrine_Core::getTable('TaskAssignment')->updateBusinessApplicationStatus($taskId,$value1,$value2,$value3);
						  //we also update the status of work for this data admin.
						  $query1 = Doctrine_Core::getTable('TaskAssignment')->updateUserTaskStatus4($taskId);*/
						  $eiaproject_id=Doctrine_Core::getTable('EIReport')->find($request->getParameter('id'))->getEiaprojectId();
						  Doctrine_Core::getTable('EIApplicationStatus')->updateStatus($eiaproject_id,'certificate');
						  Doctrine_Core::getTable('EIApplicationStatus')->updateComment($eiaproject_id,'Certificate issued');
						  Doctrine_Core::getTable('EIApplicationStatus')->updatePercentage($eiaproject_id,100);
						  $task_id=Doctrine_Core::getTable('EITaskAssignment')->findByEiaprojectId($eiaproject_id);
						  Doctrine_Core::getTable('EITaskAssignment')->find($task_id[0]['id'])->setWorkStatus('complete')->setStage('certificate')->save();
					  }
	 
		
	  }
	  
	  
	  ////Then we get the Applicant details for printing the certificate. we will use the business_id saved in the InvestmentCertificate Table
	  /*$query =*/ $report= Doctrine_Core::getTable('EIReport')->find($request->getParameter('id'));
	  $projectDetail=Doctrine_Core::getTable('EIAProjectDetail')->find($report->getEiaprojectId());
	  $developer=Doctrine_Core::getTable('EIAProjectDeveloper')->findByEiaprojectId($report->getEiaprojectId());
		$project_title=$projectDetail->getProjectTitle();
		$plot_number=$projectDetail->getProjectPlotNumber();
		$cell=$projectDetail->getCell();
		$sector=$projectDetail->getSector();
		$district=$projectDetail->getDistrict();
		$province=$projectDetail->getProvince();
		$developer_name=$developer[0]['developer_name'];
		$contact_person=$developer[0]['contact_person'];
		$month=$projectDetail->getDateTimeObject('created_at')->format('m');
		$year=$projectDetail->getDateTimeObject('created_at')->format('Y');
		$cert=Doctrine_Core::getTable('EIACertificate')->findByEireportId($report->getEiaprojectId());
		$serial=$cert[0]['serial_number'];
		$refernce_no=str_replace("-","/",$projectDetail->getProjectReferenceNumber());
	  //loop over the result and set necessary variables
	/*  $date = null ;
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
	 // $applicant_name = null ;
	 /* foreach($query as $q)
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
		
	  }
	   $d = new DateTime($date);
	   $day = $d->format('d-m-Y');
	   ///
	   $y = new DateTime($year);
	   $year =  $y->format('Y'); */
	  
	 // $serial = "C/$number/$year";
	  
	  ////////////////////////////////////////////////////////////////////////////
	
	  ////////////////////////////////////////////////////////////////////////////
	  //execute action for printing pdf document of this report
	   /*I have used another class specifically for investment Certificates only */
	      $config = sfTCPDFPluginConfigHandlerInvstCert::loadConfig('invst_configs');
          sfTCPDFPluginConfigHandlerInvstCert::includeLangFile($this->getUser()->getCulture());
	///////////////////////////Certificate Configuration //////////////////////////////////////////////////////////////////////	  
//create new PDF document (document units are set by default to millimeters)
          $pdf = new sfTCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true);
     
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
$pdf->SetFont('courier', '', 18);

// add a page
$pdf->AddPage();

// start a new XObject Template
$template_id = $pdf->startTemplate(95, 165);

// create Template content
// ...................................................................

$border = array('LRTB' => array('width' => 0.1, 'cap' => 'square', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
 $img_file = K_PATH_IMAGES.'eia_CERT.jpg';
 
$pdf->Image($img_file, 0, 0, 50, 50, 'JPG', '', '', false, 1000, '', false, false, $border, false, false, false);
 
 
//Image Calling inside the html has a problem hence we hand code it but we will change it later - Boniface Irunguh
// ...................................................................

// end the current Template
$pdf->endTemplate();

// print the selected Template various times
$pdf->printTemplate($template_id, 0, 0, 550, 710, '', '', false);

// ---------------------------------------------------------
 // Set some content to print
$html = '                               <div>
                                         <br/><br/><br/>
										 <p style= "font-size: xx-small;text-align:left ">
										  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Certificate No: <b>EC/'.$serial.'/'.$month.'/'.$year.'</b>
										   &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   Ref: <b>'.$refernce_no.' </b>
										 </p>
										  <p style= "font-size: xx-small;text-align:left ">
										  &nbsp;This is to certify that an EIA related to ...'.$developer_name.'s &nbsp;&nbsp;&nbsp;project entitled ....<b>'.$project_title.'</b>......... represented by  ......<b>'.$contact_person.'</b>..................
										  <br/> &nbsp;&nbsp;&nbsp;has been approved.This project is to be located on plot number ...<b>'.$plot_number.'</b>........ in Cell <br/>&nbsp;&nbsp;&nbsp;.....<b>'.$sector.'</b>Sector<b>'.$district.'</b>District<b>'.$province.'</b>Province.
										  </p>
										  <p style= "font-size: xx-small;text-align:left ">
										   &nbsp;This is in accordance with provisions of Organic law No04/2005 of 08/04/2005 <br/> &nbsp;&nbsp;&nbsp;determining the modalities of protection,conservation and promotion of the <br/> &nbsp;&nbsp;&nbsp;environment in Rwanda.

										  </p>
										  <p style= "font-size: xx-small;text-align:left ">
										  &nbsp;&nbsp;<b>Signed by </b>, 
										    <br/>
											&nbsp;&nbsp;<b>Chief Operating Officer</b><br/><br/>
											&nbsp;&nbsp;<b>Please Note that;</b>
											Rwanda Development Board (RDB) reserves a right to withdraw this <br/> &nbsp;&nbsp; certificate from PLS in case the latter is found non-compliant and Issued in <br/> &nbsp;&nbsp; quadruplicate is Original to developer, copies to; MINICOM, REMA & '.$district.'district

										      
										 </p>
										  
										</div>
                                      
';

// Print text using writeHTMLCell()
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
         
//Close and output PDF document
//$pdf->Output('certificate.pdf', 'I');
$pdf->Output(sfConfig::get('sf_web_dir').'\uploads\documents\eiacertificates\certificate.pdf','F'); //save
	 
	 //we will output the file and send it to the Investors email address. Get the email address of the investor
	 $userEmail = null;
	 $email = Doctrine_Core::getTable('sfGuardUser')->find($projectDetail->getCreatedBy());
	 //get email
	 /*foreach($email as $em)
	 {*/
	    $userEmail = $email->getEmailAddress() ;
	 //}
	 //
	   $target_path = "uploads/documents/eiacertificates/certificate.pdf";
	
			 
	    $message = Swift_Message::newInstance()
			  ->setFrom('admin@rdb.com')
			  ->setTo($userEmail)
			  ->setSubject('Environmental Impact Certificate')
			  ->setBody('You have been issued with Environmental Impact Certificate. Please download it. Thank you')
			   ->attach(Swift_Attachment::fromPath($target_path));
			 // $file =  sfConfig::get('sf_web_dir')/beibora/web/uploads/companies/;
			 

			$this->getMailer()->send($message); 
			/*$this->getMailer()->composeAndSend('noreply@rdb.com',
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
		  $this->redirect('@homepage');
          throw new sfStopException();
  }
}

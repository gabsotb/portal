<?php

/**
 * reports actions.
 *
 * @package    rdbeportal
 * @subpackage reports
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class eiareportingActions extends sfActions
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
  ///a method to retrieve detailed information of Investment Certificates issued to all investors
  public function executeIssuedEIA(sfWebRequest $request)
  {
    $this->eia_certs = Doctrine_Core::getTable('EIACertificate')->getAllIssuedEIACertificates();
	//we get certificate issuance per sector for investment certificate.
	
  }
  public function executeSectors(sfWebRequest $request)
  {
  $this->sectors_investments = Doctrine_Core::getTable('ProjectSummary')->calculateInvestments();
  }
  ///
  public function executeSectorsCert(sfWebRequest $request)
  {
    //get certificates number grouped by sectors
	$this->sectors_certs = Doctrine_Core::getTable('EIACertificate')->getEIACertsPerSector();
  }
  //method to print all investor EIA certificates details
  public function executeList()
  {
      $eia_certs = Doctrine_Core::getTable('EIACertificate')->getAllIssuedEIACertificates();
       //execute action for printing pdf document of this report
	  $config = sfTCPDFPluginConfigHandler::loadConfig('invst_configs2');
          sfTCPDFPluginConfigHandler::includeLangFile($this->getUser()->getCulture());

          $doc_title    = "RD - INVESTORS EIA CERTIFICATES LIST";
          $doc_subject  = "EIA Certificates";
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
//
//style="background-color:#f9f9f9; font-size: 7; width: 2200;border: 1 cellspacing: 3px cellpadding: 4"
         // Set some content to print
            $head = '
			<h4 style="background-color:#fff;color:#427DD6; font-size:10">A List of EIA Certificates Issued to Investors</h4>
			<br/>
			<table border="1" cellspacing="3" cellpadding="4" width ="2100">
			  <thead>
				<tr style="background-color:#427DD6;color:#fff; font-size:7">
				  <th>PROJECT NAME</th>
				  <th>BUSINESS SECTOR</th>
				  <th>PLOT NUMBER</th>
				  <th>DISTRICT</th>
				  <th>PROVINCE</th>
				  <th>DEVELOPER NAMES</th>
				  <th>CERTIFICATE NO</th>
				</tr>
			  </thead>
			  ';
	     $body = '';
		 foreach($eia_certs as $certs):
			 
			  
			  
			  $body .= '
			  <tr style="background-color:#ffffff;color:#000;font-size:7">
				<td>'.$certs['project_name'].'</td>
				<td>'.$certs['business_sector'].'</td>
				<td>'.$certs['plot_number'].'</td>
				<td>'.$certs['district'].'</td>
				<td>'.$certs['province'].'</td>
				<td>'.$certs['developer_names'].'</td>
				<td>'.$certs['certficate_no'] .'</td>
			  </tr>
			  ';
		  endforeach;
		  $date = date('l jS \of F Y');
 		$tail = '</table> <br/>
		<h4 style="background-color:#fff;color:#000; font-size:6">Report File Generated On
		  '.$date.' Property of RDB. All Rights Reserved.</h4>'; 
		$pdf->writeHTML($head.$body.$tail, true, false, true, false, '');
		ob_end_clean();
		$pdf->Output('certificates_list.pdf', 'I');
		//throw new sfStopException();	
  }
  //excel list
  public function executeExcelList()
  {
       $file = 'certificates_csv';
		$csv = "PROJECT NAME, BUSINESS SECTOR ,PLOT NUMBER, DISTRICT, PROVINCE, DEVELOPER NAMES, CERTIFICATE NO\n";
		///
		//retrieve rows and count the size
	$eia_certs = Doctrine_Core::getTable('EIACertificate')->getAllIssuedEIACertificates();
	  
		  ///

		 foreach($eia_certs as $certs) 
		{
			
			///
			//$date = date_create($checkpoint->getCreatedAt()); // create date
	  
			$csv  .=  $certs['project_name'] . ",";
			$csv  .=  $certs['business_sector']. ",";
			$csv  .=  $certs['plot_number'] . ",";
			$csv  .=  $certs['district'] . ",";
			$csv  .=  $certs['province'] . ",";
			$csv  .=  $certs['developer_names'] . ",";
			$csv  .=  $certs['certficate_no'] . ",";
			$csv  .=  "\n";
			//echo '\n';
		}
	
		$filename = $file . "_" . date("d-m-Y_H-i", time()) . '.csv';
	
		$this->getResponse()->setHttpHeader('Content-Type', 'application/vnd.ms-excel');
		$this->getResponse()->setHttpHeader('Content-Disposition', "attachment; filename=$filename");
		
		return $this->renderText(trim($csv));
  }
 public function executePrintCertificate(sfWebRequest $request)
   {
    $id_param = $request->getParameter('reference');
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
										  This is to certify that an EIA Certificate related to '.$developer_name.'s <br/> &nbsp; project entitled <b>'.$project_title.'</b> represented by <b>'.$contact_person.'</b>
										  has been approved. <br/> &nbsp; This project is to be located on plot number <b>'.$plot_number.'</b> in Cell<b> '.$sector.'</b> <br/> &nbsp; Sector<b> '.$district.'</b> District<b> '.$province.' </b> .
										  </p>
										  <p style= "font-size: xx-small;text-align:left ">
										   This is in accordance with provisions of Organic law No04/2005 of 08/04/2005 <br/> &nbsp; determining the modalities of protection,conservation and promotion of the <br/> &nbsp;&nbsp;environment in Rwanda.

										  </p>
										  <p style= "font-size: xx-small;text-align:left ">
										  <b>Signed by </b>, 
										    <br/>
											&nbsp;&nbsp;<b>Chief Operating Officer</b><br/><br/><br/><br/>
											&nbsp;&nbsp;<b>Please Note that;</b>
											Rwanda Development Board (RDB) reserves a right to withdraw this <br/> &nbsp;&nbsp; certificate from PLS in case the latter is found non-compliant and Issued in <br/> &nbsp;&nbsp; quadruplicate is Original to developer, copies to; MINICOM, REMA &'.$district.'  <br/> &nbsp;&nbsp; district

										      
										 </p>
										  
										</div>
                                      
';

// Print text using writeHTMLCell()
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
         
//Close and output PDF document
$pdf->Output('certificate.pdf', 'I');
/*$pdf->Output(sfConfig::get('sf_web_dir').'\uploads\documents\eiacertificates\certificate.pdf','F'); //save
	 
	 //we will output the file and send it to the Investors email address. Get the email address of the investor
	 $userEmail = null;
	 $email = Doctrine_Core::getTable('sfGuardUser')->find($projectDetail->getCreatedBy());
	 //get email
	 
	    $userEmail = $email->getEmailAddress() ;
	
	 //
	   $target_path = "uploads/documents/eiacertificates/certificate.pdf";
	
			 
	    $message = Swift_Message::newInstance()
			  ->setFrom('admin@rdb.com')
			  ->setTo($userEmail)
			  ->setSubject('Environmental Impact Certificate')
			  ->setBody('You have been issued with Environmental Impact Certificate. Please download it. Thank you')
			   ->attach(Swift_Attachment::fromPath($target_path));
			
			 

			$this->getMailer()->send($message); 
			 
	 /////////////////////////////////////////////
	 //
	
	///////////////////////////////End Certificate Configuration ///////////////////////////////////////////
          // Stop symfony process */
		 // $this->redirect('@homepage');
          throw new sfStopException();
   }
}

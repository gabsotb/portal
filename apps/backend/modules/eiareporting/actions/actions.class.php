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
	$this->sectors_certs = Doctrine_Core::getTable('InvestmentCertificate')->getInvestmentCertsPerSector();
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
	//print $id_param; exit;
	$query = Doctrine_Core::getTable('InvestmentCertificate')->getApplicantCertificateDetails($id_param);
	if($query == null)
	{
	 //invalid
	 $this->forward404();
	}
	else if($query != null)
	{
	   ////////////////////////////
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
$pdf->SetAlpha(0.5);
$img_file = K_PATH_IMAGES.'alpha.png';
$pdf->Image($img_file, 50, 80, 40, 40, '', '', '', true, 72); 
// -------------------------------------------------------------

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
    $pdf->Output('certificate.pdf', 'I'); // output
	throw new sfStopException();
	   //////////////////////////////
	}
   }
}

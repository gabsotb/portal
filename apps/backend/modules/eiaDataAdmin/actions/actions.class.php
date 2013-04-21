<?php

/**
 * eiaDataAdmin actions.
 *
 * @package    rdbeportal
 * @subpackage eiaDataAdmin
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class eiaDataAdminActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->tasks = Doctrine_Core::getTable('EITaskAssignment')->getTasks();
	//$this->tors = Doctrine_Core::getTable('Tor')->
  }
  
	public function executeShow(sfWebRequest $request)
	{
			
		$this->detail=Doctrine_Core::getTable('EITaskAssignment')->find(array($request->getParameter('id')));
		//Update status////
		if($this->detail->getWorkStatus() == 'notstarted')
		{
			Doctrine_Core::getTable('EIApplicationStatus')->updateStatus($this->detail->getEiaprojectId(),'processing');
			Doctrine_Core::getTable('EIApplicationStatus')->updateComment($this->detail->getEiaprojectId(),'Your application is been processed');
			Doctrine_Core::getTable('EIApplicationStatus')->updatePercentage($this->detail->getEiaprojectId(),30);
			$this->detail->setWorkStatus('started')->save();
		}
		///////////
		$this->developers=Doctrine_Core::getTable('EIAProjectDeveloper')->findByEiaprojectId($this->detail->getEiaprojectId());
		$this->applicant=Doctrine_Core::getTable('sfGuardUser')->find($this->developers[0]['created_by']);
		$this->descriptions=Doctrine_Core::getTable('EIAProjectDescription')->findByEiaprojectId($this->detail->getEiaprojectId());
		$this->surroundings=Doctrine_Core::getTable('EIAProjectSurrounding')->findByEiaprojectId($this->detail->getEiaprojectId());
		$this->economics=Doctrine_Core::getTable('EIAProjectSocialEconomic')->findByEiaprojectId($this->detail->getEiaprojectId());
		$this->impacts=Doctrine_Core::getTable('EIAProjectImpactMeasures')->findByEiaprojectId($this->detail->getEiaprojectId());
		$this->impactsOperation=Doctrine_Core::getTable('EIAProjectOperationPhase')->findByEiaprojectId($this->detail->getEiaprojectId());
		$this->attachments=Doctrine_Core::getTable('EIAProjectAttachment')->findByEiaprojectId($this->detail->getEiaprojectId());
		$site_id=Doctrine_Core::getTable('EIASiteVisit')->findByEiaprojectId($this->detail->getEiaprojectId());
		$decision=Doctrine_Core::getTable('EIAProjectBriefDecision')->findByEiaprojectId($this->detail->getEiaprojectId());
		if($site_visit=Doctrine_Core::getTable('EIASiteVisit')->find($site_id[0]['id']) || $brief_decision=Doctrine_Core::getTable('EIAProjectBriefDecision')->find($decision[0]['id']))
		{
			$this->assessing=true;
		}else
		{
			$this->assessing=false;
		}
	}
  
	public function updateStatus($eiaProjectId,$state,$comment,$percent)
	{	
		$this->forward404Unless($statues=Doctrine_Core::getTable('EIApplicationStatus')->findByEiaprojectId($eiaProjectId));
		$id=NULL;
		foreach($statues as $status)
		{
			$id=$status->getId();
		}
		$s=Doctrine_Core::getTable('EIApplicationStatus')->find(array($id));
		$s->setApplicationStatus($state);
		$s->setComments($comment);
		$s->setPercentage($percent);
		$s->save();
	}
	
	public function executeResubmission(sfWebRequest $request)
	{
		$eiaProjectId=$request->getParameter('id');
		$decision= new EIAProjectBriefDecision();
		$decision->eiaproject_id=$eiaProjectId;
		$decision->decision="resubmit";
		$decision->processed_by=sfContext::getInstance()->getUser()->getGuardUser()->getId();
		$decision->save();
		$id=NULL;
		foreach(Doctrine_Core::getTable('EIAProjectBriefDecision')->findByEiaprojectId($eiaProjectId) as $decision)
		{ 
			$id=$decision->getId();
		}
		$this->redirect('eiaProjectBreifDecision/edit?id='.$id.'&act=resubmit');
	}
	
	public function executeImpact(sfWebRequest $request)
	{
		$impact= new ProjectImpact();
		$impact->eiaproject_id=$request->getParameter('id');
		$impact->save();
		//$this->updateStatus($request->getParameter('id'),'assessing','Accessing application',60);
		//$assignment=Doctrine_Core::getTable('EITaskAssignment')->findByEiaprojectId($request->getParameter('id'));
		//Doctrine_Core::getTable('EITaskAssignment')->find(array($assignment[0]['id']))->setWorkStatus('assess')->save();
		foreach(Doctrine_Core::getTable('ProjectImpact')->findByEiaprojectId($request->getParameter('id')) as $projetcImpact)
		{
			$impactId=$projetcImpact->getId();
		}
		$this->redirect('eiaProjectImpact/edit?id='.$impactId);
	}
	
	public function executeReject(sfWebRequest $request)
	{
		$reject = new EIAProjectBriefDecision();
		$reject->eiaproject_id=$request->getParameter('id');
		$reject->decision="rejected";
		$reject->processed_by=sfContext::getInstance()->getUser()->getGuardUser()->getId();
		$reject->save();
		//Doctrine_Core::getTable('EIApplicationStatus')->updateStatus($request->getParameter('id'),'rejected','Application has been rejected',60);
		//$assignment=Doctrine_Core::getTable('EITaskAssignment')->findByEiaprojectId($request->getParameter('id'));
		//Doctrine_Core::getTable('EITaskAssignment')->find(array($assignment[0]['id']))->setWorkStatus('rejected')->save();
		foreach(Doctrine_Core::getTable('EIAProjectBriefDecision')->findByEiaprojectId($request->getParameter('id')) as $rejectDecision)
		{ 
			$id=$rejectDecision->getId();
		}
		$this->redirect('eiaProjectBreifDecision/edit?id='.$id.'&act=reject');
	}	
	
	public function executeSiteVisit(sfWebRequest $request)
	{
		$site = new EIASiteVisit();
		$site->eiaproject_id=$request->getParameter('id');
		$site->visited=false;
		$site->save();
		$visits=Doctrine_Core::getTable('EIASiteVisit')->findByEiaprojectId($request->getParameter('id'));
		$this->redirect('eiaSiteVisit/edit?id='.$visits[0]['id']);
	}
	public function executeProcess(sfWebRequest $request)
	{
		$this->projectDetail=Doctrine_Core::getTable('EIAProjectDetail')->find(array($request->getParameter('id')));
		$this->projectDeveloper=Doctrine_Core::getTable('EIAProjectDeveloper')->findByEiaprojectId($request->getParameter('id'));
		$this->projectDescription=Doctrine_Core::getTable('EIAProjectDescription')->findByEiaprojectId($request->getParameter('id'));
		$this->siteVisit=Doctrine_Core::getTable('EIASiteVisit')->findByEiaprojectId($request->getParameter('id'));
		$this->tasks=Doctrine_Core::getTable('EITaskAssignment')->findByEiaprojectId($request->getParameter('id'));
		$this->assessmentSiteVisit=Doctrine_Core::getTable('EIAAssessmentDecision')->getAssessment($this->tasks[0]['id'],'site-visit');
		$this->assessmentImpact=Doctrine_Core::getTable('EIAAssessmentDecision')->getAssessment($this->tasks[0]['id'],'impact-level');
		$this->assessmentTor=Doctrine_Core::getTable('EIAAssessmentDecision')->getAssessment($this->tasks[0]['id'],'tor');
		$this->applicantEmail=Doctrine_Core::getTable('sfGuardUser')->find($this->projectDetail['created_by']);
		$this->projectImpact=Doctrine_Core::getTable('ProjectImpact')->findByEiaprojectId($request->getParameter('id'));
		$this->torSubmit=Doctrine_Core::getTable('TorSubmit')->findByEiaprojectId($request->getParameter('id'));
		
	}
	public function executeMessage(sfWebRequest $request)
	{
		$message = new Messages();
		$message->sender=sfContext::getInstance()->getUser()->getGuardUser()->getUsername();
		$message->sender_email=sfContext::getInstance()->getUser()->getGuardUser()->getEmailAddress();
		$message->recepient=$request->getParameter('applicant');
		$applicant=Doctrine_Core::getTable('sfGuardUser')->findByUsername($request->getParameter('applicant'));
		$message->recepient_email=$applicant[0]['email_address'];
		$message->save();
		/*change status
		$statusId=Doctrine_Core::getTable('EIApplicationStatus')->findByEiaprojectId($request->getParameter('id'));
		$status=Doctrine_Core::getTable('EIApplicationStatus')->find($statusId[0]['id']);
		$status->application_status="site visit";
		$status->comments="Site visit scheduled";
		$status->percentage=50;
		$status->save();*/
		$messageId=Doctrine_Core::getTable('Messages')->getMessageId($request->getParameter('applicant'));	
		$this->redirect('messages/edit?id='.$messageId[0]['id'].'&user=dataAdmin');
	}
	public function executeMessageTor(sfWebRequest $request)
	{
		$message = new Messages();
		$message->sender=sfContext::getInstance()->getUser()->getGuardUser()->getUsername();
		$message->sender_email=sfContext::getInstance()->getUser()->getGuardUser()->getEmailAddress();
		$message->recepient=$request->getParameter('applicant');
		$applicant=Doctrine_Core::getTable('sfGuardUser')->findByUsername($request->getParameter('applicant'));
		$message->recepient_email=$applicant[0]['email_address'];
		$message->save();
		//change status
		Doctrine_Core::getTable('EIApplicationStatus')->updateStatus($request->getParameter('id'),"T.O.R");
		Doctrine_Core::getTable('EIApplicationStatus')->updateComment($request->getParameter('id'),"Terms of Reference assessment");
		Doctrine_Core::getTable('EIApplicationStatus')->updatePercentage($request->getParameter('id'),70);
		/*$statusId=Doctrine_Core::getTable('EIApplicationStatus')->findByEiaprojectId($request->getParameter('id'));
		$status=Doctrine_Core::getTable('EIApplicationStatus')->find($statusId[0]['id']);
		$status->application_status="T.O.R";
		$status->comments="Terms of Reference assessment";
		$status->percentage=70;
		$status->save();*/
		$messageId=Doctrine_Core::getTable('Messages')->getMessageId($request->getParameter('applicant'));	
		$this->redirect('messages/edit?id='.$messageId[0]['id'].'&user=dataAdmin');
	}
	public function executeSiteVisitReport(sfWebRequest $request)
	{
		$report = new EIASiteVisitReport();
		$report->eiasitevisit_id=$request->getParameter('id');
		$report->save();
		$report_id=Doctrine_Core::getTable('EIASiteVisitReport')->findByEiasitevisitId($request->getParameter('id'));
		
		$this->redirect('eiaSiteVisitReport/edit?id='.$report_id[0]['id']); 
	}
	public function executeTorSubmit(sfWebRequest $request)
	{
		$tor= new TorSubmit();
		$tor->eiaproject_id=$request->getParameter('id');
		$tor->save();
		$torId=Doctrine_Core::getTable('TorSubmit')->findByEiaprojectId($request->getParameter('id'));
		$this->redirect('eiaTor/edit?id='.$torId[0]['id']);
	}
	public function executeMessageEIReport(sfWebRequest $request)
	{
		$message = new Messages();
		$message->sender=sfContext::getInstance()->getUser()->getGuardUser()->getUsername();
		$message->sender_email=sfContext::getInstance()->getUser()->getGuardUser()->getEmailAddress();
		$message->recepient=$request->getParameter('applicant');
		$applicant=Doctrine_Core::getTable('sfGuardUser')->findByUsername($request->getParameter('applicant'));
		$message->recepient_email=$applicant[0]['email_address'];
		$message->save();
		//change status
		Doctrine_Core::getTable('EIApplicationStatus')->updateStatus($request->getParameter('id'),"EIR");
		Doctrine_Core::getTable('EIApplicationStatus')->updateComment($request->getParameter('id'),"Environmental Impact Study assessment");
		Doctrine_Core::getTable('EIApplicationStatus')->updatePercentage($request->getParameter('id'),80);
		/*$statusId=Doctrine_Core::getTable('EIApplicationStatus')->findByEiaprojectId($request->getParameter('id'));
		$status=Doctrine_Core::getTable('EIApplicationStatus')->find($statusId[0]['id']);
		$status->application_status="EIR";
		$status->comments="Environmental Impact Study assessment";
		$status->percentage=80;
		$status->save();*/
		$messageId=Doctrine_Core::getTable('Messages')->getMessageId($request->getParameter('applicant'));	
		$this->redirect('messages/edit?id='.$messageId[0]['id'].'&user=dataAdmin');
	}
  public function executeClearenceLetter(sfWebRequest $request)
  {
	//we will validate this business and make sure that it is valid
	// $this->validate = Doctrine_Core::getTable('ProjectSummary')->find(array($request->getParameter('id')));
	 /*$validate = $request->getParameter('id') ;
	 $query_validate = Doctrine_Core::getTable('ProjectSummary')->validateId($validate);
	 if(count($query_validate) == null)
	 {
	   $this->forward404(sprintf('Validation Error: Invalid parameter for id'));
	 }*/
	 //now let us call a method to retrieve information about this investor
	 //$query = Doctrine_Core::getTable('ProjectSummary')->getApplicantDetails($request->getParameter('id'));
	 $detail=Doctrine_Core::getTable('EIAProjectDetail')->find($request->getParameter('id'));
	 $developer=Doctrine_Core::getTable('EIAProjectDeveloper')->findByEiaprojectId($request->getParameter('id'));
	 $applicant=Doctrine_Core::getTable('sfGuardUser')->find($detail->getCreatedBy());
	 $f_name=$applicant->getFirstName();
	 $l_name=$applicant->getLastName();
	 $developer=$developer[0]['developer_name'];
	 $contactPerson=$developer[0]['contact_person'];
	 $project_title=$detail->getProjectTitle();
	 $plot_number=$detail->getProjectPlotNumber();
	 $cell=$detail->getCell();
	 $sector=$detail->getSector();
	 $district=$detail->getDistrict();
	 $province=str_replace("_", " ",$detail->getProvince());
	 $date=date('d/m/y');
	 
	// print_r($query); exit;
	 /*$company = "default" ;
	 $fname = "default";
	 $lname = "default";
	 $address = "default";
	 $date  = date('l jS  F Y');
	 $userF = sfContext::getInstance()->getUser()->getGuardUser()->getFirstName();
	 $userL = sfContext::getInstance()->getUser()->getGuardUser()->getLastName();
	 //loop through the result returned
	 foreach($query as $q)
	 {
	  $company = $q['name'];
	  $fname = $q['first_name'];
	  $lname = $q['last_name'];
	  $address = $q['location'];
	 }*/
	
	 ///we get email address of the applicant
	  //we will output the file and send it to the Investors email address. Get the email address of the investor
	 //$userEmail = null;
	 /*$email = Doctrine_Core::getTable('InvestmentCertificate')->getInvestorEmail($request->getParameter('id'));
	 //get email
	 foreach($email as $em)
	 {*/
		$userEmail = $applicant->getEmailAddress();
	 //}
	// print $userEmail; exit;
   //execute action for printing pdf document of this report
	  $config = sfTCPDFPluginConfigHandler::loadConfig();
		  sfTCPDFPluginConfigHandler::includeLangFile($this->getUser()->getCulture());

		  $doc_title    = "Environmental Impact Assessment ";
		  $doc_subject  = "Clearence Letter";
		  $doc_keywords = "test keywords";
		  $htmlcontent  = "&lt; &euro; €אטילעש &copy; &gt;<br /><p></p><sup></sup>";

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
   <i>Mr/Ms $f_name $l_name </i> <br/>
   <i>$company</i><br/>
   <i>$address</i><br/>
   <i>Date: $date </i>
   
<h2>RE: Clearence Letter</h2>
<p>This letter certifies that a Environmental Impact Assessment related to <b>$developer</b>'s project entitled <b>$project_title</b> represented by <b>$contactPerson</b> has been approved.</p>
<p>This project is to be located on plot number <b>$plot_number</b> in <b>$cell</b> Cell, <b>$sector</b> Sector, <b>$district</b> District, <b>$province</b> Province.</p>
<p>This is in accordance with the provisions of Organic law No 04/2005 of 08/04/2005 determining the modalities of protection, conservation and promotion of the environment in Rwanda.</p>

<p>Dated this $date</p>

<p><b>Note that:</b><br/>
   <i>RDB reserves a right to withdraw this letter from $developer in case the latter is found non-compliant</i> <br/>
   <i>Issued in quadruplicate: Original to developer, copies to: MINICOM,REMA and $district district</i>

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
	$pdf->Output(sfConfig::get('sf_web_dir').'\uploads\documents\eia_letter\letter.pdf','F');
	$target_path = "uploads/documents/eia_letter/letter.pdf";
	//$this->updatestatus = Doctrine_Core::getTable('TaskAssignment')->updateUserTaskStatus2($validate);
			 
		$message = Swift_Message::newInstance()
			  ->setFrom('admin@rdb.com')
			  ->setTo($userEmail)
			  ->setSubject('Clearence Letter')
			  ->setBody('We are pleased to inform you that your application 
			  for environmental impact assessment was approved by RDB. Please See attached letter. Thankyou')
			   ->attach(Swift_Attachment::fromPath($target_path));
			 // $file =  sfConfig::get('sf_web_dir')/beibora/web/uploads/companies/;
			 

			$this->getMailer()->send($message);
			//Update status
			Doctrine_Core::getTable('EIApplicationStatus')->updateStatus($request->getParameter('id'),'certificate');
			Doctrine_Core::getTable('EIApplicationStatus')->updateComment($request->getParameter('id'),'Certificate issued');
			Doctrine_Core::getTable('EIApplicationStatus')->updatePercentage($request->getParameter('id'),100);
			//update work status
			$task_id=Doctrine_Core::getTable('EITaskAssignment')->findByEiaprojectId($request->getParameter('id'));
			Doctrine_Core::getTable('EITaskAssignment')->find($task_id[0]['id'])->setWorkStatus('complete')->setStage('letter')->save();
			//print $validate; exit;
			//after sending email, we also need to change the status of this business application. 
			
		   $this->redirect('@homepage');
		  // Stop symfony process
		  throw new sfStopException();
		  
  }
}

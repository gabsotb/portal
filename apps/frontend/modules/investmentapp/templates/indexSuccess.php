<?php
//reporting script
$investment_certs = Doctrine_Core::getTable('InvestmentCertificate')->calculateCertificatesIssued();
//print $investment_certs; exit;
$eia_certs = Doctrine_Core::getTable('EIACertificate')->calculateCertificatesIssued();
$tax_exemption = Doctrine_Core::getTable('TaxExemptionDetails')->calculateExemptionsGranted(); 
//some small maths
$ic = 0;
$eia =0 ;
$tax = 0;
$total = $investment_certs + $eia_certs + $tax_exemption ;
//$total = 0;
//print $total; exit;
//avoid division by zero
if($total == 0)
{
 //do not divide just pass default values
 
}
else if($total > 0)
{
//print $total; exit;
$ic = round(($investment_certs / $total) * 100) ;
$eia = round(( $eia_certs / $total) * 100);
$tax = round(( $tax_exemption / $total) * 100) ;
}

/////
 ?>
	
<script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'cont',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Certificate & Tax Exemption Processing Analysis,<?php echo 2013 ?> to date'
            },
            tooltip: {
        	    pointFormat: '{series.name}: <b>{point.percentage}%</b>',
            	percentageDecimals: 1
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        color: '#000000',
                        connectorColor: '#000000',
                        formatter: function() {
                            return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
                        }
                    }
                }
            },
			
				credits:
				{
					enabled: false
				},
            series: [{
                type: 'pie',
                name: 'No of Transactions',
                data: [
                    ['Investment Certificates',   <?php echo $ic  ?>],
                    ['EIA Certificates',       <?php echo $eia ?>],
                    ['Tax Exemptions',   <?php echo $tax ?>]
                ]
            }]
        });
    });
    
});
		</script>
	
<div id="page" class="dashboard">
         
	<div class="row-fluid">
		<div class="span12">    	
			<!-- BEGIN PAGE TITLE & BREADCRUMB-->		
			<h3 class="page-title">
							<?php echo __('Dashboard') ?>
							<small><?php echo __('Register and monitor applications for EIA and Investment Certificates Applications.') ?></small>
			</h3>
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
								<a href="#"><?php echo __('Home') ?></a> <span class="divider">/</span>
				</li>
				<li>
				<i class="icon-desktop"></i>
							<a href="#"><?php echo __('Dashboard') ?></a></li> <span class="divider">/</span>
				<li>
				<i class="icon-user"></i>
				<a href="#">
				   <b>
					  <font color="blue">
						<?php $username = sfContext::getInstance()->getUser()->getGuardUser()->getUsername();
									  echo __('Welcome, You are logged in as '.$username) ;
						?>
						</font>
					</b>
				</a></li>
				<li class="pull-right dashboard-report-li">
				<i class="icon-time"></i>
				              <?php echo __('Logged in on') ?> <font color="blue">
						<?php
						   $date = date("F j, Y");
						   print $date;
						?>
						</font>
				</li>
				
			</ul>
			<!-- END PAGE TITLE & BREADCRUMB-->
		</div>
	</div>
	<!-- Overview statistics -->
	<div class="row-fluid">
		<div class="span8">
			<!-- BEGIN SITE VISITS PORTLET-->
			<div class="widget">
				<div class="widget-title">
									<h4><i class="icon-signal"></i><?php echo __('General RDB Performace Analysis') ?></h4>						
				</div>
				<div class="alert alert-block alert-info fade in">
							
											<h4 class="alert-heading"><?php echo __('Information') ?></h4>
							<p>
												<?php echo __('Below statistics for Investment Certificates issued, EIA Certificates Issued and Tax Exmptions
												Request Granted to Registered Investors. This is an Overall Representation') ?>
							</p>
				</div>
				<div class="widget-body">
					<div class="row-fluid">
					    <div class="span3 responsive" data-tablet="span6" data-desktop="span3">
							<div class="circle-stat block">
								<div class="visual">
									<input class="knobify" data-width="115" data-thickness=".2" data-skin="tron" data-displayprevious="true" value="6" data-max="100" data-min="-100" />
								</div>
								<div class="details">
									<div class="title"><?php echo __('Number of Investment Certificates Issued')?> <i class="icon-caret-up"></i></div>
									<div class="number"><?php echo $investment_certs;  ?></div>
									<span class="label label-info"><i class="icon-certificate"></i><?php echo $ic ?>%</span>
								</div>
							</div>
						</div>
						 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<div class="span3 responsive" data-tablet="span6" data-desktop="span3">
							<div class="circle-stat block">
								<div class="visual">
									<input class="knobify" data-width="115" data-fgcolor="#66EE66" data-thickness=".2" data-skin="tron" data-displayprevious="true" value="+19" data-max="100" data-min="-100" />
								</div>
								<div class="details">
									<div class="title"><?php echo __('Number Of EIA Certificates Issued') ?> <i class="icon-caret-up"></i></div>
									<div class="number"><?php
									   echo $eia_certs;
									?></div>
									<span class="label label-success"><i class="icon-certificate"></i><?php echo $eia ?>%</span>
									
								</div>
							</div>
						</div>
					<div class="span3 responsive" data-tablet="span6 fix-margin" data-desktop="span3">
							<div class="circle-stat block">
								<div class="visual">
									<input class="knobify" data-width="115" data-fgcolor="#e23e29" data-thickness=".2" data-skin="tron" data-displayprevious="true" value="-12" data-max="100" data-min="-100" />
								</div>
								<div class="details">
									<div class="title"><?php echo __('Tax Exemptions Granted') ?> <i class="icon-caret-down down"></i></div>
									<div class="number"><?php 
									echo $tax_exemption;?></div>
									<span class="label label-warning"><i class="icon-certificate"></i><?php echo $tax ?> % </span>
								</div>
							</div>
						</div>
						
						
						
					</div>
				</div>
				
			</div>
			<!-- Begin Graph for User to analyze RDB Processing Power -->
			<div class="span12">
			<div class="widget">
				  <div class="widget-title">
									<h4><i class="icon-signal"></i><?php echo __('Graphical Analysis - RDB Overall Perfomance Representation') ?></h4>
											
				</div>
				<?php //if there is no data do not display a graph
				 if($total == 0):?>
				  <div id="graph_error"  class="widget-body">
					   <div class="alert alert-block alert-error fade in">
										<h4 class="alert-heading"><?php echo __('Graph Data Loading Problem') ?></h4>
										<p>
											<?php echo __('Sorry, There is no Graph data available. No Investment Certificates or EIA Certificates Issued. Try Later') ?>
											<?php //echo "Count value is".$total; ?>
										</p>
										
					  </div>
				   </div>
				 <?php endif; ?>
				<?php if($total > 0): ?>
					<div id="cont"  class="widget-body">
						
					</div>
				<?php endif; ?>
			</div> <!-- END Graph-->
			</div>
			
		</div>
		<div class="span4">
		
			
			<div class="widget">
							<div class="widget-title">
												<h4><i class="icon-bell"></i><?php echo __('Status of Applications') ?></h4>						
							</div>
							<div class="widget-body">
							<!-- BEGIN Investment Certificate Widget-->
							
							<div class="widget">
											<div class="widget-title">
																<h4><?php echo __('Investment Certificate Application') ?></h4>						
											</div>
								<?php if(count($investment_applications) > 0): ?>
										 <div class="widget-body">
												<!-- table to list company information -->
												   <div class="widget">
										<div class="widget-title">
															<h4><i class="icon-reorder"></i><?php echo __('Progress Monitor') ?></h4>
											 
										</div>
										<div class="widget-body">
										   <div class="scroller" data-height="200px">
											<table class="table table-hover">
												<thead>
													<tr>
														
																		<th><?php echo __('Company') ?></th>
														<th><?php echo __('Status') ?></th>
														
													</tr>
												</thead>
												<tbody>
												  <?php foreach($applications as $apps): ?>
													<tr>
														
														<?php $point = $apps['percentage'] ?>
														<?php $commentI = $apps['comment'] ?>
														 <td><?php echo $apps['name'] ?></td>
														  <td>
														   <?php $status = $apps['application_status']; 
														         $name = $apps['name'];
														   ?>
														   
														   <?php if($status == "rejected"): ?>
														   <span class="label label-success">
												           <font color ="red"><?php echo $apps['application_status'] ?>
														  
														   </font>
												           </span>
														   <?php endif; ?>
														   <!-- ///// -->
														   <?php if($status != "rejected"): ?>
														     <span class="label label-success">
												            <?php echo $apps['application_status'] ?>
												             </span>
														   <?php endif; ?>
														  
												
														 
														  </td>
														
													</tr>
													<?php endforeach; ?>
												</tbody>
											</table>
											</div>
											<?php if($status == "rejected"): ?>
											<div class="progress progress-striped progress-danger active">
												<div style="width: <?php echo $point ?>%;" class="bar"></div>
											</div>
											<?php 
											 //we want to hide a project applicant whose status has been rejected. 
											 $business_id = Doctrine_Core::getTable('InvestmentApplication')->getBusinessId($name) ;
											 $reference = Doctrine_Core::getTable('InvestmentApplication')->getReferenceNumber($business_id);
											?>
										<a href="<?php echo url_for('investmentapp/new?id='.$name.'&reference='.$reference) ?>"> 
												<button type="button" class="btn btn-primary"><?php echo __('New Application') ?></button>
												</a>
											<?php endif; ?>
											<?php if($status != "rejected"): ?>
											<div class="progress progress-striped active">
												<div style="width: <?php echo $point?>%;" class="bar"></div>
											</div>									
											<?php endif; ?>
										</div>
											</div>
												<!-- end table -->
												<div class="alert alert-block alert-info fade in">
																	<h4 class="alert-heading"><?php echo __('Comments') ?></h4>
													<p>
														<?php echo $commentI  ?>
													
														
													</p>
												</div>
												
											</div>
											<?php endif; ?>
											
								<?php if(count($investment_applications) <= 0): ?>
											<div class="alert alert-error">
											 <!-- if a User has completed step 1 and is yet to complete step 2, we show
											 a link for completing his application -->
											<?php 
											$user_id = sfContext::getInstance()->getUser()->getGuardUser()->getId();
											$q = Doctrine_Core::getTable('InvestmentApplication')->getUserInvestmentApplicationSubmission($user_id);
											$investment_id = null;
											$business_name = null;
											$token = null;
											 //
											 foreach($q as $res)
											 {
											   $investment_id = $res['id'];
											   $business_name = $res['name'];
											   $token = $res['token'];
											 }
											
											//now we pass this to businessplan table method
											$p = Doctrine_Core::getTable('BusinessPlan')->getBusinessPlanDetails($investment_id);
											//check if a business application is already rejected
								        	$rejection = Doctrine_Core::getTable('BusinessApplicationStatus')->checkStatus($investment_id);
											//get the names of businesses for the current logged user whose status is rejected_completed
											///
											$id = sfContext::getInstance()->getUser()->getGuardUser()->getId();
											$query5 = Doctrine_Core::getTable('InvestmentApplication')->getBusiness($id);
											$biz = null ;
											//loop
											 foreach($query5 as $q)
											 {
											  $biz  = $q['name']; 
											 }
											$response = null;
											//print_r($p); exit;
											//
											foreach($p as $r)
											{
											 $response = $r['investment_id'];
											}
											// 
											  
											?>
										<?php if($investment_id != null ){ ?>
									<?php 
									//$business_session_id = null ;
									//sfContext::getInstance()->getUser()->setAttribute('session_business_id',$business_session_id ); ?>
											 <!-- if it is null we show buttons -->
											 <?php if($response == null  && $rejection != "rejected_completed") { ?>
												 <div class="alert alert-block alert-warning fade in">
																 <strong><?php echo __('Incomplete Application !')?></strong> <br/>
																 <?php echo __('Please Complete your Initial application
																 for Investment Certificate for') ?> <?php echo $business_name; ?>.  <br/><br/>
												<a href="<?php echo url_for('businessplan/new?id='.$business_name.'&token='.$token.'&id_value='.$investment_id) ?>"> 
																<button type="button" class="btn btn-primary"><?php echo __('Complete') ?></button>&nbsp;&nbsp;
												&nbsp;&nbsp;
												</a>
												<a href="<?php echo url_for('investmentapp/edit?id='.$investment_id.'&token='.$token) ?>"> 
																<button type="button" class="btn btn-success"><?php echo __('Review') ?></button>
												</a>
												</div>
											 <?php } ?>
										 <?php } ?>
											 <?php if($investment_id != null){ 
											 $value = 0;
											
											 ?>
											 <!-- We have a situation where a user has completed application 1 and wants to a apply for a 
											 certificate for another business we will show this message -->
											   <?php 
											
											   foreach($checkCertificationStatus as $status)
												{
												  $value = $status['COUNT(investment_application.id)'] ;
												// print $value;
												}
												// exit;
												?>
												<?php if($value > 0 && $response != null) { ?>
																  <strong><?php echo __('Alert!') ?></strong> <br/><?php echo __('There are no New applications
																		for investment certificate for your account! However your have') ?> <?php echo $value; ?>
																		<?php echo __('complete application(s) for Investment Certificate. Click Button Below to apply for 
																		Certification of another business. ')?>
												<br/> 
												 <a href="<?php echo url_for('investmentapp/new') ?>">
																 <button type="button" class="btn btn-primary"><?php echo __('Apply for Investment Certificate' ) ?></button>
												 </a><br/><br/>
												 <a href="<?php echo url_for('investmentapp/myCertificates') ?>">
																 <button type="button" class="btn btn-warning"><?php echo __('My Certificate(s)' ) ?></button>
												 </a>
												<?php } ?>
												<?php if($value <= 0 && $response != null) { ?>
																	  <strong><?php echo __('Alert!') ?></strong> <br/><?php echo __('There are no applications
																		for investment certificate for your account! <br/>') ?>
														 <a href="<?php echo url_for('investmentapp/new') ?>">
																		 <button type="button" class="btn btn-primary">
																		 <?php echo __('Apply for Investment Certificate') ?></button>
														 </a>
												<?php } ?>
											
								<!--we will prevent users from applying for certificate if they have pending applications -->
										 
										
										  <?php } ?> 
										   <?php if($investment_id == null){  ?>
										    <?php $reference = "new" ; ?>
														    <strong><?php echo __('Alert!') ?></strong> <br/><?php echo __('There are no applications
																		for investment certificate for your account! <br/>') ?>
														 <a href="<?php echo url_for('investmentapp/new?reference='.$reference) ?>">
																		 <button type="button" class="btn btn-primary">
																		 <?php echo __('Apply for Investment Certificate') ?></button>
														 </a>
										  <?php } ?>
										   <?php if($investment_id != null && $rejection == "rejected_completed"){  ?>
										   <?php $reference = "new" ; ?>
														    <strong><?php echo __('Alert!') ?></strong> <br/><?php 
															
															echo __("There are no new applications
																		for investment certificate for your account! <br/>
																		However you application for investment certificate for $biz was declined. but you can still apply for Investment Certificate if you have met all requirement that led to your disqualification or apply for a new business. Thank you.
																		") ?>
														 <a href="<?php echo url_for('investmentapp/new?reference='.$reference) ?>">
																		 <button type="button" class="btn btn-primary">
																		 <?php echo __('Apply for Investment Certificate') ?></button>
														 </a>
										  <?php } ?>
											</div>
										<?php endif; ?>
											   <div>
								<?php 
								
						$user_id = sfContext::getInstance()->getUser()->getGuardUser()->getId();
						$q = Doctrine_Core::getTable('InvestmentApplication')->getUserInvestmentApplicationSubmission($user_id);
						$investment_id = null;
											
						 //
						 foreach($q as $res)
						 {
						   $investment_id = $res['id'];
						 
						 }
								
						$id = Doctrine_Core::getTable('InvestmentResubmission')->checkIdExistance($investment_id); ?>
								 <?php if($id != null): ?>
													<a href="#widget-resubmit" data-toggle="modal">
											                    <button type="button" class="btn btn-warning"><?php echo __('Resubmit') ?></button></a>
								<?php endif; ?>				
												</div>
											   
							</div>
							  <!-- for modal --->
								<div id="widget-resubmit" class="modal hide">
										<div class="modal-header">
											<button data-dismiss="modal" class="close" type="button">×</button>
															<h3><?php echo __('Application Document Resubmission') ?></h3>
										</div>
										<div class="modal-body">
															<p><?php echo __('Please make sure that you have properly reviewed your work as stipulate in the message you received
															informing you of resubmission. Make sure to make changes and submit your work. By doing so you we will try to process your application asap. Thank you') ?></p>
															<p><?php echo __('Do you feel satisfied and want to resubmit? ') ?></p>
											
											<?php
												$user_id = sfContext::getInstance()->getUser()->getGuardUser()->getId();
												$q = Doctrine_Core::getTable('InvestmentApplication')->getUserInvestmentApplicationSubmission($user_id);
												$investment_id = null;
												$business_name = null;
												$token = null;
												 //
												 foreach($q as $res)
												 {
												   $investment_id = $res['id'];
												//   $business_name = $res['name'];
												   $token = $res['token'];
												 }
											?>
															 <a href="<?php echo url_for('investmentapp/edit?id='.$investment_id.'&token='.$token) ?>"><button class="btn btn-warning"><i class="icon-plus icon-white"></i><?php echo __('Yes') ?></button> </a>&nbsp;&nbsp;&nbsp;
															 <button data-dismiss="modal" class="close" type="button">
															 <?php echo __('Cancel') ?></button>
											
											
											
											
										</div>
									 </div>
							  <!-- end modal -->
							  
							  <!-- End Investment Certificate Application Widget -->
								<!-- Begin EIA Certificate application widget -->
								
								<div class="widget">
								   <div class="widget-title">
										<h4><?php echo __('EIA Certificate Application') ?></h4>						
									</div>
									<div class="widget-body">
										<?php if(count($eiaStatus)==0): ?>
										
										<!-- we have a situation where a user has submiited step 1 and not completed other steps
										we want to take the user back to the step of which they havent completed.
										
										-->
										<?php
                                         //lets create a method that checks for id in table eaiprojectdetail and not in eaiprojectdeveloper table
										 //get the current user id
										 $logged_user_id = sfContext::getInstance()->getUser()->getGuardUser()->getId();
										 //write a method to retrieve record updated by this user from table eaiprojectdetail .
										 $query = Doctrine_Core::getTable('EIAProjectDetail')->getUserSubmission($logged_user_id);
										 //we have id, project_reference_number
										 $project_id = null;
										 $project_reference_number = null ;
										 $pdetail_token = null ;
										 ///
										 foreach( $query as $q)
										 {
										   $project_id = $q['id'];
										   $project_reference_number = $q['project_reference_number'];
										   $pdetail_token = $q['token'];
										 }
										 // step 2 
										 //we need to query for this id in table eaiprojectdeveloper
										 $query2 = Doctrine_Core::getTable('EIAProjectDeveloper')->queryForId($project_id);
										 $queried_id = null ;
										 $pdeveloper_token = null;
										 foreach($query2 as $q)
										 {
										  $queried_id = $q['id'];
										  $pdeveloper_token = $q['token'];
										 }
										 //step 3
										 //we also query for this id in table eiprojectdecsription
										 $query3 = Doctrine_Core::getTable('EIAProjectDescription')->queryForId($project_id);
										 $queried_id2 = null ;
										 $pdescription_token = null ;
										 
										 foreach($query3 as $q)
										 {
										  $queried_id2 = $q['id'];
										   $pdescription_token = $q['token'];
										 }
										 /// step 4
										 $query3 = Doctrine_Core::getTable('EIAProjectSurrounding')->queryForId($project_id);
										 $queried_id3 = null ;
										 $psurrounding_token = null ;
										 
										 foreach($query3 as $q)
										 {
										  $queried_id3 = $q['id'];
										   $psurrounding_token = $q['token'];
										 }
										  //we also query for this id in table eiprojectsorroundingspecies. we will pass id for
										  //EIAProjectSurrounding
										  //step 5
										 $query4 = Doctrine_Core::getTable('EIAProjectSurroundingSpecies')->queryForId($queried_id2);
										 $queried_id4 = null ;
										 
										 
										 foreach($query4 as $q)
										 {
										   $queried_id4 = $q['id'];
										   $psurrounding_species_token = $q['token'];
										 }
										 //step 6
										  $query5 = Doctrine_Core::getTable('EIAProjectSocialEconomic')->queryForId($project_id);
										 $queried_id5 = null ;
										 
										 
										 foreach($query5 as $q)
										 {
										   $queried_id5 = $q['id'];
										   $psocial_economic_token = $q['token'];
										 }
										 //step 7
										   $query6 = Doctrine_Core::getTable('EIAProjectImpactMeasures')->queryForId($project_id);
										   $queried_id6 = null ;
										 
										 
										 foreach($query6 as $q)
										 {
										   $queried_id6 = $q['id'];
										   $psocial_impact_token = $q['token'];
										 }
										 //step 8
										    $query7 = Doctrine_Core::getTable('EIAProjectOperationPhase')->queryForId($project_id);
										    $queried_id7 = null ;
										 
										 
										 foreach($query7 as $q)
										 {
										   $queried_id7 = $q['id'];
										   $psocial_operation_token = $q['token'];
										 }
										 //step 9
										  $query8 = Doctrine_Core::getTable('EIAProjectAttachment')->queryForId($project_id);
										    $queried_id8 = null ;
										 
										 
										 foreach($query8 as $q)
										 {
										   $queried_id8 = $q['id'];
										   $attachment_token = $q['token'];
										 }
										// print "queried_id3". $queried_id3; exit;
										 //
								     //  print "Searched id is ".$queried_id; exit;
									 
										?>
										<!-- Incase User Has Compeleted step 1 and exited -->
										<?php if($project_id != null && $queried_id == null):?>
										
										  <div class="alert alert-block alert-warning fade in">
																 <strong><?php echo __('Incomplete EIA Application !')?></strong> <br/>
																 <?php echo __('Please Complete (step 2) your Initial application
																 for EIA Certificate for') ?>.  <br/><br/>
												<a href="<?php echo url_for('eiaProjectDeveloper/new?id='.$project_id.'&token='.$pdetail_token) ?>"> 
																<button type="button" class="btn btn-primary"><?php echo __('Complete') ?></button>
												</a>
												&nbsp;&nbsp;
												&nbsp;&nbsp;
												<a href="<?php echo url_for('projectDetail/edit?id='.$project_id.'&token='.$pdetail_token) ?>"> 
																<button type="button" class="btn btn-success"><?php echo __('Review') ?></button>
												</a>
										</div>
										 
										<?php endif; ?>
										<!-- End testing -->
										
										<!-- Incase User Has Compeleted step 1,2 but exited -->
										<?php if($project_id != null && $queried_id2 == null && $queried_id != null):?>
										
										
										
										  <div class="alert alert-block alert-warning fade in">
																 <strong><?php echo __('Incomplete EIA Application !')?></strong> <br/>
																 <?php echo __('Please Complete (step 3) your Initial application
																 for EIA Certificate for') ?>.  <br/><br/>
												<a href="<?php echo url_for('projectDescription/new?id='.$project_id.'&token='.$pdeveloper_token) ?>"> 
																<button type="button" class="btn btn-primary"><?php echo __('Complete') ?></button>
												</a>
												&nbsp;&nbsp;
												&nbsp;&nbsp;
												<a href="<?php echo url_for('projectDetail/edit?id='.$project_id.'&token='.$pdetail_token) ?>"> 
																<button type="button" class="btn btn-success"><?php echo __('Review') ?></button>
												</a>
										</div>
										 
										<?php endif; ?>
										<!-- End testing -->
										
										<!-- Incase User Has Compeleted step 1,2,3 but exited -->
										<?php if($project_id != null && $queried_id3 == null && $queried_id2 != null):?>
										
										 <?php //if applicant is not yet done with step 3,4,5,6,7,8,9, we hide this section ?>
											  
											  <div class="alert alert-block alert-warning fade in">
																	 <strong><?php echo __('Incomplete EIA Application !')?></strong> <br/>
																	 <?php echo __('Please Complete (step 4) your Initial application
																	 for EIA Certificate for') ?>.  <br/><br/>
													<a href="<?php echo url_for('eiaProjectSurrounding/new?id='.$project_id.'&token='.$pdescription_token) ?>"> 
																	<button type="button" class="btn btn-primary"><?php echo __('Complete') ?></button>
													</a>
													&nbsp;&nbsp;
													&nbsp;&nbsp;
													<a href="<?php echo url_for('projectDetail/edit?id='.$project_id.'&token='.$pdetail_token) ?>"> 
																	<button type="button" class="btn btn-success"><?php echo __('Review') ?></button>
													</a>
											</div>
											
											 
											  
											 
											 
											 
										<?php endif; ?>
										<!-- End testing -->
										
										
										<!-- Incase User Has Compeleted step 1,2,3,4 but exited -->
										<?php if($project_id != null && $queried_id4 == null && $queried_id3 != null):?>
										
										  <div class="alert alert-block alert-warning fade in">
																 <strong><?php echo __('Incomplete EIA Application !')?></strong> <br/>
																 <?php echo __('Please Complete (step 5) your Initial application
																 for EIA Certificate for') ?>.  <br/><br/>
												<a href="<?php echo url_for('projectSorroundingSpecies/new?id='.$project_id.'&token='.$psurrounding_token) ?>"> 
																<button type="button" class="btn btn-primary"><?php echo __('Complete') ?></button>
												</a>
												&nbsp;&nbsp;
												&nbsp;&nbsp;
												<a href="<?php echo url_for('projectDetail/edit?id='.$project_id.'&token='.$pdetail_token) ?>"> 
																<button type="button" class="btn btn-success"><?php echo __('Review') ?></button>
												</a>
										</div>
										 
										<?php endif; ?>
										<!-- End testing -->
										
										<!-- Incase User Has Compeleted step 1,2,3,4,5 but exited -->
										<?php if($project_id != null && $queried_id5 == null && $queried_id4 != null):?>
										<?php 
										   $psorrounding_species_details = Doctrine_Core::getTable('EIAProjectSurroundingSpecies')->getTablePrimaryIdAndToken($queried_id3);
										   $psorrounding_species_id = null;
										   $psorrounding_species_token = null;
										   foreach($psorrounding_species_details as $q)
										   {
										    $psorrounding_species_id = $q['id'];
											$psorrounding_species_token = $q['token'];
										   }
										
										?>
										  <div class="alert alert-block alert-warning fade in">
																 <strong><?php echo __('Incomplete EIA Application !')?></strong> <br/>
																 <?php echo __('Please Complete (step 6) your Initial application
																 for EIA Certificate for') ?>.  <br/><br/>
												<a href="<?php echo url_for('projectSocialEconomic/new?id='.$psorrounding_species_id.'&token='.$psorrounding_species_token) ?>"> 
																<button type="button" class="btn btn-primary"><?php echo __('Complete') ?></button>
												</a>
												&nbsp;&nbsp;
												&nbsp;&nbsp;
												<a href="<?php echo url_for('projectDetail/edit?id='.$project_id.'&token='.$pdetail_token) ?>"> 
																<button type="button" class="btn btn-success"><?php echo __('Review') ?></button>
												</a>
										</div>
										 
										<?php endif; ?>
										<!-- End testing -->
										
										<!-- Incase User Has Compeleted step 1,2,3,4,5,6 but exited -->
										  <?php if($project_id != null && $queried_id6 == null && $queried_id5 != null):?>
										
										  <div class="alert alert-block alert-warning fade in">
																 <strong><?php echo __('Incomplete EIA Application !')?></strong> <br/>
																 <?php echo __('Please Complete (step 7) your Initial application
																 for EIA Certificate for') ?>.  <br/><br/>
												<a href="<?php echo url_for('projectImpactMeasures/new?id='.$queried_id5.'&token='.$psocial_economic_token) ?>"> 
																<button type="button" class="btn btn-primary"><?php echo __('Complete') ?></button>
												</a>
												&nbsp;&nbsp;
												&nbsp;&nbsp;
												<a href="<?php echo url_for('projectDetail/edit?id='.$project_id.'&token='.$pdetail_token) ?>"> 
																<button type="button" class="btn btn-success"><?php echo __('Review') ?></button>
												</a>
										</div>
										 
										<?php endif; ?>
										<!-- End testing -->
										
										<!-- Incase User Has Compeleted step 1,2,3,4,5,6, 7 but exited -->
										  <?php if($project_id != null && $queried_id7 == null && $queried_id6 != null):?>
										
										  <div class="alert alert-block alert-warning fade in">
																 <strong><?php echo __('Incomplete EIA Application !')?></strong> <br/>
																 <?php echo __('Please Complete (step 8) your Initial application
																 for EIA Certificate for') ?>.  <br/><br/>
												<a href="<?php echo url_for('projectOperationPhase/new?id='.$project_id.'&token='.$psocial_impact_token) ?>"> 
																<button type="button" class="btn btn-primary"><?php echo __('Complete') ?></button>
												</a>
												&nbsp;&nbsp;
												&nbsp;&nbsp;
												<a href="<?php echo url_for('projectDetail/edit?id='.$project_id.'&token='.$pdetail_token) ?>"> 
																<button type="button" class="btn btn-success"><?php echo __('Review') ?></button>
												</a>
										</div>
										 
										<?php endif; ?>
										<!-- End testing -->
										
										<!-- Incase User Has Compeleted step 1,2,3,4,5,6, 7,9 but exited -->
										  <?php if($project_id != null && $queried_id8 == null && $queried_id7 != null):?>
										
										  <div class="alert alert-block alert-warning fade in">
																 <strong><?php echo __('Incomplete EIA Application !')?></strong> <br/>
																 <?php echo __('Please Complete (step 9) your Initial application
																 for EIA Certificate for') ?>.  <br/><br/>
												<a href="<?php echo url_for('projectAttachment/new?id='.$project_id.'&token='.$psocial_operation_token) ?>"> 
																<button type="button" class="btn btn-primary"><?php echo __('Complete') ?></button>
												</a>
												&nbsp;&nbsp;
												&nbsp;&nbsp;
												<a href="<?php echo url_for('projectDetail/edit?id='.$project_id.'&token='.$pdetail_token) ?>"> 
																<button type="button" class="btn btn-success"><?php echo __('Review') ?></button>
												</a>
										</div>
										 
										<?php endif; ?>
										<!-- End testing -->
										<?php if($project_id == null):?>
										 <div class="alert alert-block alert-info fade in">
										<strong><?php echo __('Alert!') ?></strong> <br/><?php echo __('There are no applications for EIA Certificate for your account! ');?><br/>
										<a href="<?php echo url_for('projectDetail/new') ?>">
										<button type="button" class="btn btn-success"><?php echo __('Apply for EIA Certificate') ?></button></a>
										</div>
										<?php endif; ?>
										
										
										
										
										<?php endif; ?>
										<?php if(count($eiaStatus) != 0): ?>
										<table class="table table-hover table-striped">
										<?php foreach($eiaStatus as $status): ?>
										<tr>
										<th>Project Title</th>
										<th>Status</th>
										</tr>
										<tr>
										<td><?php echo $status['project_title'] ?></td>
										<td><span class="label label-info"><?php echo $status['application_status'] ?></span></td>
										</tr>
										<?php endforeach; ?>
										</table>
										<?php if($status['application_status'] == 'rejected'): ?>
										<div class="progress progress-danger">
											<div style="width:<?php echo $status['percentage'] ?>%;" class="bar"></div>
										</div>
										<?php endif; ?>
										<?php if($status['application_status'] == 'resubmit'): ?>
										<div class="progress progress-warning">
											<div style="width:<?php echo $status['percentage'] ?>%;" class="bar"></div>
										</div>
										<?php endif; ?>
										<?php if($status['application_status'] != 'rejected' && $status['application_status'] != 'resubmit'): ?>
										<div class="progress progress-striped progress-success active">
											<div style="width:<?php echo $status['percentage'] ?>%;" class="bar"></div>
										</div>
										<?php endif; ?>
										<div class="alert alert-block alert-info fade in">
											<button type="button" class="close" data-dismiss="alert">x</button>
											<p><?php echo $status['comments'] ?></p>
											<!-- resubmission -->
											<?php if($briefDecision[0]['decision'] == 'resubmit' && $status['application_status'] == 'resubmit'): ?>
											<a href="#widget-resubmission" data-toggle="modal">
											<button type="button" class="btn btn-block"><?php echo __('More info') ?></button></a>
											<?php endif; ?>	
											<?php if($briefDecision[0]['decision'] == 'rejected' && $status['application_status'] == 'rejected'): ?>
											<a href="#widget-rejected" data-toggle="modal">
											<button type="button" class="btn btn-block"><?php echo __('More info') ?></button></a>
											<?php endif; ?>	
											<?php if($status['application_status'] == 'EIStudy'): ?>
											<a href="#widget-EIR" data-toggle="modal">
											<button type="button" class="btn btn-block"><?php echo __('More info') ?></button></a>
											<?php endif; ?>	
											<?php if($status['application_status'] == 'certificate'): ?>
											<?php echo button_to('Certificate','/uploads/documents/eiacertificates/certificate.pdf',array('target' => '_blank','class' => 'btn btn-success btn-block')) ?>
											<?php endif; ?>	
											<?php if($status['application_status'] == 'letter'): ?>
											<?php echo button_to('Letter','/uploads/documents/eia_letter/letter.pdf',array('target' => '_blank','class' => 'btn btn-success btn-block')) ?>
											<?php endif; ?>	
										</div>
										<?php endif; ?>
									</div>
										
								</div>
								<?php //to make it possible for users to resubmit, we will access the table EIReportResubmission
                                        //we check for report EIReport submitted by this user whose status is awaitingresubmission
									$user_id = sfContext::getInstance()->getUser()->getGuardUser()->getUserName();
								
									$query_status = Doctrine_Core::getTable('EIReportResubmission')->checkResubmissionStatus($user_id );	
									$value_status = null;
									$value_status_name = null;
									//$attachment = null ;
									foreach($query_status as $q)
									{
									 $value_status = $q['eiaproject_id'];
									 $value_status_name = $q['status'];
									}
				                    ?>
								<?php if($value_status != null): ?>
								<a href="<?php echo url_for('eiReport/edit?id='.$value_status.'&status='.$value_status_name) ?>">
											<button type="button" class="btn btn-block"><?php echo __('Resubmit Report') ?></button></a>
								<!-- --------------->			
									<?php	$query_doc = Doctrine_Core::getTable('EIReportResubmission')->getCommentsDocument( $value_status);	
									$attachment = null ;
									///
									foreach($query_doc as $doc)
									{
									 $attachment = $doc['commets_doc']; 
									}
								//	print "Attachment is".$attachment."-".$user_id.'-'.$value_status;
									?>
								<div class="alert alert-block alert-success">	
								<?php echo link_to('Please download comments document', '/uploads/documents/eia_documents/user_eireports/'.$attachment, array('target' => '_blank')); ?>	
								<!-- ---------------->
                                </div>								
								<?php endif; ?>
								<!-- end EIA -->	 
								
								<!-- Tweets -->
								
							<!-- BEGIN NOTIFICATIONS PORTLET-->
							<div class="widget">
								<div class="widget-title">
									<h4><i class="icon-twitter"></i><?php echo __('Tweets @RDBrwanda') ?></h4>							
								</div>
									<ul class="item-list scroller padding" data-height="307" data-always-visible="1">
										<div id="js-twitter-feed-ivow" class="widget-body">
										   
										</div>
									</ul>
							</div>
							<!-- END NOTIFICATIONS PORTLET-->
						
								<!-- End Tweets -->
								
									
						
							</div>
								
							</div>
							
			</div> 
			
			
		</div>
						
					</div>
					
	<!-- End overview -->
<div id="widget-resubmission" class="modal hide">
		<div class="modal-header">
			<button data-dismiss="modal" class="close" type="button"><?php echo __('X') ?></button>
			<h3><?php echo __('Reason for resubmission') ?></h3>
		</div>
		<div class="modal-body">
			<p><?php echo html_entity_decode($briefDecision[0]['comments']) ?></p>
			
		</div>
		<div class="modal-footer">
			<button data-dismiss="modal" class="btn" aria-hidden="true"><?php echo __('Close') ?></button>
			<?php if($briefDecision[0]['all_form']): ?>
			<?php echo button_to('Proceed','projectDetail/edit?id='.$resubmit_id,array('class' => 'btn btn-success')) ?>
			<?php //endif; ?>
			<?php elseif($briefDecision[0]['project_detail']): ?>
			<?php echo button_to('Proceed','projectDetail/edit?id='.$resubmit_id,array('class' => 'btn btn-success')) ?>
			<?php //endif; ?>
			<?php elseif($briefDecision[0]['project_developer']): ?>
			<?php echo button_to('Proceed','eiaProjectDeveloper/edit?id='.$resubmit_id,array('class' => 'btn btn-success')) ?>
			<?php //endif; ?>
			<?php elseif($briefDecision[0]['project_description']): ?>
			<?php echo button_to('Proceed','projectDescription/edit?id='.$resubmit_id,array('class' => 'btn btn-success')) ?>
			<?php //endif; ?>
			<?php elseif($briefDecision[0]['project_surrounding']): ?>
			<?php echo button_to('Proceed','eiaProjectSurrounding/edit?id='.$resubmit_id,array('class' => 'btn btn-success')) ?>
			<?php //endif; ?>
			<?php elseif($briefDecision[0]['project_surrounding_species']): ?>
			<?php echo button_to('Proceed','projectSorroundingSpecies/edit?id='.$resubmit_id,array('class' => 'btn btn-success')) ?>
			<?php //endif; ?>
			<?php elseif($briefDecision[0]['project_social_economic']): ?>
			<?php echo button_to('Proceed','projectSocialEconomic/edit?id='.$resubmit_id,array('class' => 'btn btn-success')) ?>
			<?php //endif; ?>
			<?php elseif($briefDecision[0]['project_impact_measures']): ?>
			<?php echo button_to('Proceed','projectImpactMeasures/edit?id='.$resubmit_id,array('class' => 'btn btn-success')) ?>
			<?php //endif; ?>
			<?php elseif($briefDecision[0]['project_operation_phase']): ?>
			<?php echo button_to('Proceed','projectOperationPhase/edit?id='.$resubmit_id,array('class' => 'btn btn-success')) ?>
			<?php //endif; ?>
			<?php elseif($briefDecision[0]['project_attachment']): ?>
			<?php echo button_to('Proceed','projectAttachment/edit?id='.$resubmit_id,array('class' => 'btn btn-success')) ?>
			<?php endif; ?>
		</div>
</div>
	

<div id="widget-rejected" class="modal hide">
		<div class="modal-header">
			<h3><?php echo __('Application Rejected') ?></h3>
		</div>
		<div class="modal-body">
			<p><?php echo __('Your application has been rejected.More information below') ?>.</p>
			<blockquote><p><?php echo html_entity_decode($briefDecision[0]['comments']) ?></p></blockquote>
			<p><?php echo __('Proceed toapply for a new application') ?>.</p>
		</div>
		<div class="modal-footer">
			<button data-dismiss="modal" class="btn" aria-hidden="true"><?php echo __('Close') ?></button>
			<?php echo button_to('Proceed','projectDetail/new',array('class' => 'btn btn-success')) ?>
		</div>
</div>
<div id="widget-EIR" class="modal hide">
		<div class="modal-header">
			<h3><?php echo __('Environmental Impact Study') ?></h3>
		</div>
		<div class="modal-body">
			<p><?php echo __('Your application has been assessed and approved for environmental impact study to be conducted') ?>.</p>
			<p><?php echo __('Check your email for more information from the data administrator') ?></p>
			<p><?php echo button_to('Inbox','messages/index',array('class' => 'btn btn-info')) ?></p>
			<p><?php echo __('If EI report is ready,please proceed to upload it') ?>.</p>
		</div>
		<div class="modal-footer">
			<button data-dismiss="modal" class="btn" aria-hidden="true"><?php echo __('Close') ?></button>
			<?php echo button_to('Proceed','eiReport/new',array('class' => 'btn btn-success')) ?>
		</div>
</div>
<!-- For Twitter -->
<script>
$(function() {
///
var url = 'https://api.twitter.com/1/statuses/user_timeline.json?screen_name=RDBrwanda&count=3&include_rts=1',
    tmpl_tweet = '<a href="{{tweet_url}}" target="_blank"><img src="{{profile_image_url}}" class="profile-image" alt="" /><span class="screen-name">{{screen_name}}</span><span class=".item-list scroller padding">{{tweet}}</span><time datetime="{{created_at_iso}}" title="{{created_at_formatted}}">{{created_at_formatted}}</time></a>';

$('#js-twitter-feed-ivow').tweets( url, {
  tmpl_tweet: tmpl_tweet
});
  // Get 5 tweets from @ivow
 /* $('#js-twitter-feed-ivow').tweets('https://api.twitter.com/1/statuses/user_timeline.json?screen_name=CNN&count=5&include_rts=1', {
	doneCallback: function(){
	  try {
		$('.twitter-feed time').timeago();
	  } catch(e) {

	  }
	}
  }); */

  
});
</script>


<!-- --->
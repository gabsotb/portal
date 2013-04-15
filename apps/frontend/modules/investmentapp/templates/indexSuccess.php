<script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'cont',
                type: 'column',
				height: 500,
				width: 650
            },
            title: {
                text: '<?php echo __('RDB Performance Analysis, year 2013')?>'
            },
            subtitle: {
                text: '<?php echo __('Source: RDB E-portal System') ?>'
            },
            xAxis: {
                categories: [
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'May',
                    'Jun',
                    'Jul',
                    'Aug',
                    'Sep',
                    'Oct',
                    'Nov',
                    'Dec'
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: '<?php echo __('Number of Transaction Processed') ?>'
                }
            },
            legend: {
                layout: 'vertical',
                backgroundColor: '#FFFFFF',
                align: 'left',
                verticalAlign: 'top',
                x: 100,
                y: 70,
                floating: true,
                shadow: true
            },
            tooltip: {
                formatter: function() {
                    return ''+
                        this.x +': '+ this.y +' ';
                }
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
                series: [{
                name: '<?php echo __('Investment Certificates Issued') ?>',
                data: [49.9, 71.5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
    
            }, {
                name: '<?php echo __('EIA Certificates Issued')?>',
                data: [83.6, 78.8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
    
            }, {
                name: '<?php echo __('Tax Exemptions Granted') ?>',
                data: [48.9, 38.8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
    
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
					<div class="row-fluid stats-overview-cont">
						<div class="span2 responsive" data-tablet="span4" data-desktop="span2">
							<div class="stats-overview block clearfix">
								<div class="display stat ok huge">	
								</div>
								<div class="details">
													<div class="title"><?php echo __('Number of Investment Certificates Issued')?></div>
									<div class="numbers"><?php
										echo "0";
									?></div>
								</div>
								
							</div>
						</div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<div class="span2 responsive" data-tablet="span4" data-desktop="span2">
							<div class="stats-overview block clearfix">
								<div class="display stat good huge">
									
									
								</div>
								<div class="details">
													<div class="title"><?php echo __('Number Of IEA Certificates Issued') ?></div>
									<div class="numbers">
									<?php
									   // echo (count($overall_ieapplications)); 
									   echo "0";
									?>
									</div>
									
								</div>
							</div>
						</div>
						<div class="span2 responsive " data-tablet="span4" data-desktop="span2">
							<div class="stats-overview block clearfix">
								<div class="display stat bad huge">
									
									
								</div>
								<div class="details">
													<div class="title"><?php echo __('Tax Exemptions Granted') ?></div>
									<div class="numbers"><?php 
									$value = 0;
									print $value;
									
									?></div>
									
								</div>
							</div>
						</div>
						
						
						
					</div>
				</div>
				
			</div>
			<!-- Begin Graph for User to analyze RDB Processing Power -->
			<div class="widget">
				  <div class="widget-title">
									<h4><i class="icon-signal"></i><?php echo __('Graphical Analysis - RDB Overall Perfomance Representation') ?></h4>
											
				</div>
				<div id="cont" class="widget-body">
					
				</div>
			</div> <!-- END Graph-->
			
			
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
											<button data-dismiss="modal" class="close" type="button">�</button>
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
										<?php if(count($eiaStatus)>0): ?>
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
										<?php if($status['application_status'] != 'rejected'): ?>
										<div class="progress progress-striped progress-success active">
											<div style="width:<?php echo $status['percentage'] ?>%;" class="bar"></div>
										</div>
										<?php endif; ?>
										<div class="alert alert-block alert-info fade in">
											<button type="button" class="close" data-dismiss="alert">x</button>
											<p><?php echo $status['comments'] ?></p>
											<!-- resubmission -->
											<?php if($briefDecision[0]['decision'] == 'resubmit'): ?>
											<a href="#widget-resubmission" data-toggle="modal">
											<button type="button" class="btn btn-block"><?php echo __('More info') ?></button></a>
											<?php endif; ?>	
											<?php if($briefDecision[0]['decision'] == 'rejected'): ?>
											<a href="#widget-rejected" data-toggle="modal">
											<button type="button" class="btn btn-block"><?php echo __('More info') ?></button></a>
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
								
									
									
						
							</div>
								
							</div>
							
			</div> 
			
			
		</div>
						
					</div>
					
	<!-- End overview -->
<div id="widget-resubmission" class="modal hide">
		<div class="modal-header">
			<h3><?php echo __('Reason for resubmission') ?></h3>
		</div>
		<div class="modal-body">
			<p><?php echo $briefDecision[0]['comments'] ?></p>
			<button data-dismiss="modal" class="close" type="button"><?php echo __('X') ?></button>
		</div>
</div>
	
<div id="widget-rejected" class="modal hide">
		<div class="modal-header">
			<h3><?php echo __('Reason for rejection') ?></h3>
		</div>
		<div class="modal-body">
			<p><?php echo $briefDecision[0]['comments'] ?></p>
			<button data-dismiss="modal" class="close" type="button"><?php echo __('X') ?></button>
		</div>
</div>

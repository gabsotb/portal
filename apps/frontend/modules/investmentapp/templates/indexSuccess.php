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
														<th>Status</th>
														
													</tr>
												</thead>
												<tbody>
												  
													<tr>
														<?php foreach($applications as $apps): ?>
														<?php $point = $apps['percentage'] ?>
														<?php $commentI = $apps['comment'] ?>
														 <td><?php echo $apps['name'] ?></td>
														  <td><span class="label label-success"><?php echo $apps['application_status'] ?></span></td>
														<?php endforeach; ?>
													</tr>
													
												</tbody>
											</table>
											</div>
											<div class="progress progress-striped active">
												<div style="width: <?php echo $point?>%;" class="bar"></div>
											</div>									
											
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
											$response = null;
											//print_r($p); exit;
											//
											foreach($p as $r)
											{
											 $response = $r['investment_id'];
											}
											// 
											  
											?>
										<?php if($investment_id != null){ ?>
										 
											 <!-- if it is null we show buttons -->
											 <?php if($response == null) { ?>
												 <div class="alert alert-block alert-warning fade in">
																 <strong><?php echo __('Incomplete Application !')?></strong> <br/>
																 <?php echo __('Please Complete your Initial application
																 for Investment Certificate for') ?> <?php echo $business_name; ?>.  <br/><br/>
												<a href="<?php echo url_for('businessplan/new?id='.$business_name.'&token='.$token) ?>"> 
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
														    <strong><?php echo __('Alert!') ?></strong> <br/><?php echo __('There are no applications
																		for investment certificate for your account! <br/>') ?>
														 <a href="<?php echo url_for('investmentapp/new') ?>">
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
															 <a href="<?php echo url_for('investmentapp/edit?id='.$investment_id.'&token='.$token) ?>"><button class="btn btn-warning"><i class="icon-plus icon-white"></i><?php echo ('__Yes') ?></button> </a>&nbsp;&nbsp;&nbsp;
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
										<div class="alert alert-block alert-info fade in">
										<strong><?php echo __('Alert!') ?></strong> <br/><?php echo __('There are no applications for EIA Certificate for your account! ');?><br/>
										<a href="<?php echo url_for('projectDetail/new') ?>">
										<button type="button" class="btn btn-success"><?php echo __('Apply for EIA Certificate') ?></button></a>
										</div>
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
										<td><?php echo $status['application_status'] ?></td>
										</tr>
										<?php endforeach; ?>
										</table>
										<div class="progress progress-striped progress-success active">
											<div style="width:<?php echo $status['percentage'] ?>%;" class="bar"></div>
										</div>
										<div class="alert alert-block alert-info fade in">
											<button type="button" class="close" data-dismiss="alert">x</button>
											<p><?php echo $status['comments'] ?></p>
											<!-- resubmission -->
											<?php if(count($briefDecision)!=0): ?>
											<a href="#widget-resubmission" data-toggle="modal">
											<button type="button" class="btn btn-block"><?php echo __('More info') ?></button></a>
												
											<?php endif; ?>
										</div>
										<?php endif; ?>
									</div>
											
								</div>
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
	

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
                text: 'RDB Performance Analysis, year 2013'
            },
            subtitle: {
                text: 'Source: RDB E-portal System'
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
                    text: 'Number of Transaction Processed'
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
                name: 'Investment Certificates Issued',
                data: [49.9, 71.5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
    
            }, {
                name: 'EIA Certificates Issued',
                data: [83.6, 78.8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
    
            }, {
                name: 'Tax Exemptions Granted',
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
							Dashboard
							<small>Register and monitor applications for EIA and Investment Certificates Applications.</small>
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="#">Home</a> <span class="divider">/</span>
							</li>
							<li>
							<i class="icon-desktop"></i>
							<a href="#">Dashboard</a></li> <span class="divider">/</span>
							<li>
							<i class="icon-user"></i>
							<a href="#">
							   <b>
								  <font color="blue">
									<?php $username = sfContext::getInstance()->getUser()->getGuardUser()->getUsername();
                                      print 'Welcome, You are logged in as '.$username;
									?>
									</font>
								</b>
							</a></li>
							<li class="pull-right dashboard-report-li">
							<i class="icon-time"></i>
				              Logged in on <font color="blue">
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
									<h4><i class="icon-signal"></i>General RDB Performace Analysis</h4>						
								</div>
								<div class="alert alert-block alert-info fade in">
											
											<h4 class="alert-heading">Information</h4>
											<p>
												Below statistics for Investment Certificates issued, EIA Certificates Issued and Tax Exmptions
												Request Granted to Registered Investors. This is an Overall Representation
											</p>
							    </div>
								<div class="widget-body">
									<div class="row-fluid stats-overview-cont">
										<div class="span2 responsive" data-tablet="span4" data-desktop="span2">
											<div class="stats-overview block clearfix">
												<div class="display stat ok huge">	
												</div>
												<div class="details">
													<div class="title">Number of Investment Certificates Issued</div>
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
													<div class="title">Number Of IEA Certificates Issued</div>
													<div class="numbers">
													<?php
                                                        echo (count($overall_ieapplications));
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
													<div class="title">Tax Exemptions Granted</div>
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
									<h4><i class="icon-signal"></i>Graphical Analysis - RDB Overall Perfomance Representation</h4>
															
								</div>
								<div id="cont" class="widget-body">
									
								</div>
							</div> <!-- END Graph-->
							
							
						</div>
						<div class="span4">
						
							
							<div class="widget">
											<div class="widget-title">
												<h4><i class="icon-bell"></i>Status of Applications</h4>						
											</div>
											<div class="widget-body">
											<!-- BEGIN Investment Certificate Widget-->
											
											<div class="widget">
															<div class="widget-title">
																<h4>Investment Certificate Application</h4>						
															</div>
												<?php if(count($investment_applications) > 0): ?>
														 <div class="widget-body">
																<!-- table to list company information -->
																   <div class="widget">
														<div class="widget-title">
															<h4><i class="icon-reorder"></i>Progress Monitor</h4>
															 
														</div>
														<div class="widget-body">
														   <div class="scroller" data-height="200px">
															<table class="table table-hover">
																<thead>
																	<tr>
																		
																		<th>Company</th>
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
																	<h4 class="alert-heading">Comments</h4>
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
															 //
															 foreach($q as $res)
															 {
															   $investment_id = $res['id'];
															   $business_name = $res['name'];
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
																 <strong>Incomplete Application !</strong> <br/>Please Complete your Initial application
																 for Investment Certificate for <?php echo $business_name; ?>.  <br/><br/>
																<a href="<?php echo url_for('businessplan/new?id='.$business_name) ?>"> 
																<button type="button" class="btn btn-primary">Complete</button>&nbsp;&nbsp;
																&nbsp;&nbsp;
																</a>
																<a href="<?php echo url_for('investmentapp/edit?id='.$investment_id) ?>"> 
																<button type="button" class="btn btn-success">Review</button>
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
																  <strong>Alert!</strong> <br/>There are no New applications
																		for investment certificate for your account! However your have <?php echo $value; ?>
																		complete application(s) for Investment Certificate. Click Button Below to apply for 
																		Certification of another business. 
																<br/> 
																 <a href="<?php echo url_for('investmentapp/new') ?>">
																 <button type="button" class="btn btn-primary">Apply for Investment Certificate</button>
																 </a>
																<?php } ?>
															    <?php if($value <= 0) { ?>
																	  <strong>Alert!</strong> <br/>There are no applications
																		for investment certificate for your account! <br/>
																		 <a href="<?php echo url_for('investmentapp/new') ?>">
																		 <button type="button" class="btn btn-primary">Apply for Investment Certificate</button>
																		 </a>
																<?php } ?>
															
												<!--we will prevent users from applying for certificate if they have pending applications -->
                                                         
														
														  <?php } ?> 
															</div>
														<?php endif; ?>
															   
											  </div><!-- End Investment Certificate Application Widget -->
												<!-- Begin EIA Certificate application widget -->
												
												 <div class="widget">
															<div class="widget-title">
																<h4>EIA Certificate Application</h4>						
															</div>
													<?php if(count($eia_applications) > 0): ?>
													<?php foreach($eiaStatus as $status): ?>
												  <div class="widget-body">
																<!-- table to list company information -->
																
													<div class="widget">
														<div class="widget-title">
															<h4><i class="icon-reorder"></i>Progress Monitor</h4>
															 
														</div>
														<div class="widget-body">
														   <div class="scroller" data-height="200px">
															<table class="table table-hover">
																<thead>
																	<tr>
																		
																		<th>Company</th>
																		<th>Status</th>
																		
																	</tr>
																</thead>
																<tbody>
																	<tr>
																		
																		<td><?php echo $status['name'] ?></td>
																		<?php switch($status['application_status']){
																				case 'processed':
																					$label="label-success";
																					break;
																				case 'processing':
																					$label="label-warning";
																					break;
																				case 'submitted':
																					$label="label-success";
																					break;
																				default:
																					$label=NULL;
																		}?>
																		
																		<td><span class="label <?php echo $label ?>"><?php echo $status['application_status'] ?></span></td>
																	</tr>
																	
																</tbody>
															</table>
															</div>
															
															<div class="progress progress-striped progress-success active">
																<div style="width: <?php echo $status['percentage'] ?>%;" class="bar"></div>
															</div>									
															
														</div>
													</div>
																<!-- end table -->
																<div class="alert alert-block alert-info fade in">
																	<h4 class="alert-heading">Comments</h4>
																	<p>
																		<?php echo $status['comments'] ?>
																	</p>
																</div>
																
											   </div>
											   <?php endforeach; ?>
											   <?php endif; ?>
											          <?php if(count($eia_applications) == 0 || is_null($eia_applications)): ?>
															<div class="alert alert-error">
										                    <strong>Alert!</strong> <br/>There are no applications
															for EIA certificate for your account!
															<br/><?php echo button_to('Apply for EIA Certificate','eia/new',array('class' => 'btn btn-success')); ?>
															</div>
													  <?php endif; ?>
													<?php //foreach($torStatus as $tors): ?>
													<?php //if(is_null($torStatus)): ?>
													<?php foreach($impacts as $impact): ?>
														<?php switch($impact->getImpactLevel()){
																case 0:
																	echo button_to('ReApply', 'eia/edit?id='.$imapact->getId(), array('class' => 'btn')); 
																	break;
																case 1:
																	echo button_to('Download Clearance Letter', 'eia/clearance?id='.$impact->getCompanyId(), array('class' => 'btn'));
																	break;
																case 2:
																	echo button_to('Fill TOR', 'tor/new', array('class' => 'btn')); 
																	break;
																case 3:
																	echo button_to('Fill TOR', 'tor/new', array('class' => 'btn')); 
																	break;
																	
															}
														?>
													<?php endforeach; ?>
													<?php //endif; ?>
													<?php //endforeach; ?>
													
										
											   </div>
										      	<!-- end EIA -->
											</div>
											
							</div> 
							
							
						</div>
						
					</div>
					
	<!-- End overview -->
	
	
</div>
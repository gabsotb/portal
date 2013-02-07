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
 <div class="row-fluid stats-overview-cont">
						<div class="span2 responsive" data-tablet="span4" data-desktop="span2">
							<div class="stats-overview block clearfix">
								<div class="details">
								  <b>
								  <font color="blue">
									<?php $username = sfContext::getInstance()->getUser()->getGuardUser()->getUsername();
                                      print 'Welcome, You are logged in as '.$username;
									?>
									</font>
								</b>
								</div>
							</div>
						</div>
						<div class="span2 responsive" data-tablet="span4" data-desktop="span2">
							<div class="stats-overview block clearfix">
								<div class="details">
									<img  src="<?php sfConfig::get('sf_web_dir')?>/portal/web/images/logordb.png" alt ="LOGO" />
								</div>
							</div>
						</div>
						<div class="span2 responsive " data-tablet="span4" data-desktop="span2">
							<div class="stats-overview block clearfix">
							<div class="title">Logged in on</div>
								<div class="details">
								 <b>
								  <font color="blue">
									<?php
                                       $date = date("F j, Y");
									   print $date;
									?>
									</font>
								</b>
								</div>
							</div>
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
                                                        echo (count($overall_investmentapps));
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
										                    <strong>Alert!</strong> <br/>There are no applications
															for investment certificate for your account!
														      </div>
															<?php endif; ?>
															
												     <a href="<?php echo url_for('investmentapp/new') ?>">
													 <button type="button" class="btn btn-primary">Apply for Investment Certificate</button>
													 </a>
															   
											  </div><!-- End Investment Certificate Application Widget -->
												<!-- Begin EIA Certificate application widget -->
												 <div class="widget">
															<div class="widget-title">
																<h4>EIA Certificate Application</h4>						
															</div>
																<?php if(count($eia_applications) > 0): ?>
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
																		<td>Boniboy Construction Ltd</td>
																		<td><span class="label label-success">Submitted</span></td>
																	</tr>
																	
																</tbody>
															</table>
															</div>
															<div class="progress progress-striped progress-success active">
																<div style="width: 40%;" class="bar"></div>
															</div>									
															
														</div>
													</div>
																<!-- end table -->
																<div class="alert alert-block alert-info fade in">
																	<h4 class="alert-heading">Comments</h4>
																	<p>
																		You application for EIA Certificate submitted
																	</p>
																</div>
																
											   </div>
											   <?php endif; ?>
											          <?php if(count($eia_applications) <= 0): ?>
															<div class="alert alert-error">
										                    <strong>Alert!</strong> <br/>There are no applications
															for EIA certificate for your account!
														      </div>
													  <?php endif; ?>
													<button type="button" class="btn btn-success">Apply for EIA Certificate</button>
												
											   </div>
										      	<!-- end EIA -->
											</div>
											
							</div> 
							
							
						</div>
						
					</div>
					
	<!-- End overview -->
	
	
</div>
<!--some Javascripts for Loading High Charts Graph -->
 <script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'cont',
                type: 'column',
				height: 500,
				width: 700
            },
            title: {
                text: 'RDB Tasks Performance Analysis. Year 2013'
            },
            subtitle: {
                text: 'Source: Rwanda Development Board'
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
                    text: 'Number of Items Processed'
                }
            },
			credits:
				{
					enabled: false
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
                name: 'Investment Certificates',
                data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
    
            }, {
                name: 'EIA Certificates',
                data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]
    
            }, {
                name: 'Tax Exemptions',
                data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]
    
            }, {
                name: 'Visa Issued',
                data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]
    
            }]
        });
    });
    
});
		</script>
<!-- End js code -->
<div id="page" class="dashboard">
<!-- ******************************************************************* -->
<?php if($sf_user->hasCredential('assignJob')): ?>
<!-- The Logged in User only see this part if he/she has the right to assign a job to an administrator. This User is in the Managers Category-->

      <div class="row-fluid">
	  
	        <div class="span12">
						<!-- BEGIN STYLE CUSTOMIZER-->
						<!-- END STYLE CUSTOMIZER-->    	
						<!-- BEGIN PAGE TITLE & BREADCRUMB-->		
						<h3 class="page-title">
							Managers Account
							<small>Assign Tasks and Manage User Accounts</small>
						</h3>
							<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="<?php echo url_for('dashboard/index')?>">Dashboard</a> <span class="divider">/</span>
							</li>
							<li>
							<i class="icon-desktop"></i>
							<a href="<?php echo url_for('dashboard/index')?>">Manager</a></li> <span class="divider">/</span>
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
	  
	  
		<!-- BEGIN OVERVIEW STATISTIC BARS-->
							<div class="row-fluid stats-overview-cont">
								<div class="span2 responsive" data-tablet="span4" data-desktop="span2">
									<div class="stats-overview block clearfix">
										<div class="display stat ok huge">
											<span class="line-chart">5, 6, 7, 11, 14, 10, 15, 19, 15, 2</span>
											<div class="percent">+66%</div>
										</div>
										<div class="details">
											<div class="title">Total Registered Investors</div>
											<div class="numbers">1360</div>
										</div>
										<div class="progress progress-info">
											<div class="bar" style="width: 66%"></div>
										</div>
									</div>
								</div>
								<div class="span2 responsive" data-tablet="span4" data-desktop="span2">
									<div class="stats-overview block clearfix">
										<div class="display stat good huge">
											<span class="line-chart">2,6,8,12, 11, 15, 16, 11, 16, 11, 10, 3, 7, 8, 12, 19</span>
											<div class="percent">+16%</div>
										</div>
										<div class="details">
											<div class="title">Total Investment Certificates Issued</div>
											<div class="numbers">1800</div>
											<div class="progress progress-warning">
												<div class="bar" style="width: 16%"></div>
											</div>
										</div>
									</div>
								</div>
								<div class="span2 responsive " data-tablet="span4" data-desktop="span2">
									<div class="stats-overview block clearfix">
										<div class="display stat bad huge">
											<span class="line-chart">2,6,8,11, 14, 11, 12, 13, 15, 12, 9, 5, 11, 12, 15, 9,3</span>
											<div class="percent">+6%</div>
										</div>
										<div class="details">
											<div class="title">Total EIA Certificates Issued</div>
											<div class="numbers">509</div>
											<div class="progress progress-success">
												<div class="bar" style="width: 16%"></div>
											</div>
										</div>
									</div>
								</div>
								<div class="span2 responsive" data-tablet="span4" data-desktop="span2">
									<div class="stats-overview block clearfix">
										<div class="display stat bad huge">
											<span class="line-chart">1,7,9,11, 14, 12, 6, 7, 4, 2, 9, 8, 11, 12, 14, 12, 10</span>
											<div class="percent">+15%</div>
										</div>
										<div class="details">
											<div class="title">Tax Exemptions Granted</div>
											<div class="numbers">2090</div>
											<div class="progress progress-success">
												<div class="bar" style="width: 15%"></div>
											</div>
										</div>
									</div>
								</div>
									<div class="span2 responsive" data-tablet="span4" data-desktop="span2">
									<div class="stats-overview block clearfix">
										<div class="display stat bad huge">
											<span class="line-chart">1,7,9,11, 14, 12, 6, 7, 4, 2, 9, 8, 11, 12, 14, 12, 10</span>
											<div class="percent">+15%</div>
										</div>
										<div class="details">
											<div class="title">Visa Issued by Immigration</div>
											<div class="numbers">2090</div>
											<div class="progress progress-success">
												<div class="bar" style="width: 15%"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
			</div>
		<!-- END STATISTICS -->
<!-- END OVERVIEW STATISTIC BARS-->
					<div class="row-fluid">
						<div class="span6">
							<!-- BEGIN RECENT ORDERS PORTLET-->
							<div class="widget">
								<div class="widget-title">
									<h4>Recent Applications  Investment Certificates</h4>						
								</div>
								<div class="widget-body">
								<?php if(count($new_applications) <= 0): ?>
								<div class="alert alert-info">
										<strong>Information!</strong> <br/>Seems like all applications
										for Investment Certificate have been assigned to data admins or there are no new applications.
										I will try later... 
								</div>
							    <?php  endif; ?>
								<?php if(count($new_applications) != null) : ?>
									<table class="table table-striped table-bordered" id="investment_applications_manager">
										<thead>
											<tr>
												<th><i class="icon-user"></i> <span class="hidden-phone">Submitted by</span></th>
												<th><i class="icon-briefcase"></i> <span class="hidden-phone ">Business Name</span></th>
												<th><i class="icon-time"> </i><span class="hidden-phone">Submitted On</span></th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
										  <?php foreach($new_applications as $available): ?>
											<tr class="odd gradeX">
												<td class="highlight">
													<?php echo $available['updated_by'] ?>
												</td>
												<td><?php echo $available['name'] ?></td>
												<td> <?php echo $available['created_at'] ?> </td>
												<td> <a href="<?php echo url_for('InvestmentCertTaskAssignment/new') ?>"><button class="btn btn-inverse"><i class="icon-refresh icon-white"></i> Assign</button></a></td>
											</tr>
										<?php endforeach;?>	
										
										</tbody>
									</table>
								
							    
									<div class="space7"></div>
									<div class="clearfix">
										<a href="<?php echo url_for('InvestmentCertTaskAssignment/index') ?>" class="btn btn-small btn-primary">View All Assigned Tasks</a>
									</div>
									<?php endif; ?>
								</div>
							</div>
							<!-- END RECENT ORDERS PORTLET-->
						</div>
						<div class="span6">
							<!-- BEGIN RECENT ORDERS PORTLET-->
							<div class="widget">
								<div class="widget-title">
									<h4>Recent Applications for  EIA Certificates</h4>						
								</div>
								<div class="widget-body">
									<?php if(count($unassigned) <= 0): ?>
									<div class="alert alert-block alert-success fade in">
										<p><strong>Information!</strong> <br/>Seems like all applications
										for EIA Certificate have been assigned to data admins or there are no new applications.
										I will try later... </p>
										 
									</div>
									<?php endif ?>
									<?php if(count($unassigned) > 0): ?>
									<table class="table table-striped table-bordered" id="eia_manager">
										<?php foreach($unassigned as $unassign): ?>
										<thead>
											<tr class="odd gradeX">
											  <th><i class="icon-user"> </i><span class="hidden-phone">Submitted By</span></th>
												<th><i class="icon-truck"></i> <span class="hidden-phone ">Developer's Name</span></th>
												<th><i class="icon-time"> </i><span class="hidden-phone">Submitted On</span></th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><?php echo $unassign['first_name'] ?></td>
												<td><?php echo $unassign['name'] ?> </td>
												<td><?php echo $unassign['created_at'] ?></td>
												<td> <a href="<?php echo url_for('EiTaskAssign/new') ?>"><button class="btn btn-inverse"><i class="icon-refresh icon-white"></i> Assign</button></a></td>
									
											</tr>
											
											
										</tbody>
										<?php endforeach ?>
									</table>
									
									<div class="space7"></div>
									<div class="clearfix">
										<a href="#" class="btn btn-small btn-primary">View All Assigned Tasks</a>
									</div>
									<?php endif; ?>
								</div>
							</div>
					</div>	</div>		
         <div class="row-fluid">
                 <div class="span8">
						<div class="widget">
						          <div class="widget-title">
									<h4><i class="icon-signal"></i>RDB Task Processing Performance Pie Chart</h4>
															
								</div>
								<div id="cont" class="widget-body">
									
								</div>
							</div>
							
				 </div>
				 <div class="span4">
					 <div class="widget">
					     <div class="widget-title">
									<h4><i class="icon-bell"></i>Notifications</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									<a href="#widget-config" data-toggle="modal" class="icon-wrench"></a>
									<a href="javascript:;" class="icon-refresh"></a>
									</span>							
						 </div>
						 <div class="widget-body">
						  <ul class="item-list scroller padding" data-height="307" data-always-visible="1">
						  
						 <?php 
						  $user = sfContext::getInstance()->getUser()->getGuardUser()->getUsername();
						 $notification = Doctrine_Core::getTable('Notifications')->getNotifications($user);?>
						 <?php foreach($notification as $notify): ?>
							   <li>
									<span class="label label-success"><i class="icon-bell"></i></span>
									<span><?php echo $notify['message']; ?></span><br/>
									<span class="small italic"><?php 
									date_default_timezone_set('UTC');
									$time = date("H:i:s", strtotime($notify['created_at'])) ;
									echo "Received at ".$time  ;
									
									
									?></span>
								</li>
						<?php endforeach; ?>		
						  </ul>
						 </div>
					 </div>
				 </div>
				 
	     </div>			
<?php endif; ?>
<!-- ********************************************************************** -->

<!-- This is for Supervisors who can also assign jobs to data administrators -->
<?php if($sf_user->hasCredential('investmentassign')): ?>	
<div class="row-fluid">
   <div class="span12">
						<!-- BEGIN STYLE CUSTOMIZER-->
						<!-- END STYLE CUSTOMIZER-->    	
						<!-- BEGIN PAGE TITLE & BREADCRUMB-->		
						<h3 class="page-title">
							Investment Registration Certificate Supervisor account
							<small>Assign Tasks to Investment Certificate Data Administrators</small>
						</h3>
							<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="#">Dashboard</a> <span class="divider">/</span>
							</li>
							<li>
							<i class="icon-desktop"></i>
							<a href="#">Supervisor</a></li> <span class="divider">/</span>
							<li>
							<i class="icon-desktop"></i>
							<a href="#">Investment Certificates</a></li> <span class="divider">/</span>
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
		<div class="row-fluid stats-overview-cont">
								<div class="span2 responsive" data-tablet="span4" data-desktop="span2">
									<div class="stats-overview block clearfix">
										<div class="display stat ok huge">
											<span class="line-chart">5, 6, 7, 11, 14, 10, 15, 19, 15, 2</span>
											<div class="percent">+66%</div>
										</div>
										<div class="details">
											<div class="title">Total No of Assigned Jobs</div>
											<div class="numbers">130</div>
										</div>
										<div class="progress progress-info">
											<div class="bar" style="width: 66%"></div>
										</div>
									</div>
								</div>
								<div class="span2 responsive" data-tablet="span4" data-desktop="span2">
									<div class="stats-overview block clearfix">
										<div class="display stat good huge">
											<span class="line-chart">2,6,8,12, 11, 15, 16, 11, 16, 11, 10, 3, 7, 8, 12, 19</span>
											<div class="percent">+16%</div>
										</div>
										<div class="details">
											<div class="title">Completed Tasks by Assigned Admins</div>
											<div class="numbers">180</div>
											<div class="progress progress-warning">
												<div class="bar" style="width: 16%"></div>
											</div>
										</div>
									</div>
								</div>
								
								<div class="span2 responsive" data-tablet="span4" data-desktop="span2">
									<div class="stats-overview block clearfix">
										<div class="display stat bad huge">
											<span class="line-chart">1,7,9,11, 14, 12, 6, 7, 4, 2, 9, 8, 11, 12, 14, 12, 10</span>
											<div class="percent">+15%</div>
										</div>
										<div class="details">
											<div class="title">Number of Data Admins</div>
											<div class="numbers">20</div>
											<div class="progress progress-success">
												<div class="bar" style="width: 15%"></div>
											</div>
										</div>
									</div>
								</div>
							</div>

</div>   
<div class="row-fluid">
    <div class="span6">
							<!-- BEGIN RECENT ORDERS PORTLET-->
							<div class="widget">
								<div class="widget-title">
									<h4>Recent Applications  Investment Certificates</h4>						
								</div>
								<div class="widget-body">
								<?php if(count($new_applications) <= 0): ?>
								<div class="alert alert-info">
										<strong>Information!</strong> <br/>Seems like all applications
										for Investment Certificate have been assigned to data admins or there are no new applications.
										I will try later... 
								</div>
							    <?php  endif; ?>
								<?php if(count($new_applications) != null) : ?>
									<table class="table table-striped table-bordered" id="investment_applications_manager">
										<thead>
											<tr>
												<th><i class="icon-user"></i> <span class="hidden-phone">Submitted by</span></th>
												<th><i class="icon-briefcase"></i> <span class="hidden-phone ">Business Name</span></th>
												<th><i class="icon-time"> </i><span class="hidden-phone">Submitted On</span></th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
										  <?php foreach($new_applications as $available): ?>
											<tr class="odd gradeX">
												<td class="highlight">
													<?php echo $available['updated_by'] ?>
												</td>
												<td><?php echo $available['name'] ?></td>
												<td> <?php echo $available['created_at'] ?> </td>
												<td> <a href="<?php echo url_for('InvestmentCertTaskAssignment/new') ?>"><button class="btn btn-inverse"><i class="icon-refresh icon-white"></i> Assign</button></a></td>
											</tr>
										<?php endforeach;?>	
										
										</tbody>
									</table>
								
							    
									<div class="space7"></div>
									<div class="clearfix">
										<a href="<?php echo url_for('InvestmentCertTaskAssignment/index') ?>" class="btn btn-small btn-primary">View All Assigned Tasks</a>
									</div>
									<?php endif; ?>
								</div>
							</div>
							<!-- END RECENT ORDERS PORTLET-->
						</div>
			 <div class="span4">
					 <div class="widget">
					     <div class="widget-title">
									<h4><i class="icon-bell"></i>Notifications</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									<a href="#widget-config" data-toggle="modal" class="icon-wrench"></a>
									<a href="javascript:;" class="icon-refresh"></a>
									</span>							
						 </div>
						 <div class="widget-body">
						  <ul class="item-list scroller padding" data-height="307" data-always-visible="1">
						  <?php 
						  $user = sfContext::getInstance()->getUser()->getGuardUser()->getUsername();
						 $notification = Doctrine_Core::getTable('Notifications')->getNotifications($user);?>
						 <?php foreach($notification as $notify): ?>
							   <li>
									<span class="label label-success"><i class="icon-bell"></i></span>
									<span><?php echo $notify['message'] ;?>.</span><br/>
									<span class="small italic"><?php
									date_default_timezone_set('UTC');
									$time = date("H:i:s", strtotime($notify['created_at'])) ;
									echo "Received at ".$time  ; ?>
									
									</span>
								</li>
						<?php endforeach; ?>		
						  </ul>
						 </div>
					 </div>
				 </div>


</div>
<div class="row-fluid">
   <div class="span12">
       <div class="widget">
								<div class="widget-title">
									<h4>Completed Assigned Tasks - This is a Record of Tasks completed by data administrators that you assigned</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									<a href="#widget-config" data-toggle="modal" class="icon-wrench"></a>
									<a href="javascript:;" class="icon-refresh"></a>		
									</span>							
								</div>
								<div class="widget-body">
									 <?php
                                                 //we get the tasks that the investment certificate supervisor has assigned 
												 ///to data admins and the status is complete
											    $userId = sfContext::getInstance()->getUser()->getGuardUser()->getId();
												$this->investment_complete = Doctrine_Core::getTable('TaskAssignment')->getUserTasksComplete($userId);

										 ?>
								    <table class="table table-striped table-bordered" id="investmentsupervisordone">
										<thead>
											<tr>
												<th style="width:8px"><input type="checkbox" class="group-checkable" data-set=".checkboxes" /></th>
												<th><i class="icon-user"></i> <span class="hidden-phone">Assigned To</span></th>
												<th><i class="icon-briefcase"></i> <span class="hidden-phone ">For Business</span></th>
												<th><span class="hidden-phone">Instructions</span></th>
												<th><span class="hidden-phone">Work Status</span></th>
												<th><span class="hidden-phone">Due Date</span></th>
												<th><span class="hidden-phone">Date Assigned</span></th>
												
											</tr>
										</thead>
										 <tbody>
									 <?php foreach($this->investment_complete as $complete): ?>
										  <tr class="odd gradeX">
										        
												<td><input type="checkbox" class="checkboxes" value="1" /></td>
												<td><?php echo $complete['user_assigned']; ?></td>
												<td class="hidden-phone"><?php echo $complete['name']; ?></td>
												<td class="hidden-phone"><?php echo $complete['instructions']; ?></td>
												<td class="hidden-phone"><span class="label label-success"><?php echo $complete['work_status']; ?></span></td>
												<td class="hidden-phone center"><?php echo $complete['duedate']; ?></td>
												<td class="hidden-phone"><?php echo $complete['created_at']; ?></td>
												
											</tr>
									<?php endforeach; ?>
										</tbody>
									</table> 	
									
									<div class="space7"></div>
									<div class="clearfix">
										<a href="#" class="btn btn-success"><i class="icon-print"></i>Print</a> &nbsp; <a href="#" class="btn btn-primary"><i class="icon-eject"></i>Export CSV</a> &nbsp; <a href="#" class="btn btn-inverse"><i class="icon-eject"></i>Export Excel</a> 
									</div>
				                </div>
		</div>
   </div>
</div>
<?php endif; ?>
<!-- For Supervisors who can assign job to data administrator to process EIA Certificate application -->
<?php if($sf_user->hasCredential('eiaassign')): ?>	
<div class="row-fluid">
   <div class="span12">
						<!-- BEGIN STYLE CUSTOMIZER-->
						<!-- END STYLE CUSTOMIZER-->    	
						<!-- BEGIN PAGE TITLE & BREADCRUMB-->		
						<h3 class="page-title">
							EIA Certificate Supervisor account
							<small>Assign Tasks to EIA Data Administrators</small>
						</h3>
							<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="#">Dashboard</a> <span class="divider">/</span>
							</li>
							<li>
							<i class="icon-desktop"></i>
							<a href="#">Supervisor</a></li> <span class="divider">/</span>
							<li>
							<i class="icon-desktop"></i>
							<a href="#">EIA Certificates</a></li> <span class="divider">/</span>
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
		<div class="row-fluid stats-overview-cont">
								<div class="span2 responsive" data-tablet="span4" data-desktop="span2">
									<div class="stats-overview block clearfix">
										<div class="display stat ok huge">
											<span class="line-chart">5, 6, 7, 11, 14, 10, 15, 19, 15, 2</span>
											<div class="percent">+66%</div>
										</div>
										<div class="details">
											<div class="title">Total No of Assigned Jobs</div>
											<div class="numbers">130</div>
										</div>
										<div class="progress progress-info">
											<div class="bar" style="width: 66%"></div>
										</div>
									</div>
								</div>
								<div class="span2 responsive" data-tablet="span4" data-desktop="span2">
									<div class="stats-overview block clearfix">
										<div class="display stat good huge">
											<span class="line-chart">2,6,8,12, 11, 15, 16, 11, 16, 11, 10, 3, 7, 8, 12, 19</span>
											<div class="percent">+16%</div>
										</div>
										<div class="details">
											<div class="title">Completed Tasks by Assigned Admins</div>
											<div class="numbers">180</div>
											<div class="progress progress-warning">
												<div class="bar" style="width: 16%"></div>
											</div>
										</div>
									</div>
								</div>
								
								<div class="span2 responsive" data-tablet="span4" data-desktop="span2">
									<div class="stats-overview block clearfix">
										<div class="display stat bad huge">
											<span class="line-chart">1,7,9,11, 14, 12, 6, 7, 4, 2, 9, 8, 11, 12, 14, 12, 10</span>
											<div class="percent">+15%</div>
										</div>
										<div class="details">
											<div class="title">Number of Data Admins</div>
											<div class="numbers">20</div>
											<div class="progress progress-success">
												<div class="bar" style="width: 15%"></div>
											</div>
										</div>
									</div>
								</div>
							</div>

</div>   
<div class="row-fluid">
    <div class="span6">
							<!-- BEGIN RECENT ORDERS PORTLET-->
							<div class="widget">
								<div class="widget-title">
									<h4>Recent Applications for  EIA Certificates</h4>						
								</div>
								<div class="widget-body">
									<?php if(count($unassigned) <= 0): ?>
									<div class="alert alert-block alert-success fade in">
										<p><strong>Information!</strong> <br/>Seems like all applications
										for EIA Certificate have been assigned to data admins or there are no new applications.
										I will try later... </p>
										 
									</div>
									<?php endif ?>
									<?php if(count($unassigned) > 0): ?>
									<table class="table table-striped table-bordered" id="eia_manager">
										<?php foreach($unassigned as $unassign): ?>
										<thead>
											<tr class="odd gradeX">
											  <th><i class="icon-user"> </i><span class="hidden-phone">Submitted By</span></th>
												<th><i class="icon-truck"></i> <span class="hidden-phone ">Developer's Name</span></th>
												<th><i class="icon-time"> </i><span class="hidden-phone">Submitted On</span></th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><?php echo $unassign['first_name'] ?></td>
												<td><?php echo $unassign['name'] ?> </td>
												<td><?php echo $unassign['created_at'] ?></td>
												<td> <a href="<?php echo url_for('EiTaskAssign/new') ?>"><button class="btn btn-inverse"><i class="icon-refresh icon-white"></i> Assign</button></a></td>
									
											</tr>
											
											
										</tbody>
										<?php endforeach; ?>
									</table>
									
									<div class="space7"></div>
									<div class="clearfix">
										<a href="<?php echo url_for('eiaTaskAssign/index') ?>" class="btn btn-mini pull-right">View All</a>
									</div>
									<?php endif; ?>
								</div>
							</div>
							<!-- END RECENT ORDERS PORTLET-->
						</div>
			 <div class="span4">
					 <div class="widget">
					     <div class="widget-title">
									<h4><i class="icon-bell"></i>Notifications</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									<a href="#widget-config" data-toggle="modal" class="icon-wrench"></a>
									<a href="javascript:;" class="icon-refresh"></a>
									</span>							
						 </div>
						 <div class="widget-body">
						  <ul class="item-list scroller padding" data-height="307" data-always-visible="1">
							     <?php 
						  $user = sfContext::getInstance()->getUser()->getGuardUser()->getUsername();
						 $notification = Doctrine_Core::getTable('Notifications')->getNotifications($user);?>
						 <?php foreach($notification as $notify): ?>
							   <li>
									<span class="label label-success"><i class="icon-bell"></i></span>
									<span><?php echo $notify['message'] ;?>.</span><br/>
									<span class="small italic"><?php
									date_default_timezone_set('UTC');
									$time = date("H:i:s", strtotime($notify['created_at'])) ;
									echo "Received at ".$time  ; ?>
									
									</span>
								</li>
						<?php endforeach; ?>
						<?php if($notification == null){ ?>
						         No New Notifications......  
						     
						<?php } ?>
						  </ul>
						 </div>
					 </div>
				 </div>


</div>
<div class="row-fluid">
   <div class="span12">
       <div class="widget">
								<div class="widget-title">
									<h4>Completed Assigned Tasks - This is a Record of Tasks completed by data administrators that you assigned</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									<a href="#widget-config" data-toggle="modal" class="icon-wrench"></a>
									<a href="javascript:;" class="icon-refresh"></a>		
									</span>							
								</div>
								<div class="widget-body">
								    <table class="table table-striped table-bordered" id="investmentsupervisordone">
										<thead>
										
											<tr>
												<th style="width:8px"><input type="checkbox" class="group-checkable" data-set=".checkboxes" /></th>
												<th><i class="icon-user"></i> <span class="hidden-phone">Assigned To</span></th>
												<th><i class="icon-briefcase"></i> <span class="hidden-phone ">For Business</span></th>
												<th><span class="hidden-phone">Instructions</span></th>
												<th><span class="hidden-phone">Work Status</span></th>
												<th><span class="hidden-phone">Due Date</span></th>
												<th><span class="hidden-phone">Date Assigned</span></th>
												
											</tr>
											
										</thead>
										 <tbody>
										 <?php 
										$userId = sfContext::getInstance()->getUser()->getGuardUser()->getUsername();
										$complete = Doctrine_Core::getTable('TaskAssignment')->getUserTasksComplete($userId) ?>
 										 <?php foreach($complete  as $done) : ?>
										  <tr class="odd gradeX">
												<td><input type="checkbox" class="checkboxes" value="1" /></td>
												<td><?php echo $done['user_assigned'] ?></td>
												<td class="hidden-phone"><?php echo $done['name'] ?></td>
												<td class="hidden-phone"><?php echo $done['instructions'] ?></td>
												<td class="hidden-phone"><span class="label label-success"><?php echo $done['work_status'] ?></span></td>
												<td class="hidden-phone center"><?php echo $done['duedate'] ?></td>
												<td class="hidden-phone"><?php echo $done['created_at'] ?></td>
												
											</tr>
										<?php endforeach; ?>
										</tbody>
									</table> 	
				                </div>
		</div>
   </div>
</div>
<?php endif; ?>

<!-- End section for EIA Supervisors -->

<!-- ********************************************************************** -->
<?php if($sf_user->hasCredential('investmentcert')): ?>	
<!-- Available for users who can issue Investment Certificates -->					
<!-- End Section for Department Administrator -->			
<!-- This section is for users with less administrative privealenges The data admins belong to this -->
  		<!-- BEGIN OVERVIEW STATISTIC BARS-->
		<div class="row-fluid">
							<div class="row-fluid stats-overview-cont">
								<div class="span2 responsive" data-tablet="span4" data-desktop="span2">
									<div class="stats-overview block clearfix">
										<div class="display stat ok huge">
											<span class="line-chart">5, 6, 7, 11, 14, 10, 15, 19, 15, 2</span>
											<div class="percent">+66%</div>
										</div>
										<div class="details">
											<div class="title">Pending Tasks</div>
											<div class="numbers">1360</div>
										</div>
										<div class="progress progress-info">
											<div class="bar" style="width: 66%"></div>
										</div>
									</div>
								</div>
								<div class="span2 responsive" data-tablet="span4" data-desktop="span2">
									<div class="stats-overview block clearfix">
										<div class="display stat good huge">
											<span class="line-chart">2,6,8,12, 11, 15, 16, 11, 16, 11, 10, 3, 7, 8, 12, 19</span>
											<div class="percent"></div>
										</div>
										<div class="details">
											<div class="title">
											View Your
											<a href="<?php echo url_for('investment_certificates') ?>">
											Completed Tasks
											</a>
											</div>
											<div class="numbers">1</div>
											
										</div>
									</div>
								</div>
								<div class="span2 responsive " data-tablet="span4" data-desktop="span2">
									<div class="stats-overview block clearfix">
										<div class="display stat bad huge">
											<span class="line-chart">2,6,8,11, 14, 11, 12, 13, 15, 12, 9, 5, 11, 12, 15, 9,3</span>
											
										</div>
										<div class="details">
											<div class="title"> Your Inbox Messages. You have</div>
											<div class="numbers">
												<?php
											 $messages = 0 ;
											 //we call a message that will return the number of messages available for the current logged in user
											 //am not sure if this is the right way???????
											 $username = sfContext::getInstance()->getUser()->getGuardUser()->getUsername();
											 $this->countmsgs = Doctrine_Core::getTable('Messages')->countMessages($username);
											 
											 foreach( $this->countmsgs as $msg)
												{
												 $messages  = $msg['COUNT(message)'];
												}
												
								               
							                     ?>
											<a href="<?php echo url_for('my_inbox') ?>"> <?php echo $messages; ?>  Messages </a>
											 </div>
											
										</div>
									</div>
								</div>
								
							</div>
		<!-- END STATISTICS -->
    </div>		
    <div class="row-fluid">
<!-- When logged, they can only see tasks assigned to them by the department administrators -->	
	<div class="span8">
							<!-- BEGIN RECENT ORDERS PORTLET-->
							<div class="widget">
								<div class="widget-title">
									<h4><i class="icon-reorder"></i>Available Jobs For Investment Certificates Applications</h4>
															
								</div>
								<div class="widget-body">
								<?php if(count($mytasks) != null) : ?>
									<table class="table table-striped table-bordered table-advance table-hover">
										<thead>
											<tr>
												<th><i class="icon-briefcase"></i> <span class="hidden-phone">For Business</span></th>
												<th><i class="icon-user"></i> <span class="hidden-phone ">Instructions</span></th>
												<th><i class="icon-shopping-cart"> </i><span class="hidden-phone">Work Status</span></th>
												<th><i class="icon-shopping-cart"> </i><span class="hidden-phone">Due date</span></th>
												<th></th>
											</tr>
										</thead>
										<tbody>
										<?php foreach($mytasks as $tasks):  ?>
											<tr>
												<td><?php echo $tasks['name'] ?></td>
												<td><?php echo $tasks['instructions'] ?></td>
												<td><?php echo $tasks['work_status'] ?></td>
												<td><?php echo $tasks['duedate'] ?></td>
												<td> <a href="<?php echo url_for('dashboard/start?id='.$tasks['investmentapp_id']) ?>"><button class="btn btn-inverse"><i class="icon-refresh icon-white"></i> Start Work</button></a></td>
											</tr>
									  <?php endforeach; ?>
											
										</tbody>
									</table>
							
									<div class="space7"></div>
									<div class="clearfix">
										<a href="#" class="btn btn-mini pull-right">View All</a>
									</div>
							 <?php endif; ?>	
							<?php if(count($mytasks) <= 0): ?>
								<div class="alert alert-info">
										<strong>Information!</strong> <br/>Sorry, I found no new tasks assigned to you
										to display. I will try later... 
								</div>
							 <?php  endif; ?>
								</div>
							</div>
					</div>	
					<div class="span4">
							<!-- BEGIN NOTIFICATIONS PORTLET-->
							<div class="widget">
								<div class="widget-title">
									<h4><i class="icon-bell"></i>Task Monitor Notifications</h4>
															
								</div>
								<div class="widget-body">
								<?php if(count($mytasks) != null) : ?>
									<ul class="item-list scroller padding" data-height="307" data-always-visible="1">
										<li>
											<span class="label label-success"><i class="icon-bell"></i></span>
											<span>Not Tasks Yet Started. Please Start your Tasks </span>
											<span>The Administrator has assigned you 5 tasks. Remember you have a deadline to meet! </span>
											
										</li>
									</ul>
								<?php endif; ?>
								<?php if(count($mytasks) <= 0): ?>
								<ul class="item-list scroller padding" data-height="307" data-always-visible="1">
									<li>
									<span class="label label-important"><i class="icon-bolt"></i></span>
									<span>No new Tasks Assigned to you.</span>
									</li>
								</ul>
								<?php  endif; ?>
								<?php if(count($mytasks) != null) : ?>
									<div class="space5"></div>
									<a href="#" class="pull-right"> <button type="button" class="btn btn-success">View Tasks Started(2)</button></a>										
									<div class="clearfix no-top-space no-bottom-space"></div>
							    <?php endif; ?>
								</div>
							</div>
							<!-- END NOTIFICATIONS PORTLET-->
						</div>
					
					
					
					</div>
					<!-- If this employee has some tasks started, show them please with there status and detailed information -->
					 <div class="row-fluid">
						<div class="span12">
							<!-- BEGIN EXAMPLE TABLE PORTLET-->
							<div class="widget">
								<div class="widget-title">
									<h4><i class="icon-reorder"></i>Table - Showing Tasks Not Yet Complete But Started</h4>
															
								</div>
								<div class="widget-body">
								  <?php if(count($mytasksnotcomplete) != 0): ?> <!-- Show this if result is not null -->
									<table class="table table-striped table-bordered" id="sample_1">
										<thead>
											<tr>
												
												<th>Business Name</th>
												<th class="hidden-phone">Address</th>
												<th class="hidden-phone">Application For</th>
												<th class="hidden-phone">Due Date</th>
												<th class="hidden-phone">Task Status</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											<tr class="odd gradeX">
											<?php foreach($mytasksnotcomplete as $notdone) :?>
											<td><?php echo $notdone['name'] ?></td>
											<td><?php echo $notdone['company_address'] ?></td>
											<td><?php echo "Investment Certificate"?></td>
											<td><?php echo $notdone['duedate'] ?></td>
											<td><?php echo $notdone['work_status']  ?></td>
											
											<td>
										
                                              <!--This code will test the value of work status before showing this button. if 
											  status is reporting, we will show a button for accept application which will retrieve the 
											  application and show us a link for accepting or reject user application for
											  investment certificate. This is hot!!!!!!!!!!!!! demn it!!!!
											  -->
										   <?php  if($notdone['work_status'] == "started" ): ?>
											<a href="<?php echo url_for('dashboard/start?id='.$notdone['investmentapp_id']) ?>"><button class="btn btn-inverse"><i class="icon-refresh icon-white"></i> Process </button></a>
											 <?php endif; ?>
											 <?php  if($notdone['work_status'] == "reporting" ): ?>
											<a href="<?php echo url_for('projectSummary/show?id='.$notdone['investmentapp_id']) ?>"><button class="btn btn-inverse"><i class="icon-refresh icon-white"></i> Accept Application </button></a>
											 <?php endif; ?>
											 <?php  if($notdone['work_status'] == "awaitingpayment" ): ?>
											<a href="<?php echo url_for('confirm/index?id='.$notdone['investmentapp_id']) ?>"><button class="btn btn-inverse"><i class="icon-refresh icon-white"></i> Confirm Payment </button></a>
											 <?php endif; ?>
											  <?php  if($notdone['work_status'] == "paymentconfirmed" ): ?>
											<a href="<?php echo url_for('dashboard/investcert?business='.$notdone['name']) ?>"><button class="btn btn-inverse"><i class="icon-refresh icon-white"></i> Issue Certificate</button></a>
											 <?php endif; ?>
											</td>
											
											<?php endforeach; ?>	
											</tr>
										</tbody>
									</table>
								<?php endif; ?>
								<?php if(count($mytasksnotcomplete) == 0): ?> <!-- Show this if result is  null -->
								<div id="pulsate-regular" style="padding:5px;">	
								    <div class="alert alert-error">
										<strong>Warning!</strong> No Tasks Yet Started. Please Start a Task
									</div>
									</div>
								<?php endif; ?>
								
								</div>
							</div>
							
						</div>
					</div>
					<!-- End showing tasks -->
					
<?php endif; ?>		
<!-- ********************************************************************** -->

<!-- ********************************************************************** -->
<?php if($sf_user->hasCredential('eiacert')): ?>
<!-- Available for users who can issue EIA Certificates -->					
<!-- End Section for Department Administrator -->			
<!-- This section is for users with less administrative privealenges The data admins belong to this -->
  		<!-- BEGIN OVERVIEW STATISTIC BARS-->
	<div class="row-fluid">
						<div class="row-fluid stats-overview-cont">
								<div class="span2 responsive" data-tablet="span4" data-desktop="span2">
									<div class="stats-overview block clearfix">
										<div class="display stat ok huge">
											<span class="line-chart">5, 6, 7, 11, 14, 10, 15, 19, 15, 2</span>
											<div class="percent">100%</div>
										</div>
										<div class="details">
											<div class="title">Pending Tasks</div>
											<div class="numbers"><?php echo count($jobs) ?></div>
										</div>
										<div class="progress progress-info">
											<div class="bar" style="width: 100%"></div>
										</div>
									</div>
								</div>
								<div class="span2 responsive" data-tablet="span4" data-desktop="span2">
									<div class="stats-overview block clearfix">
										<div class="display stat good huge">
											<span class="line-chart">2,6,8,12, 11, 15, 16, 11, 16, 11, 10, 3, 7, 8, 12, 19</span>
											<div class="percent">0%</div>
										</div>
										<div class="details">
											<div class="title">Completed Tasks</div>
											<div class="numbers">0</div>
											<div class="progress progress-warning">
												<div class="bar" style="width: 16%"></div>
											</div>
										</div>
									</div>
								</div>
								<div class="span2 responsive " data-tablet="span4" data-desktop="span2">
									<div class="stats-overview block clearfix">
										<div class="display stat bad huge">
											<span class="line-chart">2,6,8,11, 14, 11, 12, 13, 15, 12, 9, 5, 11, 12, 15, 9,3</span>
											
										</div>
										<div class="details">
											<div class="title"> Inbox Messages</div>
											<div class="numbers">0</div>
											<div class="progress progress-success">
												<div class="bar" style="width: 16%"></div>
											</div>
										</div>
									</div>
								</div>
								
							</div>
		<!-- END STATISTICS -->
   </div>	
<!-- When logged, they can only see tasks assigned to them by the department administrators -->	
					<div class="row-fluid">
						<div class="span10">
							<!-- BEGIN RECENT ORDERS PORTLET-->
							<div class="widget">
								<div class="widget-title">
									<h4><i class="icon-reorder"></i>Available Jobs For EIA Certificates Applications</h4>
														
								</div>
								<div class="widget-body">
									<?php if(count($jobs) <= 0): ?>
									<div class="alert alert-info">
										<p><strong>Information!</strong> <br/> No jobs assigned.</p>
										<p>Reload the Page or Try Again Later</p>
									</div>
									<?php endif; ?>
									<?php foreach($jobs as $job ): ?>
									<table class="table table-striped table-bordered table-advance table-hover">
										<thead>
											<tr>
												<th><i class="icon-briefcase"></i> <span class="hidden-phone">Developer</span></th>
												<th><i class="icon-user"></i> <span class="hidden-phone ">Instructions</span></th>
												<th><i class="icon-shopping-cart"> </i><span class="hidden-phone">Due date</span></th>
												<th><i class="icon-shopping-cart"> </i><span class="hidden-phone">Assigned by</span></th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><?php echo $job['name'] ?></td>
												<td><?php echo $job['instructions'] ?></td>
												<td><?php echo $job['duedate'] ?></td>
												<td><?php echo $job['updated_by'] ?></td>
												<td><?php echo button_to('Process','eiaDataAdmin/showEia?id='.$job['company_id'],array('class' => 'btn btn-inverse')); ?></td>
											</tr>
											
											
										</tbody>
									</table>
									<?php endforeach; ?>
									<div class="space7"></div>
									<div class="clearfix">
										<a href="<?php echo url_for('eiaDataAdmin/index') ?>" class="btn btn-mini pull-right">View All</a>
									</div>
								</div>
							</div>
						</div> 
					</div>
				<div class="row-fluid">
					<div class="span8">
						<div class="widget">
							<div class="widget-title">
								<h4><i class="icon-reorder"></i> Recent T.O.R Applications </h4>
							</div>
							<div class="widget-body">
								<?php if(count($tors) <= 0): ?>
								<div class="alert alert-info">
									<p><strong>Information!</strong> <br/> No Recent T.O.R Applications Found</p>
										<p>Reload the Page or Try Again Later</p>
									</div>
									<?php endif; ?>
							<? //endif; ?>
							<?php foreach($tors as $tor): ?>
							<table class="table table-striped table-bordered table-advance table-hover">
								<thead>
									<tr>
										<th> Developer's Name </th>
										<th> User's Name </th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><?php echo link_to($tor['name'],'tor2/show?id='.$tor['id']) ?></td>
										<td><?php echo $tor['updated_by'] ?></td>
										<td><?php echo button_to('View','tor2/show?id='.$tor['id'],array('class' => 'btn btn-inverse')) ?></td>
									</tr>
								</tbody>
							</table>
							<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>
					
<?php endif; ?>		
<!-- ********************************************************************** -->


</div>						


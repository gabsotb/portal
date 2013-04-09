
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
                text: '<?php echo __('RDB Tasks Performance Analysis. Year 2013') ?>'
            },
            subtitle: {
                text: '<?php echo __('Source: Rwanda Development Board') ?>'
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
                    text: '<?php echo __('Number of Items Processed') ?>'
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
                name: '<?php echo __('Investment Certificates') ?>',
                data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
    
            }, {
                name: '<?php echo __('EIA Certificates') ?>',
                data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]
    
            }, {
                name: '<?php echo __('Tax Exemptions') ?>',
                data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]
    
            }, {
                name: '<?php echo __('Visa Issued') ?>',
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
							<?php echo __('Managers Account') ?>
							<small><?php echo __('Assign Tasks and Manage User Accounts')?></small>
						</h3>
							<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="<?php echo url_for('dashboard/index')?>"><?php echo __('Dashboard') ?></a> <span class="divider">/</span>
							</li>
							<li>
							<i class="icon-desktop"></i>
							<a href="<?php echo url_for('dashboard/index')?>"><?php echo __('Manager') ?></a></li> <span class="divider">/</span>
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
	  
	  
		<!-- BEGIN OVERVIEW STATISTIC BARS-->
							<div class="row-fluid stats-overview-cont">
								<div class="span2 responsive" data-tablet="span4" data-desktop="span2">
									<div class="stats-overview block clearfix">
										<div class="display stat ok huge">
											<span class="line-chart">5, 6, 7, 11, 14, 10, 15, 19, 15, 2</span>
											<div class="percent">+66%</div>
										</div>
										<div class="details">
											<div class="title"><?php echo __('Total Registered Investors') ?></div>
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
											<div class="title"><?php echo __('Total Investment Certificates Issued') ?></div>
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
											<div class="title"><?php echo __('Total EIA Certificates Issued') ?></div>
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
											<div class="title"><?php echo __('Tax Exemptions Granted') ?></div>
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
											<div class="title"><?php echo __('Visa Issued by Immigration') ?></div>
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
									<h4><?php echo __('Recent Applications For Investment Certificates') ?></h4>						
								</div>
								<div class="widget-body">
								<?php if(count($new_applications) <= 0): ?>
								<div class="alert alert-info">
										<strong><?php echo __('Information') ?></strong> <br/><?php echo __('Seems like all applications
										for Investment Certificate have been assigned to data admins or there are no new applications.
										I will try later') ?>... 
								</div>
							    <?php  endif; ?>
								<?php if(count($new_applications) != null) : ?>
									<table class="table table-striped table-bordered" id="investment_applications_manager">
										<thead>
											<tr>
												<th><i class="icon-user"></i> <span class="hidden-phone"><?php echo __('Submitted by') ?></span></th>
												<th><i class="icon-briefcase"></i> <span class="hidden-phone "><?php echo __('Business Name') ?></span></th>
												<th><i class="icon-time"> </i><span class="hidden-phone"><?php echo __('Submitted On') ?></span></th>
												<th><?php echo __('Actions') ?></th>
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
												<td> <a href="<?php echo url_for('InvestmentCertTaskAssignment/new?registration='.$available['registration_number'].'&token='.$available['token'].'&reference='.$available['applicant_reference_number']) ?>"><button class="btn btn-mini btn-primary"><i class="icon-user icon-white"></i> <?php echo __('Assign') ?></button></a></td>
											</tr>
										<?php endforeach;?>	
										
										</tbody>
									</table>
									<?php endif; ?>
									<div class="space7"></div>
									<div class="clearfix">
										<a href="<?php echo url_for('InvestmentCertTaskAssignment/index') ?>" class="btn btn-small btn-primary"><?php echo __('View All Assigned Tasks') ?></a>
									</div>
								</div>
							</div>
							<!-- END RECENT ORDERS PORTLET-->
						</div>
						<div class="span6">
							<!-- BEGIN RECENT ORDERS PORTLET-->
							<div class="widget">
								<div class="widget-title">
									<h4><?php echo __('Recent Applications for  EIA Certificates') ?></h4>						
								</div>
								<div class="widget-body">
								<?php if(count($unassigned) == 0): ?>
									<div class="alert alert-block alert-info fade in">
									<h4 class="alert-heading">No recent application has been found</h4>
									<p>Please try again later/ Refresh the page</p>
									</div>
								<?php endif; ?>
								<?php if(count($unassigned)>0): ?>
									<?php foreach($unassigned as $unassign): ?>
									<table class="table table-striped table-bordered" id="eia_manager">
										<thead>
											<tr class="odd gradeX">
											  <th>Reference No.</th>
												<th>Title</th>
												<th>Developer</th>
												<th><?php echo __('Actions') ?></th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><?php echo $unassign['project_reference_number'] ?></td>
												<td><?php echo $unassign['project_title'] ?> </td>
												<td><?php echo $unassign['developer_name'] ?></td>
												<td> <a href="<?php echo url_for('eiaTaskAssign/new?id='.$unassign['id']) ?>"><button class="btn btn-inverse"><i class="icon-refresh icon-white"></i> Assign</button></a></td>
									
											</tr>
										</tbody>
									</table>
									<?php endforeach; ?>
								<?php endif; ?>
									<div class="space7"></div>
									<div class="clearfix">
										<a href="<?php echo url_for('eiaTaskAssign/index') ?>" class="btn btn-small btn-primary"><?php echo __('View All Assigned Tasks') ?></a>
									</div>
								</div>
							</div>
						</div>	
					</div>
					<?php if(count($assessments) != 0): ?>
					<div class="row-fluid">
						<div class="widget">
							<div class="widget-title">
								<h4><i class="icon-reorder"></i>EIA --- Awaiting Approval</h4>
							</div>
							<div class="widget-body">
							<?php foreach($assessments as $assessment): ?>
								<table class="table table-striped table-hover">
								<tr>
									<th>Project</th>
									<th>Assigned to</th>
									<th>Action</th>
								</tr>
								<tr>
									<td><?php echo $assessment['EIAProjectDetail']['project_title']?></td>
									<td><?php echo $assessment['sfGuardUser']['last_name'] ?></td>
									<td><?php echo button_to('Assess','dashboard/assessmentDecision?id='.$assessment['id'],array('class' => 'btn')); ?></td>
								</tr>
								</table>
							<?php endforeach; ?>
							</div>
						</div>
					</div>
					<?php endif; ?>
         <div class="row-fluid">
                 <div class="span8">
						<div class="widget">
						          <div class="widget-title">
									<h4><i class="icon-signal"></i><?php echo __('RDB Task Processing Performance Pie Chart') ?></h4>
															
								</div>
								<div id="cont" class="widget-body">
									
								</div>
							</div>
							
				 </div>
				 <div class="span4">
					 <div class="widget">
					     <div class="widget-title">
									<h4><i class="icon-bell"></i><?php echo __('Notifications') ?></h4>
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
							<?php echo __('Investment Registration Certificate Supervisor account') ?>
							<small><?php echo __('Assign Tasks to Investment Certificate Data Administrators') ?></small>
						</h3>
							<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="#"><?php echo __('Dashboard') ?></a> <span class="divider">/</span>
							</li>
							<li>
							<i class="icon-desktop"></i>
							<a href="#"><?php echo __('Supervisor') ?></a></li> <span class="divider">/</span>
							<li>
							<i class="icon-desktop"></i>
							<a href="#"><?php echo __('Investment Certificates') ?></a></li> <span class="divider">/</span>
							<li>
							
							<i class="icon-user"></i>
							<a href="#">
							   <b>
								  <font color="blue">
									<?php $username = sfContext::getInstance()->getUser()->getGuardUser()->getUsername();
									?>
									  <?php echo __('Welcome, You are logged in as') ?> <?php echo $username ?>
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
		<div class="row-fluid stats-overview-cont">
								<div class="span2 responsive" data-tablet="span4" data-desktop="span2">
									<div class="stats-overview block clearfix">
										<div class="display stat ok huge">
											<span class="line-chart">5, 6, 7, 11, 14, 10, 15, 19, 15, 2</span>
											<div class="percent">+66%</div>
										</div>
										<div class="details">
											<div class="title"><?php echo __('Total No of Assigned Jobs') ?></div>
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
											<div class="title"><?php echo __('Completed Tasks by Assigned Admins') ?></div>
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
											<div class="title"><?php echo __('Number of Data Admins') ?></div>
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
									<h4><?php echo __('Recent Applications  Investment Certificates') ?></h4>						
								</div>
								<div class="widget-body">
								<?php if(count($new_applications) <= 0): ?>
								<div class="alert alert-info">
										<strong><?php echo __('Information') ?>!</strong> <br/><?php echo __('Seems like all applications
										for Investment Certificate have been assigned to data admins or there are no new applications.
										I will try later') ?>... 
								</div>
							    <?php  endif; ?>
								<?php if(count($new_applications) != null) : ?>
									<table class="table table-striped table-bordered" id="investment_applications_manager">
										<thead>
											<tr>
												<th><i class="icon-user"></i> <span class="hidden-phone"><?php echo __('Submitted by') ?></span></th>
												<th><i class="icon-briefcase"></i> <span class="hidden-phone "><?php echo __('Business Name') ?></span></th>
												<th><i class="icon-time"> </i><span class="hidden-phone"><?php echo __('Submitted On') ?></span></th>
												<th><?php echo __('Actions') ?></th>
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
												<td> <a href="<?php echo url_for('InvestmentCertTaskAssignment/new?business='.$available['name']) ?>"><button class="btn btn-inverse"><i class="icon-refresh icon-white"></i> <?php echo __('Assign') ?></button></a></td>
											</tr>
										<?php endforeach;?>	
										
										</tbody>
									</table>
								
							    
									
									<?php endif; ?>
									<div class="space7"></div>
									<div class="clearfix">
										<a href="<?php echo url_for('InvestmentCertTaskAssignment/index') ?>" class="btn btn-small btn-primary"><?php echo __('View All Assigned Tasks') ?></a>
									</div>
								</div>
							</div>
							<!-- END RECENT ORDERS PORTLET-->
						</div>
			 <div class="span4">
					 <div class="widget">
					     <div class="widget-title">
									<h4><i class="icon-bell"></i><?php echo __('Notifications') ?></h4>
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
									<h4><?php echo __('Completed Assigned Tasks - This is a Record of Tasks completed by data administrators that you assigned') ?></h4>
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
												<th><i class="icon-user"></i> <span class="hidden-phone"><?php echo __('Assigned To') ?></span></th>
												<th><i class="icon-briefcase"></i> <span class="hidden-phone "><?php echo __('For Business') ?></span></th>
												<th><span class="hidden-phone"><?php echo __('Instructions') ?></span></th>
												<th><span class="hidden-phone"><?php echo __('Work Status') ?></span></th>
												<th><span class="hidden-phone"><?php echo __('Due Date') ?></span></th>
												<th><span class="hidden-phone"><?php echo __('Date Assigned') ?></span></th>
												
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
										<a href="#" class="btn btn-success"><i class="icon-print"></i><?php echo __('Print') ?></a> &nbsp; <a href="#" class="btn btn-primary"><i class="icon-eject"></i><?php echo __('Export CSV') ?></a> &nbsp; <a href="#" class="btn btn-inverse"><i class="icon-eject"></i><?php echo __('Export Excel') ?></a> 
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
							<?php echo __('EIA Certificate Supervisor account') ?>
							<small><?php echo __('Assign Tasks to EIA Data Administrators') ?></small>
						</h3>
							<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="#"><?php echo __('Dashboard') ?></a> <span class="divider">/</span>
							</li>
							<li>
							<i class="icon-desktop"></i>
							<a href="#"><?php echo __('Supervisor') ?></a></li> <span class="divider">/</span>
							<li>
							<i class="icon-desktop"></i>
							<a href="#"><?php echo __('EIA Certificates') ?></a></li> <span class="divider">/</span>
							<li>
							
							<i class="icon-user"></i>
							<a href="#">
							   <b>
								  <font color="blue">
									<?php $username = sfContext::getInstance()->getUser()->getGuardUser()->getUsername();?>
									<?php echo __('Welcome, You are logged in as ') ?> <?php echo $username ?>
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
		<div class="row-fluid stats-overview-cont">
								<div class="span2 responsive" data-tablet="span4" data-desktop="span2">
									<div class="stats-overview block clearfix">
										<div class="display stat ok huge">
											<span class="line-chart">5, 6, 7, 11, 14, 10, 15, 19, 15, 2</span>
											<div class="percent">+66%</div>
										</div>
										<div class="details">
											<div class="title"><?php echo __('Total No of Assigned Jobs') ?></div>
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
											<div class="title"><?php echo __('Completed Tasks by Assigned Admins') ?></div>
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
											<div class="title"><?php echo __('Number of Data Admins') ?></div>
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
						<div class="span8">
							<!-- BEGIN RECENT ORDERS PORTLET-->
							<div class="widget">
								<div class="widget-title">
									<h4><?php echo __('Recent Applications for  EIA Certificates') ?></h4>						
								</div>
								<div class="widget-body">
									<?php if(count($unassigned) == 0 ): ?>
									<div class="alert alert-block alert-info fade in">
									<h4 class="alert-heading">No recent application has been found</h4>
									<p>Please try again later/ Refresh the page</p>
									</div>
									<?php endif; ?>
									<?php if(count($unassigned) > 0): ?>
										<?php foreach($unassigned as $unassign): ?>
										<table class="table table-striped table-bordered" id="eia_manager">
											<thead>
												<tr class="odd gradeX">
												  <th>Reference No.</th>
													<th>Title</th>
													<th>Developer</th>
													<th>Actions</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td><?php echo $unassign['project_reference_number'] ?></td>
													<td><?php echo $unassign['project_title'] ?> </td>
													<td><?php echo $unassign['developer_name'] ?></td>
													<td> <a href="<?php echo url_for('eiaTaskAssign/new?id='.$unassign['id']) ?>"><button class="btn btn-inverse"><i class="icon-refresh icon-white"></i> Assign</button></a></td>
										
												</tr>
											</tbody>
										</table>
										<?php endforeach; ?>
									<?php endif; ?>
									<div class="space7"></div>
									<div class="clearfix">
										<a href="<?php echo url_for('eiaTaskAssign/index') ?>" class="btn btn-mini pull-right"><?php echo __('View All') ?></a>
									</div>
								</div>
							</div>
							<!-- END RECENT ORDERS PORTLET-->
						</div>
			 <div class="span4">
					 <div class="widget">
					     <div class="widget-title">
									<h4><i class="icon-bell"></i><?php echo __('Notifications') ?></h4>
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
						         <?php echo __('No New Notifications') ?>......  
						     
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
									<h4><?php echo __('Completed Assigned Tasks - This is a Record of Tasks completed by data administrators that you assigned') ?></h4>
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
												<th><i class="icon-user"></i> <span class="hidden-phone"><?php echo __('Assigned To') ?></span></th>
												<th><i class="icon-briefcase"></i> <span class="hidden-phone "><?php echo __('For Business') ?></span></th>
												<th><span class="hidden-phone"><?php echo __('Instructions') ?></span></th>
												<th><span class="hidden-phone"><?php echo __('Work Status') ?></span></th>
												<th><span class="hidden-phone"><?php echo __('Due Date') ?></span></th>
												<th><span class="hidden-phone"><?php echo __('Date Assigned') ?></span></th>
												
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
											<div class="title"><?php echo __('Pending Tasks') ?></div>
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
											<?php echo __('View Your') ?>
											<a href="<?php echo url_for('investment_certificates') ?>">
											<?php echo __('Completed Tasks') ?>
											</a>
											</div>
											<div class="numbers"><?php 
											$no = 1 ;
											echo $no ?></div>
											
										</div>
									</div>
								</div>
								<div class="span2 responsive " data-tablet="span4" data-desktop="span2">
									<div class="stats-overview block clearfix">
										<div class="display stat bad huge">
											<span class="line-chart">2,6,8,11, 14, 11, 12, 13, 15, 12, 9, 5, 11, 12, 15, 9,3</span>
											
										</div>
										<div class="details">
											<div class="title"> <?php echo __('Your Inbox Messages. You have') ?></div>
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
											<a href="<?php echo url_for('my_inbox') ?>"> <?php echo $messages; ?>  <?php echo __('Messages') ?> </a>
											 </div>
											
										</div>
									</div>
								</div>
								
							</div>
		<!-- END STATISTICS -->
    </div>		
    <div class="row-fluid">
<!-- When logged, they can only see tasks assigned to them by the department administrators -->	
	<div class="span9">
							<!-- BEGIN RECENT ORDERS PORTLET-->
							<div class="widget">
								<div class="widget-title">
									<h4><i class="icon-reorder"></i><?php echo __('Available Jobs For Investment Certificates Applications') ?></h4>
															
								</div>
								<div class="widget-body">
								<?php if(count($mytasks) != null) : ?>
									<table id="investmentadminstartwork" class="table table-striped table-bordered" >
										<thead>
											<tr>
												<th><i class="icon-briefcase"></i> <span class="hidden-phone"><?php echo __('For Business') ?></span></th>
												<th><i class="icon-user"></i> <span class="hidden-phone "><?php echo __('Instructions')?></span></th>
												<th><i class="icon-shopping-cart"> </i><span class="hidden-phone"><?php echo __('Status') ?></span></th>
												<th><i class="icon-shopping-cart"> </i><span class="hidden-phone"><?php echo __('Due date') ?></span></th>
												<th></th>
											</tr>
										</thead>
										<tbody>
										<?php foreach($mytasks as $tasks):  ?>
											<tr class="odd gradeX">
												<td><?php echo $tasks['name'] ?></td>
												<td><?php echo $tasks['instructions'] ?></td>
												<td><?php echo $tasks['work_status'] ?></td>
												<td><?php echo $tasks['duedate'] ?></td>
												<td> <a href="<?php echo url_for('dashboard/start?id='.$tasks['investmentapp_id'].'&token='.$tasks['token']) ?>"><button class="btn btn-small btn-primary"><?php echo __('Start') ?></button></a></td>
											</tr>
									  <?php endforeach; ?>
											
										</tbody>
									</table>
							
									<div class="space7"></div>
									<div class="clearfix">
										<a href="#" class="btn btn-mini pull-right"><?php echo __('View All') ?></a>
									</div>
							 <?php endif; ?>	
							<?php if(count($mytasks) <= 0): ?>
								<div class="alert alert-info">
										<strong><?php echo __('Information') ?>!</strong> <br/><?php echo __('Sorry, I found no new tasks assigned to you
										to display. I will try later') ?>... 
								</div>
							 <?php  endif; ?>
								</div>
							</div>
					</div>	
					<div class="span3">
							<!-- BEGIN NOTIFICATIONS PORTLET-->
							<div class="widget">
								<div class="widget-title">
									<h4><i class="icon-bell"></i><?php echo __('Task Monitor Notifications') ?></h4>
															
								</div>
								<div class="widget-body">
								<?php if(count($mytasks) != null) : ?>
									<ul class="item-list scroller padding" data-height="307" data-always-visible="1">
									 <?php //get the number of tasks assigned to this user
									        $userId = sfContext::getInstance()->getUser()->getGuardUser()->getId();
									        $number = Doctrine_Core::getTable('TaskAssignment')->countUserAssignedTasks($userId);
									 ?>
										<li>
											<span class="label label-success"><i class="icon-bell"></i></span>
											<span class="text-error"><?php echo __('Not Tasks Yet Started. Please Start your Tasks') ?></span>
											<span class="text-success"><?php echo __("The Administrator has assigned you $number tasks. Remember you have a deadline to beat")?>! </span>
											
										</li>
									</ul>
								<?php endif; ?>
								<?php if(count($mytasks) <= 0): ?>
								 <?php //we retrieve notification messages for this user
								     $username = sfContext::getInstance()->getUser()->getGuardUser()->getUserName();
                                     $notify_win = Doctrine_Core::getTable('Notifications')->getNotifications($username);
								 ?>
								<ul class="item-list scroller padding" data-height="307" data-always-visible="1">
								    <?php foreach($notify_win  as $notify): ?>
									<li>
									<span class="label label-important"><i class="icon-bolt"></i></span>
									<span><?php echo $notify['message']; ?>.</span>
									</li>
								    <?php endforeach; ?>	
								</ul>
								<?php  endif; ?>
								<?php //if(count($mytasks) != null) : ?>
									<!--<div class="space5"></div>
									<a href="#" class="pull-right"> <button type="button" class="btn btn-success">View Tasks Started(2)</button></a>										
									<div class="clearfix no-top-space no-bottom-space"></div> -->
							    <?php // endif; ?>
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
									<h4><i class="icon-reorder"></i><?php echo __('Table - Showing Tasks Not Yet Complete But Started') ?></h4>
															
								</div>
								<div class="widget-body">
								  <?php if(count($mytasksnotcomplete) != 0): ?> <!-- Show this if result is not null -->
									<table class="table table-striped table-bordered" id="sample_1">
										<thead>
											<tr>
												
												<th><?php echo __('Business Name') ?></th>
												<th class="hidden-phone"><?php echo __('Address') ?></th>
												<th class="hidden-phone"><?php echo __('Application For') ?></th>
												<th class="hidden-phone"><?php echo __('Due Date') ?></th>
												<th class="hidden-phone"><?php echo __('Task Status') ?></th>
												<th><?php echo __('Actions') ?></th>
											</tr>
										</thead>
										<tbody>
										<?php foreach($mytasksnotcomplete as $notdone) :?>
											<tr class="odd gradeX">
											
											<td><?php echo $notdone['name'] ?></td>
											<td><?php echo $notdone['location'] ?></td>
											<td><?php echo "Investment Certificate"?></td>
											<td><?php echo $notdone['duedate'] ?></td>
											<td><?php echo $notdone['work_status']  ;
											  //Here, we will also check and see if this record has a resubmission request by the logged in admin
											  //and inform the admin that we are waiting for resubmission. if resubmitted, we will not show this 
											  //message.
											 // $user_id = sfContext::getInstance()->getUser()->getGuardUser()->getId();
											    $name = $notdone['name'] ;
												//echo $name;
											    $q = Doctrine_Core::getTable('InvestmentApplication')->getBusinessId($name);
												
											  $id = Doctrine_Core::getTable('InvestmentResubmission')->checkIdExistance($q);
											   if($id != null)
											   {
											    echo ("<br/>");
											    echo ("<font color='red'>") ;
											    echo __('Awaiting Investor Document Resubmission') ;
												echo ("</font>");
											   }
											
											?>
											  
											
											
											
											</td>
											
											<td>
										
                                              <!--This code will test the value of work status before showing this button. if 
											  status is reporting, we will show a button for accept application which will retrieve the 
											  application and show us a link for accepting or reject user application for
											  investment certificate. This is hot!!!!!!!!!!!!! demn it!!!!
											  -->
										    <?php  if($notdone['work_status'] == "started" ): ?>
												<?php if($id != null): ?>
												  <a href="#">
												<button class="btn btn-inverse disabled"><i class="icon-refresh icon-white"></i> <?php echo __('Process') ?> </button></a>
												<?php endif; ?>
												<?php if($id == null): ?>
												<a href="<?php echo url_for('dashboard/start?id='.$notdone['investmentapp_id'].'&token='.$notdone['token']) ?>">
												<button class="btn btn-inverse"><i class="icon-refresh icon-white"></i> <?php echo __('Process') ?> </button></a>
												 <?php endif; ?>
											
										   <?php endif; ?>
											 
											 <?php  if($notdone['work_status'] == "reporting" ): ?>
											 <?php //for purpose of show method, we retrieve Summary  pk id using investmentapp_id
											       //value 
												 //  print "va".$notdone['investmentapp_id']; exit;
												   $identity = $notdone['investmentapp_id'] ;
												   $task_id = Doctrine_Core::getTable('ProjectSummary')->getSummaryId($identity);
												   
											 ?>
											<a href="<?php echo url_for('projectSummary/show?id='.$task_id) ?>"><button class="btn btn-inverse"><i class="icon-refresh icon-white"></i><?php echo __('Accept or Decline') ?> </button></a>
											 <?php endif; ?>
											 <?php  if($notdone['work_status'] == "awaitingpayment" ): ?>
											<a href="<?php echo url_for('confirm/index?id='.$notdone['investmentapp_id']) ?>"><button class="btn btn-inverse"><i class="icon-refresh icon-white"></i> <?php echo __('Confirm Payment') ?> </button></a>
											 <?php endif; ?>
											  <?php  if($notdone['work_status'] == "paymentconfirmed" ): ?>
											<a href="<?php echo url_for('dashboard/investcert?business='.$notdone['name']) ?>"><button class="btn btn-inverse"><i class="icon-refresh icon-white"></i> <?php echo __('Issue Certificate') ?></button></a>
											 <?php endif; ?>
											</td>
											
												
											</tr> <?php endforeach; ?>
										</tbody>
									</table>
								<?php endif; ?>
								<?php if(count($mytasksnotcomplete) == 0): ?> <!-- Show this if result is  null -->
								<div id="pulsate-regular" style="padding:5px;">	
								    <div class="alert alert-error">
										<strong><?php echo __('Warning') ?>!</strong> <?php echo __('No Tasks Yet Started. Please Start a Task') ?>
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
		<a href="#" class="icon-btn span3"><i class="icon-building"></i><div>Projects</div><span class="badge badge-important"><?php echo count($jobAdmin) ?></span></a>
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

		<a href="<?php echo url_for('my_inbox') ?>" class="icon-btn span3"><i class="icon-envelope"></i><div>Inbox</div><span class="badge badge-info"><?php echo $messages ?></span></a>
		<a href="#" class="icon-btn span3"><i class="icon-bar-chart"></i><div>Reports</div></a>
   </div>
   <!-- END STATISTICS -->	
<!-- When logged, they can only see tasks assigned to them by the department administrators -->	
					<div class="row-fluid">
						<div class="span8">
							<!-- BEGIN RECENT ORDERS PORTLET-->
							<div class="widget">
								<div class="widget-title">
									<h4><i class="icon-reorder"></i>EIA Certificates Applications</h4>
								</div>
								<div class="widget-body">
								<?php if(count($jobAdmin)== 0): ?>
									<div class="alert alert-block alert-info fade in">
									<h4 class="alert-heading">No new task has been found</h4>
									<p>Please try again later/ Reload the page</p>
									</div>
								<?php endif; ?>
									<?php foreach($jobAdmin as $job): ?>
									<div class="row-fluid">
										<?php if($job->getWorkStatus() == 'notstarted'): ?>
										<h4>New Applications</h4>
											<table class="table table-striped table-bordered table-advance table-hover" >
												<thead>
													<tr>
														<th>Reference No.</th>
														<th>Project Title</th>
														<th>Assign by:</th>
														<th>Actions</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="highlight"><?php echo $job->getEIAProjectDetail()->getProjectReferenceNumber() ?></td>
														<td><?php echo $job->getEIAProjectDetail()->getProjectTitle() ?> </td>
														<td><?php echo $job->getSfGuardUser()->getLastName() ?></td>
														<td> <a href="<?php echo url_for('eiaDataAdmin/show?id='.$job->getId()) ?>"><button class="btn btn-inverse"><i class="icon-circle-blank"></i> Process</button></a></td>
											
													</tr>
												</tbody>
											</table>
										<?php endif; ?>
									</div>
									<div class="row-fluid"> 
										<?php if($job->getWorkStatus() == 'started'): ?>
										<h4>Applications been processed</h4>
											<table class="table table-striped table-hover" >
												<thead>
													<tr>
														<th>Reference No.</th>
														<th>Project Title</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td><?php echo $job->getEIAProjectDetail()->getProjectReferenceNumber() ?></td>
														<td><a href="<?php echo url_for('eiaDataAdmin/show?id='.$job->getId()) ?>"><?php echo $job->getEIAProjectDetail()->getProjectTitle() ?></a> </td>
											
													</tr>
												</tbody>
											</table>
										<?php endif; ?>
									</div>
									<div class="row-fluid"> 
										<?php if($job->getWorkStatus() == 'assess'): ?>
										<h4>Applications awaiting assessment</h4>
											<table class="table table-striped table-hover" >
												<thead>
													<tr>
														<th>Reference No.</th>
														<th>Project Title</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td><?php echo $job->getEIAProjectDetail()->getProjectReferenceNumber() ?></td>
														<td><a href="<?php echo url_for('eiaDataAdmin/show?id='.$job->getId()) ?>"><?php echo $job->getEIAProjectDetail()->getProjectTitle() ?></a> </td>
											
													</tr>
												</tbody>
											</table>
										<?php endif; ?>
									</div>
									<div class="row-fluid"> 
										<?php if($job->getWorkStatus() == 'assessed'): ?>
										<h4>Applications assessed</h4>
											<table class="table table-striped table-hover" >
												<thead>
													<tr>
														<th>Reference No.</th>
														<th>Project Title</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td><?php echo $job->getEIAProjectDetail()->getProjectReferenceNumber() ?></td>
														<td><?php echo $job->getEIAProjectDetail()->getProjectTitle() ?></td>
														<td><?php echo button_to('Process','eiaDataAdmin/process?id='.$job->getEiaprojectId(),array('class' => 'btn')); ?></td>
											
													</tr>
												</tbody>
											</table>
										<?php endif; ?>
									</div>
									<?php endforeach; ?>
									
									<div class="space7"></div>
									<div class="clearfix">
										<a href="<?php echo url_for('eiaTaskAssign/index') ?>" class="btn btn-small btn-primary">View All Assigned Tasks</a>
									</div>
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
								$notification = Doctrine_Core::getTable('Notifications')->getNotifications($user);
								?>
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
					
<?php endif; ?>		
<!-- ********************************************************************** -->


</div>						


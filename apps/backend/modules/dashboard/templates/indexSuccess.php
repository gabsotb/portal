
<div id="page" class="dashboard">
<!-- ******************************************************************* -->
<?php if($sf_user->hasCredential('assignJob')): ?>
<!-- The Logged in User only see this part if he/she has the right to assign a job to an administrator -->

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
								<a href="#">Dashboard</a> <span class="divider">/</span>
							</li>
							<li>
							<i class="icon-desktop"></i>
							<a href="#">Manager</a></li> <span class="divider">/</span>
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
							</div>
			</div>
		<!-- END STATISTICS -->
<!-- END OVERVIEW STATISTIC BARS-->
					<div class="row-fluid">
						<div class="span6">
							<!-- BEGIN RECENT ORDERS PORTLET-->
							<div class="widget">
								<div class="widget-title">
									<h4><i class="icon-shopping-cart"></i>Recent Applications  Investment Certificates</h4>						
								</div>
								<div class="widget-body">
								<?php if(count($new_applications) != null) : ?>
									<table class="table table-striped table-bordered table-advance table-hover">
										<thead>
											<tr>
												<th><i class="icon-user"></i> <span class="hidden-phone">From</span></th>
												<th><i class="icon-briefcase"></i> <span class="hidden-phone ">Business Name</span></th>
												<th><i class=""> </i><span class="hidden-phone">Submitted On</span></th>
												<th></th>
											</tr>
										</thead>
										<tbody>
										  <?php foreach($new_applications as $available): ?>
											<tr>
												<td class="highlight">
													<?php echo $available['updated_by'] ?>
												</td>
												<td><?php echo $available['name'] ?></td>
												<td> <?php echo $available['created_at'] ?> </td>
												<td> <a href="<?php echo url_for('InvestmentCertTaskAssignment/new') ?>"><button class="btn btn-inverse"><i class="icon-refresh icon-white"></i> Assign to Staff</button></a></td>
											</tr>
										<?php endforeach;?>	
										
										</tbody>
									</table>
								<?php endif; ?>
							    <?php if(count($new_applications) <= 0): ?>
								<div class="alert alert-info">
										<strong>Information!</strong> <br/>Sorry, I found no record to display. Seems like all applications
										for Investment Certificate have been assigned to data admins or there are no new applications.
										I will try later... 
								</div>
							    <?php  endif; ?>
									<div class="space7"></div>
									<div class="clearfix">
										<a href="<?php echo url_for('InvestmentCertTaskAssignment/index') ?>" class="btn btn-mini pull-right">View All Assigned Tasks</a>
									</div>
								</div>
							</div>
							<!-- END RECENT ORDERS PORTLET-->
						</div>
						<div class="span6">
							<!-- BEGIN RECENT ORDERS PORTLET-->
							<div class="widget">
								<div class="widget-title">
									<h4><i class="icon-shopping-cart"></i>Recent Applications for  EIA Certificates</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
					
									<a href="javascript:;" class="icon-refresh"></a>		
									
									</span>							
								</div>
								<div class="widget-body">
									<?php if(count($unassigned) <= 0): ?>
									<div class="alert alert-info">
										<p><strong>Information!</strong> <br/> No record to display. Seems like all applications
										for Enviromental Impact Assessment Certificate have been assigned to data admins or there are no new applications.</p>
										<p> Try Again Later</p>
									</div>
									<?php endif ?>
									<table class="table table-striped table-bordered table-advance table-hover">
										<?php foreach($unassigned as $unassign): ?>
										<thead>
											<tr>
												<th><i class="icon-truck"></i> <span class="hidden-phone ">Developer's Name</span></th>
												<th><i class="icon-time"> </i><span class="hidden-phone">Submitted On</span></th>
												<th><i class="icon-user"> </i><span class="hidden-phone">Submitted By</span></th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<tr>
												
												<td><?php echo $unassign['name'] ?> </td>
												<td><?php echo $unassign['created_at'] ?></td>
												<td><?php echo $unassign['first_name'] ?></td>
											
												<td><?php echo button_to('Assign to Staff','EiTaskAssign/new',array('class' => 'btn btn-inverse')) ?></td>
											</tr>
											
											
										</tbody>
										<?php endforeach ?>
									</table>
									<div class="space7"></div>
									<div class="clearfix">
										<a href="#" class="btn btn-mini pull-right">View All</a>
									</div>
								</div>
							</div>
					</div>	</div>				
<?php endif; ?>
<!-- ********************************************************************** -->

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
									<h4><i class="icon-shopping-cart"></i>Available Jobs For Investment Certificates Applications</h4>
															
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
							<!-- END EXAMPLE TABLE PORTLET-->
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
									<h4><i class="icon-shopping-cart"></i>Available Jobs For EIA Certificates Applications</h4>
														
								</div>
								<div class="widget-body">
									<?php if(count($jobs) <= 0): ?>
									<div class="alert alert-info">
										<p><strong>Information!</strong> <br/> No jobs assigned.</p>
										<p>Reload the Page or Try Again Later</p>
									</div>
									<?php endif ?>
									<?php foreach($jobs as $job ): ?>
									<table class="table table-striped table-bordered table-advance table-hover">
										<thead>
											<tr>
												<th><i class="icon-briefcase"></i> <span class="hidden-phone">For Business</span></th>
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
												<td><?php echo button_to('Process','EiTaskAssign/assignment'); ?></td>
											</tr>
											
											
										</tbody>
									</table>
									<?php endforeach ?>
									<div class="space7"></div>
									<div class="clearfix">
										<a href="#" class="btn btn-mini pull-right">View All</a>
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
									<?php endif ?>
							<? endif ?>
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
										<td><?php echo link_to($tor['developer_name'],'tor2/show?id='.$tor['id']) ?></td>
										<td><?php echo $tor['updated_by'] ?></td>
										<td><?php echo button_to('View','tor2/show?id='.$tor['id'],array('class' => 'btn btn-inverse')) ?></td>
									</tr>
								</tbody>
							</table>
							<?php endforeach ?>
							</div>
						</div>
					</div>
				</div>
					
<?php endif; ?>		
<!-- ********************************************************************** -->


</div>						


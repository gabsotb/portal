<div id="page" class="dashboard"><!-- ******************************************************************* --><?php if($sf_user->hasCredential('assignJob')): ?><!-- The Logged in User only see this part if he/she has the right to assign a job to an administrator -->		<!-- BEGIN OVERVIEW STATISTIC BARS-->							<div class="row-fluid stats-overview-cont">								<div class="span2 responsive" data-tablet="span4" data-desktop="span2">									<div class="stats-overview block clearfix">										<div class="display stat ok huge">											<span class="line-chart">5, 6, 7, 11, 14, 10, 15, 19, 15, 2</span>											<div class="percent">+66%</div>										</div>										<div class="details">											<div class="title">Total Registered Investors</div>											<div class="numbers">1360</div>										</div>										<div class="progress progress-info">											<div class="bar" style="width: 66%"></div>										</div>									</div>								</div>								<div class="span2 responsive" data-tablet="span4" data-desktop="span2">									<div class="stats-overview block clearfix">										<div class="display stat good huge">											<span class="line-chart">2,6,8,12, 11, 15, 16, 11, 16, 11, 10, 3, 7, 8, 12, 19</span>											<div class="percent">+16%</div>										</div>										<div class="details">											<div class="title">Total Investment Certificates Issued</div>											<div class="numbers">1800</div>											<div class="progress progress-warning">												<div class="bar" style="width: 16%"></div>											</div>										</div>									</div>								</div>								<div class="span2 responsive " data-tablet="span4" data-desktop="span2">									<div class="stats-overview block clearfix">										<div class="display stat bad huge">											<span class="line-chart">2,6,8,11, 14, 11, 12, 13, 15, 12, 9, 5, 11, 12, 15, 9,3</span>											<div class="percent">+6%</div>										</div>										<div class="details">											<div class="title">Total EIA Certificates Issued</div>											<div class="numbers">509</div>											<div class="progress progress-success">												<div class="bar" style="width: 16%"></div>											</div>										</div>									</div>								</div>								<div class="span2 responsive" data-tablet="span4" data-desktop="span2">									<div class="stats-overview block clearfix">										<div class="display stat bad huge">											<span class="line-chart">1,7,9,11, 14, 12, 6, 7, 4, 2, 9, 8, 11, 12, 14, 12, 10</span>											<div class="percent">+15%</div>										</div>										<div class="details">											<div class="title">Tax Exemptions Granted</div>											<div class="numbers">2090</div>											<div class="progress progress-success">												<div class="bar" style="width: 15%"></div>											</div>										</div>									</div>								</div>							</div>		<!-- END STATISTICS --><!-- END OVERVIEW STATISTIC BARS-->					<div class="row-fluid">						<div class="span6">							<!-- BEGIN RECENT ORDERS PORTLET-->							<div class="widget">								<div class="widget-title">									<h4><i class="icon-shopping-cart"></i>Recent Applications  Investment Certificates</h4>														</div>								<div class="widget-body">								<?php if(count($new_applications) != null) : ?>									<table class="table table-striped table-bordered table-advance table-hover">										<thead>											<tr>												<th><i class="icon-user"></i> <span class="hidden-phone">From</span></th>												<th><i class="icon-briefcase"></i> <span class="hidden-phone ">Business Name</span></th>												<th><i class=""> </i><span class="hidden-phone">Submitted On</span></th>												<th></th>											</tr>										</thead>										<tbody>										  <?php foreach($new_applications as $available): ?>											<tr>												<td class="highlight">													<?php echo $available['updated_by'] ?>												</td>												<td><?php echo $available['name'] ?></td>												<td> <?php echo $available['created_at'] ?> </td>												<td> <a href="<?php echo url_for('dataAdminJob/new') ?>"><button class="btn btn-inverse"><i class="icon-refresh icon-white"></i> Assign to Staff</button></a></td>											</tr>										<?php endforeach;?>																					</tbody>									</table>								<?php endif; ?>							    <?php if(count($new_applications) <= 0): ?>								<div class="alert alert-info">										<strong>Information!</strong> <br/>Sorry, I found no record to display. Seems like all applications										for Investment Certificate have been assigned to data admins or there are no new applications.										I will try later... 								</div>							    <?php  endif; ?>									<div class="space7"></div>									<div class="clearfix">										<a href="<?php echo url_for('taskManagement/index') ?>" class="btn btn-mini pull-right">View All Assigned Tasks</a>									</div>								</div>							</div>							<!-- END RECENT ORDERS PORTLET-->						</div>						<div class="span6">							<!-- BEGIN RECENT ORDERS PORTLET-->							<div class="widget">								<div class="widget-title">									<h4><i class="icon-shopping-cart"></i>Recent Applications for  EIA Certificates</h4>									<span class="tools">									<a href="javascript:;" class="icon-chevron-down"></a>									<a href="#widget-config" data-toggle="modal" class="icon-wrench"></a>									<a href="javascript:;" class="icon-refresh"></a>											<a href="javascript:;" class="icon-remove"></a>									</span>															</div>								<div class="widget-body">									<table class="table table-striped table-bordered table-advance table-hover">										<thead>											<tr>												<th><i class="icon-briefcase"></i> <span class="hidden-phone">From</span></th>												<th><i class="icon-user"></i> <span class="hidden-phone ">Business Name</span></th>												<th><i class="icon-shopping-cart"> </i><span class="hidden-phone">Submitted On</span></th>												<th></th>											</tr>										</thead>										<tbody>											<tr>												<td class="highlight">													<div class="success"></div>													<a href="#">Ikea</a>												</td>												<td>Elis Yong</td>												<td>Monday 20, 2013 </td>												<td> <button class="btn btn-inverse"><i class="icon-refresh icon-white"></i> Assign to Staff</button></td>											</tr>											<tr>												<td class="highlight">													<div class="info"></div>													<a href="#">37Singals</a>												</td>												<td>Edward Cooper</td>												<td>Tuesday 2, 2013  </td>												<td> 												<a href="<?php echo url_for('taskAssign/new') ?>">												<button class="btn btn-inverse"><i class="icon-refresh icon-white"></i> Assign to Staff</button>					</a>												</td>											</tr>																					</tbody>									</table>									<div class="space7"></div>									<div class="clearfix">										<a href="#" class="btn btn-mini pull-right">View All</a>									</div>								</div>							</div>					</div>	</div>				<?php endif; ?><!-- ********************************************************************** --><!-- ********************************************************************** --><?php if($sf_user->hasCredential('investmentcert')): ?>	<!-- Available for users who can issue Investment Certificates -->					<!-- End Section for Department Administrator -->			<!-- This section is for users with less administrative privealenges The data admins belong to this -->  		<!-- BEGIN OVERVIEW STATISTIC BARS-->		<div class="row-fluid">							<div class="row-fluid stats-overview-cont">								<div class="span2 responsive" data-tablet="span4" data-desktop="span2">									<div class="stats-overview block clearfix">										<div class="display stat ok huge">											<span class="line-chart">5, 6, 7, 11, 14, 10, 15, 19, 15, 2</span>											<div class="percent">+66%</div>										</div>										<div class="details">											<div class="title">Pending Tasks</div>											<div class="numbers">1360</div>										</div>										<div class="progress progress-info">											<div class="bar" style="width: 66%"></div>										</div>									</div>								</div>								<div class="span2 responsive" data-tablet="span4" data-desktop="span2">									<div class="stats-overview block clearfix">										<div class="display stat good huge">											<span class="line-chart">2,6,8,12, 11, 15, 16, 11, 16, 11, 10, 3, 7, 8, 12, 19</span>											<div class="percent">+16%</div>										</div>										<div class="details">											<div class="title">Completed Tasks</div>											<div class="numbers">1800</div>											<div class="progress progress-warning">												<div class="bar" style="width: 16%"></div>											</div>										</div>									</div>								</div>								<div class="span2 responsive " data-tablet="span4" data-desktop="span2">									<div class="stats-overview block clearfix">										<div class="display stat bad huge">											<span class="line-chart">2,6,8,11, 14, 11, 12, 13, 15, 12, 9, 5, 11, 12, 15, 9,3</span>																					</div>										<div class="details">											<div class="title"> Inbox Messages</div>											<div class="numbers">6 unread</div>											<div class="progress progress-success">												<div class="bar" style="width: 16%"></div>											</div>										</div>									</div>								</div>															</div>		<!-- END STATISTICS -->    </div>		    <div class="row-fluid"><!-- When logged, they can only see tasks assigned to them by the department administrators -->		<div class="span8">							<!-- BEGIN RECENT ORDERS PORTLET-->							<div class="widget">								<div class="widget-title">									<h4><i class="icon-shopping-cart"></i>Available Jobs For Investment Certificates Applications</h4>									<span class="tools">									<a href="javascript:;" class="icon-chevron-down"></a>									<a href="#widget-config" data-toggle="modal" class="icon-wrench"></a>									<a href="javascript:;" class="icon-refresh"></a>											<a href="javascript:;" class="icon-remove"></a>									</span>															</div>								<div class="widget-body">								<?php if(count($mytasks) != null) : ?>									<table class="table table-striped table-bordered table-advance table-hover">										<thead>											<tr>												<th><i class="icon-briefcase"></i> <span class="hidden-phone">For Business</span></th>												<th><i class="icon-user"></i> <span class="hidden-phone ">Instructions</span></th>												<th><i class="icon-shopping-cart"> </i><span class="hidden-phone">Work Status</span></th>												<th><i class="icon-shopping-cart"> </i><span class="hidden-phone">Due date</span></th>												<th></th>											</tr>										</thead>										<tbody>										<?php foreach($mytasks as $tasks):  ?>											<tr>												<td><?php echo $tasks['name'] ?></td>												<td><?php echo $tasks['instructions'] ?></td>												<td><?php echo $tasks['work_status'] ?></td>												<td><?php echo $tasks['duedate'] ?></td>												<td> <a href="<?php echo url_for('dashboard/start?id='.$tasks['investmentapp_id']) ?>"><button class="btn btn-inverse"><i class="icon-refresh icon-white"></i> Start Work</button></a></td>											</tr>									  <?php endforeach; ?>																					</tbody>									</table>																<div class="space7"></div>									<div class="clearfix">										<a href="#" class="btn btn-mini pull-right">View All</a>									</div>							 <?php endif; ?>								<?php if(count($mytasks) <= 0): ?>								<div class="alert alert-info">										<strong>Information!</strong> <br/>Sorry, I found no new tasks assigned to you										to display. I will try later... 								</div>							 <?php  endif; ?>								</div>							</div>					</div>						<div class="span4">							<!-- BEGIN NOTIFICATIONS PORTLET-->							<div class="widget">								<div class="widget-title">									<h4><i class="icon-bell"></i>Task Monitor Notifications</h4>									<span class="tools">									<a href="javascript:;" class="icon-chevron-down"></a>									<a href="#widget-config" data-toggle="modal" class="icon-wrench"></a>									<a href="javascript:;" class="icon-refresh"></a>									</span>															</div>								<div class="widget-body">								<?php if(count($mytasks) != null) : ?>									<ul class="item-list scroller padding" data-height="307" data-always-visible="1">										<li>											<span class="label label-success"><i class="icon-bell"></i></span>											<span>Not Tasks Yet Started. Please Start your Tasks </span>											<span>The Administrator has assigned you 5 tasks. Remember you have a deadline to meet! </span>																					</li>									</ul>								<?php endif; ?>								<?php if(count($mytasks) <= 0): ?>								<ul class="item-list scroller padding" data-height="307" data-always-visible="1">									<li>									<span class="label label-important"><i class="icon-bolt"></i></span>									<span>No new Tasks Assigned to you.</span>									</li>								</ul>								<?php  endif; ?>								<?php if(count($mytasks) != null) : ?>									<div class="space5"></div>									<a href="#" class="pull-right"> <button type="button" class="btn btn-success">View Tasks Started(2)</button></a>																			<div class="clearfix no-top-space no-bottom-space"></div>							    <?php endif; ?>								</div>							</div>							<!-- END NOTIFICATIONS PORTLET-->						</div>																				</div>					<!-- If this employee has some tasks started, show them please with there status and detailed information -->					 <div class="row-fluid">						<div class="span12">							<!-- BEGIN EXAMPLE TABLE PORTLET-->							<div class="widget">								<div class="widget-title">									<h4><i class="icon-reorder"></i>Table - Showing Tasks Not Yet Complete But Started</h4>									<span class="tools">									<a href="javascript:;" class="icon-chevron-down"></a>									<a href="#widget-config" data-toggle="modal" class="icon-wrench"></a>									<a href="javascript:;" class="icon-refresh"></a>											<a href="javascript:;" class="icon-remove"></a>									</span>															</div>								<div class="widget-body">																	<table class="table table-striped table-bordered" id="sample_1">										<thead>											<tr>																								<th>Business Name</th>												<th class="hidden-phone">Address</th>												<th class="hidden-phone">Application For</th>												<th class="hidden-phone">Due Date</th>												<th class="hidden-phone">Task Status</th>												<th>Actions</th>											</tr>										</thead>										<tbody>											<tr class="odd gradeX">											<?php foreach($mytasksnotcomplete as $notdone) :?>											<td><?php echo $notdone['name'] ?></td>											<td><?php echo $notdone['company_address'] ?></td>											<td><?php echo "Investment Certificate"?></td>											<td><?php echo $notdone['duedate'] ?></td>											<td><?php echo $notdone['work_status']  ?></td>											<td><a href="<?php echo url_for('dashboard/start?id='.$notdone['investmentapp_id']) ?>"><button class="btn btn-inverse"><i class="icon-refresh icon-white"></i> Process </button></a></td>											<?php endforeach; ?>												</tr>										</tbody>									</table>																</div>							</div>							<!-- END EXAMPLE TABLE PORTLET-->						</div>					</div>					<!-- End showing tasks -->					<?php endif; ?>		<!-- ********************************************************************** --><!-- ********************************************************************** --><?php if($sf_user->hasCredential('eiacert')): ?><!-- Available for users who can issue EIA Certificates -->					<!-- End Section for Department Administrator -->			<!-- This section is for users with less administrative privealenges The data admins belong to this -->  		<!-- BEGIN OVERVIEW STATISTIC BARS-->	<div class="row-fluid">						<div class="row-fluid stats-overview-cont">								<div class="span2 responsive" data-tablet="span4" data-desktop="span2">									<div class="stats-overview block clearfix">										<div class="display stat ok huge">											<span class="line-chart">5, 6, 7, 11, 14, 10, 15, 19, 15, 2</span>											<div class="percent">0%</div>										</div>										<div class="details">											<div class="title">Pending Tasks</div>											<div class="numbers">0</div>										</div>										<div class="progress progress-info">											<div class="bar" style="width: 66%"></div>										</div>									</div>								</div>								<div class="span2 responsive" data-tablet="span4" data-desktop="span2">									<div class="stats-overview block clearfix">										<div class="display stat good huge">											<span class="line-chart">2,6,8,12, 11, 15, 16, 11, 16, 11, 10, 3, 7, 8, 12, 19</span>											<div class="percent">0%</div>										</div>										<div class="details">											<div class="title">Completed Tasks</div>											<div class="numbers">0</div>											<div class="progress progress-warning">												<div class="bar" style="width: 16%"></div>											</div>										</div>									</div>								</div>								<div class="span2 responsive " data-tablet="span4" data-desktop="span2">									<div class="stats-overview block clearfix">										<div class="display stat bad huge">											<span class="line-chart">2,6,8,11, 14, 11, 12, 13, 15, 12, 9, 5, 11, 12, 15, 9,3</span>																					</div>										<div class="details">											<div class="title"> Inbox Messages</div>											<div class="numbers">0</div>											<div class="progress progress-success">												<div class="bar" style="width: 16%"></div>											</div>										</div>									</div>								</div>															</div>		<!-- END STATISTICS -->   </div>	<!-- When logged, they can only see tasks assigned to them by the department administrators -->	<div class="row-fluid">	<div class="span8">							<!-- BEGIN RECENT ORDERS PORTLET-->							<div class="widget">								<div class="widget-title">									<h4><i class="icon-shopping-cart"></i>Available Jobs For EIA Certificates Applications</h4>									<span class="tools">									<a href="javascript:;" class="icon-chevron-down"></a>									<a href="#widget-config" data-toggle="modal" class="icon-wrench"></a>									<a href="javascript:;" class="icon-refresh"></a>											<a href="javascript:;" class="icon-remove"></a>									</span>															</div>								<div class="widget-body">									<table class="table table-striped table-bordered table-advance table-hover">										<thead>											<tr>												<th><i class="icon-briefcase"></i> <span class="hidden-phone">For Business</span></th>												<th><i class="icon-user"></i> <span class="hidden-phone ">Instructions</span></th>												<th><i class="icon-shopping-cart"> </i><span class="hidden-phone">Work Status</span></th>												<th><i class="icon-shopping-cart"> </i><span class="hidden-phone">Due date</span></th>												<th></th>											</tr>										</thead>										<tbody>											<tr>										<div class="alert alert-info">										   <strong>Information!</strong> <br/>Sorry, I found no record to display. No Tasks Assigned to you 										   Try Later...								           </div>											</tr>																																</tbody>									</table>									<div class="space7"></div>									<div class="clearfix">										<a href="#" class="btn btn-mini pull-right">View All</a>									</div>								</div>							</div>					</div> 					  </div>					<?php endif; ?>		<!-- ********************************************************************** --></div>						
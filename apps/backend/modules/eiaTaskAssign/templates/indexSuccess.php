<?php //if($sf_user->hasCredential('assignJob') && $sf_user->hasCredential('investmentsupervisros')): ?>
<div id="page" class="dashboard">
 <div class="row-fluid">
       <div class="span12">
						<!-- BEGIN STYLE CUSTOMIZER-->
						<!-- END STYLE CUSTOMIZER-->    	
						<!-- BEGIN PAGE TITLE & BREADCRUMB-->		
						<h3 class="page-title">
							<?php echo __('Managers Account') ?>
							<small><?php echo __('Assign Tasks and Manage User Accounts') ?></small>
						</h3>
							<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="#"><?php echo __('Dashboard') ?></a> <span class="divider">/</span>
							</li>
							<li>
							<i class="icon-desktop"></i>
							<a href="#"><?php echo __('Manager') ?></a></li> <span class="divider">/</span>
							<li>
							<li>
							<i class="icon-desktop"></i>
							<a href="#"><?php echo __('EIA Task Assignment') ?></a></li> <span class="divider">/</span>
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
					
					<div class="span11">
							<!-- BEGIN RECENT ORDERS PORTLET-->
							<div class="widget">
								<div class="widget-title">
									<h4><?php echo __('EIA Certificates - Task Assignment Record') ?></h4>						
								</div>
								<div class="widget-body">
								<?php if(count($ei_task_assignments) != null) : ?>
									<table class="table table-striped table-bordered" id="tasks_monitor">
										<thead>
											<tr>
												<th><i class="icon-user"></i> <span class="hidden-phone"><?php echo __('Assigned To') ?></span></th>
												
												<th><span class="hidden-phone"><?php echo __('Applicant Reference No') ?></span></th>
												
												<th><span class="hidden-phone"><?php echo __('Project Name') ?></span></th>
												<th><span class="hidden-phone"><?php echo __('Due Date') ?></span></th>
												<th><span class="hidden-phone"><?php echo __('Instructions') ?></span></th>
												<th><span class="hidden-phone"><?php echo __('Work Status') ?></span></th>
												<th><span class="hidden-phone"><?php echo __('Actions') ?></span></th>
											</tr>
										</thead>
										<tbody>
										  <?php foreach($ei_task_assignments as $available): ?>
											<tr class="odd gradeX">
											    <td class="highlight">
													<?php echo $available['username'] ?></td>
											    <td><?php echo $available['project_reference_number']?> </td>
												
												<td><?php echo $available['name'] ?></td>
												<td> <?php echo $available['duedate'] ?> </td>
												<td> <?php echo $available['instructions'] ?> </td>
												<td> 
												<!-- we are going to mark this red if not started -->
												<?php  
												$status =  $available['work_status'] ;
												?> 
												<?php if($status == "notstarted"): ?>
												  <font color="red"><?php echo $status; ?></font>
												<?php endif; ?>
												<!-- else -->
												<?php if($status != "notstarted"): ?>
												  <font color="green"><?php echo $status; ?></font>
												<?php endif; ?>
												</td>
												<td> 
												 <?php if($status !='complete'): ?>
												 <?php if($status !='rejected'): ?>
												 <a href="<?php echo url_for('eiaTaskAssign/edit?id='.$available['id'])?>"><?php echo __('Edit') ?></a>
												 <?php endif; ?>
												
												
												<?php endif; ?>
												</td>
												
											</tr>
										<?php endforeach;?>	
										
										</tbody>
									</table>
								<?php endif; ?>
							    <?php if(count($ei_task_assignments) <= 0): ?>
								<div class="alert alert-info">
										<strong><?php echo __('Information') ?>!</strong> <br/><?php echo __('Sorry, I found no record to display')?>. 
								</div>
							    <?php  endif; ?>
								<?php if(count($ei_task_assignments) > 0): ?>
									<div class="space7"></div>
									<div class="clearfix">
										<a href="<?php echo url_for('InvestmentCertTaskAssignment/new') ?>" class="btn btn-primary"><?php echo __('Assign Tasks') ?></a>
									</div>
								 <?php  endif; ?>
								</div>
							</div>
							<!-- END RECENT ORDERS PORTLET-->
						</div>


  </div>
  </div>
<?php //endif; ?>
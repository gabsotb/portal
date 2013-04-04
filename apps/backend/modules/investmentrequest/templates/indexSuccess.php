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
							<a href="#"><?php echo __('Investment Permission') ?></a></li> <span class="divider">/</span>
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
      <div class="widget">
								<div class="widget-title">
									<h4><?php echo __('Investment Permisions to Data Admins - Grant Permissions to Data Admins') ?></h4>						
								</div>
		                       <div class="widget-body">
							    <table class="table table-striped table-bordered" id="inboxbackend">
								  <thead>
									<tr>
									  
									  <th><?php echo __('Requestor') ?></th>
									  <th><?php echo __('Request type') ?></th>
									  <th><?php echo __('Status') ?></th>
									  <th><?php echo __('Business name') ?></th>
									  <th><?php echo __('Comments') ?></th>
									  <th><?php echo __('Date') ?></th>
									  
									</tr>
								  </thead>
								  <tbody>
									<?php foreach ($investment_requestss as $investment_requests): ?>
									<tr>
									  
									  <td><?php echo $investment_requests->getRequestor() ?></td>
									  <td><?php echo $investment_requests->getRequestType() ?></td>
									  <td><?php echo $investment_requests->getStatus() ?></td>
									  <td><?php echo $investment_requests->getBusinessRegistration() ?></td>
									  <td><?php echo $investment_requests->getComments() ?></td>
									  <td><?php echo $investment_requests->getCreatedAt() ?></td>
									 
									</tr>
									<?php endforeach; ?>
								  </tbody>
								</table>
                                   <a href="<?php echo url_for('investmentrequest/new') ?>"><button type="button" class="btn btn-warning"><?php echo __('New') ?></button></a>
							    </div>
	 </div>
      

    </div>
 </div>
</div>



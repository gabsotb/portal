<div id="page" class="dashboard">
 <div class="row-fluid">
    <div class="span12">
						<!-- BEGIN STYLE CUSTOMIZER-->
						<!-- END STYLE CUSTOMIZER-->    	
						<!-- BEGIN PAGE TITLE & BREADCRUMB-->		
						<h3 class="page-title">
							Tasks Management Account
							<small>Assign Tasks to EIA Data Administrators</small>
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
							<li>
							<i class="icon-desktop"></i>
							<a href="#">Task Assignment</a></li> <span class="divider">/</span>
							<li>
							<i class="icon-desktop"></i>
							<a href="#">EIA Tasks List</a></li> <span class="divider">/</span>
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
	<div class="span10">
			<div class="widget">
				<div class="widget-title">
					<h4><i class="icon-reorder"></i>EIA Task Assignments List</h4>
				</div>
				<div class="widget-body">
					
					<table class="table table-striped table-hover" id = "eiatasklist" >
					  <thead>
						<tr>
						 
						  <th>User assigned</th>
						  <th>Company</th>
						  <th>Instructions</th>
						  <th>Duedate</th>
						  <th>Work status</th>
						  <th>Date Assigned</th>
						  <th>Actions</th>
						</tr>
					  </thead>
					  <tbody>
						<?php foreach ($ei_task_assignments as $ei_task_assignment): ?>
						<tr class="odd gradeX">
						  <td><?php echo $ei_task_assignment->getSfGuardUser() ?></td>
						  <td><?php echo $ei_task_assignment->getEIApplication() ?></td>
						  <td><?php echo $ei_task_assignment->getInstructions() ?></td>
						  <td><?php echo $ei_task_assignment->getDuedate() ?></td>
						  <td><?php echo $ei_task_assignment->getWorkStatus() ?></td>
						  <td><?php echo $ei_task_assignment->getCreatedAt() ?></td>
						 
						  <td>
						  <a href="<?php echo url_for('eiaTaskAssign/show?id='.$ei_task_assignment->getId()) ?>" class="icon huge"><i class="icon-zoom-in"></i></a>
						  <a href="<?php echo url_for('eiaTaskAssign/edit?id='.$ei_task_assignment->getId()) ?>" class="icon huge"><i class="icon-pencil"></i></a>
						 
						  </td>
						</tr>
						<?php endforeach; ?>
					  </tbody>
					</table>
					 
				</div>
			</div>
					
 </div>
</div>
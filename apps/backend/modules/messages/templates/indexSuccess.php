
<div id="page" class="dashboard">


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
							<li>
							<i class="icon-desktop"></i>
							<a href="#">Inbox Messages</a></li> <span class="divider">/</span>
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
						<div class="span11">
						
						<div class="widget">
								<div class="widget-title">
									<h4><i class="icon-envelope-alt"></i>System Inbox Messages: </h4>						
								</div>
								<div class="widget-body">
									<table class="table table-striped table-bordered" id="inboxbackend">
										<thead>
											<tr>
												
												<th>From</th>
												<th class="hidden-phone">Message</th>
												<th class="hidden-phone">Attachment</th>
												<th class="hidden-phone">Date</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
										   <?php foreach ($messagess as $messages): ?>
											<tr class="odd gradeX">
												<td><?php echo $messages['sender'] ?></td>
												<td><?php echo $messages['message']?></td>
												<td><?php echo $messages['attachement'] ?></td>
												<td><?php echo $messages['created_at']?></td>
												<td class="center">
												<?php echo link_to('Delete', 'messages/delete?id='.$messages['id'], array('method' => 'delete', 'confirm' => 'Are you sure?')) ?><i class="icon-remove"></i>
												<a href="<?php echo url_for('messages/show?id='.$messages['id']) ?>"><i class="icon-zoom-in"></i>View</a>
												
												</td>
											</tr>
										  <?php endforeach; ?>
			
										</tbody>
									</table>
								</div>
							</div>
						
						
						</div>	
					</div>	
</div>



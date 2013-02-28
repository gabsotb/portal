
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
							<a href="#">Task Assignment</a></li> <span class="divider">/</span>
							<i class="icon-desktop"></i>
							<a href="#">Edit</a></li> <span class="divider">/</span>
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
					 <div class="span8">
					 <div class="widget">
					  <div class="widget-title">
									<h4>Edit Task assignment Record   </h4>						
								</div>
								<div class="widget-body">
								  <?php include_partial('form', array('form' => $form)) ?>
								</div>
					 
					 </div>
					  
					 </div>

</div>
</div>

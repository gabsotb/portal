
<div id="page" class="dashboard">
<div class="row-fluid">
					<div class="span12">    	
						<!-- BEGIN PAGE TITLE & BREADCRUMB-->		
						<h3 class="page-title">
							Information Portlets Dashboard
							<small>Edit, Create Information Portlets record.</small>
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="<?php echo url_for('dashboard/index')?>">Home</a> <span class="divider">/</span>
							</li>
							<li>
							<i class="icon-desktop"></i>
							<a href="<?php echo url_for('dashboard/index')?>">Dashboard</a></li> <span class="divider">/</span>
							<li>
							<i class="icon-desktop"></i>
							<a href="<?php echo url_for('portlets/index')?>">Portlets</a></li> <span class="divider">/</span>
							<li>
							<i class="icon-desktop"></i>
							<a href="<?php echo url_for('portlets/index')?>">New</a></li> <span class="divider">/</span>
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
				<div class="span11">
				   
				   <div class="widget">
								<div class="widget-title">
									<h4>Information Portlets</h4>
															
								</div>
								<div class="widget-body">
									<?php include_partial('form', array('form' => $form)) ?>
								</div>
							</div>
				   
				   
				   
					

				

				
				
				</div>

  				
	</div>
</div>




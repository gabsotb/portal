<div id="page" class="dashboard">
<div class="row-fluid">
                  <div class="span12">
						<!-- BEGIN STYLE CUSTOMIZER-->
						<!-- END STYLE CUSTOMIZER-->    	
						<!-- BEGIN PAGE TITLE & BREADCRUMB-->		
						<h3 class="page-title">
							<?php echo __('Managers Account') ?>
							<small><?php echo __('Assign Tasks') ?> </small>
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

			  <div class="span10">
				<div class="widget">
				 <div class="widget-title">
					<h4><i class="icon-reorder"></i><?php echo __('EIA Certificates') ?></h4>						
							</div>
					<div class="widget-body">
					<div class="alert alert-block alert-info fade in">
																
									<h4 class="alert-heading"><?php echo __('EIA Task Management') ?></h4>
									<p>
										<?php echo __('Please Fill Field below To Assign This Task To Data Administrator') ?>
									</p>
								 </div>
							 <?php include_partial('form', array('form' => $form)) ?>
					</div>			 

				</div>
			</div>
			
</div>

</div>


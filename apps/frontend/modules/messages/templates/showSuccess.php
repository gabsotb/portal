<div id="page" class="dashboard">
<div class="row-fluid">
					<div class="span12">
						    	
						<!-- BEGIN PAGE TITLE & BREADCRUMB-->		
						<h3 class="page-title">
							<?php echo __('Inbox') ?>
							<small><?php echo __('View your Messages') ?></small>
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="<?php echo url_for('investmentapp/index') ?>"><?php echo __('Dashboard') ?></a> <span class="divider">/</span>
							</li>
							<li>
								<i class="icon-envelope-alt"></i>
								<a href="#"><?php echo __('inbox') ?></a> <span class="divider">/</span>
							</li>
							<li>
								<i class="icon-zoom-in"></i>
								<a href="#"><?php echo __('view-message') ?></a> <span class="divider">/</span>
							</li>
							
						</ul>
						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>
				</div>
					<div class="row-fluid">
						<div class="span12">
						
						<div class="widget">
								
								<div class="widget-body">
									<div class="row-fluid">
										<div class="span6">
											<p class="text-warning"><?php echo __('From:') ?> <?php echo $messages['sender']?></p>
											 <p class="text-success"><?php echo __('Date:') ?> <?php echo $messages['created_at'] ?></p></p>
											<p class="lead">
												<?php echo $messages['message'] ?>
											</p>
											<p>
											 <?php echo $messages['attachement'] ?>
											</p>
											<p>
											  <a href="<?php echo url_for('messages/index') ?>">
											  <button type="button" class="btn btn-primary"><?php echo __('inbox') ?></button>
											  </a>
											
											</p>
										</div>
										
									</div>
									
									
								</div>
							</div>
						
						</div>	
					</div>	
</div>



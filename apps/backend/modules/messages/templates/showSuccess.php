<div id="page" class="dashboard">
<div class="row-fluid">
					<div class="span12">
						    	
						<!-- BEGIN PAGE TITLE & BREADCRUMB-->		
						<h3 class="page-title">
							Inbox
							<small>View your Messages</small>
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="<?php echo url_for('investmentapp/index') ?>">Dashboard</a> <span class="divider">/</span>
							</li>
							<li>
								<i class="icon-envelope-alt"></i>
								<a href="#">inbox</a> <span class="divider">/</span>
							</li>
							<li>
								<i class="icon-zoom-in"></i>
								<a href="#">view-message</a> <span class="divider">/</span>
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
											<p class="text-warning">From: <?php echo $messages['sender']?></p>
											 <p class="text-success">Date: <?php echo $messages['created_at'] ?></p></p>
											<p class="lead">
												<?php echo $messages['message'] ?>
											</p>
											<p>
											 
											 <?php 
											  // $model = new Messages() ;
											 ?>
											 <?php echo link_to('download attachment', '/uploads/documents/messages_docs/'.$messages['attachement'], array('target' => '_blank')); ?>
											 
											</p>
											<p>
											  <a href="<?php echo url_for('messages/index') ?>">
											  <button type="button" class="btn btn-primary">inbox</button>
											  </a>
											
											</p>
										</div>
										
									</div>
									
									
								</div>
							</div>
						
						</div>	
					</div>	
</div>



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
												<?php echo html_entity_decode($messages['message']) ?>
											</p>
											<p>
											 <?php if($messages['attachement'] == null): ?>
												  <?php echo __('No Attachment') ?>
												  <?php endif; ?>
												  <?php if($messages['attachement'] != null): ?>
												  <?php echo link_to('download', '/uploads/documents/messages_docs/'.$messages['attachement'], array('target' => '_blank')); ?>
												  <?php endif; ?>
											</p>
											<p>
											  <a href="<?php echo url_for('messages/index') ?>">
											  <button type="button" class="btn btn-primary"><?php echo __('inbox') ?></button>
											  </a>
											<?php echo button_to('Reply','messages/reply?recepient='.$messages['sender'].'&email='.$messages['sender_email'],array('class' => 'btn btn-success')) ?>
											</p>
										</div>
										
									</div>
									
									
								</div>
							</div>
						
						</div>	
					</div>	
</div>



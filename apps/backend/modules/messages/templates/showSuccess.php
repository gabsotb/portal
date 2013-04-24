<div id="page" class="dashboard">
<div class="row-fluid">
					
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
											  <button type="button" class="btn btn-primary">inbox</button>
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



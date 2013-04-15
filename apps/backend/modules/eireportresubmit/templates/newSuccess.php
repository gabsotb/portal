<div class="row-fluid">
 <div class="span10">
				<div class="widget">
				 <div class="widget-title">
					<h4><i class="icon-reorder"></i><?php echo __('EIA Report') ?></h4>						
							</div>
					<div class="widget-body">
					<div class="alert alert-block alert-info fade in">
																
									<h4 class="alert-heading"><?php echo __('Request Applicant to resubmit EIA report documents') ?>
									<?php  
									
									$logged_user = sfContext::getInstance()->getUser()->getGuardUser()->getUserName(); 
									
									?>
									</h4>
								 </div>
							 <?php include_partial('form', array('form' => $form)) ?>
					</div>			 

				</div>
			</div>
</div>



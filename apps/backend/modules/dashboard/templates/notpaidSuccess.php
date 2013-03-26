<div class="row-fluid">
						<div class="span6">
						   <div class="widget">
								<div class="widget-title">
									<h4><?php echo __('Administrative Fee Payment Validation System') ?></h4>						
								</div>
								<div class="widget-body">
									<div class="alert alert-block alert-error fade in">
										
										<h4 class="alert-heading"><?php echo __('Error Detected') ?>!</h4>
										<p>
											<?php echo __('Sorry, This Receipt Number Is Invalid')?>. <br>
											<?php echo __('Are you sure this investor has paid? Please try later')?>...
										</p>
										<p>
										 <a href="<?php echo url_for('dashboard/index') ?>"><button class="btn btn-inverse"> <?php echo __('Okay') ?></button></a>
										</p>
									</div>
									
									
									
								</div>
							</div>
						</div>
</div>
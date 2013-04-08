<div class="row-fluid">
						<div class="span6">
						   <div class="widget">
								<div class="widget-title">
									<h4><?php echo __('Administrative Fee Payment Validation System') ?></h4>						
								</div>
								<div class="widget-body">
										<div class="alert alert-block alert-success fade in">
										<h4 class="alert-heading"><?php echo __('Payment Confirmed')?>!</h4>
										<p>
									<?php echo __('The Payment For Adminsitrative Fee of usd 500 has been confirmed') ?>. <br/>
											<?php echo __('Go ahead and issue Investment Certificate to')?> <?php echo $business ?>.
											
										</p>
										<p>
										<!-- This Code Has a small problem that needs fixing later -->
								<a class="btn btn-success" href="<?php //echo url_for('dashboard/investcert?business='.$business) ?>"><?php echo __('Issue Certificate') ?></a>
								<!-- end -->
											<a class="btn" href="<?php echo url_for('dashboard/index') ?>"><?php echo __('Cancel') ?></a>
										</p>
									</div>
									
									
									
								</div>
							</div>
						</div>
</div>
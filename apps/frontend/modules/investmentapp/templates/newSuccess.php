
<?php //exit; ?>
<div class="row-fluid">
			  <div class="span8">
				<div class="widget">
				 <div class="widget-title">
					<h4><i class="icon-reorder"></i><?php echo __('Investment Certificates ---- Company Details Form') ?></h4>						
					</div>
            <div class="widget-body">
			<div class="alert alert-block alert-info fade in">
														
							<h4 class="alert-heading"><?php echo __('Step 1') ?></h4>
							<p>
								<?php echo __('Please Provide Below Fields to Start your application for investment certificate') ?> 
							</p>
						 </div>
						 <?php //exit; ?>
			         <?php include_partial('form', array('form' => $form)) ?>
		    </div>			 

			</div>
			</div>
			<div class="span4">
						
							
							<div class="widget">
											<div class="widget-title">
												<h4><i class="icon-bell"></i><?php echo __('Important') ?></h4>						
											</div>
											<div class="widget-body">
											<div class="alert alert-success">
										    <strong><?php echo __('To successfuly submit this information, make sure that you have a valid business 
											registration number. You company must be registered via the Business Registration System') ?></strong>
											</div>
											</div>
							</div>
			</div>
</div>

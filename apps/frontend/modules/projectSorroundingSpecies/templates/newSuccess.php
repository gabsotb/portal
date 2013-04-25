<div class="row-fluid">
			  <div class="span11">
				<div class="widget">
				 <div class="widget-title">
					<h4><i class="icon-reorder"></i><?php echo __('EIA Certificates ---- Project Surrounding Species') ?></h4>						
					</div>
            <div class="widget-body">
			<div class="alert alert-block alert-info fade in">
														
							<!--h4 class="alert-heading">Step 5</h4>
							<p-->
								<h4><?php echo __('Please Provide Examples of Species of animals/plants (common or local name) neighbouring your project location below') ?></h4>
								<font color="red"><?php echo __('Click link below to Download a list of protected animals/species record adapted from Government of Rwanda(Office of The Prime Minister) records') ?></font><br/>
								<?php echo link_to('download example list', '/uploads/documents/files/protected_animals.docx', array('target' => '_blank')); ?>
								
							<!--/p-->
						 </div>
			         <?php include_partial('form', array('form' => $form)) ?>
		    </div>			 

			</div>
			</div>
</div>

<?php slot ('title', 'EIA Application Form') ?>	
<div class="span12">
	<div class="widget">
		<div class="widget-title">
			<h4><i class="icon-reorder"></i> Fill the following form</h4>
		</div>
		<div class="widget-body form">
			<div class="alert alert-block alert-info fade in">
				<h4 class="alert-heading">Step 1</h4>
					<p>
						Please Provide Below Fields to Start your application for Environmental Impact Assessment certificate 
					</p>
			</div>
			<?php include_partial('form',array('form' => $form)) ?>
		</div>
	</div>
</div>
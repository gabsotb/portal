<div class="row-fluid">
	<div class="widget">
		<div class="widget-title">
			<h4><i class="icon-reorder"></i><?php echo $actionDetails['heading'] ?></h4>
		</div>
		<div class="widget-body form">
		<div class="alert alert-block alert-info fade-in">
			<h4 class="alert-heading"><?php echo $actionDetails['body'] ?></h4>
		</div>
		<?php include_partial('form', array('form' => $form,'heading' => $actionDetails['heading'])) ?>
		</div>
	</div>
</div>
			
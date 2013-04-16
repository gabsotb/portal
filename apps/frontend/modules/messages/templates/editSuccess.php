<div class="row-fluid">
	<div class="widget">
		<div class="widget-title">
			<h4><?php echo $message['header'] ?></h4>
		</div>
		<div class="widget-body form">
		<div class="alert alert-block alert-info fade in">
			<h4 class="alert-heading"><?php echo $message['info'] ?></h4>
		</div>
		<?php include_partial('form', array('form' => $form)) ?>
		
		</div>
	</div>
</div>

<div class="row-fluid">
	<div class="widget">
		<div class="widget-title">
			<h4><i class="icon-reorder"></i>Site Visit</h4>
		</div>
		<div class="widget-body form">
		<div class="alert alert-info fade in">
			<h4 class="alert-heading"><?php echo $action['header'] ?></h4>
			<p><?php echo $action['info'] ?><p>
		</div>
		<?php include_partial('form', array('form' => $form,'action' => $action)) ?>
		</div>
	</div>
</div>

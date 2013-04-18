<div class="row-fluid">
	<div class="widget">
		<?php if(isset($message)): ?> 
		<div class="widget-title">
			<h4><?php echo $message['header'] ?></h4>
		</div>
		<div class="widget-body form">
		<div class="alert alert-block alert-info fade in">
			<h4 class="alert-heading"><?php echo $message['info'] ?></h4>
		</div>
		<?php endif; ?>
		<?php if(!isset($message)): ?> 
		<div class="widget-title">
			<h4><?php echo __('Edit Meaasge') ?></h4>
		</div>
		<div class="widget-body">
		<?php endif; ?>
		<?php include_partial('form', array('form' => $form)) ?>
		
		</div>
	</div>
</div>

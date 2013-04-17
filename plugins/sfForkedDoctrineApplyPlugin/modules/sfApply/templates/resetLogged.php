<?php use_helper('I18N') ?>
<?php use_stylesheets_for_form( $form ) ?>
<?php slot('sf_apply_login') ?>
<?php end_slot() ?>
<div class="row-fluid">
	<div class="span8">
		<div class="widget">
		<div class="widget-title">
					<h4><i class="icon-ok"></i><?php echo __('You may change your password using the form below.', array(), 'sfForkedApply') ?></h4>						
				</div>
            <div class="widget-body">
			   <form method="post" action="<?php echo url_for("sfApply/reset") ?>" name="sf_apply_reset_form" id="sf_apply_reset_form">
				<ul>
				<?php echo $form ?>
				</ul>
				<input type="submit" class="btn btn-primary" value="<?php echo __("Reset My Password", array(), 'sfForkedApply') ?>">
				<a href="<?php echo url_for('sfApply/resetCancel') ?>"><button type="button" class="btn btn-danger"><?php echo __('Cancel') ?></button></a>
				</form>
			</div>
			</div>
	</div>
</div>
  
  
  
  
  


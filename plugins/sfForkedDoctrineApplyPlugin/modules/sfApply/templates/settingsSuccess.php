<?php slot('sf_apply_login') ?>
<?php use_stylesheets_for_form( $form ) ?>
<?php end_slot() ?>
<?php use_helper("I18N") ?>
<div class="row-fluid" style="margin: 20px auto 5px;  background: url('/images/bgColor.jpg') repeat-x; padding: 10px 9px 15px; border-radius:8px; width: 1000px;">	
	<div class="span10" style="margin: 20px 100px;">
		<div class="widget">
			<div class="widget-title" style="text-align:center;">
				<h3><?php echo __("Account Settings", array(), 'sfForkedApply') ?></h3>
			</div>
			<div class="widget-body form">
			 <div class="sf_apply sf_apply_settings" >
			 
				<form method="post" action="<?php echo url_for("sfApply/settings") ?>" name="sf_apply_settings_form" id="sf_apply_settings_form">
				        
						<div class="control-group">
									
										<?php echo $form ?>
									
						</div>
				</form>
				<form method="GET" action="<?php echo url_for("sfApply/resetRequest") ?>" name="sf_apply_reset_request" id="sf_apply_reset_request">
				<p>
				<?php echo __('Click the button below to change your password.', array(), 'sfForkedApply'); ?>
				<?php
				$confirmation = sfConfig::get( 'app_sfForkedApply_confirmation' );
				if( $confirmation['reset_logged'] ): ?>
					<?php echo __('For security reasons, you
				will receive a confirmation email containing a link allowing you to complete the password change.', array(), 'sfForkedApply') ?>
				<?php endif; ?>
				</p>
				<input type="submit" value="<?php echo __("Change Password", array(), 'sfForkedApply') ?>" />
				</form>
				</div>
			</div>
		</div>
	</div>
</div>


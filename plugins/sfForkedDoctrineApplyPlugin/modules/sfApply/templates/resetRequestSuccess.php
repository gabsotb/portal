<?php use_helper('I18N') ?>
<?php use_stylesheets_for_form( $form ) ?>
<?php slot('sf_apply_login') ?>
<?php end_slot() ?>



<div class="sf_apply sf_apply_reset_request" style="background: url('/images/bgColor.jpg') repeat-x; margin: 10px 250px 20px; border-radius: 8px; padding: 5px;">
<?php echo $form->renderGlobalErrors() ?>
<form method="POST" action="<?php echo url_for('sfApply/resetRequest') ?>" name="sf_apply_reset_request" id="sf_apply_reset_request">
	<div class="well" style="margin: 10px;">
	<p class="center">
	<?php echo __('Forgot your username or password? No problem! Just enter your username <strong>or</strong>
	your email address and click "Reset My Password." You will receive an email message containing both your username and
	a link permitting you to change your password if you wish.', array(), 'sfForkedApply') ?>
	</p>
	</div>
	<div id="login">
		<div class="control-group">
			<div class="controls">
				<?php echo $form['username_or_email']->renderError() ?>
				<div class="input-prepend center">
					<?php echo $form['username_or_email']->renderLabel('<i class="icon-info-sign"></i>',array('class' => 'add-on')) ?>			
					<?php echo $form['username_or_email']->render(array('placeholder' => 'Username or email','class' => 'span2 tooltips', 'data-trigger' => 'hover', 'data-original-title' => 'Enter your Username or Email Address')) ?>
					<?php echo $form->renderHiddenFields() ?>
				</div>
				<div class="space10"></div>
			</div>
				<div class="submit_row">
				<input type="submit" class="btn btn-inverse" value="<?php echo __("Reset My Password", array(), 'sfForkedApply') ?>">
				<?php echo __("or", array(), 'sfForkedApply') ?> 
				<?php echo link_to(__('Cancel', array(), 'sfForkedApply'), sfConfig::get('app_sfForkedApply_after', sfConfig::get('app_sfApplyPlugin_after', '@homepage')),array('class' => 'btn btn-info')) ?>
				</div>
			
		</div>
	</div>
</form>

</div>

		
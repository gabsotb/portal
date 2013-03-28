<?php slot('sf_apply_login') ?>
<?php use_stylesheets_for_form( $form ) ?>
<?php end_slot() ?>
<?php use_helper("I18N") ?>
<div class="row-fluid">
					  <div class="span12">
						   	
						<!-- BEGIN PAGE TITLE & BREADCRUMB-->		
						<h3 class="page-title">
							Account Settings
							<small>Change or Update your Account Details</small>
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="<?php echo url_for('investmentapp/index') ?>">Dashboard</a> <span class="divider">/</span>
							</li>
							<li><a href="#">My Profile</a></li>
							
						</ul>
						<!-- END PAGE TITLE & BREADCRUMB-->
					 </div>
					 <div class="span10" style="margin: 20px 100px;">
		<div class="widget">
			<div class="widget-title" style="text-align:center;">
				<h3><?php echo __("Profile Settings", array(), 'sfForkedApply') ?></h3>
			</div>
			<div class="widget-body form">
				<div class="sf_apply sf_apply_settings" >
					<?php echo $form->renderGlobalErrors() ?>
					<form method="post" action="<?php echo url_for('sfApply/apply') ?>" name="sf_apply_apply_form" id="sf_apply_apply_form" class="form-horizontal">
					   <?php echo $form['salutation']->renderError() ?>
						<div class="control-group">
							
								<div class="controls">
								<div class="input-prepend"> 
								<?php echo $form['salutation']->renderLabel('<i class="icon-user"></i>',array('class' => 'add-on')) ?>
								</div> 
								<?php echo $form['salutation']->render(array('placeholder' => 'Salutation','class' => 'span8 tooltips', 'data-trigger' => 'hover', 'data-original-title' => 'Select Salutation')) ?>
								</div>
							
						</div>
						<?php echo $form['firstname']->renderError() ?>
						<div class="control-group">
							
								<div class="controls">
								<div class="input-prepend"> 
								<?php echo $form['firstname']->renderLabel('<i class="icon-user"></i>',array('class' => 'add-on')) ?>
								</div> 
								<?php echo $form['firstname']->render(array('placeholder' => 'First Name','class' => 'span8 tooltips', 'data-trigger' => 'hover', 'data-original-title' => 'Enter your First Name')) ?>
								</div>
							
						</div>
						
						<?php echo $form['lastname']->renderError() ?>
						<div class="control-group">
							
								<div class="controls">
								<div class="input-prepend"> 
								<?php echo $form['lastname']->renderLabel('<i class="icon-user"></i>',array('class' => 'add-on')) ?>
								</div> 
								<?php echo $form['lastname']->render(array('placeholder' => 'Last Name','class' => 'span8 tooltips', 'data-trigger' => 'hover', 'data-original-title' => 'Enter your Last Name')) ?>
								</div>
							
						</div>
						<?php echo $form['citizenship']->renderError() ?>
						<div class="control-group">
							
								<div class="controls">
								<div class="input-prepend"> 
								<?php echo $form['citizenship']->renderLabel('<i class="icon-user"></i>',array('class' => 'add-on')) ?>
								</div> 
								<?php echo $form['citizenship']->render(array('placeholder' => 'Country','class' => 'span8 tooltips', 'data-trigger' => 'hover', 'data-original-title' => 'Select Country')) ?>
								</div>
							
						</div>
						
						<?php echo $form['phone_number']->renderError() ?>
						<div class="control-group">
							
								<div class="controls">
								<div class="input-prepend"> 
								<?php echo $form['phone_number']->renderLabel('<i class="icon-user"></i>',array('class' => 'add-on')) ?>
								</div> 
								<?php echo $form['phone_number']->render(array('placeholder' => 'Phone Number','class' => 'span8 tooltips', 'data-trigger' => 'hover', 'data-original-title' => 'Enter Phone Number')) ?>
								</div>
							
						</div>
						
					
						
					

						<?php echo $form['id_passport']->renderError() ?>
						<div class="control-group">
							
								<div class="controls">
								<div class="input-prepend"> 
								<?php echo $form['id_passport']->renderLabel('<i class="icon-user"></i>',array('class' => 'add-on')) ?>
								</div> 
								<?php echo $form['id_passport']->render(array('placeholder' => 'Thumbnail','class' => 'span8 tooltips', 'data-trigger' => 'hover', 'data-original-title' => 'Select..')) ?>
								</div>
							
						</div>

						

						

						
						<?php echo $form->renderHiddenFields(); ?>
						
						<div class=" form-actions submit_row">
						<input type="submit"  class="btn btn-success" value="<?php echo __("Save Settings", array(), 'sfForkedApply') ?>" />
						
						<span class="visible-phone space10"></span> 
						<?php echo link_to(__('<i class="icon-ban-circle icon-white"></i> Cancel', array(), 'sfForkedApply'), sfConfig::get('app_sfForkedApply_after', sfConfig::get('app_sfApplyPlugin_after', '@homepage')),array('class' => 'btn btn-danger')) ?>
						</div>
					
					</form>
					<form method="GET" action="<?php echo url_for("sfApply/resetRequest") ?>" name="sf_apply_reset_request" id="sf_apply_reset_request">
					<p>
					<?php echo __('You can change your password by click button below.', array(), 'sfForkedApply'); ?>
					<?php
					$confirmation = sfConfig::get( 'app_sfForkedApply_confirmation' );
					if( $confirmation['reset_logged'] ): ?>
						<?php echo __('For security reasons, you
					will receive a confirmation email containing a link allowing you to complete the password change.', array(), 'sfForkedApply') ?>
					<?php endif; ?>
					</p>
					<input type="submit" class="btn btn-success" value="<?php echo __("Change Password", array(), 'sfForkedApply') ?>" />
					</form>
				</div>
			</div>
		</div>
	</div>
					
</div>
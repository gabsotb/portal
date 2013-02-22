<?php use_helper('I18N') ?>
<?php slot('sf_apply_login') ?>
<?php end_slot() ?>
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
							<li><a href="#">Password Reset</a></li>
							
						</ul>
						<!-- END PAGE TITLE & BREADCRUMB-->
					 </div>
					 <div class="span10" style="margin: 20px 100px;">
		<div class="widget">
			<div class="widget-title" style="text-align:center;">
				<h3><?php echo __("Profile Settings - Password Reset", array(), 'sfForkedApply') ?></h3>
			</div>
			<div class="widget-body form">
				<div class="sf_apply sf_apply_settings" >
					<?php echo $form->renderGlobalErrors() ?>
					<form method="post" action="<?php echo url_for('sfApply/apply') ?>" name="sf_apply_apply_form" id="sf_apply_apply_form" class="form-horizontal">
						<?php echo $form['password']->renderError() ?>
						<div class="control-group">
							
								<div class="controls">
								<div class="input-prepend"> 
								<?php echo $form['password']->renderLabel('<i class="icon-user"></i>',array('class' => 'add-on')) ?>
								</div> 
								<?php echo $form['password']->render(array('placeholder' => 'First Name','class' => 'span8 tooltips', 'data-trigger' => 'hover', 'data-original-title' => 'Enter New Password')) ?>
								</div>
							
						</div>
						
						<?php echo $form['password2']->renderError() ?>
						<div class="control-group">
							
								<div class="controls">
								<div class="input-prepend"> 
								<?php echo $form['password2']->renderLabel('<i class="icon-user"></i>',array('class' => 'add-on')) ?>
								</div> 
								<?php echo $form['password2']->render(array('placeholder' => 'Last Name','class' => 'span8 tooltips', 'data-trigger' => 'hover', 'data-original-title' => 'Re-enter password to confirm')) ?>
								</div>
							
						</div>
						
				
						
						

						

						

						
						<?php echo $form->renderHiddenFields(); ?>
						
						<div class=" form-actions submit_row">
						<input type="submit"  class="btn btn-success" value="<?php echo __("Save Settings", array(), 'sfForkedApply') ?>" />
						
						<span class="visible-phone space10"></span> 
						<?php echo link_to(__('<i class="icon-ban-circle icon-white"></i> Cancel', array(), 'sfForkedApply'), sfConfig::get('app_sfForkedApply_after', sfConfig::get('app_sfApplyPlugin_after', '@homepage')),array('class' => 'btn btn-danger')) ?>
						</div>
					
					</form>
					
				</div>
			</div>
		</div>
	</div>
					
</div>
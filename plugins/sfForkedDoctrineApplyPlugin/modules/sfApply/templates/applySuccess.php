<?php use_helper('I18N') ?>
<?php use_stylesheets_for_form( $form ) ?>
<?php
  // Override the login slot so that we don't get a login prompt on the
  // apply page, which is just odd-looking. 0.6
?>

<?php slot('sf_apply_login') ?>
<?php end_slot() ?>
<div class="row-fluid" style="margin: 20px auto 5px;  background: url('/images/bgColor.jpg') repeat-x; padding: 10px 9px 15px; border-radius:8px; width: 1000px;">	
	<div class="span10" style="margin: 20px 100px;">
		<div class="widget">
			<div class="widget-title" style="text-align:center;">
				<h3><?php echo __("Apply for an Account", array(), 'sfForkedApply') ?></h3>
			</div>
			<div class="widget-body form">
			   <div class="alert alert-block alert-info fade in">
										
										<h4 class="alert-heading">Join Us Today</h4>
										<p>
										Join us today and apply for Investment Registration Certificate and EIA Certificates. Please Fill the fields
										below. The Fields marked ****** are Mandatory. Thank you and Welcome.
										</p>
										
				</div>
				<div class="sf_apply sf_apply_apply" >
					<?php echo $form->renderGlobalErrors() ?>
					<form method="post" action="<?php echo url_for('sfApply/apply') ?>" name="sf_apply_apply_form" id="sf_apply_apply_form" class="form-horizontal">
						<?php echo $form['username']->renderError() ?>
						<div class="control-group">
							
								<div class="controls">
								<div class="input-prepend"> 
								<?php echo $form['username']->renderLabel('<i class="icon-user"></i>',array('class' => 'add-on')) ?>
								</div> 
								<?php echo $form['username']->render(array('placeholder' => 'Username','class' => 'span8 tooltips', 'data-trigger' => 'hover', 'data-original-title' => 'Enter your Username')) ?>
								<span class="label label-important">*********</span>
								</div>
							
						</div>
						
						<?php echo $form['password']->renderError() ?>
						<div class="control-group">
							
								<div class="controls">
								<div class="input-prepend">
								<?php echo $form['password']->renderLabel('<i class="icon-lock"></i>',array('class' => 'add-on')) ?>
								</div>
								<?php echo $form['password']->render(array('placeholder' => 'password','class' => 'span8 tooltips', 'data-trigger' => 'hover', 'data-original-title' => 'Enter your password')) ?>
								<span class="label label-important">*********</span>
								</div>
						</div>
						
						<?php echo $form['password2']->renderError() ?>
						<div class="control-group">
							
								<div class="controls">
								<div class="input-prepend">
								<?php echo $form['password2']->renderLabel('<i class="icon-lock"></i>',array('class' => 'add-on')) ?>
								</div>
								<?php echo $form['password2']->render(array('placeholder' => 'Confirm password','class' => 'span8 tooltips', 'data-trigger' => 'hover', 'data-original-title' => 'Confirm your password')) ?>
								<span class="label label-important">*********</span>
								</div>
							
						</div>

						
						<div class="control-group">
							 
								<div class="controls">
								<div class="input-prepend">
								<?php echo $form['firstname']->renderLabel('<i class="icon-user"></i>',array('class' => 'add-on')) ?>
								</div>
								<?php echo $form['firstname']->render(array('placeholder' => 'First Name','class' => 'span8 tooltips', 'data-trigger' => 'hover', 'data-original-title' => 'Enter your first name')) ?>
								<?php echo $form['firstname']->renderError() ?>
								<span class="label label-important">*********</span>
								</div>
							
						</div>

						
						<div class="control-group">
							
								<div class="controls">
								<div class="input-prepend">
								<?php echo $form['lastname']->renderLabel('<i class="icon-user"></i>',array('class' => 'add-on')) ?>
								</div>
								<?php echo $form['lastname']->render(array('placeholder' => 'Last Name','class' => 'span8 tooltips', 'data-trigger' => 'hover', 'data-original-title' => 'Enter your last name')) ?><?php echo $form['lastname']->renderError() ?>
								<span class="label label-important">*********</span>
								</div>
							
						</div>
                         <?php echo $form['id_passport']->renderError() ?>
						  <div class="control-group">
                                 
                                 <div class="controls">
                                     <div class="input-prepend">
									 <?php echo $form['id_passport']->renderLabel('<i class="icon-user"></i>',array('class' => 'add-on')) ?>
									
									</div>
                                     <div class="fileupload fileupload-new" data-provides="fileupload">
									
                                      <div class="fileupload-new thumbnail" style="width: 200px; height: 200px;"><img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+document" alt=""/></div>
                                      <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 200px; line-height: 20px;"></div>
                                      <div>
                                        <span class="btn btn-file"><span class="fileupload-new">Upload Passport/ID Image</span><span class="fileupload-exists">Change</span><?php echo $form['id_passport'] ?></span>
                                        <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                      </div>
									   <span class="label label-important">*********</span>
                                    <span class="help-inline">Your are Required to attach a valid ID/Passport Copy to proof your Identity. Thank you.</span>
                                    </div>

                                   
                                 </div>
                              </div> 
						<?php echo $form['email']->renderError() ?>
						<div class="control-group">
							
								<div class="controls">
								<div class="input-prepend">
								<?php echo $form['email']->renderLabel('<i class="icon-envelope"></i>',array('class' => 'add-on')) ?>
								</div>
								<?php echo $form['email']->render(array('placeholder' => 'Email Address','class' => 'span8 tooltips', 'data-trigger' => 'hover', 'data-original-title' => 'Enter your email address')) ?>
								<span class="label label-important">*********</span>
								</div>
							
						</div>

						<?php echo $form['email2']->renderError() ?>
						<div class="control-group">
							
								<div class="controls">
								<div class="input-prepend">
								<?php echo $form['email2']->renderLabel('<i class="icon-envelope-alt"></i>',array('class' => 'add-on')) ?>
								</div>
								<?php echo $form['email2']->render(array('placeholder' => 'Confirm email','class' => 'span8 tooltips', 'data-trigger' => 'hover', 'data-original-title' => 'Confirm your email')) ?>
								<span class="label label-important">*********</span>
								</div>
							
						</div>
						
						<?php echo $form->renderHiddenFields(); ?>
						
						<div class=" form-actions submit_row">
						<input type="submit" class="btn btn-warning" value="<?php echo __( "Apply for Account", array(), 'sfForkedApply') ?>" />
						<span class="visible-phone space10"></span> 
						<?php echo link_to(__('<i class="icon-ban-circle icon-white"></i> Cancel', array(), 'sfForkedApply'), sfConfig::get('app_sfForkedApply_after', sfConfig::get('app_sfApplyPlugin_after', '@homepage')),array('class' => 'btn btn-info')) ?>
						</div>
					
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php use_helper('I18N') ?>
<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php slot('title', 'Login') ?>



		<div class="row-fluid" style="margin: 20px auto 5px;  background: url('<?php sfConfig::get('sf_web_dir')?>/portal/web/images/bgColor.jpg') repeat-x; padding: 10px 9px 35px; border-radius:8px; width:500px;">
	
			
			<div class="span8" style=" margin: 50px auto; ">
				<div id="login" style="margin: auto 100px;">
				
					<form action="<?php echo url_for('@sf_guard_signin') ?>" method="post" class="form-vertical no-padding no-margin" id="loginform">
						<p class="center"> Enter your username and password</p>
							<?php echo $form->renderGlobalErrors() ?>
							<div class="control-group">
								<?php echo $form['username']->renderError() ?>
								<div class="controls">
									<div class="input-prepend">
										<?php echo $form['username']->renderlabel('<i class="icon-user"></i>',array('class' => 'add-on')) ?>
										<?php echo $form['username']->render(array('placeholder' => 'Username' ,'class' => 'span10 tooltips', 'data-trigger' => 'hover', 'data-original-title' => 'Enter your Username')) ?>
									</div>
								</div>
							</div>
							
							<div class="control-group">
								<?php echo $form['password']->renderError() ?>
								
								<div class="controls">
								<div class="input-prepend">
									<?php echo $form['password']->renderlabel('<i class="icon-lock"></i>',array('class' => 'add-on')) ?>
									<?php echo $form['password']->render(array('placeholder' => 'Password','class' => 'span10 tooltips', 'data-trigger' => 'hover', 'data-original-title' => 'Enter your Password')) ?>
									<?php echo $form->renderHiddenFields(); ?>
								</div>
									<div class="block-hint pull-right">
									<?php $routes = $sf_context->getRouting()->getRoutes() ?>
									<?php if (isset($routes['sf_guard_password_reset'])): ?>
									<a href="<?php echo url_for('@sf_guard_password_reset') ?>" id="forget-password"><?php echo __('Forgot password?', null, 'sf_guard') ?></a>
									
									<?php endif; ?>
									</div>
									<div class="clearfix space5"></div>
								</div>
							</div> 
						
							<input type="submit" id="login-btn" class="btn btn-block btn-inverse" value="<?php echo __('Signin', null, 'sf_guard') ?>" />

					</form>
						
				</div>
			
				
			</div>	
			
			
		</div>

	
	
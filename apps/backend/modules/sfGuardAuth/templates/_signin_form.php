<?php use_helper('I18N') ?>
<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php slot('title', 'Login') ?>

       <?php   
	           $username = __('Enter your Username');
	           $password = __('Enter your Password');
			   ///
			   $user = __('Username');
			   $pass = __('Password') ;

			   ?>

		<div class="row-fluid" style="margin: 20px auto 5px;  background: url('/images/bgColor.jpg') repeat-x; padding: 10px 9px 35px; border-radius:8px; width:500px;">
	
			
			<div class="span8" style=" margin: 50px auto; ">
				<div id="login" style="margin: auto 100px;">
				
					<form action="<?php echo url_for('@sf_guard_signin') ?>" method="post" class="form-vertical no-padding no-margin" id="loginform">
						<p class="center"> <?php echo __('Enter your username and password') ?></p>
							<?php echo $form->renderGlobalErrors() ?>
							<div class="control-group">
								<?php echo $form['username']->renderError() ?>
								<div class="controls">
									<div class="input-prepend">
										<?php echo $form['username']->renderlabel('<i class="icon-user"></i>',array('class' => 'add-on')) ?>
										<?php echo $form['username']->render(array('placeholder' => $user ,'class' => 'span10 tooltips', 'data-trigger' => 'hover', 'data-original-title' => $username)) ?>
									</div>
								</div>
							</div>
							
							<div class="control-group">
								<?php echo $form['password']->renderError() ?>
								
								<div class="controls">
								<div class="input-prepend">
									<?php echo $form['password']->renderlabel('<i class="icon-lock"></i>',array('class' => 'add-on')) ?>
									<?php echo $form['password']->render(array('placeholder' => $pass,'class' => 'span10 tooltips', 'data-trigger' => 'hover', 'data-original-title' => $password)) ?>
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

	
	
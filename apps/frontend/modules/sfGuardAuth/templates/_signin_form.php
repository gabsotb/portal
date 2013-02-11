<?php use_helper('I18N') ?>
<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php slot('title', 'Login') ?>

<div  style="padding: 0px 450px 0px; background: url('/images/bgColor.jpg') repeat-x;  margin: 70px 15px 0px; border-radius: 8px;">
	<img src="/images/logo_1.png" alt='logo'>
</div>

		<div class="row-fluid" style="margin: 20px auto 5px;  background: url('/images/bgColor.jpg') repeat-x; padding: 10px 9px 35px; border-radius:8px; width: 1100px;">
			<div class="span6" style="background: url('/images/body-bg.png'); border-radius: 8px; margin: 42px 10px 10px 50px;  padding:8px;">
				<div class="widget">
					<div class="widget-title">
						<h4>
							<i class="icon-reorder"></i> Welcome to RDB Investor E-portal
						</h4>
					</div>
					<div class="widget-body">
						<div class="tabbable portlet-tabs">
							<ul class="nav nav-tabs">
								<li>
									<a href="#Tax" data-toggle="tab">Tax Info</a>
								</li>
								<li>
									<a href="#EIA" data-toggle="tab">EIA Info</a>
								</li>
								<li class="active">
									<a href="IC" data-toggle="tab">Inv. Cert</a>
								</li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="IC">
									<p> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>

									<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. sed diam nonummy nibh euismod.</P>
								</div>
								<div class="tab-pane" id="EIA">
									<p> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>

									<p style="color: red;">Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. sed diam nonummy nibh euismod.</P>
								</div>
								<div class="tab-pane" id="Tax">
									<p> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>

									<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. sed diam nonummy nibh euismod.</P>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="span4" style=" margin: 50px 15px 20px 100px; ">
				<div id="login">
				
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
									<div class="block-hint ">
									<?php $routes = $sf_context->getRouting()->getRoutes() ?>
									<?php if (isset($routes['@sf_guard_password_reset'])): ?>
									<a href="<?php echo url_for('@sf_guard_password_reset') ?>" id="forget-password"><?php echo __('Forgot password?', null, 'sf_guard') ?></a>
									<?php if (isset($routes['apply'])): ?>
									&nbsp; &nbsp;&nbsp;<a href="<?php echo url_for('@apply') ?>" class="small"><?php echo __('Want to register?', null, 'sf_guard') ?></a>
									
									<?php endif; ?>
									<?php endif; ?>
									</div>
								
								</div>
							</div> 
						
							<input type="submit" id="login-btn" class="btn btn-block btn-inverse" value="<?php echo __('Signin', null, 'sf_guard') ?>" />

					</form>
						
				</div>
			
				
			</div>	
			
			
		</div>

	
	<div id="footer" style="margin: 20px; background: url('/images/bgColor.jpg') repeat-x; border-radius: 8px;">
		2013 &copy; Rwanda Development Board. All Rights Reserved.
	</div>			
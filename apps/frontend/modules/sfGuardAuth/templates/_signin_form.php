<?php use_helper('I18N') ?>
<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php slot('title', 'Login') ?>

<div id="header" >
	<img src="images/logo.gif" alt='logo'>
</div>

		<div class="row-fluid">
			<div class="span8" id="right-column">
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
			
			
			<div class="span4" >
				
				<div class="widget">
					<div class="widget-title">
						<h4><i class="icon-user"></i> Log In </h4>
					</div>
						<div class="widget-body">
						
							<form action="<?php echo url_for('@sf_guard_signin') ?>" method="post" class="form-vertical" id="loginform">
								<p class="center"> Enter your username and password</p>
									<div class="control-group">
										<div class="controls">
											<div class="input-prepend">
												<span class="add-on">
													<i class="icon-user"></i>
												</span>
												<?php echo $form['username']->render(array('placeholder' => 'Username')) ?>
											</div>
										</div>
									</div>
									
									<div class="control-group">
										<div class="controls">
											<div class="input-prepend">
												<span class="add-on">
													<i class="icon-lock"></i>
												</span>
												<?php echo $form['password']->render(array('placeholder' => 'Password')) ?>
												<?php echo $form->renderHiddenFields(); ?>
											</div> 
									 
										<div class="block-hint pull-right">
										<?php $routes = $sf_context->getRouting()->getRoutes() ?>
										<?php if (isset($routes['sf_guard_password_reset'])): ?>
										<a href="<?php echo url_for('@sf_guard_password_reset') ?>" id="forget-password"><?php echo __('Forgot password?', null, 'sf_guard') ?></a>
										<?php if (isset($routes['apply'])): ?>
										&nbsp; &nbsp;&nbsp;<a href="<?php echo url_for('@apply') ?>" id="forget-password"><?php echo __('Want to register?', null, 'sf_guard') ?></a>
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
			
			
		</div>

	
				
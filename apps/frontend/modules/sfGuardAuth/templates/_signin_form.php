<?php use_helper('I18N') ?>
<?php include_stylesheets('style.css') ?>
<?php use_javascripts_for_form($form) ?>
<?php slot('title', 'Login') ?>
<div class="container-fluid">
	<div id="logo" class="center">
		<img src= "images/logo.gif" alt="logo" class="center">
	</div>	
	<div class="span12">
	
		<div class="widget">
		
			<div class="row-fluid">
			
				<div class="widget-body">
						<div class="span8">
							<div class="widget">
								<div class="widget-title">
									<h4> <i class="icon-reorder"></i> Information Portlet </h4>
								</div>
										<div class="widget-body">
											<div class="accordion in collapse" id="accordion1" >
												<div class="accordion-group">
													<div class="accordion-heading">
														<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#investment">
															<i class="icon-chevron-left"></i> Investment Certificate Requirement
														</a>
													</div>
													<div id="investment" class="accordion-body collapse in">
														<div class="accordion-inner">
															Info on Investment cert
														</div>
													</div>
												</div>
												<div class="accordion-group">
													<div class="accordion-heading">
														<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#EIA">
															<i class="icon-chevron-left"></i> EIA Certificate Requirement
														</a>
													</div>
													<div id="EIA" class="accordion-body collapse">
														<div class="accordion-inner">
															Info on EIA certificate Requirement
														</div>
													</div>
												</div>
												<div class="accordion-group">
													<div class="accordion-heading">
														<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#Tax">
															<i class="icon-chevron-left"></i> Tax Incentive Requirements
														</a>
													</div>
													<div id="Tax" class="accordion-body collapse">
														<div class="accordion-inner">
															Info on Tax Incentive Requirements
														</div>
													</div>
												</div>
											</div>
										
										</div>
							</div>
						</div>
						<div class="span4">
							<div class="widget">	
								<div class="widget-title">
									<h4> <i class="icon-user"></i> Login</h4>
								</div>
								<div class="widget-body">
									<div id="login">
										<form action="<?php echo url_for('@sf_guard_signin') ?>" method="post" class="form-vertical no-padding no-margin">
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
												<a href="<?php echo url_for('@sf_guard_password_reset') ?>"><?php echo __('Forgot password?', null, 'sf_guard') ?></a>
												<?php if (isset($routes['apply'])): ?>
												&nbsp; &nbsp;&nbsp;<a href="<?php echo url_for('@apply') ?>"><?php echo __('Want to register?', null, 'sf_guard') ?></a>
											  <?php endif; ?>
											  <?php endif; ?>
											  </div>
												</div>
											</div>
											<input type="submit" id="login-btn" class="btn btn-block btn-inverse" value="<?php echo __('Signin', null, 'sf_guard') ?>" />
										</form>
									</div>
									<div id="login-copyright">
										2013 &copy; Rwanda Development Board
									</div>
								</div>
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>
	
</div>
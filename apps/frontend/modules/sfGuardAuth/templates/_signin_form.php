

<?php use_helper('I18N') ?>
<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php slot('title', 'Login') ?>

   <?php 
     $username = __('Enter UserName');
	 $password = __('Enter your Password') ;
   ?>

		<div class="row-fluid" style="margin: 20px auto 5px;  background: url('/images/bgColor.jpg') repeat-x; padding: 10px 9px 35px; border-radius:8px; width: 1100px;">
			<div class="span7" style="background: url('/images/body-bg.png'); border-radius: 8px; margin: 42px 10px 10px 50px;  padding:8px;">
				<div class="widget">
					<div class="widget-title">
						<h4>
							<i class="icon-reorder"></i> <?php echo __('Welcome to RDB Investor E-portal') ?>
						</h4>
					</div>
					<div class="widget-body">
						<div class="tabbable portlet-tabs">
							<ul class="nav nav-tabs">
								<li>
									<a href="#Tax" data-toggle="tab"><?php echo __('Tax Info') ?></a>
								</li>
								<li>
									<a href="#EIA" data-toggle="tab"><?php echo __('EIA Info') ?></a>
								</li>
								<li class="active">
									<a href="#IC" data-toggle="tab"><?php echo __('Inv. Cert') ?></a>
								</li>
							</ul>
							<div class="tab-content ">
							<?php 
							// retrieve the portlets information
                             $data = Doctrine_Core::getTable('Portlets')->getPortlets();
							 ///variables
							 $invest = null;
							 $eia = null;
							 $tax = null;
							 ///
							 foreach($data as $d)
							 {
							   $invest = $d['investment_certificate'];
							   $eia = $d['eia_certificate'];
							   $tax = $d['tax_exemptions'];
							 }
							?>
							
								<div class="tab-pane active a" id="IC">
								<div id="scrollbar1">
									<div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
									<div class="viewport">
										 <div class="overview">
											<p>
											<?php echo $invest; ?>
											</p>
							            </div>
							        </div>
								</div>			 
									
								
								</div>
								<div class="tab-pane scroller padding" id="EIA">
									<div id="scrollbar2">
									<div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
									<div class="viewport">
										 <div class="overview">
											<p>
											<?php echo  $eia; ?>
											</p>
							            </div>
							        </div>
								</div>	
								</div>
								<div class="tab-pane" id="Tax">
									<p>
									<?php echo $tax; ?>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="span3" style=" margin: 50px 15px 20px 100px; ">
				<div id="login">
				
					<form action="<?php echo url_for('@sf_guard_signin') ?>" method="post" class="form-vertical no-padding no-margin" id="loginform">
						<p class="center"> <?php echo __('Enter your username and password') ?></p>
							<?php echo $form->renderGlobalErrors() ?>
							<div class="control-group">
								<?php echo $form['username']->renderError() ?>
								<div class="controls">
									<div class="input-prepend">
										<?php echo $form['username']->renderLabel('<i class="icon-user"></i>',array('class' => 'add-on')) ?>
										<?php echo $form['username']->render(array('placeholder' => 'Username' ,'class' => 'span10 tooltips', 'data-trigger' => 'hover', 'data-original-title' => $username)) ?>
									</div>
								</div>
							</div>
							
							<div class="control-group">
								<?php echo $form['password']->renderError() ?>
								
								<div class="controls">
								<div class="input-prepend">
									<?php echo $form['password']->renderLabel('<i class="icon-lock"></i>',array('class' => 'add-on')) ?>
									<?php echo $form['password']->render(array('placeholder' => 'Password','class' => 'span10 tooltips', 'data-trigger' => 'hover', 'data-original-title' => $password)) ?>
									<?php echo $form->renderHiddenFields(); ?>
								</div>
									<div class="block-hint pull-right">
									<?php $routes = $sf_context->getRouting()->getRoutes() ?>
									<?php if (isset($routes['sf_guard_password_reset'])): ?>
									<a href="<?php echo url_for('@sf_guard_password_reset') ?>" id="forget-password"><?php echo __('Forgot password?', null, 'sf_guard') ?></a>
									<?php if (isset($routes['apply'])): ?>
									&nbsp; &nbsp;&nbsp;<a href="<?php echo url_for('@apply') ?>" class="small"><?php echo __('Apply for Account', null, 'sf_guard') ?></a>
									
									<?php endif; ?>
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

	
	<script type="text/javascript">
		$(document).ready(function(){
			$('#scrollbar1').each(function(){$(this).tinyscrollbar();});
			
             //$('#scrollbar2').tinyscrollbar();			
		});
	</script>
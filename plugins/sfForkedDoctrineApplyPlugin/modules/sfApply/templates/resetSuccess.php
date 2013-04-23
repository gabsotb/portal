<div id="page">
               <div class="row-fluid" style="margin: 40px auto 5px; padding: 10px 9px 15px; border-radius:8px; width: 1000px;">
                  <div class="span9">
                     <!-- BEGIN SAMPLE FORM PORTLET-->	
                     <div class="widget">
                        <div class="widget-title" style="text-align:center;">
							<h3><?php echo __("Profile Settings - Password Reset", array(), 'sfForkedApply') ?></h3>
						</div>
                        <div class="widget-body form">
						  <div class="sf_apply sf_apply_apply" >
						 <?php echo $form->renderGlobalErrors() ?>
										<form method="post" action="<?php echo url_for("sfApply/reset") ?>" name="sf_apply_reset_form" id="sf_apply_reset_form" class="form-horizontal">
											<?php echo $form['password']->renderError() ?>
											<div class="control-group">
												
													<div class="controls">
													<div class="input-prepend"> 
													<?php echo $form['password']->renderLabel('<i class="icon-user"></i>',array('class' => 'add-on')) ?>
													</div> 
													<?php echo $form['password']->render(array('placeholder' => 'Enter New Password','class' => 'span5 tooltips', 'data-trigger' => 'hover', 'data-original-title' => 'Enter New Password')) ?>
													</div>
												
											</div>
											
											<?php echo $form['password2']->renderError() ?>
											<div class="control-group">
												
													<div class="controls">
													<div class="input-prepend"> 
													<?php echo $form['password2']->renderLabel('<i class="icon-user"></i>',array('class' => 'add-on')) ?>
													</div> 
													<?php echo $form['password2']->render(array('placeholder' => 'Re-enter password to confirm','class' => 'span5 tooltips', 'data-trigger' => 'hover', 'data-original-title' => 'Re-enter password to confirm')) ?>
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
</div>
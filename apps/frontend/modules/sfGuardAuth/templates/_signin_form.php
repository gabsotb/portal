<?php use_helper('I18N') ?>
<div id="logo" class="center">
   <img  src="<?php sfConfig::get('sf_web_dir')?>/rdbeportal/web/images/logordb.png" alt ="LOGO" /> 
  </div>
<div id="login">
<form id="loginform" class="form-vertical no-padding no-margin" action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
      <p class="center">Enter your username and password.</p>
      <div class="control-group">
        <div class="controls">
          <div class="input-prepend">
			 <?php echo $form ?>
			
          </div>
        </div>
      </div>
      <div class="control-group">
        
          <div class="block-hint pull-right">
		  <?php $routes = $sf_context->getRouting()->getRoutes() ?>
			<?php if (isset($routes['sf_guard_password_reset'])): ?>
            <a href="<?php echo url_for('@sf_guard_password_reset') ?>"><?php echo __('Forgot password?', null, 'sf_guard') ?></a>
			<?php if (isset($routes['apply'])): ?>
            &nbsp; &nbsp;&nbsp;<a href="<?php echo url_for('@apply') ?>"><?php echo __('Want to register?', null, 'sf_guard') ?></a>
          <?php endif; ?>
          <?php endif; ?>
          </div>
		  
          <div class="clearfix space5"></div>
        
      </div>
      <input type="submit" id="login-btn" class="btn btn-block btn-inverse" value="<?php echo __('Login', null, 'sf_guard') ?>" />
          
          
    </form>
    <!-- END LOGIN FORM -->        
   
</div>
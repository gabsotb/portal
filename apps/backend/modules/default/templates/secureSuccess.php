<?php //decorate_with(dirname(__FILE__).'/defaultLayout.php') ?>
<div class="row-fluid">
	 <div class="span12">
      <div class="widget">
		<div class="widget-title">
			<h4><?php echo __('Access Error: Credentials Required') ?></h4>						
		</div>
		<div class="widget-body">
<div class="sfTMessageContainer sfTLock"> 
  <center><?php echo image_tag('/sf/sf_default/images/icons/lock48.png', array('alt' => 'credentials required', 'class' => 'sfTMessageIcon', 'size' => '100x100')) ?></center>
  <div class="alert alert-error">
    <h1><?php echo __('Sorry, Access Denied. Invalid Credentials.')?> </h1>
    <h5><?php echo __('This section is restricted area.') ?></h5>
  </div>
</div>
	  <div class="alert alert-info">
	<?php echo __('You do not have the proper credentials to access this page.To Access this page, Contact the System Administrator rdbadmin@rdb.gov.rw
	') ?>
	  </div>
	  <a href="<?php echo url_for('sf_guard_signout')?>"><button type="button" class="btn btn-success"><?php echo __('Back')?></button></a>


</div>
</div>
</div>
</div>

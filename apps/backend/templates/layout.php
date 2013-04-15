<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta charset="utf-8" />
	<title><?php include_slot('title', 'RDB - Investor Eportal System - Administration') ?></title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<META HTTP-EQUIV="refresh" CONTENT="600">
	<link rel="shortcut icon" href="/favicon.png" />
	<?php include_stylesheets() ?>
    <?php include_javascripts() ?>
		
</head>
<!-- END HEAD -->
<body class="fixed-top">
	<?php if($sf_user->isAuthenticated()): ?>
	 <div id="widget-language" class="modal hide">
						<div class="modal-header">
							<button data-dismiss="modal" class="close" type="button">×</button>
							<h3><?php echo __('Language Change') ?></h3>
						</div>
						<div class="modal-body">
							<b><?php echo __('Please Select your prefered Language:') ?></b> <br/>
							
							 <?php include_component('language', 'language') ?>
						</div>
				</div>
	<!-- BEGIN HEADER -->
	<div id="header" class="navbar navbar-inverse navbar-fixed-top">
		<!-- BEGIN TOP NAVIGATION BAR -->
		<div class="navbar-inner">
			<div class="container-fluid">
				<!-- BEGIN LOGO -->
				<a class="brand" href="<?php echo url_for('@homepage') ?>">
				<img  src="/images/logo.jpg" alt ="LOGO" />
				</a>
				<!-- END LOGO -->
				<!-- BEGIN RESPONSIVE MENU TOGGLER -->
				<a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="arrow"></span>
				</a>          
				<!-- END RESPONSIVE MENU TOGGLER -->				
				<div class="top-nav">
				
					<!-- BEGIN QUICK SEARCH FORM -->
					<form class="navbar-search hidden-phone">
						<div class="search-input-icon">
							<input type="text" class="search-query dropdown-toggle" id="quick_search" placeholder="Search" data-toggle="dropdown" />
							<i class="icon-search"></i>
							<!-- BEGIN QUICK SEARCH RESULT PREVIEW -->
							<ul class="dropdown-menu extended">								
								<li>
									<span class="arrow"></span>
									<p>Found 23 results</p>
								</li>
								<li>
									<a href="#">
									<span class="label label-warning"><i class="icon-comment"></i></span>
									Re: Nick Dalton, Sep 11:...<i class="icon icon-arrow-right"></i>
									</a>
								</li>
								<li>
									<a href="#">
									<span class="label label-important"><i class="icon-bullhorn"></i></span>
									Office Setup, Mar 12...<i class="icon icon-arrow-right"></i>
									</a>
								</li>
							</ul>
							<!-- END QUICK SEARCH RESULT PREVIEW -->
						</div>
					</form>
					
					<!-- END QUICK SEARCH FORM -->
					<!-- BEGIN TOP NAVIGATION MENU -->
                    					
					<ul class="nav pull-right" id="top_menu">
						<!-- BEGIN NOTIFICATION DROPDOWN -->	
						<li class="dropdown" id="header_notification_bar">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-warning-sign"></i>
							<span class="label label-important">
							    <?php 
							   $user = sfContext::getInstance()->getUser()->getGuardUser()->getUsername();
							   $countnotification = Doctrine_Core::getTable('Notifications')->countNotifications($user);
							   $no = 0;
							   //
							   foreach($countnotification  as $count)
							   {
							    $no = $count['COUNT(notifications.message)'];
							   }
							   echo $no;
							  ?>
							
							
							</span>
							</a>
							<ul class="dropdown-menu extended notification">
								<li>
									<p><?php echo __('You have') ?> <?php echo $no ; ?> <?php echo __('notifications') ?></p>
								</li>
								<?php 
                                   $notification = Doctrine_Core::getTable('Notifications')->getNotifications($user);?>
								<?php foreach($notification as $notify): ?>
								<li>
									<a href="#">
									<span class="label label-success"><i class="icon-plus"></i></span>
									<?php echo $notify['message'] ?> <br/>
									<span class="small italic"><?php echo $notify['created_at'] ?></span>
									</a>
								</li>
								<?php endforeach; ?>
								
							</ul>
						</li>
						
						<!-- END NOTIFICATION DROPDOWN -->
						<!-- BEGIN INBOX DROPDOWN -->
						<li class="dropdown" id="header_inbox_bar">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-envelope-alt"></i>
							<span class="label label-success">
							  <?php
							 $messages = 0 ;
							 //we call a message that will return the number of messages available for the current logged in user
							 //am not sure if this is the right way???????
	                         $username = sfContext::getInstance()->getUser()->getGuardUser()->getUsername();
	                         $this->countmsgs = Doctrine_Core::getTable('Messages')->countMessages($username);
							 foreach( $this->countmsgs as $msg)
								{
								 $messages  = $msg['COUNT(message)'];
								}
								echo $messages;
								
							?>
							
							</span>
							</a>
							<ul class="dropdown-menu extended inbox">
								<li>
									<p><?php echo __('You have') ?> <?php echo $messages; ?> <?php echo __('new messages') ?></p>
								</li>
									<!-- Now, we show the user his/her messages. maximum of 5 -->
								<?php 
								 $this->msgs = Doctrine_Core::getTable('Messages')->retreiveMessages($username);
								foreach($this->msgs as $messages):    ?>
								<li>
									<a href="<?php echo url_for('messages/show?id='.$messages['id']) ?>">
									<!--<span class="photo"><img src="/images/avatar-mini.png" alt="avatar"/></span> -->
									<span class="subject">
									<span class="from">
									<?php echo $messages['sender'] ?> </span>
									<span class="time"><?php echo $messages['created_at'] ?></span>
									</span>
									<span class="message">
									<?php echo $messages['message'] ?>
									
									</span>  
									</a>
								</li>
								<?php endforeach; ?>
								
								<li>
									<a href="<?php echo url_for('my_inbox') ?>"><?php echo __('See all messages') ?></a>
								</li>
							</ul>
						</li>
						<!-- END INBOX DROPDOWN -->
						<li class="divider-vertical hidden-phone hidden-tablet"></li>
						<!-- BEGIN USER LOGIN DROPDOWN -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-wrench"></i>
							<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo url_for('settings') ?>"><i class="icon-cogs"></i> <?php echo __('Account Settings') ?></a></li>
								<li><a href="#widget-language"  data-toggle="modal"><i class="icon-wrench"></i> <?php echo __('Change Language') ?></a></li>
								<li><a href="#"><i class="icon-pushpin"></i> <?php echo __('Support') ?></a></li>							
							</ul>
						</li>
						<!-- END USER LOGIN DROPDOWN -->
						<li class="divider-vertical hidden-phone hidden-tablet"></li>
						<!-- BEGIN USER LOGIN DROPDOWN -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-user"></i>
							<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="#"><i class="icon-user"></i> 
								
								 <?php 
								 //$this->getUser()->getGuardUser()->getProfile()->getFirstName()
								       $lastname = sfContext::getInstance()->getUser()->getGuardUser()->getFirstName();
								       $firstname = sfContext::getInstance()->getUser()->getGuardUser()->getLastName();
                                      echo $firstname."\t".$lastname;
									?>
								
								</a></li>
								<li><a href="<?php echo url_for('my_inbox') ?>"><i class="icon-envelope-alt"></i> <?php echo __('Inbox') ?></a></li>
								<div class="divider"></div>
								<li>
								<a href="<?php echo url_for('sf_guard_signout') ?>"><i class="icon-off"></i> <?php echo __('Logout') ?></a>
								</li>
							</ul>
						</li>
						<!-- END USER LOGIN DROPDOWN -->
					</ul> 
					
					<!-- END TOP NAVIGATION MENU -->	
				</div>
			</div>
		</div>
		<!-- END TOP NAVIGATION BAR -->
	</div>
	<!-- END HEADER -->
	<!-- BEGIN CONTAINER -->
	<div id="container" class="row-fluid">
	
		<!-- BEGIN SIDEBAR -->
		<div id="sidebar" class="nav-collapse collapse">
			<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
			<div class="navbar-inverse">
				<form class="navbar-search visible-phone">
					<input type="text" class="search-query" placeholder="Search" />
				</form>
			</div>
			<!-- END RESPONSIVE QUICK SEARCH FORM -->
			<!-- BEGIN SIDEBAR MENU -->
			<ul>
				<li class="active"><?php echo link_to('<i class="icon-home"></i> Dashboard', '@homepage') ?> </li>
				<!-- We need to only show this if the user has adequate rights to manage and create users -->
				<?php if($sf_user->hasCredential('assignJob')):?>
				<li class="has-sub">
					<a href="javascript:;" class="">
					<i class="icon-group"></i> <?php echo __('User Management') ?>
					<span class="arrow"></span>
					</a>
					<ul class="sub">
						<li><a href="<?php echo url_for('sf_guard_users') ?>"><i class="icon-key"></i> <?php echo __('User Accounts') ?></a> </li>
						<li><a href="<?php echo url_for('sf_guard_user_groups') ?>"><i class="icon-key"></i> <?php echo __('User Groups') ?></a></li>
						<li><a href="<?php echo url_for('sf_guard_user_permissions') ?>"><i class="icon-key"></i> <?php echo __('Groups Permissions') ?></a></li>
					</ul>
				</li>
				<li class="has-sub">
					<a href="javascript:;" class="">
					<i class="icon-bar-chart"></i> <?php echo __('Tax Exemptions') ?>
					<span class="arrow"></span>
					</a>
					<ul class="sub">
					    <li class=""><a href ="<?php echo url_for('taxexemptions/index')?>"><i class="icon-fire"></i> <?php echo __('Process Request') ?> </a></li>
					</ul>
				</li>
				<li class="has-sub">
					<a href="javascript:;" class="">
					<i class="icon-unlock"></i> <?php echo __('Approve Requests') ?>
					<span class="arrow"></span>
					</a>
					<ul class="sub">
					    <li class=""><a href ="<?php echo url_for('investment_request') ?>"><i class="icon-trash"></i> <?php echo __('IC Applications') ?> </a></li>
						<li class=""><a href ="#"><i class="icon-certificate"></i> <?php echo __('Investment Certificates') ?> </a></li>
						<li class=""> <a href ="#"><i class="icon-certificate"></i> <?php echo __('EIA Certificates') ?> </a></li>
					</ul>
				</li>
				<li> <a href ="<?php echo url_for('information_portlets') ?>"><i class="icon-book"></i> <?php echo __('Information Portlets') ?> </a> </li>
				<li class="has-sub">
					<a href="javascript:;" class="">
					<i class="icon-certificate"></i><?php echo __('Certificates Issued') ?>
					<span class="arrow"></span>
					</a>
					<ul class="sub">
						<li class=""><a href ="#"><i class="icon-certificate"></i> <?php echo __('Investment Certificates') ?> </a></li>
						<li class=""> <a href ="#"><i class="icon-certificate"></i> <?php echo __('EIA Certificates') ?> </a></li>
					</ul>
				</li>
				<?php endif ?>
				<!-- end -->
				<li class="has-sub">
					<a href="javascript:;" class="">
					<i class="icon-double-angle-up"></i> <?php echo __('Resubmission') ?> 
					<span class="arrow"></span>
					</a>
					<ul class="sub">
						<li class=""><a href ="#"><i class="icon-check"></i> <?php echo __('View Requests') ?> </a></li>
						
					</ul>
				</li>
				<li class="has-sub">
					<a href="javascript:;" class="">
					<i class="icon-bar-chart"></i> <?php echo __('Reporting') ?>
					<span class="arrow"></span>
					</a>
					<ul class="sub">
						<li class=""><a href ="#"><i class="icon-certificate"></i> <?php echo __('Investment Certificates') ?> </a></li>
						<li class=""> <a href ="#"><i class="icon-certificate"></i> <?php echo __('EIA Certificates') ?> </a></li>
						<li class="">  <a href ="#"><i class="icon-certificate"></i> <?php echo __('Tax Exemptions') ?></a> </li>
					</ul>
				</li>
				<li class="">  <a href ="#"><i class="icon-lightbulb"></i> <?php echo __('Help') ?></a> </li>
				
				<!--<li class="">  <a href ="<?php //echo url_for('sfKoreroChannel/index') ?>"><i class="icon-fire"></i> Managers Channel</a> </li>-->
				<li><a href ="<?php echo url_for('@sf_guard_signout') ?>"><i class="icon-off"></i> <?php echo __('Logout') ?> </a></li>
			</ul>
		</div>
		
		<!-- END SIDEBAR -->
		<!-- BEGIN PAGE -->
		<div id="body">
		
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->

			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE CONTAINER-->			
			<div class="container-fluid">
			
				<!-- BEGIN PAGE HEADER-->
				<!--<div class="row-fluid">-->
					<!--<div class="span12">-->
						<!-- BEGIN STYLE CUSTOMIZER-->
						
						<!-- END STYLE CUSTOMIZER-->    
						
						<?php 
						// we check if the user has valid credentials to be able to see this menu
						if($sf_user->hasCredential('investmentcert')):
						?>
						<!-- BEGIN PAGE TITLE & BREADCRUMB-->		
						<h3 class="page-title"><?php echo __('E-portal Investment Certificate Data Administrator Dashboard') ?>  </h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="<?php echo url_for('dashboard/index') ?>"><?php echo __('Data Administrator Dashboard') ?></a> <span class="divider">/</span>
								<b><?php echo __('View Jobs assigned to you. Process Investment Certificates Tasks Assigned to you.')?></b>
							</li>
							
							<li><a href="#"></a></li>
						</ul>
						<?php endif; ?>
						<!-- END PAGE TITLE & BREADCRUMB-->
						<?php 
						 // we check if the user has valid credentials to be able to see this menu
						 if($sf_user->hasCredential('eiacert')):
						?>
						<!-- BEGIN PAGE TITLE & BREADCRUMB-->		
						<h3 class="page-title"><?php echo __('E-portal EIA Certificate Data Administrator Dashboard') ?> </h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="<?php echo url_for('dashboard/index') ?>"><?php echo __('Data Administrator Dashboard') ?></a> <span class="divider">/</span>
								<b><?php echo __('View Jobs assigned to you. Process EIA Certificates Tasks Assigned to you.') ?></b>
							</li>
							
							<li><a href="#"></a></li>
						</ul>
						<?php endif; ?> 

						<!-- END PAGE TITLE & BREADCRUMB-->
					<!--</div>-->
				<!-- END PAGE HEADER-->
				<!--</div> -->
			
				
				<?php endif; ?>
				<?php if(!$sf_user->isAuthenticated()): ?>
				<div  class="header_not_signed_in">
				<img src="/images/logo_example.png" alt='logo'/>
				</div>
				<?php endif ?>
				<?php if ($sf_user->hasFlash('notice')): ?>
				<div class="alert alert-info">
					<?php echo $sf_user->getFlash('notice') ?>
				</div>
				<?php endif; ?>	
			
				<?php if ($sf_user->hasFlash('error')): ?>
				<div class="alert alert-error">
					<?php echo $sf_user->getFlash('error') ?>
				</div>
				<?php endif; ?>
			
					<?php echo $sf_content ?>
				<?php if(!$sf_user->isAuthenticated()): ?>
						<div id="footer" class="footer_not_signed_in">
						<?php 
						 $date = date('Y') ;
				        echo $date;
						?>
						<?php echo __('&copy; Rwanda Development Board. All Rights Reserved.') ?>
						
						</div>
				<?php endif; ?>
			<?php if($sf_user->isAuthenticated()): ?>
				
			<!-- END PAGE CONTAINER-->
			</div>
		<!-- END PAGE -->	
		</div>
	<!-- END CONTAINER -->	
	</div>
	
	<!-- BEGIN FOOTER -->
	<div id="footer">
		<?php 
				 $date = date('Y') ;
				 echo $date;
				?>
				<?php echo __('&copy; Rwanda Development Board. All Rights Reserved.') ?>
		<div class="span pull-right">
			<span class="go-top"><i class="icon-arrow-up"></i></span>
		</div>
	</div>
	<?php endif; ?>
<script>
		jQuery(document).ready(function() {			
			// initiate layout and plugins
			App.init();
		});
	</script>
</body>
	
<!-- END BODY -->
</html>


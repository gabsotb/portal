<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta charset="utf-8" />
	<title><?php include_slot('title', 'RDB - Investor Eportal System') ?></title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<META HTTP-EQUIV="refresh" CONTENT="60000">
	<link rel="shortcut icon" href="/favicon.png" />
	<?php include_stylesheets() ?>
    <?php include_javascripts() ?>
</head>
<!-- END HEAD -->
<body>
	<!-- BEGIN HEADER -->
	<?php if($sf_user->isAuthenticated()): ?>
	     <div id="widget-language" class="modal hide">
						<div class="modal-header">
							<button data-dismiss="modal" class="close" type="button">×</button>
							<h3>Language Change</h3>
						</div>
						<div class="modal-body">
							<b>Please Select your prefered Language:</b> <br/>
							
							 <?php include_component('language', 'language') ?>
						</div>
				</div>
	<div id="header" class="navbar navbar-inverse">
		<!-- BEGIN TOP NAVIGATION BAR -->
		<div class="navbar-inner">
			<div class="container-fluid">
				<!-- BEGIN LOGO -->
				<a class="brand" href="<?php echo url_for('@homepage') ?>">
				<img  src="/images/logo.gif" alt ="LOGO" />
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
									<p><?php echo __('You have')?> <?php echo $no ; ?> <?php echo __('notification(s)')?></p>
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
									<p><?php echo __('You have') ?> <?php echo $messages; ?> <?php echo __('new message(s)')?></p>
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
								<li><a href="<?php echo url_for('settings') ?>"><i class="icon-cogs"></i> <?php echo __('Account Settings')?></a></li>
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
								 <!-- We will echo logged user First Name and Last Name here -->
								 <?php 
								 //$this->getUser()->getGuardUser()->getProfile()->getFirstName()
								       $lastname = sfContext::getInstance()->getUser()->getGuardUser()->getFirstName();
								       $firstname = sfContext::getInstance()->getUser()->getGuardUser()->getLastName();
                                      echo $firstname."\t".$lastname;
									?>
								</a></li>
								<li><a href="<?php echo url_for('my_inbox') ?>"><i class="icon-envelope-alt"></i> <?php echo __('Inbox') ?></a></li>
								<li class="divider"></li>
								<li>
								<a href="<?php echo url_for('sf_guard_signout') ?>"><i class=" icon-off"></i> <?php echo __('Logout') ?></a>
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
				<li class="active">
				<a href="<?php echo url_for('@homepage')?>" >
					<i class="icon-home"></i> <?php echo __('Dashboard') ?>
					</a>
				<li class="has-sub">
					<a href="javascript:;" class="">
					<i class="icon-certificate"></i> <?php echo __('Investment Certificate') ?>
					<span class="arrow"></span>
					</a>					
					<ul class="sub">
					<!-- Start Menu Control Code -->
					<?php
					$user_id = sfContext::getInstance()->getUser()->getGuardUser()->getId();
                     $investment_applications = Doctrine_Core::getTable('InvestmentApplication')->getUserInvestmentApplications();
					 $checkCertificationStatus = Doctrine_Core::getTable('InvestmentApplication')->getCertificationStatus($user_id);
              
					?>
					<?php if(count($investment_applications) <= 0): ?>
															
															 <!-- if a User has completed step 1 and is yet to complete step 2, we show
															 a link for completing his application -->
														    <?php 
															
															$q = Doctrine_Core::getTable('InvestmentApplication')->getUserInvestmentApplicationSubmission($user_id);
															$investment_id = null;
															$business_name = null;
															 //
															 foreach($q as $res)
															 {
															   $investment_id = $res['id'];
															   $business_name = $res['name'];
															 }
															
															//now we pass this to businessplan table method
															$p = Doctrine_Core::getTable('BusinessPlan')->getBusinessPlanDetails($investment_id);
															$rejection = Doctrine_Core::getTable('BusinessApplicationStatus')->checkStatus($investment_id);
															$response = null;
															//print_r($p); exit;
															//
															foreach($p as $r)
															{
															 $response = $r['investment_id'];
															}
															// 
															  
															?>
														<?php if($investment_id != null && $rejection != "rejected_completed"){ ?>
														 
															 <!-- if it is null we show buttons -->
															 <?php if($response == null) { ?>
																
																
																<li><a href="<?php echo url_for('businessplan/new?id='.$business_name) ?>"> 
																<?php echo __('Complete') ?>
																</a></li>
																<li><a href="<?php echo url_for('investmentapp/edit?id='.$investment_id) ?>"> 
																<?php echo __('Review') ?>
																</a></li>
																
																
																
															 <?php } ?>
														 <?php } ?>
															 <?php if($investment_id != null ){ 
															 $value = 0;
															
															 ?>
															 <!-- We have a situation where a user has completed application 1 and wants to a apply for a 
															 certificate for another business we will show this message -->
															   <?php 
															
															   foreach($checkCertificationStatus as $status)
															    {
															      $value = $status['COUNT(investment_application.id)'] ;
																// print $value;
															    }
																// exit;
																?>
																<?php if($value > 0 && $response != null ) { ?>
																
																<li class=""><a href="<?php echo url_for('investmentapp/new') ?>"><i class="icon-certificate"></i><?php echo __('Application Form') ?></a></li>
																<?php } ?>
															    <?php if($value <= 0  && $response != null ) { ?>
																      <?php $reference = "new" ; ?>
																	 	<li class=""><a href="<?php echo url_for('investmentapp/new?reference='.$reference) ?>"><i class="icon-certificate"></i><?php echo __('Application Form') ?></a></li>
																<?php } ?>
															 <?php if($investment_id != null &&  $rejection == "rejected_completed"){ ?>
															 <?php $reference = "new" ; ?>
															 	<li class=""><a href ="<?php echo url_for('investmentapp/new?reference='.$reference) ?>"><i class="icon-certificate"></i> <?php echo __('Investment Certificates') ?> </a></li>
															 <?php } ?>
												<!--we will prevent users from applying for certificate if they have pending applications -->
                                                         
														
														  <?php } ?> 
														   <?php if($investment_id == null  ){  ?>
														<li class=""><a href ="<?php echo url_for('investmentapp/new') ?>"><i class="icon-certificate"></i> <?php echo __('Investment Certificates') ?> </a></li>		
														  <?php } ?>
															  
														<?php endif; ?>
						
			<!-- End control code -->	
					</ul>
				</li>
				<li class="has-sub"><a href="javascript:;"><i class="icon-certificate"></i> <?php echo __('EIA Certificate') ?> <span class="arrow"></span></a>
				<ul class="sub">
					<li class=""><a href ="#"><i class="icon-certificate"></i> <?php echo __('EIA Certificate') ?> </a></li>
				</ul>
					
				</li>
				<li class="">
					<a href="" >
					<i class="icon-lightbulb"></i> <?php echo __('Help') ?>
					</a>
				</li>				
				<li> 
				<li class=""><a href ="<?php echo url_for('@sf_guard_signout') ?>"><i class="icon-off"></i> <?php echo __('Logout') ?> </a></li>
				
			</ul>
		</div>
		<!-- END SIDEBAR -->
		<!-- BEGIN PAGE -->
		<div id="body">

			<!-- BEGIN PAGE CONTAINER-->			
			<div class="container-fluid">
	<?php endif ?>
				<?php if(!$sf_user->isAuthenticated()): ?>
					<div class="header_not_signed_in">
					<img src="/images/logo_example.png" alt='logo'/>
					</div>
				<?php endif; ?>
				<?php if ($sf_user->hasFlash('notice')): ?>
					<div class="alert">
						<button class="close" data-dismiss="alert">x</button>
						<?php echo $sf_user->getFlash('notice') ?>
					</div>
				<?php endif; ?>	
			
				<?php if ($sf_user->hasFlash('error')): ?>
					<div class="alert alert-error">
						<button class="close" data-dismiss="alert">x</button>
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
				</div>
				<!-- END PAGE CONTENT-->

				
				
			
			
			<!-- END PAGE CONTAINER-->
		</div>
		<!-- END PAGE -->
	</div>
	<!-- END CONTAINER -->
	<!-- BEGIN FOOTER -->
	<div id="footer">
		<?php 
				   $date = date('Y') ;
				   echo $date;
				?>
				<?php echo  __('&copy; Rwanda Development Board. All Rights Reserved.') ?>
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


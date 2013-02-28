<?php slot('title', 'Channels') ?>
<div id="page" class="dashboard">
	<div class="row-fluid">
	<div class="span12">
						<!-- BEGIN STYLE CUSTOMIZER-->
						<!-- END STYLE CUSTOMIZER-->    	
						<!-- BEGIN PAGE TITLE & BREADCRUMB-->		
						<h3 class="page-title">
							Managers Account
							<small>Assign Tasks and Manage User Accounts</small>
						</h3>
							<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="#">Dashboard</a> <span class="divider">/</span>
							</li>
							<li>
							<i class="icon-desktop"></i>
							<a href="#">Manager</a></li> <span class="divider">/</span>
							<li>
							<i class="icon-desktop"></i>
							<a href="#">Chat Channel</a></li> <span class="divider">/</span>
							<li>
							<i class="icon-user"></i>
							<a href="#">
							   <b>
								  <font color="blue">
									<?php $username = sfContext::getInstance()->getUser()->getGuardUser()->getUsername();
                                      print 'Welcome, You are logged in as '.$username;
									?>
									</font>
								</b>
							</a></li>
							<li class="pull-right dashboard-report-li">
							<i class="icon-time"></i>
				              Logged in on <font color="blue">
									<?php
                                       $date = date("F j, Y");
									   print $date;
									?>
									</font>
							</li>
							
						</ul>
						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>
						<h2>Please Select a Channel to start Chatting</h2>

						<?php if (count($channels)): ?>

						<ul>

						<?php foreach ($channels as $channel): ?>

						<li><strong><?php echo link_to($channel['name'], '@channel_show_channel?slug=' . $channel['slug'], array('class' => 'korero')) ?></strong> - <?php echo $channel['description'] ?></li>

						<?php endforeach; ?>

						</ul>

						<?php else: ?>

						<p>No channels currently exist.</p>

						<?php endif; ?>
	</div>
</div>

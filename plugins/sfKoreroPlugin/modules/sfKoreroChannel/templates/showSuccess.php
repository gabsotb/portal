<?php slot('title', sprintf('Channel %s', $channel['name'])) ?>
<?php use_helper('Date') ?>
<?php //use_javascript('jquery.js') ?>

<?php if (count($messages)): ?>
<?php use_javascript('/sfKoreroPlugin/js/sfKorero.js') ?>
<?php endif; ?>
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
							<i class="icon-desktop"></i>
							<a href="#"><?php echo $channel['name'] ?> ---- <?php echo $channel['description']?> </a></li> <span class="divider">/</span>
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
		<div class="span8">
		     <div class="widget">
								<div class="widget-title">
									<h4><i class="icon-reorder"></i>Bordered Table</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									<a href="#widget-config" data-toggle="modal" class="icon-wrench"></a>
									<a href="javascript:;" class="icon-refresh"></a>		
									<a href="javascript:;" class="icon-remove"></a>
									</span>							
								</div>
								<div class="widget-body">
									<table class="table table-bordered table-hover">
										<thead>
										<tr>
											<td colspan="3" class="span-20">
											<?php include_partial('messageform', array('form' => $form)) ?>
											</td>
										</tr>
										<?php if (!count($messages) || $ajax): ?>
										<tr id="korero-nomessages">
											<td colspan="3" class="span-20"><strong>No messages yet! Go ahead and say something.</strong></td>
										</tr>
										<?php endif; ?>
										<?php if (count($messages) || $ajax): ?>
										<tr id="">
											<th class="span-14">Time</th>
											<th class="span-3">From</th>
											<th class="span-3 last">Message</th>
										</tr>
										<?php endif; ?>
									</thead>

									<tbody>

									<?php include_partial('list', array('messages' => $messages)) ?>

									</tbody>
					             </table>
								</div>
							</div>
		    

<?php if (!$ajax && count($messages)): ?>
<span id="korero-nojs"><hr />You do not have JavaScript enabled. Please refresh the page to check for new messages.</span>
<?php endif; ?>
		</div>
</div>
</div>



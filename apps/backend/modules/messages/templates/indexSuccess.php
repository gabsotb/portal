<div id="page" class="dashboard">
					<div class="row-fluid">
					<?php if($sf_user->hasCredential('assignJob')): ?>
					    <div class="span12">
						<!-- BEGIN STYLE CUSTOMIZER-->
						<!-- END STYLE CUSTOMIZER-->    	
						<!-- BEGIN PAGE TITLE & BREADCRUMB-->		
						<h3 class="page-title">
							<?php echo __('Managers Account') ?>
							<small><?php echo __('Assign Tasks and Manage User Accounts')?></small>
						</h3>
							<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="#"><?php echo __('Dashboard') ?></a> <span class="divider">/</span>
							</li>
							<li>
							<i class="icon-desktop"></i>
							<a href="#"><?php echo __('Manager') ?></a></li> <span class="divider">/</span>
							<li>
							<li>
							<i class="icon-desktop"></i>
							<a href="#"><?php echo __('Inbox Messages') ?></a></li> <span class="divider">/</span>
							<li class="pull-right dashboard-report-li">
							<i class="icon-time"></i>
				             <?php echo __('Logged in on') ?> <font color="blue">
									<?php
                                       $date = date("F j, Y");
									   print $date;
									?>
									</font>
							</li>
							
						</ul>
						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>
					<?php endif; ?>
						<div class="span11">
						
						<div class="widget">
								<div class="widget-title">
									<h4><i class="icon-envelope-alt"></i><?php echo __('System Inbox Messages') ?>: </h4>						
								</div>
								<div class="widget-body">
									<table class="table table-striped table-bordered" id="inboxbackend">
										<thead>
											<tr>
												
												<th><?php echo __('From') ?></th>
												<th class="hidden-phone"><?php echo __('Message') ?></th>
												<th class="hidden-phone"><?php echo __('Attachment') ?></th>
												<th class="hidden-phone"><?php echo __('Date')?></th>
												<th><?php echo __('Actions') ?></th>
											</tr>
										</thead>
										<tbody>
										   <?php foreach ($messagess as $messages): ?>
											<tr class="odd gradeX">
												<td><?php echo $messages['sender'] ?></td>
												<td><?php 
												//limit the number of characters
												$string = strip_tags($messages['message']);

														if (strlen($string) > 200) {

															// truncate string
															$stringCut = substr($string, 0, 200);

															// make sure it ends in a word so assassinate doesn't become ass...
															$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...........'; 
														}
														echo html_entity_decode($string);
												
												
												//echo html_entity_decode($messages['message'])
												
												?></td>
												<td>
												  <?php if($messages['attachement'] == null): ?>
												  <?php echo __('No Attachment') ?>
												  <?php endif; ?>
												  <?php if($messages['attachement'] != null): ?>
												  <?php echo link_to('download', '/uploads/documents/messages_docs/'.$messages['attachement'], array('target' => '_blank')); ?>
												  <?php endif; ?>
												
												
												</td>
												<td><?php echo $messages['created_at']?></td>
												<td class="center">
												<?php echo link_to('Delete', 'messages/delete?id='.$messages['id'], array('method' => 'delete', 'confirm' => 'Are you sure?')) ?><i class="icon-remove"></i>
												<a href="<?php echo url_for('messages/show?id='.$messages['id']) ?>"><i class="icon-zoom-in"></i><?php echo __('View') ?></a>
												
												</td>
											</tr>
										  <?php endforeach; ?>
			
										</tbody>
										
									</table>
									<a href="<?php echo url_for('messages/new')?> "><button class="btn btn-success"><i class=" icon-edit"></i><?php echo __('Compose') ?></button></a>
									<a href="<?php echo url_for('messages/new')?> "><button class="btn btn-primary"><i class="icon-envelope"></i> <?php echo __('Sent') ?> </button></a>
								</div>
								
							</div>
						
						
						</div>	
					</div>	
</div>



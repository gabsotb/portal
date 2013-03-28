<div id="page" class="dashboard">
<div class="row-fluid">
					<div class="span12">
						    	
						<!-- BEGIN PAGE TITLE & BREADCRUMB-->		
						<h3 class="page-title">
							<?php echo __('Inbox') ?>
							<small><?php echo __('View your Messages') ?></small>
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="<?php echo url_for('investmentapp/index') ?>"><?php echo __('Dashboard') ?></a> <span class="divider">/</span>
							</li>
							<li>
								<i class="icon-envelope-alt"></i>
								<a href="#"><?php echo __('inbox') ?></a> <span class="divider">/</span>
							</li>
							
						</ul>
						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>
				</div>
					<div class="row-fluid">
						<div class="span12">
						
						<div class="widget">
								<div class="widget-title">
									<h4><i class="icon-envelope-alt"></i><?php echo __('Your Messages:') ?> </h4>						
								</div>
								<div class="widget-body">
									<table class="table table-striped table-bordered" id="sample_1">
										<thead>
											<tr>
												
												<th><?php echo __('From') ?></th>
												<th class="hidden-phone"><?php echo __('Message') ?></th>
												<th class="hidden-phone"><?php echo __('Attachment') ?></th>
												<th class="hidden-phone"><?php echo __('Date') ?></th>
												<th><?php echo __('Actions') ?></th>
											</tr>
										</thead>
										<tbody>
										   <?php foreach ($messagess as $messages): ?>
											<tr class="odd gradeX">
												<td><?php echo $messages['sender'] ?></td>
												<td><?php echo $messages['message']?></td>
												<td><?php echo $messages['attachement'] ?></td>
												<td><?php echo $messages['created_at']?></td>
												<td class="center">
												<?php echo link_to('Delete', 'messages/delete?id='.$messages['id'], array('method' => 'delete', 'confirm' => 'Are you sure?')) ?><i class="icon-remove"></i>
												<a href="<?php echo url_for('messages/show?id='.$messages['id']) ?>"><i class="icon-zoom-in"></i><?php echo __('View') ?></a>
												
												</td>
											</tr>
										  <?php endforeach; ?>
			
										</tbody>
									</table>
								</div>
							</div>
						
						
						</div>	
					</div>	
</div>



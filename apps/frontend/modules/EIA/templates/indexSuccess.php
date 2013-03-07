<div class="span12">
	<h3 class="page-title"> Ei applications List <small>Enviromental Imapct Assessment </small> </h3>
</div>

<div id="page">
	<div class="row-fluid">
		<div class="span6">
			<div class="widget">
				<div class="widget-title">
					<h4> <i class="icon-reorder"></i> EIA Status </h4>
				</div>
				<div class="widget-body">


					<table class="table table-hover">
					  <thead>
						<tr>
						  <th>Developer name</th>
						  <th>Application Status</th>
						  <th>Comment</th>
						  <th>Percentage</th>
						  
						</tr>
					  </thead>
					  <tbody>
						<?php if(count($status)== 0 || is_null($status)): ?>
						<div class="alert alert-error">
						<strong>Alert!</strong> <br/>There are no applications
						for EIA certificate for your account!
						<br/><?php echo button_to('Apply for EIA Certificate','eia/new',array('class' => 'btn btn-success')); ?>
						</div>
						<?php endif; ?>
						<?php if(count($status) > 0): ?>
						<?php foreach ($status as $s): ?>
						<tr>
						  <td><?php echo $s['name'] ?></td>
						  <td><?php echo $s['application_status'] ?></td>
						  <td><?php echo $s['comments'] ?></td>
						  <td><?php echo $s['percentage'] ?> %</td>
						</tr>
						<?php endforeach; ?>
						<?php endif; ?>
					  </tbody>
					</table>

					  <a href="<?php echo url_for('eia/new') ?>" class="btn">New Application</a>
				</div>
			</div>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span6">
			<div class="widget">
				<div class="widget-title">
					<h4> <i class="icon-reorder"></i> TOR Status </h4>
				</div>
				<div class="widget-body">


					<table class="table table-hover">
					  <thead>
						<tr>
							<th></th>
						  <th>Status</th>
						  <th>Application Status</th>
						  
						</tr>
					  </thead>
					  <tbody>
						<?php if(count($torStatus)== 0 || is_null($torStatus)): ?>
						<div class="alert alert-error">
						<strong>Alert!</strong> <br/>There are no applications
						for TOR in your account!
						<br/><?php //echo button_to('Apply for EIA Certificate','eia/new',array('class' => 'btn btn-success')); ?>
						</div>
						<?php endif ?>
						<?php if(count($torStatus) > 0): ?>
						<?php foreach ($torStatus as $tor): ?>
						<tr>
							<td></td>
						  <td><?php echo $tor['status'] ?></td>
						  <td><?php echo $tor['comments'] ?></td>
						</tr>
						<?php endforeach; ?>
						<?php endif; ?>
					  </tbody>
					</table>

				</div>
			</div>
		</div>
	</div>
</div>
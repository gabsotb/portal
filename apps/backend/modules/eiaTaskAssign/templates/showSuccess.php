<div class="span12">
	<h3 class="page-title"> Assigned Task <small> Enviromental Imapct Assessment </small> </h3>
</div>
<div class="page">
	<div class="row-fluid">
		<div class="span12">
			<div class="widget">
				<div class="widget-title">
					<h4><i class="icon-reorder"></i>EIA Task Assignments List</h4>
				</div>
				<div class="widget-body">
						<table class="table table-striped">
						  <tbody>
							<tr>
							  <th>Id:</th>
							  <td><?php echo $ei_task_assignment->getId() ?></td>
							</tr>
							<tr>
							  <th>User assigned:</th>
							  <td><?php echo $ei_task_assignment->getUserAssigned() ?></td>
							</tr>
							<tr>
							  <th>Company:</th>
							  <td><?php echo $ei_task_assignment->getCompanyId() ?></td>
							</tr>
							<tr>
							  <th>Instructions:</th>
							  <td><?php echo $ei_task_assignment->getInstructions() ?></td>
							</tr>
							<tr>
							  <th>Duedate:</th>
							  <td><?php echo $ei_task_assignment->getDuedate() ?></td>
							</tr>
							<tr>
							  <th>Work status:</th>
							  <td><span class="label "><?php echo $ei_task_assignment->getWorkStatus() ?></span></td>
							</tr>
							<tr>
							  <th>Created at:</th>
							  <td><?php echo $ei_task_assignment->getCreatedAt() ?></td>
							</tr>
							<tr>
							  <th>Updated at:</th>
							  <td><?php echo $ei_task_assignment->getUpdatedAt() ?></td>
							</tr>
							<tr>
							  <th>Created by:</th>
							  <td><?php echo $ei_task_assignment->getCreatedBy() ?></td>
							</tr>
							<tr>
							  <th>Updated by:</th>
							  <td><?php echo $ei_task_assignment->getUpdatedBy() ?></td>
							</tr>
						  </tbody>
						</table>

						<hr />
						
						<a href="<?php echo url_for('eiaTaskAssign/edit?id='.$ei_task_assignment->getId()) ?>" class="btn btn-inverse">Edit</a>
						&nbsp;
						<a href="<?php echo url_for('eiaTaskAssign/index') ?>" class="btn btn-primary">List</a>
				</div>
			</div>
		</div>
	</div>
</div>
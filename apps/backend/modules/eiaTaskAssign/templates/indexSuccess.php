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
					
					<table class="table table-striped table-hover">
					  <thead>
						<tr>
						  <th>Id</th>
						  <th>User assigned</th>
						  <th>Company</th>
						  <th>Instructions</th>
						  <th>Duedate</th>
						  <th>Work status</th>
						  <th>Created at</th>
						  <th>Updated at</th>
						  <th>Created by</th>
						  <th>Updated by</th>
						  <th>Actions</th>
						</tr>
					  </thead>
					  <tbody>
						<?php foreach ($ei_task_assignments as $ei_task_assignment): ?>
						<tr>
						  <td><a href="<?php echo url_for('eiaTaskAssign/show?id='.$ei_task_assignment->getId()) ?>"><?php echo $ei_task_assignment->getId() ?></a></td>
						  <td><?php echo $ei_task_assignment->getUserAssigned() ?></td>
						  <td><?php echo $ei_task_assignment->getCompanyId() ?></td>
						  <td><?php echo $ei_task_assignment->getInstructions() ?></td>
						  <td><?php echo $ei_task_assignment->getDuedate() ?></td>
						  <td><?php echo $ei_task_assignment->getWorkStatus() ?></td>
						  <td><?php echo $ei_task_assignment->getCreatedAt() ?></td>
						  <td><?php echo $ei_task_assignment->getUpdatedAt() ?></td>
						  <td><?php echo $ei_task_assignment->getCreatedBy() ?></td>
						  <td><?php echo $ei_task_assignment->getUpdatedBy() ?></td>
						  <td>
						  <a href="<?php echo url_for('eiaTaskAssign/show?id='.$ei_task_assignment->getId()) ?>" class="icon huge"><i class="icon-zoom-in"></i></a>
						  <a href="<?php echo url_for('eiaTaskAssign/edit?id='.$ei_task_assignment->getId()) ?>" class="icon huge"><i class="icon-pencil"></i></a>
						  <a href="<?php echo url_for('eiaTaskAssign/delete?id='.$ei_task_assignment->getId()) ?>" class="icon huge"><i class="icon-remove"></i></a>
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
		
<div class="span12">
	<h3 class="page-title"> Assigned Tasks <small>Enviromental Imapct Assessment </small> </h3>
</div>

<div id="page">
	<div class="row-fluid">
		<div class="span12">
			<div class="widget">
				<div class="widget-title">
					<h4> <i class="icon-reorder"></i> Tasks </h4>
				</div>
				<div class="widget-body">
				<?php foreach($tasks as $task): ?>
					<table class="table table-striped">
						<thead>
							<th></th>
					
							<th> Instructions </th>
							<th> DueDate </th>
							<th> Work Status </th>
							<th> Developer name </th>
							<th> Assigned by </th>
							<th></th>
						</thead>
						<?php switch($task->getWorkStatus()){
								case 'notstarted':
									$label="label-warning";
									break;
								case 'processing':
									$label="label-warning";
									break;
								case 'processed':
									$label="label-success";
									break;
								default:
									$label=NULL;
						}?>
						<tbody>
							<td></td>
							
							<td><?php echo $task->getInstructions() ?></td>
							<td><?php echo date('D, j M y g:i a',$task->getDateTimeobject('duedate')->format('U'))  ?></td>
							<td><span class="label <?php echo $label ?>"><?php echo $task->getWorkStatus() ?></span></td>
							<td><?php echo $task->getEIApplication()->getDeveloperName() ?></td>
							<td><?php echo $task->getSfGuardUser() ?></td>
							<td><?php echo  button_to('Process', 'eiaDataAdmin/showEia?id='.$task->getCompanyId(),array('class' => 'btn')); ?></td>
						</tbody>
					</table>
				<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</div>
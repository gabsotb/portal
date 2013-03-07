<div class="span12">
	<h3 class="page-title"> Terms of Reference <small> Environmental Impact Assessment</small> </h3>
</div>

<div class="row-fluid">
	<div class="span12">
		<div class="widget">
			<div class="widget-title">
				<h4><i class="icon-reorder"></i> Summary for <?php echo $tor->getProjectImpact()->getEIApplication()->getName() ?> </h4>
			</div>
			<div class="widget-body">
				<div class="well">
					<h4> Issues Assessed </h4>
					<?php echo $tor->getIssuesAssessed() ?>
				</div>
				
				<div class="well">
					<h4> Specific Tasks </h4>
					<?php echo $tor->getSpecificTasks() ?>
				</div>
				
				<div class="well">
					<h4> Stake Holders </h4>
					<?php echo $tor->getStakeHolders() ?>
				</div>
				
				<div class="well">
					<h4> Experts </h4>
					<?php echo $tor->getExperts() ?>
				</div>
				
				<div class="form-actions">
					<?php echo button_to('Assessment', 'torDecision/new?name='.$tor->getProjectImpact()->getEIApplication()->getName(), array('class' => 'btn btn-success')); ?>
				</div>
			</div>
		</div>
	</div>
</div>

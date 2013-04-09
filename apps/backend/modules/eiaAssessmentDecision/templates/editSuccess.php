<div class="row-fluid">
	<div class="widget">
		<div class="widget-title">
			<h4><i class="icon-reorder"></i>Recommendations</h4>
		</div>
		<div class="widget-body">
		<?php if(count($projectImpact) != 0): ?>
			<div class="well">
				<h4>Project Imapct</h4>
				<p><b>Proposed Impact Level:</b>&nbsp;&nbsp;<?php echo strtoupper(str_replace("_"," ",$projectImpact[0]['impact_level'])) ?></p>
				<p><b>Proposed site visit:</b>&nbsp;&nbsp;<?php echo date('d M y',strtotime($projectImpact[0]['site_visit'])) ?></p>
				<p><b>Remarks:</b>&nbsp;&nbsp;<?php echo $projectImpact[0]['comments'] ?></p>
			</div>
		<?php endif; ?>
		<?php if(count($briefDecision) != 0): ?>
			<div class="well">
				<h4>Project brief decision</h4>
				<p>Decision:<?php echo $briefDecision[0]['decision'] ?></p>
				<p>Remarks:<?php echo $briefDecision[0]['comments'] ?></p>
			</div>
		<?php endif; ?>
		</div>
	</div>
</div>
<div class="row-fluid">
	<div class="widget">
		<div class="widget-title">
			<h4><i class="icon-reorder"></i>Decision</h4>
		</div>
		<div class="widget-body form">
		<?php include_partial('form', array('form' => $form)) ?>
		</div>
	</div>
</div>
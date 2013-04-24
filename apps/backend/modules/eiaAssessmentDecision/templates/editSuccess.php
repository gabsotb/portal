<div class="row-fluid">
	<div class="widget">
		<div class="widget-title">
			<h4><i class="icon-reorder"></i>Recommendations</h4>
		</div>
		<div class="widget-body">
		<?php if(count($projectImpact) != 0 && $eiaprojectId['stage']=='impact-level'): ?>
			<?php if($projectImpact[0]['impact_level'] == 'reject'): ?>
			<div class="alert alert-block alert-warning fade in">
				<h4>Impact Level Assessment</h4>
				<p>Rejecting the application has been recommended</p>
				<p><b>Remarks</b></p>
				<?php echo html_entity_decode($projectImpact[0]['comments']) ?>
				<br/>
				<p><a href="#siteVisitReport" role="button" class="btn btn-inverse" data-toggle="modal">View site visit report</a></p>
			</div>
			<?php endif; ?>
			<?php if($projectImpact[0]['impact_level'] != 'reject'): ?>
			<div class="alert alert-block alert-info fade in">
				<h4>Project Impact</h4>
				<p>Proposed Impact Level:&nbsp;&nbsp;<b><?php echo strtoupper(str_replace("_"," ",$projectImpact[0]['impact_level'])) ?></b></p>
				<p><b>Remarks</b></p>
				<p><?php echo html_entity_decode($projectImpact[0]['comments']) ?></p>
				<br/>
				<p><a href="#siteVisitReport" role="button" class="btn btn-inverse tooltips" data-toggle="modal" data-placement="left" data-original-title="View Site visit report">Report</a>
				<?php if(!empty($report[0]['tor'])): ?>
				<?php echo button_to('T.O.R','/uploads/documents/eia_documents/tor/'.$report[0]['tor'],array('target' => '_blank','class' => 'btn btn-primary tooltips','data-placement' => 'right', 'data-original-title' => 'Download Terms of Reference')) ?>
				<?php endif; ?></p>
			</div>
			<?php endif; ?>
		<?php endif; ?>
		<?php if(count($eireport) != 0 && $eiaprojectId['stage']=='ei-report'): ?>
			<div class="alert alert-block alert-info fade in">
			<h4>Environmental Impact Report</h4>
			<br/>
			<p><?php echo link_to('Report', '/uploads/documents/eia_documents/user_eireports/'.$eireport[0]['pdf_doc'], array('target' => '_blank','class' => 'btn btn-primary tooltips', 'data-placement' => 'right','data-original-title' => 'View EI Report')); ?></p>
			</div>
		<?php endif; ?>
		<?php if(count($sites) != 0 && $eiaprojectId['stage']=='site-visit'): ?>
			<div class="alert alert-block alert-info fade in">
				<h4>Site visit</h4>
				<p><strong>Requested day:</strong>&nbsp;&nbsp;<?php echo date('D jS F Y',strtotime($sites[0]['site_visit'])) ?></p>
				<?php if(!empty($sites[0]['remarks'])): ?>
				<p><b>Remarks</b></p>
				<p><?php echo html_entity_decode($sites[0]['remarks']) ?></p>
				<?php endif; ?>
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
<div id="siteVisitReport" class="modal hide fade" role="dialog" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
		<h3 id="siteVisitReport">Site Visit Report</h3>
	</div>
	<div class="modal-body">
	<?php echo html_entity_decode($report[0]['report']) ?>
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
	</div>
</div>
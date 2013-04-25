<div class="row-fluid">
	<div class="span4 sortable ui-sortable">
		<div class="widget">
			<div class="widget-title">
				<h4><i class="icon-reorder"></i>Project Details</h4>
			</div>
			<div class="widget-body">
				<div class="slimScrollDiv">
				<div class="scroller" data-height="200px">
				<p><b>Project title:</b>&nbsp;&nbsp;<?php echo $projectDetail['project_title'] ?></p>
				<p><b>Plot number:</b>&nbsp;&nbsp;<?php echo $projectDetail['project_plot_number'] ?></p>
				<p><b>Village:</b>&nbsp;&nbsp;<?php echo $projectDetail['village'] ?></p>
				<p><b>Cell:</b>&nbsp;&nbsp;<?php echo $projectDetail['cell'] ?></p>
				<p><b>Sector:</b>&nbsp;&nbsp;<?php echo strtoupper($projectDetail['sector']) ?></p>
				<p><b>District:</b>&nbsp;&nbsp;<?php echo strtoupper($projectDetail['district']) ?></p>
				<p><b>Province:</b>&nbsp;&nbsp;<?php echo strtoupper(str_replace("_"," ",$projectDetail['province'])) ?></p>
				</div>
				<div class="slimScrollBar ui-draggable"></div>
				<div class="slimScrollRail"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="span4 sortable ui-sortable">
		<div class="widget">
			<div class="widget-title">
				<h4><i class="icon-reorder"></i>Project Developer</h4>
			</div>
			<div class="widget-body">
				<div class="slimScrollDiv">
				<div class="scroller" data-height="200px">
				<p><b>Developer name:</b>&nbsp;&nbsp;<?php echo $projectDeveloper[0]['developer_name'] ?></p>
				<p><b>Contact person:</b>&nbsp;&nbsp;<?php echo $projectDeveloper[0]['contact_person'] ?></p>
				<p><b>Address:</b>&nbsp;&nbsp;<?php echo $projectDeveloper[0]['address'] ?></p>
				<p><b>Telephone:</b>&nbsp;&nbsp;<?php echo $projectDeveloper[0]['telephone'] ?></p>
				<p><b>mobile_phone:</b>&nbsp;&nbsp;<?php echo $projectDeveloper[0]['mobile_phone'] ?></p>
				<p><b>Email address:</b>&nbsp;&nbsp;<?php echo mail_to($projectDeveloper[0]['email_address'],'Email Developer',array('class' => 'btn')) ?></p>
				<!--p><b>Social media account:</b>&nbsp;&nbsp;<?php //echo link_to($projectDeveloper[0]['social_media_account'],$projectDeveloper[0]['communication_mode'].'.com/'.$projectDeveloper[0]['social_media_account'],array('absolute' => true)) ?></p-->
				</div>
				<div class="slimScrollBar ui-draggable"></div>
				<div class="slimScrollRail"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="span4 sortable ui-sortable">
		<div class="widget">
			<div class="widget-title">
				<h4><i class="icon-reorder"></i>Project Developer</h4>
			</div>
			<div class="widget-body">
				<div class="slimScrollDiv">
				<div class="scroller" data-height="200px">
				<p><b>Project nature:</b>&nbsp;&nbsp;<?php echo strtoupper(str_replace("_"," ",$projectDescription[0]['project_nature'])) ?></p>
				<p><b>Project objective:</b>&nbsp;&nbsp;<?php echo html_entity_decode($projectDescription[0]['project_objective']) ?></p>
				</div>
				<div class="slimScrollBar ui-draggable"></div>
				<div class="slimScrollRail"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row-fluid">
	<div class="widget">
		<div class="widget-title">
			<h4><i class="icon-reorder"></i>Recommendations</h4>
		</div>
		<div class="widget-body">
		<?php if(count($siteVisit) != 0 && $siteVisit[0]['visited'] != 1): ?> 
			<div class="widget">
				<div class="widget-title">
					<h4><i class="reorder"></i>Site Visit</h4>
				</div>
				<div class="widget-body">
				<div class="alert alert-info">
				<p><strong>Date:</strong>&nbsp;&nbsp;<?php echo date('D jS F Y',strtotime($siteVisit[0]['site_visit'])) ?></p>
				</div>
				<?php if(count($assessmentSiteVisit) != 0): ?>
				<div class="well">
				<h4>Supervisor verdict</h4>
				<?php if($assessmentSiteVisit[0]['verdict']=='accept' ): ?>
				<div class="alert alert-block alert-success fade in">
				<h4 class="alert-heading">Request accepted</h4>
				<p><strong>Remarks</strong></p>
				<p><?php echo html_entity_decode($assessmentSiteVisit[0]['remarks']) ?></p>
				<br/>
				<p><?php echo button_to('Info Applicant','eiaDataAdmin/message?applicant='.$projectDetail['updated_by'],array('class' => 'btn btn-success')) ?>
				<a href="#newSiteDate" role="button" class="btn btn-warning" data-toggle="modal">New site visit</a></p>
				</div>
				<?php endif; ?>
				<?php if($assessmentSiteVisit[0]['verdict'] == 'decline'): ?>
				<div class="alert alert-block alert-error fade in">
				<h4 class="alert-heading">Request declined</h4>
				<p><strong>Remarks</strong></p>
				<p><?php echo html_entity_decode($assessmentSiteVisit[0]['remarks']) ?></p>
				<br/>
				<p><?php echo button_to('Reschedule','eiaSiteVisit/edit?id='.$siteVisit[0]['id'].'&act=reschedule',array('class' => 'btn btn-primary')) ?></p>
				</div>
				<?php endif; ?>
				<?php if($assessmentSiteVisit[0]['verdict'] == 'reviewed'): ?>
				<div class="alert alert-block alert-info fade in">
				<h4 class="alert-heading">Request reviewed</h4>
				<br/>
				<p><?php echo button_to('Info Applicant','eiaDataAdmin/message?applicant='.$projectDetail['updated_by'],array('class' => 'btn btn-success')) ?>
				<a href="#newSiteDate" role="button" class="btn btn-warning" data-toggle="modal">New site visit</a></p>
				</div>
				<?php endif; ?>
				</div>
				<?php endif; ?>
				<?php if(count($assessmentSiteVisit) == 0): ?>
				<div class="alert alert-block alert-info fade in">
					<button type="button" class="close" data-dismiss="alert">x</button>
					<h4>Awaiting supervisor assessment on selected site visit date</h4>
					<p>Refresh Page/Come back Later</p>
					<!-- some actions -->
				</div>
				<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>
		<?php if(count($projectImpact) != 0 && count($reports) == 0): ?>
			<div class="widget">
				<div class="widget-title">
					<h4><i class="icon-reorder"></i>Project Impact</h4>
				</div>
				<div class="widget-body">
				<?php if($projectImpact[0]['impact_level'] == 'reject'): ?>
				<div class="alert">
				<p><strong>Project Recommendation:</strong> Rejection</p>
				</div>
				<?php endif; ?>
				<?php if($projectImpact[0]['impact_level'] != 'reject'): ?>
				<div class="alert alert-info">
				<p>Project Impact:&nbsp;&nbsp;<b><?php echo strtoupper(str_replace("_"," ",$projectImpact[0]['impact_level']))?></b></p>
				</div>
				<?php endif; ?>
				<?php if(count($assessmentImpact) != 0): ?>
				<div class="well">
					<h4>Supervisor verdict</h4>
					<?php if($assessmentImpact[0]['verdict']=='accept' ): ?>
					<div class="alert alert-block alert-success fade in">
					<h4 class="alert-heading">Request accepted</h4>
					<p><strong>Remarks</strong></p>
					<p><?php echo html_entity_decode($assessmentImpact[0]['remarks']) ?></p>
					<br/>
					<!-- some action -->
					<p><?php echo button_to('Info Applicant','eiaDataAdmin/message?applicant='.$projectDetail['updated_by'],array('class' => 'btn btn-primary')) ?>
					<?php if($projectImpact[0]['impact_level'] == 'level_1'): ?>
					<?php echo button_to('Issue Clearence Letter','eiaDataAdmin/clearenceLetter?id='.$projectDetail['id'],array('class' => 'btn btn-success')) ?></p>
					<?php endif; ?>
					<?php if($projectImpact[0]['impact_level'] == 'level_2' || $projectImpact[0]['impact_level'] == 'level_3'): ?>
					<?php echo button_to('EI study','eiaDataAdmin/messageEIReport?applicant='.$projectDetail['updated_by'].'&id='.$projectDetail['id'],array('class' => 'btn btn-success tooltips','data-placement' => 'bottom','data-original-title' => 'Request applicant to proceed with the EI study')) ?></p>
					<?php endif; ?>
					<?php if($projectImpact[0]['impact_level'] == 'reject'): ?>
					<a href="#widget-reject" data-toggle="modal">
					<button type="button" class="btn btn-inverse"><?php echo __('Reject') ?></button></a></p>
					<?php endif; ?>
					</div>
					<?php endif; ?>
					<?php if($assessmentImpact[0]['verdict'] == 'decline'): ?>
					<div class="alert alert-block alert-error fade in">
					<h4 class="alert-heading">Request declined</h4>
					<p><strong>Remarks</strong></p>
					<p><?php echo html_entity_decode($assessmentImpact[0]['remarks']) ?></p>
					<br/>
					<!-- some action -->
					<p><a href="#widget-resubmit" data-toggle="modal">
					<button type="button" class="btn btn-primary tooltips" data-placement="right" data-original-title="Resubmit your request"><?php echo __('Resubmit') ?></button></a></p>
					</div>
					<?php endif; ?>
					<?php if($assessmentImpact[0]['verdict'] == 'reviewed'): ?>
					<div class="alert alert-block alert-info fade in">
					<h4 class="alert-heading">Request reviewed</h4>
					<br/>
					<p><?php echo button_to('Info Applicant','eiaDataAdmin/message?applicant='.$projectDetail['updated_by'],array('class' => 'btn btn-success')) ?>
					<!-- some action -->
					<?php if($projectImpact[0]['impact_level'] == 'level_1'): ?>
					<?php echo button_to('Issue Clearence Letter','eiaDataAdmin/clearenceLetter?id='.$projectDetail['id'],array('class' => 'btn btn-success')) ?></p>
					<?php endif; ?>
					<?php if($projectImpact[0]['impact_level'] == 'level_2' || $projectImpact[0]['impact_level'] == 'level_3'): ?>
					<?php echo button_to('EI study','eiaDataAdmin/messageEIReport?applicant='.$projectDetail['updated_by'].'&id='.$projectDetail['id'],array('class' => 'btn btn-success tooltips','data-placement' => 'bottom','data-original-title' => 'Request applicant to proceed with the EI study')) ?></p>
					<?php endif; ?>
					<?php if($projectImpact[0]['impact_level'] == 'reject'): ?>
					<a href="#widget-reject" data-toggle="modal">
					<button type="button" class="btn btn-inverse"><?php echo __('Reject') ?></button></a></p>
					<?php endif; ?>
					</div>
					<?php endif; ?>
				</div>
				<?php endif; ?>
				<?php if(count($assessmentImpact) == 0): ?>
				<div class="alert alert-block alert-info fade in">
					<button type="button" class="close" data-dismiss="alert">x</button>
					<h4>Awaiting supervisor assessment on your recommendation</h4>
					<p>Refresh Page/Come back Later</p>
					<!-- some actions -->
				</div>
				<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>
		<?php if(count($reports) != 0): ?>
		<div class="widget">
			<div class="widget-title">
				<h4><i class="icon-reorder"></i>Environmental Impact Report</h4>
			</div>
			<div class="widget-body">
				<div class="alert alert-block alert-info">
				<p><b>View Report</b> &nbsp;<?php echo link_to('Report', '/uploads/documents/eia_documents/user_eireports/'.$reports[0]['pdf_doc'], array('target' => '_blank','class' => 'btn btn-info tooltips', 'data-placement' => 'bottom', 'data-original-title' => 'View EI report')); ?></p>
				</div>
				<div class="well">
					<h4>Supervisor verdict</h4>
					<?php if($assessmentReport[0]['verdict'] == 'accept'): ?>
					<div class="alert alert-block alert-success fade in">
					<h4>Request Approved</h4>
					<p><b>Remarks</b></p>
					<p><?php echo html_entity_decode($assessmentReport[0]['remarks']) ?></p>
					<br/>
					<p><?php echo button_to('Info lead agencies','messages/new',array('class' => 'btn btn-primary')) ?>
					<?php echo button_to('Info local governments','messages/new',array('class' => 'btn btn-primary')) ?>
					<?php echo button_to('Info general public','messages/new',array('class' => 'btn btn-primary')) ?>
					<?php echo button_to('Issue certificate','eiacertificates/issue?id='.$reports[0]['id'],array('class' => 'btn btn-success')) ?></p>
					</div>
					<?php endif; ?>
					<?php if($assessmentReport[0]['verdict'] == 'decline'): ?>
					<div class="alert alert-block alert-error fade in">
					<h4>Request declined</h4>
					<p><b>Remarks</b></p>
					<p><?php echo html_entity_decode($assessmentReport[0]['remarks']) ?></p>
					<br/>
					<p><a href="#widget-resubmit-report" data-toggle="modal">
					<button type="button" class="btn btn-primary tooltips" data-placement="right" data-original-title="Resubmit your request"><?php echo __('Resubmit') ?></button></a></p>
					</div>
					<?php endif; ?>
					<?php if($assessmentReport[0]['verdict'] == 'reviewed'): ?>
					<div class="alert alert-block alert-info fade in">
					<h4 class="alert-heading">Request reviewed</h4>
					<br/>
					<p><?php echo button_to('Info lead agencies','messages/new',array('class' => 'btn btn-primary')) ?>
					<?php echo button_to('Info local governments','messages/new',array('class' => 'btn btn-primary')) ?>
					<?php echo button_to('Info general public','messages/new',array('class' => 'btn btn-primary')) ?>
					<?php echo button_to('Issue certificate','eiacertificates/issue?id='.$reports[0]['id'],array('class' => 'btn btn-success')) ?></p>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php endif; ?>
		</div>
	</div>
</div>
<div id="newSiteDate" class="modal hide fade" role="dialog" aria-hidden="true">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
	<h3>Site visit change</h3>
	</div>
	<div class="modal-body">
	<p>Request for a new site visit date</p>
	<p>Proceed if sure of this action</p>
	</div>
	<div class="modal-footer">
	<button type="btn" data-dismiss="modal" aria-hidden="true">Close</button>
	<?php echo button_to('Proceed','eiaSiteVisit/edit?id='.$siteVisit[0]['id'],array('class' => 'btn btn-success')) ?>
	</div>
</div>
<div id="widget-reject" class="modal hide">
	<div class="modal-header">
		<button data-dismiss="modal" class="close" type="button">×</button>
		<h3><?php echo __('Reject Application') ?></h3>
	</div>
	<div class="modal-body">
		<p><?php echo __('The applicant progress will be discontinued') ?>.</p> 
		<p><?php echo __('Applicant will resubmit once they have satisfied your requirements') ?>.</p>
	</div>
	<div class="modal-footer">
		<button data-dismiss="modal" class="btn" aria-hidden="true"><?php echo __('Close') ?></button>
		<?php echo button_to('Proceed','eiaDataAdmin/reject?id='.$projectDetail['id'],array('class' => 'btn btn-success')) ?>
	</div>
</div>
<div id="widget-resubmit" class="modal hide">
	<div class="modal-header">
		<button data-dismiss="modal" class="close" type="button">×</button>
		<h3><?php echo __('Resubmit') ?></h3>
	</div>
	<div class="modal-body">
		<p><?php echo __('This confirms you have read and understood what is required for resubmission for assessment by the supervisor') ?>.</p> 
		<p><?php echo __('Proceed to make the relevant changes') ?>.</p>
	</div>
	<div class="modal-footer">
		<button data-dismiss="modal" class="btn" aria-hidden="true"><?php echo __('Close') ?></button>
		<?php echo button_to('Proceed','eiaDataAdmin/siteVisitReport?id='.$siteVisit[0]['id'],array('class' => 'btn btn-success')) ?>
	</div>
</div>
<div id="widget-resubmit-report" class="modal hide">
	<div class="modal-header">
		<button data-dismiss="modal" class="close" type="button">×</button>
		<h3><?php echo __('Resubmit EI Report') ?></h3>
	</div>
	<div class="modal-body">
		<p><?php echo __('This confirms you have read and understood what is required for resubmission for assessment by the supervisor') ?>.</p> 
		<p><?php echo __('Proceed to make the relevant changes') ?>.</p>
	</div>
	<div class="modal-footer">
		<button data-dismiss="modal" class="btn" aria-hidden="true"><?php echo __('Close') ?></button>
		<?php echo button_to('Proceed','eireportresubmit/new?id='.$reports[0]['eiaproject_id'],array('class' => 'btn btn-success')) ?>
	</div>
</div>
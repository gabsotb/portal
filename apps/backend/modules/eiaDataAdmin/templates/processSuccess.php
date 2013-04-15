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
				<p><b>Social media account:</b>&nbsp;&nbsp;<?php echo link_to($projectDeveloper[0]['social_media_account'],$projectDeveloper[0]['communication_mode'].'.com/'.$projectDeveloper[0]['social_media_account'],array('absolute' => true)) ?></p>
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
		<?php if(count($siteVisit) != 0): ?> 
			<div class="widget">
				<div class="widget-title">
					<h4><i class="reorder"></i>Site Visit</h4>
				</div>
				<div class="widget-body">
				<div class="alert alert-info">
				<p><strong>Date:</strong>&nbsp;&nbsp;<?php echo date('D jS F Y',strtotime($siteVisit[0]['site_visit'])) ?></p>
				</div>
				<div class="well">
				<h4>Supervisor verdict</h4>
				<?php if($assessmentSiteVisit[0]['verdict']=='accept' ): ?>
				<div class="alert alert-block alert-success fade in">
				<h4 class="alert-heading">Request accepted</h4>
				<p><strong>Remarks</strong></p>
				<p><?php echo html_entity_decode($assessmentSiteVisit[0]['remarks']) ?></p>
				<p><?php echo button_to('Info Applicant','eiaDataAdmin/message?applicant='.$projectDetail['updated_by'],array('class' => 'btn btn-success')) ?>
				<?php echo mail_to($applicantEmail->getEmailAddress(),'Email applicant',array('class' => 'btn')) ?></p>
				</div>
				<?php endif; ?>
				<?php if($assessmentSiteVisit[0]['verdict'] == 'decline'): ?>
				<div class="alert alert-block alert-error fade in">
				<h4 class="alert-heading">Request declined</h4>
				<p><strong>Remarks</strong></p>
				<p><?php echo html_entity_decode($assessmentSiteVisit[0]['remarks']) ?></p>
				<p><?php echo button_to('Reschedule','eiaSiteVisit/edit?id='.$siteVisit[0]['id'].'&act=reschedule',array('class' => 'btn btn-primary')) ?></p>
				</div>
				<?php endif; ?>
				<?php if($assessmentSiteVisit[0]['verdict'] == 'reviewed'): ?>
				<div class="alert alert-block alert-info fade in">
				<h4 class="alert-heading">Request reviewed</h4>
				<p><?php echo button_to('Info Applicant','eiaDataAdmin/message?applicant='.$projectDetail['updated_by'].'&id='.$projectDetail['id'],array('class' => 'btn btn-success')) ?>
				<?php echo mail_to($applicantEmail->getEmailAddress(),'Email applicant',array('class' => 'btn')) ?></p>
				</div>
				<?php endif; ?>
				</div>
				</div>
			</div>
		<?php endif; ?>
		<?php if(count($projectImpact) != 0): ?>
			<div class="widget">
				<div class="widget-title">
					<h4><i class="icon-reorder"></i>Project Impact</h4>
				</div>
				<div class="widget-body">
				<?php if($projectImpact[0]['impact_level'] == 'reject'): ?>
				<div class="alert alert-info">
				<p><strong>Project Recommendation:</strong> Rejection</p>
				</div>
				<?php endif; ?>
				<?php if($projectImpact[0]['impact_level'] != 'reject'): ?>
				<div class="alert alert-info">
				<p><strong>Project Impact</strong></p>
				<p><?php echo strtoupper(str_replace("_"," ",$projectImpact[0]['impact_level']))?></p>
				</div>
				<?php endif; ?>
				<div class="well">
					<h4>Supervisor verdict</h4>
					<?php if($assessmentImpact[0]['verdict']=='accept' ): ?>
					<div class="alert alert-block alert-success fade in">
					<h4 class="alert-heading">Request accepted</h4>
					<p><strong>Remarks</strong></p>
					<p><?php echo html_entity_decode($assessmentImpact[0]['remarks']) ?></p>
					<!-- some action -->
					</div>
					<?php endif; ?>
					<?php if($assessmentImpact[0]['verdict'] == 'decline'): ?>
					<div class="alert alert-block alert-error fade in">
					<h4 class="alert-heading">Request declined</h4>
					<p><strong>Remarks</strong></p>
					<p><?php echo html_entity_decode($assessmentImpact[0]['remarks']) ?></p>
					<!-- some action -->
					</div>
					<?php endif; ?>
					<?php if($assessmentImpact[0]['verdict'] == 'reviewed'): ?>
					<div class="alert alert-block alert-info fade in">
					<h4 class="alert-heading">Request reviewed</h4>
					<!-- some action -->
					</div>
					<?php endif; ?>
				</div>
				</div>
			</div>
		<?php endif; ?>
		</div>
	</div>
</div>

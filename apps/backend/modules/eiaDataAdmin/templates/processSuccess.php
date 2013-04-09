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
				<p><b>Plot number:</b><?php echo $projectDetail['project_plot_number'] ?></p>
				<p><b>Village:</b><?php echo $projectDetail['village'] ?></p>
				<p><b>Cell:</b><?php echo $projectDetail['cell'] ?></p>
				<p><b>Sector:</b><?php echo $projectDetail['sector'] ?></p>
				<p><b>District:</b><?php echo $projectDetail['district'] ?></p>
				<p><b>Province:</b><?php echo $projectDetail['province'] ?></p>
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
				<p><b>Contact person:</b><?php echo $projectDeveloper[0]['contact_person'] ?></p>
				<p><b>Address:</b><?php echo $projectDeveloper[0]['address'] ?></p>
				<p><b>Telephone:</b><?php echo $projectDeveloper[0]['telephone'] ?></p>
				<p><b>mobile_phone:</b><?php echo $projectDeveloper[0]['mobile_phone'] ?></p>
				<p><b>Email address:</b><?php echo mail_to($projectDeveloper[0]['email_address']) ?></p>
				<p><b>Social media account:</b><?php echo link_to($projectDeveloper[0]['social_media_account'],$projectDeveloper[0]['communication_mode'].'.com/'.$projectDeveloper[0]['social_media_account'],array('absolute' => true)) ?></p>
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
				<p><b>Project nature:</b>&nbsp;&nbsp;<?php echo $projectDescription[0]['project_nature'] ?></p>
				<p><b>Project objective:</b><?php echo $projectDescription[0]['project_objective'] ?></p>
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
			<h4><i class="icon-reorder"></i>Project Impact</h4>
		</div>
		<div class="widget-body">
		<p>Project Impact:<?php echo $projectImpact[0]['impact_level'] ?></p>
		<p>Site visit:<?php echo $projectImpact[0]['site_visit'] ?></p>
		<?php if($projectImpact[0]['impact_level'] == 'level_1'): ?>
		<p><?php //echo button_to('Issue Letter','eiaDataAdmin/certificateImpact1?id='.$projectImpact[0]['id'],array('class' => 'btn btn-success')) ?></p>
		<?php endif; ?>
		</div>
	</div>
</div>

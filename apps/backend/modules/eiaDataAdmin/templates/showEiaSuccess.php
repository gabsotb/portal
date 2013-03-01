
<div class="span12">
	<h3 class="page-title">Summary for <?php echo $eia->getName(); ?> <small> Environmental Impact Assessment </small> </h3>
</div>

<div id="page">

	<div class="row-fluid">
		<div class="span12">
			<div class="widget">
				<div class="widget-title">
					<h4><i class="icon-reorder"></i> Application Details </h4>
				</div>
				
				<div class="widget-body">
					
						<div class="span8">
							<h3><?php echo $eia->getProjectName(); ?></h3>
						</div>
						<div class="row-fluid">
							<div class="span6">
							<div class="well">
							<h4> Project Purpose </h4>
							<p><?php echo $eia->getProjectPurpose(); ?></p>
							</div>
							</div>
							
							<div class="span6">
							<div class="well">
							<h4> Project's Nature </h4>
							<p><?php echo $eia->getProjectNature(); ?></p>
							</div>
							</div>
						</div>	
						<div class="row-fluid">
							<div class="span4">
							<div class="well">
							<h4> Project's Site </h4>
							<p><?php echo $eia->getProjectSite(); ?></p>
							</div>
							</div>
							
							<div class="span8">
							<div class="well well-large">
							<h4> Site's Laws </h4>							
							<p><?php echo $eia->getProjectSitelaws(); ?></p>
							</div>
							</div>
						</div>	
						<div class="row-fluid">
							<div class="span8">
							<div class="well well-large">
							<h4> Environmental Impact </h4>
							<p><?php echo $eia->getEnvironmentImpacts(); ?></p>
							</div>
							</div>
						</div>
						<div class="row-fluid">
							<div class="span8">
							<?php if(!is_null($eia->getOtherAlternatives())): ?>
							<div class="well well-large">
							<h4> Other Alternatives </h4>
							<p><?php echo $eia->getOtherAlternatives(); ?></p>
							</div>
							<?php endif ?>
							</div>
						</div>
						<div class="row-fluid">
							<div class="span8">
							<?php if(!is_null($eia->getOtherInformation())): ?>
							<div class="well well-large">
							<h4> Other Information </h4>
							<p><?php echo $eia->getOtherInformation(); ?></p>
							</div>
							<?php endif ?>
							</div>
						</div>
						<div class="row-fluid">
							<div class="span6">
							<h3> Developer's Info </h3>
							<div class="well">
							<strong> Company RegNo. </strong>
							<?php echo $eia->getCompanyRegno(); ?><br/>
							<strong> Developer's Name </strong>
							<?php echo $eia->getName() ?><br/>
							<strong> Developer's Title </strong>
							<?php echo $eia->getDeveloperTitle(); ?><br/>
							<address>
							<strong>Developer's Address</strong>
							<?php echo $eia->getDeveloperAddress(); ?><br/>
							</address>
							</div>
							</div>
						</div>
						<div class="form-actions">
						<?php echo button_to('Assesment','projectImpact/new?name='.$eia->getName(),array('class' => 'btn btn-success btn-large'))  ?>
						</div>
						

				</div>
			</div>
		</div>
		<!--<div class="span2">
			<div class="well" id="pulsate-regular">
			<h3> Due On </h3>
			<?php //echo $job['duedate'] ?>
			</div>
		</div> -->
	</div>
	
</div>




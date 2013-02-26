<?php foreach($jobs as $job): ?>

<div class="span12">
	<h3 class="page-title">Summary for <?php echo $job['name'] ?> <small> Environmental Impact Assessment </small> </h3>
</div>

<div id="page">

	<div class="row-fluid">
		<div class="span10" >
			<div class="widget">
				<div class="widget-title">
					<h4><i class="icon-reorder"></i> Application Details </h4>
					<span class="tools">
						<a href="javascript:;" class="icon-chevron-down"></a>
					</span>
				</div>
				
				<div class="widget-body">
					
						<div class="span8">
							<h3><?php echo $job['project_name'] ?></h3>
						</div>
						<div class="row-fluid">
							<div class="span6">
							<div class="well">
							<h4> Project Purpose </h4>
							<p><?php echo $job['project_purpose'] ?></p>
							</div>
							</div>
							
							<div class="span6">
							<div class="well">
							<h4> Project's Nature </h4>
							<p><?php echo $job['project_nature'] ?></p>
							</div>
							</div>
						</div>	
						<div class="row-fluid">
							<div class="span4">
							<div class="well">
							<h4> Project's Site </h4>
							<p><?php echo $job['project_site'] ?></p>
							</div>
							</div>
							
							<div class="span8">
							<div class="well well-large">
							<h4> Site's Laws </h4>							
							<p><?php echo $job['project_sitelaws'] ?></p>
							</div>
							</div>
						</div>	
						<div class="row-fluid">
							<div class="span8">
							<div class="well well-large">
							<h4> Environmental Impact </h4>
							<p><?php echo $job['environment_impacts'] ?></p>
							</div>
							</div>
						</div>
						<div class="row-fluid">
							<div class="span8">
							<?php if(!is_null($job['other_alternatives'])): ?>
							<div class="well well-large">
							<h4> Other Alternatives </h4>
							<p><?php echo $job['other_alternatives'] ?></p>
							</div>
							<?php endif ?>
							</div>
						</div>
						<div class="row-fluid">
							<div class="span8">
							<?php if(!is_null($job['other_information'])): ?>
							<div class="well well-large">
							<h4> Other Information </h4>
							<p><?php echo $job['other_information'] ?></p>
							</div>
							<?php endif ?>
							</div>
						</div>
						<div class="row-fluid">
							<div class="span6">
							<h3> Developer's Info </h3>
							<div class="well">
							<strong> Company RegNo. </strong>
							<?php echo $job['company_regno'] ?><br/>
							<strong> Developer's Name </strong>
							<?php echo $job['name'] ?><br/>
							<strong> Developer's Title </strong>
							<?php echo $job['developer_title'] ?><br/>
							<address>
							<strong>Developer's Address</strong>
							<?php echo $job['developer_address'] ?><br/>
							</address>
							</div>
							</div>
						</div>
						<div class="form-actions">
						<?php echo button_to('Assesment','EiTaskAssign/impactNew',array('class' => 'btn btn-success btn-large'))  ?>
						</div>
						

				</div>
			</div>
		</div>
		<div class="span2">
			<div class="well" id="pulsate-regular">
			<h3> Due On </h3>
			<?php echo $job['duedate'] ?>
			</div>
		</div>
	</div>
	
</div>

<?php endforeach ?>


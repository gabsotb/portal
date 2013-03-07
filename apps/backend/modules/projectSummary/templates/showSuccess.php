<div id="page">
 <!-- END OVERVIEW STATISTIC BARS-->
					<div class="row-fluid" id="right_column">
						<div class="span8">
							<!-- BEGIN SITE VISITS PORTLET-->
							<!-- BEGIN GENERAL PORTLET-->
							<div class="widget">
								<div class="widget-title">
									<h4>Business Proposal for <?php  ?></h4>
															
								</div>
								<div class="widget-body">
									<div class="row-fluid">
										<div class="span6">
											<div class="alert alert-block alert-info fade in">
										<h4 class="alert-heading">Info!</h4>
										<p>
											This is final business proposal summary for <?php  ?>. 
											At this step, you can either accept or reject this application. If you accept, 
											the system will auto-generate and acceptance letter and send it to the client. 
											If you reject, you will be required to manually draft a rejection letter and send it to the investor.
										</p>
										
									</div>
										</div>
										
									</div>
									<div class="row-fluid">
										 <div class="span6">
											<h3>Project Classification</h3>
											<p>
											<?php echo $project_summary->getBusinessSector() ?>
											</p>
										</div>
										<div class="span6">
											<h3>Name of Company</h3>
											<p>
											<?php echo $project_summary->getInvestmentApplication()->getName() ?>
											</p>
										</div>
									</div>
									<div class="row-fluid">
										
										<div class="span6">
											<h3>Place and Address of Company</h3>
											<p><?php echo $project_summary->getInvestmentApplication()->getLocation() ?></p>
										</div>
										
										<div class="span6">
											<h3>Planned Capital Investment</h3>
											<p><?php echo $project_summary->getPlannedInvestment() ?></p>
										</div>
									</div>
									<div class="row-fluid">
										
										<div class="span6">
											<h3>Employment Created</h3>
											<p><?php echo $project_summary->getEmploymentCreated() ?></p>
											
										</div>
										<div class="span6">
											<h3>Technical Viability</h3>
											<p><?php echo $project_summary->getTechinicalViability() ?></p>
										</div>
									</div>
									<div class="row-fluid">
										<div class="span6">
											<h3>Categories of Jobs Created</h3>
											<p><?php echo $project_summary->getJobCategories() ?></p>
										</div>
										
									</div>
									
									<div class="row-fluid">
										<div class="span6">
											<a href="#<?php //echo url_for('projectSummary/print?id='.$project_summary->getId()) ?>"> <button type="button" class="btn btn-success">Print</button> </a> 
											<a href="<?php echo url_for('projectSummary/edit?id='.$project_summary->getId()) ?>"> 
											<button class="btn btn-primary"><i class="icon-pencil icon-white"></i> Edit</button></a>
											
										</div>
										
									</div>
								</div>
							</div>
							<!-- END GENERAL PORTLET-->
							<!-- END SITE VISITS PORTLET-->
						</div>
						<div class="span4">
							<!-- BEGIN NOTIFICATIONS PORTLET-->
							<div class="widget">
								<div class="widget-title">
									<h4>Actions</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									<a href="#widget-config" data-toggle="modal" class="icon-wrench"></a>
									<a href="javascript:;" class="icon-refresh"></a>
									</span>							
								</div>
								<div class="widget-body">
									<a href="<?php echo url_for('projectSummary/accept?id='.$project_summary->getInvestmentId()) ?>"> <button type="button" class="btn btn-success">Accept Application</button> </a>
									<a href="<?php echo url_for('dashboard/index') ?>"> <button type="button" class="btn btn-danger">Decline Application</button></a>
                                    
                                       									
									
									
									
								</div>
							</div>
							<!-- END NOTIFICATIONS PORTLET-->
						</div>
					</div>


</div>

<div id="page">
    <div id="widget-accept" class="modal hide">
						<div class="modal-header">
							<button data-dismiss="modal" class="close" type="button">×</button>
							<h3><?php echo __('Accept Investor Application') ?></h3>
						</div>
						<div class="modal-body">
							<p><?php echo __('You are About to Accept this Investor application for Issuance of Investment Registration Certificate.')?>.</p>
							<p><?php echo __('To do this you will need permission from the Manager/ Supervisor who assigned this Task.')?>.</p>
							
							
							
							 <?php //we will query for permission for accepting this user application for investment certificate
							  $id = sfContext::getInstance()->getUser()->getGuardUser()->getId();
							  //we query for applicant_reference_number
							   $applicant_reference = Doctrine_Core::getTable('ProjectSummary')->getApplicantReferenceNumber(
							   $project_summary->getInvestmentId());
							   //print "ssss". $applicant_reference; exit;
                               $permission = Doctrine_Core::getTable('InvestmentRequests')->queryAcceptPermission($applicant_reference, $id);
							 ?>
							 
							<?php if(count($permission) == 0): ?>
							<font color="red">
							 <?php //no permission yet
                                echo __('Sorry,Permission not granted. If you have contacted your supervisor please wait
							  as he/she responds to your request. If not please send a message asap. Thank you for understanding') ;
							  
							  ?><br/>
							  <a href="<?php echo url_for('messages/new?value=decline')?> "><button class="btn btn-success"><i class="icon-ok icon-white"></i> <?php echo __('Send Request Message') ?></button></a>
							<?php endif; ?>
							</font> 
							  <?php if(count($permission) != 0): ?>
							      <p><?php echo __('Are you sure about this')?>? </p> <br/>
							      <a href="<?php echo url_for('projectSummary/accept?id='.$project_summary->getInvestmentId()) ?>"><button class="btn btn-warning"><i class="icon-plus icon-white"></i> <?php echo __('Continue') ?></button> </a>
							 <?php endif; ?>
							 &nbsp;&nbsp;&nbsp;
							 <button data-dismiss="modal" class="close" type="button"><?php echo __('Cancel') ?></button>
							
						</div>
	 </div>
	  <div id="widget-decline" class="modal hide">
						<div class="modal-header">
							<button data-dismiss="modal" class="close" type="button">×</button>
							<h3><?php echo __('Decline Investor Application') ?></h3>
						</div>
						<div class="modal-body">
							<p><?php echo __('You are About to Decline this Investor application for Issuance of Investment Registration Certificate.')?>.</p>
							<p><?php echo __('To do this you will need permission from the Manager/ Supervisor who assigned this Task.')?>.</p>
							<p><?php echo __('Are you sure about this')?>? </p>
							
							 <button data-dismiss="modal" class="btn btn-success" type="button"><?php echo __('Request Permission') ?></button>
							 <a href="<?php echo url_for('projectSummary/accept?id='.$project_summary->getInvestmentId()) ?>"><button class="btn btn-warning"><i class="icon-plus icon-white"></i> <?php echo __('Continue') ?></button> </a>&nbsp;&nbsp;&nbsp;
							 <button data-dismiss="modal" class="close" type="button"><?php echo __('Cancel') ?></button>
							
						</div>
	 </div>
 <!-- END OVERVIEW STATISTIC BARS-->
					<div class="row-fluid" id="right_column">
						<div class="span8">
							<!-- BEGIN SITE VISITS PORTLET-->
							<!-- BEGIN GENERAL PORTLET-->
							<div class="widget">
								<div class="widget-title">
									<h4><?php echo __('Business Proposal for') ?> <?php  ?></h4>
															
								</div>
								<div class="widget-body">
									<div class="row-fluid">
										<div class="span6">
											<div class="alert alert-block alert-info fade in">
										<h4 class="alert-heading"><?php echo __('Information') ?>!</h4>
										<p>
											<?php echo __('This is final business proposal summary for Someone. 
											At this step, you can either accept or reject this application. If you accept, 
											the system will auto-generate and acceptance letter and send it to the client. 
											If you reject, you will be required to manually draft a rejection letter and send it to the investor') ?>.
										</p>
										
									</div>
										</div>
										
									</div>
									<div class="row-fluid">
										 <div class="span6">
											<h3><?php echo __('Project Classification') ?></h3>
											<p>
											<?php echo $project_summary->getBusinessSector() ?>
											</p>
										</div>
										<div class="span6">
											<h3><?php echo __('Name of Company') ?></h3>
											<p>
											<?php echo $project_summary->getInvestmentApplication()->getName() ?>
											</p>
										</div>
									</div>
									<div class="row-fluid">
										
										<div class="span6">
											<h3><?php echo __('Place and Address of Company') ?></h3>
											<p><?php echo $project_summary->getInvestmentApplication()->getLocation() ?></p>
										</div>
										
										<div class="span6">
											<h3><?php echo __('Planned Capital Investment') ?></h3>
											<p><?php echo $project_summary->getPlannedInvestment() ?></p>
										</div>
									</div>
									<div class="row-fluid">
										
										<div class="span6">
											<h3><?php echo __('Employment Created') ?></h3>
											<p><?php echo $project_summary->getEmploymentCreated() ?></p>
											
										</div>
										<div class="span6">
											<h3><?php echo __('Technical Viability') ?></h3>
											<p><?php echo $project_summary->getTechinicalViability() ?></p>
										</div>
									</div>
									<div class="row-fluid">
										<div class="span6">
											<h3><?php echo __('Categories of Jobs Created') ?></h3>
											<p><?php echo $project_summary->getJobCategories() ?></p>
										</div>
										
									</div>
									
									<div class="row-fluid">
										<div class="span6">
											<a href="<?php echo url_for('projectSummary/print?id='.$project_summary->getId()) ?>"> <button type="button" class="btn btn-success"><?php echo __('Print') ?></button> </a> 
											<a href="<?php echo url_for('projectSummary/edit?id='.$project_summary->getId()) ?>"> 
											<button class="btn btn-primary"><i class="icon-pencil icon-white"></i><?php echo __('Edit') ?></button></a>
											
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
									<h4><?php echo __('Actions') ?></h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									<a href="#widget-config" data-toggle="modal" class="icon-wrench"></a>
									<a href="javascript:;" class="icon-refresh"></a>
									</span>							
								</div>
								<div class="widget-body">
									<a href="#widget-accept" data-toggle="modal"> <button type="button" class="btn btn-success"><?php echo __('Accept Application') ?></button> </a>
									<a href="#widget-decline" data-toggle="modal"> <button type="button" class="btn btn-danger"><?php echo __('Decline Application') ?></button> </a>
								</div>
							</div>
							<!-- END NOTIFICATIONS PORTLET-->
						</div>
					</div>


</div>

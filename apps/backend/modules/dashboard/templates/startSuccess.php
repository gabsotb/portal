	<?php 
	 //get the business application information
	 foreach($details as $data)
	 {
	  $id = $data['id'];
	  $name = $data['name']; 
	  $exec_summary = $data['executive_summary'];
	  $profile_promoter = $data['promoter_profile'];
	  $project_background = $data['project_background'];
	  $equity_financing = $data['equity_financing'] ;
	  $payback_period = $data['payback_period'];
	  $npv = $data['npv'];
	  $loan_amortization = $data['loan_amortization'];
	  $implementation_plan = $data['implementation_plan'];
	  $notes = $data['notes'];
	  $income_statement = $data['income_statement'];
	  $job_created = $data['job_created'];
	  $job_category = $data['job_category'];
	  $company_legal_nature = $data['company_legal_nature'];
	  $company_representative = $data['company_representative'];
	  $application_letter = $data['application_letter'];
	  $incorporation_certificate = $data['incorporation_certificate'];
	  $shareholding_list = $data['shareholding_list'];
	  $cashflow = $data['cashflow_statement'];
	 }
	?>
	<!-- BEGIN PAGE CONTENT-->
				<div id="page">
					<div class="row-fluid">
					<div class="span4">
							<!-- BEGIN UNORDERED LISTS PORTLET-->
							<div class="widget">
								<div class="widget-title">
									<h4><i class="icon-reorder"></i><?php echo $name; ?> >>> Attachments</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									</span>							
								</div>
								<div class="widget-body">
								 <p>Download These attachment to view and analyze them</p>
									<ul>
										<li><a href ="<?php echo url_for('dashboard/download1?id='.$id)?>">Application Letter</a></li>
										<li>Incorporation Certificate</li>
										<li>Shareholding List</li>
									</ul>
								</div>
							</div>
							<!-- END UNORDERED LISTS PORTLET-->
							<!-- BEGIN ORDERED LISTS PORTLET-->
							<div class="widget">
								
								<div class="widget-body">
									<div class="alert alert-block alert-info fade in">
										<h4 class="alert-heading">Hint</h4>
										<p>
											You are now processing application for investment certificate for  <font color="red">
											<?php echo $name; ?></font>. 
										</p>
										<p>Download the attachments and read the business proposal on the left side of your screen.
										When done Click on the Make report button to generate a business proposal summary.</p>
										
									</div>
								</div>
							</div>
							<!-- END ORDERED LISTS PORTLET-->
						</div>
						<div class="span8" id="right_column">
						
							<!-- BEGIN GENERAL PORTLET-->
							<div class="widget">
								<div class="widget-title">
									<h4>Business Proposal for <?php echo $name; ?></h4>
															
								</div>
								<div class="widget-body">
									<div class="row-fluid">
										<div class="span6">
											<div class="alert alert-block alert-info fade in">
										<h4 class="alert-heading">Info!</h4>
										<p>
											This is the business proposal for <?php echo $name; ?>. Please Read it Carefully before generating report.
										</p>
										
									</div>
										</div>
										
									</div>
									<div class="row-fluid">
										 <div class="span6">
											<h3>Executive Summary</h3>
											<p>
											<?php echo $exec_summary ;?>
											</p>
										</div>
										<div class="span6">
											<h3>Profile of Project Promoter</h3>
											<p>
											<?php echo $profile_promoter ;?>
											</p>
										</div>
									</div>
									<div class="row-fluid">
										<div class="span6">
											<h3>Project Background</h3>
											<p><?php echo $project_background; ?></p>
										</div>
										<div class="span6">
											<h3>Market Study/Analysis</h3>
											<p><?php ?></p>
										</div>
									</div>
									<div class="row-fluid">
										
										<div class="span6">
											<h3>Investment Plan for 5 years</h3>
											<p><?php echo $implementation_plan; ?></p>
										</div>
										<div class="span6">
											<h3>Loan and Equity Financing Levels</h3>
											<p><?php echo $loan_amortization ;?></p>
											<p><?php  echo $equity_financing; ?></p>
										</div>
									</div>
									<div class="row-fluid">
										<div class="span6">
											<h3>Statements on Income and Expenditure</h3>
											<p><?php echo $income_statement; ?></p>
										</div>
										<div class="span6">
											<h3>Project Balance Sheet 5 years</h3>
											<p><?php ?></p>
										</div>
									</div>
									<div class="row-fluid">
										<div class="span6">
											<h3>Project Statements on Cash Flow 5yrs</h3>
											<p><?php echo $cashflow; ?></p>
										</div>
										<div class="span6">
											<h3>Payback period(NPV and IRR)</h3>
											<p><?php echo $npv; ?></p>
										</div>
									</div>
									<div class="row-fluid">
										<div class="span6">
											<h3>Loan Amortization Schedule</h3>
											<p><?php echo $loan_amortization ?></p>
										</div>
										<div class="span6">
											<h3>Project Implementation Plan</h3>
											<p><?php echo $implementation_plan; ?></p>
										</div>
									</div>
									<div class="row-fluid">
										<div class="span6">
											<h3>Company Legal Nature and Representatives</h3>
											<p><?php echo $company_legal_nature; ?></p>
											<p><?php echo $company_representative; ?></p>
										</div>
										<div class="span6">
											<h3>Jobs Created and Categories</h3>
											<p><?php echo $job_category ?></p>
											<p><?php echo $job_created ?></p>
										</div>
									</div>
									<div class="row-fluid">
										<div class="span6">
											<h3>Applicant Details:</h3>
											<div class="well">
												<address>
													<strong>Registered Company Name </strong><br />
													<a href="#"><?php echo   $name ; ?></a>
												</address>
											</div>
											<button type="button" class="btn btn-primary">Print Proposal</button>
										</div>
										<div class="span6">
											<a href="<?php echo url_for('projectSummary/new?id='.$id) ?>"> <button type="button" class="btn btn-success">Make Report</button> </a>
											<a href="<?php echo url_for('dashboard/index') ?>"> <button type="button" class="btn btn-danger">Cancel</button></a>	
										</div>
										
									</div>
								</div>
							</div>
							<!-- END GENERAL PORTLET-->
						</div>
						
					</div>
					<!--END:BODY-->
				</div>
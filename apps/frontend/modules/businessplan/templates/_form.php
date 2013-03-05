<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form class="" action="<?php echo url_for('businessplan/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
  <table class="table table-striped table-bordered">
		
    <tbody>
		 
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['investment_id']->render() ?>
				</div>
			</div>
		</div> 
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
				     <span> <label class="control-label"><?php echo $form['project_brief']->renderLabel() ?>
					 <?php echo $form['project_brief']->renderError() ?>
					 </label></span>
					 
					<?php echo $form['project_brief']->render(array('class' => 'span12 wysihtml5' ,'rows' => '10'))?>
				</div>
			</div>
		</div>
		<!-- -->
		<div class="control-group">
		  <div class="widget">
				<div>
				                   <div class="alert alert-block alert-info">
										<p>
											<span>INVESTMENT AND FINANCIAL SCHEDULE</span>
										</p>
								    </div>
										<table  class="table table-bordered table-hover">
										<thead>
											<tr class="alert-block alert-success">
												<th>Fixed Cost Amount</th>
												<th>Year 1</th>
												<th>Year 2</th>
												<th>Year 3</th>
												<th>Year 4</th>
												<th>Year 5</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Land</td>
												<td>
												<?php echo $form['land_year1']->renderError() ?>
												<div class="input-prepend input-append">
												   <span class="add-on">$</span><?php echo $form['land_year1']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span>
												</div>
												
												</td>
												<td><?php echo $form['land_year2']->renderError() ?>
												<div class="input-prepend input-append">
												<span class="add-on">$</span><?php echo $form['land_year2']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span>
												</div>
												</td>
												<td><?php echo $form['land_year3']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['land_year3']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['land_year4']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['land_year4']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['land_year5']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['land_year5']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
											</tr>
											<tr>
												<td>Construction</td>
												<td><?php echo $form['construction_year1']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['construction_year1']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['construction_year2']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['construction_year2']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['construction_year3']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['construction_year3']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['construction_year4']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['construction_year4']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['construction_year5']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['construction_year5']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
											</tr>
											<tr>
												<td>Plant and Machinery</td>
												<td><?php echo $form['machinery_year1']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['machinery_year1']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td> <?php echo $form['machinery_year2']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['machinery_year2']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['machinery_year3']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['machinery_year3']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['machinery_year4']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['machinery_year4']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['machinery_year5']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['machinery_year5']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
											</tr>
											<tr>
												<td>Furniture</td>
											<td><?php echo $form['furniture_year1']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['furniture_year1']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['furniture_year2']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['furniture_year2']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['furniture_year3']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['furniture_year3']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['furniture_year4']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['furniture_year4']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['furniture_year5']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['furniture_year5']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
											</tr>
											<tr>
												<td>Other Fixed Cost</td>
												<td><?php echo $form['other_assets1']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['other_assets1']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['other_assets2']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['other_assets2']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['other_assets3']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['other_assets3']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['other_assets4']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['other_assets4']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['other_assets5']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['other_assets5']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
											</tr>
										</tbody>
									</table> 
									
									
		                        
							 </div>
                           
					</div>
					   <div class="widget">
						 <div class="widget-body">	
                                    <div class="alert alert-block alert-info fade in">
										<p>
											<span>START UP EXPENSES</span>
										</p>
								    </div>						 
							    
								<table  class="table table-bordered table-hover">
										<thead>
											<tr class="alert-block alert-success">
												<th>Amount</th>
												<th>Year 1</th>
												<th>Year 2</th>
												<th>Year 3</th>
												<th>Year 4</th>
												<th>Year 5</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Studies</td>
												<td><?php echo $form['studies_year1']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['studies_year1']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['studies_year2']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['studies_year2']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['studies_year3']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['studies_year3']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['studies_year4']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['studies_year4']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['studies_year5']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['studies_year5']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
											</tr>
											<tr>
												<td>Travel Expenses</td>
												<td><?php echo $form['travel_expenses1']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['travel_expenses1']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['travel_expenses2']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['travel_expenses2']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['travel_expenses3']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['travel_expenses3']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['travel_expenses4']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['travel_expenses4']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['travel_expenses5']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['travel_expenses5']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
											</tr>
											<tr>
												<td>Starting Capital</td>
												<td><?php echo $form['starting_capital1']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['starting_capital1']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['starting_capital2']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['starting_capital2']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['starting_capital3']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['starting_capital3']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['starting_capital4']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['starting_capital4']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['starting_capital5']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['starting_capital5']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
											</tr>
											<tr>
												<td>Administrative & License Expense</td>
											<td><?php echo $form['licensing_expenses1']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['licensing_expenses1']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['licensing_expenses2']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['licensing_expenses2']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['licensing_expenses3']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['licensing_expenses3']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['licensing_expenses4']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['licensing_expenses4']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['licensing_expenses5']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['licensing_expenses5']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
											</tr>
											<tr>
												<td>Rental Fees</td>
												<td><?php echo $form['rental_fees1']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['rental_fees1']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['rental_fees2']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['rental_fees2']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['rental_fees3']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['rental_fees3']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['rental_fees4']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['rental_fees4']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['rental_fees5']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['rental_fees5']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
											</tr>
											<tr>
												<td>Others</td>
												<td><?php echo $form['other_expeses1']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['other_expeses1']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['other_expeses2']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['other_expeses2']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['other_expeses3']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['other_expeses3']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['other_expeses4']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['other_expeses4']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['other_expeses5']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['other_expeses5']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
											</tr>
										</tbody>
									</table> 
									</table>
							</div>	
                       </div>	 							
								  
			<!--- -----------------------------------------------------------------       --->
		    <div class="widget">
						 <div class="widget-body">	
                                	<div class="alert alert-block alert-info fade in">
										<p>
											 <span>FINANCIAL STRUCTURE</span>
										</p>
								    </div>		 
							   
								<table  class="table table-bordered table-hover">
										<thead>
											<tr class="alert-block alert-success">
												<th>Origin of Financing</th>
												<th>Foreign Source</th>
												<th>Local Source</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Equity</td>
												<td><?php echo $form['equity_local']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['equity_local']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['equity_foregin']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['equity_foregin']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												
											</tr>
											<tr>
												<td>Loan From Bank</td>
												<td><?php echo $form['bank_loan_local']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['bank_loan_local']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['bank_loan_local']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['bank_loan_foreign']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												
											</tr>
											<tr>
												<td>Loan From Mother Company</td>
												<td><?php echo $form['mother_company_loan_local']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['mother_company_loan_local']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['mother_company_loan_foreign']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['mother_company_loan_foreign']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												
											</tr>
											<tr>
												<td>Grant</td>
											    <td><?php echo $form['grant_local']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['grant_local']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['grant_local']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['grant_foreign']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												
											</tr>
										</tbody>
									</table> 
									</table>
							</div>	
                       </div>	
		   <!--- --------------------------------------------------------------------- --->	
              <div class="widget">
						 <div class="widget-body">	
                                <div class="alert alert-block alert-info fade in">
										<p>
											 <span>EMPLOYMENT DETAILS - Please Enter number of jobs</span>
										</p>
								    </div>							 
							    
								<table  class="table table-bordered table-hover">
										<thead>
											<tr class="alert-block alert-success">
												<th>Category - Local Jobs</th>
												<th>Year 1</th>
												<th>Year 2</th>
												<th>Year 3</th>
												<th>Year 4</th>
												<th>Year 5</th>
												
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Top Management</td>
												<td><?php echo $form['top_management_local1']->renderError() ?><?php echo $form['top_management_local1']->render(array('class' => 'input-small')) ?></td>
												<td><?php echo $form['top_management_local2']->renderError() ?><?php echo $form['top_management_local2']->render(array('class' => 'input-small')) ?></td>
												<td><?php echo $form['top_management_local3']->renderError() ?><?php echo $form['top_management_local3']->render(array('class' => 'input-small')) ?></td>
												<td><?php echo $form['top_management_local4']->renderError() ?><?php echo $form['top_management_local4']->render(array('class' => 'input-small')) ?></td>
												<td><?php echo $form['top_management_local5']->renderError() ?><?php echo $form['top_management_local5']->render(array('class' => 'input-small')) ?></td>
											</tr>
											<tr>
												<td>Technical/Professional</td>
												<td><?php echo $form['technical_professional_local1']->renderError() ?><?php echo $form['technical_professional_local1']->render(array('class' => 'input-small')) ?></td>
												<td><?php echo $form['technical_professional_local2']->renderError() ?><?php echo $form['technical_professional_local2']->render(array('class' => 'input-small')) ?></td>
												<td><?php echo $form['technical_professional_local3']->renderError() ?><?php echo $form['technical_professional_local3']->render(array('class' => 'input-small')) ?></td>
												<td><?php echo $form['technical_professional_local4']->renderError() ?><?php echo $form['technical_professional_local4']->render(array('class' => 'input-small')) ?></td>
												<td><?php echo $form['technical_professional_local5']->renderError() ?><?php echo $form['technical_professional_local5']->render(array('class' => 'input-small')) ?></td>
											</tr>
											<tr>
												<td>Skilled labour</td>
												<td><?php echo $form['skilled_labour_local1']->renderError() ?><?php echo $form['skilled_labour_local1']->render(array('class' => 'input-small')) ?></td>
												<td><?php echo $form['skilled_labour_local2']->renderError() ?><?php echo $form['skilled_labour_local2']->render(array('class' => 'input-small')) ?></td>
												<td><?php echo $form['skilled_labour_local3']->renderError() ?><?php echo $form['skilled_labour_local3']->render(array('class' => 'input-small')) ?></td>
												<td><?php echo $form['skilled_labour_local4']->renderError() ?><?php echo $form['skilled_labour_local4']->render(array('class' => 'input-small')) ?></td>
												<td><?php echo $form['skilled_labour_local5']->renderError() ?><?php echo $form['skilled_labour_local5']->render(array('class' => 'input-small')) ?></td>
											</tr>
											<tr>
												<td>Others (manpower, casual to precise)</td>
											    <td><?php echo $form['other_jobs_local1']->renderError() ?><?php echo $form['other_jobs_local1']->render(array('class' => 'input-small')) ?></td>
												<td><?php echo $form['other_jobs_local2']->renderError() ?><?php echo $form['other_jobs_local2']->render(array('class' => 'input-small')) ?></td>
												<td><?php echo $form['other_jobs_local3']->renderError() ?><?php echo $form['other_jobs_local3']->render(array('class' => 'input-small')) ?></td>
												<td><?php echo $form['other_jobs_local4']->renderError() ?><?php echo $form['other_jobs_local4']->render(array('class' => 'input-small')) ?></td>
												<td><?php echo $form['other_jobs_local5']->renderError() ?><?php echo $form['other_jobs_local5']->render(array('class' => 'input-small')) ?></td>
											</tr>
										</tbody>
									</table> 
										<table  class="table table-bordered table-hover">
										<thead>
											<tr>
												<th>Category- Expatriate Jobs</th>
												<th>Year 1</th>
												<th>Year 2</th>
												<th>Year 3</th>
												<th>Year 4</th>
												<th>Year 5</th>
												
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Top Management</td>
												<td><?php echo $form['top_management_foreign1']->renderError() ?><?php echo $form['top_management_foreign1']->render(array('class' => 'input-small')) ?></td>
												<td><?php echo $form['top_management_foreign2']->renderError() ?><?php echo $form['top_management_foreign2']->render(array('class' => 'input-small')) ?></td>
												<td><?php echo $form['top_management_foreign3']->renderError() ?><?php echo $form['top_management_foreign3']->render(array('class' => 'input-small')) ?></td>
												<td><?php echo $form['top_management_foreign4']->renderError() ?><?php echo $form['top_management_foreign4']->render(array('class' => 'input-small')) ?></td>
												<td><?php echo $form['top_management_foreign5']->renderError() ?><?php echo $form['top_management_foreign5']->render(array('class' => 'input-small')) ?></td>
											</tr>
											<tr>
												<td>Technical/Professional</td>
												<td><?php echo $form['technical_professional_foreign1']->renderError() ?><?php echo $form['technical_professional_foreign1']->render(array('class' => 'input-small')) ?></td>
												<td><?php echo $form['technical_professional_foreign2']->renderError() ?><?php echo $form['technical_professional_foreign2']->render(array('class' => 'input-small')) ?></td>
												<td><?php echo $form['technical_professional_foreign3']->renderError() ?><?php echo $form['technical_professional_foreign3']->render(array('class' => 'input-small')) ?></td>
												<td><?php echo $form['technical_professional_foreign4']->renderError() ?><?php echo $form['technical_professional_foreign4']->render(array('class' => 'input-small')) ?></td>
												<td><?php echo $form['technical_professional_foreign5']->renderError() ?><?php echo $form['technical_professional_foreign5']->render(array('class' => 'input-small')) ?></td>
											</tr>
											<tr>
												<td>Skilled labour</td>
												<td><?php echo $form['skilled_labour_foreign1']->renderError() ?><?php echo $form['skilled_labour_foreign1']->render(array('class' => 'input-small')) ?></td>
												<td><?php echo $form['skilled_labour_foreign2']->renderError() ?><?php echo $form['skilled_labour_foreign2']->render(array('class' => 'input-small')) ?></td>
												<td><?php echo $form['skilled_labour_foreign3']->renderError() ?><?php echo $form['skilled_labour_foreign3']->render(array('class' => 'input-small')) ?></td>
												<td><?php echo $form['skilled_labour_foreign4']->renderError() ?><?php echo $form['skilled_labour_foreign4']->render(array('class' => 'input-small')) ?></td>
												<td><?php echo $form['skilled_labour_foreign5']->renderError() ?><?php echo $form['skilled_labour_foreign5']->render(array('class' => 'input-small')) ?></td>
											</tr>
											<tr>
												<td>Others (manpower, casual to precise)</td>
											    <td><?php echo $form['other_jobs_foreign1']->renderError() ?><?php echo $form['other_jobs_foreign1']->render(array('class' => 'input-small')) ?></td>
												<td><?php echo $form['other_jobs_foreign2']->renderError() ?><?php echo $form['other_jobs_foreign2']->render(array('class' => 'input-small')) ?></td>
												<td><?php echo $form['other_jobs_foreign3']->renderError() ?><?php echo $form['other_jobs_foreign3']->render(array('class' => 'input-small')) ?></td>
												<td><?php echo $form['other_jobs_foreign4']->renderError() ?><?php echo $form['other_jobs_foreign4']->render(array('class' => 'input-small')) ?></td>
												<td><?php echo $form['other_jobs_foreign5']->renderError() ?><?php echo $form['other_jobs_foreign5']->render(array('class' => 'input-small')) ?></td>
											</tr>
										</tbody>
									</table> 
									
							</div>	
                       </div>
            <!--- -----------------------------------------------------------------       --->
		      <div class="widget">
						 <div class="widget-body">
                                  <div class="alert alert-block alert-info fade in">
										<p>
											<span>PLANNED COMPANY PERFORMANCE</span>
										</p>
								    </div>							 
							    
								<table  class="table table-bordered table-hover">
										<thead>
											<tr class="alert-block alert-success">
												<th></th>
												<th>Year 1</th>
												<th>Year 2</th>
												<th>Year 3</th>
												<th>Year 4</th>
												<th>Year 5</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Sales/Income</td>
												<td><?php echo $form['sales_income1']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['sales_income1']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['sales_income2']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['sales_income2']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['sales_income3']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['sales_income3']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['sales_income4']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['sales_income4']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['sales_income5']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['sales_income5']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
											</tr>
											<tr>
												<td>Total cost of sales</td>
												<td><?php echo $form['total_cost_sales1']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['total_cost_sales1']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['total_cost_sales2']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['total_cost_sales2']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['total_cost_sales3']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['total_cost_sales3']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['total_cost_sales4']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['total_cost_sales4']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['total_cost_sales5']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['total_cost_sales5']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
											</tr>
											<tr>
												<td>Gross Profit</td>
												<td><?php echo $form['gross_profit1']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['gross_profit1']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['gross_profit2']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['gross_profit2']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['gross_profit3']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['gross_profit3']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['gross_profit4']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['gross_profit4']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['gross_profit5']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['gross_profit5']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
											</tr>
											<tr>
												<td>Total Indirect Expenses</td>
											<td><?php echo $form['indirect_expenses1']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['indirect_expenses1']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['indirect_expenses2']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['indirect_expenses2']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['indirect_expenses3']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['indirect_expenses3']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['indirect_expenses4']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['indirect_expenses4']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['indirect_expenses5']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['indirect_expenses5']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
											</tr>
											<tr>
												<td>Profit Before Tax</td>
												<td><?php echo $form['profit_before_tax1']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['profit_before_tax1']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['profit_before_tax2']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['profit_before_tax2']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['profit_before_tax3']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['profit_before_tax3']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['profit_before_tax4']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['profit_before_tax4']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['profit_before_tax5']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['profit_before_tax5']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
											</tr>
											<tr>
												<td>Tax Expenses(30%)</td>
												<td><?php echo $form['tax_expenses1']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['tax_expenses1']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['tax_expenses2']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['tax_expenses2']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['tax_expenses3']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['tax_expenses3']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['tax_expenses4']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['tax_expenses4']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['tax_expenses5']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['tax_expenses5']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
											</tr>
											<tr>
												<td>Net Profit</td>
												<td><?php echo $form['net_profit1']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['net_profit1']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['net_profit2']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['net_profit2']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['net_profit3']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['net_profit3']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['net_profit4']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['net_profit4']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
												<td><?php echo $form['net_profit5']->renderError() ?><div class="input-prepend input-append"><span class="add-on">$</span><?php echo $form['net_profit5']->render(array('class' => 'input-small')) ?><span class="add-on">.00</span></div></td>
											</tr>
										</tbody>
									</table> 
									
							</div>	
                       </div>	
					    <div class="control-group">
						   <div class="widget">
						                <div class="alert alert-block alert-info fade in">
										<p>
											<span>APPLIED FOR INCENTIVES</span>
										</p>
								    </div>	
										 <div class="widget-body">	
									        <table class="table table-bordered table-hover">
												
												<tbody>
													<tr>
														<td>Exemptions On Imported Machinery(Attach List)
														<?php echo $form['exemption_on_machinery']->renderError() ?>
														</td>
														<td> <?php echo $form['exemption_on_machinery']->render(array('class' => 'default')) ?></td>
													</tr>
													<tr>
														<td>Exemptions On Imported Raw Materials(Describe Nature)</td>
														<td><?php echo $form['exemption_raw_materials']->render(array('class' => 'span12 wysihtml5' ,'rows' => '10')) ?></td>
													</tr>
													<tr>
													 <td>Exemptions On Imported Building Materials(Please Attach Following documents) </td>
													 <td><span>Land OwnerShip Document:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $form['land_ownership_document']->render(array('class' => 'default')) ?><br/>
													 <span>Approved Bill of Quantities by District:</span>&nbsp;&nbsp;<?php echo $form['bill_of_quantiy']->render(array('class' => 'default')) ?> <br/>
													 <span>Drawings:</span>
													 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													 
													 <?php echo $form['drawings']->render(array('class' => 'default')) ?><br/>
													  <span>Construction Permits:</span>
													  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													  <?php echo $form['construction_permits']->render(array('class' => 'default')) ?><br/>
													 </td>
													</tr>
													<tr>
													  <td>Investment Allowances</td>
													  <td><?php echo $form['investment_allowances']->render() ?></td>
													</tr>
													<tr>
													 <td>Additional Incentives(Precise Nature)</td>
														<td><?php echo $form['additional_incentives']->render(array('class' => 'span12 wysihtml5' ,'rows' => '10')) ?></td>
													</tr>
													<tr>
													 <td>Visa and Work permits and fist arrival privileges forexpatriates (precise names, skills and citizenship)</td>
														<td><?php echo $form['visa_work_permits']->render(array('class' => 'span12 wysihtml5' ,'rows' => '10')) ?></td>
													</tr>
												</tbody>
									       </table>
										    
										
										</div>
							</div>
				
		               </div>
		  			 
								 
				</div>				
		     <!--- --------------------------------------------------------------------- --->	
            
            <!--- -----------------------------------------------------------------       --->
		    
		   <!--- --------------------------------------------------------------------- --->	
		
		
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					
					<?php echo $form->renderHiddenFields(); ?>
				</div>
			</div>
		</div>
     
      <tfoot>
      <tr>
	  
	    <?php if (!$form->getObject()->isNew()): ?>
		<input type="hidden" name="sf_method" value="put" />
		<?php endif; ?>
	  
        <td colspan="2">
          <!--&nbsp;<a href="<?php //echo url_for('businessplan/index') ?>">Back to list</a> -->
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'businessplan/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input class="btn btn-primary" type="submit" value="Submit" />
        </td>
      </tr>
    </tfoot>               
     
		
    </tbody>
  </table>
</form>

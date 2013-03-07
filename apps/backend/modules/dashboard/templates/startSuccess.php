	<?php 
	 //get the business application information
	 foreach($details as $data)
	 {
	  $id = $data['id'];
	  $name = $data['name']; 
	  $project_brief = $data['project_brief'];
	  $business_name = $data['name'];
	  $business_nature = $data['business_sector'];
	  $business_category = $data['business_category'];
	  $office_telephone = $data['office_telephone'];
	  $fax = $data['fax'];
	  $post_box = $data['post_box'];
	  $location = $data['location'];
	  $sector = $data['sector'];
	  $district = $data['district'];
	  $city_province = $data['city_province'];
	  //Variables for the table land costs
	  $land_year1 = $data['land_year1'];
	  $land_year2 = $data['land_year2'];
	  $land_year3 = $data['land_year3'];
	  $land_year4 = $data['land_year4'];
	  $land_year5 = $data['land_year5'];
	  //Construction Variables
	  $construction_year1 = $data['construction_year1'];
	  $construction_year2 = $data['construction_year2'];
	  $construction_year3 = $data['construction_year3'];
	  $construction_year4 = $data['construction_year4'];
	  $construction_year5 = $data['construction_year5'];
	  //Plant and Machinery variables
	  $machinery_year1 = $data['machinery_year1'];
	  $machinery_year2 = $data['machinery_year2'];
	  $machinery_year3 = $data['machinery_year3'];
	  $machinery_year4 = $data['machinery_year4'];
	  $machinery_year5 = $data['machinery_year5'];
	  //Furniture variables
	  $furniture_year1 = $data['furniture_year1'];
	  $furniture_year2 = $data['furniture_year2'];
	  $furniture_year3 = $data['furniture_year3'];
	  $furniture_year4 = $data['furniture_year4'];
	  $furniture_year5 = $data['furniture_year5'];
	  //Assets variables
	  $other_assets1 = $data['other_assets1'];
	  $other_assets2 = $data['other_assets2'];
	  $other_assets3 = $data['other_assets3'];
	  $other_assets4 = $data['other_assets4'];
	  $other_assets5 = $data['other_assets5'];
	 /////////////////////////////////////////////////////
	 //studies variables
	 $studies_year1 = $data['studies_year1'];
	 $studies_year2 = $data['studies_year2'];
	 $studies_year3 = $data['studies_year3'];
	 $studies_year4 = $data['studies_year4'];
	 $studies_year5 = $data['studies_year5'];
	 //travel expense variables
	 $travel_expense1 = $data['travel_expenses1'];
	 $travel_expense2 = $data['travel_expenses2'];
	 $travel_expense3 = $data['travel_expenses3'];
	 $travel_expense4 = $data['travel_expenses4'];
	 $travel_expense5 = $data['travel_expenses5'];
	 //starting capital expenses
	 $starting_capital1 = $data['starting_capital1'];
	 $starting_capital2 = $data['starting_capital2'];
	 $starting_capital3 = $data['starting_capital3'];
	 $starting_capital4 = $data['starting_capital4'];
	 $starting_capital5 = $data['starting_capital5'];
	 ///licensing expenses
	 $licensing_expenses1 = $data['licensing_expenses1'];
	 $licensing_expenses2 = $data['licensing_expenses2'];
	 $licensing_expenses3 = $data['licensing_expenses3'];
	 $licensing_expenses4 = $data['licensing_expenses4'];
	 $licensing_expenses5 = $data['licensing_expenses5'];
	 //rental fees
	 $rental_fees1 = $data['rental_fees1'];
	 $rental_fees2 = $data['rental_fees2'];
	 $rental_fees3 = $data['rental_fees3'];
	 $rental_fees4 = $data['rental_fees4'];
	 $rental_fees5 = $data['rental_fees5'];
	 //other expenses
	 $other_expeses1 = $data['other_expeses1'];
	 $other_expeses2 = $data['other_expeses2'];
	 $other_expeses3 = $data['other_expeses3'];
	 $other_expeses4 = $data['other_expeses4'];
	 $other_expeses5 = $data['other_expeses5'];
	 /////////////////////////////////////////////////
	 //equity variables
	 $equity_local = $data['equity_local'];
	 $equity_foregin = $data['equity_foregin'];
	 //bank_loan_local
	 $bank_loan_local = $data['bank_loan_local'];
	 $bank_loan_foreign = $data['bank_loan_foreign'];
	 //mother_company_loan_local
	 $mother_company_loan_local = $data['mother_company_loan_local'];
	 $mother_company_loan_foreign = $data['mother_company_loan_foreign'];
	 //grant_local
	 $grant_local = $data['grant_local'];
	 $grant_foreign = $data['grant_foreign'];
	//////////////////////////////////////////////////////
	//jobs local variables
	 $top_management_local1 = $data['top_management_local1'];	
	 $top_management_local2 = $data['top_management_local2'];
	 $top_management_local3 = $data['top_management_local3'];
	 $top_management_local4 = $data['top_management_local4'];
	 $top_management_local5 = $data['top_management_local5'];
	 ///
	 $technical_professional_local1 = $data['technical_professional_local1'];
	 $technical_professional_local2 = $data['technical_professional_local2'];
	 $technical_professional_local3 = $data['technical_professional_local3'];
	 $technical_professional_local4 = $data['technical_professional_local4'];
	 $technical_professional_local5 = $data['technical_professional_local5'];
	 //
	 $skilled_labour_local1 = $data['skilled_labour_local1'];
	 $skilled_labour_local2 = $data['skilled_labour_local2'];
	 $skilled_labour_local3 = $data['skilled_labour_local3'];
	 $skilled_labour_local4 = $data['skilled_labour_local4'];
	 $skilled_labour_local5 = $data['skilled_labour_local5'];
	 //
	 $other_jobs_local1 = $data['other_jobs_local1'];
	 $other_jobs_local2 = $data['other_jobs_local2'];
	 $other_jobs_local3 = $data['other_jobs_local3'];
	 $other_jobs_local4 = $data['other_jobs_local4'];
	 $other_jobs_local5 = $data['other_jobs_local5'];
	 //jobs foreign variables
	 $top_management_foreign1 = $data['top_management_foreign1'];
	 $top_management_foreign2 = $data['top_management_foreign2'];
	 $top_management_foreign3 = $data['top_management_foreign3'];
	 $top_management_foreign4 = $data['top_management_foreign4'];
	 $top_management_foreign5 = $data['top_management_foreign5'];
	 //
	 $technical_professional_foreign1 = $data['technical_professional_foreign1'];
	 $technical_professional_foreign2 = $data['technical_professional_foreign2'];
	 $technical_professional_foreign3 = $data['technical_professional_foreign3'];
	 $technical_professional_foreign4 = $data['technical_professional_foreign4'];
	 $technical_professional_foreign5 = $data['technical_professional_foreign5'];
	  //
	 $skilled_labour_foreign1 = $data['skilled_labour_foreign1'];
	 $skilled_labour_foreign2 = $data['skilled_labour_foreign2'];
	 $skilled_labour_foreign3 = $data['skilled_labour_foreign3'];
	 $skilled_labour_foreign4 = $data['skilled_labour_foreign4'];
	 $skilled_labour_foreign5 = $data['skilled_labour_foreign5'];
	 //
	 $other_jobs_foreign1 = $data['other_jobs_local1'];
	 $other_jobs_foreign2 = $data['other_jobs_foreign2'];
	 $other_jobs_foreign3 = $data['other_jobs_foreign3'];
	 $other_jobs_foreign4 = $data['other_jobs_foreign4'];
	 $other_jobs_foreign5 = $data['other_jobs_foreign5'];
	 /////////////////////////////////////////
	 $sales_income1 = $data['sales_income1'];
	 $sales_income2 = $data['sales_income2'];
	 $sales_income3 = $data['sales_income3'];
	 $sales_income4 = $data['sales_income4'];
	 $sales_income5 = $data['sales_income5'];
	 //////
	 $total_cost_sales1 = $data['total_cost_sales1'];
	 $total_cost_sales2 = $data['total_cost_sales2'];
	 $total_cost_sales3 = $data['total_cost_sales3'];
	 $total_cost_sales4 = $data['total_cost_sales4'];
	 $total_cost_sales5 = $data['total_cost_sales5'];
	 ///
	 $gross_profit1 = $data['gross_profit1'];
	 $gross_profit2 = $data['gross_profit2'];
	 $gross_profit3 = $data['gross_profit3'];
	 $gross_profit4 = $data['gross_profit4'];
	 $gross_profit5 = $data['gross_profit5'];
	 /////
	 $indirect_expense1 = $data['indirect_expenses1'];
	 $indirect_expense2 = $data['indirect_expenses2'];
	 $indirect_expense3 = $data['indirect_expenses3'];
	 $indirect_expense4 = $data['indirect_expenses4'];
     $indirect_expense5 = $data['indirect_expenses5'];
	 ///
	 $profit_before_tax1 = $data['profit_before_tax1'];
	 $profit_before_tax2 = $data['profit_before_tax2'];
	 $profit_before_tax3 = $data['profit_before_tax3'];
	 $profit_before_tax4 = $data['profit_before_tax4'];
	 $profit_before_tax5 = $data['profit_before_tax5'];
	 ////
	 $tax_expenses1 = $data['tax_expenses1'];
	 $tax_expenses2 = $data['tax_expenses2'];
	 $tax_expenses3 = $data['tax_expenses3'];
	 $tax_expenses4 = $data['tax_expenses4'];
	 $tax_expenses5 = $data['tax_expenses5'];
	 //
	 $net_profit1 = $data['net_profit1'];
	 $net_profit2 = $data['net_profit2'];
	 $net_profit3 = $data['net_profit3'];
	 $net_profit4 = $data['net_profit4'];
	 $net_profit5 = $data['net_profit5'];
	 }
	?>
	<!-- BEGIN PAGE CONTENT-->
				<div id="page">
					<div class="row-fluid">
					<div class="span4">
							<!-- BEGIN UNORDERED LISTS PORTLET-->
							<div class="widget">
								<div class="widget-title">
									<h4><i class="icon-reorder"></i><?php echo $name; ?> >>Attached by Applicant</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									</span>							
								</div>
								<div class="widget-body">
								 <p>Download These attachment to view and analyze them</p>
									<ul>
										<li><a href ="<?php echo url_for('dashboard/download1?id='.$id)?>">Exemption on imported machinery(List of Items) </a></li>
										<li><a href ="<?php echo url_for('dashboard/download2?id='.$id)?>">Exemption on raw materials(List of Items) </a></li>
										<li><a href ="<?php echo url_for('dashboard/download3?id='.$id)?>">Land Ownership Document</a></li>
										<li><a href ="<?php echo url_for('dashboard/download4?id='.$id)?>">Bill of Quantity  </a></li>
										<li><a href ="<?php echo url_for('dashboard/download5?id='.$id)?>">Drawings Document </a></li>
										<li><a href ="<?php echo url_for('dashboard/download6?id='.$id)?>">Construction Permit </a></li>
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
										 <div class="span10">
										  <div class="widget">
										      <div class="widget-body">
												<h3>Project Brief</h3>
												<p>
												<?php echo $project_brief; ?>
												</p>
											</div>
										</div>	
										</div>
									</div>
								    <div class="row-fluid">
										 <div class="span10">
										  <div class="widget">
										      <div class="widget-title">
												<h4><i class="icon-reorder"></i>Applicant Personal Details</h4>
												<span class="tools">
												<a href="javascript:;" class="icon-chevron-down"></a>
												<a href="javascript:;" class="icon-refresh"></a>		
												</span>							
											  </div>
										      <div class="widget-body">
												 <ul class="item-list scroller padding" data-height="307" data-always-visible="1">
												   <li>
													<span class="label label-success"><i class="icon-bell"></i></span>
													<span>Full Names: </span>
													<span>Boniface Irunguh</span>
												  </li>
												   <li>
													<span class="label label-success"><i class="icon-bell"></i></span>
													<span>Title in the company: </span>
													<span>Manager</span>
												  </li>
												   <li>
													<span class="label label-success"><i class="icon-bell"></i></span>
													<span>Citizenship: </span>
													<span>Kenyan</span>
												  </li>
												   <li>
													<span class="label label-success"><i class="icon-bell"></i></span>
													<span>Telephone (mobile): </span>
													<span>+254712122743</span>
												  </li>
												  <li>
													<span class="label label-success"><i class="icon-bell"></i></span>
													<span>Fax: </span>
													<span>3434</span>
												  </li>
												   <li>
													<span class="label label-success"><i class="icon-bell"></i></span>
													<span>Personal E-mail: </span>
													<span>Mwendia.bonface4@gmail.com</span>
												  </li>
												  </ul>
											  </div>
										</div>	
										</div>
									</div> 
								   <div class="row-fluid">
										 <div class="span10">
										  <div class="widget">
										      <div class="widget-title">
												<h4><i class="icon-reorder"></i>Company Details</h4>
												<span class="tools">
												<a href="javascript:;" class="icon-chevron-down"></a>
												<a href="javascript:;" class="icon-refresh"></a>		
												</span>							
											  </div>
										      <div class="widget-body">
												 <ul class="item-list scroller padding" data-height="307" data-always-visible="1">
												   <li>
													<span class="label label-success"><i class="icon-bell"></i></span>
													<span>Business Name: </span>
													<span><?php echo $business_name ; ?></span>
												  </li>
												   <li>
													<span class="label label-success"><i class="icon-bell"></i></span>
													<span>Nature of Business/Sector: </span>
													<span><?php echo $business_nature; ?></span>
												  </li>
												   <li>
													<span class="label label-success"><i class="icon-bell"></i></span>
													<span>Business Category: </span>
													<span><?php echo  $business_category ?></span>
												  </li>
												   <li>
													<span class="label label-success"><i class="icon-bell"></i></span>
													<span>Telephone (mobile): </span>
													<span><?php echo $office_telephone ?></span>
												  </li>
												  <li>
													<span class="label label-success"><i class="icon-bell"></i></span>
													<span>Fax: </span>
													<span><?php echo $fax ?></span>
												  </li>
												   <li>
													<span class="label label-success"><i class="icon-bell"></i></span>
													<span>P.O Box: </span>
													<span><?php echo $post_box ?></span>
												  </li>
												  <li>
													<span class="label label-success"><i class="icon-bell"></i></span>
													<span>Location: </span>
													<span><?php echo $location ?></span>
												  </li>
												  <li>
													<span class="label label-success"><i class="icon-bell"></i></span>
													<span>Sector: </span>
													<span><?php  echo $sector ?></span>
												  </li>
												  <li>
													<span class="label label-success"><i class="icon-bell"></i></span>
													<span>District: </span>
													<span><?php echo $district ?></span>
												  </li>
												  <li>
													<span class="label label-success"><i class="icon-bell"></i></span>
													<span>City/Province: </span>
													<span><?php echo $city_province ?></span>
												  </li>
												  </ul>
											  </div>
										</div>	
										</div>
									</div> 
									
									<div class="row-fluid">
										 <div class="span10">
										  <div class="widget">
										      <div class="widget-title">
												<h4><i class="icon-reorder"></i>Investment and financing schedule &Capital cost </h4>
												<span class="tools">
												<a href="javascript:;" class="icon-chevron-down"></a>
												<a href="javascript:;" class="icon-refresh"></a>		
												</span>							
											  </div>
										      <div class="widget-body">
									           <table id="tableSample1"  class="table table-bordered table-hover">
										<thead>
											<tr class="alert-block alert-success">
												<th>Fixed Cost Amount( in $)</th>
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
												<td><?php echo $land_year1 ?></td>
												<td><?php echo $land_year2 ?></td>
												<td><?php echo $land_year3 ?></td>
												<td><?php echo $land_year4 ?></td>
												<td><?php echo $land_year5 ?></td>
											</tr>
											<tr>
												<td>Construction</td>
												<td><?php echo $construction_year1; ?></td>
												<td><?php echo $construction_year2; ?></td>
												<td><?php echo $construction_year3; ?></td>
												<td><?php echo $construction_year4; ?></td>
												<td><?php echo $construction_year5; ?></td>
											</tr>
											<tr>
												<td>Plant and Machinery</td>
											    <td><?php echo $machinery_year1 ?></td>
												<td><?php echo $machinery_year2 ?></td>
												<td><?php echo $machinery_year3 ?></td>
												<td><?php echo $machinery_year4 ?></td>
												<td><?php echo $machinery_year5 ?></td>
											</tr>
											<tr>
												<td>Furniture</td>
										       <td><?php echo  $furniture_year1 ?></td>
												<td><?php echo  $furniture_year2 ?></td>
												<td><?php echo  $furniture_year3 ?></td>
												<td><?php echo  $furniture_year4 ?></td>
												<td><?php echo  $furniture_year5 ?></td>
											</tr>
											<tr>
												<td>Other Fixed Cost</td>
												<td><?php echo $other_assets1 ?></td>
												<td><?php echo $other_assets2 ?></td>
												<td><?php echo $other_assets3 ?></td>
												<td><?php echo $other_assets4 ?></td>
												<td><?php echo $other_assets5 ?></td>
											</tr>
										</tbody>
									</table> 
											  </div>
										</div>	
										</div>
									</div>
									<div class="row-fluid">
										 <div class="span10">
										  <div class="widget">
										      <div class="widget-title">
												<h4><i class="icon-reorder"></i>Start up Expenses</h4>
												<span class="tools">
												<a href="javascript:;" class="icon-chevron-down"></a>
												<a href="javascript:;" class="icon-refresh"></a>		
												</span>							
											  </div>
										      <div class="widget-body">
												 <table  class="table table-bordered table-hover">
										<thead>
											<tr class="alert-block alert-success">
												<th>Amount ($)</th>
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
												<td><?php echo $studies_year1 ?></td>
												<td><?php echo $studies_year2 ?></td>
												<td><?php echo $studies_year3 ?></td>
												<td><?php echo $studies_year4 ?></td>
												<td><?php echo $studies_year5 ?></td>
											</tr>
											<tr>
												<td>Travel Expenses</td>
												<td><?php echo $travel_expense1 ?></td>
												<td><?php echo $travel_expense2 ?></td>
												<td><?php echo $travel_expense3 ?></td>
												<td><?php echo $travel_expense4 ?></td>
												<td><?php echo $travel_expense5 ?></td>
												
											</tr>
											<tr>
												<td>Starting Capital</td>
												<td><?php echo $starting_capital1 ?></td>
												<td><?php echo $starting_capital2 ?></td>
												<td><?php echo $starting_capital3 ?></td>
												<td><?php echo $starting_capital4 ?></td>
												<td><?php echo $starting_capital5 ?></td>
												
											</tr>
											<tr>
												<td>Administrative & License Expense</td>
												<td><?php echo $licensing_expenses1 ?></td>
												<td><?php echo $licensing_expenses2 ?></td>
												<td><?php echo $licensing_expenses3 ?></td>
												<td><?php echo $licensing_expenses4 ?></td>
												<td><?php echo $licensing_expenses5 ?></td>
											     
											</tr>
											<tr>
												<td>Rental Fees</td>
												<td><?php echo $rental_fees1 ?></td>
												<td><?php echo $rental_fees2 ?></td>
												<td><?php echo $rental_fees3 ?></td>
												<td><?php echo $rental_fees4 ?></td>
												<td><?php echo $rental_fees5 ?></td>
												
											</tr>
											<tr>
												<td>Others</td>
												<td><?php echo  $other_expeses1 ?></td>
												<td><?php echo  $other_expeses2 ?></td>
												<td><?php echo  $other_expeses3 ?></td>
												<td><?php echo  $other_expeses4 ?></td>
												<td><?php echo  $other_expeses5 ?></td>
												
											</tr>
										</tbody>
									</table> 
											  </div>
										</div>	
										</div>
									</div>
										<div class="row-fluid">
										 <div class="span10">
										  <div class="widget">
										      <div class="widget-title">
												<h4><i class="icon-reorder"></i>Financing structure </h4>
												<span class="tools">
												<a href="javascript:;" class="icon-chevron-down"></a>
												<a href="javascript:;" class="icon-refresh"></a>		
												</span>							
											  </div>
										      <div class="widget-body">
												 <table  class="table table-bordered table-hover">
										<thead>
											<tr class="alert-block alert-success">
												<th>Origin of Financing</th>
												<th>Foreign Source($)</th>
												<th>Local Source($)</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Equity</td>
												<td><?php echo $equity_local?></td> 
												<td><?php echo $equity_foregin ?></td>
												
											</tr>
											<tr>
												<td>Loan From Bank</td>
												<td><?php echo $bank_loan_local ?></td> 
												<td><?php echo $bank_loan_foreign ?></td>
												
											</tr>
											<tr>
												<td>Loan From Mother Company</td>
												<td><?php echo $mother_company_loan_local  ?></td> 
												<td><?php echo $mother_company_loan_foreign ?></td>
												
											</tr>
											<tr>
												<td>Grant</td>
											    <td><?php echo $grant_local?></td> 
												<td><?php echo $grant_foreign ?></td> 
												
											</tr>
										</tbody>
									</table> 
											  </div>
										</div>	
										</div>
									    </div>
								       <div class="row-fluid">
										 <div class="span10">
										  <div class="widget">
										      <div class="widget-title">
												<h4><i class="icon-reorder"></i>Employment Details </h4>
												<span class="tools">
												<a href="javascript:;" class="icon-chevron-down"></a>
												<a href="javascript:;" class="icon-refresh"></a>		
												</span>							
											  </div>
										      <div class="widget-body">
												   
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
												<td><?php echo $top_management_local1 ?></td>
												<td><?php echo $top_management_local2?></td>
												<td><?php echo $top_management_local3?></td>
												<td><?php echo $top_management_local4 ?></td>
												<td><?php echo $top_management_local5 ?></td>
											</tr>
											<tr>
												<td>Technical/Professional</td>
												<td><?php echo $technical_professional_local1 ?></td>
												<td><?php echo $technical_professional_local2 ?></td>
												<td><?php echo $technical_professional_local3 ?></td>
												<td><?php echo $technical_professional_local4 ?></td>
												<td><?php echo $technical_professional_local5 ?></td>
											</tr>
											<tr>
												<td>Skilled labour</td>
												<td><?php echo  $skilled_labour_local1 ?></td>
												<td><?php echo  $skilled_labour_local2?></td>
												<td><?php echo  $skilled_labour_local3?></td>
												<td><?php echo  $skilled_labour_local4?></td>
												<td><?php echo  $skilled_labour_local5?></td>
											</tr>
											<tr>
												<td>Others (manpower, casual to precise)</td>
											    <td><?php echo $other_jobs_local1 ?></td>
												<td><?php echo $other_jobs_local2 ?></td>
												<td><?php echo $other_jobs_local3 ?></td>
												<td><?php echo $other_jobs_local4 ?></td>
												<td><?php echo $other_jobs_local5 ?></td>
											</tr>
										</tbody>
									</table> 
										<table  class="table table-bordered table-hover">
										<thead>
											<tr class="alert-block alert-success">
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
												<td><?php  echo $top_management_foreign1 ?></td>
												<td><?php  echo $top_management_foreign2 ?></td>
												<td><?php  echo $top_management_foreign3 ?></td>
												<td><?php  echo $top_management_foreign4 ?></td>
												<td><?php  echo $top_management_foreign5 ?></td>
											</tr>
											<tr>
												<td>Technical/Professional</td>
												<td><?php echo $technical_professional_foreign1 ?></td>
												<td><?php echo $technical_professional_foreign2 ?></td>
												<td><?php echo $technical_professional_foreign3 ?></td>
												<td><?php echo $technical_professional_foreign4 ?></td>
												<td><?php echo $technical_professional_foreign5 ?></td>
											</tr>
											<tr>
												<td>Skilled labour</td>
												<td><?php echo $skilled_labour_foreign1 ?></td>
												<td><?php echo $skilled_labour_foreign2 ?></td>
												<td><?php echo $skilled_labour_foreign3 ?></td>
												<td><?php echo $skilled_labour_foreign4 ?></td>
												<td><?php echo $skilled_labour_foreign5 ?></td>
											</tr>
											<tr>
												<td>Others (manpower, casual to precise)</td>
											    <td><?php echo $other_jobs_foreign1 ?></td>
												<td><?php echo $other_jobs_foreign2 ?></td>
												<td><?php echo $other_jobs_foreign3 ?></td>
												<td><?php echo $other_jobs_foreign4 ?></td>
												<td><?php echo $other_jobs_foreign5 ?></td>
											</tr>
										</tbody>
									</table> 
											  </div>
										</div>	
										</div>
									    </div>
								      <div class="row-fluid">
										 <div class="span10">
										  <div class="widget">
										      <div class="widget-title">
												<h4><i class="icon-reorder"></i>Planned Company Performance </h4>
												<span class="tools">
												<a href="javascript:;" class="icon-chevron-down"></a>
												<a href="javascript:;" class="icon-refresh"></a>		
												</span>							
											  </div>
										      <div class="widget-body">
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
												<td><?php echo $sales_income1  ?></td>
												<td><?php echo $sales_income2 ?></td>
												<td><?php echo $sales_income3 ?></td>
												<td><?php echo $sales_income4 ?></td>
												<td><?php echo $sales_income5 ?></td>
											</tr>
											<tr>
												<td>Total cost of sales</td>
												<td><?php echo $total_cost_sales1 ?></td>
												<td><?php echo $total_cost_sales2 ?></td>
												<td><?php echo $total_cost_sales3 ?></td>
												<td><?php echo $total_cost_sales4 ?></td>
												<td><?php echo $total_cost_sales5 ?></td>
											</tr>
											<tr>
												<td>Gross Profit</td>
												<td><?php echo  $gross_profit1 ?></td>
												<td><?php  echo  $gross_profit2 ?></td>
												<td><?php  echo  $gross_profit3 ?></td>
												<td><?php  echo  $gross_profit4 ?></td>
												<td><?php  echo  $gross_profit5 ?></td>
											</tr>
											<tr>
												<td>Total Indirect Expenses</td>
											    <td><?php echo $indirect_expense1 ?></td>
												<td><?php echo $indirect_expense2 ?></td>
												<td><?php echo $indirect_expense3 ?></td>
												<td><?php echo $indirect_expense4 ?></td>
												<td><?php echo $indirect_expense5?></td>
											</tr>
											<tr>
												<td>Profit Before Tax</td>
												<td><?php echo $profit_before_tax1 ?></td>
												<td><?php  echo $profit_before_tax2 ?></td>
												<td><?php  echo $profit_before_tax3 ?></td>
												<td><?php echo $profit_before_tax4 ?></td>
												<td><?php  echo $profit_before_tax5 ?></td>
											</tr>
											<tr>
												<td>Tax Expenses(30%)</td>
												<td><?php echo $tax_expenses1 ?></td>
												<td><?php echo $tax_expenses2 ?></td>
												<td><?php echo $tax_expenses3 ?></td>
												<td><?php echo $tax_expenses4 ?></td>
												<td><?php echo $tax_expenses5 ?></td>
											</tr>
											<tr>
												<td>Net Profit</td>
												<td><?php echo $net_profit1 ?></td>
												<td><?php echo $net_profit2 ?></td>
												<td><?php echo $net_profit3 ?></td>
												<td><?php echo $net_profit4 ?></td>
												<td><?php echo $net_profit5 ?></td>
											</tr>
										</tbody>
									</table> 
											  </div>
										</div>	
										</div>
									    </div>
									<div class="row-fluid">
										<div class="span6">
											<a href="<?php echo url_for('projectSummary/new?id='.$id) ?>"> <button type="button" class="btn btn-success">Make Report</button> </a>
											<a href="<?php echo url_for('dashboard/index') ?>"> <button type="button" class="btn btn-danger">Request Resubmission</button></a>	
										</div>
										
									</div>
								</div>
							</div>
							<!-- END GENERAL PORTLET-->
						</div>
						
					</div>
					<!--END:BODY-->
				</div>
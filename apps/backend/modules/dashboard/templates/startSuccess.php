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
									             <div id="mytable1"> </div>
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
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
											<tr>
												<td>Travel Expenses</td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												
											</tr>
											<tr>
												<td>Starting Capital</td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												
											</tr>
											<tr>
												<td>Administrative & License Expense</td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
											     
											</tr>
											<tr>
												<td>Rental Fees</td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												
											</tr>
											<tr>
												<td>Others</td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												
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
												<td></td>
												<td></td>
												
											</tr>
											<tr>
												<td>Loan From Bank</td>
												<td></td>
												<td></td>
												
											</tr>
											<tr>
												<td>Loan From Mother Company</td>
												<td></td>
												<td></td>
												
											</tr>
											<tr>
												<td>Grant</td>
											    <td></td>
												<td></td> 
												
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
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
											<tr>
												<td>Technical/Professional</td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
											<tr>
												<td>Skilled labour</td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
											<tr>
												<td>Others (manpower, casual to precise)</td>
											    <td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
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
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
											<tr>
												<td>Technical/Professional</td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
											<tr>
												<td>Skilled labour</td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
											<tr>
												<td>Others (manpower, casual to precise)</td>
											    <td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
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
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
											<tr>
												<td>Total cost of sales</td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
											<tr>
												<td>Gross Profit</td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
											<tr>
												<td>Total Indirect Expenses</td>
											    <td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
											<tr>
												<td>Profit Before Tax</td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
											<tr>
												<td>Tax Expenses(30%)</td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
											<tr>
												<td>Net Profit</td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
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
			
<script>
  function myReadonlyRenderer(instance, td, row, col, prop, value, cellProperties) {
              Handsontable.TextCell.renderer.apply(this, arguments);
              //use the built-in text cell renderer

              if (cellProperties.readOnly) {
                td.className = 'dimmed';
                //apply "dimmed" class if cell has readOnly property
              }
            }
			
</script>				
<script>
            $(document).ready(function () {
              $("#mytable1").handsontable({
                rowHeaders: ['Land',''],
              colHeaders: ['Year1', 'Year2', 'Year3', 'Year4', 'Year5'],
              minSpareCols: 0,
              minSpareRows: false,
                
              });
            });
          </script>				
				
				
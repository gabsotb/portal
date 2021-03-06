	<?php 
	 //get the business application information
	 foreach($details as $data)
	 {
	  $id = $data['investmentapp_id'];
	  //$id = 2;
	  $token = $data['token'];
	  $name = $data['name']; 
	  $regno = $data['registration_number'];
	  $applicant_reference = $data['applicant_reference_number'];
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
	  $exemption_on_machinery = $data['exemption_on_machinery'];
	  $currency = $data['currency_type'];
	  //Variables for the table land costs
	  
	 }

	?>
	  <?php 
											   $applicantId = Doctrine_Core::getTable('TaskAssignment')->getApplicantId($id) ;
											   
											   ///
											   $applicant_details = Doctrine_Core::getTable('TaskAssignment')->getApplicantInformation($applicantId);
											   /// variables
											   $first_name = null;
											   $last_name = null;
											   $salutation = null;
											   $phone_number = null;
											   $citizenship = null;
											   $surname = null ;
											   $id_passport = null ;
											   $email_address = null ;
											    foreach($applicant_details as $d)
												{
												   $first_name = $d['first_name'] ;
												   $last_name = $d['last_name'] ;
												   $salutation = $d['salutation'] ;
												   $phone_number = $d['phone_number'] ;
												   $citizenship = $d['citizenship'] ;
												   $surname = $d['surname'] ;
												   $id_passport = $d['id_passport'] ;
												   $email_address = $d['email_address'] ;
												}
											   
											  ?>
	<!-- BEGIN PAGE CONTENT-->
				<div id="page">
				   <div id="widget-resubmit" class="modal hide">
						<div class="modal-header">
							<button data-dismiss="modal" class="close" type="button">�</button>
							<h3><?php echo __('Request Document Resubmission') ?></h3>
						</div>
						<div class="modal-body">
							<p><?php echo __('Please Note that You are about to request this client to resubmit data. This therefore means the client 
							documents processing will continue after he/she resubmits. You will not be able to process the application untill
							the client resubmits his/her application')?>.</p>
							<p><?php echo __('Are you sure about this')?>? </p>
							
							 <a href="<?php echo url_for('investmentresubmit/new?id='.$id)?>"><button class="btn btn-warning"><i class="icon-plus icon-white"></i> <?php echo __('Okay I understand') ?></button> </a>&nbsp;&nbsp;&nbsp;
							 <button data-dismiss="modal" class="close" type="button"><?php echo __('Cancel') ?></button>
							
							
							
							
						</div>
				   </div>
				 <div id="widget-decline" class="modal hide">
						<div class="modal-header">
							<button data-dismiss="modal" class="close" type="button">�</button>
							<h3><?php echo __('Decline Application') ?></h3>
						</div>
						<div class="modal-body">
							<p><?php echo __('Your are about to decline this applicant application. It is a good idea to inform the Manager and share your decision. You can send a message to the Manager/ Supervisor who assigned you this task and inform them of your
							decision by clicking')?> <a href="<?php echo url_for('messages/new?business='.$id.'&token='.$token.'&request_type=decline_application')?> "><button class="btn btn-success"><i class="icon-ok icon-white"></i> <?php echo __('Send Request Message') ?></button></a></p>
							
							
							<?php 
							 //we will hide this button if the user has not yet been granted the necessary permission to decline
							 //so we connect to the table that stores permission from managers/supervisors and we query for
							 //accept where request type is decline_application
							 $username = sfContext::getInstance()->getUser()->getGuardUser()->getUserName();
							 //print $username; 
							 //print $applicant_reference;
							 //exit;
							 $query = Doctrine_Core::getTable('InvestmentRequests')->queryPermission($applicant_reference, $username);
							//print_r($query); exit;
							 //
							 
							 
							?>
							
							<?php if(count($query) == 0): ?>
							<font color="red">
							 <?php //no permission yet
                                echo __('Sorry,Permission not granted. If you have contacted your supervisor please wait
							  as he/she responds to your request. If not please send a message asap. Thank you for understanding') ;
							  
							  ?>
							<?php endif; ?>
							</font> 
							 <?php if(count($query) != 0): ?>
							 <p> <?php echo __('If you are sure about you decision, then click continue or just cancel') ?></p>
							 <a href="<?php echo url_for('investment_reject')?>">
							 <button class="btn btn-warning"><i class="icon-plus icon-white"></i> <?php echo __('Continue') ?></button> 
							 </a>
							 <?php endif; ?>
							 
							 &nbsp;&nbsp;&nbsp;
							 <button data-dismiss="modal" class="close" type="button"><?php echo __('Cancel') ?></button>
							
							
							
							
						</div>
				</div>
					<div class="row-fluid">
					
						<div class="span8" >
						
							<!-- BEGIN GENERAL PORTLET-->
							<div class="widget">
								<div class="widget-title">
									<h4><?php echo __('BUSINESS PROPOSAL FOR') ?>
									<?php echo $name ?>
									</h4>
															
								</div>
								<div class="widget-body">
									<div class="row-fluid">
										<div class="span9">
											<div class="alert alert-block alert-danger">
										<h4 class="alert-heading"><?php echo __('Important!') ?></h4>
										<p>
										     <?php echo __('This is the business proposal for:') ?>
										     <font color="green"><?php echo $name;?></font>
											 <?php echo __('Registration Number is'); ?>
											<font color="green"> <?php echo $regno; ?></font>
											 <?php echo __('Applicant reference number is')?>
											<font color="green"> (<?php echo $applicant_reference; ?>)</font>
											 <?php echo __(' Please Read it Carefully before generating report'); ?>.
										</p>
										
									         </div>
										</div>
										
									</div>
									<div class="row-fluid">
										 <div class="span10">
										  <div class="widget">
										        <div class="widget-title">
												<h4><?php echo __('PROJECT BRIEF') ;?> </h4>
																		
											  </div>
										      <div class="widget-body">
												<div class="alert alert-block alert-info">
												<p>
												<?php echo html_entity_decode($project_brief); ?> 
												</p>
												</div>
												
											</div>
										</div>	
										</div>
									</div>
								    <div class="row-fluid">
										 <div class="span10">
										  <div class="widget">
										      <div class="widget-title">
												<h4><?php echo("APPLICANT PERSONAL DETAILS") ?></h4>
																		
											  </div>
										      <div class="widget-body">
											
											    <div class="alert alert-block alert-info">
												 <ul class="item-list scroller padding" data-height="307" data-always-visible="1">
												   <li>
													<span><i class="icon-user"></i></span>
													<span><?php echo __('APPLICANT FULL NAMES') ?>: </span>
													<span><?php echo $first_name; echo $last_name; ?> </span>
												  </li>
												   <li>
													<span><i class="icon-user-md"></i></span>
													<span><?php echo __('TITLE IN THE COMPANY') ?>: </span>
													<span>Manager</span>
												  </li>
												   <li>
													<span><i class="icon-globe"></i></span>
													<span><?php echo __('CITIZENSHIP') ?>: </span>
													<span><?php echo $citizenship ?></span>
												  </li>
												   <li>
													<span><i class="icon-mobile-phone"></i></span>
													<span><?php echo __('TELEPHONE (mobile)') ?>: </span>
													<span><?php echo $phone_number ?></span>
												  </li>
												  <li>
													<span><i class="icon-tablet"></i></span>
													<span><?php echo __('FAX') ?>: </span>
													<span>3434</span>
												  </li>
												   <li>
													<span><i class="icon-envelope"></i></span>
													<span><?php echo __('PERSONAL E-MAIL') ?>: </span>
													<span><?php echo $email_address ?></span>
												  </li>
												  </ul>
												  </div>
											  </div>
										</div>	
										</div>
									</div> 
								   <div class="row-fluid">
										 <div class="span10">
										  <div class="widget">
										     
										      <div class="widget-title">
												<h4><?php echo __('COMPANY DETAILS') ?></h4>						
											 
											 </div>
										      <div class="widget-body">
											    <div class="alert-info">
												 <ul class="item-list scroller padding" data-height="307" data-always-visible="1">
												   <li>
													<span><i class="icon-suitcase"></i></span>
													<span><?php echo __('BUSINESS NAME')?>: </span>
													<span><?php echo $business_name ; ?></span>
												  </li>
												   <li>
													<span><i class="icon-cloud"></i></span>
													<span><?php echo __('NATURE OF BUSINESS/SECTOR') ?>: </span>
													<span><?php echo $business_nature; ?></span>
												  </li>
												   <li>
													<span><i class="icon-briefcase"></i></span>
													<span><?php echo __('BUSINESS CATEGORY') ?>: </span>
													<span><?php echo  $business_category ?></span>
												  </li>
												   <li>
													<span><i class="icon-mobile-phone"></i></span>
													<span><?php echo __('TELEPHONE (mobile)') ?>: </span>
													<span><?php echo $office_telephone ?></span>
												  </li>
												  <li>
													<span><i class="icon-tablet"></i></span>
													<span><?php echo __('FAX')?>: </span>
													<span><?php echo $fax ?></span>
												  </li>
												   <li>
													<span><i class="icon-tablet"></i></span>
													<span><?php echo __('P.O BOX')?>: </span>
													<span><?php echo $post_box ?></span>
												  </li>
												  <li>
													<span><i class="icon-star"></i></span>
													<span><?php echo __('LOCATION')?>: </span>
													<span><?php echo $location ?></span>
												  </li>
												  <li>
													<span><i class="icon-star"></i></span>
													<span><?php echo __('SECTOR')?>: </span>
													<span><?php  echo $sector ?></span>
												  </li>
												  <li>
													<span><i class="icon-star"></i></span>
													<span><?php echo __('DISTRICT')?>: </span>
													<span><?php echo $district ?></span>
												  </li>
												  <li>
													<span><i class="icon-star"></i></span>
													<span><?php echo __('CITY/PROVINCE')?>: </span>
													<span><?php echo $city_province ?></span>
												  </li>
												  </ul>
											  </div>
											  </div>
										</div>	
										</div>
									</div> 
									
									<div class="row-fluid">
										 <div class="span10">
										  <div class="widget">
										      <div class="widget-title">
												<h4><?php echo __('INVESTMENT AND FINANCING SCHEDULE & CAPITAL COST') ?> </h4>
												<span class="tools">
												<a href="javascript:;" class="icon-chevron-down"></a>
												<a href="javascript:;" class="icon-refresh"></a>		
												</span>							
											  </div>
										      <div class="widget-body">
											    <div class="alert alert-block alert-info">
									             <div id="mytable1"> </div>
												 <div id="mytableconsole"> 
												   
												 </div>
												  <a href="javascript:void(0);" id="printPage">
												  <button type="button" class="btn btn-warning"><i class="icon-print"></i> Print</button>
												 </a> 
												</div>
											  </div>
										</div>	
										</div>
									</div>
									<div class="row-fluid">
										 <div class="span10">
										  <div class="widget">
										      <div class="widget-title">
												<h4><?php echo __('START UP EXPENSES') ?></h4>						
											  </div>
										      <div class="widget-body">
											  <div class="alert alert-block alert-info">
												 <div id="mytable2"> </div>
												 <div id="mytableconsole2"> </div>
												 <a href="javascript:void(0);" id="printPage2">
												  <button type="button" class="btn btn-warning"><i class="icon-print"></i> Print</button>
												 </a> 
											  </div>
											  </div>
										</div>	
										</div>
									</div>
										<div class="row-fluid">
										 <div class="span10">
										  <div class="widget">
										      <div class="widget-title">
												<h4><?php echo __('FINANCING STRUCTURE') ?> </h4>						
											  </div>
										      <div class="widget-body">
											    <div class="alert alert-block alert-info">
												 <div id="mytable3"> </div>
												 <div id="mytableconsole3"> </div>
												 <a href="javascript:void(0);" id="printPage3">
												  <button type="button" class="btn btn-warning"><i class="icon-print"></i> Print</button>
												 </a> 
												 </div>
											  </div>
										</div>	
										</div>
									    </div>
								       <div class="row-fluid">
										 <div class="span10">
										  <div class="widget">
										      <div class="widget-title">
												<h4><?php echo __('EMPLOYMENT DETAILS')?> </h4>						
											  </div>
										      <div class="widget-body">
											       <div class="alert alert-block alert-info">
												    <div class="alert alert-success">
														
														<strong><?php echo __('LOCAL EMPLOYEES') ?></strong> 
													</div>
												    <div id="mytable4"> </div>
													 <div id="mytableconsole4"> </div>
													 <a href="javascript:void(0);" id="printPage4">
												  <button type="button" class="btn btn-warning"><i class="icon-print"></i> Print</button>
												 </a> 
												    </div>	
											</div>
											<div class="widget-body">
											     <div class="alert alert-block alert-info">
								                      <div class="alert alert-success">
														
														<strong><?php echo __('EXPATRIATE EMPLOYEES') ?></strong> 
													</div>
												     <div id="mytable5"> </div>
													 <div id="mytableconsole5"> </div>
													 <a href="javascript:void(0);" id="printPage5">
												  <button type="button" class="btn btn-warning"><i class="icon-print"></i> Print</button>
												 </a> 
												 </div>
										
											  </div>
										</div>	
										</div>
									    </div>
								      <div class="row-fluid">
										 <div class="span10">
										  <div class="widget">
										      <div class="widget-title">
												<h4><?php echo __('PLANNED COMPANY PERFORMANCE') ?> </h4>						
											  </div>
										      <div class="widget-body">
											      <div class="alert alert-block alert-info">
												   <div id="mytableconsole6"> </div>
												    <div id="mytable6"> </div>
													<a href="javascript:void(0);" id="printPage6">
												  <button type="button" class="btn btn-warning"><i class="icon-print"></i> Print</button>
												 </a> 
												   </div>	
											  </div>
										</div>	
										</div>
									    </div>
									<div class="row-fluid">
										<div class="span9">
											<a href="<?php echo url_for('projectSummary/new?id='.$id.'&token='.$token) ?>"> <button type="button" class="btn btn-success"><?php echo __('Make Report') ?></button> </a> &nbsp;&nbsp;&nbsp;
											<a href="#widget-resubmit" data-toggle="modal">
											<button type="button" class="btn btn-inverse"><?php echo __('Request Resubmission') ?></button></a>&nbsp;&nbsp;&nbsp;
											</a>
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<a href="#widget-decline" data-toggle="modal">
											<button type="button" class="btn btn-danger"><?php echo __('Decline') ?></button> </a> <br/><br/><br/>
											
											<!--<a href="<?php //echo url_for('dashboard/proposal?id='.$id) ?>">
											<button type="button" class="btn btn-info"><i class="icon-print"></i><?php //echo __('Print PDF') ?></button> </a> -->
										</div>
										
									</div>
								</div>
							</div>
							<!-- END GENERAL PORTLET-->
						</div>
						<div class="span4" id="right_column">
							<!-- BEGIN UNORDERED LISTS PORTLET-->
							<div class="widget">
								<div class="widget-title">
									<h4><i class="icon-reorder"></i><?php echo __('Attached by Applicant') ?></h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									</span>							
								</div>
								<div class="widget-body">
								 <p>
								 <?php 
								 $attch1 = null ;
								 $attch2 = null ;
								 $attch3 = null ;
								 $attch4 = null ;
								 $attch5 = null ;
								 $attch6 = null ;
								 $attch7 = null ;
								 foreach($details as $test)
								 {
								 $attch1 = $test['exemption_on_machinery'] ;
								 $attch2 = $test['exemption_on_machinery'] ;
								 $attch3 = $test['land_ownership_document'] ;
								 $attch4 = $test['bill_of_quantiy'] ;
								 $attch5 = $test['construction_permits'] ;
								 $attch6 = $test['drawings']  ;
								 //$attch7 = null ;
								  
								 }
								 //////
								  if( $attch1 == null &&  $attch2 == null &&  $attch3 == null &&  $attch4 == null &&  $attch5 == null && $attch6 == null )
									  {
									   echo __('No Attachment(s) Found');
									  }
								  else
									  {
									   echo __('Download These attachment to view and analyze them');
									  }
								 
								 
								 ?></p>
									<ul>
									  <?php
                                              $model = new BusinessPlan();
										 ?>
									<?php foreach($details as $file) { ?>
										 <?php  if($file['exemption_on_machinery'] != null): ?>
											  
											  <li>
											  <?php echo link_to('exemption_on_machinery', '/uploads/documents/investment_docs/'.$file['exemption_on_machinery'], array('target' => '_blank'));  ?>
											  </li>
									     <?php endif; ?>		 
										<?php  if($file['exemption_on_machinery'] != null): ?>
											  <li>
											<?php   echo link_to('exemption_raw_materials', '/uploads/documents/investment_docs/'.$file['exemption_raw_materials'], array('target' => '_blank')); ?>
											  </li>
										<?php endif; ?>
										<?php if($file['land_ownership_document'] != null): ?>
											  <li>
											  <?php echo link_to('land_ownership_document', '/uploads/documents/investment_docs/'.$file['land_ownership_document'], array('target' => '_blank')); ?>
										      </li>
										<?php endif; ?>	  
										<?php  if($file['bill_of_quantiy'] != null): ?>
											 <li>
											 <?php 
											   echo link_to('bill_of_quantiy', '/uploads/documents/investment_docs/'.$file['bill_of_quantiy'], array('target' => '_blank')); ?> 
										     </li>    
										<?php endif; ?>
										<?php if($file['construction_permits'] != null): ?>
											<li>
											<?php echo link_to('construction_permits', '/uploads/documents/investment_docs/'.$file['construction_permits'], array('target' => '_blank')); ?>
											</li>
										<?php endif; ?>
										<?php if($file['drawings'] != null): ?>
											<li>
												<?php  echo link_to('drawings', '/uploads/documents/investment_docs/'.$file['drawings'], array('target' => '_blank')); ?>
										    </li>
										 <?php endif; ?>
										
								  <?php } ?>
									</ul>
								</div>
							</div>
							<!-- END UNORDERED LISTS PORTLET-->
							<!-- BEGIN ORDERED LISTS PORTLET-->
							<div class="widget">
								
								<div class="widget-body">
									<div class="alert alert-block alert-info fade in">
										<h4 class="alert-heading"><?php echo("Hint") ?></h4>
										<p>
											<?php echo __("You are now processing application for investment certificate for") ?>  <font color="red">
											<?php echo $name; ?></font>. 
										</p>
										<p><?php echo __("Download the attachments (if any) and read the business proposal on the left side of your screen.
										When done Click on the Make report button to generate a business proposal summary or click Request Resubmission for a resubmission request.")?></p>
										
									</div>
								</div>
							</div>
							<!-- END ORDERED LISTS PORTLET-->
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
		    var $container = $("#mytable1");
            var $console = $("#mytableconsole");
            var $parent = $container.parent();
            $container.handsontable({
              startRows: 0,
              startCols: 0,
              rowHeaders: ['<?php echo __('Land\t'); echo __("($currency)"); ?>', '<?php echo __('Construction\t'); echo __("($currency)"); ?>', '<?php echo __('Plant and Machinery\t'); echo __("($currency)"); ?>', '<?php echo __('Furniture\t'); echo __("($currency)"); ?>', '<?php echo __('Other fixed assets\t'); echo __("($currency)"); ?>'],
              colHeaders: ['<?php echo __('Year1') ?>', '<?php echo __('Year2') ?>', '<?php echo __('Year3') ?>', '<?php echo __('Year4') ?>', '<?php echo __('Year5') ?>'],
              minSpareCols: 0,
              minSpareRows: false,
              contextMenu: true,
            });
            var handsontable_financial = $container.data('handsontable');
			  $(document).ready(function () {
              $.ajax({
                url: "<?php echo url_for('dashboard/loadfinancial?id='.$id) ?>",
                dataType: 'json',
                type: 'GET',
                 success: function (result4) {
                  var data = [], row;
				  var i = 0 ;
                  for (i = 0, ilen = result4.financial.length; i < ilen; i++) {
                    row = [];
                    row[0] = result4.financial[i].year1;
                    row[1] = result4.financial[i].year2;
                    row[2] = result4.financial[i].year3;
					row[3] = result4.financial[i].year4;
					row[4] = result4.financial[i].year5;
                    data[result4.financial[i].id - result4.financial[0].id ] = row;
					
					//alert(data[result4.financial[i].id - result4.financial[0].id ]);
                  }
                  handsontable_financial.loadData(data);
				  
				//  alert(handsontable('getData')[selection[0]]);
                  $console.text('<?php echo __('Investment and financing schedule & Capital cost Data loaded') ?>');
                }
              });
			  
            });

         
		  </script>		
		<script>
		    var $container2 = $("#mytable2");
            var $console2 = $("#mytableconsole2");
            var $parent2 = $container2.parent();
            $container2.handsontable({
              startRows: 0,
              startCols: 0,
              rowHeaders: ['<?php echo __('Studies\t'); echo __("($currency)"); ?>', '<?php echo __('Travel Expenses\t'); echo __("($currency)"); ?>', '<?php echo __('Starting Capital\t'); echo __("($currency)"); ?>', '<?php echo __('Administrative & Licensing\t'); echo __("($currency)"); ?>', '<?php echo __('Rental Fees\t'); echo __("($currency)"); ?>', '<?php echo __('Others\t'); echo __("($currency)"); ?>'],
              colHeaders: ['<?php echo __('Year1') ?>', '<?php echo __('Year2') ?>', '<?php echo __('Year3') ?>', '<?php echo __('Year4') ?>', '<?php echo __('Year5') ?>'],
              minSpareCols: 0,
              minSpareRows: false,
              contextMenu: true,
            });
            var handsontable_startupexpenses = $container2.data('handsontable');
			  $(document).ready(function () {
              $.ajax({
                url: "<?php echo url_for('dashboard/loadstartup?id='.$id ) ?>",
                dataType: 'json',
                type: 'GET',
                 success: function (result2) {
                  var data = [], row;
				  var i = 0 ;
                  for (i = 0, ilen = result2.startupexpenses.length; i < ilen; i++) {
                    row = [];
                    row[0] = result2.startupexpenses[i].year1;
                    row[1] = result2.startupexpenses[i].year2;
                    row[2] = result2.startupexpenses[i].year3;
					row[3] = result2.startupexpenses[i].year4;
					row[4] = result2.startupexpenses[i].year5;
                    data[result2.startupexpenses[i].id - result2.startupexpenses[0].id ] = row;
					
					
                  }
                  handsontable_startupexpenses.loadData(data);
				  
				//  alert(handsontable('getData')[selection[0]]);
                  $console2.text('Start up Expenses Data loaded');
                }
              });
			  
            });

         
		  </script>		

<script>
		    var $container3 = $("#mytable3");
            var $console3 = $("#mytableconsole3");
            var $parent3 = $container3.parent();
            $container3.handsontable({
              startRows: 0,
              startCols: 0,
              rowHeaders: ['<?php echo __('Equity\t'); echo __("($currency)"); ?>', '<?php echo __('Loan from bank\t'); echo __("($currency)"); ?>', '<?php echo __('Loan from mother company\t'); echo __("($currency)"); ?>', '<?php echo __('Grant\t'); echo __("($currency)"); ?>'],
              colHeaders: ['<?php echo __('Foreign source') ?>', '<?php echo __('Local  source') ?>'],
              minSpareCols: 0,
              minSpareRows: false,
              contextMenu: true,
            });
            var handsontable_structurefinancial = $container3.data('handsontable');
			  $(document).ready(function () {
              $.ajax({
                url: "<?php echo url_for('dashboard/loadstructure?id='.$id ) ?>",
                dataType: 'json',
                type: 'GET',
                 success: function (result) {
                  var data = [], row;
				  var i = 0 ;
                  for (i = 0, ilen = result.structurefinancial.length; i < ilen; i++) {
                    row = [];
                    row[0] = result.structurefinancial[i].local_source;
                    row[1] = result.structurefinancial[i].foreign_source;
					
                      data[result.structurefinancial[i].id - result.structurefinancial[0].id ] = row;
					
					
                  }
                  handsontable_structurefinancial.loadData(data);
				  
				//  alert(handsontable('getData')[selection[0]]);
                  $console3.text('Financing structure Data loaded');
                }
              });
			  
            });

         
		  </script>				  

<script>
		    var $container4 = $("#mytable4");
            var $console4 = $("#mytableconsole4");
            var $parent4 = $container4.parent();
            $container4.handsontable({
              startRows: 0,
              startCols: 0,
              rowHeaders: ['<?php echo __('Top Management\t'); echo __("($currency)"); ?>', '<?php echo __('Technical/Professional\t'); echo __("($currency)"); ?>', '<?php echo __('Skilled labour\t'); echo __("($currency)"); ?>', '<?php echo __('Others (manpower,casual etc)\t'); echo __("($currency)");?>'],
              colHeaders: ['<?php echo __('Year1') ?>', '<?php echo __('Year2') ?>', '<?php echo __('Year3') ?>', '<?php echo __('Year4') ?>', '<?php echo __('Year5') ?>'],
              minSpareCols: 0,
              minSpareRows: false,
              contextMenu: true,
            });
            var handsontable_localjobs = $container4.data('handsontable');
			  $(document).ready(function () {
              $.ajax({
                url: "<?php echo url_for('dashboard/loadlocal?id='.$id ) ?>",
                dataType: 'json',
                type: 'GET',
                 success: function (local) {
                  var data = [], row;
				  var i = 0 ;
                  for (i = 0, ilen = local.localjobs.length; i < ilen; i++) {
                    row = [];
                    row[0] = local.localjobs[i].year1;
                    row[1] = local.localjobs[i].year2;
                    row[2] = local.localjobs[i].year3;
					row[3] = local.localjobs[i].year4;
					row[4] = local.localjobs[i].year5;
					
                      data[local.localjobs[i].id - local.localjobs[0].id ] = row;
					
					
                  }
                  handsontable_localjobs.loadData(data);
				  
				//  alert(handsontable('getData')[selection[0]]);
                  $console4.text('Local Jobs Data loaded');
                }
              });
			  
            });

         
		  </script>		


<script>
		    var $container5 = $("#mytable5");
            var $console5 = $("#mytableconsole5");
            var $parent5 = $container5.parent();
            $container5.handsontable({
              startRows: 0,
              startCols: 0,
              rowHeaders: ['<?php echo __('Top Management\t'); echo __("($currency)"); ?>', '<?php echo __('Technical/Professional\t'); echo __("($currency)");?>', '<?php echo __('Skilled labour\t'); echo __("($currency)");?>', '<?php echo __('Others (manpower,casual etc)\t'); echo __("($currency)"); ?> '],
              colHeaders: ['<?php echo __('Year1') ?>', '<?php echo __('Year2') ?>', '<?php echo __('Year3') ?>', '<?php echo __('Year4') ?>', '<?php echo __('Year5') ?>'],
              minSpareCols: 0,
              minSpareRows: false,
              contextMenu: true,
            });
            var handsontable_foreignjobs = $container5.data('handsontable');
			  $(document).ready(function () {
              $.ajax({
                url: "<?php echo url_for('dashboard/loadforeign?id='.$id ) ?>",
                dataType: 'json',
                type: 'GET',
                 success: function (foreign) {
                  var data = [], row;
				  var i = 0 ;
                  for (i = 0, ilen = foreign.foreignjobs.length; i < ilen; i++) {
                    row = [];
                    row[0] = foreign.foreignjobs[i].year1;
                    row[1] = foreign.foreignjobs[i].year2;
                    row[2] = foreign.foreignjobs[i].year3;
					row[3] = foreign.foreignjobs[i].year4;
					row[4] = foreign.foreignjobs[i].year5;
					
                      data[foreign.foreignjobs[i].id - foreign.foreignjobs[0].id ] = row;
					
					
                  }
                  handsontable_foreignjobs.loadData(data);
				  
				//  alert(handsontable('getData')[selection[0]]);
                  $console5.text('Foreign Jobs Data loaded');
                }
              });
			  
            });

         
		  </script>		


<script>
		    var $container6 = $("#mytable6");
            var $console6 = $("#mytableconsole6");
            var $parent6 = $container6.parent();
            $container6.handsontable({
              startRows: 0,
              startCols: 0,
              rowHeaders: ['<?php echo __('Sales/Income\t'); echo __("($currency)");?>', '<?php echo __('Total cost of sales\t'); echo __("($currency)");?>', '<?php echo __('Gross profit\t'); echo __("($currency)");?>', '<?php echo __('Total Indirect expenses\t'); echo __("($currency)");?>', '<?php echo __('Profit before tax\t'); echo __("($currency)");?>', '<?php echo __('Tax expense (30%)\t'); echo __("($currency)");?>', '<?php echo __('Net profit\t'); echo __("($currency)");?>'],
              colHeaders: ['<?php echo __('Year1') ?>', '<?php echo __('Year2') ?>', '<?php echo __('Year3') ?>', '<?php echo __('Year4') ?>', '<?php echo __('Year5') ?>'],
              minSpareCols: 0,
              minSpareRows: false,
              contextMenu: true,
            });
            var handsontable_planned = $container6.data('handsontable');
			  $(document).ready(function () {
              $.ajax({
                url: "<?php echo url_for('dashboard/loadplanned?id='.$id ) ?>",
                dataType: 'json',
                type: 'GET',
                 success: function (planned) {
                  var data = [], row;
				  var i = 0 ;
                  for (i = 0, ilen = planned.plannedperformance.length; i < ilen; i++) {
                    row = [];
                    row[0] = planned.plannedperformance[i].year1;
                    row[1] = planned.plannedperformance[i].year2;
                    row[2] = planned.plannedperformance[i].year3;
					row[3] = planned.plannedperformance[i].year4;
					row[4] = planned.plannedperformance[i].year5;
					
                      data[planned.plannedperformance[i].id - planned.plannedperformance[0].id ] = row;
					
					
                  }
                  handsontable_planned.loadData(data);
				  
				//  alert(handsontable('getData')[selection[0]]);
                  $console6.text('<?php echo __('Planned Company Performance  Data loaded')?>');
                }
              });
			  
            });

         
		  </script>	


<!--Printing scripts -->
<script lang='javascript'>
 $(document).ready(function(){
  $('#printPage').click(function(){
        var data = '<input type="button" value="Send To Printer" onClick="window.print()">';           
        data += '<div id="div_print">';
        data += $('#mytable1').html();
        data += '</div>';

        myWindow=window.open('','','width=500,height=100');
        myWindow.innerWidth = screen.width;
        myWindow.innerHeight = screen.height;
        myWindow.screenX = 0;
        myWindow.screenY = 0;
        myWindow.document.write(data);
        myWindow.focus();
    });
 });
</script> 
<script lang='javascript'>
 $(document).ready(function(){
  $('#printPage').click(function(){
        var data = '<input type="button" value="Send To Printer" onClick="window.print()">';           
        data += '<div id="div_print">';
        data += $('#mytable2').html();
        data += '</div>';

        myWindow=window.open('','','width=500,height=100');
        myWindow.innerWidth = screen.width;
        myWindow.innerHeight = screen.height;
        myWindow.screenX = 0;
        myWindow.screenY = 0;
        myWindow.document.write(data);
        myWindow.focus();
    });
 });
</script> 
<script lang='javascript'>
 $(document).ready(function(){
  $('#printPage2').click(function(){
        var data = '<input type="button" value="Send To Printer" onClick="window.print()">';           
        data += '<div id="div_print">';
        data += $('#mytable3').html();
        data += '</div>';

        myWindow=window.open('','','width=500,height=100');
        myWindow.innerWidth = screen.width;
        myWindow.innerHeight = screen.height;
        myWindow.screenX = 0;
        myWindow.screenY = 0;
        myWindow.document.write(data);
        myWindow.focus();
    });
 });
</script> 
<script lang='javascript'>
 $(document).ready(function(){
  $('#printPage4').click(function(){
        var data = '<input type="button" value="Send To Printer" onClick="window.print()">';           
        data += '<div id="div_print">';
        data += $('#mytable4').html();
        data += '</div>';

        myWindow=window.open('','','width=500,height=100');
        myWindow.innerWidth = screen.width;
        myWindow.innerHeight = screen.height;
        myWindow.screenX = 0;
        myWindow.screenY = 0;
        myWindow.document.write(data);
        myWindow.focus();
    });
 });
</script> 
<script lang='javascript'>
 $(document).ready(function(){
  $('#printPage5').click(function(){
        var data = '<input type="button" value="Send To Printer" onClick="window.print()">';           
        data += '<div id="div_print">';
        data += $('#mytable5').html();
        data += '</div>';

        myWindow=window.open('','','width=500,height=100');
        myWindow.innerWidth = screen.width;
        myWindow.innerHeight = screen.height;
        myWindow.screenX = 0;
        myWindow.screenY = 0;
        myWindow.document.write(data);
        myWindow.focus();
    });
 });
</script> 
<script lang='javascript'>
 $(document).ready(function(){
  $('#printPage6').click(function(){
        var data = '<input type="button" value="Send To Printer" onClick="window.print()">';           
        data += '<div id="div_print">';
        data += $('#mytable6').html();
        data += '</div>';

        myWindow=window.open('','','width=500,height=100');
        myWindow.innerWidth = screen.width;
        myWindow.innerHeight = screen.height;
        myWindow.screenX = 0;
        myWindow.screenY = 0;
        myWindow.document.write(data);
        myWindow.focus();
    });
 });
</script> 
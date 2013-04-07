<?php 
//we retrieve necessary variables to use for saving our record
     $id = $record_id;
	 $updated_by = $user_name;
	 $created_by =  $user_id ;

?>

<div id="page">
  <div id="widget-accept" class="modal hide">
						<div class="modal-header">
							<button data-dismiss="modal" class="close" type="button">×</button>
							<h3><?php echo __('Tax Exemption Accept Request') ?></h3>
						</div>
						<div class="modal-body">
							<p><?php echo __('Accepting this request means that the client is authorization for tax
							exemption incentive.')?>.</p>
							<p><?php echo __('Are you sure about this')?>? </p>
							
							 <a href="<?php echo url_for('taxexemptions/accept?id='.$id.'&user='.$updated_by.'&identity='.$created_by)?>"><button class="btn btn-success"><?php echo __('Yes') ?></button> </a>&nbsp;&nbsp;&nbsp;
							 <a href="#">
							 <button data-dismiss="modal" class="btn btn-warning"><?php echo __('No') ?></button>
							</a>
							
							
							
						</div>
	 </div>
	   <div id="widget-reject" class="modal hide">
						<div class="modal-header">
							<button data-dismiss="modal" class="close" type="button">×</button>
							<h3><?php echo __('Tax Exemption Reject Request') ?></h3>
						</div>
						<div class="modal-body">
							<p><?php echo __('Rejecting this request means that the client is not authorization for tax
							exemption incentive')?>.</p>
							<p><?php echo __('Are you sure about this')?>? </p>
							
							 <a href="<?php echo url_for('taxexemptions/reject?id='.$id.'&user='.$updated_by.'&identity='.$created_by)?>"><button class="btn btn-success"><?php echo __('Yes') ?></button> </a>&nbsp;&nbsp;&nbsp;
							 <a href="#">
							 <button data-dismiss="modal" class="btn btn-warning"><?php echo __('No') ?></button>
							</a>
							
							
							
							
							
						</div>
	 </div>
<div class="#">
       <div class="alert alert-success">
	     <div class="widget">
		          <div class="widget-title">
				 <h4 class="alert-heading">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				 EXEMPTION REQUEST - PROCESS TAX EXEMPTION REQUEST.
				 
				 </h4>
				  </div>
		 </div>
		
		</div>
		<div class="span7">
		     <div class="widget">
			      <div class="widget-title">
				  <h4><i class="icon-cogs"></i>Requestor Details </h4>
				  </div>
			      <div class="widget-body">
					   <form action="#" class="form-horizontal">
					     <div class="control-group">
							 <label class="control-label" for="input2">Office Name:</label>
							 <div class="controls">
								<input class="span8" id="input2" type="text" value="Gikondo" disabled />
							 </div>
					     </div>
						 <div class="control-group">
							 <label class="control-label" for="input2">Office Code:</label>
							 <div class="controls">
								<input class="span5" id="input2" type="text" value="11GI" disabled />
							 </div>
					     </div>
						 <div class="divider"></div>
						  <div class="control-group">
							 <label class="control-label" for="input2">Company Name:</label>
							 <div class="controls">
								<input class="span5" id="input2" type="text" value="CEPEX" disabled />
							 </div>
					     </div>
						
						
						 <div class="control-group">
							 <label class="control-label" for="input2">Investment Certificate:</label>
							 <div class="controls">
								<input class="span5" id="input2" type="text" value="R19" disabled />
							 </div>
					     </div>
						 <div class="control-group">
							 <label class="control-label" for="input2">Company Tin:</label>
							 <div class="controls">
								<input class="span5" id="input2" type="text" value="1000013434" disabled />
							 </div>
					     </div>
						 <div class="control-group">
							 <label class="control-label" for="input2">Declarant Name:</label>
							 <div class="controls">
								<input class="span5" id="input2" type="text" value="ATI" disabled />
							 </div>
					     </div>
						 <div class="control-group">
							 <label class="control-label" for="input2">Declarant Reference:</label>
							 <div class="controls">
								<input class="span5" id="input2" type="text" value="2012- RDB -F4" disabled />
							 </div>
					     </div>
						 <div class="control-group">
							 <label class="control-label" for="input2">Declarant Code:</label>
							 <div class="controls">
								<input class="span5" id="input2" type="text" value="634374" disabled />
							 </div>
					     </div>
						 </form>
					   </div> 
			  </div> 
			  </div>
		<div class="span4">
		      <div class="widget">
			      <div class="widget-title">
				  <h4><i class="icon-cogs"></i>Electronic Request Number Information </h4>
				 				  
				 </div>
			      <div class="widget-body">
				       <div class="control-group">
							 <label class="control-label" for="input3">E-Request No & Date:</label>
							 <div class="controls">
								<input class="span6" id="input3" type="text" value="2012- Y738" disabled />
							 </div>
					     </div>
						  <div class="control-group">
							 <label class="control-label" for="input3">E-Authorization No & Date:</label>
							 <div class="controls">
								<input class="span6" id="input3" type="text" value="78" disabled />
							 </div>
					     </div>
						 <div class="control-group">
							 <label class="control-label" for="input3">Customs Declaration Reference:</label>
							 <div class="controls">
								<input class="span6" id="input3" type="text" value="2012-232" disabled />
							 </div>
					     </div>
				  </div>
			   </div>
		</div>
  </div>
    
  
 <div class="row-fluid">	
  <div class="span11">
							<!-- BEGIN SAMPLE TABLE PORTLET-->
							<div class="widget">
								<div class="widget-title">
									<h4><i class="icon-cogs"></i>
											<strong>Exemption Items</strong> Detailed Information.</h4>
															
								</div>
								<div class="widget-body">
									<table class="table table-striped table-bordered table-advance table-hover">
										<thead>
											
												<th>RDB</th>
												<th>RRA</th>
												<th>HS Code</th>
												<th>Description</th>
												<th>CIF</th>
												<th>Quantity</th>
											     <th>Import Duties</th>
										</thead>
										<tbody>
											<tr>
												<td>N</td>
												<td>Y</td>
												<td>16030000</td>
												<td>Extracts and Juices</td>
												<td>1000</td>
												<td>1000</td>
												<td>52</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<!-- END SAMPLE TABLE PORTLET-->
						</div>
 </div>		 
 <div class="row-fluid">	
  <div class="span5">
       <div class="widget">
                        <div class="widget-title">
                           <h4><i class="icon-reorder"></i>RWANDA DEVELOPMENT BOARD</h4>					
                        </div>
						 <div class="widget-body">
						    <div class="alert alert-success">
								<strong>Chief Operating Officer:</strong> James Smart
							</div>
							 <div class="control-group">
								 <label class="control-label" for="e_verification1">E-Verification Date:</label>
								 <div class="controls">
									<input class="span6" id="e_verification1" type="text" value="04-07-2013" disabled />
								 </div>
					         </div>
							 <div class="control-group">
                                 <label class="control-label" for="inputRemarks">Remarks</label>
                                 <div class="controls">
                                    <textarea class="span8" rows="3" id="inputRemarks"></textarea>
                                 </div>
                              </div>
						 </div>
		</div>
  </div>
  <div class="span5">
     <div class="widget">
                        <div class="widget-title">
                           <h4><i class="icon-reorder"></i>RWANDA REVENUE AUTHORITY</h4>					
                        </div>
						 <div class="widget-body">
						    <div class="alert alert-success">
								<strong>Commissioner of Customs Services:</strong> Boniface Irunguh
							</div>
								 <div class="control-group">
								 <label class="control-label" for="e_verification_rra">E-Verification Date:</label>
								 <div class="controls">
									<input class="span6" id="e_verification_rra" value="04-07-2013" type="text" disabled />
								 </div>
					         </div>
							 <div class="control-group">
                                 <label class="control-label" for="inputRemarks_rra">Remarks</label>
                                 <div class="controls">
                                    <textarea class="span8" rows="3" id="inputRemarks_rra"></textarea>
                                 </div>
                              </div>
						 </div>
		</div>
  </div>
  
  </div> 
  <div class="row-fluid">
       <div class="span11">
     <div class="widget">
               <div class="widget-body"> 
			                  <a href="#widget-accept " data-toggle="modal"><button class="btn btn-success"><i class="icon-ok icon-white"></i> Approve</button> </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              <a href="#widget-reject" data-toggle="modal"><button class="btn btn-info"><i class="icon-ban-circle icon-white"></i> Decline</button></a>
							  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							  <a href="<?php echo url_for('taxexemptions/index')?>"><button class="btn btn-danger"><i class="icon-remove icon-white"></i> Cancel </button></a>
                </div>			   
		</div>
  </div>
  </div>  
  
</div>
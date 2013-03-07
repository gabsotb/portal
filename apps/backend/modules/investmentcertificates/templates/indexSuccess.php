<div class="row-fluid">
						<div class="span12">
							<!-- BEGIN EXAMPLE TABLE PORTLET-->
							<div class="widget">
								<div class="widget-title">
									<h4>Table -- Showing All Certificates you have Issued</h4>						
								</div>
								<div class="widget-body">
									<table class="table table-striped table-bordered" id="investmentcertsadmin">
										<thead>
											<tr>
												
												<th>Company Name</th>
												<th>Company Address</th>
												<th>Company Representative</th>
												<th>Certificate Number</th>
												<th>Date Issued</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
										<?php foreach($certificates as $certs): ?>
											<tr class="odd gradeX">
												<td><?php echo $certs['name']?></td>
												<td><?php echo $certs['location']?></td>
												<td><?php echo $certs['name']?></td>
												<td><?php echo $certs['serial_number']?></td>
												<td><?php echo $certs['created_at']?></td>
												<td><i class="icon-print"></i><a href="<?php echo url_for('dashboard/investcert?business='.$certs['name'])?>">Print</a></td>
											</tr>
										<?php endforeach; ?>	
										</tbody>
									</table>
								</div>
							</div>
							<!-- END EXAMPLE TABLE PORTLET-->
						</div>
					</div>
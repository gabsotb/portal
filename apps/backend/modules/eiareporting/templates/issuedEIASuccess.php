<div id="page" class="dashboard">					<div class="row-fluid">						<div class="span12">						    <div class="widget">							 <div class="widget-title">									<h4><i class="icon-certificate"></i><?php echo __('EIA CERTIFICATES ISSUED REPORT') ?></h4>									<span class="tools">									<a href="javascript:;" class="icon-refresh"></a>																				</span>															</div>						   	<div class="widget-body">									<table class="table table-striped table-bordered" id="investment_applications_manager">										<thead>											<tr>																								<th><?php echo __('PROJECT NAME') ?></th>												<th ><?php echo __('BUSINESS SECTOR') ?></th>												<th><?php echo __('PLOT NUMBER') ?></th>												<th><?php echo __('DISTRICT') ?></th>												<th><?php echo __('PROVINCE') ?></th>												<th><?php echo __('DEVELOPER NAMES') ?></th>												<th><?php echo __('CERTIFICATE NO') ?></th>												<th><?php echo __('Actions') ?></th>											</tr>										</thead>										<tbody>										   <?php foreach($eia_certs as $certs): ?>											<tr class="odd gradeX">																								<td><?php echo $certs['project_name'] ?></td>												<td><?php echo $certs['business_sector'] ?></td>												<td><?php echo $certs['plot_number'] ?></td>												<td><?php echo $certs['district'] ?></td>												<td><?php echo $certs['province'] ?></td>												<td><?php echo $certs['developer_names'] ?></td>												<td><?php echo $certs['certficate_no'];												$id = $certs['id'];												?></td>												<td>												<a href="<?php echo url_for('reports/printCertificate?reference='.$id)?>">												<button class="btn btn-inverse"><?php echo __('Cert') ?></button>												</a></td>											</tr>																						<?php endforeach; ?>																					</tbody>									</table>									<a href="<?php echo url_for('eiareporting/list')?>"><button class="btn btn-inverse"><i class="icon-print"></i><?php echo __('PDF') ?></button></a>									<a href="<?php echo url_for('eiareporting/excelList')?>"> <button class="btn btn-primary"><i class="icon-download"></i> <?php echo __('Export Excel') ?></button></a>                                   								</div>								</div>							</div>						</div>					</div></div>
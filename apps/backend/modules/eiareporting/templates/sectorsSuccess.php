<div id="page" class="dashboard">					<div class="row-fluid">						<div class="span12">						    <div class="widget">							 <div class="widget-title">									<h4><i class="icon-certificate"></i><?php echo __('TOTAL INVESTMENTS PER SECTOR TO DATE') ?></h4>									<span class="tools">									<a href="javascript:;" class="icon-refresh"></a>																				</span>															</div>						   	<div class="widget-body">							   									<table class="table table-striped table-bordered" id="example">										<thead>											<tr>																								<th><?php echo __('Sector Name') ?></th>												<th ><?php echo __('RWF') ?></th>												<th><?php echo __('USD') ?></th>											</tr>										</thead>										<tbody>										   <?php foreach($sectors_investments as $sects): ?>											<tr class="odd gradeX">																								<td><?php echo $sects['business_sector'] ?></td>												<td><?php echo $sects['sum(planned_investment)'] ?></td>												<td><?php echo $sects['sum(planned_investment)'] ?></td>											</tr>											<?php endforeach; ?>											<tr class="odd gradeX">											   <td><?php echo __('TOTAL') ?></td>												<td><?php echo $sects['sum(planned_investment)'] ?></td>												<td><?php echo $sects['sum(planned_investment)'] ?></td>											</tr>										</tbody>									</table>									                                   								</div>								</div>							</div>						</div>					</div></div><script type="text/javascript" charset="utf-8">			$(document).ready( function () {				$('#example').dataTable( {					"sDom": 'T<"clear">lfrtip',					//"sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",					"oTableTools": {                "sSwfPath": "<?php sfConfig::get('sf_web_dir')?>/swf/pdfs.swf"                 },				} );					} );		</script>
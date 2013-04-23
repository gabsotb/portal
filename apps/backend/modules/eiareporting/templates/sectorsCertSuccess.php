<div id="page" class="dashboard">					<div class="row-fluid">						<div class="span11">						    <div class="widget">							 <div class="widget-title">									<h4><i class="icon-certificate"></i><?php echo __('INVESTMENT CERTIFICATES ISSUED PER SECTOR') ?></h4>									<span class="tools">									<a href="javascript:;" class="icon-refresh"></a>																				</span>															</div>						   	<div class="widget-body">							   <?php $categories = array();                                     $categories_values = array();							   ?>									<table class="table table-striped table-bordered" id="investment_applications_manager">										<thead>											<tr>																								<th><?php echo __('SECTOR NAME') ?></th>												<th ><?php echo __('INVESTMENT CERTIFICATES') ?></th>																							</tr>										</thead>										<tbody>										   <?php foreach($sectors_certs as $sects): ?>											<tr class="odd gradeX">																								<td><?php echo $sects['business_sector'] ?></td>												<td><?php echo $sects['count(serial_number)'] ?></td>												<?php  												$categories [] = array($sects['business_sector']);                                                $categories_values [] =  $sects['count(serial_number)']; 																								?>											</tr>											<?php endforeach; ?>											<?php $cat = json_encode($categories);											       $val = json_encode($categories_values);												   //$FileName = str_replace("'", " ", $val);												     $values =  str_replace('"', "", $val);													//echo $final; exit;												   //////											?>										</tbody>									</table>									<a href="<?php echo url_for('reports/list')?>"><button class="btn btn-inverse"><i class="icon-print"></i><?php echo __('Print') ?></button></a>									<a href="<?php echo url_for('reports/excelList')?>"> <button class="btn btn-primary"><i class="icon-download"></i> <?php echo __('Export Excel') ?></button></a>                                   								</div>								</div>							</div>						</div>						<div class="row-fluid">						 <div class="span11">							<div class="widget">								  <div class="widget-title">													<h4><i class="icon-signal"></i><?php echo __('Graphical Analysis - Investment Certificates Per Sector') ?></h4>																							</div>								<div id="cont" class="widget-body">																	</div>							</div> <!-- END Graph-->							</div>						 </div>					</div><script type="text/javascript">$(function () {    var chart;    $(document).ready(function() {        chart = new Highcharts.Chart({            chart: {                renderTo: 'cont',                type: 'bar'            },            title: {                text: 'NUMBER OF INVESTMENT CERTIFICATES ISSUED TO INVESTORS PER SECTOR'            },            subtitle: {                text: 'Source: RDB Investors E-portal'            },            xAxis: {                categories: <?php echo $cat ?>,                title: {                    text: null                }            },            yAxis: {                min: 0,                title: {                    text: 'No of Certificates',                    align: 'high'                },                labels: {                    overflow: 'justify'                }            },            tooltip: {                formatter: function() {                    return ''+                        this.series.name +': '+ this.y +'';                }            },            plotOptions: {                bar: {                    dataLabels: {                        enabled: true                    }                }            },            legend: {                layout: 'vertical',                align: 'right',                verticalAlign: 'top',                x: -100,                y: 100,                floating: true,                borderWidth: 1,                backgroundColor: '#FFFFFF',                shadow: true            },            credits: {                enabled: false            },            series: [{                name: 'Year <?php echo date('Y') ?>',                data: <?php echo $values  ?>                 }]        });    });    });		</script>
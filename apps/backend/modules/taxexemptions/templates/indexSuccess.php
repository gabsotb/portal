
<!--some Javascripts for Loading High Charts Graph -->
 <script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'cont',
                type: 'column',
				height: 500,
				width: 700
            },
            title: {
                text: '<?php echo __('RDB Tasks Performance Analysis. Year 2013') ?>'
            },
            subtitle: {
                text: '<?php echo __('Source: Rwanda Development Board') ?>'
            },
            xAxis: {
                categories: [
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'May',
                    'Jun',
                    'Jul',
                    'Aug',
                    'Sep',
                    'Oct',
                    'Nov',
                    'Dec'
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: '<?php echo __('Number of Items Processed') ?>'
                }
            },
			credits:
				{
					enabled: false
				},
            legend: {
                layout: 'vertical',
                backgroundColor: '#FFFFFF',
                align: 'left',
                verticalAlign: 'top',
                x: 100,
                y: 70,
                floating: true,
                shadow: true
            },
            tooltip: {
                formatter: function() {
                    return ''+
                        this.x +': '+ this.y +' ';
                }
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
                series: [{
                name: '<?php echo __('Investment Certificates') ?>',
                data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
    
            }, {
                name: '<?php echo __('EIA Certificates') ?>',
                data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]
    
            }, {
                name: '<?php echo __('Tax Exemptions') ?>',
                data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]
    
            }, {
                name: '<?php echo __('Visa Issued') ?>',
                data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]
    
            }]
        });
    });
    
});
		</script>
<div class="row-fluid">
               <div class="span12">
						<!-- BEGIN STYLE CUSTOMIZER-->
						<!-- END STYLE CUSTOMIZER-->    	
						<!-- BEGIN PAGE TITLE & BREADCRUMB-->		
						<h3 class="page-title">
							<?php echo __('Managers Account') ?>
							<small><?php echo __('Process Tax Exemptions Request')?></small>
						</h3>
							<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="<?php echo url_for('dashboard/index')?>"><?php echo __('Dashboard') ?></a> <span class="divider">/</span>
							</li>
							<li>
							<i class="icon-desktop"></i>
							<a href="<?php echo url_for('dashboard/index')?>"><?php echo __('Tax Exemptions') ?></a></li> <span class="divider">/</span>
							<li>
							<i class="icon-user"></i>
							<a href="#">
							   <b>
								  <font color="blue">
									<?php $username = sfContext::getInstance()->getUser()->getGuardUser()->getUsername();
                                      print 'Welcome, You are logged in as '.$username;
									?>
									</font>
								</b>
							</a></li>
							<li class="pull-right dashboard-report-li">
							<i class="icon-time"></i>
				              <?php echo __('Logged in on') ?> <font color="blue">
									<?php
                                       $date = date("F j, Y");
									   print $date;
									?>
									</font>
							</li>
							
						</ul>
						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>
					<div class="span11">
					     <div class="span8">
						   	<div class="widget">
								<div class="widget-title">
									<h4><i class="icon-globe"></i><?php echo __('Tax Exemption Processing') ?></h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									<a href="#widget-config" data-toggle="modal" class="icon-wrench"></a>
									<a href="javascript:;" class="icon-refresh"></a>		
									<a href="javascript:;" class="icon-remove"></a>										
									</span>							
								</div>
								<div class="widget-body">
								<?php //get user process information 
								$username =  sfContext::getInstance()->getUser()->getGuardUser()->getUserName();
								$user_id = sfContext::getInstance()->getUser()->getGuardUser()->getId();
								?>
								 <table class="table table-striped table-bordered" id="investmentcertsadmin">
									  <thead>
										<tr>
										  <th><?php echo __('Company name') ?></th>
										  <th><?php echo __('Investment Certificate') ?></th>
										  <th><?php echo __('Company Tin')?></th>
										  <th><?php echo __('Action') ?></th>
										</tr>
									  </thead>
									  <tbody>
										<?php foreach ($requests as $r): ?>
										<tr>
										  
										  
										  <td><?php echo $r['company_name']?></td>
										  <td><?php echo $r['investment_certificate'] ?></td>
										  <td><?php echo $r['company_tin'] ?></td>
										  <td>
										  <a href="<?php echo url_for('taxexemptions/process?id='.$r['id'].'&user='.$username.'&identity='.$user_id)?>">
										  <button class="btn btn-success"><i class="icon-ok icon-white"></i> <?php echo __('Process')?></button>
										  </a>
										  </td>
										</tr>
										<?php endforeach; ?>
									  </tbody>
									</table>
								</div>
							</div>
						 </div>
						 <div class="span4">
							<!-- BEGIN NOTIFICATIONS PORTLET-->
							<div class="widget">
								<div class="widget-title">
									<h4><i class="icon-bell"></i>Tax Exemption Notifications</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									<a href="#widget-config" data-toggle="modal" class="icon-wrench"></a>
									<a href="javascript:;" class="icon-refresh"></a>
									</span>							
								</div>
								<div class="widget-body">
									<ul class="item-list scroller padding" data-height="307" data-always-visible="1">
										<li>
											<span class="label label-success"><i class="icon-bell"></i></span>
											<span>New user registered.</span>
											<span class="small italic">Just now</span>
										</li>
										<li>
											<span class="label label-success"><i class="icon-bell"></i></span>
											<span>New order received.</span>
											<span class="small italic">15 mins ago</span>
										</li>
										<li>
											<span class="label label-warning"><i class="icon-bullhorn"></i></span>
											<span>Alerting a user account balance.</span>
											<span class="small italic">2 hrs ago</span>
										</li>	
									</ul>
									<div class="space5"></div>
									<a href="#" class="pull-right">View all notifications</a>										
									<div class="clearfix no-top-space no-bottom-space"></div>
								</div>
							</div>
							<!-- END NOTIFICATIONS PORTLET-->
						</div>
				     </div>
					 

</div>
<div class="row-fluid">
      <div class="span10">
						<div class="widget">
						          <div class="widget-title">
									<h4><i class="icon-signal"></i><?php echo __('Tax Exemption Requests Processed') ?></h4>
															
								</div>
								<div id="cont" class="widget-body">
									
								</div>
							</div>
							
				 </div>
</div>
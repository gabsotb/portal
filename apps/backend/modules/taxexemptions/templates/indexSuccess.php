
<!--some Javascripts for Loading High Charts Graph -->
 <script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'cont',
                type: 'line',
                marginRight: 130,
                marginBottom: 25
            },
            title: {
                text: 'Graph Representation of Tax Exemptions Requests Processed, Year 2013',
                x: -20 //center
            },
            subtitle: {
                text: 'Source: RDB  Investor E-portal',
                x: -20
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: 'No of Processed Requests'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                formatter: function() {
                        return '<b>'+ this.series.name +'</b><br/>'+
                        this.x +': '+ this.y +'°C';
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -10,
                y: 100,
                borderWidth: 0
            },
            series: [{
                name: 'Tax Exemptions Requests',
                data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
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
										  <th><?php echo __('COMPANY NAME') ?></th>
										  <th><?php echo __('INVESTMENT CERTIFICATE NO') ?></th>
										  <th><?php echo __('TIN NUMBER')?></th>
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
											<span>A New Tax Exemptions Request.</span>
											<span class="small italic">Just now</span>
										</li>
										<li>
											<span class="label label-success"><i class="icon-bell"></i></span>
											<span>A New Tax Exemptions Request</span>
											<span class="small italic">15 mins ago</span>
										</li>
										<li>
											<span class="label label-warning"><i class="icon-bullhorn"></i></span>
											<span>Tax Exemption Request Processed</span>
											<span class="small italic">2 hrs ago</span>
										</li>	
									</ul>
									
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
<div id="page" class="dashboard">
    <div class="row-fluid">
	
	    <div class="span12">
						<!-- BEGIN STYLE CUSTOMIZER-->
						<!-- END STYLE CUSTOMIZER-->    	
						<!-- BEGIN PAGE TITLE & BREADCRUMB-->		
						<h3 class="page-title">
							Managers Account
							<small>Assign Tasks and Manage User Accounts</small>
						</h3>
							<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="#">Dashboard</a> <span class="divider">/</span>
							</li>
							<li>
							<i class="icon-desktop"></i>
							<a href="#">Manager</a></li> <span class="divider">/</span>
							<li>
							<i class="icon-desktop"></i>
							<a href="#">Show Information Portlets</a></li> <span class="divider">/</span>
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
				              Logged in on <font color="blue">
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
	
	       <div class="widget">
	           <div class="widget-title">
									<h4>Information Portlets - Investment & EIA Certificates and Tax Exemptions</h4>						
								</div>
				<div class="widget-body">
				<table class="table table-striped table-bordered table-advance table-hover">
				  <tbody>
					<tr>
					  <th>Investment Certificate:</th>
					  <td><?php echo html_entity_decode($portlets->getInvestmentCertificate()) ?></td>
					</tr>
					<tr>
					  <th>EIA Certificate:</th>
					  <td><?php echo html_entity_decode($portlets->getEiaCertificate()) ?></td>
					</tr>
					<tr>
					  <th>Tax Exemptions:</th>
					  <td><?php echo html_entity_decode($portlets->getTaxExemptions()) ?></td>
					</tr>
					<tr>
					  <th>Actions</th>
					  <td> <a href="<?php echo url_for('portlets/edit?id='.$portlets->getId()) ?>">
					  <button class="btn btn-primary"><i class="icon-pencil icon-white"></i> Edit</button></a>
					  &nbsp;<a href="<?php echo url_for('portlets/index') ?>"><button class="btn btn-info"><i class="icon-ban-circle icon-white"></i> Back</button></a>
					  </td>
					 
					</tr>
				  </tbody>
				</table>
				
		
		 </div>
		 </div>
		 </div>
		
    </div>

</div>

<?php //print_r($my_certificates); exit;?>
<div class="row-fluid">
			  <div class="span12">
				<div class="widget">
				 <div class="widget-title">
					<h4><i class="icon-certificate"></i><?php echo __('Showing A List of Certificates Issued To This Account') ?><i class="icon-certificate"></i></h4>						
					</div>
            <div class="widget-body">
			  <table class="table table-striped table-bordered table-advance table-hover" id="investment_applications_manager">
			    <thead>
					<tr>
						<th><i class="icon-briefcase"></i><?php echo __('Company') ?></span></th>
						<th><i class="icon-barcode"></i><?php echo __('TIN Number') ?></span></th>
						<th><i class="icon-group"></i><?php echo __('Business Sector') ?></span></th>
						<th><i class="icon-envelope"></i><?php echo __('Physical Location') ?></span></th>
						<th><i class="icon-certificate"></i><?php echo __('Certificate Number') ?></span></th>
						<th><i class="icon-download"></i><?php echo __('Action') ?></span></th>
						
					</tr>
				 </thead>
				<tbody>
				 <?php foreach($certificates as $certs): ?>
					<tr>
					<td><?php echo $certs['company'] ?></td>
					<td><?php echo $certs['tin'] ?></td>
					<td><?php echo $certs['location'] ?></td>
					<td><?php echo $certs['sector'] ?></td>
					<td><?php echo $certs['cert'] ?></td>
					<td>
					<a href="<?php echo url_for('investmentapp/PrintCert?id='.$certs['id'].'&token='.$certs['token']) ?>"
					<button class="btn btn-success"><i class="icon-download"></i> <?php echo __('Download') ?></button>
					</td>
					</tr>
				<?php endforeach; ?>	
				</tbody>
			   
			  </table>
				    <br/>
			 <div>
			  <a href="<?php echo url_for('investmentapp/index') ?>"> 
											<button type="button" class="btn btn-primary"><?php echo __('Home') ?></button>
											</a>
			 </div>
		    </div>			 

			</div>
			</div>
			
</div>

<div class="row-fluid">
			  <div class="span8">
				<div class="widget">
				 <div class="widget-title">
					<h4><i class="icon-certificate"></i><?php echo __('Certificate Error') ?><i class="icon-certificate"></i></h4>						
					</div>
            <div class="widget-body">
			 <div class="alert alert-block alert-error fade in">
														
							<h4 class="alert-heading"><?php echo __('Message') ?></h4>
							<p>
								<?php echo __('Sorry Your Business Tin Number has already been issued with Investment Certificate.') ?> 
							</p>
			 </div>
				 <div class="alert alert-block alert-success">	
                   <h4><i class="icon-certificate"></i><?php echo __('Your Investment Certificate Details') ?></h4>
				   <table class="table table-striped table-bordered" id="cert_details">
				   <?php 
				    $name = null;
					$location = null;
					$telephone = null;
					$serial = null;
					$date = null ;
				   ?>
				   <?php foreach($query_info as $info): ?>
				     <?php 
					$name = $info['name'];
					$location = $info['location'];
					$telephone = $info['office_telephone'];
					$serial =$info['serial_number'];
					$date = $info['created_at'] ; 
					
					?>
				   <?php endforeach; ?> 
				     <tr>
					 <td><?php echo __('Business Name')?></td> <td><?php echo $name ?></td>
					 </tr> 
				     <tr>
					 <td><?php echo __('Location')?></td> <td><?php echo $location ?></td>
					 </tr>
					 <tr>
					 <td><?php echo __('Telephone') ?></td> <td><?php echo $telephone ?></td>
					 </tr>
					 <tr>
					 <td><?php echo __('Certificate Number')?></td> <td><?php echo $serial ?></td>
					 </tr>
					 <tr>
					 <td><?php echo __('Date Issued') ?></td> <td><?php echo $date ?></td>
					 </tr>
					
				   </table>
			     </div>    
				 <div>
				  <a href="<?php echo url_for('investmentapp/index') ?>"> 
												<button type="button" class="btn btn-primary"><?php echo __('Dashboard') ?></button>
												</a>
				 </div>
		    </div>			 

			</div>
			</div>
			
</div>

<div class="row-fluid">
			  <div class="span12">
				<div class="widget">
						 <div class="widget-title">
							<h4><?php echo __('ENVIRONMENTAL IMPACT ASSESSEMENT ') ?></h4>						
							</div>
							<div class="widget-body">
							<div class="alert alert-block alert-info fade in">
																	
										<h4 class="alert-heading"><?php echo __('Report Submission') ?></h4>
										<p>
											<?php echo __('Please Provide below details to submit your environmental impact assessement report') ?> 
										</p>
									 </div>
									 <?php 
									 //$id = sfContext::getInstance()->getUser()->getAttribute('session_business_id');
	                                 //print "value is ".$id; exit; 
									 
									 ?>
								  <?php include_partial('form', array('form' => $form)) ?>
					         </div>			 

			    </div>
			</div>
		
</div>
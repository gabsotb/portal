<?php use_helper('I18N') ?>
<div class="row-fluid">
			  <div class="span12">
				<div class="widget">
						 <div class="widget-title">
							<h4><?php echo __('INVESTMENT CERTIFICATES -- Your Investment Details') ?></h4>						
							</div>
							<div class="widget-body">
							<div class="alert alert-block alert-info fade in">
																	
										<h4 class="alert-heading"><?php echo __('Step 2') ?></h4>
										<p>
											<?php echo __('Please Tell us more about Your Planned Investment i.e. Investment Details') ?> 
										</p>
									 </div>
									 <?php 
									 //$id = sfContext::getInstance()->getUser()->getAttribute('session_business_id');
	                                 //print "value is ".$id; exit; 
									 
									 ?>
								 <?php include_partial('businessplan/form', array('form' => $form)) ?>
					         </div>			 

			    </div>
			</div>
		
</div>

<div class="row-fluid">
						<div class="span11">
						   <div class="widget">
								<div class="widget-title">
									<h4><?php echo __('Search Results') ?></h4>						
								</div>
								<div class="widget-body">
										<table class="table table-striped table-bordered table-advance table-hover">
										 <thead>
											<tr>
												<th><span class="hidden-phone"><?php echo __('Name') ?></span></th>
												<th><span class="hidden-phone"><?php echo __('Location') ?></span></th>
												<th><span class="hidden-phone"><?php echo __('TIN Number') ?></span></th>
												<th><span class="hidden-phone"><?php echo __('Sector') ?></span></th>
												<th><span class="hidden-phone"><?php echo __('District') ?></span></th>
												<th><span class="hidden-phone"><?php echo __('Province') ?></span></th>
											</tr>
										</thead>
										<tbody>
										  <?php foreach($investor as $invest): ?>
										     <tr>
											 <td><?php echo $invest->getName(); ?></td>
											 <td><?php echo $invest->getLocation();?></td>
											 <td><?php echo $invest->getRegistrationNumber(); ?></td>
											 <td><?php echo $invest->getSector(); ?></td>
											 <td><?php echo $invest->getDistrict(); ?></td>
											 <td><?php echo $invest->getCityProvince(); ?></td>
											 </tr>
										  <?php endforeach; ?>
										</tbody>
										</table>
									
									
									
								</div>
							</div>
						</div>
</div>
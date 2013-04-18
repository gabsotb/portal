<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<?php
  $eiaprojectid = sfContext::getInstance()->getUser()->getAttribute('eiaprojectid');
  $eiaproject_query = Doctrine_Core::getTable('EIAProjectDeveloper')->getProjectDetailTokenAndId($eiaprojectid);
  $eai_project_developer_token = null ;
  $eia_project_developer_id = null ;
  //
  foreach($eiaproject_query as $q)
  {
   $eai_project_developer_token = $q['token'];
   $eia_project_developer_id = $q['id'];
  }
  ///
  ?>

<form action="<?php echo url_for('projectDescription/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <div class="widget">
     <div class="widget-body">
  <table class="table table-striped table-bordered" id="eia_table2">
  <tbody>
      <div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['project_nature']->renderRow(array('class' => 'span11 chosen')) ?>
				</div>
			</div>
		</div>
	 <div class="control-group">
		<div class="controls">
			<div class="input-prepend"> 
				<?php echo $form['project_objective']->renderRow(array('class' => 'span12 wysihtml5' ,'rows' => '10'))?>
			</div>
		</div>
	</div>	
	 
   <div class="control-group">
		<div class="controls">
			<div class="input-prepend">
				<?php echo $form['project_total_cost']->renderRow(array('class' => 'span4')) ?>
			</div>
		  </div>
	</div>
	<div class="control-group">
		<div class="controls">
			<div class="input-prepend">
				<?php echo $form['project_working_capital']->renderRow(array('class' => 'span4')) ?>
			</div>
		  </div>
	</div>
   <div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					
					<?php echo $form->renderHiddenFields(); ?>
				</div>
			</div>
		</div>
	
    </tbody>
 
    
  </table>
  </div>
</div>
<div class="widget">
	     <div class="widget-title">
									<h4>Land Information</h4>						
								</div>
								<div class="widget-body">
								   <table class="table table-striped table-bordered" id="eia_table2">
                                     <tbody>
								    <div class="control-group">
										<div class="controls">
											<div class="input-prepend">
												<?php echo $form['total_land_area']->renderRow(array('class' => 'span4')) ?>
											</div>
										  </div>
									</div>
									<div class="control-group">
										<div class="controls">
											<div class="input-prepend">
												<?php echo $form['existing_land_use']->renderRow(array('class' => 'span6')) ?>
											</div>
										  </div>
									</div>
									</tbody>
									</table>
								</div>
</div>

<div class="widget">
	     <div class="widget-title">
									<h4>Project Site - Description of the General Location of the project Site</h4>						
								</div>
								<div class="widget-body">
								 <table class="table table-striped table-bordered" id="eia_table3">
                                     <tbody>
										<div class="controls">
										 <tr>
										 <td><?php echo $form['site_location_developed_area']->render() ?>	</td>
										 <td><?php echo $form['site_location_developed_area']->renderLabel() ?>	</td>
										 </tr>
										 	
										</div>
										<div class="controls">
										<tr>
										<td><?php echo $form['site_location_undeveloped_area']->render() ?></td>
										<td><?php echo $form['site_location_undeveloped_area']->renderLabel() ?></td>
										</tr>
										 
										</div>
										<div class="controls" id="checkbox_other">
										<tr>
										<td> <?php echo $form['site_location_other']->render(array('onclick' => 'return ProjectSiteSpecify(eia_project_description_site_location_other_specify)')) ?></td>
										<td><?php echo $form['site_location_other']->renderLabel() ?></td>
										</tr>
										<tr>
										<td><?php echo $form['site_location_other_specify']->renderLabel() ?></td>
										<td><?php echo $form['site_location_other_specify']->render(array('class' => 'span8 wysihtml5' ,'rows' => '10')) ?></td>
										</tr>
										 
										 </div>
									
									</tbody>
									</table>
									
								</div>
</div>
<div class="widget">
	     <div class="widget-title">
									<h4>Land Use Classification - Base on approval land use plan of the City or District</h4>						
								</div>
								<div class="widget-body">
								 <table class="table table-striped table-bordered" id="eia_table3">
                                     <tbody>
										<div class="controls" id="checkbox_other">
										<tr>
										<td><?php echo $form['land_use_residential']->render() ?></td>
										<td><?php echo $form['land_use_residential']->renderLabel() ?></td>
										</tr>
										<tr>
										<td><?php echo $form['land_use_industrial']->render() ?></td>
										<td><?php echo $form['land_use_industrial']->renderLabel() ?></td>
										</tr>
										 <tr>
										<td><?php echo $form['land_use_tourism']->render() ?></td>
										<td><?php echo $form['land_use_tourism']->renderLabel() ?></td>
										</tr>
										<tr>
										<td><?php echo $form['land_use_commercial']->render() ?></td>
										<td><?php echo $form['land_use_commercial']->renderLabel() ?></td>
										</tr>
										<tr>
										<td><?php echo $form['land_use_instituational']->render() ?></td>
										<td><?php echo $form['land_use_instituational']->renderLabel() ?></td>
										</tr>
										<tr>
										<td><?php echo $form['land_use_openspace']->render() ?></td>
										<td><?php echo $form['land_use_openspace']->renderLabel() ?></td>
										</tr>
										<tr>
										<td><?php echo $form['land_use_other']->render(array('onclick' => 'return LandUseSpecify(eia_project_description_land_use_other_specify)')) ?></td>
										<td><?php echo $form['land_use_other']->renderLabel() ?></td>
										</tr>
										<tr>
										<td><?php echo $form['land_use_other_specify']->renderLabel() ?></td>
										<td><?php echo $form['land_use_other_specify']->render(array('class' => 'span8 wysihtml5' ,'rows' => '10')) ?></td>
										</tr>
										 </div>
									
									</tbody>
									</table>
									
								</div>
</div>
<div class="widget">
	                           <div class="widget-title">
									<h4>Project Components - List All Project Components Below</h4>						
								</div>
								<div class="widget-body">
								 <?php echo $form['project_components']->render(array('class' => 'span12 wysihtml5' ,'rows' => '10'))?>
								</div>
</div>
<div class="widget">
	                           <div class="widget-title">
									<h4>Project Activities  - Activities During all phases(Design, Implementation, Operation, Decommissioning)</h4>						
								</div>
								<div class="widget-body">
								 <?php echo $form['project_activities']->render(array('class' => 'span12 wysihtml5' ,'rows' => '10'))?>
								</div>
</div>
<div class="widget">
	                           <div class="widget-title">
									<h4>Utilities and Infrastructures</h4>						
								</div>
								<div class="widget-body">
								       <div class="widget">
									      <div class="widget-title">
												<h4>Water Demand</h4>						
										   </div>
										   <div class="widget-body">
										    <h4>What is the estimated daily water requirement for entire project during: </h4>
                                             <b>Project Implementation?(in cubic meter) </b> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; <?php echo $form['water_demand_during_implementation']->render(array('class' => 'input-small')) ?> <br/>	
											 <b>Water Demand During operation? (in cubic meter)</b> &nbsp; &nbsp;&nbsp;<?php echo $form['water_demand_during_operation']->render(array('class' => 'input-small')) ?> <br/>	
											 
										   </div>
									   
									   </div>
									   <div class="widget">
									      <div class="widget-title">
												<h4>Water Supply</h4>						
										   </div>
										   <div class="widget-body">
										     <h4>Is the project going to connect to an existing public water supply system?</h4>
                                             	<?php echo $form['public_water_supply']->render(array()) ?>										 
										   </div>
									   
									   </div>
									   <div class="widget">
									      <div class="widget-title">
												<h4>Water Treatment</h4>						
										   </div>
										   <div class="widget-body">
										     <h4>Is there provision for water treatment?</h4>
                                             	<?php echo $form['water_treatment']->render(array()) ?>										 
										   </div>
									   
									   </div>
									   <div class="widget">
									      <div class="widget-title">
												<h4>Sewage Disposal System</h4>						
										   </div>
										   <div class="widget-body">
										     <h4>What type of sewage disposal system is available for your upcoming project?</h4>
                                     <table class="table table-striped table-bordered" id="eia_table5">
                                     <tbody>
										<div class="controls" id="checkbox_other1">
										<tr>
										<td><?php echo $form['sewage_system_modern']->render() ?></td>
										<td><?php echo $form['sewage_system_modern']->renderLabel() ?></td>
										</tr>
										<tr>
										<td><?php echo $form['sewage_system_ecosan']->render() ?></td>
										<td><?php echo $form['sewage_system_ecosan']->renderLabel() ?></td>
										</tr>
										<tr>
										<td><?php echo $form['sewage_system_biogas']->render() ?></td>
										<td><?php echo $form['sewage_system_biogas']->renderLabel() ?></td>
										</tr>
										
										 </div>
									
									</tbody>
									</table>	
									<br/>
									<p>
										<?php echo $form['sewage_system_capacity']->renderLabel() ?>
										<?php echo $form['sewage_system_capacity']->render() ?> </p>
																		
										   </div>
									   
									   </div>
								</div>
</div>
<div class="widget">
	                           <div class="widget-title">
									<h4>Power Supply: </h4>						
								</div>
								<div class="widget-body">
								<h4>Sources of power supply</h4>
								  <table class="table table-striped table-bordered" id="eia_table5">
                                     <tbody>
										<div class="controls" id="checkbox_other1">
										<tr>
										<td><?php echo $form['power_supply_local_electricity']->render() ?></td>
										<td><?php echo $form['power_supply_local_electricity']->renderLabel() ?>
										    <?php echo $form['power_supply_local_electricity_size']->renderLabel() ?>
										    <?php echo $form['power_supply_local_electricity_size']->render() ?>
										</td>
										
										
										</tr>
										<tr>
										<td><?php echo $form['power_supply_own_generator']->render() ?></td>
										<td><?php echo $form['power_supply_own_generator']->renderLabel() ?>
										    <?php echo $form['power_supply_own_generator_capacity']->renderLabel() ?>
										    <?php echo $form['power_supply_own_generator_capacity']->render() ?>
										</td>
										
										
										</tr>
										<tr>
										<td><?php echo $form['power_supply_other']->render() ?></td>
										<td><?php echo $form['power_supply_other']->renderLabel() ?>
										   <?php echo $form['power_supply_other_specify']->renderLabel() ?>
										   <?php echo $form['power_supply_other_specify']->render() ?>
										</td>
										</tr>
										
										 </div>
									
									</tbody>
									</table>	
								</div>
</div>
<div class="widget">
	                           <div class="widget-title">
									<h4>Solid Waste Management: </h4>						
								</div>
								<div class="widget-body">
								<h4>Types of solid wastes to be generated during all project phases:</h4>
								<h4>Disposal System</h4>
								  <table class="table table-striped table-bordered" id="eia_table6">
                                     <tbody>
										<div class="controls" id="checkbox_other6">
										<tr>
										<td><?php echo $form['solid_waste_ecological']->render() ?></td>
										<td><?php echo $form['solid_waste_ecological']->renderLabel() ?></td>
										
										
										</tr>
										<tr>
										<td><?php echo $form['solid_waste_dumpsite']->render() ?></td>
										<td><?php echo $form['solid_waste_dumpsite']->renderLabel() ?></td>
										
										
										</tr>
										<tr>
										<td><?php echo $form['solid_waste_municipal']->render() ?></td>
										<td><?php echo $form['solid_waste_municipal']->renderLabel() ?></td>
										</tr>
										<tr>
										<td><?php echo $form['solid_waste_others']->render() ?></td>
										<td><?php echo $form['solid_waste_others']->renderLabel() ?>
										<?php echo $form['solid_waste_others_specify']->renderLabel() ?>
										<?php echo $form['solid_waste_others_specify']->render() ?>
										</td>
										</tr>
																				 </div>
									
									</tbody>
									</table>	
								</div>
</div>
<div class="widget">
	                           <div class="widget-title">
									<h4>Man Power and Employment </h4>						
								</div>
								<div class="widget-body">
								<h4>How many people will be employed by the project?</h4>
								<b>During the Design/Implementation period: </b> &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;<?php echo $form['man_power_employment_implementation']->render(array('class' => 'input-small')) ?><br/>
								<b>During the operation and maintenance period:</b> &nbsp;&nbsp; <?php echo $form['man_power_employment_operation']->render(array('class' => 'input-small')) ?>
								  
								</div>
</div>
<div class="widget">
	                           <div class="widget-title">
									<h4>Project Implementation duration</h4>						
								</div>
								<div class="widget-body">
								<h4>How long will the implementation/construction period take? </h4>
							    <?php echo $form['implementation_duration']->render(array('class' => 'input-small')) ?> Months
								  
								</div>
</div>
 <div>
    <a href="<?php echo url_for('eiaProjectDeveloper/edit?id='.$eia_project_developer_id.'&token='.$eai_project_developer_token) ?>" class="btn"><?php echo __('Previous') ?> <i class="icon-step-backward"></i></a> 
   <input type="submit" class="btn btn-primary" value="Next" />
 </div>
</form>

<script>
		 
   $(document).ready(function() {
   $('#eia_project_description_site_location_other_specify').parent().parent().hide();
    $('#eia_project_description_land_use_other_specify').parent().parent().hide();
   });
   function ProjectSiteSpecify(check)
     {
      $('#eia_project_description_site_location_other_specify').parent().parent().show();
	 }
	 function LandUseSpecify(check)
     {
      $('#eia_project_description_land_use_other_specify').parent().parent().show();
	 }
	 
	 
	  
</script>


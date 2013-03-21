<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('eiaProjectSurrounding/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?> class="form-horizontal">
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>

<div class="row-fluid">
	
		<div class="widget">
			<div class="widget-title">
				<h4> Physical Environment</h4>
			</div>
			<div class="widget-body form">
			<?php echo $form->renderGlobalErrors() ?>
			<div class="row-fluid">
			<div class="span6">
			<h4> What is the general elevation of the project area:</h4>
			</div>
			<div class="span4">
			<?php echo $form['project_general_elevation']->render(array('class' => 'span4')) ?>
			<span class="help-inline">in m.a.s.l</span>
			</div>
			</div>
			<h4>Are there areas in the site where indications of soil erosion are occuring?</h4>
			<table class="table table-hover table-bordered">
			<tr class="input-prepend">
			<td><?php echo $form['soil_erosion']->render(array('onclick' => 'return Erosion(eia_project_surrounding_soil_erosion_heavy_rains)')) ?></td>
			<td><?php echo $form['soil_erosion']->renderLabel('Select if true') ?></td>
			<span class="help-inline"><?php echo $form['soil_erosion']->renderError() ?></span>
			</tr>
			</table>
			<h4>If true, what activities are causing erosion?</h4>
			<table class="table table-hover table-bordered">
			<tr>
			<td><?php echo $form['soil_erosion_heavy_rains'] ?></td>
			<td><?php echo $form['soil_erosion_heavy_rains']->renderLabel('Heavy rains') ?></td>
			<span class="help-inline"><?php echo $form['soil_erosion_heavy_rains']->renderError() ?></span>
			</tr>
			<tr>
			<td><?php echo $form['soil_erosion_unstable'] ?></td>
			<td><?php echo $form['soil_erosion_unstable']->renderLabel('Unstable slopes') ?></td>
			<span class="help-inline"><?php echo $form['soil_erosion_unstable']->renderError() ?></span>
			</tr>
			<tr> 
			<td><?php echo $form['soil_erosion_others'] ?></td>
			<td><?php echo $form['soil_erosion_others']->renderLabel('Others?') ?></td>
			<span class="help-inline"><?php echo $form['soil_erosion_others']->renderError() ?></span>
			</tr>
			<tr>
			<td>
			<?php echo $form['soil_erosion_others_specify']->renderLabel('Please specify:') ?>
			</td>
			<td>
			<?php echo $form['soil_erosion_others_specify']->render() ?>
			<span class="help-inline"><?php echo $form['soil_erosion_others_specify']->renderError() ?></span>
			</td>
			</tr>
			</table>
			<h4> Are there existing water bodies found near or within the site i.e creeks/streams/lakes?</h4>
			<table class="table table-hover table-bordered">
			<tr class="input-prepend">
			<td><?php echo $form['existing_water_body'] ?></td>
			<td><?php echo $form['existing_water_body']->renderLabel('Select if true') ?></td>
			<span class="help-inline"><?php echo $form['existing_water_body']->renderError() ?></span>
			</tr>
			</table>
			<h4> If true,enumerate/mention the water bodies and their location/distance from the project site:</h4>
			<table class="table table-hover table-bordered">
			<tr>
			<td><?php echo $form['existing_water_body_remark']->renderLabel('Water bodies name and loaction/distance from site') ?></td>
			<td><?php echo $form['existing_water_body_remark']->render(array('class' => 'span12 wysihtml5' ,'rows' => '10')) ?></td>
			<span class="help-inline"><?php echo $form['existing_water_body_remark']->renderError() ?></span>
			</tr>
			</table>
			<h4>Is there an access road going to the project site?</h4>
			<table class="table table-hover table-bordered">
			<tr class="input-prepend">
			<td><?php echo $form['access_road'] ?></td>
			<td><?php echo $form['access_road']->renderLabel('Select if true') ?></td>
			<span class="help-inline"><?php echo $form['access_road']->renderError() ?></span>
			</tr>
			</table>
			<br/>
			<div class="row-fluid">
			<div class="span6">
			<h4> If true,state the distance from the site:</h4>
			</div>
			<div class="span4">
			<?php echo $form['access_road_distance']->render(array('class' => 'span4')) ?><span class="help-inline">Km</span>
			<span class="help-inline"><?php echo $form['access_road_distance']->renderError() ?></span>
			</div>
			</div>
			<table class="table table-hover table-bordered">
			<tr>
			<td><?php echo $form['access_road_type']->renderLabel('Type of access road:') ?></td>
			<td><?php echo $form['access_road_type']->render() ?></td>
			<span class="help-inline"><?php echo $form['access_road_type']->renderError() ?></span>
			</tr>
			</table>
			<h4> Does the site conform to the approved land use plan of the city/District?</h4>
			<table class="table table-hover table-bordered">
			<tr class="input-prepend">
			<td><?php echo $form['site_conform_approval'] ?></td>
			<td><?php echo $form['site_conform_approval']->renderLabel('Select if true') ?></td>
			<span class="help-inline"><?php echo $form['site_conform_approval']->renderError() ?></span>
			</tr>
			</table>
			<h4>Remarks on land use:</h4>
			<table class="table table-hover table-bordered">
			<tr>
			<td><?php echo $form['site_conform_remark']->renderLabel('Remarks:') ?></td>
			<td><?php echo $form['site_conform_remark']->render(array('class' => 'span8 wysihtml5' ,'rows' => '10')) ?></td>
			<span class="help-inline"><?php echo $form['site_conform_remark']->renderError() ?></span>
			</tr>
			</table>
			<h4>Are there existing structures or developments around the project site?</h4>
			<table class="table table-hover table-bordered">
			<tr class="input-prepend">
			<td><?php echo $form['site_existing_structure'] ?></td>
			<td><?php echo $form['site_existing_structure']->renderLabel('Select if true') ?></td>
			<span class="help-inline"><?php echo $form['site_existing_structure']->renderError() ?></span>
			</tr>
			</table>
			<h4>If true, list them below:</h4>
			<table class="table table-hover table-bordered">
			<tr>
			<td><?php echo $form['site_existing_remark']->renderLabel('Structure/developments:') ?></td>
			<td><?php echo $form['site_existing_remark']->render(array('class' => 'span12 wysihtml5' ,'rows' => '10')) ?></td>
			<span class="help-inline"><?php echo $form['site_existing_remark']->renderError() ?></span>
			</tr>
			</table>
			</div>
		</div>
</div>
<div class="row-fluid">
	<div class="well well-large">
		<h4>What is the present land use of the area?</h4>
		<table class="table table-hover table-bordered">
		<tbody>
		  <tr>
			<td><?php echo $form['land_use_agriculture'] ?></td>
			<td><?php echo $form['land_use_agriculture']->renderLabel('Agriculture') ?></td>
			<span class="help-inline"><?php echo $form['land_use_agriculture']->renderError() ?></span>
		  </tr>
		  <tr>
			<td><?php echo $form['land_use_grassland'] ?></td>
			<td><?php echo $form['land_use_grassland']->renderLabel('Grassland') ?></td>
			<span class="help-inline"><?php echo $form['land_use_grassland']->renderError() ?></span>
		  </tr>
		  <tr>
			<td><?php echo $form['land_use_builtup'] ?></td>
			<td><?php echo $form['land_use_builtup']->renderLabel('Built -up') ?></td>
			<span class="help-inline"><?php echo $form['land_use_builtup']->renderError() ?></span>
		  </tr>
		  <tr>
			<td><?php echo $form['land_use_marshland'] ?></td>
			<td><?php echo $form['land_use_marshland']->renderLabel('Marshland') ?></td>
			<span class="help-inline"><?php echo $form['land_use_marshland']->renderError() ?></span>
		  </tr>
		  <tr>
			<td><?php echo $form['land_use_other'] ?></td>
			<td><?php echo $form['land_use_other']->renderLabel('Others?') ?></td>
			<span class="help-inline"><?php echo $form['land_use_other']->renderError() ?></span>
		  </tr>
		  <tr>
			<td><?php echo $form['land_use_other_specify']->renderLabel('Specify:') ?></td>
			<td><?php echo $form['land_use_other_specify']->render() ?></td>
			<span class="help-inline"><?php echo $form['land_use_other_specify']->renderError() ?></span>
		  </tr>
		</tbody>
		</table>
	</div>
</div>
	<div class="row-fluid">
		
			<div class="widget">
				<div class="widget-title">
					<h4> Biological Environment</h4>
				</div>
				<div class="widget-body">
				<h4> Are there existing trees and other types of vegetation in the the site? </h4>
				<table class="table table-hover table-bordered">		
				<tr class="input-prepend">
				<td><?php echo $form['existing_trees'] ?></td>
				<td><?php echo $form['existing_trees']->renderLabel('Select if true' ) ?></td>
				<span class="help-inline"><?php echo $form['existing_trees']->renderError() ?></span>
				</tr>
				</table>
				<h4>Please provide examples:</h4>
				<table class="table table-hover table-bordered">
				<tr>
				<td><?php echo $form['existing_trees_remark']->renderLabel('Examples:') ?></td>
				<td><?php echo $form['existing_trees_remark']->render(array('class' => 'span12 wysihtml5' ,'rows' => '10')) ?></td>
				<span class="help-inline"><?php echo $form['existing_trees_remark']->renderError() ?></span>
				</tr>
				</table>
				<h4> Are there birds and other forms of wildlife found in the area?</h4>
				<table class="table table-hover table-bordered">
				<tr class="input-prepend">
				<td><?php echo $form['wildlife_existing'] ?></td>
				<td><?php echo $form['wildlife_existing']->renderLabel('Select if true') ?></td>
				<span class="help-inline"><?php echo $form['wildlife_existing']->renderError() ?></span>
				</tr>
				</table>
				<h4>Wildlife remarks:</h4>
				<table class="table table-hover table-bordered">
				<tr>
				<td><?php echo $form['wildlife_existing_remark']->renderLabel('Remarks:',array('class' => 'control-label')) ?></td>
				<td><?php echo $form['wildlife_existing_remark']->render(array('class' => 'span12 wysihtml5' ,'rows' => '10')) ?></td>
				<span class="help-inline"><?php echo $form['wildlife_existing_remark']->renderError() ?></span>
				</tr>
				</table>
				<h4>Are there fishery resources in the water bodies found near or within the site?</h4>
				<table class="table table-hover table-bordered">
				<tr class="input-prepend">
				<td><?php echo $form['fishery_existing'] ?></td>
				<td><?php echo $form['fishery_existing']->renderLabel('Select if true') ?></td>
				<span class="help-inline"><?php echo $form['fishery_existing']->renderError() ?></span>
				</tr>
				</table>
				<h4>Fishery resources remaks:</h4>
				<table class="table table-hover table-bordered">
				<tr>
				<td><?php echo $form['fishery_existing_remark']->renderLabel('Remarks:') ?></td>
				<td><?php echo $form['fishery_existing_remark']->render(array('class' => 'span12 wysihtml5' ,'rows' => '10')) ?></td>
				<span class="help-inline"><?php echo $form['fishery_existing_remark']->renderError() ?></span>
				</tr>
				</table>
				<h4>Is the site near or within a watershed or forest reservation area?</h4>
				<table class="table table-hover table-bordered">
				<tr class="input-prepend">
				<td><?php echo $form['watershed_existing'] ?></td>
				<td><?php echo $form['watershed_existing']->renderLabel('Select if true') ?></td>
				<span class="help-inline"><?php echo $form['watershed_existing']->renderError() ?></span>
				</tr>
				</table>
				<br/>
				<div class="row-fluid">
				<div class="span4">
				<h4>If near only, how near:</h4>
				</div>
				<div class="span6">
				<?php echo $form['watershed_near_distance'] ?>
				<span class="help-inline"><?php echo $form['watershed_near_distance_units']->render(array('class' => 'span12')) ?></span>
				</div>
				</div>
				<h4>If within, indicate name of the watershed/forest reservation area:</h4>
				<table class="table table-hover table-bordered">
				<tr>
				<td><?php echo $form['watershed_within_name']->renderLabel('Watershed/forest reservation:') ?></td>
				<td><?php echo $form['watershed_within_name']->render(array('class' => 'span12 wysihtml5' ,'rows' => '10')) ?></td>
				</tr>
				</table>
				</div>
			</div>
		
	</div>
				

    <div class="form-actions">
  
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('eiaProjectSurrounding/index') ?>" class="btn">Back</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php //echo link_to('Delete', 'eiaProjectSurrounding/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Next" class="btn btn-primary" />

    </div>
	

</form>
<script>
		 
   /*$(document).ready(function() {
   /$('#eia_project_surrounding_soil_erosion_heavy_rains').parent().parent().hide();
    $('#eia_project_surrounding_soil_erosion_unstable').parent().parent().hide();
	$('#eia_project_surrounding_soil_erosion_others').parent().parent().hide();
	$('#eia_project_surrounding_soil_erosion_others_specify').parent().parent().hide();
   });
   function Erosion(check)
		{
      
		$('#eia_project_surrounding_soil_erosion_heavy_rains').parent().parent().show();
	}
	 function LandUseSpecify(check)
     {
      $('#eia_project_description_land_use_other_specify').parent().parent().show();
	 }*/
	 
	 
	  
</script>

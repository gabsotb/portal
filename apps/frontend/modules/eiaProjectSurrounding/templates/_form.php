<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('eiaProjectSurrounding/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?> class="form-horizontal">
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>

      <?php echo $form->renderGlobalErrors() ?>
      <div class="control-group">
        <?php echo $form['project_general_elevation']->renderLabel('What is the general elevation of the project area in m.a.s.l?',array('class' =>'control-label')) ?>
        <div class="controls">
          <?php echo $form['project_general_elevation']->render(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' => 'Elevation in m.a.s.l')) ?>
		  <span class="help-inline"><?php echo $form['project_general_elevation']->renderError() ?></span>
          
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['soil_erosion']->renderLabel('Indications of soil erosion occurring in the site') ?>
        <div class="controls">
         <?php echo $form['soil_erosion']->render(array('onclick' => 'return causesErosion()'))?> 
		 <span class="help-inline"><?php echo $form['soil_erosion']->renderError() ?></span>
          
        </div>
		
      </div>
	  
      <div class="control-group">
        <?php echo $form['soil_erosion_heavy_rains']->renderLabel('Heavy rains') ?>
        <div>
          <?php echo $form['soil_erosion_heavy_rains'] ?>
		  <span class="help-inline"><?php echo $form['soil_erosion_heavy_rains']->renderError() ?></span>
          
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['soil_erosion_unstable']->renderLabel('Unstable slopes') ?>
        <div class="controls">
          <?php echo $form['soil_erosion_unstable'] ?>
		  <span class="help-inline"><?php echo $form['soil_erosion_unstable']->renderError() ?></span>
          
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['soil_erosion_others']->renderLabel('Others, pleases specify') ?>
        <div class="controls">
          <?php echo $form['soil_erosion_others']->render(array('onclick' => 'return othersErosion()')) ?>
		  <span class="help-inline"><?php echo $form['soil_erosion_others']->renderError() ?></span>
          
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['soil_erosion_others_specify']->renderLabel() ?>
        <div class="controls">
          <?php echo $form['soil_erosion_others_specify'] ?>
		  <span class="help-inline"><?php echo $form['soil_erosion_others_specify']->renderError() ?></span>
          
        </div>
      </div>
	 
      <div class="control-group">
        <?php echo $form['existing_water_body']->renderLabel('Exisiting water bidies near/within the site') ?>
        <div class="controls">
          <?php echo $form['existing_water_body']->render(array('onclick' => 'return waterBodyRemarks()')) ?>
		  <span class="help-inline"><?php echo $form['existing_water_body']->renderError() ?></span>
          
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['existing_water_body_remark']->renderLabel() ?>
        <div class="controls">
          <?php echo $form['existing_water_body_remark']->render(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' => 'Enumerate existing water bodies and their location')) ?>
		  <span class="help-inline"><?php echo $form['existing_water_body_remark']->renderError() ?></span>
          
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['access_road']->renderLabel() ?>
        <div class="controls">
          <?php echo $form['access_road']->render(array('onclick' => 'return roadDistance()')) ?>
		  <span class="help-inline"><?php echo $form['access_road']->renderError() ?></span>
          
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['access_road_distance']->renderLabel('Distance from site') ?>
        <div class="controls">
          <?php echo $form['access_road_distance']->render(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' => 'Distance in Km')) ?> 
		  <span class="help-inline"><?php echo $form['access_road_distance']->renderError() ?></span>
          
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['access_road_type']->renderLabel('Access road type:') ?>
        <div class="controls">
          <?php echo $form['access_road_type'] ?>
		  <span class="help-inline"><?php echo $form['access_road_type']->renderError() ?></span>
          
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['site_conform_approval']->renderLabel('Site conform to the approved land use plan of the city/District') ?>
        <div class="controls">
          <?php echo $form['site_conform_approval'] ?>
		  <span class="help-inline"><?php echo $form['site_conform_approval']->renderError() ?></span>
          
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['site_conform_remark']->renderLabel() ?>
        <div class="controls">
          <?php echo $form['site_conform_remark'] ?>
		  <span class="help-inline"><?php echo $form['site_conform_remark']->renderError() ?></span>
          
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['site_existing_structure']->renderLabel('Existing structures or develpments around the project site') ?>
        <div class="controls">
          <?php echo $form['site_existing_structure']->render(array('onclick' => 'return structureRemark()')) ?>
		  <span class="help-inline"><?php echo $form['site_existing_structure']->renderError() ?></span>
          
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['site_existing_remark']->renderLabel() ?>
        <div class="controls">
          <?php echo $form['site_existing_remark'] ?>
		  <?php echo $form['site_existing_remark']->renderError() ?></span>
          
        </div>
      </div>
      
		<p>What is the present land use of the area?</p>
	
	  <div class="control-group">
        <?php echo $form['land_use_agriculture']->renderLabel('Agriculture') ?>
        <div class="controls">
          <?php echo $form['land_use_agriculture'] ?>
		  <span class="help-inline"><?php echo $form['land_use_agriculture']->renderError() ?></span>
          
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['land_use_grassland']->renderLabel('Grassland') ?>
        <div class="controls">
          <?php echo $form['land_use_grassland'] ?>
		  <?php echo $form['land_use_grassland']->renderError() ?>
          
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['land_use_builtup']->renderLabel('Build-up') ?>
        <div class="controls">
          <?php echo $form['land_use_builtup'] ?>
		  <?php echo $form['land_use_builtup']->renderError() ?></span>
          
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['land_use_marshland']->renderLabel('Marshland') ?>
        <div class="controls">
          <?php echo $form['land_use_marshland'] ?>
		  <span class="help-inline"><?php echo $form['land_use_marshland']->renderError() ?></span>
          
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['land_use_other']->renderLabel('others') ?>
        <div class="controls">
          <?php echo $form['land_use_other']->render(array('onclick' => 'return otherLandUse()')) ?>
		  <span class="help-inline"><?php echo $form['land_use_other']->renderError() ?></span>
          
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['land_use_other_specify']->renderLabel('Other land uses') ?>
        <div class="controls">
          <?php echo $form['land_use_other_specify'] ?>
		  <span class="help-inline"><?php echo $form['land_use_other_specify']->renderError() ?></span>
          
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['existing_trees']->renderLabel('Existence of vegetation in the site') ?>
        <div class="controls">
          <?php echo $form['existing_trees'] ?>
		  <span class="help-inline"><?php echo $form['existing_trees']->renderError() ?></span>
          
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['existing_trees_remark']->renderLabel('Give remarks about vegetation on site') ?>
        <div class="controls">
          <?php echo $form['existing_trees_remark'] ?>
		  <span><?php echo $form['existing_trees_remark']->renderError() ?></span>
          
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['wildlife_existing']->renderLabel('Existence of wildlife around the site') ?>
        <div class="controls">
          <?php echo $form['wildlife_existing'] ?>
		  <span class="help-inline"><?php echo $form['wildlife_existing']->renderError() ?></span>
          
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['wildlife_existing_remark']->renderLabel('Give remarks about the wildlife') ?>
        <div class="controls">
          <?php echo $form['wildlife_existing_remark'] ?>
		  <span class="help-inline"><?php echo $form['wildlife_existing_remark']->renderError() ?></span>
          
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['fishery_existing']->renderLabel('Existence of fishery resources in water bodies near/within the site') ?>
        <div class="controls">
          <?php echo $form['fishery_existing'] ?>
		  <span class="help-inline"><?php echo $form['fishery_existing']->renderError() ?></span>
          
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['fishery_existing_remark']->renderLabel('Give remarks about fishery resources') ?>
        <div>
          <?php echo $form['fishery_existing_remark'] ?>
		  <span class="help-inline"><?php echo $form['fishery_existing_remark']->renderError() ?></span>
          
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['watershed_existing']->renderLabel('Site is near/within watershed or forest reservation area') ?>
        <div class="controls">
          <?php echo $form['watershed_existing'] ?>
		  <span class="help-inline"><?php echo $form['watershed_existing']->renderError() ?></span>
          
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['watershed_existing_remark']->renderLabel() ?>
        <div class="controls">
          <?php echo $form['watershed_existing_remark'] ?>
		  <span class="help-inline"><?php echo $form['watershed_existing_remark']->renderError() ?></span>
          
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['watershed_near_name']->renderLabel('How near?') ?>
        <div class="controls">
          <?php echo $form['watershed_near_name']->render(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' => 'Distance in meters/kilometers')) ?>
		  <span class="help-inline"><?php echo $form['watershed_near_name']->renderError() ?></span>
          
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['watershed_within_name']->renderLabel('Name of the watershed/forest reservation') ?>
        <div class="controls">
          <?php echo $form['watershed_within_name'] ?>
		  <span class="help-inline"><?php echo $form['watershed_within_name']->renderError() ?></span>
          
        </div>
      </div>
    
    <div class="form-actions">

          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('eiaProjectSurrounding/index') ?>" class="btn">Back </a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php //echo link_to('Delete', 'eiaProjectSurrounding/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Submit" class="btn btn-primary"/>

    </div>
  
</form>

<script>
   
   $(document).ready(function() {
   $('#soilErosion').hide();
    $('#eia_project_surrounding_soil_erosion_unstable').hide();
 $('#eia_project_social_economic_social_others_specify').hide();
   });
   function causesErosion()
     {
      $('#eia_project_surrounding_soil_erosion_unstable').show();
  }
 function OthersSocial()
     {
      $('#eia_project_social_economic_social_others_specify').show();
  }
  
  
   
</script>

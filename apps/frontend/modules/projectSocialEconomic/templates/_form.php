<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php
  $eiaprojectid = sfContext::getInstance()->getUser()->getAttribute('eiaprojectid');
  //this is a bit tricky,
  //we will get the EIAProjectSurrounding id and use it to retrieve details of EIAProjectSurroundingSpecies
  $surrrounding_id_query = Doctrine_Core::getTable('EIAProjectSurrounding')->getProjectSurroundingTokenAndId($eiaprojectid);
  $surrrounding_id = null ;
  foreach($surrrounding_id_query  as $q)
  {
   $surrrounding_id = $q['id'];
  }
  $eiaproject_query = Doctrine_Core::getTable('EIAProjectSurroundingSpecies')->getProjectSurroundingSpeciesTokenAndId($surrrounding_id);
  $eai_project_s_species_token = null ;
  $eia_project_s_species_id = null ;
  //
  foreach($eiaproject_query as $q)
  {
   $eai_project_s_species_token = $q['token'];
   $eia_project_s_species_id = $q['id'];
  }
  ///
  ?>
<form action="<?php echo url_for('projectSocialEconomic/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
<div class="widget">
	<div class="widget-title">
		<h4> Socio-Economic </h4>
	</div>
	<div class="widget-body">
	<?php echo $form->renderGlobalErrors() ?>
  <table class="table table-striped table-bordered" id="sample_8">
   <thead>
		<tr>
			<th>Components/Parameters</th>
			<th>Remarks</th>
		</tr>
	</thead>
  <tbody>
      <tr>
	   <td>
	   <?php echo $form['existing_settlements']->renderLabel() ?>
	    <?php echo $form['existing_settlements']->renderError() ?><?php echo $form['existing_settlements']->render() ?>
	   </td>
	   <td>
	   <?php echo $form['existing_settlements_remark']->renderError() ?><?php echo $form['existing_settlements_remark']->render() ?>
	   </td>
	  </tr>
	  <tr>
	   <td>
	   <?php echo $form['average_family_size']->renderLabel() ?>
	    <?php echo $form['average_family_size']->renderError() ?><?php echo $form['average_family_size']->render() ?>
	   </td>
	   <td>
	   <?php echo $form['average_family_size_remark']->renderError() ?><?php echo $form['average_family_size_remark']->render() ?>
	   </td>
	  </tr>
	  <tr>
	   <td>
	   <b>What are their source(s) of livelihood?</b> <br/>
	    <b><u>Livelihood Type</u></b> <br/>
		<div class="controls">
                                    <label class="checkbox">
                                    <?php echo $form['livelihood_farming']->renderError() ?><?php echo $form['livelihood_farming']->render(); ?> <?php echo ("Farming") ?>
                                    </label>
                                    <label class="checkbox">
                                    <?php echo $form['livelihood_fishing']->renderError() ?><?php echo $form['livelihood_fishing']->render() ?> <?php echo ("Fishing") ?>
                                    </label>
									 <label class="checkbox">
                                   <?php echo $form['livelihood_vending']->renderError() ?><?php echo $form['livelihood_vending']->render() ?> <?php echo ("Vending") ?>
                                    </label>
									 <label class="checkbox">
                                    <?php echo $form['livelihood_others']->renderError() ?><?php echo $form['livelihood_others']->render(array('onclick' => 'return OthersLivelihood(eia_project_social_economic_livelihood_others_specify)')) ?> <?php echo ("Others, Specify") ?>
									<?php echo $form['livelihood_others_specify']->renderError() ?><?php echo $form['livelihood_others_specify']->render() ?>
                                    </label>
        </div>
	    
	   </td>
	  
	   <td>
	    <?php echo $form['livelihood_remarks']->renderError() ?><?php echo $form['livelihood_remarks']->render() ?>
	   </td>
	  </tr>
    </tbody>

    
  </table>
  </div>
  </div>
 <div class="widget">
	                           <div class="widget-title">
									<h4>Local Organizations</h4>						
								</div>
								<div class="widget-body">
								 <p>Are there existing local organizations in the area? </p> <?php echo $form['local_organization']->renderError() ?><?php echo $form['local_organization']->render() ?>
								 <p>If yes, please list down these organized groups e.g. associations, cooperatives etc</p>
								 <?php echo $form['local_organization_description']->renderError() ?><?php echo $form['local_organization_description']->render() ?>
								 
								</div>
</div> 
<div class="widget">
	                           <div class="widget-title">
									<h4>Social Infrastructures</h4>						
								</div>
								<div class="widget-body">
								 <p>Are there existing Social Infrastructures?</p> <?php echo $form['social_infrastructures']->renderError() ?><?php echo $form['social_infrastructures']->render() ?>
								 <p>If yes, what are these social infrastructures?</p>
								 <div class="controls">
								    <label class="checkbox">
                                    <?php echo $form['social_schools']->renderError() ?><?php echo $form['social_schools']->render(); ?> <?php echo ("Schools") ?>
                                    </label>
                                    <label class="checkbox">
                                    <?php echo $form['social_health_centers']->renderError() ?><?php echo $form['social_health_centers']->render(); ?> <?php echo ("Health Centres/Clinics") ?>
                                    </label>
                                    <label class="checkbox">
                                    <?php echo $form['social_hospital']->renderError() ?><?php echo $form['social_hospital']->render() ?> <?php echo ("Hospitals") ?>
                                    </label>
									 <label class="checkbox">
                                   <?php echo $form['social_transportation']->renderError() ?><?php echo $form['social_transportation']->render() ?> <?php echo ("Transportation") ?>
                                    </label>
									 <label class="checkbox">
                                   <?php echo $form['social_communication']->renderError() ?><?php echo $form['social_communication']->render() ?> <?php echo ("Communication(e.g. radio, Tv, mail, newspaper)") ?>
                                    </label>
									 <label class="checkbox">
                                   <?php echo $form['social_churches']->renderError() ?><?php echo $form['social_churches']->render() ?> <?php echo ("Churches/Chapel") ?>
                                    </label>
									 <label class="checkbox">
                                   <?php echo $form['social_roads']->renderError() ?><?php echo $form['social_roads']->render() ?> <?php echo ("Roads") ?>
                                    </label>
									 <label class="checkbox">
                                    <?php echo $form['social_others']->renderError() ?><?php echo $form['social_others']->render(array('onclick' => 'return OthersSocial()')) ?> <?php echo ("Others, Specify") ?>
									<?php echo $form['social_others_specify']->renderError() ?><?php echo $form['social_others_specify']->render() ?>
                                    </label>
        </div>
								 
								</div>
</div> 
 <?php echo $form->renderHiddenFields(); ?>
 <a href="<?php echo url_for('projectSorroundingSpecies/edit?id='.$eia_project_s_species_id.'&token='.$eai_project_s_species_token) ?>" class="btn"><?php echo __('Previous') ?> <i class="icon-step-backward"></i></a>
 <input type="submit" class="btn btn-primary" value="Next" />
</form>
<script>
		 
   $(document).ready(function() {
   $('#eia_project_social_economic_livelihood_others_specify').hide();
    $('#eia_project_social_economic_livelihood_others_specify').hide();
	$('#eia_project_social_economic_social_others_specify').hide();
   });
   function OthersLivelihood()
     {
      $('#eia_project_social_economic_livelihood_others_specify').show();
	 }
	function OthersSocial()
     {
      $('#eia_project_social_economic_social_others_specify').show();
	 }
	 
	 
	  
</script>

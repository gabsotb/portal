<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php
  $eiaprojectid = sfContext::getInstance()->getUser()->getAttribute('eiaprojectid');
  $eiaproject_query = Doctrine_Core::getTable('EIAProjectAttachment')->getProjectDetailTokenAndId($eiaprojectid);
  $eai_project_attachment_token = null ;
  $eia_project_attachment_id = null ;
  //
  foreach($eiaproject_query as $q)
  {
   $eai_project_attachment_token = $q['token'];
   $eia_project_attachment_id = $q['id'];
  }
  ///
  ?>
<form action="<?php echo url_for('projectAttachment/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
 
 <div class="widget">
 <div class="widget-title">
	<h4>Attachments</h4>
</div>
 <div class="widget-body">
  <table class="table table-striped table-bordered" id="table10">
   <tbody>
       <tr>
	    <td><?php echo("Panoramic view of the project site and its immediate vicinity") ?></td>
		<td><?php echo $form['panoramic_view']->renderError() ?><?php echo $form['panoramic_view']->render() ?></td>
	   </tr>
	   <tr>
	     <td><?php echo("Plans for each floor, perspective and site layout plan") ?></td>
		<td><?php echo $form['perspective_site_impact']->renderError() ?><?php echo $form['perspective_site_impact']->render() ?></td>
	   </tr>
	   <tr>
	     <td><?php echo("Preliminary approval(for compliance with Master plan)") ?><!--font color="red">*******</font--></td>
		<td><?php echo $form['preliminary_approval']->renderError() ?><?php echo $form['preliminary_approval']->render() ?></td>
	   </tr>
	   <tr>
	      <td><?php echo("Land Ownership Documents") ?></td>
		<td><?php echo $form['land_ownership_doc']->renderError() ?><?php echo $form['land_ownership_doc']->render() ?></td>
	   </tr>
	   <tr>
	     <td><?php echo("Relevant Ministerial Order Documents") ?></td>
		<td><?php echo $form['ministrial_document']->renderError() ?><?php echo $form['ministrial_document']->render() ?></td>
	   </tr>
	   <tr>
	      <td><?php echo("Maps showing  perimeter area, with coordintates") ?></td>
		<td><?php echo $form['perimeter_area_map']->renderError() ?><?php echo $form['perimeter_area_map']->render() ?></td>
	   </tr>
	   <tr>
	      <td><?php echo("Maps showing location of each project components for big and spartial project (Hydropower projects, Dams and Irrigation schemes/infrastructures)") ?></td>
		<td><?php echo $form['location_area_map']->renderError() ?><?php echo $form['location_area_map']->render() ?></td>
	   </tr>
	   <tr>
	      <td><?php echo("Other Usefull document") ?></td>
		<td><?php echo $form['other_supporting_document']->renderError() ?><?php echo $form['other_supporting_document']->render() ?></td>
	   </tr>
    </tbody> 
  </table>
  </div>
  </div>
  <?php echo $form->renderHiddenFields(); ?>
  <a href="<?php echo url_for('projectOperationPhase/edit?id='.$eia_project_attachment_id.'&token='.$eai_project_attachment_token) ?>" class="btn"><?php echo __('Previous') ?> <i class="icon-step-backward"></i></a> 
   <input type="submit" class="btn btn-success" value="Finish" />
</form>

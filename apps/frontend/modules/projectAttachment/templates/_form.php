<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('projectAttachment/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
 
 <div class="widget">
 <div class="widget-body">
  <table class="table table-striped table-bordered" id="table10">
   <tbody>
       <tr>
	    <td><?php echo("Panoramic view of the project site and its immediate vicinity") ?></td>
		<td><?php echo $form['panoramic_view']->render() ?></td>
	   </tr>
	   <tr>
	     <td><?php echo("Plans for each floor, perspective and site layout plan") ?></td>
		<td><?php echo $form['perspective_site_impact']->render() ?></td>
	   </tr>
	   <tr>
	     <td><?php echo("Preliminary approval(for compliance with Master plan)**") ?></td>
		<td><?php echo $form['preliminary_approval']->render() ?></td>
	   </tr>
	   <tr>
	      <td><?php echo("Land Ownership Documents") ?></td>
		<td><?php echo $form['land_ownership_doc']->render() ?></td>
	   </tr>
	   <tr>
	     <td><?php echo("Relevant Ministrial Order Documents") ?></td>
		<td><?php echo $form['ministrial_document']->render() ?></td>
	   </tr>
	   <tr>
	      <td><?php echo("Maps showing  perimeter area, with coordintates") ?></td>
		<td><?php echo $form['perimeter_area_map']->render() ?></td>
	   </tr>
	   <tr>
	      <td><?php echo("Maps showing location of each project components for big and spartial project (Hydropower projects, Dams and Irrigation schemes/infrastructures)") ?></td>
		<td><?php echo $form['location_area_map']->render() ?></td>
	   </tr>
	   <tr>
	      <td><?php echo("Other Usefull document") ?></td>
		<td><?php echo $form['other_supporting_document']->render() ?></td>
	   </tr>
    </tbody> 
  </table>
  </div>
  </div>
  <?php echo $form->renderHiddenFields(); ?>
   <input type="submit" class="btn btn-success" value="Finish" />
</form>

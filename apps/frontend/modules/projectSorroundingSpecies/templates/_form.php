<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<?php
  $eiaprojectid = sfContext::getInstance()->getUser()->getAttribute('eiaprojectid');
  $eiaproject_query = Doctrine_Core::getTable('EIAProjectSurrounding')->getProjectSurroundingTokenAndId($eiaprojectid);
  $eai_project_surrouding_token = null ;
  $eia_project_surrouding_id = null ;
  //
  foreach($eiaproject_query as $q)
  {
   $eai_project_surrouding_token = $q['token'];
   $eia_project_surrouding_id = $q['id'];
  }
  ///
  ?>

<form action="<?php echo url_for('projectSorroundingSpecies/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
 <div class="row-fluid">
						<div class="span12">
						 	<div class="widget">
								<div class="widget-body">
									<table class="table table-striped table-bordered" id="sample_7">
										<thead>
											<tr>
												<th>No</th>
												<th>Birds and Other Wildlife</th>
												<th>Trees and Other Important Vegetation</th>
												<th>Fisheries Resources</th>
												
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1</td>
												<td><div class="input-prepend"><?php echo $form['birds_animals']->render() ?></div></td>
												<td><div class="input-prepend"><?php echo $form['trees_vegetation']->render() ?></div></td>
												<td><div class="input-prepend"><?php echo $form['fisheries']->render() ?></div></td>
												
											</tr>
											
											
										</tbody>
									</table>
								</div>
							</div>
						</div>
 </div>
 <?php echo $form->renderHiddenFields(); ?>
 <a href="<?php echo url_for('eiaProjectSurrounding/edit?id='.$eia_project_surrouding_id.'&token='.$eai_project_surrouding_token) ?>" class="btn"><?php echo __('Previous') ?> <i class="icon-step-backward"></i></a>
 <input type="submit" class="btn btn-primary" value="Next" />
</form>

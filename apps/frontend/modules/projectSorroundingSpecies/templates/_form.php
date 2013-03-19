<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

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
											<tr>
												<td>2</td>
												<td><div class="input-prepend"><?php echo $form['birds_animals']->render() ?></div></td>
												<td><div class="input-prepend"><?php echo $form['trees_vegetation']->render() ?></div></td>
												<td><div class="input-prepend"><?php echo $form['fisheries']->render() ?></div></td>
											</tr>
											<tr>
												<td>3</td>
												<td><div class="input-prepend"><?php echo $form['birds_animals']->render() ?></div></td>
												<td><div class="input-prepend"><?php echo $form['trees_vegetation']->render() ?></div></td>
												<td><div class="input-prepend"><?php echo $form['fisheries']->render() ?></div></td>
											</tr>
											<tr>
												<td>4</td>
												<td><div class="input-prepend"><?php echo $form['birds_animals']->render() ?></div></td>
												<td><div class="input-prepend"><?php echo $form['trees_vegetation']->render() ?></div></td>
												<td><div class="input-prepend"><?php echo $form['fisheries']->render() ?></div></td>
											</tr>
											<tr>
												<td>5</td>
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
 <input type="submit" class="btn btn-primary" value="Next" />
</form>

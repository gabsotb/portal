<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form  action="<?php echo url_for('EIA/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?> class="form-horizontal">
 
		
   
		<?php echo $form->renderGlobalErrors() ?> 
		<div class="control-group">
			<?php $form['name']->renderError() ?>
			<?php $form['name']->renderLabel() ?>
			<div class="controls">
				<?php echo $form['name']->renderRow(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' => 'Enter A Valid developer Name, The Name entered will be verified and counter checked
				from the business registration system. Make sure you have a registered name' , 'data-original-title' => 'Developer Name')) ?>
			</div>
		</div>
		<div class="control-group">
			<?php $form['company_regno']->renderError() ?>
			<?php $form['company_regno']->renderLabel() ?>
			<div class="controls">
				<?php echo $form['company_regno']->renderRow(array('class' => 'span6 popovers' , 'data-content' => 'Enter developer Registration Number. This is the Number that was issued when
				you registered your business' , 'data-trigger' => 'hover', 'data-original-title' => 'Developer Number')) ?>
			</div>
		</div>
		
		<div class="control-group">
			<?php $form['developer_title']->renderError() ?>
			<?php $form['developer_title']->renderLabel() ?>
			<div class="controls">
				<?php echo $form['developer_title']->renderRow(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' => 'Enter developer title', 'data-original-title' => 'Developer Title')) ?>
			</div>
			
		</div>
		<div class="control-group">
			<?php $form['developer_address']->renderError() ?>
			<?php $form['developer_address']->renderLabel() ?>
			<div class="controls">
				<?php echo $form['developer_address']->renderRow(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' => 'Enter Current Business Location. This should be the physical location where conduct your business operations.', 'data-original-title' => 'Developer Address')) ?>
			</div>
			
		</div>
		<div class="control-group">
			<?php $form['project_name']->renderError() ?>
			<?php $form['project_name']->renderLabel() ?>
			<div class="controls">
				<?php echo $form['project_name']->renderRow(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' => 'Project Name', 'data-original-title' => 'Project name')) ?>
			</div>
		</div>
		<div class="control-group">
			<?php $form['project_purpose']->renderError() ?>
			<?php $form['project_purpose']->renderLabel() ?>
			<div class="controls">
					<?php echo $form['project_purpose']->renderRow(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' => 'Please provide purpose of the project', 'data-original-title' => 'Project purpose')) ?>
			</div>
		</div>
		<div class="control-group">
			<?php $form['project_nature']->renderError() ?>
			<?php $form['project_nature']->renderLabel() ?>
			<div class="controls">
				<?php echo $form['project_nature']->renderRow(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' => 'What is your project Legal Nature', 'data-original-title' => 'Project Legal Status')) ?>
			</div>
		</div>
		<div class="control-group">
			<?php $form['project_site']->renderError() ?>
			<?php $form['project_site']->renderLabel() ?>
			<div class="controls">
				<?php echo $form['project_site']->renderRow(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' => 'Where is the project site?', 'data-original-title' => 'Project site')) ?>
			</div>
		</div>
		<div class="control-group">
			<?php $form['project_sitelaws']->renderError() ?>
			<?php $form['project_sitelaws']->renderLabel() ?>
			<div class="controls">
				<?php echo $form['project_sitelaws']->renderRow(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' => 'Where is the project site laws?', 'data-original-title' => 'Project site laws')) ?>
			</div>
		</div>
		<div class="control-group">
			<?php $form['environment_impacts']->renderError() ?>
			<?php $form['environment_impacts']->renderLabel() ?>
			<div class="controls">
				<?php echo $form['environment_impacts']->renderRow(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' => 'The environment impact?', 'data-original-title' => 'Environment impacts')) ?>
			</div>
		</div>
		<div class="control-group">
			<?php $form['other_alternatives']->renderError() ?>
			<?php $form['other_alternatives']->renderLabel() ?>
			<div class="controls">
				<?php echo $form['other_alternatives']->renderRow(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' => 'Other alternatives?', 'data-original-title' => 'Other alternatives')) ?>	
			</div>
		</div>
	   <div class="control-group">
			<?php $form['other_information']->renderError() ?>
			<?php $form['other_information']->renderLabel() ?>
			<div class="controls">
				<?php echo $form['other_information']->renderRow(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' => 'Other information?', 'data-original-title' => 'Other information')) ?>
			</div>
		</div>
		<?php echo $form->renderHiddenFields(); ?>
     
		<div class="form-actions">
          &nbsp;<a href="<?php echo url_for('EIA/index') ?>"><button type="button" class="btn btn-danger">Cancel</button></a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'EIA/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" class="btn btn-primary" value="Submit" />
		</div>
     
</form>

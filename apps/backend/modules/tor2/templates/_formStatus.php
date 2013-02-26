<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
					
	
<form action="<?php echo url_for('tor2/'.($form->getObject()->isNew() ? 'statusCreate' : 'statusUpdate').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>		
		<?php echo $form->renderGlobalErrors() ?>
		<div class="control-group">
			<?php echo $form['tor_id']->renderError() ?>
			<?php echo $form['tor_id']->renderLabel() ?>
			
			<div class="controls">
				<?php echo $form['tor_id'] ?>
			</div>
		</div>
		
		<div class="control-group">
			<?php echo $form['status']->renderError() ?>
			<?php echo $form['status']->renderLabel() ?>
			
			<div class="controls">
				<?php echo $form['status'] ?>
			</div>
		</div>
		
		<div class="control-group">
			<?php echo $form['comments']->renderError() ?>
			<?php echo $form['comments']->renderLabel() ?>
			
			<div class="controls">
				<?php echo $form['comments'] ?>
			</div>
		</div>
		
		
		<?php echo $form->renderHiddenFields(); ?>
		<div class="form-actions">
			<input type="submit" value="Submit" class="btn btn-primary" />
			<?php echo button_to('Cancel', '@homepage',array('class' => 'btn')) ?>
		</div>
	</form>
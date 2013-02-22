<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
					
	
	<form action="<?php echo url_for('EIA/'.($form->getObject()->isNew() ? 'torCreate' : 'torUpdate').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" class = "form-horizontal">
		<?php echo $form->renderGlobalErrors() ?>
		<div class="control-group">
			<?php echo $form['impact_id']->renderError() ?>
			<?php echo $form['impact_id']->renderLabel() ?>
			
			<div class="controls">
				<?php echo $form['impact_id'] ?>
			</div>
		</div>
		
		<div class="control-group">
			<?php echo $form['issues_assessed']->renderError() ?>
			<?php echo $form['issues_assessed']->renderLabel() ?>
			
			<div class="controls">
				<?php echo $form['issues_assessed'] ?>
			</div>
		</div>
		
		<div class="control-group">
			<?php echo $form['specific_tasks']->renderError() ?>
			<?php echo $form['specific_tasks']->renderLabel() ?>
			
			<div class="controls">
				<?php echo $form['specific_tasks'] ?>
			</div>
		</div>
		
		<div class="control-group">
			<?php echo $form['stake_holders']->renderError() ?>
			<?php echo $form['stake_holders']->renderLabel() ?>
			
			<div class="controls">
				<?php echo $form['stake_holders']->render(array('class' => 'data-picker')) ?>
			</div>
		</div>

		<div class="control-group">
			<?php echo $form['experts']->renderError() ?>
			<?php echo $form['experts']->renderLabel() ?>
			
			<div class="controls">
				<?php echo $form['experts'] ?>
			</div>
		</div>
		<?php echo $form->renderHiddenFields(); ?>
		<div class="form-actions">
			<input type="submit" value="Submit" class="btn btn-primary" />
			<?php echo button_to('Cancel', '@homepage',array('class' => 'btn')) ?>
		</div>
	</form>
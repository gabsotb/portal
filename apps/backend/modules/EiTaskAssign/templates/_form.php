<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
					
	<?php echo form_tag_for($form,'@eiaTaskAssign',array('class' => 'form-horizontal')) ?>
		<?php echo $form->renderGlobalErrors() ?>
		<div class="control-group">
			<?php echo $form['user_assigned']->renderError() ?>
			<?php echo $form['user_assigned']->renderLabel() ?>
			
			<div class="controls">
				<?php echo $form['user_assigned'] ?>
			</div>
		</div>
		
		<div class="control-group">
			<?php echo $form['company_id']->renderError() ?>
			<?php echo $form['company_id']->renderLabel() ?>
			
			<div class="controls">
				<?php echo $form['company_id'] ?>
			</div>
		</div>
		
		<div class="control-group">
			<?php echo $form['instructions']->renderError() ?>
			<?php echo $form['instructions']->renderLabel() ?>
			
			<div class="controls">
				<?php echo $form['instructions'] ?>
			</div>
		</div>
		
		<div class="control-group">
			<?php echo $form['duedate']->renderError() ?>
			<?php echo $form['duedate']->renderLabel() ?>
			
			<div class="controls">
				<?php echo $form['duedate']->render(array('class' => 'data-picker')) ?>
			</div>
		</div>

		<div class="control-group">
			<?php echo $form['work_status']->renderError() ?>
			<?php echo $form['work_status']->renderLabel() ?>
			
			<div class="controls">
				<?php echo $form['work_status'] ?>
			</div>
		</div>
		<?php echo $form->renderHiddenFields(); ?>
		<div class="form-actions">
			<input type="submit" value="Assign" class="btn btn-primary" />
			<?php echo button_to('Cancel', '@homepage',array('class' => 'btn')) ?>
		</div>
	</form>
<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('eiaTaskAssign/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?> class="form-horizontal">
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
	<div class="control-group error">
      <?php echo $form->renderGlobalErrors() ?>
	</div>
      <div class="control-group">
        <?php echo $form['user_assigned']->renderLabel(NULL,array('class' => 'control-label')) ?>
        <div class="controls">
          <?php echo $form['user_assigned']->renderError() ?>
          <?php echo $form['user_assigned'] ?>
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['company_id']->renderLabel(NULL,array('class' => 'control-label')) ?>
        <div class="controls">
          <?php echo $form['company_id']->renderError() ?>
          <?php echo $form['company_id'] ?>
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['instructions']->renderLabel(NULL,array('class' => 'control-label')) ?>
        <div class="controls">
          <?php echo $form['instructions']->renderError() ?>
          <?php echo $form['instructions'] ?>
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['duedate']->renderLabel(NULL,array('class' => 'control-label')) ?>
        <div class="controls">
          <?php echo $form['duedate']->renderError() ?>
          <?php echo $form['duedate'] ?>
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['work_status']->renderLabel(NULL,array('class' => 'control-label')) ?>
        <div class="controls">
          <?php echo $form['work_status']->renderError() ?>
          <?php echo $form['work_status'] ?>
        </div>
      </div>
	  
		<div class="form-actions">
		<?php echo $form->renderHiddenFields(false) ?>
		&nbsp;<a href="<?php echo url_for('eiaTaskAssign/index') ?>" class="btn btn-primary">Back to list</a>
		<?php if (!$form->getObject()->isNew()): ?>
		&nbsp;<?php echo link_to('Delete', 'eiaTaskAssign/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?','class' => 'btn btn-danger')) ?>
		<?php endif; ?>
		<input type="submit" value="Assign" class="btn btn-success"/>
		</div>

</form>

<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('eiaReport/'.($form->getObject()->isNew() ? 'create?id='.$id : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>

      <?php echo $form->renderGlobalErrors() ?>
      <div class="control-group">
        <?php echo $form['module']->renderLabel(NULL,array('class' => 'control-label')) ?>
        <div class="controls">
          <?php echo $form['module'] ?>
		  <span class="help-inline"><?php echo $form['module']->renderError() ?></span>
		</div>
	  </div>
      <div class="control-group">
        <?php echo $form['module_id']->renderLabel(NULL,array('class' => 'control-label')) ?>
        <div class="controls">
          <?php echo $form['module_id'] ?>
		  <span class="help-inline"><?php echo $form['module_id']->renderError() ?></span>
          
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['recommendations']->renderLabel(NULL,array('class' => 'control-label')) ?>
        <div class="controls">
          <?php echo $form['recommendations'] ?>
		  <span class="help-inline"><?php echo $form['recommendations']->renderError() ?></span>
          
        </div>
      </div>
    
    <div class="form-actions">

          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('eiaReport/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'eiaReport/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Submit" class="btn btn-success" />

    </div>

</form>

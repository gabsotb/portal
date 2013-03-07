<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('torDecision/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>


      <?php echo $form->renderGlobalErrors() ?>
  
      <div class="control-group">
        <?php echo $form['tor_id']->renderLabel(NULL,array('class' => 'control-label')) ?>
        <div class="controls">
          <?php echo $form['tor_id'] ?>
		  <span class="help-inline"><?php echo $form['tor_id']->renderError() ?></span>
          
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['decision']->renderLabel(NULL,array('class' => 'control-label')) ?>
        <div class="controls">
          <?php echo $form['decision'] ?>
		  <span class="help-inline"><?php echo $form['decision']->renderError() ?></span>
          
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['comments']->renderLabel(NULL,array('class' => 'control-label')) ?>
        <div class="controls">
          <?php echo $form['comments'] ?>
		  <span class="help-inline"><?php echo $form['comments']->renderError() ?></span>
          
        </div>
      </div>

    <div class="form-actions">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('dashboard/index') ?>" class="btn">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'torDecision/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?', 'class' => 'btn btn-danger')) ?>
          <?php endif; ?>
          <input type="submit" value="Submit" class="btn btn-success"/>
    </div>
	  
</form>

<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('eiaTor/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>class ="form-horizontal">
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
      <?php echo $form->renderGlobalErrors() ?>
	  <div class="control-group">
        <?php echo $form['attachement']->renderLabel(null,array('class' => 'control-label')) ?>
		<div class="controls">
			<?php echo $form['attachement']->renderError() ?> 
			<div class="fileupload fileupload-new" data-provides="fileupload">
				<div class="input-append">
				<!--div class="uneditable-input span3">
					<i class="icon-file fileupload-exists"></i> 
						<span class="fileupload-preview"></span>
				</div -->
				<span class="btn btn-file">
					<span class="fileupload-new">Select file</span>
					<!--span class="fileupload-exists">Change</span -->
				<?php echo $form['attachement']->render(array('class'=>'default')) ?>
				</span>
				</div>
			</div>
		</div>
	  </div>
      <div class="control-group">
        <?php echo $form['remarks']->renderLabel(null,array('class' => 'control-label')) ?></th>
        <div class="controls">
          <?php echo $form['remarks']->renderError() ?>
		  <div class="input-append">
          <?php echo $form['remarks']->render(array('class' => 'span12 wysihtml5', 'rows' => '6')) ?>
		  </div>
        </div>
      </div>
  <div class="form-actions">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('@homepage') ?>"class="btn">Back to list</a>
          <?php /*if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'eiaTor/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; */?>
          <input type="submit" value="Submit" class="btn btn-success"/>
    </div>
</form>

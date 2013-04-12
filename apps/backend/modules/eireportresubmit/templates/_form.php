<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('eireportresubmit/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table class="table table-striped table-bordered">
    <tbody>
      <div class="control-group">
		  <?php echo $form['comments']->renderError() ?>
			<div class="controls">
			<label class="control-label"><?php echo $form['comments']->renderLabel() ?></label>
			    
				<div class="input-prepend">
					<?php echo $form['comments']->render(array('class' => 'span12 wysihtml5' ,'rows' => '10')) ?>
					
				</div>
			</div>
			 <?php echo $form->renderHiddenFields(); ?>
		</div>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="2">
          &nbsp;<a href="<?php echo url_for('eireportresubmit/index') ?>"><button type="button" class="btn btn-danger"><?php echo __('Cancel') ?></button></a>
          <input type="submit" class="btn btn-primary" value="<?php echo __('Request') ?>" />
        </td>
      </tr>
    </tfoot>
    
  </table>
</form>

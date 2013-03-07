<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('portlets/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

  <table class="table table-striped table-bordered">
    <tbody>
      <?php //echo $form ?>
	  <div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['investment_certificate']->renderRow(array('class' => 'span12 wysihtml5' ,'rows' => '10')) ?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['eia_certificate']->renderRow(array('class' => 'span12 wysihtml5' ,'rows' => '10')) ?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['tax_exemptions']->renderRow(array('class' => 'span12 wysihtml5' ,'rows' => '10')) ?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					
					<?php echo $form->renderHiddenFields(); ?>
				</div>
			</div>
		</div>
    </tbody>
     
  
    <tfoot>
      <tr>
	  <?php if (!$form->getObject()->isNew()): ?>
		<input type="hidden" name="sf_method" value="put" />
		<?php endif; ?>
        <td colspan="2">
          &nbsp;<a href="<?php echo url_for('portlets/index') ?>"><button type="button" class="btn btn-danger">Cancel</button></a>
          <?php if (!$form->getObject()->isNew()): ?>
          <?php endif; ?>
          <input type="submit" class="btn btn-primary" value="Save" />
        </td>
      </tr>
    </tfoot>
    
  </table>
</form>

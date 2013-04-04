<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form  action="<?php echo url_for('projectSummary/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table class="table table-striped table-bordered">
   <tbody>
      	<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['investment_id']->renderRow(array('class' => 'span8 chosen', 'data-placeholder' => 'Choose a Category', 'tabindex' => '1')) ?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['business_sector']->renderRow(array('class' => 'span8')) ?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['techinical_viability']->renderRow(array('class' => 'span12 wysihtml5' ,'rows' => '10')) ?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['planned_investment']->renderRow(array('class' => 'span3')) ?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['employment_created']->renderRow(array('class' => 'span3')) ?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['job_categories']->renderRow(array('class' => 'span12 wysihtml5' ,'rows' => '10')) ?>
				</div>
			</div>
		</div>
		 <div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php //echo $form['created_at']->renderRow(array('class' => 'default')) ?>
					<?php echo $form->renderHiddenFields(); ?>
				</div>
			</div>
		</div>
	  <tfoot>
      <tr>
        <td colspan="2">
          &nbsp;<a href="<?php echo url_for('projectSummary/show?id='.$form->getObject()->getId()) ?>"><button type="button" class="btn btn-danger"><?php echo __('Cancel') ?></button></a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php //echo link_to('Delete', 'projectSummary/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input class="btn btn-primary" type="submit" value="<?php echo __('Save') ?>" />
        </td>
      </tr>
    </tfoot>
	  
   </tbody>
    
   
  </table>
</form>

<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('InvestmentCertTaskAssignment/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

  <table class="table table-striped table-bordered">
		
    <tbody>
		 
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['user_assigned']->renderRow(array('class' => 'span7 chosen', 'data-placeholder' => 'Choose a Category', 'tabindex' => '1')) ?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['investmentapp_id']->renderRow(array('class' => 'span7 chosen', 'data-placeholder' => 'Choose a Category', 'tabindex' => '1')) ?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['instructions']->renderRow(array('class' => 'span12 wysihtml5' ,'rows' => '10')) ?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
			      <div>
					<?php echo $form['duedate']->renderRow(array('class' => 'date-picker icon-calendar','placeholder' => 'Select a Date')) ?>
					
					<?php echo $form->renderHiddenFields(); ?>
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
	  
	    <?php if (!$form->getObject()->isNew()): ?>
		<input type="hidden" name="sf_method" value="put" />
		<?php endif; ?>
	  
        <td colspan="2">
          &nbsp;<a href="<?php echo url_for('InvestmentCertTaskAssignment/index') ?>"><button type="button" class="btn btn-danger">Cancel</button></a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php //echo link_to('Delete', 'investmentapp/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" class="btn btn-primary" value="Save" />
		  <?php //$form->validatorSchema->setOption('allow_extra_fields', true); ?>
        </td>
      </tr>
    </tfoot>               
     
		
    </tbody>
  </table>
</form>

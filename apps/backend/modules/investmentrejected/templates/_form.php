<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('investmentrejected/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table class="table table-striped table-bordered" id="eia_table7">
  <tbody>
       <div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['business_registration']->renderRow(array('class' => 'span6 popovers' ,'onkeyup' => 'showDetails(this.value)','data-content' => 'Business Regno'  , 'data-trigger' => 'hover', 'data-original-title' => 'Start Typing'))  ?>
				</div>
			</div>
			
	   </div>
	   <div class="control-group">
			<div class="controls">
			  <div class="input-prepend">
					<?php echo $form['application_type']->renderRow(array('class' => 'span9 chosen', 'data-placeholder' => 'Choose a Category', 'tabindex' => '1')) ?>
	            </div>
			  </div>
	   </div>
	    <div class="control-group">
			<div class="controls">
			  <div class="input-prepend">
					<?php echo $form['reason']->renderRow(array('class' => 'span12 wysihtml5' ,'rows' => '10')) ?>
	            </div>
			  </div>
	   </div>
	   <div class="control-group">
			<div class="controls">
			  <div class="input-prepend">
					<?php echo $form['comment']->renderRow(array('class' => 'span12 wysihtml5' ,'rows' => '10')) ?>
	            </div>
			  </div>
			  <?php echo $form->renderHiddenFields(); ?>
	   </div>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="2">
		 <input type="submit" class="btn btn-success" value="Reject" />&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;<a href="<?php echo url_for('investmentrejected/index') ?>">
		   <button type="button" class="btn btn-danger"><?php echo __('Cancel') ?></button>
		  </a>
         
        </td>
      </tr>
    </tfoot>
    
  </table>
</form>

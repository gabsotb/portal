<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('investmentrequest/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table class="table table-striped table-bordered" id="eia_table7">
    <tbody>
      <div class="input-prepend">
					<?php echo $form['requestor']->renderRow(array('class' => 'span9 chosen', 'data-placeholder' => 'Choose a Category', 'tabindex' => '1')) ?>
	  </div>
	  <div class="input-prepend">
					<?php echo $form['request_type']->renderRow(array('class' => 'span7 chosen', 'data-placeholder' => 'Choose a Category', 'tabindex' => '1')) ?>
	  </div>
	  <div class="input-prepend">
					<?php echo $form['status']->renderRow(array('class' => 'span7 chosen', 'data-placeholder' => 'Choose a Category', 'tabindex' => '1')) ?>
	  </div>
	   <div class="input-prepend">
	                <?php echo $form['business_registration']->renderError() ?> 
					<?php echo $form['business_registration']->renderRow(array('class' => 'span7')) ?>
	  </div>
	   <div class="input-prepend">
					<?php echo $form['comments']->renderRow(array('class' => 'span12 wysihtml5' ,'rows' => '10')) ?>
					<?php echo $form->renderHiddenFields(); ?>
	  </div>
	  
    </tbody>
    <tfoot>
      <tr>
        <td colspan="2">
		 <input type="submit" class="btn btn-success" value="Process" />&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;<a href="<?php echo url_for('investmentrequest/index') ?>">
		   <button type="button" class="btn btn-danger"><?php echo __('Cancel') ?></button>
		  </a> 
         
        </td>
      </tr>
    </tfoot>
    
  </table>
</form>

<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form class="form-horizontal" action="<?php echo url_for('investmentapp/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
  <table class="table table-striped table-bordered">
		
    <tbody>
		 
		<?php echo $form ?>
		
     <div class="form-actions">
      <tfoot>
      <tr>
	  
	    <?php if (!$form->getObject()->isNew()): ?>
		<input type="hidden" name="sf_method" value="put" />
		<?php endif; ?>
	  
        <td colspan="2">
          &nbsp;<a href="<?php echo url_for('investmentapp/index') ?>"><button type="button" class="btn btn-danger">Cancel</button></a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'investmentapp/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" class="btn btn-primary" value="Submit" />
		  <?php //$form->validatorSchema->setOption('allow_extra_fields', true); ?>
        </td>
      </tr>
    </tfoot>               
     </div>
		
    </tbody>
  </table>
</form>

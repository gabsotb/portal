<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('investmentresubmit/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table class="table table-striped table-bordered" id="eia_table7">
   <tbody>
      <div class="control-group">
			<div class="controls">
				<div class="input-prepend">
				 <?php echo $form['message_subject']->renderError() ?> 
					<?php echo $form['message_subject']->renderRow(array('class' => 'span10 popovers' ,'size' => '20', 'data-content' => 'Please Provide a descriptive title' , 'data-trigger' => 'hover', 'data-original-title' => 'Subject')) ?>
				</div>
			</div>
		</div>	
	  <div class="control-group">
					<div class="controls">
						<div class="input-prepend">
							
							 <?php echo $form['message']->renderError() ?> 
							 </label></span>
							 
							<?php echo $form['message']->renderRow(array('class' => 'span12 wysihtml5' ,'rows' => '10'))?>
						</div>
					</div>
					<?php echo $form->renderHiddenFields(); ?>
	</div>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="2">
          <input type="submit" class="btn btn-success" value="Request" />
		  
        </td>
      </tr>
    </tfoot>
    
  </table>
</form>


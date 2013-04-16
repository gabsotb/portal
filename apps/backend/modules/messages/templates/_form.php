<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('messages/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
		  <div class="control-group">
							<div class="controls">
								<div class="input-prepend">
								<span> <label class="control-label"><?php echo $form['cc_email']->renderLabel() ?>
									 <?php echo $form['cc_email']->renderError() ?> 
									 </label></span>
									<?php echo $form['cc_email']->render(array('class' => 'span6')) ?>
								</div>
							</div>
		 </div> 
		  <div class="control-group">
							<div class="controls">
								<div class="input-prepend">
								<span> <label class="control-label"><?php echo $form['message_subject']->renderLabel() ?>
									 <?php echo $form['message_subject']->renderError() ?> 
									 </label></span>
									<?php echo $form['message_subject']->render(array('class'=>'span6')) ?>
								</div>
							</div>
		 </div> 
       <div class="control-group">
					<div class="controls">
						<div class="input-prepend">
							 <span> <label class="control-label"><?php echo $form['message']->renderLabel() ?>
							 <?php echo $form['message']->renderError() ?> 
							 </label></span>
							 
							<?php echo $form['message']->render(array('class' => 'span12 wysihtml5' ,'rows' => '10'))?>
						</div>
					</div>
		</div>
			<div class="control-group"> 
                                 <div class="controls">
								 <div class="input-prepend">
								 <?php echo $form['attachement']->renderLabel(null,array('class' => 'control-label')) ?>
                                     <div class="fileupload fileupload-new" data-provides="fileupload">
                                      <span class="btn btn-file"><span class="fileupload-new"><i class="icon-upload"> </i></span><span class="fileupload-exists"><i class="icon-remove"> </i></span><?php echo $form['attachement']->render(array('class' => 'default'))?></span>
                                      <span class="fileupload-preview"></span>
                                      <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
                                    </div>
								</div>
                                 </div>
            </div>  
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(); ?>
          <input type="submit" class="btn btn-success"  value="Send" />
        </td>
      </tr>
    </tfoot>
    
  </table>
</form>

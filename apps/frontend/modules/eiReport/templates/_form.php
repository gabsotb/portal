<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('eireport/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
<div class="widget">
		 <div class="widget-title">
		  <h4><?php echo __('Upload The Followind Documents') ?></h4>
		</div>
		<div class="widget-body">
         <div class="control-group"> 
                                 <div class="controls">
								 <label class="control-label"><?php echo $form['word_doc']->renderLabel() ?></label>
                                     <div class="fileupload fileupload-new" data-provides="fileupload">
                                      <span class="btn btn-file"><span class="fileupload-new"><i class="icon-upload"> </i></span><span class="fileupload-exists"><i class="icon-remove"> </i></span><?php echo $form['word_doc']->render(array('class' => 'default'))?></span>
                                      <span class="fileupload-preview"></span>
                                      <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
                                    </div>
                                 </div>
            </div> 
			<div class="control-group"> 
                                 <div class="controls">
								 <label class="control-label"><?php echo $form['pdf_doc']->renderLabel() ?></label>
                                     <div class="fileupload fileupload-new" data-provides="fileupload">
                                      <span class="btn btn-file"><span class="fileupload-new"><i class="icon-upload"> </i></span><span class="fileupload-exists"><i class="icon-remove"> </i></span><?php echo $form['pdf_doc']->render(array('class' => 'default'))?></span>
                                      <span class="fileupload-preview"></span>
                                      <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
                                    </div>
                                 </div>
								 <?php echo $form->renderHiddenFields(); ?>
            </div> 
			<div class="control-group">
			<div class="controls">
			 <label class="control-label"><?php echo $form['comments']->renderLabel() ?></label>
				<div class="input-prepend">
					<?php echo $form['comments']->render(array('class' => 'span12 wysihtml5' ,'rows' => '10')) ?>
				</div>
			</div>
		    </div>
			<div class="controls">
				<div class="">
				<input type="submit" class="btn btn-success" value="Submit" />
				<a href="<?php echo url_for('investmentapp/index') ?>">
				  <input type="button" class="btn btn-danger" value="<?php echo __('Cancel') ?>">
				</a>
				</div>
			</div>
		    </div>
</div>
</div>
			
    
</form>

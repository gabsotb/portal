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
                                <label class="control-label"><?php echo $form['word_doc']->renderLabel() ?></label>
                                 <div class="controls">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                      <div class="input-append">
                                        <?php echo $form['word_doc']->render(array('class' => 'default'))?>
                                      </div>
                                    </div>
                                 </div>
            </div>
			<div class="control-group">
                                <label class="control-label"><?php echo $form['pdf_doc']->renderLabel() ?></label>
                                 <div class="controls">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                      <div class="input-append">
                                        <?php echo $form['pdf_doc']->render(array('class' => 'default'))?>
                                      </div>
                                    </div>
                                 </div>
            </div>
			<div class="control-group">
			<div class="controls">
			 <label class="control-label"><?php echo $form['comments']->renderLabel() ?></label>
				<div class="input-prepend">
					<?php echo $form['comments']->render(array('class' => 'span12 wysihtml5' ,'rows' => '10')) ?>
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

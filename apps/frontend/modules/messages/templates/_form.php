<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('messages/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
			<?php echo $form->renderGlobalErrors() ?>
			<div class="control-group">
			<div class="controls">
				<?php echo $form['recepient']->renderError() ?>
			     <label class="control-label"><strong><?php echo $form['recepient']->renderLabel() ?></strong></label>
				<div class="input-prepend">
					<?php echo $form['recepient']->render(array('class' => 'span8'))  ?>
				</div>
			</div>
		    </div>
			<div class="control-group">
			<div class="controls">
				<?php echo $form['cc_email']->renderError() ?>
			     <label class="control-label"><strong><?php echo $form['cc_email']->renderLabel() ?></strong></label>
				<div class="input-prepend">
					<?php echo $form['cc_email']->render(array('class' => 'span8'))  ?>
				</div>
			</div>
		    </div>
			<div class="control-group">
			<div class="controls">
				<?php echo $form['message_subject']->renderError() ?>
			    <label class="control-label"><strong><?php echo $form['message_subject']->renderLabel() ?></strong></label>
				<div class="input-prepend">
					<?php echo $form['message_subject']->render(array('class' => 'span8'))  ?>
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
    
          <div class="control-group">
		   <div class="controls">
		   <?php echo $form['message']->renderError() ?>
		   <label class="control-label"><strong><?php echo $form['message']->renderLabel() ?></strong></label>
				<div class="input-prepend">
				<?php echo $form['message']->render(array('class' => 'span12 wysihtml5' ,'rows' => '10'))?>
				</div>
			</div>
		    </div>
			<div class="control-group"> 
                                 <div class="controls">
								 <?php echo $form['attachement']->renderError() ?>
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
          <div class="control-group">
		   <div class="controls">
				<div class="">
				<a href="<?php echo url_for('messages/index') ?>">
				  <input type="button" class="btn btn-danger" value="<?php echo __('Cancel') ?>">
				</a>
				<input type="submit" class="btn btn-success" value="Send" />
				</div>
			</div>
		    </div>
</form>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
 <script type="text/javascript">
				$(function() {
				var availableTags = [];
				//ajax request
				$.ajax({                                      
					  url: "<?php echo url_for('messages/emails') ?>",                      							  
					  dataType: 'json',
                      type: 'GET',					  
					  success: function(response) 
					  {
					   var data = [] ;
					   var i = 0 ;
					   $.each(data, function(i, item) {
							alert(data[i].email_address);
						});
											  } 
					});
				//
				
				$( "#messages_recepient" ).autocomplete({
				source: availableTags
				});
				});
</script>
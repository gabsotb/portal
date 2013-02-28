<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form  action="<?php echo url_for('investmentapp/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
  <table class="table table-striped table-bordered">
		
    <tbody>
		 
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['name']->renderRow(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' => 'Enter A Valid Business Name, The Name entered will be verified and counter checked
					from the business registration system. Make sure you have a registered name' , 'data-original-title' => 'Business Name')) ?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['registration_number']->renderRow(array('class' => 'span6 popovers' , 'data-content' => 'Enter Business Registration Number. This is the Number that was issued when
					you registered your business' , 'data-trigger' => 'hover', 'data-original-title' => 'Business Number')) ?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['company_address']->renderRow(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' => 'Enter Current Business Location. 
					This should be the physical location where you intend to start your
					business operations.', 'data-original-title' => 'Company Address')) ?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['job_created']->renderRow(array('class' => 'span6 chosen'))?>
				</div>
			</div>
		</div>
		<!-- Job Category section -->
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['job_category']->renderRow(array('class' => 'span12 wysihtml5' ,'rows' => '10')) ?>
				</div>
			</div>
		</div>
		<!-- end -->
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['company_legal_nature']->renderRow(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' => 'What is your Company Legal Nature', 'data-original-title' => 'Business Legal Status')) ?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['company_representative']->renderRow(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' => 'Who is your Company Representative?', 'data-original-title' => 'Company Representatives')) ?>
				</div>
			</div>
		</div>
		<!-- -->
		 <div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['application_letter']->renderRow() ?>
				</div>
			</div>
		</div>
		<!-- -->
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['incorporation_certificate']->renderRow() ?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['shareholding_list']->renderRow() ?> 
				</div>
				
			</div>
		</div>
	   <div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['company_logo']->renderRow() ?>
					<?php echo $form->renderHiddenFields(); ?>
				</div>
			</div>
		</div>
    <!-- <div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php //echo $form['created_at']->renderRow(array('class' => 'default')) ?>
					<?php //echo $form->renderHiddenFields(); ?>
				</div>
			</div>
		</div> -->
      <tfoot>
      <tr>
	  
	    <?php if (!$form->getObject()->isNew()): ?>
		<input type="hidden" name="sf_method" value="put" />
		<?php endif; ?>
	  
        <td colspan="2">
          &nbsp;<a href="<?php echo url_for('investmentapp/index') ?>"><button type="button" class="btn btn-danger">Cancel</button></a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php //echo link_to('Delete', 'investmentapp/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" class="btn btn-primary" value="Submit" />
		  <?php //$form->validatorSchema->setOption('allow_extra_fields', true); ?>
        </td>
      </tr>
    </tfoot>               
     
		
    </tbody>
  </table>
</form>

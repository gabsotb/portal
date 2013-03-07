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
					<?php echo $form['title_in_company']->renderRow(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' => 'Enter Your Title in The Company.', 'data-original-title' => 'Company Address')) ?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['business_sector']->renderRow(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' => 'Select a Business Sector.', 'data-original-title' => 'Business Sector')) ?>
				</div>
			</div>
		</div>
		<!-- Job Category section -->
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['business_category']->renderRow(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' => 'Select a Business Category.', 'data-original-title' => 'Business Category')) ?>
				</div>
			</div>
		</div>
		<!-- end -->
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['office_telephone']->renderRow(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' => 'Enter Office Telephone Number', 'data-original-title' => 'Office Telephone')) ?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['fax']->renderRow(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' => 'Enter Fax Number', 'data-original-title' => 'Fax')) ?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['post_box']->renderRow(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' => 'Enter you P.O Box Information ', 'data-original-title' => 'Post Address')) ?>
				</div>
			</div>
		</div>
	    <div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['location']->renderRow(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' => 'Select Business Location', 'data-original-title' => 'Business Location')) ?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['sector']->renderRow(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' => 'Select Business Sector', 'data-original-title' => 'Business Sector')) ?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['district']->renderRow(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' => 'Select District', 'data-original-title' => 'Business District')) ?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['city_province']->renderRow(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' => 'Select City / Province', 'data-original-title' => 'Business Setup Province/City')) ?>
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

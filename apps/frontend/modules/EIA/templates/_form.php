<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form  action="<?php echo url_for('EIA/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?> >
<?php if (!$form->getObject()->isNew()): ?>
		  <table class="table table-striped table-bordered">
<?php endif; ?>

    <tbody>
    
    <div class="control-group error">
      <?php echo $form->renderGlobalErrors() ?>
	</div>
      <div class="control-group">
        <?php echo $form['company_regno']->renderLabel(NULL,array('class' => 'control-label')) ?>
        <div class="controls">
		<?php echo $form['company_regno']->render(array('class' => 'span6 popovers', 'data-trigger' => 'hover', 'data-content' => 'Enter your Company Registration Number. This will be verified by the Business Registration System', 'data-original-title' => 'Company RegNo.' )) ?>
        <span class="help-inline">  <?php echo $form['company_regno']->renderError() ?> </span>
          
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['developer_name']->renderLabel(NULL,array('class' => 'control-label')) ?>
        <div class="controls">
		<?php echo $form['developer_name']->render(array('class' => 'span6 popovers', 'data-trigger' => 'hover', 'data-content' => 'Enter your Company Name. This will be verified by the Business Registration System', 'data-original-title' => 'Company Name.' )) ?>
          <span class="help-inline"><?php echo $form['developer_name']->renderError() ?> </span>
          
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['developer_title']->renderLabel(NULL,array('class' => 'control-label')) ?>
        <div class="controls">
		<?php echo $form['developer_title']->render(array('class' => 'span6 popovers', 'data-trigger' => 'hover', 'data-content' => 'Enter your Company Title.' ,'data-original-title' => 'Company Title' )) ?>
          <span class="help-inline"><?php echo $form['developer_title']->renderError() ?> </span>
          
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['developer_address']->renderLabel(NULL,array('class' => 'control-label')) ?>
        <div class="controls">
   
		<?php echo $form->renderGlobalErrors() ?> 
		<div class="control-group">
			<?php $form['name']->renderError() ?>
			<?php $form['name']->renderLabel() ?>
			<div class="controls">
				<?php echo $form['name']->renderRow(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' => 'Enter A Valid developer Name, The Name entered will be verified and counter checked
				from the business registration system. Make sure you have a registered name' , 'data-original-title' => 'Developer Name')) ?>
			</div>
		</div>
		<div class="control-group">
			<?php $form['company_regno']->renderError() ?>
			<?php $form['company_regno']->renderLabel() ?>
			<div class="controls">
				<?php echo $form['company_regno']->renderRow(array('class' => 'span6 popovers' , 'data-content' => 'Enter developer Registration Number. This is the Number that was issued when
				you registered your business' , 'data-trigger' => 'hover', 'data-original-title' => 'Developer Number')) ?>
			</div>
		</div>
		
		<div class="control-group">
			<?php $form['developer_title']->renderError() ?>
			<?php $form['developer_title']->renderLabel() ?>
			<div class="controls">
				<?php echo $form['developer_title']->renderRow(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' => 'Enter developer title', 'data-original-title' => 'Developer Title')) ?>
			</div>
			
		</div>
		<div class="control-group">
			<?php $form['developer_address']->renderError() ?>
			<?php $form['developer_address']->renderLabel() ?>
			<div class="controls">
				<?php echo $form['developer_address']->renderRow(array('class' => 'span6 popovers' , 'size' => '30', 'data-trigger' => 'hover', 'data-content' => 'Enter Current Business Location. This should be the physical location where conduct your business operations.', 'data-original-title' => 'Developer Address')) ?>
          <span class="help-inline"><?php echo $form['developer_address']->renderError() ?> </span>
          
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['project_name']->renderLabel(NULL,array('class' => 'control-label')) ?>
        <div class="controls">
		<?php echo $form['project_name']->render(array('class' => 'span6 popovers', 'data-trigger' => 'hover', 'data-content' => 'Enter the Project Name', 'data-original-title' => 'Project Name' )) ?>
          <span class="help-inline"><?php echo $form['project_name']->renderError() ?></span>
          
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['project_purpose']->renderLabel(NULL,array('class' => 'control-label')) ?>
        <div class="controls">
			</div>
			
		</div>
		<div class="control-group">
			<?php $form['project_name']->renderError() ?>
			<?php $form['project_name']->renderLabel() ?>
			<div class="controls">
				<?php echo $form['project_name']->renderRow(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' => 'Project Name', 'data-original-title' => 'Project name')) ?>
			</div>
		</div>
		<div class="control-group">
			<?php $form['project_purpose']->renderError() ?>
			<?php $form['project_purpose']->renderLabel() ?>
			<div class="controls">
					<?php echo $form['project_purpose']->renderRow(array('class' => 'span12 wysihtml5' ,'rows' => '14'))?>
          <span class="help-inline"><?php echo $form['project_purpose']->renderError() ?></span>
          
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['project_nature']->renderLabel(NULL,array('class' => 'control-label')) ?>
        <div class="controls">
			</div>
		</div>
		<div class="control-group">
			<?php $form['project_nature']->renderError() ?>
			<?php $form['project_nature']->renderLabel() ?>
			<div class="controls">
				<?php echo $form['project_nature']->renderRow(array('class' => 'span12 wysihtml5' ,'rows' => '14'))?>
          <span class="help-inline"><?php echo $form['project_nature']->renderError() ?></span>
          
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['project_site']->renderLabel(NULL,array('class' => 'control-label')) ?>
        <div class="controls">
			</div>
		</div>
		<div class="control-group">
			<?php $form['project_site']->renderError() ?>
			<?php $form['project_site']->renderLabel() ?>
			<div class="controls">
				<?php echo $form['project_site']->renderRow(array('class' => 'span12 wysihtml5' ,'rows' => '14'))?>
          <span class="help-inline"><?php echo $form['project_site']->renderError() ?></span>
          
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['project_sitelaws']->renderLabel(NULL,array('class' => 'control-label')) ?>
        <div class="controls">
			</div>
		</div>
		<div class="control-group">
			<?php $form['project_sitelaws']->renderError() ?>
			<?php $form['project_sitelaws']->renderLabel() ?>
			<div class="controls">
				<?php echo $form['project_sitelaws']->renderRow(array('class' => 'span12 wysihtml5' ,'rows' => '14'))?>
          <span class="help-inline"><?php echo $form['project_sitelaws']->renderError() ?></span>
          
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['environment_impacts']->renderLabel(NULL,array('class' => 'control-label')) ?>
        <div class="controls">
			</div>
		</div>
		<div class="control-group">
			<?php $form['environment_impacts']->renderError() ?>
			<?php $form['environment_impacts']->renderLabel() ?>
			<div class="controls">
				<?php echo $form['environment_impacts']->renderRow(array('class' => 'span12 wysihtml5' ,'rows' => '14'))?>
          <span class="help-inline"><?php echo $form['environment_impacts']->renderError() ?></span>
          
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['other_alternatives']->renderLabel(NULL,array('class' => 'control-label')) ?>
        <div class="controls">
			</div>
		</div>
		<div class="control-group">
			<?php $form['other_alternatives']->renderError() ?>
			<?php $form['other_alternatives']->renderLabel() ?>
			<div class="controls">
				<?php echo $form['other_alternatives']->renderRow(array('class' => 'span12 wysihtml5' ,'rows' => '14'))?>
          <span class="help-inline"><?php echo $form['other_alternatives']->renderError() ?></span>
          
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['other_information']->renderLabel(NULL,array('class' => 'control-label')) ?>
        <div class="controls">
			</div>
		</div>
	   <div class="control-group">
			<?php $form['other_information']->renderError() ?>
			<?php $form['other_information']->renderLabel() ?>
			<div class="controls">
				<?php echo $form['other_information']->renderRow(array('class' => 'span12 wysihtml5' ,'rows' => '14'))?>
          <span class="help-inline"><?php echo $form['other_information']->renderError() ?></span>
          
        </div>
      </div>
			</div>
		</div>
		<?php echo $form->renderHiddenFields(); ?>
      <tfoot>
      <tr>
	   <td>
		<div class="form-actions">
        
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('eia/index') ?>" class="btn">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'eia/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?', 'class' => 'btn btn-danger')) ?>
          <?php endif; ?>
          <input type="submit" value="Submit" class="btn btn-success"/>
        
		</div>
		</td>
		</tr>
		</tfoot>
       </tbody>
  </table>
</form>

<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('eia/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?> class="form-horizontal">
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
	<div class="alert alert-block alert-info fade in">
		<h4 class="alert-heading">Info</h4>
		<p> Please fill in the following fields</p>
	</div>
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
        <?php echo $form['name']->renderLabel(NULL,array('class' => 'control-label')) ?>
        <div class="controls">
		<?php echo $form['name']->render(array('class' => 'span6 popovers', 'data-trigger' => 'hover', 'data-content' => 'Enter your Company Name. This will be verified by the Business Registration System', 'data-original-title' => 'Company Name.' )) ?>
          <span class="help-inline"><?php echo $form['name']->renderError() ?> </span>
          
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
		<?php echo $form['developer_address']->render(array('class' => 'span6 popovers', 'data-trigger' => 'hover', 'data-content' => 'Enter your Company Current Address.', 'data-original-title' => 'Address' )) ?>
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
		<?php echo $form['project_purpose']->render(array('class' => 'span6 popovers', 'data-trigger' => 'hover', 'data-content' => 'Enter the purpose of the project', 'data-original-title' => 'Project Objectives' )) ?>
          <span class="help-inline"><?php echo $form['project_purpose']->renderError() ?></span>
          
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['project_nature']->renderLabel(NULL,array('class' => 'control-label')) ?>
        <div class="controls">
		<?php echo $form['project_nature']->render(array('class' => 'span6 popovers', 'data-trigger' => 'hover', 'data-content' => 'Enter the Nature of the project', 'data-original-title' => 'Project Nature' )) ?>
          <span class="help-inline"><?php echo $form['project_nature']->renderError() ?></span>
          
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['project_site']->renderLabel(NULL,array('class' => 'control-label')) ?>
        <div class="controls">
		<?php echo $form['project_site']->render(array('class' => 'span6 popovers', 'data-trigger' => 'hover', 'data-content' => 'Enter the project proposed site', 'data-original-title' => 'Project Site' )) ?>
          <span class="help-inline"><?php echo $form['project_site']->renderError() ?></span>
          
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['project_sitelaws']->renderLabel(NULL,array('class' => 'control-label')) ?>
        <div class="controls">
		<?php echo $form['project_sitelaws']->render(array('class' => 'span6 popovers', 'data-trigger' => 'hover', 'data-content' => 'Enter the site laws of the proposed location', 'data-original-title' => 'Site Laws' )) ?>
          <span class="help-inline"><?php echo $form['project_sitelaws']->renderError() ?></span>
          
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['environment_impacts']->renderLabel(NULL,array('class' => 'control-label')) ?>
        <div class="controls">
		<?php echo $form['environment_impacts']->render(array('class' => 'span6 popovers', 'data-trigger' => 'hover', 'data-content' => 'Enter the project environmental impact.', 'data-original-title' => 'Environmental Impact' )) ?>
          <span class="help-inline"><?php echo $form['environment_impacts']->renderError() ?></span>
          
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['other_alternatives']->renderLabel(NULL,array('class' => 'control-label')) ?>
        <div class="controls">
		<?php echo $form['other_alternatives']->render(array('class' => 'span6 popovers', 'data-trigger' => 'hover', 'data-content' => 'Enter other alternatives for the proposed project.', 'data-original-title' => 'Other Alternatives' )) ?>
          <span class="help-inline"><?php echo $form['other_alternatives']->renderError() ?></span>
          
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['other_information']->renderLabel(NULL,array('class' => 'control-label')) ?>
        <div class="controls">
		<?php echo $form['other_information']->render(array('class' => 'span6 popovers', 'data-trigger' => 'hover', 'data-content' => 'Enter any other information you want to add about the project.', 'data-original-title' => 'Company RegNo.' )) ?>
          <span class="help-inline"><?php echo $form['other_information']->renderError() ?></span>
          
        </div>
      </div>
	  
		<div class="form-actions">
        
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('@homepage') ?>" class="btn">Home</a>
          <?php //if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php //echo link_to('Delete', 'eia/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?', 'class' => 'btn btn-danger')) ?>
          <?php //endif; ?>
          <input type="submit" value="Submit" class="btn btn-success"/>
        
		</div>


</form>

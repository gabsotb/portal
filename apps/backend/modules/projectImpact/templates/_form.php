<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('projectImpact/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?> class="form-horizontal">
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>

    
	<div class="row-fluid">
	  <div class="control-group error">
      <?php echo $form->renderGlobalErrors() ?>
	  </div>
	</div>
	
      <div class="control-group">
        <th><?php echo $form['company_id']->renderLabel(NULL,array('class' => 'control-label')) ?></th>
        <div class="controls">
		<?php echo $form['company_id'] ?>
          <span class="help-inline"><?php echo $form['company_id']->renderError() ?></span>
          
        </div>
      </div>
	
	  
	
      <div class="control-group">
        <th><?php echo $form['impact_level']->renderLabel(NULL,array('class' => 'control-label')) ?></th>
        <div class="controls">
		<?php echo $form['impact_level'] ?>
        <span class="help-inline">  <?php echo $form['impact_level']->renderError() ?> </span>
          
        </div>
      </div>
	
	  
	
      <div class="control-group">
        <th><?php echo $form['comments']->renderLabel('Report',array('class' => 'control-label')) ?></th>
        <div class="controls">
		<?php echo $form['comments'] ?>
        <span class="help-inline">  <?php echo $form['comments']->renderError() ?> </span>
          
        </div>
      </div>
	
 
      <div class="form-actions">
        
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('projectImpact/index') ?>" class="btn">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'projectImpact/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?', 'class' => 'btn btn-danger')) ?>
          <?php endif; ?>
          <input type="submit" value="Submit" class="btn btn-success" />
        
      </div>
 
</form>

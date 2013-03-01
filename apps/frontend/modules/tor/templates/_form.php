<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('tor/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?> class="form-horizontal">
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
 
    
    
    <div class="control-group error">
      <?php echo $form->renderGlobalErrors() ?>
	</div>
	<div class="control-group">
        <?php echo $form['impact_id']->renderLabel(NULL,array('class' => 'control-label')) ?>
        <div class="controls">
		<?php echo $form['impact_id']->render(array('class' => 'span6' )) ?>
          <span class="help-inline"><?php echo $form['impact_id']->renderError() ?></span>
          
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['issues_assessed']->renderLabel(NULL,array('class' => 'control-label')) ?>
        <div class="controls">
		<?php echo $form['issues_assessed']->render(array('class' => 'span12 wysihtml5' ,'rows' => '10' )) ?>
          <span class="help-inline"><?php echo $form['issues_assessed']->renderError() ?></span>
          
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['specific_tasks']->renderLabel(NULL,array('class' => 'control-label')) ?>
        <div class="controls">
		<?php echo $form['specific_tasks']->render(array('class' => 'span12 wysihtml5' ,'rows' => '10' )) ?>
          <span class="help-inline"><?php echo $form['specific_tasks']->renderError() ?></span>
          
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['stake_holders']->renderLabel(NULL,array('class' => 'control-label')) ?>
        <div class="controls">
		<?php echo $form['stake_holders']->render(array('class' => 'span12 wysihtml5' ,'rows' => '10' )) ?>
          <span class="help-inline"><?php echo $form['stake_holders']->renderError() ?></span>
          
        </div>
      </div>
      <div class="control-group">
        <?php echo $form['experts']->renderLabel(NULL,array('class' => 'control-label')) ?>
        <div class="controls">
		<?php echo $form['experts']->render(array('class' => 'span12 wysihtml5' ,'rows' => '10' )) ?>
          <span class="help-inline"><?php echo $form['experts']->renderError() ?></span>
          
        </div>
      </div>
	  
		<div class="form-actions">
      
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('tor/index') ?>" class="btn">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'tor/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?', 'class' => 'btn btn-danger')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" class="btn btn-success"/>
        
		</div>

  
</form>

<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('eiaProjectBreifDecision/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId().'&act='.$heading : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?> class="form-horizontal">
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table class="table table-striped">
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
		<tr>
			<td>
			  <?php echo $form['comments']->renderError() ?>
			  <?php echo $form['comments']->render(array('class' => 'span12 wysihtml5','rows' => '12')) ?>
			</td>
		</tr>
		<?php if($heading == 'Resubmission'): ?>
		<tr>
			<td>
			<div class="alert alert-info"><b>Select which form the applicant should resubmit</b></div>
			<div class="controls">
			<label class="checkbox">
			  <?php echo $form['all_form']->renderError() ?>
			  <?php echo $form['all_form']->render(array('class' => 'checker','id' => 'uniform-undefined')) ?>
			  <?php echo __('All Forms') ?>
			</label>
			<label class="checkbox">
			  <?php echo $form['project_detail']->renderError() ?>
			  <?php echo $form['project_detail']->render(array('class' => 'checker','id' => 'uniform-undefined')) ?>
			  <?php echo __('Project Detail') ?>
			</label>
			<label class="checkbox">
			  <?php echo $form['project_developer']->renderError() ?>
			  <?php echo $form['project_developer']->render(array('class' => 'checker','id' => 'uniform-undefined')) ?>
			  <?php echo __('Project Developer') ?>
			</label>
			<label class="checkbox">
			  <?php echo $form['project_description']->renderError() ?>
			  <?php echo $form['project_description']->render(array('class' => 'checker','id' => 'uniform-undefined')) ?>
			  <?php echo __('Project Description') ?>
			</label>
			<label class="checkbox">
			  <?php echo $form['project_surrounding']->renderError() ?>
			  <?php echo $form['project_surrounding']->render(array('class' => 'checker','id' => 'uniform-undefined')) ?>
			  <?php echo __('Project Surrounding') ?>
			</label>
			<label class="checkbox">
			  <?php echo $form['project_surrounding_species']->renderError() ?>
			  <?php echo $form['project_surrounding_species']->render(array('class' => 'checker','id' => 'uniform-undefined')) ?>
			  <?php echo __('Project Surrounding Species') ?>
			</label>
			<label class="checkbox">
			  <?php echo $form['project_social_economic']->renderError() ?>
			  <?php echo $form['project_social_economic']->render(array('class' => 'checker','id' => 'uniform-undefined')) ?>
			  <?php echo __('Project Social Economic') ?>
			</label>
			<label class="checkbox">
			  <?php echo $form['project_impact_measures']->renderError() ?>
			  <?php echo $form['project_impact_measures']->render(array('class' => 'checker','id' => 'uniform-undefined')) ?>
			  <?php echo __('Project Impact Measures') ?>
			</label>
			<label class="checkbox">
			  <?php echo $form['project_operation_phase']->renderError() ?>
			  <?php echo $form['project_operation_phase']->render(array('class' => 'checker','id' => 'uniform-undefined')) ?>
			  <?php echo __('Project Operation Phase') ?>
			</label>
			<label class="checkbox">
			  <?php echo $form['project_attachment']->renderError() ?>
			  <?php echo $form['project_attachment']->render(array('class' => 'checker','id' => 'uniform-undefined')) ?>
			  <?php echo __('Project Attachment') ?>
			</label>
			</div>
			</td>
		</tr>
		<?php endif; ?>
    </tbody>
  </table>
  <div class="form-actions">
          <?php echo $form->renderHiddenFields(false) ?>
          <!--&nbsp;<a href="<?php //echo url_for('eiaProjectBreifDecision/index') ?>">Back to list</a>-->
          <?php //if (!$form->getObject()->isNew()): ?>
            <!--&nbsp;<?php /*echo link_to('Delete', 'eiaProjectBreifDecision/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?> 
          <?php endif; */?>-->
          <input type="submit" value="Submit" class="btn btn-success btn-large "/>
    </div>
	
</form>

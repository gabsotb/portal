<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('projectDetail/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
 <table class="table table-striped table-bordered" id="eia_table1">
     <tbody>
      <div class="control-group">
		<?php echo $form->renderGlobalErrors(); ?>
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['project_title']->renderRow(array('class' => 'span10 popovers' ,'size' => '20', 'data-content' => 'Enter Your Project Title' , 'data-trigger' => 'hover', 'data-original-title' => 'Title of Project')) ?>
				</div>
			</div>
		</div>
	    <div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['project_plot_number']->renderRow(array('class' => 'span10 popovers' , 'data-content' => 'The Plot Number of Land to use for Set up of your Project' , 'data-trigger' => 'hover', 'data-original-title' => 'Plot Number')) ?>
				</div>
			</div>
		</div>
		  <div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['village']->renderRow(array('class' => 'span10 popovers' , 'data-content' => 'Enter Village where your project will be located' , 'data-trigger' => 'hover', 'data-original-title' => 'Village Name')) ?>
				</div>
			</div>
		</div>
		  <div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['cell']->renderRow(array('class' => 'span10 popovers' , 'data-content' => 'Enter The Cell Name of Your Project Location' , 'data-trigger' => 'hover', 'data-original-title' => 'Cell Name')) ?>
				</div>
			</div>
		</div>
		  <div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['sector']->renderRow(array('class' => 'span6 chosen')) ?>
				</div>
			</div>
		</div>
		  <div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['district']->renderRow(array('class' => 'span6 chosen')) ?>
				</div>
			</div>
		</div>
		  <div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['province']->renderRow(array('class' => 'span6 chosen')) ?>
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
    </tbody>
    <tfoot>
      <tr>
        <td colspan="2">
          <input type="submit"  class="btn btn-primary" value="Next" />
        </td>
      </tr>
    </tfoot>
    
  </table>
</form>

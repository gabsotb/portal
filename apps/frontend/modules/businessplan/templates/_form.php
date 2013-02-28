<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form class="" action="<?php echo url_for('businessplan/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
  <table class="table table-striped table-bordered">
		
    <tbody>
		 
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['investment_id']->render() ?>
				</div>
			</div>
		</div> 
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['executive_summary']->renderRow(array('class' => 'span12 wysihtml5' ,'rows' => '10'))?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['promoter_profile']->renderRow(array('class' => 'span12 wysihtml5' ,'rows' => '10')) ?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['project_background']->renderRow(array('class' => 'span12 wysihtml5' ,'rows' => '10'))?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['equity_financing']->renderRow(array('class' => 'span12 wysihtml5' ,'rows' => '10')) ?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['income_statement']->renderRow(array('class' => 'span12 wysihtml5' ,'rows' => '10'))?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['cashflow_statement']->renderRow(array('class' => 'span12 wysihtml5' ,'rows' => '10')) ?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['payback_period']->renderRow(array('class' => 'span12 wysihtml5' ,'rows' => '10')) ?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['npv']->renderRow(array('class' => 'span12 wysihtml5' ,'rows' => '10'))?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['loan_amortization']->renderRow(array('class' => 'span12 wysihtml5' ,'rows' => '10')) ?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['implementation_plan']->renderRow(array('class' => 'span12 wysihtml5' ,'rows' => '10')) ?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['notes']->renderRow(array('class' => 'span12 wysihtml5' ,'rows' => '10')) ?>
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
          <!--&nbsp;<a href="<?php //echo url_for('businessplan/index') ?>">Back to list</a> -->
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'businessplan/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input class="btn btn-primary" type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>               
     
		
    </tbody>
  </table>
</form>

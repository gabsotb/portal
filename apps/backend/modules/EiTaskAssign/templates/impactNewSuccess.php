<div class="span12">
	<h3 class="page-title">Project Impact Form <small> Environmental Impact Assessment </small> </h3>
</div>
<div class="row-fluid">
		<div class="span8">
			<div class="widget">
				<div class="widget-title">
					<h4> Project Impact </h4>
				</div>
				<div class="widget-body form">
					<form action="<?php echo url_for('EiTaskAssign/'.($form->getObject()->isNew() ? 'impactCreate' : 'impactUpdate').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post">
					<?php echo $form->renderGlobalErrors() ?>
						<div class="control-group">
						<?php echo $form['company_id']->renderLabel() ?>
						<?php echo $form['company_id']->renderError() ?>
							<div class="controls">
							<?php echo $form['company_id'] ?>
							</div>
						</div>
						<div class="control-group">
						<?php echo $form['impact_level']->renderLabel() ?>
						<?php echo $form['impact_level']->renderError() ?>
							<div class="controls">
							<?php echo $form['impact_level'] ?>
							</div>
						</div>
						<div class="control-group">
						<?php echo $form['comments']->renderLabel() ?>
						<?php echo $form['comments']->renderError() ?>
							<div class="controls">
							<?php echo $form['comments'] ?>
							</div>
						</div>
						<?php echo $form->renderHiddenFields() ?>
						<div class="form-actions">
						<input type="submit" class="btn btn-primary" value="Submit" />
						<?php echo button_to('Cancel','EiTaskAssign/assignment',array('class' => 'btn btn-danger')) ?>
						</div>
					</form>
				</div>
			</div>
		</div>
</div>
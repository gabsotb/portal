<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('eiaTaskAssign/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?> class="form-horizontal">
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table class="table table-striped table-hover">
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['user_assigned']->renderLabel('Assign to:') ?></th>
        <td>
          <?php echo $form['user_assigned']->renderError() ?>
          <?php echo $form['user_assigned'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['eiaproject_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['eiaproject_id']->renderError() ?>
          <?php echo $form['eiaproject_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['instructions']->renderLabel() ?></th>
        <td>
          <?php echo $form['instructions']->renderError() ?>
          <?php echo $form['instructions']->render(array('class' => 'span12 wysihtml5' ,'rows' => '10')) ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['duedate']->renderLabel('Due Date:') ?></th>
        <td>
          <?php echo $form['duedate']->renderError() ?>
          <?php echo $form['duedate']->render(array('class' => 'span6 input-small date-picker')) ?>
		</td>
	  </tr>
	  <tr>
		<th><?php echo $form['duedate']->renderLabel('Time:') ?></th>
		<td>
        <?php echo $form['duedate']->render(array('class' => 'timepicker-24 input-small')) ?>
        </td>
      </tr>
	</tbody>
 </table>
    <div class="form-actions">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('eiaTaskAssign/index') ?>"class="btn">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'eiaTaskAssign/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?','class' => 'btn btn-danger')) ?>
          <?php endif; ?>
          <input type="submit" value="Assign" class="btn btn-success"/>
    </div>
 
</form>

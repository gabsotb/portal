<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('eiaSiteVisitReport/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>class="form-horizontal">
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table class="table table-striped">
    <tfoot class="form-actions">
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('@homepage') ?>"class="btn btn-inverse">Back</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php //echo link_to('Delete', 'eiaSiteVisitReport/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Submit" class="btn btn-success"/>
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['report']->renderLabel() ?></th>
        <td>
          <?php echo $form['report']->renderError() ?>
          <?php echo $form['report']->render(array('class' => 'span12 wysihtml5', 'rows' => '8')) ?>
        </td>
      </tr>
	  <tr>
		<th><?php echo $form['tor']->renderLabel() ?></th>
		<td>
			 <div class="controls">
				 <div class="fileupload fileupload-new" data-provides="fileupload">
				 <div class="input-append">
					<div class="uneditable-input span3">
						<i class="icon-file fileupload-exists"></i>
						<span class="fileupload-preview"></span>
					</div>
				  <span class="btn btn-file">
					<span class="fileupload-new">Select File</span>
					<span class="fileupload-exists">Change</span>
					<?php echo $form['tor']->render(array('class' => 'default'))?>
					</span>
				  <span class="fileupload-preview"></span>
				  <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
				</div>
				</div>
			</div>
		</td>
	</tr>
    </tbody>
  </table>
</form>

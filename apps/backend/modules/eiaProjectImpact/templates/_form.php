<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('eiaProjectImpact/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>class="form-horizontal">
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table class="table table-striped">
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('eiaProjectImpact/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'eiaProjectImpact/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Submit" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['impact_level']->renderLabel() ?></th>
        <td>
          <?php echo $form['impact_level']->renderError() ?>
          <?php echo $form['impact_level'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['comments']->renderLabel('Remarks:') ?></th>
        <td>
          <?php echo $form['comments']->renderError() ?>
          <?php echo $form['comments']->render(array('class' => 'span12 wysihtml5', 'rows' => '8')) ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>

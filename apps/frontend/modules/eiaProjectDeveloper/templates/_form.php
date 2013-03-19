<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('eiaProjectDeveloper/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table class="table table-striped table-bordered">
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('eiaProjectDeveloper/index') ?>" class="btn">Back</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php //echo link_to('Delete', 'eiaProjectDeveloper/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Submit" class="btn btn-primary" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['developer_name']->renderLabel() ?></th>
        <td>
          <?php echo $form['developer_name']->renderError() ?>
          <?php echo $form['developer_name']->render(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' => 'Enter the developers name', 'data-original-title' => 'Developer Name')) ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['contact_person']->renderLabel() ?></th>
        <td>
          <?php echo $form['contact_person']->renderError() ?>
          <?php echo $form['contact_person']->render(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' => 'Contact personnel at the company', 'data-original-title' => 'Contacts Name')) ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['address']->renderLabel() ?></th>
        <td>
          <?php echo $form['address']->renderError() ?>
          <?php echo $form['address']->render(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' => 'Address of Developer', 'data-original-title' => 'Address')) ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['telephone']->renderLabel() ?></th>
        <td>
          <?php echo $form['telephone']->renderError() ?>
          <?php echo $form['telephone']->render(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' => 'Contact number', 'data-original-title' => 'Telephone Number')) ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['mobile_phone']->renderLabel() ?></th>
        <td>
          <?php echo $form['mobile_phone']->renderError() ?>
          <?php echo $form['mobile_phone']->render(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' => 'Contact mobile number', 'data-original-title' => 'Mobile Number')) ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['email_address']->renderLabel() ?></th>
        <td>
          <?php echo $form['email_address']->renderError() ?>
          <?php echo $form['email_address']->render(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' => 'Email address for notification', 'data-original-title' => 'Email')) ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['communication_mode']->renderLabel() ?></th>
        <td>
          <?php echo $form['communication_mode']->renderError() ?>
          <?php echo $form['communication_mode']->render(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' => 'Preferred social network for notification ', 'data-original-title' => 'Communication mode')) ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['social_media_account']->renderLabel() ?></th>
        <td>
          <?php echo $form['social_media_account']->renderError() ?>
          <?php echo $form['social_media_account']->render(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' => 'Social media username', 'data-original-title' => 'Social media account')) ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>

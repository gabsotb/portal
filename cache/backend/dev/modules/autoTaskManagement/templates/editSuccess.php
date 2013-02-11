<?php use_helper('I18N', 'Date') ?>
<?php include_partial('taskManagement/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Edit Job Assigned To %%sfGuard_user%%', array('%%sfGuard_user%%' => $task_assignment->getSfGuardUser()), 'messages') ?></h1>

  <?php include_partial('taskManagement/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('taskManagement/form_header', array('task_assignment' => $task_assignment, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('taskManagement/form', array('task_assignment' => $task_assignment, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('taskManagement/form_footer', array('task_assignment' => $task_assignment, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>

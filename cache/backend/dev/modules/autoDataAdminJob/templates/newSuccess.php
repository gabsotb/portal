<?php use_helper('I18N', 'Date') ?>
<?php include_partial('dataAdminJob/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Assign A New Task To a Data Admin', array(), 'messages') ?></h1>

  <?php include_partial('dataAdminJob/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('dataAdminJob/form_header', array('task_assignment' => $task_assignment, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('dataAdminJob/form', array('task_assignment' => $task_assignment, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('dataAdminJob/form_footer', array('task_assignment' => $task_assignment, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>

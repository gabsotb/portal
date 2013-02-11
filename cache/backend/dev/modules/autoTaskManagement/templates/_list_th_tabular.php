<?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_sfGuard_user">
  <?php echo __('User Assigned', array(), 'messages') ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_investment_application">
  <?php echo __('For Business', array(), 'messages') ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_instructions">
  <?php if ('instructions' == $sort[0]): ?>
    <?php echo link_to(__('Instructions', array(), 'messages'), '@task_assignment_taskManagement', array('query_string' => 'sort=instructions&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Instructions', array(), 'messages'), '@task_assignment_taskManagement', array('query_string' => 'sort=instructions&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_date sf_admin_list_th_duedate">
  <?php if ('duedate' == $sort[0]): ?>
    <?php echo link_to(__('Duedate', array(), 'messages'), '@task_assignment_taskManagement', array('query_string' => 'sort=duedate&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Duedate', array(), 'messages'), '@task_assignment_taskManagement', array('query_string' => 'sort=duedate&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_work_status">
  <?php if ('work_status' == $sort[0]): ?>
    <?php echo link_to(__('Work status', array(), 'messages'), '@task_assignment_taskManagement', array('query_string' => 'sort=work_status&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Work status', array(), 'messages'), '@task_assignment_taskManagement', array('query_string' => 'sort=work_status&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?>
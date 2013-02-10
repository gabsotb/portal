<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($task_assignment->getId(), 'task_assignment_edit', $task_assignment) ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_user_assigned">
  <?php echo $task_assignment->getUserAssigned() ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_investmentapp_id">
  <?php echo $task_assignment->getInvestmentappId() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_instructions">
  <?php echo $task_assignment->getInstructions() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_duedate">
  <?php echo false !== strtotime($task_assignment->getDuedate()) ? format_date($task_assignment->getDuedate(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_text sf_admin_list_td_work_status">
  <?php echo $task_assignment->getWorkStatus() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_created_at">
  <?php echo false !== strtotime($task_assignment->getCreatedAt()) ? format_date($task_assignment->getCreatedAt(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_date sf_admin_list_td_updated_at">
  <?php echo false !== strtotime($task_assignment->getUpdatedAt()) ? format_date($task_assignment->getUpdatedAt(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_created_by">
  <?php echo $task_assignment->getCreatedBy() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_updated_by">
  <?php echo $task_assignment->getUpdatedBy() ?>
</td>

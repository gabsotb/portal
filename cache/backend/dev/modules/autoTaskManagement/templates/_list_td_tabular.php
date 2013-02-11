<td class="sf_admin_text sf_admin_list_td_sfGuard_user">
  <?php echo link_to($task_assignment->getSfGuardUser(), 'task_assignment_taskManagement_edit', $task_assignment) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_investment_application">
  <?php echo $task_assignment->getInvestmentApplication() ?>
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

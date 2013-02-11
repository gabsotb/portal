<td colspan="3">
  <?php echo __('%%name%% - %%description%% - %%created_at%%', array('%%name%%' => link_to($sf_guard_permission->getName(), 'sf_guard_permission_edit', $sf_guard_permission), '%%description%%' => $sf_guard_permission->getDescription(), '%%created_at%%' => false !== strtotime($sf_guard_permission->getCreatedAt()) ? format_date($sf_guard_permission->getCreatedAt(), "f") : '&nbsp;'), 'messages') ?>
</td>

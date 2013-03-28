<h1>Ei task assignments List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>User assigned</th>
      <th>Eiaproject</th>
      <th>Instructions</th>
      <th>Duedate</th>
      <th>Work status</th>
      <th>Token</th>
      <th>Created at</th>
      <th>Updated at</th>
      <th>Created by</th>
      <th>Updated by</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($ei_task_assignments as $ei_task_assignment): ?>
    <tr>
      <td><a href="<?php echo url_for('eiaTaskAssign/show?id='.$ei_task_assignment->getId()) ?>"><?php echo $ei_task_assignment->getId() ?></a></td>
      <td><?php echo $ei_task_assignment->getUserAssigned() ?></td>
      <td><?php echo $ei_task_assignment->getEiaprojectId() ?></td>
      <td><?php echo $ei_task_assignment->getInstructions() ?></td>
      <td><?php echo $ei_task_assignment->getDuedate() ?></td>
      <td><?php echo $ei_task_assignment->getWorkStatus() ?></td>
      <td><?php echo $ei_task_assignment->getToken() ?></td>
      <td><?php echo $ei_task_assignment->getCreatedAt() ?></td>
      <td><?php echo $ei_task_assignment->getUpdatedAt() ?></td>
      <td><?php echo $ei_task_assignment->getCreatedBy() ?></td>
      <td><?php echo $ei_task_assignment->getUpdatedBy() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('eiaTaskAssign/new') ?>">New</a>
<h1>Task assignments List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>User assigned</th>
      <th>Investmentapp</th>
      <th>Instructions</th>
      <th>Duedate</th>
      <th>Work status</th>
      <th>Created at</th>
      <th>Updated at</th>
      <th>Created by</th>
      <th>Updated by</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($task_assignments as $task_assignment): ?>
    <tr>
      <td><a href="<?php echo url_for('taskAssign/show?id='.$task_assignment->getId()) ?>"><?php echo $task_assignment->getId() ?></a></td>
      <td><?php echo $task_assignment->getUserAssigned() ?></td>
      <td><?php echo $task_assignment->getInvestmentappId() ?></td>
      <td><?php echo $task_assignment->getInstructions() ?></td>
      <td><?php echo $task_assignment->getDuedate() ?></td>
      <td><?php echo $task_assignment->getWorkStatus() ?></td>
      <td><?php echo $task_assignment->getCreatedAt() ?></td>
      <td><?php echo $task_assignment->getUpdatedAt() ?></td>
      <td><?php echo $task_assignment->getCreatedBy() ?></td>
      <td><?php echo $task_assignment->getUpdatedBy() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('taskAssign/new') ?>">New</a>

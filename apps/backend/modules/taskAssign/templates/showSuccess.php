<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $task_assignment->getId() ?></td>
    </tr>
    <tr>
      <th>User assigned:</th>
      <td><?php echo $task_assignment->getUserAssigned() ?></td>
    </tr>
    <tr>
      <th>Investmentapp:</th>
      <td><?php echo $task_assignment->getInvestmentappId() ?></td>
    </tr>
    <tr>
      <th>Instructions:</th>
      <td><?php echo $task_assignment->getInstructions() ?></td>
    </tr>
    <tr>
      <th>Duedate:</th>
      <td><?php echo $task_assignment->getDuedate() ?></td>
    </tr>
    <tr>
      <th>Work status:</th>
      <td><?php echo $task_assignment->getWorkStatus() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $task_assignment->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $task_assignment->getUpdatedAt() ?></td>
    </tr>
    <tr>
      <th>Created by:</th>
      <td><?php echo $task_assignment->getCreatedBy() ?></td>
    </tr>
    <tr>
      <th>Updated by:</th>
      <td><?php echo $task_assignment->getUpdatedBy() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('taskAssign/edit?id='.$task_assignment->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('taskAssign/index') ?>">List</a>

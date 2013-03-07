<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $record_decision->getId() ?></td>
    </tr>
    <tr>
      <th>Tor:</th>
      <td><?php echo $record_decision->getTorId() ?></td>
    </tr>
    <tr>
      <th>Decision:</th>
      <td><?php echo $record_decision->getDecision() ?></td>
    </tr>
    <tr>
      <th>Comment:</th>
      <td><?php echo $record_decision->getComment() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $record_decision->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $record_decision->getUpdatedAt() ?></td>
    </tr>
    <tr>
      <th>Created by:</th>
      <td><?php echo $record_decision->getCreatedBy() ?></td>
    </tr>
    <tr>
      <th>Updated by:</th>
      <td><?php echo $record_decision->getUpdatedBy() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('decision/edit?id='.$record_decision->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('decision/index') ?>">List</a>

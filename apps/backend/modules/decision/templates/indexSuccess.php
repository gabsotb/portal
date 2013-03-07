<h1>Record decisions List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Tor</th>
      <th>Decision</th>
      <th>Comment</th>
      <th>Created at</th>
      <th>Updated at</th>
      <th>Created by</th>
      <th>Updated by</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($record_decisions as $record_decision): ?>
    <tr>
      <td><a href="<?php echo url_for('decision/show?id='.$record_decision->getId()) ?>"><?php echo $record_decision->getId() ?></a></td>
      <td><?php echo $record_decision->getTorId() ?></td>
      <td><?php echo $record_decision->getDecision() ?></td>
      <td><?php echo $record_decision->getComment() ?></td>
      <td><?php echo $record_decision->getCreatedAt() ?></td>
      <td><?php echo $record_decision->getUpdatedAt() ?></td>
      <td><?php echo $record_decision->getCreatedBy() ?></td>
      <td><?php echo $record_decision->getUpdatedBy() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('decision/new') ?>">New</a>

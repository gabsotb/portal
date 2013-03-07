<h1>Tor decisionss List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Tor</th>
      <th>Decision</th>
      <th>Comments</th>
      <th>Created at</th>
      <th>Updated at</th>
      <th>Created by</th>
      <th>Updated by</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tor_decisionss as $tor_decisions): ?>
    <tr>
      <td><a href="<?php echo url_for('torDecision/edit?id='.$tor_decisions->getId()) ?>"><?php echo $tor_decisions->getId() ?></a></td>
      <td><?php echo $tor_decisions->getTorId() ?></td>
      <td><?php echo $tor_decisions->getDecision() ?></td>
      <td><?php echo $tor_decisions->getComments() ?></td>
      <td><?php echo $tor_decisions->getCreatedAt() ?></td>
      <td><?php echo $tor_decisions->getUpdatedAt() ?></td>
      <td><?php echo $tor_decisions->getCreatedBy() ?></td>
      <td><?php echo $tor_decisions->getUpdatedBy() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('torDecision/new') ?>">New</a>

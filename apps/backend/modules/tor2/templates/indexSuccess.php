<h1>Tors List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Impact</th>
      <th>Issues assessed</th>
      <th>Specific tasks</th>
      <th>Stake holders</th>
      <th>Experts</th>
      <th>Created at</th>
      <th>Updated at</th>
      <th>Created by</th>
      <th>Updated by</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tors as $tor): ?>
    <tr>
      <td><a href="<?php echo url_for('tor2/show?id='.$tor->getId()) ?>"><?php echo $tor->getId() ?></a></td>
      <td><?php echo $tor->getImpactId() ?></td>
      <td><?php echo $tor->getIssuesAssessed() ?></td>
      <td><?php echo $tor->getSpecificTasks() ?></td>
      <td><?php echo $tor->getStakeHolders() ?></td>
      <td><?php echo $tor->getExperts() ?></td>
      <td><?php echo $tor->getCreatedAt() ?></td>
      <td><?php echo $tor->getUpdatedAt() ?></td>
      <td><?php echo $tor->getCreatedBy() ?></td>
      <td><?php echo $tor->getUpdatedBy() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('tor2/new') ?>">New</a>

<h1>Public hearings List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Company</th>
      <th>Report</th>
      <th>Created at</th>
      <th>Updated at</th>
      <th>Created by</th>
      <th>Updated by</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($public_hearings as $public_hearing): ?>
    <tr>
      <td><a href="<?php echo url_for('publicHearing/show?id='.$public_hearing->getId()) ?>"><?php echo $public_hearing->getId() ?></a></td>
      <td><?php echo $public_hearing->getCompanyId() ?></td>
      <td><?php echo $public_hearing->getReport() ?></td>
      <td><?php echo $public_hearing->getCreatedAt() ?></td>
      <td><?php echo $public_hearing->getUpdatedAt() ?></td>
      <td><?php echo $public_hearing->getCreatedBy() ?></td>
      <td><?php echo $public_hearing->getUpdatedBy() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('publicHearing/new') ?>">New</a>

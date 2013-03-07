<h1>Eia reportss List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Module</th>
      <th>Module</th>
      <th>Recommendations</th>
      <th>Created at</th>
      <th>Updated at</th>
      <th>Created by</th>
      <th>Updated by</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($eia_reportss as $eia_reports): ?>
    <tr>
      <td><a href="<?php echo url_for('eiaReport/show?id='.$eia_reports->getId()) ?>"><?php echo $eia_reports->getId() ?></a></td>
      <td><?php echo $eia_reports->getModule() ?></td>
      <td><?php echo $eia_reports->getModuleId() ?></td>
      <td><?php echo $eia_reports->getRecommendations() ?></td>
      <td><?php echo $eia_reports->getCreatedAt() ?></td>
      <td><?php echo $eia_reports->getUpdatedAt() ?></td>
      <td><?php echo $eia_reports->getCreatedBy() ?></td>
      <td><?php echo $eia_reports->getUpdatedBy() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('eiaReport/new') ?>">New</a>

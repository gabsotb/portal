<h1>Project impacts List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Eiaproject</th>
      <th>Impact level</th>
      <th>Comments</th>
      <th>Token</th>
      <th>Created at</th>
      <th>Updated at</th>
      <th>Created by</th>
      <th>Updated by</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($project_impacts as $project_impact): ?>
    <tr>
      <td><a href="<?php echo url_for('eiaProjectImpact/edit?id='.$project_impact->getId()) ?>"><?php echo $project_impact->getId() ?></a></td>
      <td><?php echo $project_impact->getEiaprojectId() ?></td>
      <td><?php echo $project_impact->getImpactLevel() ?></td>
      <td><?php echo $project_impact->getComments() ?></td>
      <td><?php echo $project_impact->getToken() ?></td>
      <td><?php echo $project_impact->getCreatedAt() ?></td>
      <td><?php echo $project_impact->getUpdatedAt() ?></td>
      <td><?php echo $project_impact->getCreatedBy() ?></td>
      <td><?php echo $project_impact->getUpdatedBy() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('eiaProjectImpact/new') ?>">New</a>

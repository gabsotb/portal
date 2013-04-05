<h1>Eia project brief decisions List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Eiaproject</th>
      <th>Decision</th>
      <th>Comments</th>
      <th>Processed by</th>
      <th>Token</th>
      <th>Created at</th>
      <th>Updated at</th>
      <th>Created by</th>
      <th>Updated by</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($eia_project_brief_decisions as $eia_project_brief_decision): ?>
    <tr>
      <td><a href="<?php echo url_for('eiaProjectBreifDecision/edit?id='.$eia_project_brief_decision->getId()) ?>"><?php echo $eia_project_brief_decision->getId() ?></a></td>
      <td><?php echo $eia_project_brief_decision->getEiaprojectId() ?></td>
      <td><?php echo $eia_project_brief_decision->getDecision() ?></td>
      <td><?php echo $eia_project_brief_decision->getComments() ?></td>
      <td><?php echo $eia_project_brief_decision->getProcessedBy() ?></td>
      <td><?php echo $eia_project_brief_decision->getToken() ?></td>
      <td><?php echo $eia_project_brief_decision->getCreatedAt() ?></td>
      <td><?php echo $eia_project_brief_decision->getUpdatedAt() ?></td>
      <td><?php echo $eia_project_brief_decision->getCreatedBy() ?></td>
      <td><?php echo $eia_project_brief_decision->getUpdatedBy() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('eiaProjectBreifDecision/new') ?>">New</a>

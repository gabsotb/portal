<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $project_impact->getId() ?></td>
    </tr>
    <tr>
      <th>Company:</th>
      <td><?php echo $project_impact->getCompanyId() ?></td>
    </tr>
    <tr>
      <th>Impact level:</th>
      <td><?php echo $project_impact->getImpactLevel() ?></td>
    </tr>
    <tr>
      <th>Comments:</th>
      <td><?php echo $project_impact->getComments() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $project_impact->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $project_impact->getUpdatedAt() ?></td>
    </tr>
    <tr>
      <th>Created by:</th>
      <td><?php echo $project_impact->getCreatedBy() ?></td>
    </tr>
    <tr>
      <th>Updated by:</th>
      <td><?php echo $project_impact->getUpdatedBy() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('projectImpact/edit?id='.$project_impact->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('projectImpact/index') ?>">List</a>

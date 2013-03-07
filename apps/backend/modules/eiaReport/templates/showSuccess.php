<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $eia_reports->getId() ?></td>
    </tr>
    <tr>
      <th>Module:</th>
      <td><?php echo $eia_reports->getModule() ?></td>
    </tr>
    <tr>
      <th>Module:</th>
      <td><?php echo $eia_reports->getModuleId() ?></td>
    </tr>
    <tr>
      <th>Recommendations:</th>
      <td><?php echo $eia_reports->getRecommendations() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $eia_reports->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $eia_reports->getUpdatedAt() ?></td>
    </tr>
    <tr>
      <th>Created by:</th>
      <td><?php echo $eia_reports->getCreatedBy() ?></td>
    </tr>
    <tr>
      <th>Updated by:</th>
      <td><?php echo $eia_reports->getUpdatedBy() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('eiaReport/edit?id='.$eia_reports->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('eiaReport/index') ?>">List</a>

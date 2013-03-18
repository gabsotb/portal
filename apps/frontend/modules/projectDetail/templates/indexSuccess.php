<h1>Eia project details List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Project reference number</th>
      <th>Project title</th>
      <th>Project plot number</th>
      <th>Village</th>
      <th>Cell</th>
      <th>Sector</th>
      <th>District</th>
      <th>Province</th>
      <th>Token</th>
      <th>Created at</th>
      <th>Updated at</th>
      <th>Created by</th>
      <th>Updated by</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($eia_project_details as $eia_project_detail): ?>
    <tr>
      <td><a href="<?php echo url_for('projectDetail/show?id='.$eia_project_detail->getId()) ?>"><?php echo $eia_project_detail->getId() ?></a></td>
      <td><?php echo $eia_project_detail->getProjectReferenceNumber() ?></td>
      <td><?php echo $eia_project_detail->getProjectTitle() ?></td>
      <td><?php echo $eia_project_detail->getProjectPlotNumber() ?></td>
      <td><?php echo $eia_project_detail->getVillage() ?></td>
      <td><?php echo $eia_project_detail->getCell() ?></td>
      <td><?php echo $eia_project_detail->getSector() ?></td>
      <td><?php echo $eia_project_detail->getDistrict() ?></td>
      <td><?php echo $eia_project_detail->getProvince() ?></td>
      <td><?php echo $eia_project_detail->getToken() ?></td>
      <td><?php echo $eia_project_detail->getCreatedAt() ?></td>
      <td><?php echo $eia_project_detail->getUpdatedAt() ?></td>
      <td><?php echo $eia_project_detail->getCreatedBy() ?></td>
      <td><?php echo $eia_project_detail->getUpdatedBy() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('projectDetail/new') ?>">New</a>

<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $eia_project_detail->getId() ?></td>
    </tr>
    <tr>
      <th>Project reference number:</th>
      <td><?php echo $eia_project_detail->getProjectReferenceNumber() ?></td>
    </tr>
    <tr>
      <th>Project title:</th>
      <td><?php echo $eia_project_detail->getProjectTitle() ?></td>
    </tr>
    <tr>
      <th>Project plot number:</th>
      <td><?php echo $eia_project_detail->getProjectPlotNumber() ?></td>
    </tr>
    <tr>
      <th>Village:</th>
      <td><?php echo $eia_project_detail->getVillage() ?></td>
    </tr>
    <tr>
      <th>Cell:</th>
      <td><?php echo $eia_project_detail->getCell() ?></td>
    </tr>
    <tr>
      <th>Sector:</th>
      <td><?php echo $eia_project_detail->getSector() ?></td>
    </tr>
    <tr>
      <th>District:</th>
      <td><?php echo $eia_project_detail->getDistrict() ?></td>
    </tr>
    <tr>
      <th>Province:</th>
      <td><?php echo $eia_project_detail->getProvince() ?></td>
    </tr>
    <tr>
      <th>Token:</th>
      <td><?php echo $eia_project_detail->getToken() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $eia_project_detail->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $eia_project_detail->getUpdatedAt() ?></td>
    </tr>
    <tr>
      <th>Created by:</th>
      <td><?php echo $eia_project_detail->getCreatedBy() ?></td>
    </tr>
    <tr>
      <th>Updated by:</th>
      <td><?php echo $eia_project_detail->getUpdatedBy() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('projectDetail/edit?id='.$eia_project_detail->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('projectDetail/index') ?>">List</a>

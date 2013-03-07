<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $ei_report->getId() ?></td>
    </tr>
    <tr>
      <th>Company:</th>
      <td><?php echo $ei_report->getCompanyId() ?></td>
    </tr>
    <tr>
      <th>Ei doc:</th>
      <td><?php echo $ei_report->getEiDoc() ?></td>
    </tr>
    <tr>
      <th>Emp doc:</th>
      <td><?php echo $ei_report->getEmpDoc() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $ei_report->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $ei_report->getUpdatedAt() ?></td>
    </tr>
    <tr>
      <th>Created by:</th>
      <td><?php echo $ei_report->getCreatedBy() ?></td>
    </tr>
    <tr>
      <th>Updated by:</th>
      <td><?php echo $ei_report->getUpdatedBy() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('eiReport/edit?id='.$ei_report->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('eiReport/index') ?>">List</a>

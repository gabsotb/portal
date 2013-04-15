<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $ei_report_resubmission->getId() ?></td>
    </tr>
    <tr>
      <th>Eiaproject:</th>
      <td><?php echo $ei_report_resubmission->getEiaprojectId() ?></td>
    </tr>
    <tr>
      <th>Status:</th>
      <td><?php echo $ei_report_resubmission->getStatus() ?></td>
    </tr>
    <tr>
      <th>Comments:</th>
      <td><?php echo $ei_report_resubmission->getComments() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $ei_report_resubmission->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $ei_report_resubmission->getUpdatedAt() ?></td>
    </tr>
    <tr>
      <th>Created by:</th>
      <td><?php echo $ei_report_resubmission->getCreatedBy() ?></td>
    </tr>
    <tr>
      <th>Updated by:</th>
      <td><?php echo $ei_report_resubmission->getUpdatedBy() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('eireportresubmit/edit?id='.$ei_report_resubmission->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('eireportresubmit/index') ?>">List</a>

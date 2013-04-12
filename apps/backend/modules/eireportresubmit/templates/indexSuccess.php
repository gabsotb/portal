<h1>Ei report resubmissions List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Eiaproject</th>
      <th>Status</th>
      <th>Comments</th>
      <th>Created at</th>
      <th>Updated at</th>
      <th>Created by</th>
      <th>Updated by</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($ei_report_resubmissions as $ei_report_resubmission): ?>
    <tr>
      <td><a href="<?php echo url_for('eireportresubmit/show?id='.$ei_report_resubmission->getId()) ?>"><?php echo $ei_report_resubmission->getId() ?></a></td>
      <td><?php echo $ei_report_resubmission->getEiaprojectId() ?></td>
      <td><?php echo $ei_report_resubmission->getStatus() ?></td>
      <td><?php echo $ei_report_resubmission->getComments() ?></td>
      <td><?php echo $ei_report_resubmission->getCreatedAt() ?></td>
      <td><?php echo $ei_report_resubmission->getUpdatedAt() ?></td>
      <td><?php echo $ei_report_resubmission->getCreatedBy() ?></td>
      <td><?php echo $ei_report_resubmission->getUpdatedBy() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('eireportresubmit/new') ?>">New</a>

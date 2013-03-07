<h1>Ei reports List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Company</th>
      <th>Ei doc</th>
      <th>Emp doc</th>
      <th>Created at</th>
      <th>Updated at</th>
      <th>Created by</th>
      <th>Updated by</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($ei_reports as $ei_report): ?>
    <tr>
      <td><a href="<?php echo url_for('eiReport/show?id='.$ei_report->getId()) ?>"><?php echo $ei_report->getId() ?></a></td>
      <td><?php echo $ei_report->getCompanyId() ?></td>
      <td><?php echo $ei_report->getEiDoc() ?></td>
      <td><?php echo $ei_report->getEmpDoc() ?></td>
      <td><?php echo $ei_report->getCreatedAt() ?></td>
      <td><?php echo $ei_report->getUpdatedAt() ?></td>
      <td><?php echo $ei_report->getCreatedBy() ?></td>
      <td><?php echo $ei_report->getUpdatedBy() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('eiReport/new') ?>">New</a>

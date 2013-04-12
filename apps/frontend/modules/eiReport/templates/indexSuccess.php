<h1>Ei reports List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Eiaproject</th>
      <th>Word doc</th>
      <th>Pdf doc</th>
      <th>Token</th>
      <th>Created at</th>
      <th>Updated at</th>
      <th>Created by</th>
      <th>Updated by</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($ei_reports as $ei_report): ?>
    <tr>
      <td><a href="<?php echo url_for('eireport/show?id='.$ei_report->getId()) ?>"><?php echo $ei_report->getId() ?></a></td>
      <td><?php echo $ei_report->getEiaprojectId() ?></td>
      <td><?php echo $ei_report->getWordDoc() ?></td>
      <td><?php echo $ei_report->getPdfDoc() ?></td>
      <td><?php echo $ei_report->getToken() ?></td>
      <td><?php echo $ei_report->getCreatedAt() ?></td>
      <td><?php echo $ei_report->getUpdatedAt() ?></td>
      <td><?php echo $ei_report->getCreatedBy() ?></td>
      <td><?php echo $ei_report->getUpdatedBy() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('eireport/new') ?>">New</a>

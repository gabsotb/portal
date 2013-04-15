<h1>Eia site visit reports List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Eiasitevisit</th>
      <th>Report</th>
      <th>Token</th>
      <th>Created at</th>
      <th>Updated at</th>
      <th>Created by</th>
      <th>Updated by</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($eia_site_visit_reports as $eia_site_visit_report): ?>
    <tr>
      <td><a href="<?php echo url_for('eiaSiteVisitReport/show?id='.$eia_site_visit_report->getId()) ?>"><?php echo $eia_site_visit_report->getId() ?></a></td>
      <td><?php echo $eia_site_visit_report->getEiasitevisitId() ?></td>
      <td><?php echo $eia_site_visit_report->getReport() ?></td>
      <td><?php echo $eia_site_visit_report->getToken() ?></td>
      <td><?php echo $eia_site_visit_report->getCreatedAt() ?></td>
      <td><?php echo $eia_site_visit_report->getUpdatedAt() ?></td>
      <td><?php echo $eia_site_visit_report->getCreatedBy() ?></td>
      <td><?php echo $eia_site_visit_report->getUpdatedBy() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('eiaSiteVisitReport/new') ?>">New</a>

<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $eia_site_visit_report->getId() ?></td>
    </tr>
    <tr>
      <th>Eiasitevisit:</th>
      <td><?php echo $eia_site_visit_report->getEiasitevisitId() ?></td>
    </tr>
    <tr>
      <th>Report:</th>
      <td><?php echo $eia_site_visit_report->getReport() ?></td>
    </tr>
    <tr>
      <th>Token:</th>
      <td><?php echo $eia_site_visit_report->getToken() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $eia_site_visit_report->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $eia_site_visit_report->getUpdatedAt() ?></td>
    </tr>
    <tr>
      <th>Created by:</th>
      <td><?php echo $eia_site_visit_report->getCreatedBy() ?></td>
    </tr>
    <tr>
      <th>Updated by:</th>
      <td><?php echo $eia_site_visit_report->getUpdatedBy() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('eiaSiteVisitReport/edit?id='.$eia_site_visit_report->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('eiaSiteVisitReport/index') ?>">List</a>

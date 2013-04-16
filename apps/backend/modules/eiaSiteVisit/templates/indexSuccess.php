<h1>Eia site visits List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Eiaproject</th>
      <th>Site visit</th>
      <th>Remarks</th>
      <th>Token</th>
      <th>Created at</th>
      <th>Updated at</th>
      <th>Created by</th>
      <th>Updated by</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($eia_site_visits as $eia_site_visit): ?>
    <tr>
      <td><a href="<?php echo url_for('eiaSiteVisit/edit?id='.$eia_site_visit->getId()) ?>"><?php echo $eia_site_visit->getId() ?></a></td>
      <td><?php echo $eia_site_visit->getEiaprojectId() ?></td>
      <td><?php echo $eia_site_visit->getSiteVisit() ?></td>
      <td><?php echo $eia_site_visit->getRemarks() ?></td>
      <td><?php echo $eia_site_visit->getToken() ?></td>
      <td><?php echo $eia_site_visit->getCreatedAt() ?></td>
      <td><?php echo $eia_site_visit->getUpdatedAt() ?></td>
      <td><?php echo $eia_site_visit->getCreatedBy() ?></td>
      <td><?php echo $eia_site_visit->getUpdatedBy() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('eiaSiteVisit/new') ?>">New</a>

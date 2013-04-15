<h1>Eia certificates List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Serial number</th>
      <th>Eireport</th>
      <th>Token</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($eia_certificates as $eia_certificate): ?>
    <tr>
      <td><a href="<?php echo url_for('eiacertificates/show?id='.$eia_certificate->getId()) ?>"><?php echo $eia_certificate->getId() ?></a></td>
      <td><?php echo $eia_certificate->getSerialNumber() ?></td>
      <td><?php echo $eia_certificate->getEireportId() ?></td>
      <td><?php echo $eia_certificate->getToken() ?></td>
      <td><?php echo $eia_certificate->getCreatedAt() ?></td>
      <td><?php echo $eia_certificate->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('eiacertificates/new') ?>">New</a>

<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $eia_certificate->getId() ?></td>
    </tr>
    <tr>
      <th>Serial number:</th>
      <td><?php echo $eia_certificate->getSerialNumber() ?></td>
    </tr>
    <tr>
      <th>Eireport:</th>
      <td><?php echo $eia_certificate->getEireportId() ?></td>
    </tr>
    <tr>
      <th>Token:</th>
      <td><?php echo $eia_certificate->getToken() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $eia_certificate->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $eia_certificate->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('eiacertificates/edit?id='.$eia_certificate->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('eiacertificates/index') ?>">List</a>

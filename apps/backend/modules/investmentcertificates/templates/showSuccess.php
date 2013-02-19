<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $investment_certificate->getId() ?></td>
    </tr>
    <tr>
      <th>Serial number:</th>
      <td><?php echo $investment_certificate->getSerialNumber() ?></td>
    </tr>
    <tr>
      <th>Business:</th>
      <td><?php echo $investment_certificate->getBusinessId() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $investment_certificate->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $investment_certificate->getUpdatedAt() ?></td>
    </tr>
    <tr>
      <th>Created by:</th>
      <td><?php echo $investment_certificate->getCreatedBy() ?></td>
    </tr>
    <tr>
      <th>Updated by:</th>
      <td><?php echo $investment_certificate->getUpdatedBy() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('investmentcertificates/edit?id='.$investment_certificate->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('investmentcertificates/index') ?>">List</a>

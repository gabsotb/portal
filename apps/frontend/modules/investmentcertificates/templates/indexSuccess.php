<h1>Investment certificates List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Serial number</th>
      <th>Business</th>
      <th>Created at</th>
      <th>Updated at</th>
      <th>Created by</th>
      <th>Updated by</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($investment_certificates as $investment_certificate): ?>
    <tr>
      <td><a href="<?php echo url_for('investmentcertificates/show?id='.$investment_certificate->getId()) ?>"><?php echo $investment_certificate->getId() ?></a></td>
      <td><?php echo $investment_certificate->getSerialNumber() ?></td>
      <td><?php echo $investment_certificate->getBusinessId() ?></td>
      <td><?php echo $investment_certificate->getCreatedAt() ?></td>
      <td><?php echo $investment_certificate->getUpdatedAt() ?></td>
      <td><?php echo $investment_certificate->getCreatedBy() ?></td>
      <td><?php echo $investment_certificate->getUpdatedBy() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('investmentcertificates/new') ?>">New</a>

<h1>Investment applications List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Company name</th>
      <th>Registration number</th>
      <th>Company address</th>
      <th>Job created</th>
      <th>Job category</th>
      <th>Company legal nature</th>
      <th>Company representative</th>
      <th>Application letter</th>
      <th>Incorporation certificate</th>
      <th>Shareholding list</th>
      <th>Company logo</th>
      <th>Username</th>
      <th>Created at</th>
      <th>Updated at</th>
      <th>Created by</th>
      <th>Updated by</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($investment_applications as $investment_application): ?>
    <tr>
      <td><a href="<?php echo url_for('appTest/show?id='.$investment_application->getId()) ?>"><?php echo $investment_application->getId() ?></a></td>
      <td><?php echo $investment_application->getCompanyName() ?></td>
      <td><?php echo $investment_application->getRegistrationNumber() ?></td>
      <td><?php echo $investment_application->getCompanyAddress() ?></td>
      <td><?php echo $investment_application->getJobCreated() ?></td>
      <td><?php echo $investment_application->getJobCategory() ?></td>
      <td><?php echo $investment_application->getCompanyLegalNature() ?></td>
      <td><?php echo $investment_application->getCompanyRepresentative() ?></td>
      <td><?php echo $investment_application->getApplicationLetter() ?></td>
      <td><?php echo $investment_application->getIncorporationCertificate() ?></td>
      <td><?php echo $investment_application->getShareholdingList() ?></td>
      <td><?php echo $investment_application->getCompanyLogo() ?></td>
      <td><?php echo $investment_application->getUsernameId() ?></td>
      <td><?php echo $investment_application->getCreatedAt() ?></td>
      <td><?php echo $investment_application->getUpdatedAt() ?></td>
      <td><?php echo $investment_application->getCreatedBy() ?></td>
      <td><?php echo $investment_application->getUpdatedBy() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('appTest/new') ?>">New</a>

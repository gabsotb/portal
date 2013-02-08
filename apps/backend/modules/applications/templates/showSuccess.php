<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $investment_application->getId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $investment_application->getName() ?></td>
    </tr>
    <tr>
      <th>Registration number:</th>
      <td><?php echo $investment_application->getRegistrationNumber() ?></td>
    </tr>
    <tr>
      <th>Company address:</th>
      <td><?php echo $investment_application->getCompanyAddress() ?></td>
    </tr>
    <tr>
      <th>Job created:</th>
      <td><?php echo $investment_application->getJobCreated() ?></td>
    </tr>
    <tr>
      <th>Job category:</th>
      <td><?php echo $investment_application->getJobCategory() ?></td>
    </tr>
    <tr>
      <th>Company legal nature:</th>
      <td><?php echo $investment_application->getCompanyLegalNature() ?></td>
    </tr>
    <tr>
      <th>Company representative:</th>
      <td><?php echo $investment_application->getCompanyRepresentative() ?></td>
    </tr>
    <tr>
      <th>Application letter:</th>
      <td><?php echo $investment_application->getApplicationLetter() ?></td>
    </tr>
    <tr>
      <th>Incorporation certificate:</th>
      <td><?php echo $investment_application->getIncorporationCertificate() ?></td>
    </tr>
    <tr>
      <th>Shareholding list:</th>
      <td><?php echo $investment_application->getShareholdingList() ?></td>
    </tr>
    <tr>
      <th>Company logo:</th>
      <td><?php echo $investment_application->getCompanyLogo() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $investment_application->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $investment_application->getUpdatedAt() ?></td>
    </tr>
    <tr>
      <th>Created by:</th>
      <td><?php echo $investment_application->getCreatedBy() ?></td>
    </tr>
    <tr>
      <th>Updated by:</th>
      <td><?php echo $investment_application->getUpdatedBy() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('applications/edit?id='.$investment_application->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('applications/index') ?>">List</a>

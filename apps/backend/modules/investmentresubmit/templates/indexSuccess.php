<h1>Investment resubmissions List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Business</th>
      <th>Message subject</th>
      <th>Message</th>
      <th>Created at</th>
      <th>Updated at</th>
      <th>Created by</th>
      <th>Updated by</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($investment_resubmissions as $investment_resubmission): ?>
    <tr>
      <td><a href="<?php echo url_for('investmentresubmit/show?id='.$investment_resubmission->getId()) ?>"><?php echo $investment_resubmission->getId() ?></a></td>
      <td><?php echo $investment_resubmission->getBusinessId() ?></td>
      <td><?php echo $investment_resubmission->getMessageSubject() ?></td>
      <td><?php echo $investment_resubmission->getMessage() ?></td>
      <td><?php echo $investment_resubmission->getCreatedAt() ?></td>
      <td><?php echo $investment_resubmission->getUpdatedAt() ?></td>
      <td><?php echo $investment_resubmission->getCreatedBy() ?></td>
      <td><?php echo $investment_resubmission->getUpdatedBy() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('investmentresubmit/new') ?>">New</a>

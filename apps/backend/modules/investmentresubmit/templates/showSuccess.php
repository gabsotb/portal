<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $investment_resubmission->getId() ?></td>
    </tr>
    <tr>
      <th>Business:</th>
      <td><?php echo $investment_resubmission->getBusinessId() ?></td>
    </tr>
    <tr>
      <th>Message subject:</th>
      <td><?php echo $investment_resubmission->getMessageSubject() ?></td>
    </tr>
    <tr>
      <th>Message:</th>
      <td><?php echo $investment_resubmission->getMessage() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $investment_resubmission->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $investment_resubmission->getUpdatedAt() ?></td>
    </tr>
    <tr>
      <th>Created by:</th>
      <td><?php echo $investment_resubmission->getCreatedBy() ?></td>
    </tr>
    <tr>
      <th>Updated by:</th>
      <td><?php echo $investment_resubmission->getUpdatedBy() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('investmentresubmit/edit?id='.$investment_resubmission->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('investmentresubmit/index') ?>">List</a>

<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $investment_requests->getId() ?></td>
    </tr>
    <tr>
      <th>Requestor:</th>
      <td><?php echo $investment_requests->getRequestor() ?></td>
    </tr>
    <tr>
      <th>Request type:</th>
      <td><?php echo $investment_requests->getRequestType() ?></td>
    </tr>
    <tr>
      <th>Status:</th>
      <td><?php echo $investment_requests->getStatus() ?></td>
    </tr>
    <tr>
      <th>Business name:</th>
      <td><?php echo $investment_requests->getBusinessName() ?></td>
    </tr>
    <tr>
      <th>Comments:</th>
      <td><?php echo $investment_requests->getComments() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $investment_requests->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $investment_requests->getUpdatedAt() ?></td>
    </tr>
    <tr>
      <th>Created by:</th>
      <td><?php echo $investment_requests->getCreatedBy() ?></td>
    </tr>
    <tr>
      <th>Updated by:</th>
      <td><?php echo $investment_requests->getUpdatedBy() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('investmentrequest/edit?id='.$investment_requests->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('investmentrequest/index') ?>">List</a>

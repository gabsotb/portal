<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $rejected_applications->getId() ?></td>
    </tr>
    <tr>
      <th>Business:</th>
      <td><?php echo $rejected_applications->getBusinessId() ?></td>
    </tr>
    <tr>
      <th>Application type:</th>
      <td><?php echo $rejected_applications->getApplicationType() ?></td>
    </tr>
    <tr>
      <th>Reason:</th>
      <td><?php echo $rejected_applications->getReason() ?></td>
    </tr>
    <tr>
      <th>Comment:</th>
      <td><?php echo $rejected_applications->getComment() ?></td>
    </tr>
    <tr>
      <th>Token:</th>
      <td><?php echo $rejected_applications->getToken() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $rejected_applications->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $rejected_applications->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('investmentrejected/edit?id='.$rejected_applications->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('investmentrejected/index') ?>">List</a>

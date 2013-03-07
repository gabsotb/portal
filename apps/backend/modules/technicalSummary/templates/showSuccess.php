<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $technical_summary->getId() ?></td>
    </tr>
    <tr>
      <th>Tor:</th>
      <td><?php echo $technical_summary->getTorId() ?></td>
    </tr>
    <tr>
      <th>Report:</th>
      <td><?php echo $technical_summary->getReport() ?></td>
    </tr>
    <tr>
      <th>Comment:</th>
      <td><?php echo $technical_summary->getComment() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $technical_summary->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $technical_summary->getUpdatedAt() ?></td>
    </tr>
    <tr>
      <th>Created by:</th>
      <td><?php echo $technical_summary->getCreatedBy() ?></td>
    </tr>
    <tr>
      <th>Updated by:</th>
      <td><?php echo $technical_summary->getUpdatedBy() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('technicalSummary/edit?id='.$technical_summary->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('technicalSummary/index') ?>">List</a>

<h1>Technical summarys List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Tor</th>
      <th>Report</th>
      <th>Comment</th>
      <th>Created at</th>
      <th>Updated at</th>
      <th>Created by</th>
      <th>Updated by</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($technical_summarys as $technical_summary): ?>
    <tr>
      <td><a href="<?php echo url_for('technicalSummary/show?id='.$technical_summary->getId()) ?>"><?php echo $technical_summary->getId() ?></a></td>
      <td><?php echo $technical_summary->getTorId() ?></td>
      <td><?php echo $technical_summary->getReport() ?></td>
      <td><?php echo $technical_summary->getComment() ?></td>
      <td><?php echo $technical_summary->getCreatedAt() ?></td>
      <td><?php echo $technical_summary->getUpdatedAt() ?></td>
      <td><?php echo $technical_summary->getCreatedBy() ?></td>
      <td><?php echo $technical_summary->getUpdatedBy() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('technicalSummary/new') ?>">New</a>

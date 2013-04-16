<h1>Tor submits List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Eiaproject</th>
      <th>Attachement</th>
      <th>Remarks</th>
      <th>Token</th>
      <th>Created at</th>
      <th>Updated at</th>
      <th>Created by</th>
      <th>Updated by</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tor_submits as $tor_submit): ?>
    <tr>
      <td><a href="<?php echo url_for('eiaTor/edit?id='.$tor_submit->getId()) ?>"><?php echo $tor_submit->getId() ?></a></td>
      <td><?php echo $tor_submit->getEiaprojectId() ?></td>
      <td><?php echo $tor_submit->getAttachement() ?></td>
      <td><?php echo $tor_submit->getRemarks() ?></td>
      <td><?php echo $tor_submit->getToken() ?></td>
      <td><?php echo $tor_submit->getCreatedAt() ?></td>
      <td><?php echo $tor_submit->getUpdatedAt() ?></td>
      <td><?php echo $tor_submit->getCreatedBy() ?></td>
      <td><?php echo $tor_submit->getUpdatedBy() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('eiaTor/new') ?>">New</a>

<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $public_hearing->getId() ?></td>
    </tr>
    <tr>
      <th>Company:</th>
      <td><?php echo $public_hearing->getCompanyId() ?></td>
    </tr>
    <tr>
      <th>Report:</th>
      <td><?php echo $public_hearing->getReport() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $public_hearing->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $public_hearing->getUpdatedAt() ?></td>
    </tr>
    <tr>
      <th>Created by:</th>
      <td><?php echo $public_hearing->getCreatedBy() ?></td>
    </tr>
    <tr>
      <th>Updated by:</th>
      <td><?php echo $public_hearing->getUpdatedBy() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('publicHearing/edit?id='.$public_hearing->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('publicHearing/index') ?>">List</a>

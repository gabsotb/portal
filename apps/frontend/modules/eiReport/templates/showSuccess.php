<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $ei_report->getId() ?></td>
    </tr>
    <tr>
      <th>Eiaproject:</th>
      <td><?php echo $ei_report->getEiaprojectId() ?></td>
    </tr>
    <tr>
      <th>Word doc:</th>
      <td><?php echo $ei_report->getWordDoc() ?></td>
    </tr>
    <tr>
      <th>Pdf doc:</th>
      <td><?php echo $ei_report->getPdfDoc() ?></td>
    </tr>
    <tr>
      <th>Token:</th>
      <td><?php echo $ei_report->getToken() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $ei_report->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $ei_report->getUpdatedAt() ?></td>
    </tr>
    <tr>
      <th>Created by:</th>
      <td><?php echo $ei_report->getCreatedBy() ?></td>
    </tr>
    <tr>
      <th>Updated by:</th>
      <td><?php echo $ei_report->getUpdatedBy() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('eireport/edit?id='.$ei_report->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('eireport/index') ?>">List</a>

<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $eia_project_attachment->getId() ?></td>
    </tr>
    <tr>
      <th>Eiaproject:</th>
      <td><?php echo $eia_project_attachment->getEiaprojectId() ?></td>
    </tr>
    <tr>
      <th>Panoramic view:</th>
      <td><?php echo $eia_project_attachment->getPanoramicView() ?></td>
    </tr>
    <tr>
      <th>Perspective site impact:</th>
      <td><?php echo $eia_project_attachment->getPerspectiveSiteImpact() ?></td>
    </tr>
    <tr>
      <th>Preliminary approval:</th>
      <td><?php echo $eia_project_attachment->getPreliminaryApproval() ?></td>
    </tr>
    <tr>
      <th>Land ownership doc:</th>
      <td><?php echo $eia_project_attachment->getLandOwnershipDoc() ?></td>
    </tr>
    <tr>
      <th>Ministrial document:</th>
      <td><?php echo $eia_project_attachment->getMinistrialDocument() ?></td>
    </tr>
    <tr>
      <th>Perimeter area map:</th>
      <td><?php echo $eia_project_attachment->getPerimeterAreaMap() ?></td>
    </tr>
    <tr>
      <th>Other supporting document:</th>
      <td><?php echo $eia_project_attachment->getOtherSupportingDocument() ?></td>
    </tr>
    <tr>
      <th>Token:</th>
      <td><?php echo $eia_project_attachment->getToken() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $eia_project_attachment->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $eia_project_attachment->getUpdatedAt() ?></td>
    </tr>
    <tr>
      <th>Created by:</th>
      <td><?php echo $eia_project_attachment->getCreatedBy() ?></td>
    </tr>
    <tr>
      <th>Updated by:</th>
      <td><?php echo $eia_project_attachment->getUpdatedBy() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('projectAttachment/edit?id='.$eia_project_attachment->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('projectAttachment/index') ?>">List</a>

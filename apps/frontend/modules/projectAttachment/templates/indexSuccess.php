<h1>Eia project attachments List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Eiaproject</th>
      <th>Panoramic view</th>
      <th>Perspective site impact</th>
      <th>Preliminary approval</th>
      <th>Land ownership doc</th>
      <th>Ministrial document</th>
      <th>Perimeter area map</th>
      <th>Other supporting document</th>
      <th>Token</th>
      <th>Created at</th>
      <th>Updated at</th>
      <th>Created by</th>
      <th>Updated by</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($eia_project_attachments as $eia_project_attachment): ?>
    <tr>
      <td><a href="<?php echo url_for('projectAttachment/show?id='.$eia_project_attachment->getId()) ?>"><?php echo $eia_project_attachment->getId() ?></a></td>
      <td><?php echo $eia_project_attachment->getEiaprojectId() ?></td>
      <td><?php echo $eia_project_attachment->getPanoramicView() ?></td>
      <td><?php echo $eia_project_attachment->getPerspectiveSiteImpact() ?></td>
      <td><?php echo $eia_project_attachment->getPreliminaryApproval() ?></td>
      <td><?php echo $eia_project_attachment->getLandOwnershipDoc() ?></td>
      <td><?php echo $eia_project_attachment->getMinistrialDocument() ?></td>
      <td><?php echo $eia_project_attachment->getPerimeterAreaMap() ?></td>
      <td><?php echo $eia_project_attachment->getOtherSupportingDocument() ?></td>
      <td><?php echo $eia_project_attachment->getToken() ?></td>
      <td><?php echo $eia_project_attachment->getCreatedAt() ?></td>
      <td><?php echo $eia_project_attachment->getUpdatedAt() ?></td>
      <td><?php echo $eia_project_attachment->getCreatedBy() ?></td>
      <td><?php echo $eia_project_attachment->getUpdatedBy() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('projectAttachment/new') ?>">New</a>

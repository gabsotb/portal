<h1>Eia assessment decisions List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Task assignment</th>
      <th>Verdict</th>
      <th>Remarks</th>
      <th>Token</th>
      <th>Created at</th>
      <th>Updated at</th>
      <th>Created by</th>
      <th>Updated by</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($eia_assessment_decisions as $eia_assessment_decision): ?>
    <tr>
      <td><a href="<?php echo url_for('eiaAssessmentDecision/edit?id='.$eia_assessment_decision->getId()) ?>"><?php echo $eia_assessment_decision->getId() ?></a></td>
      <td><?php echo $eia_assessment_decision->getTaskAssignmentId() ?></td>
      <td><?php echo $eia_assessment_decision->getVerdict() ?></td>
      <td><?php echo $eia_assessment_decision->getRemarks() ?></td>
      <td><?php echo $eia_assessment_decision->getToken() ?></td>
      <td><?php echo $eia_assessment_decision->getCreatedAt() ?></td>
      <td><?php echo $eia_assessment_decision->getUpdatedAt() ?></td>
      <td><?php echo $eia_assessment_decision->getCreatedBy() ?></td>
      <td><?php echo $eia_assessment_decision->getUpdatedBy() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('eiaAssessmentDecision/new') ?>">New</a>

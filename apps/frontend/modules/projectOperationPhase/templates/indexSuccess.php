<h1>Eia project operation phases List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Eiaproject</th>
      <th>Domestic influence</th>
      <th>Domestic wastewater treatment</th>
      <th>Domestic influence remarks</th>
      <th>Solid wastes</th>
      <th>Solid wastes segregation</th>
      <th>Solid wastes proper collection</th>
      <th>Solid wastes proper housekeeping</th>
      <th>Solid wastes remarks</th>
      <th>Increased traffic</th>
      <th>Increased traffic rules adhere</th>
      <th>Increased traffic signables</th>
      <th>Increased traffice remarks</th>
      <th>Fire risk</th>
      <th>Fire risk extinguishers</th>
      <th>Fire risk exit stairs</th>
      <th>Fire risk remarks</th>
      <th>Token</th>
      <th>Created at</th>
      <th>Updated at</th>
      <th>Created by</th>
      <th>Updated by</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($eia_project_operation_phases as $eia_project_operation_phase): ?>
    <tr>
      <td><a href="<?php echo url_for('projectOperationPhase/show?id='.$eia_project_operation_phase->getId()) ?>"><?php echo $eia_project_operation_phase->getId() ?></a></td>
      <td><?php echo $eia_project_operation_phase->getEiaprojectId() ?></td>
      <td><?php echo $eia_project_operation_phase->getDomesticInfluence() ?></td>
      <td><?php echo $eia_project_operation_phase->getDomesticWastewaterTreatment() ?></td>
      <td><?php echo $eia_project_operation_phase->getDomesticInfluenceRemarks() ?></td>
      <td><?php echo $eia_project_operation_phase->getSolidWastes() ?></td>
      <td><?php echo $eia_project_operation_phase->getSolidWastesSegregation() ?></td>
      <td><?php echo $eia_project_operation_phase->getSolidWastesProperCollection() ?></td>
      <td><?php echo $eia_project_operation_phase->getSolidWastesProperHousekeeping() ?></td>
      <td><?php echo $eia_project_operation_phase->getSolidWastesRemarks() ?></td>
      <td><?php echo $eia_project_operation_phase->getIncreasedTraffic() ?></td>
      <td><?php echo $eia_project_operation_phase->getIncreasedTrafficRulesAdhere() ?></td>
      <td><?php echo $eia_project_operation_phase->getIncreasedTrafficSignables() ?></td>
      <td><?php echo $eia_project_operation_phase->getIncreasedTrafficeRemarks() ?></td>
      <td><?php echo $eia_project_operation_phase->getFireRisk() ?></td>
      <td><?php echo $eia_project_operation_phase->getFireRiskExtinguishers() ?></td>
      <td><?php echo $eia_project_operation_phase->getFireRiskExitStairs() ?></td>
      <td><?php echo $eia_project_operation_phase->getFireRiskRemarks() ?></td>
      <td><?php echo $eia_project_operation_phase->getToken() ?></td>
      <td><?php echo $eia_project_operation_phase->getCreatedAt() ?></td>
      <td><?php echo $eia_project_operation_phase->getUpdatedAt() ?></td>
      <td><?php echo $eia_project_operation_phase->getCreatedBy() ?></td>
      <td><?php echo $eia_project_operation_phase->getUpdatedBy() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('projectOperationPhase/new') ?>">New</a>

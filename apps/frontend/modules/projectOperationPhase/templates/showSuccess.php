<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $eia_project_operation_phase->getId() ?></td>
    </tr>
    <tr>
      <th>Eiaproject:</th>
      <td><?php echo $eia_project_operation_phase->getEiaprojectId() ?></td>
    </tr>
    <tr>
      <th>Domestic influence:</th>
      <td><?php echo $eia_project_operation_phase->getDomesticInfluence() ?></td>
    </tr>
    <tr>
      <th>Domestic wastewater treatment:</th>
      <td><?php echo $eia_project_operation_phase->getDomesticWastewaterTreatment() ?></td>
    </tr>
    <tr>
      <th>Domestic influence remarks:</th>
      <td><?php echo $eia_project_operation_phase->getDomesticInfluenceRemarks() ?></td>
    </tr>
    <tr>
      <th>Solid wastes:</th>
      <td><?php echo $eia_project_operation_phase->getSolidWastes() ?></td>
    </tr>
    <tr>
      <th>Solid wastes segregation:</th>
      <td><?php echo $eia_project_operation_phase->getSolidWastesSegregation() ?></td>
    </tr>
    <tr>
      <th>Solid wastes proper collection:</th>
      <td><?php echo $eia_project_operation_phase->getSolidWastesProperCollection() ?></td>
    </tr>
    <tr>
      <th>Solid wastes proper housekeeping:</th>
      <td><?php echo $eia_project_operation_phase->getSolidWastesProperHousekeeping() ?></td>
    </tr>
    <tr>
      <th>Solid wastes remarks:</th>
      <td><?php echo $eia_project_operation_phase->getSolidWastesRemarks() ?></td>
    </tr>
    <tr>
      <th>Increased traffic:</th>
      <td><?php echo $eia_project_operation_phase->getIncreasedTraffic() ?></td>
    </tr>
    <tr>
      <th>Increased traffic rules adhere:</th>
      <td><?php echo $eia_project_operation_phase->getIncreasedTrafficRulesAdhere() ?></td>
    </tr>
    <tr>
      <th>Increased traffic signables:</th>
      <td><?php echo $eia_project_operation_phase->getIncreasedTrafficSignables() ?></td>
    </tr>
    <tr>
      <th>Increased traffice remarks:</th>
      <td><?php echo $eia_project_operation_phase->getIncreasedTrafficeRemarks() ?></td>
    </tr>
    <tr>
      <th>Fire risk:</th>
      <td><?php echo $eia_project_operation_phase->getFireRisk() ?></td>
    </tr>
    <tr>
      <th>Fire risk extinguishers:</th>
      <td><?php echo $eia_project_operation_phase->getFireRiskExtinguishers() ?></td>
    </tr>
    <tr>
      <th>Fire risk exit stairs:</th>
      <td><?php echo $eia_project_operation_phase->getFireRiskExitStairs() ?></td>
    </tr>
    <tr>
      <th>Fire risk remarks:</th>
      <td><?php echo $eia_project_operation_phase->getFireRiskRemarks() ?></td>
    </tr>
    <tr>
      <th>Token:</th>
      <td><?php echo $eia_project_operation_phase->getToken() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $eia_project_operation_phase->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $eia_project_operation_phase->getUpdatedAt() ?></td>
    </tr>
    <tr>
      <th>Created by:</th>
      <td><?php echo $eia_project_operation_phase->getCreatedBy() ?></td>
    </tr>
    <tr>
      <th>Updated by:</th>
      <td><?php echo $eia_project_operation_phase->getUpdatedBy() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('projectOperationPhase/edit?id='.$eia_project_operation_phase->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('projectOperationPhase/index') ?>">List</a>

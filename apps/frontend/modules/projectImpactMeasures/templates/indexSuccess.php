<h1>Eia project impact measuress List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Eiaproject</th>
      <th>Dust generation</th>
      <th>Dust generation watering</th>
      <th>Dust generation remove soil</th>
      <th>Dust generation hauling trucks</th>
      <th>Dust generation temporary fence</th>
      <th>Dust generation remarks</th>
      <th>Soil removal</th>
      <th>Soil removal mitigate stockpile</th>
      <th>Soil removal mitigate revegetate</th>
      <th>Soil removal remarks</th>
      <th>Erosion from cuts</th>
      <th>Erosion mitigate construct dryseason</th>
      <th>Erosion mitigate avoid exposure</th>
      <th>Erosion mitigate barrier nets</th>
      <th>Erosion remarks</th>
      <th>Sedimentation</th>
      <th>Sedimentation mitigate silt trap</th>
      <th>Sedimentation mitigate proper stockpilling</th>
      <th>Sedimentation mitigate filling materials</th>
      <th>Sedimentation remarks</th>
      <th>Pollution</th>
      <th>Pollution mitigate temporary disposal</th>
      <th>Pollution mitigate toilet facilities</th>
      <th>Pollution mitigate contract observe</th>
      <th>Pollution remarks</th>
      <th>Vegetation loss</th>
      <th>Vegetation limit clearing</th>
      <th>Vegetation provide clearing</th>
      <th>Vegetation use markers</th>
      <th>Vegetation replant</th>
      <th>Vegetation remarks</th>
      <th>Disturbance</th>
      <th>Disturbance reestablish</th>
      <th>Disturbance schedule</th>
      <th>Disturbance maintenance</th>
      <th>Disturbance remarks</th>
      <th>Noise generation</th>
      <th>Nosie generation schedule</th>
      <th>Noise generation undertake</th>
      <th>Noise generation remark</th>
      <th>Generation employment</th>
      <th>Generation employment hiring</th>
      <th>Generation employment remarks</th>
      <th>Conflicts</th>
      <th>Conflict conslutation</th>
      <th>Conflict remarks</th>
      <th>Traffic congestion</th>
      <th>Traffic rules adherance</th>
      <th>Traffice aid provision</th>
      <th>Traffic congestion remarks</th>
      <th>Crimes accidents</th>
      <th>Crimes accidents safety rules</th>
      <th>Crime accidents remarks</th>
      <th>Token</th>
      <th>Created at</th>
      <th>Updated at</th>
      <th>Created by</th>
      <th>Updated by</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($eia_project_impact_measuress as $eia_project_impact_measures): ?>
    <tr>
      <td><a href="<?php echo url_for('projectImpactMeasures/show?id='.$eia_project_impact_measures->getId()) ?>"><?php echo $eia_project_impact_measures->getId() ?></a></td>
      <td><?php echo $eia_project_impact_measures->getEiaprojectId() ?></td>
      <td><?php echo $eia_project_impact_measures->getDustGeneration() ?></td>
      <td><?php echo $eia_project_impact_measures->getDustGenerationWatering() ?></td>
      <td><?php echo $eia_project_impact_measures->getDustGenerationRemoveSoil() ?></td>
      <td><?php echo $eia_project_impact_measures->getDustGenerationHaulingTrucks() ?></td>
      <td><?php echo $eia_project_impact_measures->getDustGenerationTemporaryFence() ?></td>
      <td><?php echo $eia_project_impact_measures->getDustGenerationRemarks() ?></td>
      <td><?php echo $eia_project_impact_measures->getSoilRemoval() ?></td>
      <td><?php echo $eia_project_impact_measures->getSoilRemovalMitigateStockpile() ?></td>
      <td><?php echo $eia_project_impact_measures->getSoilRemovalMitigateRevegetate() ?></td>
      <td><?php echo $eia_project_impact_measures->getSoilRemovalRemarks() ?></td>
      <td><?php echo $eia_project_impact_measures->getErosionFromCuts() ?></td>
      <td><?php echo $eia_project_impact_measures->getErosionMitigateConstructDryseason() ?></td>
      <td><?php echo $eia_project_impact_measures->getErosionMitigateAvoidExposure() ?></td>
      <td><?php echo $eia_project_impact_measures->getErosionMitigateBarrierNets() ?></td>
      <td><?php echo $eia_project_impact_measures->getErosionRemarks() ?></td>
      <td><?php echo $eia_project_impact_measures->getSedimentation() ?></td>
      <td><?php echo $eia_project_impact_measures->getSedimentationMitigateSiltTrap() ?></td>
      <td><?php echo $eia_project_impact_measures->getSedimentationMitigateProperStockpilling() ?></td>
      <td><?php echo $eia_project_impact_measures->getSedimentationMitigateFillingMaterials() ?></td>
      <td><?php echo $eia_project_impact_measures->getSedimentationRemarks() ?></td>
      <td><?php echo $eia_project_impact_measures->getPollution() ?></td>
      <td><?php echo $eia_project_impact_measures->getPollutionMitigateTemporaryDisposal() ?></td>
      <td><?php echo $eia_project_impact_measures->getPollutionMitigateToiletFacilities() ?></td>
      <td><?php echo $eia_project_impact_measures->getPollutionMitigateContractObserve() ?></td>
      <td><?php echo $eia_project_impact_measures->getPollutionRemarks() ?></td>
      <td><?php echo $eia_project_impact_measures->getVegetationLoss() ?></td>
      <td><?php echo $eia_project_impact_measures->getVegetationLimitClearing() ?></td>
      <td><?php echo $eia_project_impact_measures->getVegetationProvideClearing() ?></td>
      <td><?php echo $eia_project_impact_measures->getVegetationUseMarkers() ?></td>
      <td><?php echo $eia_project_impact_measures->getVegetationReplant() ?></td>
      <td><?php echo $eia_project_impact_measures->getVegetationRemarks() ?></td>
      <td><?php echo $eia_project_impact_measures->getDisturbance() ?></td>
      <td><?php echo $eia_project_impact_measures->getDisturbanceReestablish() ?></td>
      <td><?php echo $eia_project_impact_measures->getDisturbanceSchedule() ?></td>
      <td><?php echo $eia_project_impact_measures->getDisturbanceMaintenance() ?></td>
      <td><?php echo $eia_project_impact_measures->getDisturbanceRemarks() ?></td>
      <td><?php echo $eia_project_impact_measures->getNoiseGeneration() ?></td>
      <td><?php echo $eia_project_impact_measures->getNosieGenerationSchedule() ?></td>
      <td><?php echo $eia_project_impact_measures->getNoiseGenerationUndertake() ?></td>
      <td><?php echo $eia_project_impact_measures->getNoiseGenerationRemark() ?></td>
      <td><?php echo $eia_project_impact_measures->getGenerationEmployment() ?></td>
      <td><?php echo $eia_project_impact_measures->getGenerationEmploymentHiring() ?></td>
      <td><?php echo $eia_project_impact_measures->getGenerationEmploymentRemarks() ?></td>
      <td><?php echo $eia_project_impact_measures->getConflicts() ?></td>
      <td><?php echo $eia_project_impact_measures->getConflictConslutation() ?></td>
      <td><?php echo $eia_project_impact_measures->getConflictRemarks() ?></td>
      <td><?php echo $eia_project_impact_measures->getTrafficCongestion() ?></td>
      <td><?php echo $eia_project_impact_measures->getTrafficRulesAdherance() ?></td>
      <td><?php echo $eia_project_impact_measures->getTrafficeAidProvision() ?></td>
      <td><?php echo $eia_project_impact_measures->getTrafficCongestionRemarks() ?></td>
      <td><?php echo $eia_project_impact_measures->getCrimesAccidents() ?></td>
      <td><?php echo $eia_project_impact_measures->getCrimesAccidentsSafetyRules() ?></td>
      <td><?php echo $eia_project_impact_measures->getCrimeAccidentsRemarks() ?></td>
      <td><?php echo $eia_project_impact_measures->getToken() ?></td>
      <td><?php echo $eia_project_impact_measures->getCreatedAt() ?></td>
      <td><?php echo $eia_project_impact_measures->getUpdatedAt() ?></td>
      <td><?php echo $eia_project_impact_measures->getCreatedBy() ?></td>
      <td><?php echo $eia_project_impact_measures->getUpdatedBy() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('projectImpactMeasures/new') ?>">New</a>

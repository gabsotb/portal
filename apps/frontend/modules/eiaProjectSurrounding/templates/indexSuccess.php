<h1>Eia project surroundings List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Eiaproject</th>
      <th>Project general elevation</th>
      <th>Soil erosion</th>
      <th>Soil erosion heavy rains</th>
      <th>Soil erosion unstable</th>
      <th>Soil erosion others</th>
      <th>Soil erosion others specify</th>
      <th>Existing water body</th>
      <th>Existing water body remark</th>
      <th>Access road</th>
      <th>Access road distance</th>
      <th>Access road type</th>
      <th>Site conform approval</th>
      <th>Site conform remark</th>
      <th>Site existing structure</th>
      <th>Site existing remark</th>
      <th>Land use agriculture</th>
      <th>Land use grassland</th>
      <th>Land use builtup</th>
      <th>Land use marshland</th>
      <th>Land use other</th>
      <th>Land use other specify</th>
      <th>Existing trees</th>
      <th>Existing trees remark</th>
      <th>Wildlife existing</th>
      <th>Wildlife existing remark</th>
      <th>Fishery existing</th>
      <th>Fishery existing remark</th>
      <th>Watershed existing</th>
      <th>Watershed existing remark</th>
      <th>Watershed near name</th>
      <th>Watershed within name</th>
      <th>Token</th>
      <th>Created at</th>
      <th>Updated at</th>
      <th>Created by</th>
      <th>Updated by</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($eia_project_surroundings as $eia_project_surrounding): ?>
    <tr>
      <td><a href="<?php echo url_for('eiaProjectSurrounding/edit?id='.$eia_project_surrounding->getId()) ?>"><?php echo $eia_project_surrounding->getId() ?></a></td>
      <td><?php echo $eia_project_surrounding->getEiaprojectId() ?></td>
      <td><?php echo $eia_project_surrounding->getProjectGeneralElevation() ?></td>
      <td><?php echo $eia_project_surrounding->getSoilErosion() ?></td>
      <td><?php echo $eia_project_surrounding->getSoilErosionHeavyRains() ?></td>
      <td><?php echo $eia_project_surrounding->getSoilErosionUnstable() ?></td>
      <td><?php echo $eia_project_surrounding->getSoilErosionOthers() ?></td>
      <td><?php echo $eia_project_surrounding->getSoilErosionOthersSpecify() ?></td>
      <td><?php echo $eia_project_surrounding->getExistingWaterBody() ?></td>
      <td><?php echo $eia_project_surrounding->getExistingWaterBodyRemark() ?></td>
      <td><?php echo $eia_project_surrounding->getAccessRoad() ?></td>
      <td><?php echo $eia_project_surrounding->getAccessRoadDistance() ?></td>
      <td><?php echo $eia_project_surrounding->getAccessRoadType() ?></td>
      <td><?php echo $eia_project_surrounding->getSiteConformApproval() ?></td>
      <td><?php echo $eia_project_surrounding->getSiteConformRemark() ?></td>
      <td><?php echo $eia_project_surrounding->getSiteExistingStructure() ?></td>
      <td><?php echo $eia_project_surrounding->getSiteExistingRemark() ?></td>
      <td><?php echo $eia_project_surrounding->getLandUseAgriculture() ?></td>
      <td><?php echo $eia_project_surrounding->getLandUseGrassland() ?></td>
      <td><?php echo $eia_project_surrounding->getLandUseBuiltup() ?></td>
      <td><?php echo $eia_project_surrounding->getLandUseMarshland() ?></td>
      <td><?php echo $eia_project_surrounding->getLandUseOther() ?></td>
      <td><?php echo $eia_project_surrounding->getLandUseOtherSpecify() ?></td>
      <td><?php echo $eia_project_surrounding->getExistingTrees() ?></td>
      <td><?php echo $eia_project_surrounding->getExistingTreesRemark() ?></td>
      <td><?php echo $eia_project_surrounding->getWildlifeExisting() ?></td>
      <td><?php echo $eia_project_surrounding->getWildlifeExistingRemark() ?></td>
      <td><?php echo $eia_project_surrounding->getFisheryExisting() ?></td>
      <td><?php echo $eia_project_surrounding->getFisheryExistingRemark() ?></td>
      <td><?php echo $eia_project_surrounding->getWatershedExisting() ?></td>
      <td><?php echo $eia_project_surrounding->getWatershedExistingRemark() ?></td>
      <td><?php echo $eia_project_surrounding->getWatershedNearName() ?></td>
      <td><?php echo $eia_project_surrounding->getWatershedWithinName() ?></td>
      <td><?php echo $eia_project_surrounding->getToken() ?></td>
      <td><?php echo $eia_project_surrounding->getCreatedAt() ?></td>
      <td><?php echo $eia_project_surrounding->getUpdatedAt() ?></td>
      <td><?php echo $eia_project_surrounding->getCreatedBy() ?></td>
      <td><?php echo $eia_project_surrounding->getUpdatedBy() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('eiaProjectSurrounding/new') ?>">New</a>

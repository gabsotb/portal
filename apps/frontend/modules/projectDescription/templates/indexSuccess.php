<h1>Eia project descriptions List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Eiaproject</th>
      <th>Project nature</th>
      <th>Project total cost</th>
      <th>Project working capital</th>
      <th>Total land area</th>
      <th>Existing land use</th>
      <th>Site location developed area</th>
      <th>Site location undeveloped area</th>
      <th>Site location other</th>
      <th>Site location other specify</th>
      <th>Land use residential</th>
      <th>Land use industrial</th>
      <th>Land use tourism</th>
      <th>Land use commercial</th>
      <th>Land use instituational</th>
      <th>Land use openspace</th>
      <th>Land use other</th>
      <th>Land use other specify</th>
      <th>Project components</th>
      <th>Project activities</th>
      <th>Water demand during implementation</th>
      <th>Water demand during operation</th>
      <th>Public water supply</th>
      <th>Water treatment</th>
      <th>Sewage system</th>
      <th>Sewage system modern</th>
      <th>Sewage system ecosan</th>
      <th>Sewage system biogas</th>
      <th>Sewage system other</th>
      <th>Sewage system capacity</th>
      <th>Power supply local electricity</th>
      <th>Power supply own generator</th>
      <th>Power supply local electricity size</th>
      <th>Power supply own generator capacity</th>
      <th>Power supply other</th>
      <th>Power supply other specify</th>
      <th>Man power employment implementation</th>
      <th>Man power employment operation</th>
      <th>Implementation duration</th>
      <th>Token</th>
      <th>Created at</th>
      <th>Updated at</th>
      <th>Created by</th>
      <th>Updated by</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($eia_project_descriptions as $eia_project_description): ?>
    <tr>
      <td><a href="<?php echo url_for('projectDescription/show?id='.$eia_project_description->getId()) ?>"><?php echo $eia_project_description->getId() ?></a></td>
      <td><?php echo $eia_project_description->getEiaprojectId() ?></td>
      <td><?php echo $eia_project_description->getProjectNature() ?></td>
      <td><?php echo $eia_project_description->getProjectTotalCost() ?></td>
      <td><?php echo $eia_project_description->getProjectWorkingCapital() ?></td>
      <td><?php echo $eia_project_description->getTotalLandArea() ?></td>
      <td><?php echo $eia_project_description->getExistingLandUse() ?></td>
      <td><?php echo $eia_project_description->getSiteLocationDevelopedArea() ?></td>
      <td><?php echo $eia_project_description->getSiteLocationUndevelopedArea() ?></td>
      <td><?php echo $eia_project_description->getSiteLocationOther() ?></td>
      <td><?php echo $eia_project_description->getSiteLocationOtherSpecify() ?></td>
      <td><?php echo $eia_project_description->getLandUseResidential() ?></td>
      <td><?php echo $eia_project_description->getLandUseIndustrial() ?></td>
      <td><?php echo $eia_project_description->getLandUseTourism() ?></td>
      <td><?php echo $eia_project_description->getLandUseCommercial() ?></td>
      <td><?php echo $eia_project_description->getLandUseInstituational() ?></td>
      <td><?php echo $eia_project_description->getLandUseOpenspace() ?></td>
      <td><?php echo $eia_project_description->getLandUseOther() ?></td>
      <td><?php echo $eia_project_description->getLandUseOtherSpecify() ?></td>
      <td><?php echo $eia_project_description->getProjectComponents() ?></td>
      <td><?php echo $eia_project_description->getProjectActivities() ?></td>
      <td><?php echo $eia_project_description->getWaterDemandDuringImplementation() ?></td>
      <td><?php echo $eia_project_description->getWaterDemandDuringOperation() ?></td>
      <td><?php echo $eia_project_description->getPublicWaterSupply() ?></td>
      <td><?php echo $eia_project_description->getWaterTreatment() ?></td>
      <td><?php echo $eia_project_description->getSewageSystem() ?></td>
      <td><?php echo $eia_project_description->getSewageSystemModern() ?></td>
      <td><?php echo $eia_project_description->getSewageSystemEcosan() ?></td>
      <td><?php echo $eia_project_description->getSewageSystemBiogas() ?></td>
      <td><?php echo $eia_project_description->getSewageSystemOther() ?></td>
      <td><?php echo $eia_project_description->getSewageSystemCapacity() ?></td>
      <td><?php echo $eia_project_description->getPowerSupplyLocalElectricity() ?></td>
      <td><?php echo $eia_project_description->getPowerSupplyOwnGenerator() ?></td>
      <td><?php echo $eia_project_description->getPowerSupplyLocalElectricitySize() ?></td>
      <td><?php echo $eia_project_description->getPowerSupplyOwnGeneratorCapacity() ?></td>
      <td><?php echo $eia_project_description->getPowerSupplyOther() ?></td>
      <td><?php echo $eia_project_description->getPowerSupplyOtherSpecify() ?></td>
      <td><?php echo $eia_project_description->getManPowerEmploymentImplementation() ?></td>
      <td><?php echo $eia_project_description->getManPowerEmploymentOperation() ?></td>
      <td><?php echo $eia_project_description->getImplementationDuration() ?></td>
      <td><?php echo $eia_project_description->getToken() ?></td>
      <td><?php echo $eia_project_description->getCreatedAt() ?></td>
      <td><?php echo $eia_project_description->getUpdatedAt() ?></td>
      <td><?php echo $eia_project_description->getCreatedBy() ?></td>
      <td><?php echo $eia_project_description->getUpdatedBy() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('projectDescription/new') ?>">New</a>

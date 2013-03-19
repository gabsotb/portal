<h1>Eia project social economics List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Eiaproject</th>
      <th>Existing settlements</th>
      <th>Existing settlements remark</th>
      <th>Average family size</th>
      <th>Average family size remark</th>
      <th>Livelihood farming</th>
      <th>Livelihood fishing</th>
      <th>Livelihood vending</th>
      <th>Livelihood others</th>
      <th>Livelihood others specify</th>
      <th>Local organization</th>
      <th>Local organization description</th>
      <th>Social infrastructures</th>
      <th>Social health centers</th>
      <th>Social hospital</th>
      <th>Social transportation</th>
      <th>Social communication</th>
      <th>Social churches</th>
      <th>Social roads</th>
      <th>Social others</th>
      <th>Social others specify</th>
      <th>Token</th>
      <th>Created at</th>
      <th>Updated at</th>
      <th>Created by</th>
      <th>Updated by</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($eia_project_social_economics as $eia_project_social_economic): ?>
    <tr>
      <td><a href="<?php echo url_for('projectSocialEconomic/show?id='.$eia_project_social_economic->getId()) ?>"><?php echo $eia_project_social_economic->getId() ?></a></td>
      <td><?php echo $eia_project_social_economic->getEiaprojectId() ?></td>
      <td><?php echo $eia_project_social_economic->getExistingSettlements() ?></td>
      <td><?php echo $eia_project_social_economic->getExistingSettlementsRemark() ?></td>
      <td><?php echo $eia_project_social_economic->getAverageFamilySize() ?></td>
      <td><?php echo $eia_project_social_economic->getAverageFamilySizeRemark() ?></td>
      <td><?php echo $eia_project_social_economic->getLivelihoodFarming() ?></td>
      <td><?php echo $eia_project_social_economic->getLivelihoodFishing() ?></td>
      <td><?php echo $eia_project_social_economic->getLivelihoodVending() ?></td>
      <td><?php echo $eia_project_social_economic->getLivelihoodOthers() ?></td>
      <td><?php echo $eia_project_social_economic->getLivelihoodOthersSpecify() ?></td>
      <td><?php echo $eia_project_social_economic->getLocalOrganization() ?></td>
      <td><?php echo $eia_project_social_economic->getLocalOrganizationDescription() ?></td>
      <td><?php echo $eia_project_social_economic->getSocialInfrastructures() ?></td>
      <td><?php echo $eia_project_social_economic->getSocialHealthCenters() ?></td>
      <td><?php echo $eia_project_social_economic->getSocialHospital() ?></td>
      <td><?php echo $eia_project_social_economic->getSocialTransportation() ?></td>
      <td><?php echo $eia_project_social_economic->getSocialCommunication() ?></td>
      <td><?php echo $eia_project_social_economic->getSocialChurches() ?></td>
      <td><?php echo $eia_project_social_economic->getSocialRoads() ?></td>
      <td><?php echo $eia_project_social_economic->getSocialOthers() ?></td>
      <td><?php echo $eia_project_social_economic->getSocialOthersSpecify() ?></td>
      <td><?php echo $eia_project_social_economic->getToken() ?></td>
      <td><?php echo $eia_project_social_economic->getCreatedAt() ?></td>
      <td><?php echo $eia_project_social_economic->getUpdatedAt() ?></td>
      <td><?php echo $eia_project_social_economic->getCreatedBy() ?></td>
      <td><?php echo $eia_project_social_economic->getUpdatedBy() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('projectSocialEconomic/new') ?>">New</a>

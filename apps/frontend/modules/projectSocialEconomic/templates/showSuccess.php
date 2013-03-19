<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $eia_project_social_economic->getId() ?></td>
    </tr>
    <tr>
      <th>Eiaproject:</th>
      <td><?php echo $eia_project_social_economic->getEiaprojectId() ?></td>
    </tr>
    <tr>
      <th>Existing settlements:</th>
      <td><?php echo $eia_project_social_economic->getExistingSettlements() ?></td>
    </tr>
    <tr>
      <th>Existing settlements remark:</th>
      <td><?php echo $eia_project_social_economic->getExistingSettlementsRemark() ?></td>
    </tr>
    <tr>
      <th>Average family size:</th>
      <td><?php echo $eia_project_social_economic->getAverageFamilySize() ?></td>
    </tr>
    <tr>
      <th>Average family size remark:</th>
      <td><?php echo $eia_project_social_economic->getAverageFamilySizeRemark() ?></td>
    </tr>
    <tr>
      <th>Livelihood farming:</th>
      <td><?php echo $eia_project_social_economic->getLivelihoodFarming() ?></td>
    </tr>
    <tr>
      <th>Livelihood fishing:</th>
      <td><?php echo $eia_project_social_economic->getLivelihoodFishing() ?></td>
    </tr>
    <tr>
      <th>Livelihood vending:</th>
      <td><?php echo $eia_project_social_economic->getLivelihoodVending() ?></td>
    </tr>
    <tr>
      <th>Livelihood others:</th>
      <td><?php echo $eia_project_social_economic->getLivelihoodOthers() ?></td>
    </tr>
    <tr>
      <th>Livelihood others specify:</th>
      <td><?php echo $eia_project_social_economic->getLivelihoodOthersSpecify() ?></td>
    </tr>
    <tr>
      <th>Local organization:</th>
      <td><?php echo $eia_project_social_economic->getLocalOrganization() ?></td>
    </tr>
    <tr>
      <th>Local organization description:</th>
      <td><?php echo $eia_project_social_economic->getLocalOrganizationDescription() ?></td>
    </tr>
    <tr>
      <th>Social infrastructures:</th>
      <td><?php echo $eia_project_social_economic->getSocialInfrastructures() ?></td>
    </tr>
    <tr>
      <th>Social health centers:</th>
      <td><?php echo $eia_project_social_economic->getSocialHealthCenters() ?></td>
    </tr>
    <tr>
      <th>Social hospital:</th>
      <td><?php echo $eia_project_social_economic->getSocialHospital() ?></td>
    </tr>
    <tr>
      <th>Social transportation:</th>
      <td><?php echo $eia_project_social_economic->getSocialTransportation() ?></td>
    </tr>
    <tr>
      <th>Social communication:</th>
      <td><?php echo $eia_project_social_economic->getSocialCommunication() ?></td>
    </tr>
    <tr>
      <th>Social churches:</th>
      <td><?php echo $eia_project_social_economic->getSocialChurches() ?></td>
    </tr>
    <tr>
      <th>Social roads:</th>
      <td><?php echo $eia_project_social_economic->getSocialRoads() ?></td>
    </tr>
    <tr>
      <th>Social others:</th>
      <td><?php echo $eia_project_social_economic->getSocialOthers() ?></td>
    </tr>
    <tr>
      <th>Social others specify:</th>
      <td><?php echo $eia_project_social_economic->getSocialOthersSpecify() ?></td>
    </tr>
    <tr>
      <th>Token:</th>
      <td><?php echo $eia_project_social_economic->getToken() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $eia_project_social_economic->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $eia_project_social_economic->getUpdatedAt() ?></td>
    </tr>
    <tr>
      <th>Created by:</th>
      <td><?php echo $eia_project_social_economic->getCreatedBy() ?></td>
    </tr>
    <tr>
      <th>Updated by:</th>
      <td><?php echo $eia_project_social_economic->getUpdatedBy() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('projectSocialEconomic/edit?id='.$eia_project_social_economic->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('projectSocialEconomic/index') ?>">List</a>

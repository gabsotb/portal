<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $eia_project_developer->getId() ?></td>
    </tr>
    <tr>
      <th>Eiaproject:</th>
      <td><?php echo $eia_project_developer->getEiaprojectId() ?></td>
    </tr>
    <tr>
      <th>Developer name:</th>
      <td><?php echo $eia_project_developer->getDeveloperName() ?></td>
    </tr>
    <tr>
      <th>Contact person:</th>
      <td><?php echo $eia_project_developer->getContactPerson() ?></td>
    </tr>
    <tr>
      <th>Address:</th>
      <td><?php echo $eia_project_developer->getAddress() ?></td>
    </tr>
    <tr>
      <th>Telephone:</th>
      <td><?php echo $eia_project_developer->getTelephone() ?></td>
    </tr>
    <tr>
      <th>Mobile phone:</th>
      <td><?php echo $eia_project_developer->getMobilePhone() ?></td>
    </tr>
    <tr>
      <th>Email address:</th>
      <td><?php echo $eia_project_developer->getEmailAddress() ?></td>
    </tr>
    <tr>
      <th>Communication mode:</th>
      <td><?php echo $eia_project_developer->getCommunicationMode() ?></td>
    </tr>
    <tr>
      <th>Social media account:</th>
      <td><?php echo $eia_project_developer->getSocialMediaAccount() ?></td>
    </tr>
    <tr>
      <th>Token:</th>
      <td><?php echo $eia_project_developer->getToken() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $eia_project_developer->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $eia_project_developer->getUpdatedAt() ?></td>
    </tr>
    <tr>
      <th>Created by:</th>
      <td><?php echo $eia_project_developer->getCreatedBy() ?></td>
    </tr>
    <tr>
      <th>Updated by:</th>
      <td><?php echo $eia_project_developer->getUpdatedBy() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('eiaProjectDeveloper/edit?id='.$eia_project_developer->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('eiaProjectDeveloper/index') ?>">List</a>

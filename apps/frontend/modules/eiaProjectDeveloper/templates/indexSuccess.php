<h1>Eia project developers List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Eiaproject</th>
      <th>Developer name</th>
      <th>Contact person</th>
      <th>Address</th>
      <th>Telephone</th>
      <th>Mobile phone</th>
      <th>Email address</th>
      <th>Communication mode</th>
      <th>Social media account</th>
      <th>Token</th>
      <th>Created at</th>
      <th>Updated at</th>
      <th>Created by</th>
      <th>Updated by</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($eia_project_developers as $eia_project_developer): ?>
    <tr>
      <td><a href="<?php echo url_for('eiaProjectDeveloper/show?id='.$eia_project_developer->getId()) ?>"><?php echo $eia_project_developer->getId() ?></a></td>
      <td><?php echo $eia_project_developer->getEiaprojectId() ?></td>
      <td><?php echo $eia_project_developer->getDeveloperName() ?></td>
      <td><?php echo $eia_project_developer->getContactPerson() ?></td>
      <td><?php echo $eia_project_developer->getAddress() ?></td>
      <td><?php echo $eia_project_developer->getTelephone() ?></td>
      <td><?php echo $eia_project_developer->getMobilePhone() ?></td>
      <td><?php echo $eia_project_developer->getEmailAddress() ?></td>
      <td><?php echo $eia_project_developer->getCommunicationMode() ?></td>
      <td><?php echo $eia_project_developer->getSocialMediaAccount() ?></td>
      <td><?php echo $eia_project_developer->getToken() ?></td>
      <td><?php echo $eia_project_developer->getCreatedAt() ?></td>
      <td><?php echo $eia_project_developer->getUpdatedAt() ?></td>
      <td><?php echo $eia_project_developer->getCreatedBy() ?></td>
      <td><?php echo $eia_project_developer->getUpdatedBy() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('eiaProjectDeveloper/new') ?>">New</a>
  
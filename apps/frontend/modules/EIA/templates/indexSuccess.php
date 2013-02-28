<div class="span12">
	<h3 class="page-title">  <small>Enviromental Imapct Assessment </small> </h3>
</div>

<div id="page">
	<div class="row-fluid">
		<div class="span12">
			<div class="widget">
				<div class="widget-title">
					<h4> <i class="icon-reorder"></i> Tasks </h4>
				</div>
				<div class="widget-body">
<h1>Ei applications List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Company regno</th>
      <th>Developer name</th>
      <th>Developer title</th>
      <th>Developer address</th>
      <th>Project name</th>
      <th>Project purpose</th>
      <th>Project nature</th>
      <th>Project site</th>
      <th>Project sitelaws</th>
      <th>Environment impacts</th>
      <th>Other alternatives</th>
      <th>Other information</th>
      <th>Created at</th>
      <th>Updated at</th>
      <th>Created by</th>
      <th>Updated by</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($ei_applications as $ei_application): ?>
    <tr>
      <td><a href="<?php echo url_for('eia/edit?id='.$ei_application->getId()) ?>"><?php echo $ei_application->getId() ?></a></td>
      <td><?php echo $ei_application->getCompanyRegno() ?></td>
      <td><?php echo $ei_application->getDeveloperName() ?></td>
      <td><?php echo $ei_application->getDeveloperTitle() ?></td>
      <td><?php echo $ei_application->getDeveloperAddress() ?></td>
      <td><?php echo $ei_application->getProjectName() ?></td>
      <td><?php echo $ei_application->getProjectPurpose() ?></td>
      <td><?php echo $ei_application->getProjectNature() ?></td>
      <td><?php echo $ei_application->getProjectSite() ?></td>
      <td><?php echo $ei_application->getProjectSitelaws() ?></td>
      <td><?php echo $ei_application->getEnvironmentImpacts() ?></td>
      <td><?php echo $ei_application->getOtherAlternatives() ?></td>
      <td><?php echo $ei_application->getOtherInformation() ?></td>
      <td><?php echo $ei_application->getCreatedAt() ?></td>
      <td><?php echo $ei_application->getUpdatedAt() ?></td>
      <td><?php echo $ei_application->getCreatedBy() ?></td>
      <td><?php echo $ei_application->getUpdatedBy() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('eia/new') ?>">New</a>

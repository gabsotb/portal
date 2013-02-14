<h1>Project summarys List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Investment</th>
      <th>Business sector</th>
      <th>Techinical viability</th>
      <th>Planned investment</th>
      <th>Employment created</th>
      <th>Job categories</th>
      <th>Created at</th>
      <th>Updated at</th>
      <th>Created by</th>
      <th>Updated by</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($project_summarys as $project_summary): ?>
    <tr>
      <td><a href="<?php echo url_for('projectSummary/show?id='.$project_summary->getId()) ?>"><?php echo $project_summary->getId() ?></a></td>
      <td><?php echo $project_summary->getInvestmentId() ?></td>
      <td><?php echo $project_summary->getBusinessSector() ?></td>
      <td><?php echo $project_summary->getTechinicalViability() ?></td>
      <td><?php echo $project_summary->getPlannedInvestment() ?></td>
      <td><?php echo $project_summary->getEmploymentCreated() ?></td>
      <td><?php echo $project_summary->getJobCategories() ?></td>
      <td><?php echo $project_summary->getCreatedAt() ?></td>
      <td><?php echo $project_summary->getUpdatedAt() ?></td>
      <td><?php echo $project_summary->getCreatedBy() ?></td>
      <td><?php echo $project_summary->getUpdatedBy() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('projectSummary/new') ?>">New</a>

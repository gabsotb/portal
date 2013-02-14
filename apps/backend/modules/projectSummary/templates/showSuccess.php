<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $project_summary->getId() ?></td>
    </tr>
    <tr>
      <th>Investment:</th>
      <td><?php echo $project_summary->getInvestmentId() ?></td>
    </tr>
    <tr>
      <th>Business sector:</th>
      <td><?php echo $project_summary->getBusinessSector() ?></td>
    </tr>
    <tr>
      <th>Techinical viability:</th>
      <td><?php echo $project_summary->getTechinicalViability() ?></td>
    </tr>
    <tr>
      <th>Planned investment:</th>
      <td><?php echo $project_summary->getPlannedInvestment() ?></td>
    </tr>
    <tr>
      <th>Employment created:</th>
      <td><?php echo $project_summary->getEmploymentCreated() ?></td>
    </tr>
    <tr>
      <th>Job categories:</th>
      <td><?php echo $project_summary->getJobCategories() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $project_summary->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $project_summary->getUpdatedAt() ?></td>
    </tr>
    <tr>
      <th>Created by:</th>
      <td><?php echo $project_summary->getCreatedBy() ?></td>
    </tr>
    <tr>
      <th>Updated by:</th>
      <td><?php echo $project_summary->getUpdatedBy() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('projectSummary/edit?id='.$project_summary->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('projectSummary/index') ?>">List</a>

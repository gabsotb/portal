<div class="span12">
	<h3 class="page-title"> Terms of Reference Review </h3>
</div>
<div id="page">
	<div id="row-fluid">
		<div id="span12">
			<div class="widget">
				<div class="widget-title">
					<h4><i class="icon-reorder"></i> Terms Of Reference </h4>
				</div>
				<div class="widget-body">
					<div class="row-fluid">
						<div class="span8">
							<div class="well">
								<h4> Issues Assessed </h4>
								<?php echo $tor->getIssuesAssessed() ?>
							</div>
						</div>
					</div>
					
					<div class="row-fluid">
						<div class="span8">
							<div class="well">
								<h4> Specific Tasks </h4>
								<?php $tor->getSpecificTasks() ?>
							</div>
						</div>
					</div>
					
					<div class="row-fluid">
						<div class="span8">
							<div class="well">
								<h4> Stake Holders </h4>
								<?php echo $tor->getStakeHolders() ?>
							</div>
						</div>
					</div>

					<div class="row-fluid">
						<div class="span8">
							<div class="well">
								<h4> EIA Experts </h4>
								<?php echo $tor->getExperts() ?>
							</div>
						</div>
					</div>
					
					<div class="form-actions">
						
						<?php echo button_to('Assessment','tor2/statusNew', array('class' => 'btn btn-primary')) ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!--<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php //echo $tor->getId() ?></td>
    </tr>
    <tr>
      <th>Impact:</th>
      <td><?php //echo $tor->getImpactId() ?></td>
    </tr>
    <tr>
      <th>Issues assessed:</th>
      <td><?php //echo $tor->getIssuesAssessed() ?></td>
    </tr>
    <tr>
      <th>Specific tasks:</th>
      <td><?php// echo $tor->getSpecificTasks() ?></td>
    </tr>
    <tr>
      <th>Stake holders:</th>
      <td><?php //echo $tor->getStakeHolders() ?></td>
    </tr>
    <tr>
      <th>Experts:</th>
      <td><?php //echo $tor->getExperts() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php //echo $tor->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php //echo $tor->getUpdatedAt() ?></td>
    </tr>
    <tr>
      <th>Created by:</th>
      <td><?php //echo $tor->getCreatedBy() ?></td>
    </tr>
    <tr>
      <th>Updated by:</th>
      <td><?php //echo $tor->getUpdatedBy() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php //echo url_for('tor2/edit?id='.$tor->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php //echo url_for('tor2/index') ?>">List</a>
-->
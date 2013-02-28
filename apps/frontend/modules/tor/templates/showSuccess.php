<div class="span12">
	<h3 class="page-title"> Terms of Reference <small> Enviromental Imapct Assessment </small> </h3>
</div>
<div class="page">
	<div class="row-fluid">
		<div class="span12">
			<div class="widget">
				<div class="widget-title">
					<h4><i class="icon-reorder"></i>Terms of Reference List</h4>
				</div>
				<div class="widget-body">
					<table class="table table-striped">
					  <tbody>
						<tr>
						  <th>Id:</th>
						  <td><?php echo $tor->getId() ?></td>
						</tr>
						<tr>
						  <th>Impact:</th>
						  <td><?php echo $tor->getImpactId() ?></td>
						</tr>
						<tr>
						  <th>Issues assessed:</th>
						  <td><?php echo $tor->getIssuesAssessed() ?></td>
						</tr>
						<tr>
						  <th>Specific tasks:</th>
						  <td><?php echo $tor->getSpecificTasks() ?></td>
						</tr>
						<tr>
						  <th>Stake holders:</th>
						  <td><?php echo $tor->getStakeHolders() ?></td>
						</tr>
						<tr>
						  <th>Experts:</th>
						  <td><?php echo $tor->getExperts() ?></td>
						</tr>
						<tr>
						  <th>Created at:</th>
						  <td><?php echo $tor->getCreatedAt() ?></td>
						</tr>
						<tr>
						  <th>Updated at:</th>
						  <td><?php echo $tor->getUpdatedAt() ?></td>
						</tr>
						<tr>
						  <th>Created by:</th>
						  <td><?php echo $tor->getCreatedBy() ?></td>
						</tr>
						<tr>
						  <th>Updated by:</th>
						  <td><?php echo $tor->getUpdatedBy() ?></td>
						</tr>
					  </tbody>
					</table>

					<hr />

					<a href="<?php echo url_for('tor/edit?id='.$tor->getId()) ?>"class="btn">Edit</a>
					&nbsp;
					<a href="<?php echo url_for('tor/index') ?>">List</a>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="page" class="dashboard">
 <div class="row-fluid">
      <div class="span11">
      <div class="widget">
	    <div class="widget-title">
		<h4><?php echo __('Investment Certificate Applications - Rejected Applications') ?></h4>						
		</div>
	      <div class="widget-body">
		     <table class="table table-striped table-bordered" id="inboxbackend">
  <thead>
    <tr>
      <th>Business Registration</th>
      <th>Application type</th>
      <th>Reason for Rejection</th>
      <th>Comment</th>
      <th>Date Rejected</th>
    
    </tr>
  </thead>
  <tbody>
    <?php foreach ($rejected_applicationss as $rejected_applications): ?>
    <tr>
      <td><?php echo $rejected_applications->getBusinessRegistration() ?></td>
      <td><?php echo $rejected_applications->getApplicationType() ?></td>
      <td><?php echo $rejected_applications->getReason() ?></td>
      <td><?php echo $rejected_applications->getComment() ?></td>
      <td><?php echo $rejected_applications->getCreatedAt() ?></td>
     
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('investmentrejected/new') ?>">New</a>
		  </div>
	  
	  </div>
	  </div>
 </div>
</div>





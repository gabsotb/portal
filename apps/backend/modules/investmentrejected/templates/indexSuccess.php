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
      <th><?php echo __('Applicant Reference No') ?></th>
      <th><?php echo __('Application type') ?></th>
      <th><?php echo __('Reason for Rejection') ?></th>
      <th><?php echo __('Comment')?></th>
      <th><?php echo __('Date Rejected') ?></th>
    
    </tr>
  </thead>
  <tbody>
    <?php foreach ($rejected_applicationss as $rejected_applications): ?>
    <tr>
      <td><?php echo $rejected_applications->getReferenceNumber() ?></td>
      <td><?php echo $rejected_applications->getApplicationType() ?></td>
      <td><?php echo $rejected_applications->getReason() ?></td>
      <td><?php echo $rejected_applications->getComment() ?></td>
      <td><?php echo $rejected_applications->getCreatedAt() ?></td>
     
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
  <a href="<?php echo url_for('investmentrejected/new') ?>"><button type="button" class="btn btn-success"><?php echo __('New') ?></button></a>
   
		  </div>
	  
	  </div>
	  </div>
 </div>
</div>





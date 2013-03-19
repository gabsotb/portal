<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('projectOperationPhase/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
 <div class="widget">
 <div class="widget-body">
  <table class="table table-striped table-bordered" id="table10">
    <thead>
			
			
				<th><?php echo("Predicted and Assessed Impacts") ?></th>
				<th><?php echo("Answers") ?></th>
				<th><?php echo("Proposed Enhancement/Mitigating Measures") ?></th>
				<th><?php echo("Remarks") ?></th>
			
	</thead>
    <tbody>
      <tr>
	  <td><?php echo ("Generation of domestic effluents") ?></td>
	  <td><?php echo $form['domestic_influence']->render() ?></td>
	  <td><?php echo $form['domestic_wastewater_treatment']->render() ?> <?php echo("Provision of adequate waste water treatment facilities") ?></td>
	  <td><?php echo $form['domestic_influence_remarks']->render() ?></td>
	  </tr>
	  
	   <tr>
	 <td><?php echo ("Generation of Solid wastes") ?></td>
	  <td><?php echo $form['solid_wastes']->render() ?></td>
	  <td><?php echo $form['solid_wastes_segregation']->render() ?> <?php echo("Segregation of recyclable materials") ?> <br/>
	      <?php echo $form['solid_wastes_proper_collection']->render() ?> <?php echo("Proper collection and disposal of solid wastes") ?> <br/>
		  <?php echo $form['solid_wastes_proper_housekeeping']->render() ?> <?php echo("Proper housekeeping and waste minimization") ?>
	  </td>
	  <td><?php echo $form['solid_wastes_remarks']->render() ?></td>
	  </tr>
	  
	   <tr>
	 <td><?php echo ("Increased traffic and possible congestion as well as increase risk of vehicular and related accidents") ?></td>
	  <td><?php echo $form['increased_traffic']->render() ?></td>
	  <td><?php echo $form['increased_traffic_rules_adhere']->render() ?> <?php echo("Strict enforcement of traffic rules and regulations") ?> <br/>
	      <?php echo $form['increased_traffic_signables']->render() ?> <?php echo("Placement of signable and warnings in appropriate places") ?> <br/>
		  
	  </td>
	  <td><?php echo $form['increased_traffice_remarks']->render() ?></td>
	  </tr>
	  
	   <tr>
	 <td><?php echo ("Risk of Fire") ?></td>
	  <td><?php echo $form['fire_risk']->render() ?></td>
	  <td><?php echo $form['fire_risk_extinguishers']->render() ?> <?php echo("Fire extinguishers in good working condition installed in each corner") ?> <br/>
	      <?php echo $form['fire_risk_exit_stairs']->render() ?> <?php echo("Exit stairs provided and shown on plans clearly posted at entrance") ?> <br/>
		  
	  </td>
	  <td><?php echo $form['fire_risk_remarks']->render() ?></td>
	  </tr>
    </tbody>
  </table>
  </div>
  </div>
    <?php echo $form->renderHiddenFields(); ?>
   <input type="submit" class="btn btn-primary" value="Next" />
</form>

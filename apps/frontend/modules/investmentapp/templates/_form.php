<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form class="form-horizontal" action="<?php echo url_for('investmentapp/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
  <table class="table table-striped table-bordered">
		
    <tbody>
		 
		  <div class="controls">
		   
			<?php echo $form['company_name']->renderRow(
				array('class' =>'span6 popovers' , 'data-trigger'=>'hover', 'data-original-title'=>'Please Enter Company Name Here', 'size' => '60px')) ?>
		</div>
		
        
		  <div class="controls">
			<?php echo $form['registration_number']->renderRow(
				array('class' =>'span6 popovers' , 'data-trigger'=>'hover', 'data-original-title'=>'Please Provide Company Registration Number', 'size' => '60px')) ?>
		
		</div>
       
		  <div class="controls">
			<?php echo $form['company_address']->renderRow(
				array('class' =>'span6 popovers' , 'data-trigger'=>'hover', 'data-original-title'=>'Please Provide Company Address', 'size' => '60px')) ?>
		</div>
		
       
		  <div class="controls">
			<?php echo $form['job_created']->renderRow() ?>
		
		</div>			
	   
		  <div class="controls">
			<?php echo $form['job_category']->renderRow(
				array('class' =>'span6 popovers' , 'data-trigger'=>'hover', 'data-original-title'=>'Please Provide Jobs Categories that will be  Created by your Company', 
				'rows' => '5', 'cols' => '30')) ?>
		
		</div>	
         
		  <div class="controls">
			<?php echo $form['company_legal_nature']->renderRow(
				array('class' =>'span6 popovers' , 'data-trigger'=>'hover', 'data-original-title'=>'Your Company Legal Nature', 'size' => '60px')) ?>
		
		</div>
       
		  <div class="controls">
			<?php echo $form['company_representative']->renderRow(
				array('class' =>'span6 popovers' , 'data-trigger'=>'hover', 'data-original-title'=>'The Company Representative', 'size' => '60px')) ?>
		
		</div>	
       
		  <div class="controls">
			<?php echo $form['application_letter']->renderRow(
				array('class' =>'default')) ?> 				
		</div>	
       
		  <div class="controls">
			<?php echo $form['incorporation_certificate']->renderRow(
				array('class' =>'default')) ?>
		
		</div>	
      
		  <div class="controls">
			<?php echo $form['shareholding_list']->renderRow(
				array('class' =>'default')) ?>
		</div>
		
		  <div class="controls">
			<?php echo $form['company_logo']->renderRow(
				array('class' =>'default' )) ?>
		</div>
		
		  <div class="controls">
		  
			<?php echo $form['username_id']->renderRow(
				array('class' =>'span6 popovers' , 'data-trigger'=>'hover', 'data-original-title'=>'User Logged in ID')) ?>
		</div>
		
     <div class="form-actions">
      <tfoot>
      <tr>
	  
	    <?php if (!$form->getObject()->isNew()): ?>
		<input type="hidden" name="sf_method" value="put" />
		<?php endif; ?>
	  
        <td colspan="2">
          &nbsp;<a href="<?php echo url_for('investmentapp/index') ?>"><button type="button" class="btn btn-danger">Cancel</button></a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'investmentapp/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" class="btn btn-primary" value="Submit" />
        </td>
      </tr>
    </tfoot>               
     </div>
		
    </tbody>
  </table>
</form>

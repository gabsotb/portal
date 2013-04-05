<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form  action="<?php echo url_for('investmentapp/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
  <table class="table table-striped table-bordered" id="investment_table">
		<?php 
		//variables to echo
		$registration_number =  __('Enter Business Registration Number. This is the Number that was issued when
					you registered your business') ;
		$registration_number2 =  __('Business Number') ;	
        $name =  __('Enter A Valid Business Name, The Name entered will be verified and counter checked
					from the business registration system. Make sure you have a registered name');	
        $name2 =  __('Business Name');	
		$title_in_company =  __( 'Enter Your Title in The Company.') ;
		$title_in_company2 =  __('Company Address'); 
		//
		$business_sector =  __('Select a Business Sector.') ;
		$business_sector2 =   __('Business Sector') ;
		///
		$business_category =  __('Select a Business Category.') ;
		 $business_category2 =  __('Business Category') ;
		
 		?>
    <tbody>
		 	<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['registration_number']->renderRow(array('class' => 'span6 popovers' ,'onkeyup' => 'showDetails(this.value)','data-content' => $registration_number  , 'data-trigger' => 'hover', 'data-original-title' => $registration_number2))  ?>
				</div>
			</div>
		    </div>
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['name']->renderRow(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' =>  $name, 'data-original-title' => $name2)) ?>
				</div>
			</div>
		</div>
	
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['title_in_company']->renderRow(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' =>$title_in_company , 'data-original-title' => $title_in_company2 )) ?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['business_sector']->renderRow(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' => $business_sector , 'data-original-title' => $business_sector2)) ?>
				</div>
			</div>
		</div>
		<!-- Job Category section -->
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['business_category']->renderRow(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' => $business_category , 'data-original-title' => $business_category2)) ?>
				</div>
			</div>
		</div>
		<!-- end -->
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['office_telephone']->renderRow(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' => __('Enter Office Telephone Number'), 'data-original-title' => __('Office Telephone'))) ?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['fax']->renderRow(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' => __('Enter Fax Number'), 'data-original-title' => __('Fax'))) ?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['post_box']->renderRow(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' => __('Enter you P.O Box Information '), 'data-original-title' => __('Post Address'))) ?>
				</div>
			</div>
		</div>
	    <div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['location']->renderRow(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' => __('Select Business Location'), 'data-original-title' => __('Business Location'))) ?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['sector']->renderRow(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' => __('Select Business Sector'), 'data-original-title' => __('Business Sector'))) ?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['district']->renderRow(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' => __('Select District'), 'data-original-title' => __('Business District'))) ?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['city_province']->renderRow(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' => __('Select City / Province'), 'data-original-title' => __('Business Setup Province/City'))) ?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['token']->render(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' => __('Select City / Province'), 'data-original-title' => __('Business Setup Province/City'))) ?>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					
					<?php echo $form->renderHiddenFields(); ?>
				</div>
			</div>
		</div>
      <tfoot>
      <tr>
	  
	    <?php if (!$form->getObject()->isNew()): ?>
		<input type="hidden" name="sf_method" value="put" />
		<?php endif; ?>
	  
        <td colspan="2">
          &nbsp;<a href="<?php echo url_for('investmentapp/index') ?>"><button type="button" class="btn btn-danger"><?php echo __('Cancel') ?></button></a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php //echo link_to('Delete', 'investmentapp/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" class="btn btn-primary" value="<?php echo __('Submit') ?>" />
		  <?php //$form->validatorSchema->setOption('allow_extra_fields', true); ?>
        </td>
      </tr>
    </tfoot>               
     
		
    </tbody>
  </table>
</form>
<!-- We want to create Javascript code that can autofill fields from database if a users enters a valid Tin Number -->

<script type="text/javascript">
      function showDetails(str)
				{
				  var minlength = 3;
				  var id = str;
				if (id=="")
				  {
				  document.getElementById("txtHint").innerHTML="";
				  return;
				  }
				  if (window.XMLHttpRequest)
				  {// code for IE7+, Firefox, Chrome, Opera, Safari
				  xmlhttp=new XMLHttpRequest();
				  }
				else
				  {// code for IE6, IE5
				  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				  }
				xmlhttp.onreadystatechange=function()
				  {
				  if (xmlhttp.readyState==4 && xmlhttp.status==200)
					{
					 var data = JSON.parse(xmlhttp.responseText);
				   // document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
					 for(var i=0;i<data.length;i++) 
					 {
					
					 //document.getElementById("txtHint").innerHTML += data[i].business_name + ' - ' + data[i].business_sector + ' - ' + data[i].office_telephone;
					 //try to set values
					 document.getElementById('investment_application_name').value = data[i].business_name;
					 document.getElementById('investment_application_business_sector').value = data[i].business_sector;
					 document.getElementById('investment_application_location').value = data[i].location;
					 document.getElementById('investment_application_office_telephone').value = data[i].office_telephone;
					 document.getElementById('investment_application_fax').value = data[i].fax;
					 document.getElementById('investment_application_post_box').value = data[i].post_box;
					 document.getElementById('investment_application_district').value = data[i].district;
					 document.getElementById('investment_application_city_province').value = data[i].city_province;
					 document.getElementById('investment_application_sector').value = data[i].sector;
					 }
					
					}
				  }
				xmlhttp.open("GET", "details?id="+id, true);
				xmlhttp.send(); 

}
	
</script>

<!-- end -->
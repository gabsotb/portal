<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('investmentrejected/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table class="table table-striped table-bordered" id="eia_table7">
  <tbody>
       <div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['applicant_reference_number']->renderRow(array('class' => 'span6 popovers' ,'onkeyup' => 'showDetails(this.value)','data-content' => 'Enter Reference Number'  , 'data-trigger' => 'hover', 'data-original-title' => 'Type'))  ?>
				</div>
			</div>
			
	   </div>
	   <div class="control-group">
			<div class="controls">
				<div class="input-prepend">
					<?php echo $form['business_registration']->renderRow(array('class' => 'span6 popovers' , 'data-trigger' => 'hover', 'data-content' =>'Business Registration' , 'data-original-title' => 'Business Registration' )) ?>
				</div>
			</div>
		</div>
	   <div class="control-group">
			<div class="controls">
			  <div class="input-prepend">
					<?php echo $form['application_type']->renderRow(array('class' => 'span9 chosen', 'data-placeholder' => 'Choose a Category', 'tabindex' => '1')) ?>
	            </div>
			  </div>
	   </div>
	    <div class="control-group">
			<div class="controls">
			  <div class="input-prepend">
					<?php echo $form['reasons']->renderRow(array('class' => 'span12 wysihtml5' ,'rows' => '10')) ?>
	            </div>
			  </div>
	   </div>
	   <div class="control-group">
			<div class="controls">
			  <div class="input-prepend">
					<?php echo $form['comments']->renderRow(array('class' => 'span12 wysihtml5' ,'rows' => '10')) ?>
	            </div>
			  </div>
			  <?php echo $form->renderHiddenFields(); ?>
	   </div>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="2">
		 <input type="submit" class="btn btn-success" value="Reject" />&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;<a href="<?php echo url_for('investmentrejected/index') ?>">
		   <button type="button" class="btn btn-danger"><?php echo __('Cancel') ?></button>
		  </a>
         
        </td>
      </tr>
    </tfoot>
    
  </table>
</form>
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
					 document.getElementById('rejected_applications_business_registration').value = data[i].registration_number;
					 document.getElementById('rejected_applications_business_id').value = data[i].business_id;
					 }
					
					}
				  }
				xmlhttp.open("GET", "details?id="+id, true);
				xmlhttp.send(); 

}
	
</script>
<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
        
    <?php
     //get set attribute
	 $id = sfContext::getInstance()->getUser()->getAttribute('session_business_id');
	 //we get the currency type of this applicant
	 $currency = Doctrine_Core::getTable('InvestmentApplication')->getInvestorCurrency($id);
	 //print "session id". $id; exit;

	?>
		  <div class="control-group">
		
					    <div class="widget">
						 <div class="widget-body">	
                                <div class="alert alert-block alert-info">
										<p>
											<span><?php echo __('INVESTMENT AND FINANCIAL SCHEDULE') ?> <?php echo __("Your Currency: $currency")?></span>
										</p>
								    </div>						 
										<!-- **************************************8 -->
									<div>
												  <div class="descLayout">
													<div class="pad">
													  <p>
														<?php echo __('If this is your first application,
														click on Load Button to Start Updating your INVESTMENT AND FINANCIAL SCHEDULE ') ?>
														<button name="load"><?php echo __('Load Data') ?></button>
														<!--<button name="save">Save</button> -->
														<label>
														<input type="checkbox" name="autosave" disabled="true" checked="checked" autocomplete="off"> <?php echo ('Autosave') ?></label>
													  </p>

													  <div id="exampleConsole" class="console"><?php echo __('Click "Load" to load data from server') ?></div>

													 
													</div>
												  </div>

												 <div id="example1"></div>
								     </div>
										<!-- **************************************  -->
									
							</div>	
                       </div>
					   
		  </div>
		   <div class="control-group">
		
					    <div class="widget">
						 <div class="widget-body">	
                                <div class="alert alert-block alert-info">
										<p>
											<span><?php echo __('START UP EXPENSES') ?></span>
										</p>
								    </div>						 
										<!-- **************************************8 -->
									<div>
												  <div class="descLayout1">
													<div class="pad1">
													  <p>
														 <?php echo __('If this is your first application,
														click on Load Button to Start Updating your START UP EXPENSES') ?>
														<button name="load1"><?php echo __('Load Data') ?></button>
														<!--<button name="save">Save</button> -->
														<label>
														<input type="checkbox" name="autosave1" disabled="true" checked="checked" autocomplete="off"> <?php echo __('Autosave') ?></label>
													  </p>

													  <div id="startupconsole" class="console"><?php echo __('Click "Load" to load data from server') ?></div>

													 
													</div>
												  </div>

												 <div id="startup"></div>
								     </div>
										<!-- **************************************  -->
									
							</div>	
                       </div>
					   
		  </div>
		   <div class="control-group">
		
					    <div class="widget">
						 <div class="widget-body">	
                                <div class="alert alert-block alert-info">
										<p>
											<span><?php echo __('FINANCIAL STRUCTURE') ?></span>
										</p>
								    </div>						 
										<!-- **************************************8 -->
									<div>
												  <div class="descLayout2">
													<div class="pad2">
													  <p>
														<?php echo __('If this is your first application,
														click on Load Button to Start Updating your FINANCIAL STRUCTURE') ?>
														<button name="load2"><?php echo __('Load Data') ?></button>
														<!--<button name="save">Save</button> -->
														<label>
														<input type="checkbox" name="autosave2" disabled="true" checked="checked" autocomplete="off"> <?php echo __('Autosave') ?></label>
													  </p>

													  <div id="financialconsole" class="console"><?php echo ('Click "Load" to load data from server') ?></div>

													 
													</div>
												  </div>

												 <div id="financial"></div>
								     </div>
										<!-- **************************************  -->
									
							</div>	
                       </div>
					   
		  </div>
		    <div class="control-group">
		
					    <div class="widget">
						 <div class="widget-body">	
                                <div class="alert alert-block alert-info">
										<p>
											<span><?php echo __('EMPLOYMENT OPPORTUNITIES') ?></span>
										</p>
								    </div>						 
										<!-- **************************************8 -->
									<div>
												  <div class="descLayout3">
													<div class="pad3">
													  <p>
														 <?php echo __('If this is your first application,
														click on Load Button to Start Updating your Local Jobs') ?>
														<button name="load3"><?php echo __('Load Data') ?></button>
														<!--<button name="save">Save</button> -->
														<label>
														<input type="checkbox" name="autosave3" disabled="true" checked="checked" autocomplete="off"> <?php echo __('Autosave') ?></label>
													  </p>

													  <div id="local_jobs_console" class="console"><?php echo __('Click "Load" to load data from server') ?></div>

													 
													</div>
												  </div>

												 <div id="local_jobs"></div>
								     </div>
										<!-- **************************************  -->
												<!-- **************************************8 -->
									<div>
												  <div class="descLayout4">
													<div class="pad4">
													  <p>
														 <?php echo __('If this is your first application,
														click on Load Button to Start Updating your Foreign Jobs') ?>
														<button name="load4"><?php echo __('Load Data') ?></button>
														<!--<button name="save">Save</button> -->
														<label>
														<input type="checkbox" name="autosave4" disabled="true" checked="checked" autocomplete="off"> <?php echo __('Autosave') ?></label>
													  </p>

													  <div id="foreign_console" class="console"><?php echo __('Click "Load" to load data from server') ?></div>

													 
													</div>
												  </div>

												 <div id="foreign_jobs"></div>
								     </div>
										<!-- **************************************  -->
									
							</div>	
                       </div>
					   
		  </div>
		  <div class="control-group">
		
					    <div class="widget">
						 <div class="widget-body">	
                                <div class="alert alert-block alert-info">
										<p>
											<span><?php echo __('PLANNED COMPANY PERFORMANCE') ?></span>
										</p>
								    </div>						 
										<!-- ************************************** -->
									<div>
												  <div class="descLayout3">
													<div class="pad3">
													  <p>
														 <?php echo __('If this is your first application,
														click on Load Button to Start Updating your PLANNED COMPANY PERFORMANCE') ?>
														<button name="load5"><?php echo __('Load Data') ?></button>
														<!--<button name="save">Save</button> -->
														<label>
														<input type="checkbox" name="autosave5" disabled="true" checked="checked" autocomplete="off"> <?php echo __('Autosave') ?>
														</label>
													  </p>

													  <div id="performance_console" class="console"><?php echo __('Click "Load" to load data from server') ?></div>

													 
													</div>
												  </div>

												 <div id="performance"></div>
								     </div>
										<!-- **************************************  -->
									
							</div>	
                       </div>
					   
		  </div>
		  <div class="control-group">
		   <form class="" action="<?php echo url_for('businessplan/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
		      <div class="widget">
				<div class="control-group">
					<div class="controls">
						<div class="input-prepend">
							<?php echo $form['investment_id']->render() ?>
						</div>
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
			 <div class="widget">
			   <div class="control-group">
					<div class="controls">
						<div class="input-prepend">
							 <span> <label class="control-label"><?php echo $form['project_brief']->renderLabel() ?>
							 <?php echo $form['project_brief']->renderError() ?>  <?php echo $form['investment_id']->renderError() ?>
							 </label></span>
							 
							<?php echo $form['project_brief']->render(array('class' => 'span12 wysihtml5' ,'rows' => '10'))?>
						</div>
					</div>
				</div>
	        </div>
			<div class="widget">
						                <div class="alert alert-block alert-info fade in">
										<p>
											<span><?php echo __('APPLIED FOR INCENTIVES') ?></span>
										</p>
								    </div>	
										 <div class="widget-body">	
									        <table class="table table-bordered table-hover">
												
												<tbody>
													<tr>
														<td><?php echo __('Exemptions On Imported Machinery(Attach List word or pdf documents supported)')?> 
														<?php echo $form['exemption_on_machinery']->renderError() ?>
														</td>
														<td> <?php echo $form['exemption_on_machinery']->render(array('class' => 'default')) ?></td>
													</tr>
													<tr>
														<td><?php echo __('Exemptions On Imported Raw Materials(Attach a list)') ?></td>
														<td><?php echo $form['exemption_raw_materials']->render(array('class' => 'default')) ?></td>
													</tr>
													<tr>
													 <td><?php echo __('Exemptions On Imported Building Materials(Please Attach Following documents(word or pdf documents supported))')?> </td>
													 <td><span><?php echo __('Land OwnerShip Document')?>:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $form['land_ownership_document']->render(array('class' => 'default')) ?><br/>
													 <span><?php echo __('Approved Bill of Quantities by District')?>:</span>&nbsp;&nbsp;<?php echo $form['bill_of_quantiy']->render(array('class' => 'default')) ?> <br/>
													 <span><?php echo __('Drawings') ?>:</span>
													 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													 
													 <?php echo $form['drawings']->render(array('class' => 'default')) ?><br/>
													  <span><?php echo __('Construction Permits') ?>:</span>
													  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													  <?php echo $form['construction_permits']->render(array('class' => 'default')) ?><br/>
													 </td>
													</tr>
													<tr>
													  <td><?php echo __('Investment Allowances') ?></td>
													  <td><?php echo $form['investment_allowances']->render() ?></td>
													</tr>
													<tr>
													 <td><?php echo __('Additional Incentives(Precise Nature)')?></td>
														<td><?php echo $form['additional_incentives']->render(array('class' => 'span12 wysihtml5' ,'rows' => '10')) ?></td>
													</tr>
													<tr>
													 <td><?php echo __('Visa and Work permits and fist arrival privileges forexpatriates (precise names, skills and citizenship)') ?></td>
														<td><?php echo $form['visa_work_permits']->render(array('class' => 'span12 wysihtml5' ,'rows' => '10')) ?></td>
													</tr>
												</tbody>
									       </table>
										    
										
										</div>
							</div>
         <?php if (!$form->getObject()->isNew()): ?>
		<input type="hidden" name="sf_method" value="put" />
		<?php endif; ?>
	     <table>
		 <tr>
        <td colspan="2">
          <!--&nbsp;<a href="<?php //echo url_for('businessplan/index') ?>">Back to list</a> -->
          <input class="btn btn-primary" type="submit" value="Submit" />
        </td>
		</tr>
		</table>
		   </form>
		</div>

 <script>
            var $container = $("#example1");
            var $console = $("#exampleConsole");
            var $parent = $container.parent();
            var autosaveNotification;
            $container.handsontable({
              startRows: 0,
              startCols: 0,
              rowHeaders: ['<?php echo __('Land\t'); echo __("($currency)"); ?>', '<?php echo __('Construction\t'); echo __("($currency)"); ?>', '<?php echo __('Plants\t'); echo __("($currency)");?>', '<?php echo __('Furniture\t'); echo __("($currency)"); ?>' , '<?php echo __('Others\t'); echo __("($currency)"); ?>'],
              colHeaders: ['<?php echo __('Year 1') ?>', '<?php echo __('Year 2') ?>', '<?php echo __('Year 3') ?>' , '<?php echo __('Year 4')?>', '<?php echo __('Year 5') ?>'],
              minSpareCols: 0,
              minSpareRows: 0,
              contextMenu: true,
              onChange: function (change, source) {
                if (source === 'loadData') {
                  return; //don't save this change
                }
                if ($parent.find('input[name=autosave]').is(':checked')) {
                  clearTimeout(autosaveNotification);
                  $.ajax({
                    url: "<?php echo url_for('businessplan/save?id='.$id) ?>",
                    dataType: "json",
                    type: "POST",
                    data: {
					    changes: change
					}, //contains changed cells' data
                    success: function (data) {
                      $console.text('Autosaved works with (' + change[0] + ' cell' + (change.length > 1 ? 's' : '') + ')');
                      autosaveNotification = setTimeout(function () {
                        $console.text('Changes will be autosaved');
						
                      }, 5000);
                    }
                  });
				  
                }
              }
            });
            var handsontable = $container.data('handsontable');

            $parent.find('button[name=load]').click(function () {
              $.ajax({
                url: "<?php 
				  //$id = 1 ;
				  //$token = "87feb264974d9c9e9627859108705d31d63129b9" ;
				echo url_for('businessplan/loading?id='.$id) ?>",
                dataType: 'json',
                type: 'GET',
                 success: function (res) {
                  var data = [], row;
				   var selection;
                   selection = $container.handsontable('getSelected');
				  var i = 0 ;
                  for (i = 0, ilen = res.costs.length; i < ilen; i++) {
                    row = [];
				   // row[0] = res.costs[i].id;
                    row[0] = res.costs[i].year1;
                    row[1] = res.costs[i].year2;
                    row[2] = res.costs[i].year3;
					row[3] = res.costs[i].year4;
					row[4] = res.costs[i].year5;
					////
					// alert();
                    data[res.costs[i].id - res.costs[0].id ] = row;
					
					//alert(data[res.costs[].id ]) ;
					//alert(data[res.costs[i].id - res.costs[0].id ]);
                  }
				 
                  handsontable.loadData(data);
				 
				//  alert(handsontable('getData')[selection[0]]);
                  $console.text('<?php echo __('Data loaded') ?>');
                }
              });
            }).click(); //execute immediately

            $parent.find('button[name=save]').click(function () {
              $.ajax({
                url: "<?php echo url_for('businessplan/save?id='.$id) ?>",
                data: {"data": handsontable.getData()}, //returns all cells' data
                dataType: 'json',
                type: 'POST',
                success: function (res) {
                  if (res.result === 'ok') {
                    $console.text('Data saved');
                  }
                  else {
                    $console.text('Save error');
                  }
                },
                error: function () {
                  $console.text('Save error');
                }
              });
            });

            $parent.find('input[name=autosave]').click(function () {
              if ($(this).is(':checked')) {
                $console.text('<?php echo('Changes will be autosaved') ?>');
				
              }
              else {
                $console.text('Changes will not be autosaved');
              }
            });
			
          </script>
		  
<!-- ------------------------------------------------------------------------------------------------------------------- -->		  
		  
		  
		  
		  
		  <script>
		   
		   //******************************************************************8for the startupexpenses saving and loading
			var $container1 = $("#startup");
            var $console1 = $("#startupconsole");
            var $parent1 = $container1.parent();
            var autosaveNotification;
            $container1.handsontable({
              startRows: 0,
              startCols: 0,
              rowHeaders: ['<?php echo __('Studies\t'); echo __("($currency)"); ?> ', '<?php echo __('Travel Expenses\t'); echo __("($currency)"); ?>', '<?php echo __('Starting Capital\t'); echo __("($currency)"); ?>', '<?php echo __('Administrative Fees\t'); echo __("($currency)");?>' , '<?php echo __('Rental Fees\t'); echo __("($currency)"); ?>'],
              colHeaders: ['<?php echo __('Year 1') ?>', '<?php echo __('Year 2') ?>', '<?php echo __('Year 3') ?>' , '<?php echo __('Year 4') ?>', '<?php echo __('Year 5') ?>'],
              minSpareCols: 0,
              minSpareRows: 0,
              contextMenu: true,
              onChange: function (change, source) {
                if (source === 'loadData') {
                  return; //don't save this change
                }
                if ($parent1.find('input[name=autosave1]').is(':checked')) {
                  clearTimeout(autosaveNotification);
                  $.ajax({
                    url: "<?php echo url_for('businessplan/savestartup?id='.$id) ?>",
                    dataType: "json",
                    type: "POST",
                    data: {
					    changes: change
					}, //contains changed cells' data
                    success: function (data) {
                      $console.text('Autosaved works with (' + change[0] + ' cell' + (change.length > 1 ? 's' : '') + ')');
                      autosaveNotification = setTimeout(function () {
                        $console.text('Changes will be autosaved');
						
                      }, 5000);
                    }
                  });
				  
                }
              }
            });
            var handsontable_startup = $container1.data('handsontable');

            $parent1.find('button[name=load1]').click(function () {
              $.ajax({
                url: "<?php echo url_for('businessplan/loadstartup?id='.$id) ?>",
                dataType: 'json',
                type: 'GET',
                 success: function (result) {
                  var data = [], row;
				   var selection;
                   selection = $container1.handsontable('getSelected');
				  var i = 0 ;
                  for (i = 0, ilen = result.startupexpenses.length; i < ilen; i++) {
                    row = [];
				   // row[0] = res.costs[i].id;
                    row[0] = result.startupexpenses[i].year1;
                    row[1] = result.startupexpenses[i].year2;
                    row[2] = result.startupexpenses[i].year3;
					row[3] = result.startupexpenses[i].year4;
					row[4] = result.startupexpenses[i].year5;
					////
					// alert();
                    data[result.startupexpenses[i].id - result.startupexpenses[0].id ] = row;
					
					//alert(data[res.costs[].id ]) ;
					//alert(data[res.costs[i].id - res.costs[0].id ]);
                  }
				 
                  handsontable_startup.loadData(data);
				 
				//  alert(handsontable('getData')[selection[0]]);
                  $console.text('Data loaded');
                }
              });
            }).click(); //execute immediately

          

            $parent1.find('input[name=autosave1]').click(function () {
              if ($(this).is(':checked')) {
                $console.text('Changes will be autosaved');
				
              }
              else {
                $console.text('Changes will not be autosaved');
              }
            });
			// ******************************************************************* end
		  
		  </script>
		  
		  <script>
		    var $container2 = $("#financial");
            var $console2 = $("#financialconsole");
            var $parent2 = $container2.parent();
            var autosaveNotification;
            $container2.handsontable({
              startRows: 0,
              startCols: 0,
              rowHeaders: ['<?php echo __('Equity\t'); echo __("($currency)"); ?>', '<?php echo __('Loan From Bank\t'); echo __("($currency)"); ?>', '<?php echo __('Mother Company Loan\t'); echo __("($currency)"); ?>', '<?php echo __('Grant\t'); echo __("($currency)"); ?>'],
              colHeaders: ['<?php echo __('Local Source') ?>', '<?php echo __('Foreign Source') ?>'],
              minSpareCols: 0,
              minSpareRows: false,
              contextMenu: true,
              onChange: function (change, source) {
                if (source === 'loadData') {
                  return; //don't save this change
                }
                if ($parent2.find('input[name=autosave2]').is(':checked')) {
                  clearTimeout(autosaveNotification);
                  $.ajax({
                    url: "<?php echo url_for('businessplan/savefinancial?id='.$id) ?>",
                    dataType: "json",
                    type: "POST",
                    data: {
					    changes: change
					}, //contains changed cells' data
                    success: function (data) {
                      $console.text('Autosaved works with (' + change[0] + ' cell' + (change.length > 1 ? 's' : '') + ')');
                      autosaveNotification = setTimeout(function () {
                        $console.text('Changes will be autosaved');
						
                      }, 5000);
                    }
                  });
				  
                }
              }
            });
            var handsontable_financial = $container2.data('handsontable');
			//
			 $parent2.find('button[name=load2]').click(function () {
              $.ajax({
                url: "<?php echo url_for('businessplan/loadfinancial?id='.$id) ?>",
                dataType: 'json',
                type: 'GET',
                 success: function (result1) {
                  var data = [], row;
				   var selection;
                   selection = $container2.handsontable('getSelected');
				  var i = 0 ;
                  for (i = 0, ilen = result1.financial.length; i < ilen; i++) {
                    row = [];
				   // row[0] = res.costs[i].id;
                    row[0] = result1.financial[i].local_source;
                    row[1] = result1.financial[i].foreign_source;
                   
					////
					// alert();
                    data[result1.financial[i].id - result1.financial[0].id ] = row;
					//alert(data[result1.financial[i].id - result1.financial[0].id ]);
					//alert(data[res.costs[].id ]) ;
					//alert(data[res.costs[i].id - res.costs[0].id ]);
                  }
				 
                  handsontable_financial.loadData(data);
				 
				//  alert(handsontable('getData')[selection[0]]);
                  $console.text('Data loaded');
                }
              });
            }).click(); //execute immediately

          

            $parent2.find('input[name=autosave2]').click(function () {
              if ($(this).is(':checked')) {
                $console.text('Changes will be autosaved');
				
              }
              else {
                $console.text('Changes will not be autosaved');
              }
            });
		  </script>
		  
		  <script>
		     var $container3 = $("#local_jobs");
            var $console3 = $("#local_jobs_console");
            var $parent3 = $container3.parent();
            var autosaveNotification;
            $container3.handsontable({
              startRows: 0,
              startCols: 0,
              rowHeaders: ['<?php echo __('Top Management\t'); echo __("($currency)");?>', '<?php echo __('Technical/ Professional\t'); echo __("($currency)"); ?>', '<?php echo __('Skilled Labour\t') ; echo __("($currency)");?>', '<?php echo __('Others(manpower,casual etc)\t'); echo __("($currency)"); ?>'],
              colHeaders: ['<?php echo __('Year 1') ?>', '<?php echo __('Year 2') ?>', '<?php echo __('Year 3') ?>' , '<?php echo __('Year 4') ?>', '<?php echo __('Year 5') ?>'],
              minSpareCols: 0,
              minSpareRows: false,
              contextMenu: true,
              onChange: function (change, source) {
                if (source === 'loadData') {
                  return; //don't save this change
                }
                if ($parent3.find('input[name=autosave3]').is(':checked')) {
                  clearTimeout(autosaveNotification);
                  $.ajax({
                    url: "<?php echo url_for('businessplan/savelocal?id='.$id) ?>",
                    dataType: "json",
                    type: "POST",
                    data: {
					    changes: change
					}, //contains changed cells' data
                    success: function (data) {
                      $console.text('Autosaved works with (' + change[0] + ' cell' + (change.length > 1 ? 's' : '') + ')');
                      autosaveNotification = setTimeout(function () {
                        $console.text('Changes will be autosaved');
						
                      }, 5000);
                    }
                  });
				  
                }
              }
            });
            var handsontable_local = $container3.data('handsontable');
			 $parent3.find('button[name=load3]').click(function () {
              $.ajax({
                url: "<?php echo url_for('businessplan/loadlocal?id='.$id) ?>",
                dataType: 'json',
                type: 'GET',
                 success: function (result2) {
                  var data = [], row;
				   var selection;
                   selection = $container3.handsontable('getSelected');
				  var i = 0 ;
                  for (i = 0, ilen = result2.local.length; i < ilen; i++) {
                    row = [];
				   // row[0] = res.costs[i].id;
                     row[0] = result2.local[i].year1;
                    row[1] = result2.local[i].year2;
                    row[2] = result2.local[i].year3;
					row[3] = result2.local[i].year4;
					row[4] = result2.local[i].year5;
                   
					////
					// alert();
                    data[result2.local[i].id - result2.local[0].id ] = row;
					//alert(data[result1.financial[i].id - result1.financial[0].id ]);
					//alert(data[res.costs[].id ]) ;
					//alert(data[res.costs[i].id - res.costs[0].id ]);
                  }
				 
                  handsontable_local.loadData(data);
				 
				//  alert(handsontable('getData')[selection[0]]);
                  $console.text('Data loaded');
                }
              });
            }).click(); //execute immediately

          

            $parent3.find('input[name=autosave3]').click(function () {
              if ($(this).is(':checked')) {
                $console.text('Changes will be autosaved');
				
              }
              else {
                $console.text('Changes will not be autosaved');
              }
            });
		  </script>
		  
		  <script>
		   var $container4 = $("#foreign_jobs");
            var $console4 = $("#foreign_console");
            var $parent4 = $container4.parent();
            var autosaveNotification;
            $container4.handsontable({
              startRows: 0,
              startCols: 0,
              rowHeaders: ['<?php echo __('Top Management\t'); echo __("($currency)");?>', '<?php echo __('Technical/ Professional\t'); echo __("($currency)"); ?>', '<?php echo __('Skilled Labour\t'); echo __("($currency)"); ?>', '<?php echo __('Others(manpower,casual etc)\t'); echo __("($currency)"); ?>'],
              colHeaders: ['<?php echo __('Year 1') ?>', '<?php echo __('Year 2') ?>', '<?php echo __('Year 3') ?>' , '<?php echo __('Year 4') ?>', '<?php echo __('Year 5') ?>'],
              minSpareCols: 0,
              minSpareRows: false,
              contextMenu: true,
              onChange: function (change, source) {
                if (source === 'loadData') {
                  return; //don't save this change
                }
                if ($parent4.find('input[name=autosave4]').is(':checked')) {
                  clearTimeout(autosaveNotification);
                  $.ajax({
                    url: "<?php echo url_for('businessplan/saveforeign?id='.$id) ?>",
                    dataType: "json",
                    type: "POST",
                    data: {
					    changes: change
					}, //contains changed cells' data
                    success: function (data) {
                      $console4.text('Autosaved works with (' + change[0] + ' cell' + (change.length > 1 ? 's' : '') + ')');
                      autosaveNotification = setTimeout(function () {
                        $console4.text('Changes will be autosaved');
						
                      }, 5000);
                    }
                  });
				  
                }
              }
            });
            var handsontable_foreign= $container4.data('handsontable');
			 $parent4.find('button[name=load4]').click(function () {
              $.ajax({
                url: "<?php echo url_for('businessplan/loadforeign?id='.$id) ?>",
                dataType: 'json',
                type: 'GET',
                 success: function (result3) {
                  var data = [], row;
				   var selection;
                   selection = $container4.handsontable('getSelected');
				  var i = 0 ;
                  for (i = 0, ilen = result3.foreign.length; i < ilen; i++) {
                    row = [];
				   // row[0] = res.costs[i].id;
                     row[0] = result3.foreign[i].year1;
                    row[1] = result3.foreign[i].year2;
                    row[2] = result3.foreign[i].year3;
					row[3] = result3.foreign[i].year4;
					row[4] = result3.foreign[i].year5;
                   
					////
					// alert();
                    data[result3.foreign[i].id - result3.foreign[0].id ] = row;
					//alert(data[result1.financial[i].id - result1.financial[0].id ]);
					//alert(data[res.costs[].id ]) ;
					//alert(data[res.costs[i].id - res.costs[0].id ]);
                  }
				 
                  handsontable_foreign.loadData(data);
				 
				//  alert(handsontable('getData')[selection[0]]);
                  $console.text('Data loaded');
                }
              });
            }).click(); //execute immediately

          

            $parent4.find('input[name=autosave4]').click(function () {
              if ($(this).is(':checked')) {
                $console.text('Changes will be autosaved');
				
              }
              else {
                $console.text('Changes will not be autosaved');
              }
            });
		  </script>
		  
		  <script>
		    var $container5 = $("#performance");
            var $console5 = $("#performance_console");
            var $parent5 = $container5.parent();
            var autosaveNotification;
            $container5.handsontable({
              startRows: 0,
              startCols: 0,
              rowHeaders: ['<?php echo __('Sales/Income\t'); echo __("($currency)");?>', '<?php echo __('Total cost of Sales\t'); echo __("($currency)"); ?>', '<?php echo __('Gross Profit\t'); echo __("($currency)");?>', '<?php echo __('Total Indirect Expense\t'); echo __("($currency)"); ?>', '<?php echo __('Profit before Tax\t'); echo __("($currency)"); ?>', '<?php echo __('Tax Expense(30%)\t'); echo __("($currency)");?>','<?php echo __('Net Profit\t'); echo __("($currency)"); ?>'],
              colHeaders: ['<?php echo __('Year 1') ?>', '<?php echo __('Year 2') ?>', '<?php echo __('Year 3') ?>' , '<?php echo __('Year 4') ?>', '<?php echo __('Year 5') ?>'],
              minSpareCols: 0,
              minSpareRows: false,
              contextMenu: true,
              onChange: function (change, source) {
                if (source === 'loadData') {
                  return; //don't save this change
                }
                if ($parent5.find('input[name=autosave5]').is(':checked')) {
                  clearTimeout(autosaveNotification);
                  $.ajax({
                    url: "<?php echo url_for('businessplan/saveperformance?id='.$id) ?>",
                    dataType: "json",
                    type: "POST",
                    data: {
					    changes: change
					}, //contains changed cells' data
                    success: function (data) {
                      $console5.text('Autosaved works with (' + change[0] + ' cell' + (change.length > 1 ? 's' : '') + ')');
                      autosaveNotification = setTimeout(function () {
                        $console5.text('Changes will be autosaved');
						
                      }, 5000);
                    }
                  });
				  
                }
              }
            });
            var handsontable_performance = $container5.data('handsontable');
			 $parent5.find('button[name=load5]').click(function () {
              $.ajax({
                url: "<?php echo url_for('businessplan/loadperformance?id='.$id) ?>",
                dataType: 'json',
                type: 'GET',
                 success: function (result4) {
                  var data = [], row;
				   var selection;
                   selection = $container5.handsontable('getSelected');
				  var i = 0 ;
                  for (i = 0, ilen = result4.performance.length; i < ilen; i++) {
                    row = [];
				   // row[0] = res.costs[i].id;
                     row[0] = result4.performance[i].year1;
                    row[1] = result4.performance[i].year2;
                    row[2] = result4.performance[i].year3;
					row[3] = result4.performance[i].year4;
					row[4] = result4.performance[i].year5;
                   
					////
					// alert();
                    data[result4.performance[i].id - result4.performance[0].id ] = row;
					//alert(data[result1.financial[i].id - result1.financial[0].id ]);
					//alert(data[res.costs[].id ]) ;
					//alert(data[res.costs[i].id - res.costs[0].id ]);
                  }
				 
                  handsontable_performance.loadData(data);
				 
				//  alert(handsontable('getData')[selection[0]]);
                  $console.text('Data loaded');
                }
              });
            }).click(); //execute immediately

          

            $parent5.find('input[name=autosave5]').click(function () {
              if ($(this).is(':checked')) {
                $console.text('Changes will be autosaved');
				
              }
              else {
                $console.text('Changes will not be autosaved');
              }
            });
		  </script>
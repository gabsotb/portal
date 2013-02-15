
<div id="page" class="dashboard">
    <div class="row-fluid">
						<div class="span6">
							<!-- BEGIN RECENT ORDERS PORTLET-->
							<div class="widget">
								<div class="widget-title">
									<h4>Confirm Administrative payment for businessName Certificate Processing </h4>						
								</div>
								<div class="widget-body">
							     <form action="<?php echo url_for('dashboard/payment?business='.$validate) ?>" method="POST">
								  <table>
									<?php echo $form ?>
									
									<tr>
									  <td colspan="2">
										<input type="submit" />
									  </td>
									</tr>
								  </table>
								</form>
								</div>
							</div>
							<!-- END RECENT ORDERS PORTLET-->
						</div>
	</div>



</div>
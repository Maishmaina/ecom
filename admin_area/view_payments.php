<?php 
 if (!isset($_SESSION['admin_email'])) {
 	echo "<script>window.open('login.php','_self');</script>";
 }else{


?>
<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li class="active">
			<i class="fa fa-tachometer-alt fa-1x"></i>&nbsp;Dashboard/ View Payment.
			</li>
		</ol>
	</div><!--end row dashboard-->
</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">
						<i class="fas fa-eye"></i>&nbsp; View Payments
					</h3>
				</div><!--this is the end of the header-->
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered table-hover table-striped">
							<thead>
								<tr>
									<th>Payment No:</th>
									<th>Invoice No:</th>
									<th>Amount Paid:</th>
									<th>Payment Method:</th>
									<th>Reference No:</th>
									<th>Payment Code</th>
									<th>Payment Date</th>
									<th>Delete Payment</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$i=0;
								$get_payments = "select * from payments"; 
								$run_payment = mysqli_query($con,$get_payments);
								while ($row_payment = mysqli_fetch_array($run_payment)) {
								$payment_id =$row_payment['payment_id'];
								$invoice_no =$row_payment['invoice_no'];
								$amount =$row_payment['amount'];
								$payment_mode =$row_payment['payment_mode'];
								$ref_no =$row_payment['ref_no'];
								$code =$row_payment['code'];
								$payment_date =$row_payment['payment_date'];
								$i++;
								?>
								<tr>
									<td><?php echo $i;?></td>
									<td bgcolor="#0BF1B3"><?php echo $invoice_no;?></td>
									<td>Kshs <?php echo $amount;?></td>
									<td><?php echo $payment_mode;?></td>
									<td><?php echo $ref_no;?></td>
									<td><?php echo $code;?></td>
									<td><?php echo $payment_date;?></td>
									<td>
										<a href="index.php?payment_delete=<?php echo $payment_id?>">
										<i class="fas fa-trash-alt"></i>&nbsp;Delete
									</a>
									</td>
								</tr>
							<?php }?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php }?>
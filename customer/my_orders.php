<div class="text-center">
	<h1>My Order</h1>
	<p class="lead">Your Order in one phase</p>
	<p class="text-muted">WE Offer 24/7 technical Support<a href="../contact.php">For query Contact Us.</a>The Best online shop</p>
</div>
<hr>
<div class="table-responsive">
	<table class="table table-borderd table-hover">
		<thead>
			<tr>
				<th>ON:</th>
				<th>Due Account</th>
				<th>Invoince No.</th>
				<th>Qty</th>
				<th>Size</th>
				<th>Order Date</th>
				<th>Paind/Unpaind</th>
				<th>Status</th>

			</tr>
		</thead>
		<tbody>
			<?php
       $customer_session = $_SESSION['customer_email'];
       $get_customer = "select * from customers where customer_email='$customer_session'";
       $run_customer = mysqli_query($con,$get_customer);
       $row_customer = mysqli_fetch_array($run_customer);
       $customer_id=$row_customer['customer_id'];
       $get_orders = "select * from customer_orders where customer_id='$customer_id'";
       $run_orders = mysqli_query($con,$get_orders);
       $i =0;
       while ($row_orders = mysqli_fetch_array($run_orders)) {  
       $order_id = $row_orders['order_id'];
       $due_amount = $row_orders['due_amount'];
       $invoice_no = $row_orders['invoice_no'];
       $qty= $row_orders['qty'];
       $size = $row_orders['size'];
       $order_date =substr($row_orders['order_date'],0,11);
       $order_status = $row_orders['order_status'];
       $i++;
       if ($order_status=='Pending') {
       	$order_status="Unpaid";
       }else{ 
       	$order_status = "Paid";
       }
			?>
			<tr>
				<th>#<?php echo $i;?></th>
				<td>Ksh<?php echo $due_amount;?></td>
				<td><?php echo $invoice_no;?></td>
				<td><?php echo $qty;?></td>
				<td><?php echo $size;?></td>
				<td><?php echo $order_date;?></td>
				<td><?php echo $order_status;?></td>
				<td>
					<a href="confirm.php?order_id=<?php echo $order_id?>" target="blank" class="btn btn-success"> Confirm if Paid</a>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
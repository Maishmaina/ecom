<?php 
 if (!isset($_SESSION['admin_email'])) {
 	echo "<script>window.open('login.php','_self');</script>";
 }else{


?>
<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li class="active">
			<i class="fa fa-tachometer-alt fa-1x"></i>&nbsp;Dashboard/ View Orders.
			</li>
		</ol>
	</div>
</div><!--this end of the row-->
<div class="row">
<div class="col-md-12">
 <div class="card">
 	<div class="card-header">
				<h3 class="card-title">
					<i class="fas fa-eye"></i>&nbsp; View Orders
				</h3>
			</div><!--end of the header-->
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
								<th>Order No:</th>
								<th>Customer Email:</th>
								<th>Invoice No:</th>
								<th>Product Title:</th>
								<th>Product Qty:</th>
								<th>Product Size:</th>
								<th>Order Date:</th>
								<th>Total Amount:</th>
								<th>Order Status:</th>
								<th>Delete Order:</th>
							</tr>
						</thead>
						<tbody>
							<?php

                   $i = 0;
                   $get_orders= "select * from pending_orders";
                   $run_orders = mysqli_query($con,$get_orders);
                   while ($row_orders=mysqli_fetch_array($run_orders)) {
                   	$order_id = $row_orders['order_id'];
                   	$c_id = $row_orders['customer_id'];
                   	$invoice_no = $row_orders['invoice_no'];
                   	$product_id = $row_orders['product_id'];
                   	$qty = $row_orders['qty'];
                   	$size = $row_orders['size'];
                   	$order_status = $row_orders['order_status'];
                   	
                   	$get_products = "select * from products where product_id='$product_id'";
                   	$run_product = mysqli_query($con,$get_products);
                   	$row_products = mysqli_fetch_array($run_product);
                   	$product_title = $row_products['product_title'];
                   	$i++;
                   
							?>
							<tr>
								<td><?php echo $i;?></td>
								<td><?php 
                                $get_customer = "select * from customers where customer_id = '$c_id' ";
                                $run_customer = mysqli_query($con,$get_customer);
                                $row_customer= mysqli_fetch_array($run_customer);
                                $customer_email = $row_customer['customer_email'];
                                echo $customer_email;
								?></td>
								<td bgcolor="#0AF5DC"><?php echo $invoice_no;?></td>
								<td><?php echo $product_title;?></td>
								<td><?php echo $qty;?></td>
								<td><?php echo $size;?></td>
								<td>
									
									<?php
									$get_customer_order = "select * from customer_orders where order_id = '$order_id'";
									$run_customer_order = mysqli_query($con,$get_customer_order);
									$row_customer_order = mysqli_fetch_array($run_customer_order);
									$order_date = $row_customer_order['order_date'];
									$due_amount = $row_customer_order['due_amount'];
									echo $order_date;
									?>
								</td>
								<td>Kshs <?php echo $due_amount;?></td>
								<td>
									<?php
									if ($order_status=='Pending') {
										echo $order_status = 'pending';
									}else{
										echo $order_status='Complete';
									}
									?>
								</td>
								<td>
									<a href="index.php?order_delete=<?php echo $order_id?>">
										<i class="fas fa-trash-alt"></i>&nbsp;Delete
									</a>
								</td>
							</tr>
						<?php }?>
						</tbody>
					</table>
				</div>
			</div><!--end of the card-body-->
 </div>
</div>
</div>
<?php }?>
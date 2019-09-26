<?php 
 if (!isset($_SESSION['admin_email'])) {
 	echo "<script>window.open('login.php','_self');</script>";
 }else{


?>
<div class="row">
	<div class="col-md-12">
		<h1 class="page-header">Dashboard</h1>
		<ol class="breadcrumb">
			<li class="active">
				<i class="fa fa-tachometer-alt fa-1x"></i> dashboard
			</li>
		</ol>
	</div><!--end of md-12-->
</div>  
<div class="row">
	<div class="col-lg-3 col-md-6">
		<div class="card">
			<div class="card-header text-white bg-primary">
				
			<div class="row">
				<div class="col-xs-3">
					<i class="fa fa-tasks fa-4x"></i>
				</div>
				<div class="col-xs-9 ml-auto">
					<div class="huge"><?php echo $count_products;?></div>
					<div>Products</div>
				</div><!--text at the right-->
			</div>
		</div>
		<a href="index.php?view_products">
			<div class="card-footer">
				<span class="float-left">View Details</span>
				<span class="float-right"><i class="fa fa-arrow-circle-right"></i></span>
				<div class="clearfix"></div>
			</div>
		</a>
		</div>
	</div><!--end of the single item-->
	<div class="col-lg-3 col-md-6">
		<div class="card">
			<div class="card-header text-white bg-success">
				
			<div class="row">
				<div class="col-xs-3">
					<i class="fa fa-comments fa-4x"></i>
				</div>
				<div class="col-xs-9 ml-auto">
					<div class="huge"><?php echo $count_customers;?></div>
					<div>Customers</div>
				</div><!--text at the right-->
			</div>
		</div>
		<a href="index.php?view_customers">
			<div class="card-footer">
				<span class="float-left text-success">View Details</span>
				<span class="float-right text-success"><i class="fa fa-arrow-circle-right"></i></span>
				<div class="clearfix"></div>
			</div>
		</a>
		</div>
	</div><!--end of the single item-->
	<div class="col-lg-3 col-md-6">
		<div class="card">
			<div class="card-header text-white bg-danger">
				
			<div class="row">
				<div class="col-xs-3">
					<i class="fa fa-shopping-cart fa-4x"></i>
				</div>
				<div class="col-xs-9 ml-auto">
					<div class="huge"><?php echo $count_p_categories;?></div>
					<div>Categories</div>
				</div><!--text at the right-->
			</div>
		</div>
		<a href="index.php?view_p_cats">
			<div class="card-footer">
				<span class="float-left text-danger">View Details</span>
				<span class="float-right text-danger"><i class="fa fa-arrow-circle-right"></i></span>
				<div class="clearfix"></div>
			</div>
		</a>
		</div>
	</div><!--end of the single item-->
	<div class="col-lg-3 col-md-6">
		<div class="card">
			<div class="card-header text-white bg-info">
				
			<div class="row">
				<div class="col-xs-3">
					<i class="fa fa-crosshairs fa-4x"></i>
				</div>
				<div class="col-xs-9 ml-auto">
					<div class="huge"><?php echo $count_pedding_orders;?></div>
					<div>Order</div>
				</div><!--text at the right-->
			</div>
		</div>
		<a href="index.php?view_orders">
			<div class="card-footer">
				<span class="float-left text-info">View Details</span>
				<span class="float-right text-info"><i class="fa fa-arrow-circle-right"></i></span>
				<div class="clearfix"></div>
			</div>
		</a>
		</div>
	</div><!--end of the single item-->
</div><!--end of the row cards-->
<div class="row">
	<div class="col-lg-9">
		<div class="card bg-light mt-1">
			<div class="card-header">
				<h3 class="card-title">
					<i class="fa fa-plus-circle"></i>&nbsp;New Order
				</h3>
			</div><!--end of the header-->
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th>Ord. No.</th>
								<th>C. Email</th>
								<th>Inv. No.</th>
								<th>P. ID.</th>
								<th>P. Qty</th>
								<th> P. Size</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php 
                             $i=0;
                             $get_order ="select * from pending_orders order by 1 DESC LIMIT 0,5";
                             $run_order = mysqli_query($con,$get_order);
                             while ($row_order = mysqli_fetch_array($run_order)) {
                        $order_id =$row_order['order_id'];  
/*result error */       $c_id =$row_order['customer_id'];
                        $invoice_no =$row_order['invoice_no'];
                        $qty =$row_order['qty']; 
                        $size =$row_order['size'];
                        $product_id =$row_order['product_id'];
                        $order_status =$row_order['order_status']; 
                        $i++; 

							?>
							<tr>
								<td>#<?php echo $i;?></td>
								<td><?php 
                        $get_customer = "select * from customers where customer_id='$c_id'";
                        $run_customer = mysqli_query($con,$get_customer);
                        $row_customer =mysqli_fetch_array($run_customer);
                        $customer_email=$row_customer['customer_email'];
                        echo $customer_email;
								 ?></td>
								<td><?php echo $invoice_no;?></td>
								<td><?php echo $product_id;?></td>
								<td><?php echo $qty; ?></td>
								<td><?php echo $size; ?></td>
								<td><?php 
                                if($order_status=='Pending'){
                                	echo $order_status='Pending';
                                }else{
                                	echo $order_status='Complete';
                                }
								 ?></td>
                                
							</tr>
						<?php }?>
						</tbody>
					</table>
				</div><!--end of the table-->
				<div class="text-right">
					<a href="index.php?view_orders" class="float-right"> View All <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
		</div>
	</div><!--end col-9-->
	<div class="col-md-3">
		<div class="card">
			<div class="card-body">
				<div class="thumb-info mb-md">
					<img class="img-fluid rounded" src="admin_images/<?php echo $admin_image;?>" alt="admin_no_found">
					<div class="thumb-info-title">
						<span class="thumb-info-inner"><?php echo $admin_name;?></span>
						<span class="thumb-info-inner"><?php echo $admin_job;?></span>
					</div>
				</div>
				<div class="mb-md">
					<div class="widget-content-expanded">
						<i class="fa fa-user"></i><span>E.</span><?php echo $admin_email;?><br/>
						<i class="fa fa-user"></i><span>C.</span><?php echo $admin_county;?><br/>
						<i class="fa fa-user"></i><span>Ct.</span><?php echo $admin_contact;?> <br/>
					</div>
					<hr class="dotted short">
					<h5 class="text-muted">About</h5>
					<p>
				<?php echo $admin_about;?>
					</p>
				</div>
			</div>
		</div>
	</div><!--end of col-4-->
</div><!--thrid row end-->
 <?php }?>
<?php 
 if (!isset($_SESSION['admin_email'])) {
 	echo "<script>window.open('login.php','_self');</script>";
 }else{


?>
<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li class="active">
			<i class="fa fa-tachometer-alt fa-1x"></i>&nbsp;Dashboard/ View Customers.
			</li>
		</ol>
	</div>
</div><!--this end of the row-->
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">
					<i class="fas fa-eye"></i>&nbsp; View Customers
				</h3>
			</div><!--end of the header-->
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped table-hover table-bordered">
						<thead>
							<tr>
								<th>Customer No:</th>
								<th>Customer Name:</th>
								<th>Customer Email:</th>
								<th>Customer Image:</th>
								<th>Customer County:</th>
								<th>Customer City:</th>
								<th>Customer Phone:</th>
								<th>Customer Delete:</th>
							</tr>
						</thead>
						<tbody>
							<?php 
                  $i=0;
                  $get_c="select * from customers";
                  $run_c=mysqli_query($con,$get_c);
                  while ($row_c=mysqli_fetch_array($run_c)) {
                  	$c_id = $row_c['customer_id'];
                  	$c_name = $row_c['customer_name'];
                  	$c_email = $row_c['customer_email'];
                  	$c_image = $row_c['customer_image'];
                  	$c_county = $row_c['customer_county'];
                  	$c_city = $row_c['customer_city'];
                  	$c_contact = $row_c['customer_contact'];
                  	$i++;
                  
							?>
						<tr>
							<td><?php echo $i;?></td>
							<td><?php echo $c_name;?></td>
							<td><?php echo $c_email;?></td>
							<td><img src="../customer/customer_image/<?php echo $c_image;?>" alt="" style="height: 50px; width: 50px;"
							></td>
							<td><?php echo $c_county;?></td>
							<td><?php echo $c_city;?></td>
							<td><?php echo $c_contact;?></td>
							<td>
								<a href="index.php?customer_delete=<?php echo $c_id;?>" class="text-danger">
									<i class="fas fa-trash-alt"></i>&nbsp;Delete</a>
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
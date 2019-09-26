<?php 
 if (!isset($_SESSION['admin_email'])) {
 	echo "<script>window.open('login.php','_self');</script>";
 }else{


?>

<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="active">
				<i class="fa fa-tachometer-alt fa-1x"></i>Dashboard > <span class="text-danger"> View Products</span>
			</li>
		</ol>
	</div>

</div><!--end of the row  1st-->
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">
					<i class="fab fa-product-hunt"></i>View Products
				</h3>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead class="bg-success text-light">
							<tr>
								<th>Product ID</th>
								<th>Product Title</th>
								<th>Product Image</th>
								<th>Product Price</th>
								<th>Product Sold</th>
								<th>Product Keywords</th>
								<th>Product Date</th>
								<th>Product Delete</th>
								<th>Product Edit</th>
							</tr>
						</thead>
						<tbody>
							<?php
                        $i = 0;
                        $get_pro = "select * from products where status='product'";
                        $run_pro = mysqli_query($con,$get_pro);
                        while ($row_pro = mysqli_fetch_array($run_pro)) {
                        	$pro_id = $row_pro['product_id'];
                        	$pro_title = $row_pro['product_title'];
                        	$pro_image = $row_pro['product_img1'];
                        	$pro_price = $row_pro['product_price'];
                        	$pro_keywords = $row_pro['product_keyword'];
                        	$pro_date = $row_pro['data'];
                        	$i++;
                        
							?>
        <tr>
        	<td><?php echo $i;?></td>
        	<td><?php echo $pro_title;?></td>
        	<td><img src="products_imges/<?php echo $pro_image;?>" style="height: 50px; width: 50px"></td>
        	<td>Kshs <?php  echo $pro_price;?></td>
        	<td><?php
        $get_sold = "select * from pending_orders where product_id='$pro_id'";
        $run_sold=mysqli_query($con,$get_sold);
        $count = mysqli_num_rows($run_sold);
        echo $count;
        	?></td>
        	<td><?php echo $pro_keywords;?></td>
        	<td><?php echo $pro_date;?></td>
        	<td>
        		<a class="text-danger" href="index.php?delete_product=<?php echo $pro_id?>"><i class="fas fa-trash"></i>Delete
        		
        	</a>
        	</td>
        	<td>
        		<a class="text-info" href="index.php?edit_product=<?php echo $pro_id?>"><i class="fas fa-edit"></i>Edit
        		
        	</a>
        	</td>
        </tr>
						<?php }?>
						</tbody>
					</table>
				</div><!--table div end-->
			</div>
		</div>
	</div>
</div><!--2ed row end-->









<?php }?>
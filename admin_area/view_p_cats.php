<?php 
 if (!isset($_SESSION['admin_email'])) {
 	echo "<script>window.open('login.php','_self');</script>";
 }else{


?>
<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li class="active">
				<i class="fa fa-tachometer-alt fa-1x"></i>&nbsp;Dashboard/ View Products Category.
			</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">
					<i class="fas fa-money-bill-alt"></i>&nbsp;View Products Categories
				</h3>
			</div><!--end heading-->
			<div class="card-body">
				<div class="table-responsive">
					<table class=" table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th>Product Category ID</th>
								<th>Product Category Title</th>
								<th>Edit Product Categoty</th>
								<th>Delete Product Category</th>
							</tr>
						</thead>
						<tbody>
							<?php
                           $i=0;
                           $get_p_cats = "select * from product_categories";
                           $run_p_cats = mysqli_query($con,$get_p_cats);
                           while ( $row_p_cats = mysqli_fetch_array($run_p_cats)) {
                           $p_cat_id = $row_p_cats['p_cat_id'];
                           $p_cat_title = $row_p_cats['p_cat_title'];
                           
                           
                           $i++;
							?>
							<tr>
								<td><?php echo $i;?></td>
								<td><?php echo $p_cat_title;?></td>
								<td>
									<a href="index.php?edit_p_cat=<?php echo $p_cat_id;?>" class="text-success">
									<i class="fas fa-edit"></i>&nbsp; Edit</a>
								</td>
								<td>
								<a href="index.php?delete_p_cat=<?php echo $p_cat_id;?>" class="text-danger">
									<i class="fas fa-trash-alt"></i>&nbsp; Delete</a>	
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
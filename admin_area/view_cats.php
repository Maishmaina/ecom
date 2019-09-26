<?php 
 if (!isset($_SESSION['admin_email'])) {
 	echo "<script>window.open('login.php','_self');</script>";
 }else{


?>
<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li class="active">
			<i class="fa fa-tachometer-alt fa-1x"></i>&nbsp;Dashboard/ View Category.
			</li>
		</ol>
	</div>
</div><!--this end of the row-->
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">
					<i class="fas fa-money-bill-alt"></i>&nbsp; View Category
				</h3>
			</div>
			<div class="card-body">
				<div class=" table table-responsive">
					<table class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
								<th>Category ID</th>
								<th>Category Title</th>
								<th> Delete Category </th>
								<th> Edit Category</th>
							</tr>
						</thead>
						<tbody>
							<?php
               $i=0;
               $get_cats ="select * from categories";
               $run_cats = mysqli_query($con,$get_cats);
               while ($row_cats = mysqli_fetch_array($run_cats)) {
               	$cat_id = $row_cats['cat_id'];
               	$cat_title = $row_cats['cat_title'];
               	$i++;         	
							?>
							<tr>
								<td><?php echo $cat_id;?></td>
								<td><?php echo $cat_title;?></td>
							<td>
								<a href="index.php?delete_cat=<?php echo $cat_id;?>" class="text-danger">
									<i class="fas fa-trash-alt"></i>&nbsp;Delete</a>   
							</td>
							<td>
							<a href="index.php?edit_cat=<?php echo $cat_id;?>" class="text-success">
									<i class="fas fa-edit"></i>&nbsp; Edit</a></td>
							</tr>

						<?php }?>
						</tbody>
					</table>
				</div>
			</div><!--end of card-body-->
		</div>
	</div>
</div><!--thi is the 2nd row-->
<?php }?>
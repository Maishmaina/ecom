<?php 
 if (!isset($_SESSION['admin_email'])) {
 	echo "<script>window.open('login.php','_self');</script>";
 }else{


?>

<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="active">
				<i class="fa fa-tachometer-alt fa-1x"></i>Dashboard > <span class="text-danger"> View Relations</span>
			</li>
		</ol>
	</div>

</div><!--end of the row  1st-->
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">
					<i class="fas fa-yin-yang"></i>View Relations
				</h3>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead class="text-light" style="background: #A2C2BB;">
							<tr>
								<th>Relation ID</th>
								<th>Relation Title</th>
								<th>Relation Product</th>
								<th>Relation Bundle</th>
								<th>Delete Relation</th>
								<th>Edit Relation</th>
							</tr>
						</thead>
						<tbody>
							<?php
$i=0;
$get_rel="select * from bundle_product_relation";
$run_rel=mysqli_query($con,$get_rel);
while ($row_rel=mysqli_fetch_array($run_rel)) {
	$rel_id=$row_rel['rel_id'];
	$rel_title=$row_rel['rel_title'];
	$product_id=$row_rel['product_id'];
	$bundle_id=$row_rel['bundle_id'];
	$get_p="select * from products where product_id='$product_id'";
	$run_p=mysqli_query($con,$get_p);
	$row_p=mysqli_fetch_array($run_p);
	$p_title=$row_p['product_title'];

	$get_b="select * from products where product_id='$bundle_id'";
	$run_b=mysqli_query($con,$get_b);
	$row_b=mysqli_fetch_array($run_b);
	$b_title=$row_b['product_title'];
	$i++;
	

							?>
      
       	<tr>
       		<td><?php echo $i;?></td>
       		<td><?php echo $rel_title;?></td>
       		<td><?php echo $p_title;?></td>
       		<td><?php echo $b_title;?></td>
       		<td>
        		<a class="text-danger" href="index.php?delete_rel=<?php echo $rel_id?>"><i class="fas fa-trash"></i>Delete
        		
        	</a>
        	</td>
        	<td>
        		<a class="text-info" href="index.php?edit_rel=<?php echo $rel_id?>"><i class="fas fa-edit"></i>Edit
        		
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
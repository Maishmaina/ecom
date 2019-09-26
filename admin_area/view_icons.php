<?php
if (!isset($_SESSION['admin_email'])) {
 	echo "<script>window.open('login.php','_self');</script>";
 }else{

 
?>
<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li class="active">
			<i class="fa fa-tachometer-alt fa-1x"></i>&nbsp;Dashboard/ View Icons.
			</li>
		</ol>
	</div>
</div><!--end of the first row-->
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">
					<i class="fa fa-bullseye fa-spin" style="font-size:30px;"></i>&nbsp; View Icons
				</h3>
			</div><!--emd of the header-->
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
					<thead style="background: #09E9F7;">
						<tr>
							<th>Icon #</th>
							<th>Icon Title</th>
							<th>Icon Product</th>
							<th>Icon Image</th>
							<th>Delete Icon</th>
							<th>Edit Edit</th>
						</tr>
					</thead>
					<tbody>
						<?php

 $i=0;
 $get_icon="select * from icons";
 $run_icons = mysqli_query($con,$get_icon);
 while ($row_icons = mysqli_fetch_array($run_icons)) {
$icon_id = $row_icons['icon_id'];
$product_id = $row_icons['icon_product'];
$icon_title = $row_icons['icon_title'];
$icon_image = $row_icons['icon_image'];
$get_p="select * from products where product_id='$product_id'";
$run_p=mysqli_query($con,$get_p);
$row_p=mysqli_fetch_array($run_p);
$p_title=$row_p['product_title'];
$i++;

						?>
						<tr>
							<td><?php echo $i;?></td>
							<td><?php echo $icon_title;?></td>
							<td><?php echo $p_title;?></td>
							<td><img src="icon_images/<?php echo $icon_image;?>" width="50px" height="50px"></td>
							<td>
        		<a class="text-danger" href="index.php?delete_icon=<?php echo $icon_id?>"><i class="fas fa-trash"></i>Delete
        		
        	</a>
        	</td>
        	<td>
        		<a class="text-info" href="index.php?edit_icon=<?php echo $icon_id?>"><i class="fas fa-edit"></i>Edit
        		
        	</a>
        	</td>
						</tr>

					<?php } ?>
					</tbody>	
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<?php }?>
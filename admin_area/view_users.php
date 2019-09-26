<?php 
 if (!isset($_SESSION['admin_email'])) {
 	echo "<script>window.open('login.php','_self');</script>";
 }else{


?>
<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li class="active">
			<i class="fa fa-tachometer-alt fa-1x"></i>&nbsp;Dashboard/ View Users.
			</li>
		</ol>
	</div><!--end row dashboard-->
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
					<h3 class="card-title">
						<i class="fas fa-eye"></i>&nbsp; View Users
					</h3>
				</div><!--this is the end of the header-->
				<div class="card-body">
					<div class="table responsive">
						<table class="table table-bordered table-hover table-striped">
							<thead>
								<tr>
									<th>Admin Name:</th>
									<th>Admin Email:</th>
									<th>Admin Image:</th>
									<th>Admin County:</th>
									<th>Admin Job:</th>
									<th>Delete Admin:</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$get_admin ="select * from admins";
								$run_admin = mysqli_query($con,$get_admin);
								while ($row_admin = mysqli_fetch_array($run_admin)) {
									$admin_id = $row_admin['admin_id'];
									$admin_name = $row_admin['admin_name'];
									$admin_email = $row_admin['admin_email'];
									$admin_image = $row_admin['admin_image'];
									$admin_county = $row_admin['admin_county'];
									$admin_job = $row_admin['admin_job'];							
								
								?>
								<tr>
									<td><?php echo $admin_name;?></td>
									<td><?php echo $admin_email;?></td>
									<td>
								<img src="admin_images/<?php echo $admin_image; ?>" alt="" style="height: 50px; width: 50px;">
									</td>
									<td><?php echo $admin_county;?></td>
									<td><?php echo $admin_job;?></td>
									<td>
										<a href="index.php?user_delete=<?php echo $admin_id?>">
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
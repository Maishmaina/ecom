<?php 
 if (!isset($_SESSION['admin_email'])) {
 	echo "<script>window.open('login.php','_self');</script>";
 }else{


?>
<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li class="active">
			<i class="fa fa-tachometer-alt fa-1x"></i>&nbsp;Dashboard/ View Manufacturers.
			</li>
		</ol>
	</div>
</div><!--end of the first row-->
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">
					<i class="fas fa-eye"></i>&nbsp; View Manufacturers
				</h3>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>Manufacturer #</th>
								<th>Manufacturer Title</th>
								<th> Delete Manufacturer</th>
                                <th>Edit Manufacturer</th>

							</tr>
						</thead>
						<tbody>
							<?php
                          $i=0;

                          $get_manufacturer = "select * from manufacturers";
                          $run_manufacturer=mysqli_query($con,$get_manufacturer);
                          while ($row_manufacturer = mysqli_fetch_array($run_manufacturer)) {
                          	$manufacturer_id=$row_manufacturer['manufacturer_id'];
                          	$manufacturer_title=$row_manufacturer['manufacturer_title'];
                          	$i++;
                          
							?>
							<tr>
								<td><?php echo $i;?></td>
								<td><?php echo $manufacturer_title;?></td>
								<td>
									<a class="text-danger" href="index.php?delete_manufacturer=<?php echo $manufacturer_id;?>">
										<i class="fas fa-trash-alt"></i>&nbsp;Delete
									</a>
								</td>
								<td>
									<a class="text-info" href="index.php?edit_manufacturer=<?php echo $manufacturer_id;?>">
										<i class="fas fa-edit"></i>&nbsp;Edit
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
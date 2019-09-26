<?php 
 if (!isset($_SESSION['admin_email'])) {
 	echo "<script>window.open('login.php','_self');</script>";
 }else{


?>

<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li class="active">
				<i class="fa fa-tachometer-alt fa-1x"></i>&nbsp;Dashboard/ View Services
			</li>
		</ol>
	</div><!--end col-md-12-->
</div><!--end of the row-->
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">
					<i class="fas fa-eye"></i>&nbsp;View Services
				</h3>
			</div>
			<div class="card-body row" >
	<?php
	 $get_services="select * from services";
$run_services=mysqli_query($con,$get_services);
while ($row_services=mysqli_fetch_array($run_services)) {
  $service_id=$row_services['service_id'];
  $service_title=$row_services['service_title'];
  $service_image=$row_services['service_image'];
  $service_desc=substr($row_services['service_desc'],0,140).' ...';
  $service_button=$row_services['service_button'];
  $service_url=$row_services['service_url'];
          ?>	
<div class="col-md-4">
<div class="card">
	<div class="card-header bg-info">
		<h4 class="card-title" align="center">
			<?php echo $service_title; ?>
		</h4>
	</div>
	<div class="card-body">
<img src="services_images/<?php echo $service_image; ?>" class="img-fluid  img-thumbnail">
<br>
<p><?php echo $service_desc; ?></p>
	</div>
	<div class="card-footer">
	<a class="btn btn-danger" href="index.php?delete_service=<?php echo $service_id; ?>"><i class="fas fa-trash-alt"></i>&nbsp;Delete</a>	
<a class="btn btn-warning float-right" href="index.php?edit_service=<?php echo $service_id; ?>"><i class="fas fa-edit"></i>&nbsp;Edit</a>

	</div>
</div>	
</div>
          <?php }?>		
			</div>
		</div>
	</div>
</div>
<?php }?>
<?php 
 if (!isset($_SESSION['admin_email'])) {
 	echo "<script>window.open('login.php','_self');</script>";
 }else{


?>
<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-tachometer-alt fa-1x"></i>&nbsp;Dashboard/ Insert Service
			</li>
		</ol>
	</div><!--end col-md-12-->
</div><!--end of the row-->
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
			<h3 class="card-title">
				<i class="fas fa-money-bill-alt"></i>&nbsp;Insert Service
			</h3>
		</div><!--end of the header-->
		<div class="card-body" style="background: #D6CDCD;">
<form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
<div class="form-group row">
<label for="" class="col-md-3 control-label">Service Title:</label>	
<div class="col-md-6">
	<input type="text" name="service_title" class="form-control">
</div>	
	</div>	
	<div class="form-group row">
<label for="" class="col-md-3 control-label">Service Image:</label>	
<div class="col-md-6">
	<input type="file" name="service_image" class="form-control" required>
</div>	
	</div>
	<div class="form-group row">
<label for="" class="col-md-3 control-label">Service Descripton:</label>	
<div class="col-md-6">
	<textarea name="service_desc" class="form-control"></textarea>
</div>	
	</div>
	<div class="form-group row">
<label for="" class="col-md-3 control-label">Service Button:</label>	
<div class="col-md-6">
	<input type="text" name="service_button" class="form-control">
</div>	
	</div>
<div class="form-group row">
<label for="" class="col-md-3 control-label">Service Url:</label>	
<div class="col-md-6">
	<input type="url" name="service_url" class="form-control">
</div>	
	</div>	
	<div class="form-group row">
<label for="" class="col-md-3 control-label"></label>	
<div class="col-md-6">
	<input type="submit" name="submit" value="Insert Service" class=" btn btn-success form-control">
</div>	
	</div>	
			</form>
			</div>
		</div>
	</div>
</div>
<?php
 if (isset($_POST['submit'])) {
 	$service_title=$_POST['service_title'];
 	$service_desc=$_POST['service_desc'];
 	$service_button=$_POST['service_button'];
 	$service_url=$_POST['service_url'];
 	$service_image=$_FILES['service_image']['name'];
 	$tmp_image=$_FILES['service_image']['tmp_name'];
 	$sel_services="select * from services";

 	$run_services = mysqli_query($con,$sel_services);
 	$count= mysqli_num_rows($run_services);
 	if ($count==3) {
 		echo "<script>alert('Already Three services Inserted')</script>";
 		echo "<script>window.open('index.php?view_services','_self')</script>";
 	}else{
 		move_uploaded_file($tmp_image, "services_images/$service_image");
 $insert_service ="insert into services(service_title,service_image,service_desc,service_button, service_url) values('$service_title','$service_image','$service_desc','$service_button','$service_url')";
 	}
 	$run_services=mysqli_query($con,$insert_service);

if ($run_services) {
	echo "<script>alert('Service Inserted successfully')</script>";
	echo "<script>window.open('index.php?view_services','_self')</script>";
}
 }
?>

<?php }?>
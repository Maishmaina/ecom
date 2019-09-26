<?php 
 if (!isset($_SESSION['admin_email'])) {
 	echo "<script>window.open('login.php','_self');</script>";
 }else{


?>
<?php 
 if (isset($_GET['edit_service'])) {
 	$edit_id=$_GET['edit_service'];
    $get_services="select * from services where service_id='$edit_id'";
$run_services=mysqli_query($con,$get_services);
$row_services=mysqli_fetch_array($run_services);
  $service_id=$row_services['service_id'];
  $service_title=$row_services['service_title'];
  $service_image=$row_services['service_image'];
  $service_desc=$row_services['service_desc'];
  $service_button=$row_services['service_button'];
  $service_url=$row_services['service_url'];
  $new_s_image=$row_services['service_image'];
}
 
?>
<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-tachometer-alt fa-1x"></i>&nbsp;Dashboard/ Edit Service
			</li>
		</ol>
	</div><!--end col-md-12-->
</div><!--end of the row-->
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
			<h3 class="card-title">
				<i class="fas fa-money-bill-alt"></i>&nbsp;Edit Service
			</h3>
		</div><!--end of the header-->
<div class="card-body" style="background: #D6CDCD;">
<form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
<div class="form-group row">
<label for="" class="col-md-3 control-label">Service Title:</label>	
<div class="col-md-6">
	<input type="text" name="service_title" class="form-control" value="<?php echo $service_title; ?>">
</div>	
	</div>	
	<div class="form-group row">
<label for="" class="col-md-3 control-label">Service Image:</label>	
<div class="col-md-6">
	<input type="file" name="service_image" class="form-control">
 <br>
 <img src="services_images/<?php echo $service_image;?>" style=" width: 50px; height: 50px;">
</div>	
	</div>
	<div class="form-group row">
<label for="" class="col-md-3 control-label">Service Descripton:</label>	
<div class="col-md-6">
	<textarea name="service_desc" class="form-control">
		<?php echo $service_desc; ?>
	</textarea>
</div>	
	</div>
	<div class="form-group row">
<label for="" class="col-md-3 control-label">Service Button:</label>	
<div class="col-md-6">
	<input type="text" name="service_button" class="form-control" value="<?php echo $service_button; ?>">
</div>	
	</div>
<div class="form-group row">
<label for="" class="col-md-3 control-label">Service Url:</label>	
<div class="col-md-6">
	<input type="url" name="service_url" class="form-control" value="<?php echo $service_url?>">
</div>	
	</div>	
	<div class="form-group row">
<label for="" class="col-md-3 control-label"></label>	
<div class="col-md-6">
	<input type="submit" name="update" value="Update Service" class=" btn btn-success form-control">
</div>	
	</div>	
			</form>
			</div>
		</div>
	</div>
</div>
<?php
 if (isset($_POST['update'])) {
 	$service_title=$_POST['service_title'];
 	$service_desc=$_POST['service_desc'];
 	$service_button=$_POST['service_button'];
 	$service_url=$_POST['service_url'];
 	$service_image=$_FILES['service_image']['name'];
 	$tmp_image=$_FILES['service_image']['tmp_name'];
   if (empty($service_image)) {
   	$service_image=$new_s_image;
   }
   
 	move_uploaded_file($tmp_image,"services_images/$service_image");
 	$update_services="update services set service_title='$service_title',service_image='$service_image',service_desc='$service_desc',service_button='$service_button',service_url='$service_url' where service_id='$service_id'";
 	$run_services=mysqli_query($con,$update_services);
 	if ($run_services) {
echo "<script>alert('Service Updated Successfully');</script>";
echo "<script>window.open('index.php?view_services','_self');</script>";
 		}
 
 }
?>

<?php }?>
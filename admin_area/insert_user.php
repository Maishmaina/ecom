<?php 
 if (!isset($_SESSION['admin_email'])) {
 	echo "<script>window.open('login.php','_self');</script>";
 }else{


?>
<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li class="active">
			<i class="fa fa-tachometer-alt fa-1x"></i>&nbsp;Dashboard/ Insert User.
			</li>
		</ol>
	</div><!--end row dashboard-->
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
					<h3 class="card-title">
						<i class="fas fa-calendar-plus"></i>&nbsp;Insert User
					</h3>
				</div><!--this is the end of the header-->
				<div class="card-body">
					<form action="" method="post" class="form-holizontal" enctype="multipart/form-data">
						<div class="form-group row">
						<label class="col-md-3">User Name:</label>
						<div class="col-md-6">
							<input type="text" name="admin_name" class="form-control" required>
						</div>
						</div>
						<div class="form-group row">
						<label class="col-md-3">User Email:</label>
						<div class="col-md-6">
							<input type="email" name="admin_email" class="form-control" required>
						</div>
						</div>
						<div class="form-group row">
						<label class="col-md-3">User Password:</label>
						<div class="col-md-6">
							<input type="password" name="admin_pass" class="form-control" required>
						</div>
						</div>
						<div class="form-group row">
						<label class="col-md-3">User County:</label>
						<div class="col-md-6">
							<input type="text" name="admin_county" class="form-control" required>
						</div>
						</div>
						<div class="form-group row">
						<label class="col-md-3">User Job:</label>
						<div class="col-md-6">
							<input type="text" name="admin_job" class="form-control" required>
						</div>
						</div>
						<div class="form-group row">
						<label class="col-md-3">User Contact:</label>
						<div class="col-md-6">
							<input type="text" name="admin_contact" class="form-control" required>
						</div>
						</div>
						<div class="form-group row">
						<label class="col-md-3">User About:</label>
						<div class="col-md-6">
							<textarea name="admin_about" class="form-control"></textarea>
						</div>
						</div>
						<div class="form-group row">
						<label class="col-md-3">User Image:</label>
						<div class="col-md-6">
							<input type="file" name="admin_image" class="form-control" required>
						</div>
						</div>
						<div class="form-group row">
						<label class="col-md-3"></label>
						<div class="col-md-6">
							<input type="submit" name="submit" value="Insert User" class="btn btn-success" required>
						</div>
						</div>
					</form>
				</div>
		</div>
	</div>
</div>
<?php
  if (isset($_POST['submit'])) {
  	$admin_name = $_POST['admin_name'];
  	$admin_email = $_POST['admin_email'];
  	$admin_pass = $_POST['admin_pass'];
  	$admin_county = $_POST['admin_county'];
  	$admin_job = $_POST['admin_job'];
  	$admin_contact = $_POST['admin_contact'];
  	$admin_about = $_POST['admin_about'];
  	$admin_image = $_FILES['admin_image']['name'];
  	$temp_admin_image = $_FILES['admin_image']['tmp_name'];
  	move_uploaded_file($temp_admin_image,"admin_images/$admin_image");
  	$insert_admin = "insert into admins(admin_name,admin_email,admin_pass,admin_image,admin_contact,admin_county,admin_job,admin_about) values('$admin_name','$admin_email','$admin_pass','$admin_image','$admin_contact','$admin_county','$admin_job','$admin_about')";
  	$run_admin = mysqli_query($con,$insert_admin);
  	if ($run_admin) {
  		echo "<script>alert('Admin Added Successifully')</script>";
  		echo "<script>window.open('index.php?view_users','_self')</script>";
  	}

  }
?>
<?php }?>

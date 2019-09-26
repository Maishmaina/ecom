<?php 
 if (!isset($_SESSION['admin_email'])) {
 	echo "<script>window.open('login.php','_self');</script>";
 }else{


?>
<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-tachometer-alt fa-1x"></i>&nbsp;Dashboard/ Insert Slide
			</li>
		</ol>
	</div><!--end col-md-12-->
</div><!--end of the row-->

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
			<h3 class="card-title">
				<i class="fas fa-money-bill-alt"></i>&nbsp;Insert Slide
			</h3>
		</div><!--end of the header-->
		<div class="card-body">
			<form action="" method="post" class="form-horizontal " enctype="multipart/form-data">
				<div class="form-group row">
				<label class="col-md-3">Slide Name:</label>
				<div class="col-md-6">
					<input type="text" name="slide_name" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-md-3"> Slide Image:</label>
				<div class="col-md-6">
					<input class="form-control" name="slide_image" type="file">
				</div>
			</div>
            <div class="form-group row">
				<label class="col-md-3">Slider URL:</label>
				<div class="col-md-6">
					<input type="text" name="slide_url" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-md-3"></label>
				<div class="col-md-6">
					<input type="submit" name="submit" class="
					btn btn-success form-control" value="Submit Now">
				</div>
			</div>
				
			</form>
		</div><!--end of the -->
		</div>
	</div>
</div><!--this is the second row-->
<?php 
  if (isset($_POST['submit'])) {
  	$slide_name = $_POST['slide_name'];
  	$slide_image = $_FILES['slide_image']['name'];
  	$temp_name = $_FILES['slide_image']['tmp_name'];
  	$slide_url = $_POST['slide_url'];
  	$view_slides = "select * from slider ";
  	$view_run_slides = mysqli_query($con,$view_slides);
  	$count = mysqli_num_rows($view_run_slides);
  	if ($count<5) {
  		move_uploaded_file($temp_name,"slider_images/$slide_image");
  		$insert_slide = "insert into slider (slide_name,slide_image,slide_url) values('$slide_name','$slide_image','$slide_url')";
  		$run_slide = mysqli_query($con,$insert_slide);
  		echo "<script>alert('New Slider Add Successifully')</script>";
  		echo "<script>window.open('index.php?view_slides','_self')</script>";
  	}else{
  		echo "<script>alert('You have Insert 5 Sliders')</script>";
  	}
  }
?>
<?php }?>
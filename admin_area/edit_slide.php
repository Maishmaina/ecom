<?php 
 if (!isset($_SESSION['admin_email'])) {
 	echo "<script>window.open('login.php','_self');</script>";
 }else{


?>
<?php
  if (isset($_GET['edit_slide'])) {
  	$edit_id = $_GET['edit_slide'];
  	$edit_slide = "select * from slider where slide_id='$edit_id'";
  	$run_edit = mysqli_query($con,$edit_slide);
  	$row_edit= mysqli_fetch_array($run_edit);
  	$slide_id = $row_edit['slide_id'];
  	$slide_name = $row_edit['slide_name'];
  	$slide_image = $row_edit['slide_image'];
  	$slide_url  = $row_edit['slide_url'];
  	$new_slide_image=$row_edit['slide_image'];
  }
?>
<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-tachometer-alt fa-1x"></i>&nbsp;Dashboard/ Edit Slide
			</li>
		</ol>
	</div><!--end col-md-12-->
</div><!--end of the row-->

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
			<h3 class="card-title">
				<i class="fas fa-money-bill-alt"></i>&nbsp;Edit Slide
			</h3>
		</div><!--end of the header-->
		<div class="card-body">
			<form action="" method="post" class="form-horizontal " enctype="multipart/form-data">
				<div class="form-group row">
				<label class="col-md-3">Slide Name:</label>
				<div class="col-md-6">
					<input type="text" name="slide_name" class="form-control" value="<?php echo $slide_name;?>">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-md-3">Slider URL:</label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="slide_url" value="<?php echo $slide_url;?>">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-md-3"> Slide Image:</label>
				<div class="col-md-6">
					<input class="form-control" name="slide_image" type="file"><br>
					<img src="slider_images/<?php echo $slide_image;?>" alt="" style="height:50px; width: 50px;">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3"></label>
				<div class="col-md-6">
					<input type="submit" name="update" class="
					btn btn-success form-control" value="Update Now">
				</div>
			</div>
				
			</form>
		</div><!--end of the -->
		</div>
	</div>
</div><!--this is the second row-->
<?php 
  if (isset($_POST['update'])) {
  	$slide_name = $_POST['slide_name'];
  	$slide_url = $_POST['slide_url'];
  	$slide_image = $_FILES['slide_image']['name'];
  	$temp_name = $_FILES['slide_image']['tmp_name'];
  	
  	move_uploaded_file($temp_name,"slider_images/$slide_image");
  	if (empty($slide_image)) {
  		$slide_image=$new_slide_image;
  	}
  	$update_slide = "update slider set slide_name='$slide_name',slide_url='$slide_url', slide_image='$slide_image' where slide_id='$edit_id'";
  	$run_slide = mysqli_query($con,$update_slide);
  	if ($run_slide) {
  		echo "<script>alert('Slider updated Successifully')</script>";
  		echo "<script>window.open('index.php?view_slides','_self')</script>";
  	}else{
  		echo "<script>alert('Something Wrong Just happend');</script>";
  	}

    
  }
  
?>
<?php }?>
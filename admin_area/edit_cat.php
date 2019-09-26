<?php 
 if (!isset($_SESSION['admin_email'])) {
 	echo "<script>window.open('login.php','_self');</script>";
 }else{


?>
<?php
 if (isset($_GET['edit_cat'])) {
 	$edit_id=$_GET['edit_cat'];
 	$edit_cat="select * from categories where cat_id ='$edit_id'";
 	$run_edit=mysqli_query($con,$edit_cat);
 	$row_edit=mysqli_fetch_array($run_edit);
 	$c_id = $row_edit['cat_id'];
 	$c_title = $row_edit['cat_title'];
 	$c_top = $row_edit['cat_top']; 
 	$c_image = $row_edit['cat_image'];
 	$new_c_image =$row_edit['cat_image'];
 }
?>
<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li>
			<i class="fa fa-tachometer-alt fa-1x"></i>&nbsp;Dashboard/ Edit Category.
			</li>
		</ol>
	</div>
</div><!--this end of the row-->
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">
					<i class="fas fa-money-bill-alt"></i>&nbsp;Edit Category
				</h3>
			</div><!--end-->
			<div class="card-body">
				<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
					<div class="form-group row">
						<label class="col-md-3 control-label">Category Title:</label>
						<div class="col-md-6">
						<input type="text" name="cat_title" class="form-control" value="<?php echo $c_title;?>">
					</div>
				</div>
					<div class="form-group row">
						<label class="col-md-3 control-label">Category Top:</label>
						<div class="col-md-6">
							<input type="radio" name="cat_top" value="yes"
							<?php if ($c_top=='no'){}else{echo "checked='checked'";}?>>
							<label>Yes</label>
								<input type="radio" name="cat_top" value="no"
								<?php if($c_top=='no'){echo "checked='checked'";}else{}?>>
							<label>No</label>
					</div>
					</div>
					<div class="form-group row">
						<label class="col-md-3 control-label">Category Image:</label>
						<div class="col-md-6">
						<input type="file" name="cat_image" class="form-control"><br>
						<img src="other_images/<?php echo$c_image;?>" width="50px" height="50px">
					</div>
				</div>
					<div class="form-group row">
						<label class="col-md-3 control-label"></label>
						<div class="col-md-6">
						<input type="submit" name="update" class="btn btn-success btn-block" value="Update Category">
					</div>
					</div>
				</form> 
			</div>
		</div>
	</div>
</div><!--end of the second row-->
<?php
 if (isset($_POST['update'])) {
 $cat_title = $_POST['cat_title'];
 $cat_top = $_POST['cat_top'];
 $cat_image = $_FILES['cat_image']['name'];
 $temp_name = $_FILES['cat_image']['tmp_name'];
 move_uploaded_file($temp_name,"other_images/$cat_image");
 if (empty($new_c_image)) {
 	$cat_image=$new_c_image;
 }
 $update_cat = "update categories set cat_title='$cat_title',cat_top='$cat_top',cat_image='$cat_image' where cat_id='$c_id'";
 $run_cat=mysqli_query($con,$update_cat);
 if ($run_cat) {
 	echo "<script>alert('Category Updated')</script>";
 	echo "<script>window.open('index.php?view_cats','_self')</script>";
 }

 }
?>
<?php }?>
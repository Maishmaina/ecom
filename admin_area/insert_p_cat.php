<?php 
 if (!isset($_SESSION['admin_email'])) {
 	echo "<script>window.open('login.php','_self');</script>";
 }else{


?>
<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-tachometer-alt fa-1x"></i>&nbsp;Dashboard/ Insert Products Category.
			</li>
		</ol>
	</div><!--end col-md-12-->
</div><!--end of the row-->
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
			<h3 class="card-title">
				<i class="fas fa-money-bill-alt"></i>&nbsp;Insert Product Category
			</h3>
		</div><!--end of the header-->
		<div class="card-body">
			<form action="" method="post" class="form-horizontal" enctype="multipart/form-data"><div class="form-group row">
				<label class="col-md-3">Product Category Title</label>
				<div class="col-md-6">
					<input type="text" name="p_cat_title" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-md-3">Show Product Top</label>
				<div class="col-md-6">
					<input type="radio" name="p_cat_top" value="yes">
					<label>Yes</label>
					<input type="radio" name="p_cat_top" value="no">
					<label>No</label>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-md-3">Product Category Image</label>
				<div class="col-md-6">
					<input type="file" name="p_cat_image" class="form-control">
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
 	$p_cat_title=$_POST['p_cat_title'];
 	$p_cat_top=$_POST['p_cat_top'];
 	$p_cat_image=$_FILES['p_cat_image']['name'];
 	$temp_name=$_FILES['p_cat_image']['tmp_name'];
 	move_uploaded_file($temp_name,"other_images/$p_cat_image");
 	$insert_p_cat = "insert into product_categories(p_cat_title,p_cat_top,p_cat_image)values('$p_cat_title','$p_cat_top','$p_cat_image')";
 	$run_p_cat= mysqli_query($con,$insert_p_cat);
 	if ($run_p_cat) {
 		echo "<script>alert('NEW Product Category Has been Inserted');</script>";
 		echo "<script>window.open('index.php?view_p_cats','_self');</script>";
 	}
 }
?>

<?php }?>
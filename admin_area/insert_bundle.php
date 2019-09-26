<?php 
if (!isset($_SESSION['admin_email'])) {
 	echo "<script>window.open('login.php','_self');</script>";
 }else{

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Insert||Bund</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'#product_desc,#product_features'});</script>

</head>
<body>
 <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<ol class="breadcrumb">
				<li class="active"><i class="fas fa-tachometer-alt"></i> Dashboard /Insert Bundle</li>
			</ol>
		</div><!--end of the col-12-->
	</div><!--end of row -->
	</div>
	<div class="container">
<div class="row">
	<div class="col-md-12">
		<div class="card ">
			<div class="card-header">
				<h3 class="card-title"><i class="fas fa-money-bill-alt"></i> Insert Bundle</h3>
			</div>
			<div class="card-body" style="background: #D1CBCB">
				<form action="" class="form-holizontal" method="post" enctype="multipart/form-data">
					<div class="form-group row">
						<label class="col-md-3">Bundle Title:</label>
						<div class="col-md-6">
							<input type="text" name="product_title" class="form-control" required>
						</div>
					</div><!--end of the single item-->
					<div class="form-group row">
						<label class="col-md-3">Bundle Url:</label>
						<div class="col-md-6">
							<input type="text" name="product_url" class="form-control" required>
							<p style="font-size: 15px; font-weight: bold;">URL Example : farm-fork-jembe</p>
						</div>
					</div><!--end of the single item-->
					<div class="form-group row">
						<label class="col-md-3">Select Manufacturer:</label>
						<div class="col-md-6">
							<select name="manufacturer"class="form-control">
								<option>Select a manufacturer</option>
								<?php
								$get_manufacturer="select * from manufacturers";
								$run_manufacturer= mysqli_query($con,$get_manufacturer);
								while ($row_manufacturer=mysqli_fetch_array($run_manufacturer)) {
									$manufacturer_id=$row_manufacturer['manufacturer_id'];
									$manufacturer_title=$row_manufacturer['manufacturer_title'];
									echo "<option value='$manufacturer_id'>
                                          $manufacturer_title
									</option>";
								}

								?>
							</select>
						</div>
					</div><!--end of the single item-->
					<div class="form-group row">
						<label class="col-md-3">Product Category:</label>
						<div class="col-md-6">
							<select name="product_cat" class="form-control">
								<option value="">Select a product Category</option>
								<?php
                         $get_p_cats = "SELECT * FROM product_categories ";
                         $run_p_cats = mysqli_query($con,$get_p_cats);
                         while($row_p_cats = mysqli_fetch_array($run_p_cats)){
                         	$p_cat_id = $row_p_cats['p_cat_id'];
                         	$p_cat_title = $row_p_cats['p_cat_title'];
                         	echo "<option value='$p_cat_id'>$p_cat_title</option>";
                         }

								?>
                         
							</select>
						</div>
					</div><!--end of the single item-->
					<div class="form-group row">
						<label class="col-md-3">Category:</label>
						<div class="col-md-6">
							<select name="cat" class="form-control">
								<option >Select Category</option>
								<?php
								$get_cat = "SELECT *FROM categories";
								$run_cat = mysqli_query($con, $get_cat);
								while($row_cat=mysqli_fetch_array($run_cat)){
									$cat_id = $row_cat['cat_id'];
									$cat_title = $row_cat['cat_title'];
									echo "<option value='$cat_id'>$cat_title</option>";
								}
								?>
							</select>
						</div>
					</div><!--end of the single item-->
					<div class="form-group row">
						<label class="col-md-3">Bundle Image One:</label>
						<div class="col-md-6">
							<input type="file" name="product_image_1" class="form-control" required>
						</div>
					</div><!--end of the single item-->
					<div class="form-group row">
						<label class="col-md-3">Bundle Image Two:</label>
						<div class="col-md-6">
							<input type="file" name="product_image_2" class="form-control" required>
						</div>
					</div><!--end of the single item--> 
					<div class="form-group row">
						<label class="col-md-3">Bundle Image Three:</label>
						<div class="col-md-6">
							<input type="file" name="product_image_3" class="form-control" required>
						</div>
					</div><!--end of the single item-->
					<div class="form-group row">
						<label class="col-md-3">Bundle Price:</label>
						<div class="col-md-6">
							<input type="text" name="product_price" class="form-control" required>
						</div>
					</div><!--end of the single item-->
					<div class="form-group row">
						<label class="col-md-3">Bundle Sale Price:</label>
						<div class="col-md-6">
							<input type="text" name="psp_price" class="form-control" required>
						</div>
					</div><!--end of the single item-->
					<div class="form-group row">
						<label class="col-md-3">Bundle Keywords</label>
						<div class="col-md-6">
							<input type="text" name="product_keywords" class="form-control" required>
						</div>
					</div><!--end of the single item-->
					<div class="form-group row">
						<label class="col-md-3">Bundle Tabs</label>
						<div class="col-md-6">
		 <ul class="nav nav-tabs">
			  <li class="nav-item">
			    <a class="nav-link active text-info" href="#description" data-toggle="tab">B. Description</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link text-info" href="#features" data-toggle="tab">Features</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link text-info" href="#video" data-toggle="tab">Sound & Video</a>
			  </li>
			</ul>
			<div class="tab-content">
  <div id="description" class="tab-pane fade show active" role="tabpanel" aria-labelledby="v-pills-home-tab active">
  	<textarea id="product_desc" class="form-control" name="product_desc" ></textarea>
          </div>
<div id="features" class="tab-pane fade show " role="tabpanel" aria-labelledby="v-pills-home-tab">
    <textarea id="product_features" class="form-control" name="product_features" ></textarea>
          </div>
<div id="video" class="tab-pane fade show" role="tabpanel" aria-labelledby="v-pills-home-tab">
    <textarea class="form-control" name="product_video" ></textarea>         
          </div>
</div>
						</div>
					</div><!--end of the single item-->
					<div class="form-group row">
						<label class="col-md-3">Bundle Label:</label>
						<div class="col-md-6">
							<input type="text" name="product_label" class="form-control" required>
						</div>
					</div><!--end of the single item-->
					<div class="form-group row">
						<label class="col-md-3"></label>
						<div class="col-md-6">
							<input type="submit" name="submit" value="Insert Bundle" class="btn btn-success form-control">
						</div>
					</div><!--end of the single item-->


				</form>
			</div>
		</div>
	</div><!--col-12-->
</div><!--end of row two-->
</div>
</body>
</html>
<?php
 if (isset($_POST['submit'])) {
 	$product_title = $_POST['product_title'];
 	$product_cat = $_POST['product_cat'];
 	$cat = $_POST['cat'];
 	$manufacturer_id=$_POST['manufacturer']; 
 	$product_price = $_POST['product_price'];
 	$product_desc = $_POST['product_desc'];
 	$product_keywords = $_POST['product_keywords'];
 	$psp_price = $_POST['psp_price'];
 	$product_label = $_POST['product_label'];
 	$product_url=$_POST['product_url'];
 	$product_features=$_POST['product_features'];
 	$product_video=$_POST['product_video'];
 	$status ="bundle";
 	$product_imag_1 = $_FILES['product_image_1']['name'];
 	$product_imag_2 = $_FILES['product_image_2']['name'];
 	$product_imag_3 = $_FILES['product_image_3']['name'];
 	
 	$temp_name1 = $_FILES['product_image_1']['tmp_name'];
 	$temp_name2 = $_FILES['product_image_2']['tmp_name'];
 	$temp_name3 = $_FILES['product_image_3']['tmp_name'];
 	move_uploaded_file($temp_name1, "products_imges/$product_imag_1");
 	move_uploaded_file($temp_name2, "products_imges/$product_imag_2");
 	move_uploaded_file($temp_name3, "products_imges/$product_imag_3");

$insert_product = "INSERT INTO products (p_cat_id,cat_id,manufacturer_id,data,product_title,product_url,product_img1,product_img2,product_img3,product_price,product_psp_price,product_desc,product_features,product_video,product_keyword,product_label,status) VALUES( '$product_cat','$cat', $manufacturer_id,NOW(), '$product_title','$product_url','$product_imag_1','$product_imag_2','$product_imag_3','$product_price','$psp_price','$product_desc','$product_features','$product_video','$product_keywords','$product_label','$status')";
$run_product = mysqli_query($con, $insert_product);
if ($run_product) {
	echo"<script>alert('Bundle Inserted Successifully')</script>";
	echo"<script>window.open('index.php?view_bundles','_self')</script>";

}
else{
 
   echo"<script>alert('Something went wrong! bundle not inserted')</script>";
	echo"<script>window.open('index.php?view_bundles','_self')</script>";
 	
 }
 }

?>
<?php }?>
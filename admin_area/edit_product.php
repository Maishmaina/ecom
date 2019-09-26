<?php 
if (!isset($_SESSION['admin_email'])) {
 	echo "<script>window.open('login.php','_self');</script>";
 }else{

?>
<?php
#new php for editing the products 
 if (isset($_GET['edit_product'])) {
 	$edit_id=$_GET['edit_product'];
 	$get_p="select * from products where product_id ='$edit_id'";
 	$run_edit = mysqli_query($con,$get_p);
 	$row_edit = mysqli_fetch_array($run_edit);
 	$p_id = $row_edit['product_id'];
 	$p_title = $row_edit['product_title'];
 	$p_cat = $row_edit['p_cat_id'];
 	$cat = $row_edit['cat_id'];
 	$m_id = $row_edit['manufacturer_id'];
 	$p_image1 = $row_edit['product_img1'];
 	$p_image2 = $row_edit['product_img2'];
 	$p_image3 = $row_edit['product_img3'];
 	$new_p_image1=$row_edit['product_img1'];
 	$new_p_image2=$row_edit['product_img2'];
 	$new_p_image3=$row_edit['product_img3'];
 	$p_price = $row_edit['product_price'];
 	$p_desc = $row_edit['product_desc'];
 	$p_keywords = $row_edit['product_keyword'];
    $psp_price=$row_edit['product_psp_price'];
    $p_label =$row_edit['product_label'];
    $p_url = $row_edit['product_url'];
    $p_features=$row_edit['product_features'];
    $p_video=$row_edit['product_video'];
 }
 $get_manufacturer = "select * from manufacturers where manufacturer_id=$m_id";
 $run_manufacturer = mysqli_query($con,$get_manufacturer);
 $row_manufacturer = mysqli_fetch_array($run_manufacturer);
 $manufacturer_id=$row_manufacturer['manufacturer_id'];
 $manufacturer_title=$row_manufacturer['manufacturer_title'];



 $get_p_cat="select * from product_categories where p_cat_id='$p_cat'";
 $run_p_cat = mysqli_query($con,$get_p_cat);
 $row_p_cat = mysqli_fetch_array($run_p_cat);
 $p_cat_title = $row_p_cat['p_cat_title'];

 $get_cat = "select * from categories where cat_id='$cat'";
 $run_cat = mysqli_query($con,$get_cat);
 $row_cat = mysqli_fetch_array($run_cat);
 $cat_title =$row_cat['cat_title'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Edit||Pro</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'#product_desc,#product_features' });</script>


</head>
<body>
 <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<ol class="breadcrumb">
				<li class="active"><i class="fas fa-tachometer-alt"></i> Dashboard /Edit Product</li>
			</ol>
		</div><!--end of the col-12-->
	</div><!--end of row -->
	</div>
	<div class="container">
<div class="row">
	<div class="col-md-12">
		<div class="card ">
			<div class="card-header">
				<h3 class="card-title"><i class="fas fa-money-bill-alt"></i> Edit Product</h3>
			</div>
			<div class="card-body">
				<form action="" class="form-holizontal" method="post" enctype="multipart/form-data">
					<div class="form-group row">
						<label class="col-md-3">Product Title</label>
						<div class="col-md-6">
							<input type="text" name="product_title" class="form-control" value="<?php echo $p_title;?>" required>
						</div>
					</div><!--end of the single item-->
					<div class="form-group row">
						<label class="col-md-3">Product Url:</label>
						<div class="col-md-6">
							<input type="text" name="product_url" class="form-control" value="<?php echo $p_url?>" required>
							<p style="font-size: 15px; font-weight: bold;">URL Example : farm-fork-jembe</p>
						</div>
					</div><!--end of the single item-->
					<div class="form-group row">
						<label class="col-md-3">Select Manufacturer</label>
						<div class="col-md-6">
						<select name="manufacturer" class="form-control">
						<option value="<?php echo $manufacturer_id; ?>" >
								<?php echo $manufacturer_title;?>
							</option>
							<?php 
                     $get_manufacturer="select * from manufacturers ";
                     $run_manufacturer=  mysqli_query($con,$get_manufacturer);
                     while ($row_manufacturer=mysqli_fetch_array($run_manufacturer)) {
                     	$manufacturer_id=$row_manufacturer['manufacturer_id'];
                     	$manufacturer_title=$row_manufacturer['manufacturer_title'];
                     	echo "
                        <option value='$manufacturer_id'>
                        $manufacturer_title</option>
                     	";
                     }
							?>
						</select>
						</div>
					</div><!--end of the single item-->
					<div class="form-group row">
						<label class="col-md-3">Product Category</label>
						<div class="col-md-6">
							<select name="product_cat" class="form-control">
								<option value="<?php echo $p_cat;?>"><?php echo $p_cat_title;?></option>
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
						<label class="col-md-3">Category</label>
						<div class="col-md-6">
							<select name="cat" class="form-control">
								<option value="<?php echo $cat;?>"><?php echo $cat_title;?></option>
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
						<label class="col-md-3">Product Image One</label>
						<div class="col-md-6">
							<input type="file" name="product_image_1" class="form-control"><br><img src="products_imges/<?php echo $p_image1;?>" style="height: 50px; width: 50px;">
						</div>
					</div><!--end of the single item-->
					<div class="form-group row">
						<label class="col-md-3">Product Image Two</label>
						<div class="col-md-6">
							<input type="file" name="product_image_2" class="form-control"><br><img src="products_imges/<?php echo $p_image2;?>"  style="height: 50px; width: 50px;">
						</div>
					</div><!--end of the single item--> 
					<div class="form-group row">
						<label class="col-md-3">Product Image Three</label>
						<div class="col-md-6">
							<input type="file" name="product_image_3" class="form-control"><br><img src="products_imges/<?php echo $p_image3;?>"  style="height: 50px; width: 50px;">
						</div>
					</div><!--end of the single item-->
					<div class="form-group row">
						<label class="col-md-3">Product Price</label>
						<div class="col-md-6">
							<input type="text" name="product_price" class="form-control" required value="<?php echo $p_price;?>">
						</div>
					</div><!--end of the single item-->
					<div class="form-group row">
						<label class="col-md-3">Product Sale Price</label>
						<div class="col-md-6">
							<input type="text" name="psp_price" class="form-control" required value="<?php echo $psp_price;?>">
						</div>
					</div><!--end of the single item-->
					<div class="form-group row">
						<label class="col-md-3">Product Keywords</label>
						<div class="col-md-6">
							<input type="text" name="product_keywords" class="form-control" required value="<?php echo $p_keywords;?>">
						</div>
					</div><!--end of the single item-->
					<div class="form-group row">
						<label class="col-md-3">Product Tabs</label>
						<div class="col-md-6">
		 <ul class="nav nav-tabs">
			  <li class="nav-item">
			    <a class="nav-link active text-info" href="#description" data-toggle="tab">P. Description</a>
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
  	<textarea id="product_desc" class="form-control" name="product_desc" >
  		<?php echo $p_desc;?>
  	</textarea>
          </div>
<div id="features" class="tab-pane fade show " role="tabpanel" aria-labelledby="v-pills-home-tab">
    <textarea id="product_features" class="form-control" name="product_features" >
    	  		<?php echo $p_features;?>

    </textarea>
          </div>
<div id="video" class="tab-pane fade show" role="tabpanel" aria-labelledby="v-pills-home-tab">
    <textarea class="form-control" name="product_video" rows="10" cols="15" >
    	  		<?php echo $p_video;?>

    </textarea>         
          </div>
</div>
						</div>
					</div><!--end of the single item-->
					<div class="form-group row">
						<label class="col-md-3">Product Label</label>
						<div class="col-md-6">
							<input type="text" name="product_label" class="form-control" required value="<?php echo $p_label;?>">
						</div>
					</div><!--end of the single item-->
					<div class="form-group row">
						<label class="col-md-3"></label>
						<div class="col-md-6">
							<input type="submit" name="update" value="update Product" class="btn btn-success form-control">
						</div>
					</div><!--end of the single item-->


				</form>
			</div>
		</div>
	</div><!--col-12-->
</div><!--end of row two-->
</div>

<!-- <script src="awesomefonts/all.js"></script>WebIcons
<script src="js/bootstrapjquery.js"></script>jquerywork 
<script src="js/bootstrap.js"></script>bootstrap js -->
</body>
</html>
<?php
 if (isset($_POST['update'])) {
 	$product_title = $_POST['product_title'];
 	$product_cat = $_POST['product_cat'];
 	$cat = $_POST['cat'];
 	$manufacturer_id=$_POST['manufacturer'];
 	$product_price = $_POST['product_price'];
 	$product_desc = $_POST['product_desc'];
 	$product_keywords = $_POST['product_keywords'];
    $psp_price = $_POST['psp_price'];
 	$product_label = $_POST['product_label'];
 	$product_url = $_POST['product_url'];
 	$product_features=$_POST['product_features'];
 	$product_video=$_POST['product_video'];
 	$status="product";

 	$product_image_1 = $_FILES['product_image_1']['name'];
 	$product_image_2 = $_FILES['product_image_2']['name'];
 	$product_image_3 = $_FILES['product_image_3']['name'];
 	
 	$temp_name1 = $_FILES['product_image_1']['tmp_name'];
 	$temp_name2 = $_FILES['product_image_2']['tmp_name'];
 	$temp_name3 = $_FILES['product_image_3']['tmp_name'];
 	if (empty($product_image_1)) {
 		$product_image_1=$new_p_image1;
 	}
 	if (empty($product_image_2)) {
 		$product_image_2=$new_p_image2;
 	}
 	if (empty($product_image_3)) {
 		$product_image_3=$new_p_image3;
 	}
 	move_uploaded_file($temp_name1, "products_imges/$product_image_1");
 	move_uploaded_file($temp_name2, "products_imges/$product_image_2");
 	move_uploaded_file($temp_name3, "products_imges/$product_image_3");
 	$update_product = "update products set p_cat_id='$product_cat',cat_id='$cat',manufacturer_id='$manufacturer_id',data=NOW(),product_title='$product_title',product_url='$product_url', product_img1='$product_image_1',product_img2='$product_image_2',product_img3='$product_image_3',product_price='$product_price',product_psp_price='$psp_price',product_desc='$product_desc',product_features='$product_features',product_video='$product_video',product_keyword='$product_keywords',product_label='$product_label',status='$status' where product_id='$p_id'";
 	$run_product = mysqli_query($con,$update_product);
 	if ($run_product) {
 		echo "<script>alert('Products has been updated successfully');</script>";
 		echo "<script>window.open('index.php?view_products','_self')</script>";
 	}
 }

?>
<?php }?>
<?php 
 if (!isset($_SESSION['admin_email'])) {
 	echo "<script>window.open('login.php','_self');</script>";
 }else{


?>
<?php
  if (isset($_GET['edit_icon'])) {
  	$edit_id= $_GET['edit_icon'];
  	$get_icon = "select * from icons where icon_id='$edit_id'";
  	$run_icon =mysqli_query($con,$get_icon);
  	$row_edit= mysqli_fetch_array($run_icon);
  	$i_id = $row_edit['icon_id'];
  	$i_p = $row_edit['icon_product'];
  	$i_title = $row_edit['icon_title'];
  	$i_image = $row_edit['icon_image'];
  	$new_i_image=$row_edit['icon_image'];
  	$get_products = "select * from products where product_id='$i_p'";
  	$run_products=mysqli_query($con,$get_products);
  	$row_products = mysqli_fetch_array($run_products);
  	$product_id=$row_products['product_id'];
  	$product_title=$row_products['product_title'];

  }

?>
<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li>
			<i class="fa fa-tachometer-alt fa-1x"></i>&nbsp;Dashboard/ Edit Icon.
			</li>
		</ol>
	</div>
</div><!--this end of the row-->
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">
					<i class="fas fa-cog fa-spin" style="font-size:24px"></i>&nbsp;Edit Icon
				</h3>
			</div><!--end-->
			<div class="card-body" style="background: #D6D6D6;">
		<form action="" method="post" class="form-holizontal" enctype="multipart/form-data">
			<div class="form-group row">
                <label class=" col-md-3">Icon Title</label>
						<input type="text" name="icon_title" class="form-control col-md-6" value="<?php echo $i_title;?>">
					</div>
			<div class="form-group row">
                <label class=" col-md-3">Icon Products / Bundle</label>
						<div class="form-control col-md-6" >
							<select name="product_id" class="form-control">
								<option value="<?php echo $product_id;?>"><?php echo $product_title?></option>
								
								<?php
      $get_p="select * from products where status='product'";
      $run_p=mysqli_query($con,$get_p);
      while ($row_p=mysqli_fetch_array($run_p)) {
      	$p_id=$row_p['product_id'];
      	$p_title=$row_p['product_title'];
      	echo "<option value='$p_id'>$p_title</option>";
      }
								?>
			<option ></option>
			<option class="bg-success">Select Inon for Bundle</option>
			<option ></option>
<?php
      $get_p="select * from products where status='bundle'";
      $run_p=mysqli_query($con,$get_p);
      while ($row_p=mysqli_fetch_array($run_p)) {
      	$p_id=$row_p['product_id'];
      	$p_title=$row_p['product_title'];
      	echo "<option value='$p_id'>$p_title</option>";
      }
								?>
							</select>
						</div>
					</div>
			<div class="form-group row">
                <label class=" col-md-3">Select Icon Image</label>
						<input type="file" name="icon_image" class="form-control col-md-6"/>
						<br/>
						<img src="icon_images/<?php echo $i_image;?>" width="50px" height="50px">
					</div>
			<div class="form-group row">
                <label class=" col-md-3"></label>
						<input type="submit" name="update" class="form-control col-md-6 btn btn-success" value="Update Icon" >
					</div>
					
				</form>
			</div>
			</div><!--end of card-->
		</div>
	</div>
	<?php
if (isset($_POST['update'])) {
	$icon_title=$_POST['icon_title'];
	$icon_image=$_FILES['icon_image']['name'];
    $temp_name=$_FILES['icon_image']['tmp_name'];
    $product_id=$_POST['product_id'];
    move_uploaded_file($temp_name,"icon_images/$icon_image");
    if (empty($icon_image)) {
    	$icon_image=$new_i_image;
    }

    $update_icon="update icons set icon_product='$product_id',icon_title='$icon_title',icon_image='$icon_image' where icon_id='$i_id'";
    $run_update=mysqli_query($con,$update_icon);
    if ($run_update) {
    	echo "<script>alert('One Icon Updated Successifully');</script>";
    	echo "<script>window.open('index.php?view_icons','_self');</script>";
    }
}
	?>

<?php }?>

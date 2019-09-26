<?php 
 if (!isset($_SESSION['admin_email'])) {
 	echo "<script>window.open('login.php','_self');</script>";
 }else{


?>
<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li>
			<i class="fa fa-tachometer-alt fa-1x"></i>&nbsp;Dashboard/ Insert Icon.
			</li>
		</ol>
	</div>
</div><!--this end of the row-->
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">
					<i class="fas fa-cog fa-spin" style="font-size:24px"></i>&nbsp;Insert Icon
				</h3>
			</div><!--end-->
			<div class="card-body" style="background: #D6D6D6;">
		<form action="" method="post" class="form-holizontal" enctype="multipart/form-data">
			<div class="form-group row">
                <label class=" col-md-3">Icon Title</label>
						<input type="text" name="icon_title" class="form-control col-md-6" >
					</div>
			<div class="form-group row">
                <label class=" col-md-3">Icon for Products / Bundle</label>
						<div class="form-control col-md-6" >
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">
									Icon for Products / Bundle	
									</h5>
								</div>
								<div class="card-body" style="height: 100px; overflow-y: scroll;">
									<div class="category-menu">
		         <h5>Select Icon fro product</h5>							 
									<?php
                $get_p="select * from products where status='product'";
                $run_p=mysqli_query($con,$get_p);
                while ($row_p=mysqli_fetch_array($run_p)) {
                	$p_id=$row_p['product_id'];
                	$p_title=$row_p['product_title'];
                	echo "<p><input type='checkbox' value='$p_id' name='product_id[]'>&nbsp;$p_title</p>";
                }
									?>
									<h5>Select Icon for Bundle</h5>
														<?php
                $get_p="select * from products where status='bundle'";
                $run_p=mysqli_query($con,$get_p);
                while ($row_p=mysqli_fetch_array($run_p)) {
                	$p_id=$row_p['product_id'];
                	$p_title=$row_p['product_title'];
                	echo "<p><input type='checkbox' value='$p_id' name='product_id[]'>&nbsp;$p_title</p>";
                }
									?>
									</div>
								</div>
							</div>
						</div>
					</div>
			<div class="form-group row">
                <label class=" col-md-3">Select Icon Image</label>
						<input type="file" name="icon_image" class="form-control col-md-6" >
					</div>
			<div class="form-group row">
                <label class=" col-md-3"></label>
						<input type="submit" name="submit" class="form-control col-md-6 btn btn-success" value="Insert Icon" >
					</div>
					
				</form>
			</div>
			</div><!--end of card-->
		</div>
	</div>
	<?php
if (isset($_POST['submit'])) {
	$icon_title=$_POST['icon_title'];
	$icon_image=$_FILES['icon_image']['name'];
    $temp_name=$_FILES['icon_image']['tmp_name'];

    move_uploaded_file($temp_name,"icon_images/$icon_image");
  foreach ($_POST['product_id'] as $product_id) {
  	$insert_icon = "insert into icons (icon_product,icon_title,icon_image)values('$product_id','$icon_title','$icon_image')";
  	$run_icon=mysqli_query($con,$insert_icon);
  }
  echo "<script>alert('New Product Icon Inserted');</script>";
  echo "<script>window.open('index.php?view_icons','_self');</script>";
}
	?>

<?php }?>

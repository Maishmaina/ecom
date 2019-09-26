<?php 
 if (!isset($_SESSION['admin_email'])) {
 	echo "<script>window.open('login.php','_self');</script>";
 }else{


?>
<?php
if (isset($_GET['edit_coupon'])) {
	$edit_id = $_GET['edit_coupon'];
	$edit_coupon="select * from coupons where coupon_id='$edit_id'";
	$run_edit = mysqli_query($con,$edit_coupon);
	$row_edit = mysqli_fetch_array($run_edit);
	$c_id = $row_edit['coupon_id'];
	$c_title = $row_edit['coupon_title'];
	$c_price = $row_edit['coupon_price'];
	$c_code = $row_edit['coupon_code'];
	$c_limit= $row_edit['coupon_limit'];
	$c_used= $row_edit['coupon_used'];
	$p_id = $row_edit['product_id'];
	$get_products = "select * from products where product_id='$p_id'";
	$run_products=mysqli_query($con,$get_products);
	$row_products = mysqli_fetch_array($run_products);
    $product_id = $row_products['product_id'];
    $product_title= $row_products['product_title'];
}
?>
<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li>
			<i class="fa fa-tachometer-alt fa-1x"></i>&nbsp;Dashboard/ Edit Coupon.
			</li>
		</ol>
	</div>
</div><!--this end of the row-->
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">
					<i class="fas fa-hand-holding-usd"></i>&nbsp;Edit Coupon
				</h3>
			</div><!--end-->
			<div class="card-body" style="background: #D6D6D6;">
		<form action="" method="post" class="form-holizontal">
			<div class="form-group row">
                <label class=" col-md-3">Coupon Title</label>
						<input type="text" name="coupon_title" class="form-control col-md-6" value="<?php echo $c_title;?>">
					</div>
					<div class="form-group row">
                <label class=" col-md-3">Coupon Price</label>
						<input type="text" name="coupon_price" class="form-control col-md-6" value="<?php echo $c_price;?>" >
					</div>
					<div class="form-group row">
                <label class=" col-md-3">Coupon Code</label>
						<input type="text" name="coupon_code" class="form-control col-md-6" value="<?php echo $c_code;?>" >
					</div>
					<div class="form-group row">
                <label class=" col-md-3">Coupon Limit</label>
						<input type="number" name="coupon_limit" class="form-control col-md-6" value="<?php echo $c_limit;?>">
					</div>
					<div class="form-group row">
                <label class=" col-md-3">Coupon Product / Bundle</label>
							<select name="product_id" class="form-control col-md-6">
								<option value="<?php echo $product_id;?>"><?php echo $product_title;?></option>
								<?php

                  $get_p="select * from products where status='product'";
                  $run_p = mysqli_query($con,$get_p);
                  while ($row_p = mysqli_fetch_array($run_p)) {
                  	$p_id  =$row_p['product_id'];
                  	$p_title  =$row_p['product_title'];
                  	echo "<option value='$p_id'>$p_title</option>";
                  }
								 ?>
								 <option></option>
								 <option class="bg-success text-light">Select Coupon Bundle</option>
							<option></option>
										<?php

                  $get_p="select * from products where status='bundle'";
                  $run_p = mysqli_query($con,$get_p);
                  while ($row_p = mysqli_fetch_array($run_p)) {
                  	$p_id  =$row_p['product_id'];
                  	$p_title  =$row_p['product_title'];
                  	echo "<option value='$p_id'>$p_title</option>";
                  }
								 ?>
							
						</select>
					</div>
					<div class="form-group row">
                <label class=" col-md-3"></label>
						<input type="submit" name="update" class="form-control col-md-6 btn btn-success" value="Edit Coupon" >
					</div>
					
				</form>
			</div>
			</div><!--end of card-->
		</div>
	</div>
	<?php
 if (isset($_POST['update'])) {
 	$coupon_title=$_POST['coupon_title'];
 	$coupon_price=$_POST['coupon_price'];
 	$coupon_code=$_POST['coupon_code'];
 	$coupon_limit=$_POST['coupon_limit'];
 	$product_id=$_POST['product_id'];
 	
 	$update_coupon = "update coupons set product_id='$product_id',coupon_title='$coupon_title',coupon_price='$coupon_price',coupon_code='$coupon_code',coupon_limit='$coupon_limit',coupon_used='$c_used' where coupon_id='$c_id'";
 	$run_coupon = mysqli_query($con,$update_coupon);
 	if ($run_coupon) {
 		echo "<script>alert('Coupon Update Seccessifully');</script>";
 		echo "<script>window.open('index.php?view_coupons','_self')</script>";
 	}
 	

 }
	?>
<?php }?>

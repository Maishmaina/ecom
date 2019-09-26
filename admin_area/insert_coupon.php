<?php 
 if (!isset($_SESSION['admin_email'])) {
 	echo "<script>window.open('login.php','_self');</script>";
 }else{


?>
<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li>
			<i class="fa fa-tachometer-alt fa-1x"></i>&nbsp;Dashboard/ Insert Coupon.
			</li>
		</ol>
	</div>
</div><!--this end of the row-->
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">
					<i class="fas fa-hand-holding-usd"></i>&nbsp;Insert Coupon
				</h3>
			</div><!--end-->
			<div class="card-body" style="background: #D6D6D6;">
		<form action="" method="post" class="form-holizontal">
			<div class="form-group row">
                <label class=" col-md-3">Coupon Title</label>
						<input type="text" name="coupon_title" class="form-control col-md-6" >
					</div>
					<div class="form-group row">
                <label class=" col-md-3">Coupon Price</label>
						<input type="text" name="coupon_price" class="form-control col-md-6" >
					</div>
					<div class="form-group row">
                <label class=" col-md-3">Coupon Code</label>
						<input type="text" name="coupon_code" class="form-control col-md-6" >
					</div>
					<div class="form-group row">
                <label class=" col-md-3">Coupon Limit</label>
						<input type="number" name="coupon_limit" value="1" class="form-control col-md-6" >
					</div>
					<div class="form-group row">
                <label class=" col-md-3">Coupon Product / Bundle</label>
							<select name="product_id" class="form-control col-md-6">
								<option>Select Coupon Product</option>
								<?php

                  $get_p="select * from products where status='product'";
                  $run_p = mysqli_query($con,$get_p);
                  while ($row_p = mysqli_fetch_array($run_p)) {
                  	$p_id  =$row_p['product_id'];
                  	$p_title  =$row_p['product_title'];
                  	echo "<option value='$p_id'>$p_title</option>";
                  }
								 ?>
							
							<option ></option>
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
						<input type="submit" name="submit" class="form-control col-md-6 btn btn-success" value="Insert Coupon" >
					</div>
					
				</form>
			</div>
			</div><!--end of card-->
		</div>
	</div>
	<?php
 if (isset($_POST['submit'])) {
 	$coupon_title=$_POST['coupon_title'];
 	$coupon_price=$_POST['coupon_price'];
 	$coupon_code=$_POST['coupon_code'];
 	$coupon_limit=$_POST['coupon_limit'];
 	$product_id=$_POST['product_id'];
 	$coupon_used=0;
 	$get_coupon = "select * from products where product_id='$product_id' or coupon_code='$coupon_code'";
 	$run_coupon =mysqli_query($con,$get_coupon);

 	$check_coupon = mysqli_num_rows($run_coupon);
 	if ($check_coupon==1) {
 	echo "<script>alert('Coupon Already Exist For This Product!!');</script>";
 	}else{
 		$insert_coupon = "insert into coupons(product_id,coupon_title,coupon_price,coupon_code,coupon_limit,coupon_used)values('$product_id','$coupon_title','$coupon_price','$coupon_code','$coupon_limit','$coupon_used')";
 		$run_coupon = mysqli_query($con,$insert_coupon);
        if ($run_coupon) {
        	echo "<script>alert('NewCoupon Has been Inserted!');</script>";
        	echo "<script>window.open('index.php?view_coupons','_self');</script>";
        }
 	}
 }
	?>
<?php }?>

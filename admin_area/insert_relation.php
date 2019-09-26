<?php 
 if (!isset($_SESSION['admin_email'])) {
 	echo "<script>window.open('login.php','_self');</script>";
 }else{


?>
<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li class="active">
			<i class="fa fa-tachometer-alt fa-1x"></i>&nbsp;Dashboard/ Insert Relation.
			</li>
		</ol>
	</div><!--end row dashboard-->
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
					<h3 class="card-title">
						<i class="fas fa-star"></i>&nbsp;Insert Relation
					</h3>
				</div><!--this is the end of the header-->
				<div class="card-body " style="background: #E3DFDF;">
					<form action="" method="post" class="form-horizontal">
						
						<div class="form-group row">
							<label for="" class=" col-md-3">Relation Title</label>
							<div class="col-md-6">
								<input type="text" name="rel_title" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<label for="" class=" col-md-3">Select Product</label>
							<div class="col-md-6">
								<select name="product_id" class="form-control">
									<option value="">Select Product</option>
									<?php
      $get_p="select * from products where status='product'";
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
							<label for="" class=" col-md-3">Select Bundle</label>
							<div class="col-md-6">
								<select name="bundle_id" class="form-control">
									<option >Select Bundle</option>
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
							<label for="" class=" col-md-3"></label>
							<div class="col-md-6">
								<input type="submit" name="submit" class="form-control btn btn-success" value="Insert Relation">
							</div>
						</div>
					</form>
				</div>
				</div>
			</div>
		</div>
		<?php
if (isset($_POST['submit'])) {
	$rel_title=$_POST['rel_title'];
	$product_id=$_POST['product_id'];
	$bundle_id=$_POST['bundle_id'];
	$insert_rel="insert into bundle_product_relation (rel_title,product_id,bundle_id) values ('$rel_title','$product_id','$bundle_id')";
	$run_rel=mysqli_query($con,$insert_rel);
	if ($run_rel) {
	 echo "<script>alert('New Relation has been Added Successifully');</script>";
	 echo "<script>window.open('index.php?view_relations','_self')</script>";
	}
}

		?>
<?php }?>

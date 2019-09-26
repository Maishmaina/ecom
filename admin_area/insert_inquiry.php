 <?php
 if (!isset($_SESSION['admin_email'])) {
 	echo "<script>window.open('login.php','_self');</script>";
 }else{


?>
<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li>
			<i class="fa fa-tachometer-alt fa-1x"></i>&nbsp;Dashboard/ Insert Inquiry Type.
			</li>
		</ol>
	</div>
</div><!--this end of the row-->
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">
					<i class="fas fa-hand-holding-usd"></i>&nbsp;Insert Inquiry Type
				</h3>
			</div><!--end-->
			<div class="card-body" style="background: #D6D6D6;">
<form action="" method="post" class="form-horizontal">
	<div class="form-group row">
		<label class="col-md-3">Inquiry Title</label>
		<div class="col-md-6">
			<input type="text" name="inquiry_title" class="form-control">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-md-3"></label>
		<div class="col-md-6">
			<input type="submit" name="submit" value="Insert Inquiry Type" class="form-control btn btn-success">
		</div>
	</div>
</form>
				</div>
			</div>
		</div>
	</div>
	<?php
if (isset($_POST['submit'])) {
	$inquiry_title=$_POST['inquiry_title'];
	$insert_inquiry="insert into inquiry_types(inquiry_title) values('$inquiry_title')";
	$run_inquiry=mysqli_query($con,$insert_inquiry);
	if ($run_inquiry) {
		echo "<script>alert('New Inquiry type Inserted');</script>";
		echo "<script>window.open('index.php?view_inquiry','_self')</script>";
	}
}
 
	?>

<?php }?>
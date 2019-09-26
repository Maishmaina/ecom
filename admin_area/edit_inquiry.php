 <?php
 if (!isset($_SESSION['admin_email'])) {
 	echo "<script>window.open('login.php','_self');</script>";
 }else{


?>
<?php
if (isset($_GET['edit_inquiry'])) {
	$edit_id=$_GET['edit_inquiry'];
	$get_inquiry_type="select * from inquiry_types where inquiry_id='$edit_id'";
	$run_inquiry_type=mysqli_query($con,$get_inquiry_type);
	$row_inquiry_type=mysqli_fetch_array($run_inquiry_type);
	$inquiry_id=$row_inquiry_type['inquiry_id'];
	$inquiry_title=$row_inquiry_type['inquiry_title'];
}
?>
<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li>
			<i class="fa fa-tachometer-alt fa-1x"></i>&nbsp;Dashboard/ Edit Inquiry Type.
			</li>
		</ol>
	</div>
</div><!--this end of the row-->
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">
					<i class="fas fa-hand-holding-usd"></i>&nbsp;Edit Inquiry Type
				</h3>
			</div><!--end-->
			<div class="card-body" style="background: #D6D6D6;">
<form action="" method="post" class="form-horizontal">
	<div class="form-group row">
		<label class="col-md-3">Inquiry Title</label>
		<div class="col-md-6">
			<input type="text" name="inquiry_title" class="form-control" value="<?php echo $inquiry_title;?>">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-md-3"></label>
		<div class="col-md-6">
			<input type="submit" name="update" value="Update Inquiry Type" class="form-control btn btn-success">
		</div>
	</div>
</form>
				</div>
			</div>
		</div>
	</div>
	<?php
if (isset($_POST['update'])) {
	$inquiry_title=$_POST['inquiry_title'];
	$update_inquiry="update inquiry_types set inquiry_title='$inquiry_title' where inquiry_id='$inquiry_id'";
	$run_inquiry=mysqli_query($con,$update_inquiry);
	if ($run_inquiry) {
		echo "<script>alert('Inquiry type Updated Successifully');</script>";
		echo "<script>window.open('index.php?view_inquiry','_self')</script>";
	}
}
 
	?>

<?php }?>
 <?php
 if (!isset($_SESSION['admin_email'])) {
 	echo "<script>window.open('login.php','_self');</script>";
 }else{


?>
<?php
$get_contact_us="select * from contact_us";
$run_contact_us=mysqli_query($con,$get_contact_us);
$row_contact_us=mysqli_fetch_array($run_contact_us);
$contact_email=$row_contact_us['contact_email'];
$contact_heading=$row_contact_us['contact_heading'];
$contact_desc=$row_contact_us['contact_desc'];
?>
<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li>
			<i class="fa fa-tachometer-alt fa-1x"></i>&nbsp;Dashboard/ Edit Contact us.
			</li>
		</ol>
	</div>
</div><!--this end of the row-->
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">
					<i class="fas fa-hand-holding-usd"></i>&nbsp;Edit Contact us
				</h3>
			</div><!--end-->
			<div class="card-body" style="background: #D6D6D6;">
				<form action="" method="post" class="form-horizontal">
					<div class="form-group row">
						<label for="" class="col-md-3">Contact Email</label>
						<div class="col-md-6">
							<input type="text" name="contact_email" value="<?php echo($contact_email);?>" class="form-control" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-md-3">Contact Heading</label>
						<div class="col-md-6">
							<input type="text" name="contact_heading" class="form-control" value="<?php echo($contact_heading);?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-md-3">Contact Description</label>
						<div class="col-md-6">
							<textarea name="contact_desc" id="" cols="20" rows="10" class="form-control">
								<?php echo $contact_desc;?>
							</textarea>
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-md-3"></label>
						<div class="col-md-6">
							<input type="submit" name="submit" class="form-control btn btn-success" value="Update Contact US">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
if(isset($_POST['submit'])){
	$contact_email=$_POST['contact_email'];
	$contact_heading=$_POST['contact_heading'];
	$contact_desc=$_POST['contact_desc'];
	$update_contact_us="update contact_us set contact_email='$contact_email', contact_heading='$contact_heading', contact_desc='$contact_desc' ";
	$run_contact_us=mysqli_query($con,$update_contact_us);
	if ($run_contact_us) {
		echo "<script>alert('Contat Updated Successifully');</script>";
		echo "<script>window.open('index.php?dashboard','_self')</script>";
	}
}

?>
<?php }?>
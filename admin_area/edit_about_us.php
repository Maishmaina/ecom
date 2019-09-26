 <?php
 if (!isset($_SESSION['admin_email'])) {
 	echo "<script>window.open('login.php','_self');</script>";
 }else{


?>
<?php 
$get_about_us="select * from about_us";
$run_about_us=mysqli_query($con,$get_about_us);
$row_about_us=mysqli_fetch_array($run_about_us);
$about_heading=$row_about_us['about_heading'];
$about_short_desc=$row_about_us['about_short_desc'];
$about_desc=$row_about_us['about_desc'];
       ?>  
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'#about_desc' });</script>
<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li>
			<i class="fa fa-tachometer-alt fa-1x"></i>&nbsp;Dashboard/ Edit About us.
			</li>
		</ol>
	</div>
</div><!--this end of the row-->
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">
					<i class="fas fa-hand-holding-usd"></i>&nbsp;Edit About Us
				</h3>
			</div><!--end-->
			<div class="card-body" style="background: #D6D6D6;">
<form action="" method="post" class="form-horizontal">
	<div class="form-group row">
		<label class="col-md-3">About Us Heading</label>
		<div class="col-md-6">
			<input type="text" name="about_heading" class="form-control" value="<?php echo $about_heading;?>">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-md-3">About Us Short description</label>
		<div class="col-md-6">
		<textarea name="about_short_desc" id="" cols="30" rows="6" class="form-control">
			<?php echo $about_short_desc;?>
		</textarea>
		</div>
	</div>
	<div class="form-group row">
		<label class="col-md-3">About Us Description</label>
		<div class="col-md-6">
			<textarea name="about_desc" id="about_desc" cols="30" rows="6" class="form-control">
				<?php echo $about_desc;?>
			</textarea>
		</div>
	</div>
	<div class="form-group row">
		<label class="col-md-3"></label>
		<div class="col-md-6">
			<input type="submit" name="submit" value="Update About Us" class="form-control btn btn-success">
		</div>
	</div>
</form>
				</div>
			</div>
		</div>
	</div>
	<?php
if (isset($_POST['submit'])) {
	$about_heading=$_POST['about_heading'];
	$about_short_desc=$_POST['about_short_desc'];
    $about_desc=$_POST['about_desc'];

	$update_about_us="update about_us set about_heading='$about_heading',about_short_desc='$about_short_desc', about_desc='$about_desc'";
	$run_about_us=mysqli_query($con,$update_about_us);
	if ($run_about_us) {
		echo "<script>alert('About us Updated Successifully');</script>";
		echo "<script>window.open('index.php?dashboard','_self')</script>";
	}
}
 
	?>

<?php }?>
<?php 
 if (!isset($_SESSION['admin_email'])) {
 	echo "<script>window.open('login.php','_self');</script>";
 }else{


?>
<?php 
  $file = "../styles/style.css";
  if (file_exists($file)) {
  	$data = file_get_contents($file);
  }
 ?>
<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li>
			<i class="fa fa-tachometer-alt fa-1x"></i>&nbsp;Dashboard/ Edit CSS!
			</li>
		</ol>
	</div>
</div><!--this end of the row--> 
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">
					<i class="fas fa-file-code"></i>&nbsp;Edit Styles css &nbsp;<i class="fas fa-code text-success"></i>
				</h3>
			</div><!--end-->
			<div class="card-body">
				<form action="" method="post" class="form-horizontal">
					<div class="form-group">
						<div class="col-md-12">
						<textarea class="form-control" name="newdata" id="" cols="30" rows="14">
							<?php echo $data;?>
						</textarea>
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-md-3"></label>
						<div class="col-md-6">
							<input type="submit" name="update" value="Update css File" class="btn btn-success btn-block">
						</div>
					</div>
				</form>
		</div>
	</div>
</div>
</div>
<?php
#update the css in the using php
 if (isset($_POST['update'])) {
 $newdata = $_POST['newdata'];
 $handle= fopen($file, "w");
 fwrite($handle, $newdata);
 fclose($handle);
 echo "<script>alert('CSS File Updated Sucessifully')</script>";
 echo "<script>window.open('index.php?edit_css','_self')</script>";

 }
?>
<?php }?>
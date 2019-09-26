<?php 
 if (!isset($_SESSION['admin_email'])) {
 	echo "<script>window.open('login.php','_self');</script>";
 }else{


?>
 
 <div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li class="active">
			<i class="fa fa-tachometer-alt fa-1x"></i>&nbsp;Dashboard/ Insert Box
			</li>
		</ol>
	</div>
</div><!--this end of the row-->
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">
					<i class="fas fa-edit"></i>&nbsp;Insert Box
				</h3>
			</div><!--end-->
			<div class="card-body">
				<form class="form-horizontal" action="" method="post">
					<div class="form-group row">
						<label class="col-md-3 control-label">Box Title:</label>
						<div class="col-md-6">
						<input type="text" name="box_title" class="form-control">
					</div>
				</div>
					<div class="form-group row">
						<label class="col-md-3 control-label">Box Description:</label>
						<div class="col-md-6">
						<textarea name="box_desc" class="form-control"></textarea>
					</div>
					</div>
					<div class="form-group row">
						<label class="col-md-3 control-label"></label>
						<div class="col-md-6">
						<input type="submit" name="submit" class="btn btn-success" value="Insert A Box">
					</div>
					</div>
				</form> 
			</div>
			</div>
		</div>
	</div>
	<?php
     if (isset($_POST['submit'])) {
     	$box_title = $_POST['box_title'];
     	$box_desc = $_POST['box_desc'];
     	$insert_box  ="insert into box_section(box_title,box_desc) value('$box_title','$box_desc')";
     	$run_box = mysqli_query($con,$insert_box);
    if ($run_box) {
    echo "<script>alert('NEW Box add successifully')</script>";
 	echo "<script>window.open('index.php?view_boxs','_self')</script>";
 }
     }
	 ?>
<?php } ?>
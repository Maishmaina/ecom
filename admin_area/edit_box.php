<?php 
 if (!isset($_SESSION['admin_email'])) {
 	echo "<script>window.open('login.php','_self');</script>";
 }else{


?>
 <?php
   if (isset($_GET['edit_box'])) {
   	$edit_box = $_GET['edit_box'];
   	$get_boxes = "select * from box_section where box_id='$edit_box'";
   	$run_boexs = mysqli_query($con,$get_boxes);
   	$row_boxes = mysqli_fetch_array($run_boexs);
   	$box_id=$row_boxes['box_id'];
   	$box_title=$row_boxes['box_title'];
   	$box_desc=$row_boxes['box_desc'];
   }
 ?>
 <div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li class="active">
			<i class="fa fa-tachometer-alt fa-1x"></i>&nbsp;Dashboard/ Edit Box
			</li>
		</ol>
	</div>
</div><!--this end of the row-->
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">
					<i class="fas fa-edit"></i>&nbsp;Edit Box
				</h3>
			</div><!--end-->
			<div class="card-body">
				<form class="form-horizontal" action="" method="post">
					<div class="form-group row">
						<label class="col-md-3 control-label">Box Title:</label>
						<div class="col-md-6">
						<input type="text" name="box_title" class="form-control" value="<?php  echo $box_title?>">
					</div>
				</div>
					<div class="form-group row">
						<label class="col-md-3 control-label">Box Description:</label>
						<div class="col-md-6">
						<textarea name="box_desc" class="form-control"><?php  echo $box_desc?></textarea>
					</div>
					</div>
					<div class="form-group row">
						<label class="col-md-3 control-label"></label>
						<div class="col-md-6">
						<input type="submit" name="update" class="btn btn-success" value="Update A Box">
					</div>
					</div>
				</form> 
			</div>
			</div>
		</div>
	</div>
	<?php
     if (isset($_POST['update'])) {
     	$box_title = $_POST['box_title'];
     	$box_desc = $_POST['box_desc'];
     	$update_box = "update box_section set box_title='$box_title',box_desc='$box_desc' where box_id='$box_id'";
     	$run_box = mysqli_query($con,$update_box);
     	if ($run_box) {
     		echo "<script>alert('One box has been Updated Successsifully')</script>";
     		echo "<script>window.open('index.php?view_boxs','_self')</script>";
     	}
     	
     }
	 ?>
<?php } ?>
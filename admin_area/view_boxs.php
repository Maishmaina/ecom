<?php 
 if (!isset($_SESSION['admin_email'])) {
 	echo "<script>window.open('login.php','_self');</script>";
 }else{


?>
<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li class="active">
			<i class="fa fa-tachometer-alt fa-1x"></i>&nbsp;Dashboard/ View Boxs.
			</li>
		</ol>
	</div>
</div><!--this end of the row-->
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">
					<i class="fas fa-crosshairs"></i>&nbsp; View Boxs
				</h3>
			</div>
			<div class="card">
			<div class="card-header">
				<h3 class="card-title">
					<i class="fas fa-money-bill-alt"></i>&nbsp; View Boxes
				</h3>
			</div>
			<div class="card-body row">
				<?php
               $get_boxes=  "select * from box_section"; 
               $run_boxes = mysqli_query($con,$get_boxes);
               while($row_boxes=mysqli_fetch_array($run_boxes)){
                 $box_id =$row_boxes['box_id'];
                 $box_title =$row_boxes['box_title']; 
                 $box_desc =$row_boxes['box_desc'];                
				?>
				<div class="col-md-4">
					<div class="card ">
						<div class="card-header bg-success">
						<h3 class="card-title" align="center">
							<?php echo $box_title;?>
						</h3>	
						</div>
						<div class="card-body">
							<?php echo $box_desc;?>
						</div>
						<div class="card-footer">
			 			<a class="btn btn-danger float-left" href="index.php?delete_box=<?php echo $box_id;?>"><i class="fas fa-trash-alt"></i>&nbsp;Delete</a>
			 			<a class="btn btn-warning float-right" href="index.php?edit_box=<?php echo $box_id;?>"><i class="fas fa-edit"></i>&nbsp;Edit</a>
			 			<div class="clearfix"></div>
			 		</div>
					</div>
				</div>
			<?php }?>
			</div><!--end of card-body-->
		</div>
		</div>
	</div>
</div>

<?php } ?>
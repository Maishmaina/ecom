<?php 
 if (!isset($_SESSION['admin_email'])) {
 	echo "<script>window.open('login.php','_self');</script>";
 }else{


?>

<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li class="active">
				<i class="fa fa-tachometer-alt fa-1x"></i>&nbsp;Dashboard/ View Slides
			</li>
		</ol>
	</div><!--end col-md-12-->
</div><!--end of the row-->
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">
					<i class="fas fa-eye"></i>&nbsp;View Slides
				</h3>
			</div>
			<div class="card-body row" >
			<?php
           $get_slides = "select * from slider";
           $run_slide=mysqli_query($con,$get_slides);
           while ($row_slides =mysqli_fetch_array($run_slide)) {
           $slide_id = $row_slides['slide_id'];
           $slide_name = $row_slides['slide_name'];
           $slide_image = $row_slides['slide_image'];
           
			 ?>	
			 <div class="col-md-4 mb-2">
			 	<div class="card">
			 		<div class="card-header bg-success">
			 			<h5 class="card-title">
			 				<?php echo $slide_name;?>
			 			</h5>
			 		</div>
			 		<div class="card-body">
			 			<img src="slider_images/<?php echo $slide_image?>" alt="" class="img-fluid  img-thumbnail" style="height:200px; width: 250px">
			 		</div>
			 		<div class="card-footer">
			 			<a class="btn btn-danger float-left" href="index.php?delete_slide=<?php echo $slide_id;?>"><i class="fas fa-trash-alt"></i>&nbsp;Delete</a>
			 			<a class="btn btn-warning float-right" href="index.php?edit_slide=<?php echo $slide_id;?>"><i class="fas fa-edit"></i>&nbsp;Edit</a>
			 			<div class="clearfix"></div>
			 		</div>
			 	</div>
			 </div><!--end of col-md-3-->

			<?php }?>
			</div>
		</div>
	</div>
</div>
<?php }?>
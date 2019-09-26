<?php 
 if (!isset($_SESSION['admin_email'])) {
 	echo "<script>window.open('login.php','_self');</script>";
 }else{


?>
<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li class="active">
				<i class="fa fa-tachometer-alt fa-1x"></i>&nbsp;Dashboard/ View Terms
			</li>
		</ol>
	</div><!--end col-md-12-->
</div><!--end of the row-->
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">
					<i class="fas fa-sliders-h"></i>&nbsp;View Terms
				</h3>
			</div>
			<div class="card-body row" >
				<?php
            $get_term="select * from terms";
            $run_terms = mysqli_query($con,$get_term);
            while ($row_term = mysqli_fetch_array($run_terms)) {
            
           $term_id = $row_term['term_id'];
           $term_title = $row_term['term_title'];
           $term_desc = $row_term['term_desc'];
          $term_desc = substr($row_term['term_desc'],0,180);
				?>
				<div class="col-md-4">
					<div class="card">
						<div class="card-header bg-primary">
							<h6 class="card-title" align="center">
								<?php echo $term_title;?>
							</h6>
						</div>
						<div class="card-body">
							<?php echo $term_desc;?>
						</div>
						<div class="card-footer">
							<a class="btn btn-light float-left text-danger" href="index.php?delete_term=<?php echo $term_id;?>"><i class="fas fa-trash-alt"></i>&nbsp;Delete</a>
			 			<a class="btn btn-light float-right text-warning" href="index.php?edit_term=<?php echo $term_id;?>"><i class="fas fa-edit"></i>&nbsp;Edit</a>
			 			<div class="clearfix"></div>
						</div>
					</div>
				</div>
			<?php }?>
				</div>
			</div>
		</div>
	</div>

<?php }?>
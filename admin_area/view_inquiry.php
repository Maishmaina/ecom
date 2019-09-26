<?php 
 if (!isset($_SESSION['admin_email'])) {
 	echo "<script>window.open('login.php','_self');</script>";
 }else{
?>
<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li class="active">
			<i class="fa fa-tachometer-alt fa-1x"></i>&nbsp;Dashboard/ View Inquiries.
			</li>
		</ol>
	</div>
</div><!--end of the first row-->
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">
					<i class="fas fa-american-sign-language-interpreting"></i>&nbsp; View Inquiries.
				</h3>
			</div><!--emd of the header-->
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th>Inquiry Id</th>
								<th>Inquiry Title</th>
								<th>Delete Inquiry</th>
								<th>Edit Inquiry</th>
							</tr>
						</thead>
						<tbody>
							<?php
          $i=0;
          $get_inquiry_types="select * from inquiry_types";
          $run_inquiry_types=mysqli_query($con,$get_inquiry_types);
          while ($row_inquiry_type=mysqli_fetch_array($run_inquiry_types)) {
    $inquiry_id=$row_inquiry_type['inquiry_id'];
    $inquiry_title=$row_inquiry_type['inquiry_title'];
    $i++;
          				?>
          				<tr>
          					<td><?php echo $i?></td>
          					<td><?php echo $inquiry_title?></td>
          		<td>
        		<a class="text-danger" href="index.php?delete_inquiry=<?php echo $inquiry_id?>"><i class="fas fa-trash"></i>Delete
        		
        	</a>
        	</td>
        	<td>
        		<a class="text-info" href="index.php?edit_inquiry=<?php echo $inquiry_id?>"><i class="fas fa-edit"></i>Edit
        		
        	</a>
        	</td>
          				</tr>

          			<?php }?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<?php }?>
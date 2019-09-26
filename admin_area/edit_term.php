<?php 
 if (!isset($_SESSION['admin_email'])) {
 	echo "<script>window.open('login.php','_self');</script>";
 }else{


?>
<?php 
if (isset($_GET['edit_term'])) {
	$edit_id = $_GET['edit_term'];
	$get_term = "select * from  terms where term_id ='$edit_id'";
	$run_term = mysqli_query($con,$get_term);
	$row_term = mysqli_fetch_array($run_term);
	$term_id = $row_term['term_id'];
	$term_title = $row_term['term_title'];
	$term_link = $row_term['term_link'];
	$term_desc = $row_term['term_desc'];
}
?>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-tachometer-alt fa-1x"></i>&nbsp;Dashboard/ Edit Term
			</li>
		</ol>
	</div><!--end col-md-12-->
</div><!--end of the row-->
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
			<h3 class="card-title">
				<i class="fas fa-jedi"></i>&nbsp;Edit Terms
			</h3>
		</div><!--end of the header-->
		<div class="card-body">
			<form action="" method="post" class="form-horizontal">
				<div class="form-group row">
				<label class="col-md-3">Term Title:</label>
				<div class="col-md-6">
					<input type="text" name="term_title" class="form-control" value="<?php echo $term_title;?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-md-3">Term Link:</label>
				<div class="col-md-6">
					<input class="form-control" name="term_link" type="text" value="<?php echo $term_link;?>">
				</div>
			</div>
            <div class="form-group row">
				<label class="col-md-3">Term Description:</label>
				<div class="col-md-6">
					<textarea name="term_desc" class="form-control">
						<?php echo $term_desc;?>
					</textarea>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-md-3"></label>
				<div class="col-md-6">
					<input type="submit" name="update" class="
					btn btn-success form-control" value="Update Terms Now">
				</div>
			</div>
				
			</form>
		</div><!--end of the -->
		</div>
	</div>
</div><!--this is the second row-->
<?php
  if (isset($_POST['update'])) {
    $term_title = $_POST['term_title'];
    $term_link = $_POST['term_link'];
    $term_desc = $_POST['term_desc'];
    $update_term ="update terms set term_title='$term_title', term_link='$term_link', term_desc='$term_desc' where term_id ='$term_id'";
    $run_term = mysqli_query($con,$update_term);
    if ($run_term) {
    	echo "<script>alert('One Term Updated Successifully')</script>";
        echo "<script>window.open('index.php?view_terms','_self')</script>";
    }
}
?>
<?php }?>
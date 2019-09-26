<?php 
 if (!isset($_SESSION['admin_email'])) {
 	echo "<script>window.open('login.php','_self');</script>";
 }else{


?>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-tachometer-alt fa-1x"></i>&nbsp;Dashboard/ Insert Term
			</li>
		</ol>
	</div><!--end col-md-12-->
</div><!--end of the row-->
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
			<h3 class="card-title">
				<i class="fas fa-balance-scale"></i>&nbsp;Insert Terms
			</h3>
		</div><!--end of the header-->
		<div class="card-body">
			<form action="" method="post" class="form-horizontal">
				<div class="form-group row">
				<label class="col-md-3">Term Title:</label>
				<div class="col-md-6">
					<input type="text" name="term_title" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-md-3">Term Link:</label>
				<div class="col-md-6">
					<input class="form-control" name="term_link" type="text">
				</div>
			</div>
            <div class="form-group row">
				<label class="col-md-3">Term Description:</label>
				<div class="col-md-6">
					<textarea name="term_desc" class="form-control"></textarea>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-md-3"></label>
				<div class="col-md-6">
					<input type="submit" name="submit" class="
					btn btn-success form-control" value="Submit Terms Now">
				</div>
			</div>
				
			</form>
		</div><!--end of the -->
		</div>
	</div>
</div><!--this is the second row-->
<?php
  if (isset($_POST['submit'])) {
    $term_title = $_POST['term_title'];
    $term_link = $_POST['term_link'];
    $term_desc = $_POST['term_desc'];
    $insert_term="insert into terms(term_title,term_link,term_desc) value('$term_title','$term_link','$term_desc')";
    $run_term = mysqli_query($con,$insert_term);
    if ($run_term) {
    echo "<script>alert('New Term has been Inserted Successifully')</script>";
    echo "<script>window.open('index.php?view_terms','_self')</script>";
  }
}
?>
<?php }?>
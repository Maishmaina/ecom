<?php 
 if (!isset($_SESSION['admin_email'])) {
 	echo "<script>window.open('login.php','_self');</script>";
 }else{


?>
<?php
 if (isset($_GET['delete_box'])) {
 	$delete_id = $_GET['delete_box'];
 	$delete_boxs = "delete from box_section where box_id='$delete_id'";
 	$run_delete = mysqli_query($con,$delete_boxs);
 	if ($run_delete) {
 		echo "<script>alert('One Box Has been Deleted Successifully');</script>";
 		echo "<script>window.open('index.php?view_boxs','_self')</script>";
 	}
 }
?>
<?php }?>
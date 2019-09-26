<?php 
 if (!isset($_SESSION['admin_email'])) {
 	echo "<script>window.open('login.php','_self');</script>";
 }else{


?>
<?php
 if (isset($_GET['delete_inquiry'])) {
 	$delete_id = $_GET['delete_inquiry'];
 	$delete_inquiry = "delete from inquiry_types where inquiry_id='$delete_id'";
 	$run_delete = mysqli_query($con,$delete_inquiry);
 	if ($run_delete) {
 		echo "<script>alert('One Inquiry Deleted successifully')</script>";
 		echo "<script>window.open('index.php?view_inquiry','_self')</script>";
 	}
 }
?>

<?php }?>
 <h1 class="text-center">Dou You realy want to delete This Account?</h1>
<form action="" method="post" class="text-center">
	<input type="submit" name="yes" value="Yes, I want To Delete!" class="btn btn-danger">
	<input type="submit" name="no" value="No, Remain!" class="btn btn-warning">
</form>
<?php
   $c_email = $_SESSION['customer_email'];
   if (isset($_POST['yes'])) {
   	$delete_customer = "delete from customers where customer_email='$c_email'";
   	$run_delete = mysqli_query($con,$delete_customer);
   	if ($run_delete) {
   	session_destroy();
   	echo "<script>alert('Your Account Has been Deleted Good By');</script>";
   	echo "<script>window.open('../index.php','_self');</script>";
   	}
   }
   if (isset($_POST['no'])) {
   	echo "<script>window.open('my_account.php?my_orders','_self');</script>";
   }
?>
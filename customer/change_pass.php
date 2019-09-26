<h2 class="text-center">Change Password</h2>
<form action="" method="post">
	<div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fab fa-cuttlefish"></i></div>
        </div>
        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter Your Current Password" name="old_pass">
      </div><!--end of the single input-->
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fab fa-cuttlefish"></i></div>
        </div>
        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter Your New Password" name="new_pass">
      </div><!--end of the single input-->
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fab fa-cuttlefish"></i></div>
        </div>
        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Re-Enter Your New Password" name="new_pass_again">
      </div><!--end of the single input-->
      <div class="text-center">
        <button class="btn btn-primary" type="submit" name="submit">
          <i class="fas fa-share-square"></i>Submit
        </button>
      </div>
</form>
<?php
  if (isset($_POST['submit'])) {
    $c_email=$_SESSION['customer_email'];
    $old_pass = $_POST['old_pass'];
    $new_pass = $_POST['new_pass'];
    $new_pass_again = $_POST['new_pass_again'];
  $select_old_pass = "select * from customers where customer_pass = '$old_pass'";
  $run_old_pass=mysqli_query($con,$select_old_pass);
  $check_old_pass =mysqli_num_rows($run_old_pass);
  if ($check_old_pass==0) {
  echo "<script>alert('Your current password is not Valid!');</script>";
  exit();
  }

if ($new_pass!=$new_pass_again) {
 echo "<script>alert('Your new Password Does Not Match');</script>";
}
$update_pass= "update customers set customer_pass='$new_pass' where customer_email='$c_email'";
$run_pass = mysqli_query($con,$update_pass);
if ($run_pass) {
  echo "<script>alert('Your password has been changed successifully');</script>";
  echo "<script>    window.open('my_account.php?my_orders','_self');</script>";
}
  }
?>
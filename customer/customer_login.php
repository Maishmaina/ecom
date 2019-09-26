<div class="card">
	<div class="card-header">
		<h1 class="text-center">Login</h1>
		<p class="lead text-center">Already Customer?</p>
<p class="text-muted">By making the attempt to login the system we expect that you have read and understood Teams and policies governing the system</p>
	</div><!--header end-->
<form class="form-group" action="checkout.php" method="POST">
	<div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fas fa-user"></i></div>
        </div>
        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Email" name="c_email" required>
      </div><!--single field-->
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fas fa-lock-open"></i></div>
        </div>
        <input type="password" class="form-control" id="inlineFormInputGroup" placeholder="Password" name="c_pass" required>
      </div><!--single field-->
      <h6 class="text-center"><a href="forgot_pass.php"> Forget Password</a></h6>
      <div class="text-center">

        <button class="btn btn-primary" type="submit" name="login">
          <i class="fas fa-sign-in-alt"></i>&nbsp;LOGIN
        </button>

      </div>
</form>
 <div class="text-center"><a href="customer_register.php"><h4>New? Register Here</h4></a></div>
</div>
<?php
if (isset($_POST['login'])) {
	$customer_email = $_POST['c_email'];
	$customer_pass = $_POST['c_pass'];
	$select_customer="SELECT * FROM customers WHERE customer_email = '$customer_email' AND customer_pass='$customer_pass'";
	$run_customer =mysqli_query($con,$select_customer); 
$get_ip = getRealUserIp();
$check_customer = mysqli_num_rows($run_customer);
 $select_cart = "SELECT * FROM cart WHERE p_add='$get_ip'";
 $run_cart = mysqli_query($con, $select_cart);
 $check_cart = mysqli_num_rows($run_cart);
 if ($check_customer==0) {
 	echo "<script>alert('Password AND email invalid')</script>";
 	exit();
 }
 if ($check_customer==1 AND $check_cart==0) {
 	$_SESSION['customer_email']=$customer_email;
 	echo "<script>alert('You are Logged in first')</script>";
 	echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";
 }else{
 	$_SESSION['customer_email']=$customer_email;
 	echo "<script>alert('You are Logged in continue')</script>";
 	echo "<script>window.open('checkout.php','_self')</script>";
 }
}
?>
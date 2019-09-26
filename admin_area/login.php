
<?php
session_start();
 include("include/db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Adm||Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;lang=en" /><!--for the google fonts-->

   <link rel="stylesheet" href="css/bootstrap.css"><!--bootstrap-->
  <link rel="stylesheet" href="awesomefonts/all.css"><!--webIcon-->
	<link rel="stylesheet" type="text/css" href="css/login.css"><!--my css styles-->
</head>
<body>
	<div class="container">
  <form action="" method="post" class="form-login">
  	<h2 class="form-login-heading">JKAdmin Login</h2>
  	<div class="input-group mb-2">
  	<div class="input-group-prepend">
  		<span class="input-group-text"><i class="fa fa-user"></i></span></div>
  	<input type="text" name="admin_email" class="form-control" placeholder="Email Address" required>
  	</div>
  	<div class="input-group mb-2">
  	<div class="input-group-prepend">
  		<span class="input-group-text"><i class="fa fa-key"></i></span></div>
  	<input type="password" name="admin_pass" class="form-control" placeholder="Password" required></div>
  	<button class="btn btn-lg btn-success btn-block" type="submit" name="admin_login">log in</button>
  </form>
	</div>

	<script src="awesomefonts/all.js"></script><!--WebIcons-->
<script src="js/bootstrapjquery.js"></script><!--jquerywork--> 
<script src="js/bootstrap.js"></script><!--bootstrap js-->

</body>
</html>

<?php
 if (isset($_POST['admin_login'])) {
 	$admin_email =mysqli_real_escape_string($con,$_POST['admin_email']);
 	$admin_pass = mysqli_real_escape_string($con,$_POST['admin_pass']);

 	$get_admin ="select * from admins where admin_email='$admin_email' AND admin_pass='$admin_pass'"; 
 	$run_admin = mysqli_query($con, $get_admin);
 	$count = mysqli_num_rows($run_admin);
 	if ($count==1) {
 		$_SESSION['admin_email']=$admin_email;
 		echo "<script>alert('Welcome Admin, Power on Your Hand');</script>";
 		echo "<script>window.open('index.php?dashboard','_self');</script>";
 		}
 		else{
 			echo "<script>alert('Something went WRONG Re-try!');</script>";
 		}	
 }
?>
<?php 
session_start();
if (!isset($_SESSION['customer_email'])) {
  echo "<script>window.open('../chechout.php','_self')</script>";
}else
     {


include("include/db.php");
include("function/functions.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>E||C</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;lang=en" /><!--for the google fonts-->

   <link rel="stylesheet" href="styles/bootstrap.css"><!--bootstrap-->
  <link rel="stylesheet" href="awesomefont/all.css"><!--webIcon-->
	<link rel="stylesheet" type="text/css" href="styles/style.css"><!--my css styles-->
</head>
<body>
	<div id="top">
	<div class="container">
		<div class="row">
	<div class="col-md-6 offer">
		<a href="#" class="btn btn-success btn-sm"><?php
   if (!isset($_SESSION['customer_email'])) {
    echo "Welcome Guest";
   }else{
    echo "Welcome ".$_SESSION['customer_email']."";
   }
    ?> </a>
		<a href="#">Shopping Cart Total Price Ksh <?php total_price();?>/=</a>
	</div>
	<div class="col-md-6">
		<ul class="menu text-white">
			<li class="px-2"><a href="../shop.php">Shop</a></li>
			<li class="px-2">       <?php 
   if (!isset($_SESSION['customer_email'])) {
     echo "<a  href='../checkout.php'>User Account</a>";
   }else{
    echo "<a   href='my_account.php?my_orders'>Account</a>";
   }
    ?></li>
			<li class="px-2"><a href="../cart.php">To Cart <button class="btn btn-dark text-danger px-1 py-0 btnEdit"><sup><?php items();?></sup></button></a></li>
			<li class="px-2"><a href="../customer_register.php">Register</a></li>
			<li class="px-2"><?php 
      if (!isset($_SESSION['customer_email'])) {
        echo "<a href='../checkout.php'>Login</a>";
      }else{
        echo "<a href='logout.php'>Logout</a>";
      }
         ?></li>
		</ul>
	</div>
	</div>
	</div>
</div><!--ends the top--->
<!--for lange computer system srt -->
<div class="container-fluid min-navbar">
<div class="container ">
  <nav class="navbar navbar-expand-lg navbar-light min-navbar">
    <a class="navbar-brand" href="../index.php">
    <img src="images/bid.jpg" alt="" class="img-fluid" width="100px" height="50px">
  </a>
   <form class="form-inline" method="GET" action="results.php">
      <div class="btn-search ml-5 mr-0">
        <button class="btn btn-success" type="button" onclick="document.getElementById('hide-search').style.display='block'"><i class="fa fa-search text-white"></i></button>
       </div>
     <div class="wrapper" id="hide-search">
      <div class="serach-box">
        <input type="text" class="input" placeholder="Search" name="user_query" required>
        <!-- <div class="btn-serach"> -->
          <button type="submit" class="editBtn btn-serach" name="search">
          <i class="fa fa-search text-white"></i></button>
        <!-- </div> -->
      </div>
    </div>  

    </form>
  <button class="navbar-toggler bg-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon "></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mx-auto">
      <li class="nav-item px-3">
        <a class="nav-link text-white" href="../index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active px-3">
        <a class="nav-link text-white" href="../shop.php">SHOP<button class="btn btn-success px-1 pb-0 btnEdit"><sup>1000<sup>+</sup></sup></button></a>
      </li>
      <li class=" nav-item px-3">
               <?php 
   if (!isset($_SESSION['customer_email'])) {
     echo "<a class='nav-link text-white' href='checkout.php'>User Account</a>";
   }else{
    echo "<a class='nav-link text-white'  href='my_account.php?my_orders'>Account</a>";
   }
    ?>
      </li>
       <li class="nav-item px-3">
        <a class="nav-link text-white" href="../cart.php"><img src="images/craticn.png" alt="" class="img-fluid" width="30px" height="30px"><button class="btn btn-danger px-1 py-0 btnEdit"><sup><?php items();?></sup></button></a>
      </li>
      <li class="nav-item dropdown px-3 floatz">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Jukali
        </a>
        <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="../about.php">About Us</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../contact.php">Contact Us</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../terms.php">Tearms and condition</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../services.php">Services</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
</div>
</div>
<!--for the lange compueters end hear end the navbar-->
<!--this is the working area of the shop content and the files within srt --->
<div id="content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ul class=" container kitchen card my-2">
          <li class="inlineshop"><a href="../index.php">Home</a></li>
          <li class="inlineshop text-danger">Account</li> 
        </ul>
      </div> 
      <div class="col-md-12">
       <?php
$c_email=$_SESSION['customer_email'];
$get_customer="select * from customers where customer_email='$c_email'";
$run_customer=mysqli_query($con,$get_customer);
$row_customer=mysqli_fetch_array($run_customer);
$customer_confirm_code=$row_customer['customer_confirm_code'];
$c_name=$row_customer['customer_name'];
if (!empty($customer_confirm_code)) {
         ?> 
         <div class="alert alert-danger">
           <strong>Waning:</strong>
           Please Confirm Your Email!, If not received Confirmation Email
           <a href="my_account.php?send_email" class="alert-link">Send Email again</a>

         </div>
     <?php }?>
      </div>
    </div><!--end of direction row--->
    <div class="row">
      <div class="col-md-3">
        <?php require 'include/sidebar.php';?>
      </div><!---end of the col-3--->
       <div class="col-md-9">
         <div class="card">
           <?php 
      if (isset($_GET[$customer_confirm_code])) {
        $update_cusromer="update customers set customer_confirm_code='' where customer_confirm_code='$customer_confirm_code'";
        $run_confirm=mysqli_query($con,$update_cusromer);
        echo "<script>alert('Your Email and Password Confirmed Successifully')</script>";
        echo "<script>window.open('my_account.php?my_orders','_self')</script>";
       
      }
      if (isset($_GET['send_email'])) {
          $customer_confirm_code=mt_rand();
  $subject="Email Confirmation Code";
  $from="simpledaniel.1818@gmail.com";
  $message="
  <h2>
Email Confirmation By Online-Store.com $c_name
  </h2>
  <a href='localhost/ecom/customer/my_account.php?$customer_confirm_code'>Click To Confoirm</a>
  ";
  $headers="From: $from\r\n";
  $headers .="Content-type: text/html\r\n";
  mail($c_email, $subject, $message,$headers);
  echo "<script>alert('Your Confirmation Email sent, Check your inbox')</script>";
  echo "<script>window.open('my_account.php?my_orders','_self')</script>";
      }
           if(isset($_GET['my_orders'])){
           include("my_orders.php");
         } 
         if(isset($_GET['pay_offline'])){
         include("pay_offline.php");
       }
       if(isset($_GET['edit_account'])){
       include("edit_account.php");
     }
     if(isset($_GET['change_pass'])){
     include("change_pass.php");
   }   
   if(isset($_GET['delete_account'])){
   include("delete_account.php");
 }
 if (isset($_GET['my_wishlist'])) {
   include("my_wishlist.php");
 }
 if (isset($_GET['delete_wishlist'])) {
   include("delete_wishlist.php");
 }
         ?> 
         </div>
       </div>

        </div><!--end of the class container--->
</div><!--end of the ud contaioner-->
<!--this is the working area of the shop content and the files within ends --->
<!--create the footer content srt--->
<?php include("include/footer.php");?>
<!--create the footer content end-->
  <script src="awesomefont/all.js"></script><!--WebIcons-->
<script src="js/bootstrapjquery.js"></script><!--jquerywork--> 
<script src="js/bootstrap.js"></script><!--bootstrap js-->
 <script>  /* script animater for the search icon*/
    $(document).ready(function(){
      $('.btn-serach').click(function(){
        $(".input").toggleClass("active").focus().val("");
        $(this).toggleClass("animate");
      });
    });
  </script>
</body>
</html>
<?php }?>
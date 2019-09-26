<?php 
session_start();
if (!isset($_SESSION['customer_email'])) {
  echo "<script>window.open('../chechout.php','_self')</script>";
}else
     {

include("include/db.php");
include("function/functions.php");
if (isset($_GET['order_id'])) {
  $order_id=$_GET['order_id'];
}
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
     echo "<a  href='checkout.php'>User Account</a>";
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
    </div><!--end of direction row--->
    <div class="row">
      <div class="col-md-3">
        <?php require 'include/sidebar.php';?>
      </div><!---end of the col-3--->
        <div class="col-md-9">
          <div class="card">
            <h2 class="text-center">Please Confirm Payment</h2>
            <form action="confirm.php?update_id=<?php echo $order_id; ?>" method="post" enctype="multiple/form_data">
        <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="far fa-envelope"></i></div>
        </div>
        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Invoice No." name="invoice_no">
      </div><!--end of the single input-->
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="far fa-envelope"></i></div>
        </div>
        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Amount Sent" name="amount_sent">
      </div><!--end of the single input-->
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="far fa-envelope"></i></div>
        </div>
        <select name="payment_mode" class="form-control" >
          <option>Select Payment</option>
          <option>Bank Code</option>
          <option>M-Express</option>
          <option>Airtel Money</option>
          <option>Western Union</option>
        </select>
      </div><!--end of the single input-->
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="far fa-envelope"></i></div>
        </div>
        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Transaction/Reference id" name="ref_no">
      </div><!--end of the single input-->
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="far fa-envelope"></i></div>
        </div>
        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="M-Express Code" name="code">
      </div><!--end of the single input-->
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="far fa-envelope"></i></div>
        </div>
        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Payment Date" name="date">
      </div><!--end of the single input-->
       <div class="text-center">
         <button class="btn btn-success" type="submit" name="confirm_payment">
          <i class="fas fa-share-square"></i>Confirm Payment
         </button>
       </div>
            </form>
            <?php
       if (isset($_POST['confirm_payment'])) {
        $update_id = $_GET['update_id'];
        $invoice_no = $_POST['invoice_no'];
        $amount = $_POST['amount_sent'];
        $payment_mode = $_POST['payment_mode'];
        $ref_no = $_POST['ref_no'];
        $code= $_POST['code'];
        $payment_date = $_POST['date'];

        $complete = "Complete";
        $insert_payment = "insert into payments(invoice_no,amount,payment_mode,ref_no,code,payment_date)values('$invoice_no','$amount','$payment_mode','$ref_no','$code','$payment_date')";
        $run_payment=mysqli_query($con,$insert_payment);

        $update_pending_order = "update pending_orders set order_status='$complete' where order_id='$update_id'";
        $run_pending_order = mysqli_query($con,$update_pending_order);

        $update_customer_order = "update customer_orders set order_status='$complete' where order_id='$update_id'";
        $run_customer_order = mysqli_query($con,$update_customer_order);
        if ($run_pending_order) {
          echo "<script>alert('Payment Received successifully, order will be completed within 24 hours');</script>";
          echo "<script>window.open('my_account.php?my_orders','_self');</script>";
        }
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
<?php } ?>
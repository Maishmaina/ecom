<?php 
session_start();
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
  <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
	<div id="top">
	<div class="container">
		<div class="row">
	<div class="col-md-6 offer">
		<a href="#" class="btn btn-success btn-sm">
    <?php
   if (!isset($_SESSION['customer_email'])) {
    echo "Welcome Guest";
   }else{
    echo "Welcome ".$_SESSION['customer_email']."";
   }
    ?>  
    </a>
		<a href="#">Shopping Cart Total Price Ksh <?php total_price();?>/=</a>
	</div>
	<div class="col-md-6">
		<ul class="menu text-white">
			<li class="px-2"><a href="shop.php">Shop</a></li>
			<li class="px-2">       <?php 
   if (!isset($_SESSION['customer_email'])) {
     echo "<a href='checkout.php'>User Account</a>";
   }else{
    echo "<a  href='customer/my_account.php?my_orders'>Account</a>";
   }
    ?></li>
			<li class="px-2"><a href="cart.php">To Cart <button class="btn btn-dark text-danger px-1 py-0 btnEdit"><sup><?php items();?></sup></button></a></li>
			<li class="px-2"><a href="customer_register.php">Register</a></li>
			<li class="px-2">
      <?php 
      if (!isset($_SESSION['customer_email'])) {
        echo "<a href='checkout.php'>Login</a>";
      }else{
        echo "<a href='logout.php'>Logout</a>";
      }
         ?>
        </li> 
		</ul>
	</div>
	</div>
	</div>
</div><!--ends the top--->
<!--for lange computer system srt -->
<div class="container-fluid min-navbar">
<div class="container ">
  <nav class="navbar navbar-expand-lg navbar-light min-navbar">
    <a class="navbar-brand" href="index.php">
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
        <a class="nav-link text-white" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active px-3">
        <a class="nav-link text-white" href="shop.php">SHOP<button class="btn btn-success px-1 pb-0 btnEdit"><sup>1000<sup>+</sup></sup></button></a>
      </li>
      <li class=" nav-item px-3">
               <?php 
   if (!isset($_SESSION['customer_email'])) {
     echo "<a class='nav-link text-white' href='checkout.php'>User Account</a>";
   }else{
    echo "<a class='nav-link text-white'  href='customer/my_account.php?my_orders'>Account</a>";
   }
    ?>
      </li>
       <li class="nav-item px-3">
        <a class="nav-link text-white" href="shop.php"><img src="images/craticn.png" alt="" class="img-fluid" width="30px" height="30px"><button class="btn btn-danger px-1 py-0 btnEdit"><sup><?php items();?></sup></button></a>
      </li>
      <li class="nav-item dropdown px-3 floatz">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Jukali
        </a>
        <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="about.php">About Us</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="contact.php">Contact Us</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="terms.php">Tearms and condition</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="services.php">Services</a>
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
          <li class="inlineshop"><a href="index.php">Home</a></li>
          <li class="inlineshop text-danger">Register</li> 
        </ul>
      </div>
    </div><!--end of direction row--->
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="text-center">1000<sup>+</sup> Customers</h3>
          </div>
          <div class="card-body">
            <form class="form-group" action="customer_register.php" method="POST" enctype="multipart/form-data">
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="far fa-user"></i></div>
        </div>
        <input type="text" class="form-control"  placeholder="Username" name="c_name" required>
      </div><!--single field-->
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="far fa-envelope"></i></div>
        </div>
        <input type="text" class="form-control"  placeholder="Email" name="c_email">
      </div><!--end of the single input-->
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fab fa-cuttlefish"></i></div>
        </div>
        <input id="pass" type="password" class="form-control" placeholder="Password" name="c_pass">
         <div id="meter_wrapper">
              <span id="pass_type"></span>
              <div id="meter"></div>
           </div>
        <span class="input-group-append">
          <div class="input-group-text"><i class="fas fa-check tick1"></i>
           <i class="fas fa-times cross1"></i>
           </div></span>
      </div><!--end of the single input-->
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fab fa-cuttlefish"></i></div>
        </div>
        <input id="con_pass" type="password" class="form-control confirm" placeholder="Confirm Password" required>
        <span class="input-group-append">
          <div class="input-group-text"><i class="fas fa-check tick2"></i>
           <i class="fas fa-times cross2"></i>
           </div>
        </span>
      </div><!--end of the single input-->
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fab fa-cuttlefish"></i></div>
        </div>
        <input type="text" class="form-control"  placeholder="County" name="c_county">
      </div><!--end of the single input-->
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fab fa-cuttlefish"></i></div>
        </div>
        <input type="text" class="form-control"  placeholder="City" name="c_city">
      </div><!--end of the single input-->
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fab fa-cuttlefish"></i></div>
        </div>
        <input type="number" class="form-control"  placeholder="Phone Number" name="c_contact">
      </div><!--end of the single input-->
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fab fa-cuttlefish"></i></div>
        </div>
        <input type="text" class="form-control"  placeholder="Address" name="c_address">
      </div><!--end of the single input-->
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fab fa-cuttlefish"></i></div>
        </div>
        <input type="file" class="form-control"  name="c_image">
      </div><!--end of the single input-->
      <div class="input-group mb-2">
        <div class="mx-auto">Captcha Verification</div>
        <div class="g-recaptcha mx-auto" data-sitekey="6Lc-WxYUAAAAAFUhTFfBEzLGmEgRXHHdsD4ECvIC"></div>
        <!-- Please past the content of the google recsaptcha -->
      </div><!--end of the single input-->
      <div class="text-center">
        <button class="btn btn-primary" type="submit" name="register">
          <i class="fas fa-share-square"></i>Submit
        </button>
      </div>
            </form>
          </div>
        </div>
      </div><!---end of col-12 contact us--->
        </div><!--end of the class container--->
</div><!--end of the ud contaioner-->
<!--this is the working area of the shop content and the files within ends --->
<!--create the footer content srt--->
<?php include("include/footer.php");?>
<!--create the footer content end-->
  <script src="awesomefont/all.js"></script><!--WebIcons-->
<!--<script src="js/bootstrapjquery.js"></script>--><!--jquerywork--> 
<!--<script src="js/bootstrap.js"></script>--><!--bootstrap js-->
<script src="js/jquery.min.js"> </script>
<script src="js/bootstrap.min.js"></script>
 <script>  /* script animater for the search icon*/
    $(document).ready(function(){
      $('.btn-serach').click(function(){
        $(".input").toggleClass("active").focus().val("");
        $(this).toggleClass("animatez");
      });
    });
  </script>
  <script>
    $(document).ready(function(){
      $('.tick1').hide();
       $('.cross1').hide();
        $('.tick2').hide();
         $('.cross2').hide();

$('.confirm').focusout(function(){
  var password= $('#pass').val();
  var confirmPassword= $('#con_pass').val();
  if (password==confirmPassword) {
    $('.tick1').show();
    $('.cross1').hide();
    $('.tick2').show();
    $('.cross2').hide();
  }else{
    $('.tick1').hide();
    $('.cross1').show();
    $('.tick2').hide();
    $('.cross2').show();
  }

});

    });
  </script>
  <script>
    $(document).ready(function(){

$("#pass").keyup(function(){

check_pass();

});

});

function check_pass() {
 var val=document.getElementById("pass").value;
 var meter=document.getElementById("meter");
 var no=0;
 if(val!="")
 {
// If the password length is less than or equal to 6
if(val.length<=6)no=1;

 // If the password length is greater than 6 and contain any lowercase alphabet or any number or any special character
  if(val.length>6 && (val.match(/[a-z]/) || val.match(/\d+/) || val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)))no=2;

  // If the password length is greater than 6 and contain alphabet,number,special character respectively
  if(val.length>6 && ((val.match(/[a-z]/) && val.match(/\d+/)) || (val.match(/\d+/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)) || (val.match(/[a-z]/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/))))no=3;

  // If the password length is greater than 6 and must contain alphabets,numbers and special characters
  if(val.length>6 && val.match(/[a-z]/) && val.match(/\d+/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/))no=4;

  if(no==1)
  {
   $("#meter").animate({width:'50px'},300);
   meter.style.backgroundColor="red";
   document.getElementById("pass_type").innerHTML="Very Weak";
  }

  if(no==2)
  {
   $("#meter").animate({width:'100px'},300);
   meter.style.backgroundColor="#F5BCA9";
   document.getElementById("pass_type").innerHTML="Weak";
  }

  if(no==3)
  {
   $("#meter").animate({width:'150px'},300);
   meter.style.backgroundColor="#FF8000";
   document.getElementById("pass_type").innerHTML="Good";
  }

  if(no==4)
  {
   $("#meter").animate({width:'200px'},300);
   meter.style.backgroundColor="#00FF40";
   document.getElementById("pass_type").innerHTML="Strong";
  }
 }

 else
 {
  meter.style.backgroundColor="";
  document.getElementById("pass_type").innerHTML="";
 }
}
  </script>
</body>
</html>
<?php
if (isset($_POST['register'])) {
  $c_name = $_POST['c_name'];
  $c_email = $_POST['c_email'];
  $c_pass = $_POST['c_pass'];
  $c_county = $_POST['c_county'];
  $c_city = $_POST['c_city'];
  $c_contact = $_POST['c_contact'];
  $c_address = $_POST['c_address'];
  $c_image = $_FILES['c_image']['name'];
  $c_image_tmp = $_FILES['c_image']['tmp_name'];
  $c_ip = getRealUserIp();
  move_uploaded_file($c_image_tmp,"customer/customer_image/$c_image");
  $get_email = "select * from customers where customer_email='$c_email'";
  $run_email=mysqli_query($con,$get_email);
  $check_email=mysqli_num_rows($run_email);
  if ($check_email==1) {
    echo "<script>alert('Email Already Exist, Try Another one!');</script>";
    exit();
  }
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

  $insert_customer= "INSERT INTO customers (customer_name,customer_email,customer_pass,customer_county,customer_city,customer_contact,customer_address,customer_image,customer_ip,customer_confirm_code)VALUES('$c_name','$c_email','$c_pass','$c_county','$c_city','$c_contact','$c_address','$c_image','$c_ip','$customer_confirm_code')";
   $run_customer = mysqli_query($con,$insert_customer);

   $sel_cart = "SELECT * FROM cart WHERE p_add='$c_ip'";
   $run_cart=mysqli_query($con,$sel_cart);
   $check_cart = mysqli_num_rows($run_cart);
   if ($check_cart > 0) {
     $_SESSION['customer_email']=$c_email;
    echo "<script>alert('Registered successfully')</script>";
    echo "<script>window.open('checkout.php','_self')</script>";
   }else{
      $_SESSION['customer_email']=$c_email;
    echo "<script>alert('Registered successfully')</script>";
    echo "<script>window.open('index.php','_self')</script>";
   }
}
?> 
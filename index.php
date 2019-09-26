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
    ?></a>
		<a href="#">Shopping Cart Total Price Ksh <?php total_price();?>/=</a>
	</div>
	<div class="col-md-6">
		<ul class="menu text-white">
			<li class="px-2"><a href="shop.php">Shop</a></li>
			<li class="px-2">
    <?php 
   if (!isset($_SESSION['customer_email'])) {
     echo "<a href='checkout.php'>Account</a>";
   }else{
    echo "<a href='customer/my_account.php?my_orders'>Account</a>";
   }
    ?>
    </li>
			<li class="px-2"><a href="cart.php">To Cart <button class="btn btn-dark text-danger px-1 py-0 btnEdit"><sup><?php items();?></sup></button></a></li>
			<li class="px-2"><a href="customer_register.php">Register</a></li>
			<li class="px-2"><?php 
      if (!isset($_SESSION['customer_email'])) {
        echo "<a href='checkout.php'>Login</a>";
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
    <a class="navbar-brand" href="index.php">
    <img src="images/bid.jpg" alt="" class="img-fluid" width="100px" height="50px">
  </a>
   <form class="form-inline" method="GET" action="results.php">
      <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
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
      <li class="nav-item active px-3">
        <a class="nav-link text-white" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item px-3">
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
<!--for the lange compueters end hear-->
<!--this is the content of the next section /////slider srt--->
<div class="container"> <div class="row"><div class="col-md-8">
<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
  <div class="carousel-inner">
      <?php
    $get_slides="SELECT * FROM slider LIMIT 0,1";
    $run_slides = mysqli_query($con,$get_slides);
    while($row_slides=mysqli_fetch_array($run_slides)){
      $slide_name = $row_slides["slide_name"];
      $slide_image = $row_slides["slide_image"];
      $slide_url = $row_slides['slide_url'];
      ?>
    
   <div class="carousel-item active">
      <a href="<?php echo $slide_url; ?>"><img src="admin_area/slider_images/<?php echo $slide_image ;?>" class="d-block w-100" alt="jua kali" height="320px"></a>
       <div class="carousel-caption d-none d-md-block">
     <h1 class="text-light"><?php echo $slide_name ;?></h1>
   </div>
    </div>
      
   <?php }?>

   <?php
   $get_slides = "SELECT * FROM slider LIMIT 1,4";
   $run_slides = mysqli_query($con, $get_slides);
   while($row_slides= mysqli_fetch_array($run_slides)){
    $slide_name = $row_slides['slide_name'];
    $slide_image = $row_slides['slide_image'];
    $slide_url = $row_slides['slide_url'];
   
   ?>
    <div class="carousel-item">
      <a href="<?php echo $slide_url; ?>"><img src="admin_area/slider_images/<?php echo $slide_image ;?>" class="d-block w-100" alt="jua kali" height="320px"></a>
       <div class="carousel-caption d-none d-md-block">
     <h1 class="text-light"><?php echo $slide_name ;?></h1>
   </div>
    </div>
      
   <?php }?>
   
  </div>
  <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div><!---end carousel innser content --->
</div>
<div class="col-md-4">
  <div class="row">
    <div class="col-md-12">
        <div class="card card-body">
          <div id="carouselExampleControls" class="carousel slide slidez" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="text-center carousel-text text-dark">
          <h3><a href="#">CUSTOMERS</a></h3>
            <p class="px-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel repellat est atque?</p>
          </div>
          </div><!--end of the single carousel-->
          <div class="carousel-item ">
            <div class="text-center carousel-text text-dark">
          <h3><a href="#">PRODUCTS</a></h3>
            <p class="px-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel repellat est atque?</p>
          </div>
          </div><!--end of the single carousel-->
        </div>
           <a class="carousel-control-prev bg-primary" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next bg-primary" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
          </div><!--end of the entire carousel-->
        </div><!---end of the clas card--->
      </div><!--end of the second col 4 div--->
      <div class="row alignadd  ml-3">
        <div class="col-md-12 text-center">
          <h2 class="text-info">Get Todays Best Pro. </h2>
          <a href="detail.php" class="alignaddlink text-light">This  
          <img src="admin_area/products_imges/product1.jpg" class="img-fluid" alt=""  height="90px" width="90px"> Made Today purchase
        </a>
        </div><!---the additional col-12 info-->
      </div>
  </div>
</div></div>
</div><!--end of the container with col-9 and 3--->
<!--this is the content of the next section /////slider end--->
<!--create the more information card srt--->
<div id="advantages" class="mt-2">
  <div class="container">
    <div class="row">
      <?php
     $get_box="select * from box_section";
     $run_box=mysqli_query($con,$get_box);
     while($run_box_section=mysqli_fetch_array($run_box)){
      $box_id=$run_box_section['box_id'];
      $box_title=$run_box_section['box_title'];
      $box_desc=$run_box_section['box_desc'];


      ?>
      <div class="col-md-4">
        <div class="card card-body">
              <div class="icon">
            <i class="fa fa-heart"></i>
          </div>
           <div class=" slidez">
          <div class="">
            <div class="">
              <div class="text-center carousel-text text-dark">
          <h3><a href="#"><?php echo $box_title?></a></h3>
            <p class="px-5"><?php echo $box_desc?></p>
          </div>
          </div><!--end of the single carousel-->
        </div>
          </div><!--end of the entire carousel-->
        </div><!--end of the card--->
       </div>
<?php }?>
        <!---endof the col-4--->
      <!--end of the firts col-4-->

    </div><!--end of the row--->
  </div><!--end of the container--->
</div> <!--end of the of the advantage div--> 
<!--create the more information card end--->
<!----this is the hot dealof the week srt----->
<div id="hot">
   <div class="container">
     <div class="row card my-2">
       <div class="col-md-12">
         <h2>HOT REAL TIME DEALS </h2>
       </div>
     </div>
   </div><!--end of the card--->
</div><!---end hot class-->
<!----this is the hot dealof the week srt----->
<!--this is the caterog for thr products srt--->
<!--this us where the work for the PHP  srt+++++++++++++++++++++++++++++++++++++++++++++*====================--->
 <div class="container" id="container">
  <div class="row">
 <?php
 getPro();
 ?>
</div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-12 cliper-cat">
     <h3 class="text-center" > Out Store have Vast Products...See Recommeded</h3>
    </div>
  </div>
</div>
<!--get addition product for sales endz--->
<!--the more product div srt--->
<div class="container">
  <div class="row bg-store">
    <div class="col-md-9">
      <div class="row">
        <div class="col-md-3">
          <a href="detail.php">
            <img src="admin_area/products_imges/product10.jpg" alt="" class="img-fluid">
          </a>
          <h3><a href="detail.php">Best Shoes</a></h3>
          <div class="text-info">Kshs 1000/=</div>
          <p class="button">
            <a href="detail.php" class="btn btn-info"> View Detail</a>
            <a href="detail.php" class="btn btn-success"> <i class="fa fa-shopping-cart"></i></a>
        </div>
        <div class="col-md-3">
          <a href="detail.php">
            <img src="admin_area/products_imges/product10.jpg" alt="" class="img-fluid">
          </a>
          <h3><a href="detail.php">Best Shoes</a></h3>
          <div class="text-info">Kshs 1000/=</div>
          <p class="button">
            <a href="detail.php" class="btn btn-info"> View Detail</a>
            <a href="detail.php" class="btn btn-success"> <i class="fa fa-shopping-cart"></i></a>
        </div>
        <div class="col-md-3">
          <a href="detail.php">
            <img src="admin_area/products_imges/product10.jpg" alt="" class="img-fluid">
          </a>
          <h3><a href="detail.php">Best Shoes</a></h3>
          <div class="text-info">Kshs 1000/=</div>
          <p class="button">
            <a href="detail.php" class="btn btn-info"> View Detail</a>
            <a href="detail.php" class="btn btn-success"> <i class="fa fa-shopping-cart"></i></a>
        </div>
        <div class="col-md-3">
          <a href="detail.php">
            <img src="admin_area/products_imges/product10.jpg" alt="" class="img-fluid">
          </a>
          <h3><a href="detail.php">Best Shoes</a></h3>
          <div class="text-info">Kshs 1000/=</div>
          <p class="button">
            <a href="detail.php" class="btn btn-info"> View Detail</a>
            <a href="detail.php" class="btn btn-success"> <i class="fa fa-shopping-cart"></i></a>
        </div>
      </div><!---for the inner image  of row-->
      <div class="row">
        <div class="col-md-3">
          <a href="detail.php">
            <img src="admin_area/products_imges/product10.jpg" alt="" class="img-fluid">
          </a>
          <h3><a href="detail.php">Best Shoes</a></h3>
          <div class="text-info">Kshs 1000/=</div>
          <p class="button">
            <a href="detail.php" class="btn btn-info"> View Detail</a>
            <a href="detail.php" class="btn btn-success"> <i class="fa fa-shopping-cart"></i></a>
        </div>
        <div class="col-md-3">
          <a href="detail.php">
            <img src="admin_area/products_imges/product10.jpg" alt="" class="img-fluid">
          </a>
          <h3><a href="detail.php">Best Shoes</a></h3>
          <div class="text-info">Kshs 1000/=</div>
          <p class="button">
            <a href="detail.php" class="btn btn-info"> View Detail</a>
            <a href="detail.php" class="btn btn-success"> <i class="fa fa-shopping-cart"></i></a>
        </div>
        <div class="col-md-3">
          <a href="detail.php">
            <img src="admin_area/products_imges/product10.jpg" alt="" class="img-fluid">
          </a>
          <h3><a href="detail.php">Best Shoes</a></h3>
          <div class="text-info">Kshs 1000/=</div>
          <p class="button">
            <a href="detail.php" class="btn btn-info"> View Detail</a>
            <a href="detail.php" class="btn btn-success"> <i class="fa fa-shopping-cart"></i></a>
        </div>
        <div class="col-md-3">
          <a href="detail.php">
            <img src="admin_area/products_imges/product10.jpg" alt="" class="img-fluid">
          </a>
          <h3><a href="detail.php">Best Shoes</a></h3>
          <div class="text-info">Kshs 1000/=</div>
          <p class="button">
            <a href="detail.php" class="btn btn-info"> View Detail</a>
            <a href="detail.php" class="btn btn-success"> <i class="fa fa-shopping-cart"></i></a>
        </div>
      </div><!---for the inner image  of row-->
    </div><!--all image div end---->
    <div class="col-md-3">
      <img src="admin_area/products_imges/product9.jpg" alt="" class="img-fluid w-100" height="20px" width="20px" >
      <h3><a href="detail.php">Best Shoes</a></h3>
    </div><!--full div image end --->
  </div>
</div>
<!--the more product div end--->
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
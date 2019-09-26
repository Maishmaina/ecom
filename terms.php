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
<!--add inner code srt-->
<div id="content">
 <div class="container">
  <div class=" card row">
    <div class="col-md-12">
      <ul class="breadcrumb">
        <li><a href="index.php">Home </a></li>
        <li> Term And Condition | Refund Policy</li>
      </ul>
    </div>
  </div>
    <div class="row">
    <div class="col-md-3">
      <div class="card">
        <ul class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <?php
          $get_term = "select * from terms LIMIT 0,1";
          $run_term = mysqli_query($con,$get_term);
          while ($row_terms = mysqli_fetch_array($run_term)) {
           
           $term_title = $row_terms['term_title'];
           $term_link = $row_terms['term_link'];        
          ?>
          <li class="nav-item">
          <a id="v-pills-home-tab" data-toggle="pill" class="nav-link active" href="#<?php echo $term_link;?>" role="tab" aria-controls="v-pills-home" aria-selected="true">
              <?php echo $term_title;?>
            </a>
          </li>
          <?php }?>
          <?php
          $count_terms = "select * from terms";
          $rum_count = mysqli_query($con,$count_terms);
          $count=  mysqli_num_rows($rum_count);
          $get_terms = "select * from terms LIMIT 1,$count";
          $run_terms = mysqli_query($con,$get_terms);
          while ($row_terms = mysqli_fetch_array($run_terms)) {
            $term_title =$row_terms['term_title'];
            $term_link =$row_terms['term_link'];
            ?>
            <li class="nav-item">
            <a data-toggle="pill" class="nav-link" href="#<?php echo $term_link;?>" id="v-pills-profile-tab" role="tab" aria-controls="v-pills-profile" aria-selected="false">
              <?php echo $term_title;?>
            </a>
          </li>
          <?php }?>
        </ul>
      </div>
    </div><!--end of the col-md-3-->
    <div class="col-md-9">
      <div class="card">
        <div class="tab-content" id="v-pills-tabContent">
          <?php
           $get_terms = "select * from terms LIMIT 0,1";
           $run_terms = mysqli_query($con,$get_terms);
           while ($row_terms=mysqli_fetch_array($run_terms)) {
              $term_title = $row_terms['term_title'];
              $term_desc = $row_terms['term_desc'];
              $term_link = $row_terms['term_link'];            

           
          ?>
          <div id="<?php echo $term_link;?>" class="tab-pane fade show active" role="tabpanel" aria-labelledby="v-pills-home-tab">
            <h2><?php echo $term_title;?></h2>
            <p><?php echo $term_desc;?></p>
          </div>
        <?php }?>
        <?php
      $count_terms = "select * from terms";
      $run_count = mysqli_query($con,$count_terms);
      $count = mysqli_num_rows($run_count);
      $get_terms = "select * from terms LIMIT 1,$count";
      $run_terms = mysqli_query($con,$get_terms);
      while ($row_terms = mysqli_fetch_array($run_terms)) {
       $term_title = $row_terms['term_title'];
       $term_desc = $row_terms['term_desc'];
       $term_link = $row_terms['term_link'];
        ?>
        <div id="<?php echo $term_link;?>" class="tab-pane fade" role="tabpanel" aria-labelledby="v-pills-profile-tab">
         <h2><?php echo $term_title;?></h2>
         <p><?php echo $term_desc;?></p>
        </div>
      <?php }?>
        </div>
      </div>
    </div>
  </div>
 </div>
</div>
<!--add inner code end-->
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
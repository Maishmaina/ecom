
<?php 
session_start();
include("include/db.php");
include("function/functions.php");
?>
<?php  
  $product_id= $_GET['pro_id'];
  $get_product = "select * from products where product_url='$product_id'";
$run_product = mysqli_query($db,$get_product);
$check_product = mysqli_num_rows($run_product);
if ($check_product==0) {
  echo "<script>window.open('index.php','_self');</script>";
}else{

$row_product = mysqli_fetch_array($run_product);
$p_cat_id = $row_product['p_cat_id'];
$pro_id = $row_product['product_id'];
$pro_title= $row_product['product_title'];
$pro_price = $row_product['product_price'];
$pro_desc = $row_product['product_desc'];
$pro_img1 = $row_product['product_img1'];
$pro_img2 = $row_product['product_img2'];
$pro_img3 = $row_product['product_img3'];
$pro_label=$row_product['product_label'];
$pro_psp_price = $row_product['product_psp_price'];
$pro_features = $row_product['product_features'];
$pro_video = $row_product['product_video'];
$status=$row_product['status'];
$pro_url=$row_product['product_url'];
if ($pro_label ==""){}else{
        $product_label="
 <a href='#' style='color:black;' class='label sale'>
  <div class='thelabel'>$pro_label</div>
  <div class='label-backgroud'></div>
 </a>
        ";
      }
$get_p_cat="select * from product_categories where p_cat_id='$p_cat_id'";
$run_p_cat= mysqli_query($db,$get_p_cat);
$row_p_cat = mysqli_fetch_array($run_p_cat);
$p_cat_title =$row_p_cat['p_cat_title'];

 ?><!DOCTYPE html>
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
     echo "<a  href='checkout.php'>User Account</a>";
   }else{
    echo "<a  href='customer/my_account.php?my_orders'>Account</a>";
   }
    ?></li>
			<li class="px-2"><a href="cart.php">To Cart <button class="btn btn-dark text-danger px-1 py-0 btnEdit"><sup><?php items();?></sup></button></a></li>
			<li class="px-2"><a href="customers_register.php">Register</a></li>
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
        <a class="nav-link text-white" href="cart.php"><img src="images/craticn.png" alt="" class="img-fluid" width="30px" height="30px"><button class="btn btn-danger px-1 py-0 btnEdit"><sup><?php items();?></sup></button></a>
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
          <li class="inlineshop text-danger">Shop</li> 
          <li class="inlineshop text-danger"><a href="shop.php?p_cat=<?php echo $p_cat_id;?>"><?php echo $p_cat_title;?></a></li>
          <li class="inlineshop text-danger"><?php echo $pro_title;?></li>
        </ul>
      </div>
    </div><!--end of direction row--->
    <div class="row">
      <div class="col-md-12">
        <div class="row" id="productMain">
          <div class="col-md-6">
            <div id="mainImage">
              <div id="carouselExampleControls" class="carousel slide slidez" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="admin_area/products_imges/<?php echo $pro_img1?>" alt="image no more" class="img-fluid" style=" height:200px; width:250px;">
              <div class="text-center carousel-text text-dark">
          </div>
          </div><!--end of the single carousel-->
          <div class="carousel-item ">
            <img src="admin_area/products_imges/<?php echo $pro_img2?>" alt="image no more" class="img-fluid" style=" height:200px; width:250px;">
            <div class="text-center carousel-text text-dark">
          </div>
          </div><!--end of the single carousel-->
           <div class="carousel-item ">
            <img src="admin_area/products_imges/<?php echo $pro_img3?>" alt="image no more" class="img-fluid" style=" height:200px; width:250px;">
            <div class="text-center carousel-text text-dark">
          </div>
          </div><!--end of the single carousel-->
        </div>
           <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <?php echo $product_label;?>
          </div><!--end of the entire carousel-->
            </div>
              <div class="row mt-2" id="thumbs">
               <div class="col-md-4">
                 <a href="#" class="thumb">
                   <img src="admin_area/products_imges/<?php echo $pro_img1?>" alt="image no more" class="img-fluid" style=" height:200px; width:150px;">
                 </a>
               </div>
               <div class="col-md-4">
                 <a href="#" class="thumb">
                   <img src="admin_area/products_imges/<?php echo $pro_img2?>" alt="image no more" class="img-fluid" style=" height:200px; width:150px;">
                 </a>
               </div>
               <div class="col-md-4">
                 <a href="#" class="thumb">
                   <img src="admin_area/products_imges/<?php echo $pro_img3?>" alt="image no more" class="img-fluid" style=" height:200px; width:150px;">
                 </a>
               </div>
             </div><!--for images-->
          </div><!--end of the 6 column--->
          <div class="col-md-6">
            <div class="card">
              <h3 class="text-center text-dark"><?php echo $pro_title;?></h3>
       <?php 
   if (isset($_POST['add_cart'])) {
    $ip_add = getRealUserIp();
    $p_id = $pro_id;
    $product_qty = $_POST['product_qty'];
    $product_size = $_POST['product_size'];
    $check_product="SELECT * FROM cart WHERE p_add ='$ip_add' AND p_id='$p_id'";
    $run_check = mysqli_query($con,$check_product);

    if(mysqli_num_rows($run_check)>0) {
      echo "<script>alert('This product is added to the Cart');</script>";
      echo "<script>window.open('$pro_url','_self');</script>";
    }else{
      
      $get_price ="SELECT * FROM products WHERE product_id='$p_id'";
      $run_price=mysqli_query($con,$get_price);
      $row_price =mysqli_fetch_array($run_price);
      $pro_price=$row_price['product_price'];
      $pro_psp_price=$row_price['product_psp_price'];
      $pro_label=$row_price['product_label']; 
      if($pro_label=="Sale" or $pro_label=="Gift" or $pro_label=="Offer") {
        $product_price=$pro_psp_price;
      }else{
        $product_price=$pro_price;
      }

      $query ="INSERT INTO cart (p_id,p_add,qty,p_price,size) VALUES ('$p_id','$ip_add','$product_qty','$product_price','$product_size')";
      $run_query=mysqli_query($db,$query);
       echo "<script>window.open('$pro_url','_self');</script>";
    }
  }
        ?>
              <form class="form-group" action="" method="post">
                <?php 
      if ($status=="product") {
        
      
                ?>
                <div class="form-group" align="center">
                  <label class="col-md-5 text-dark">Select Product Quantity</label>
                  <div class="col-md-7">
                     <select name="product_qty" class="form-control">
                       <option >1</option>
                       <option >2</option>
                       <option >3</option>
                       <option >4</option>
                       <option >5</option>
                     </select>
                  </div>
                </div>
                <div class="form-group" align="center">
                  <label  class="col-md-5 text-dark">Select Product Size</label>
                  <div class="col-md-7">
                    <select name="product_size" class="form-control">
                      <option >Small</option>
                      <option >Medium</option>
                      <option >Large</option>
                    </select>
                  </div>
                </div>
              <?php }else{ ?>

                <div class="form-group" align="center">
                  <label class="col-md-5 text-dark">Select Bundle Quantity</label>
                  <div class="col-md-7">
                     <select name="product_qty" class="form-control">
                       <option >1</option>
                       <option >2</option>
                       <option >3</option>
                       <option >4</option>
                       <option >5</option>
                     </select>
                  </div>
                </div>
                <div class="form-group" align="center">
                  <label  class="col-md-5 text-dark">Select Bundle Size</label>
                  <div class="col-md-7">
                    <select name="product_size" class="form-control">
                      <option >Small</option>
                      <option >Medium</option>
                      <option >Large</option>
                    </select>
                  </div>
                </div>
            <?php }?>
                <div align="center">
                  <?php
   $get_icons="select * from icons where icon_product='$pro_id'";
   $run_icons= mysqli_query($con,$get_icons); 
   while ($row_icons = mysqli_fetch_array($run_icons)) {
     $icon_image = $row_icons['icon_image'];
     echo "<img src='admin_area/icon_images/$icon_image' width='25px' height='25px' >";
   }
                  ?>
                </div>
                <?php
         if ($pro_label=="Sale" or $pro_label=="Gift" or $pro_label=="Offer") {
          $product_price = "<del>Kshs $pro_price</del>";
          $product_psp_price = " | Kshs $pro_psp_price";
         }else{
          $product_psp_price ="";
          $product_price = "Kshs $pro_price";
         }
                ?>
                <?php
   if ( $status=="product") {
    ?>
    <p class="text-center">Product Price: <?php echo $product_price; echo $product_psp_price;?>/=</p>
    <?php
   }else{
    ?>
    <p class="text-center">Bundle price: <?php echo $product_price; echo $product_psp_price;?>/=</p>
  <?php }?>
                <p class="text-center button">
<button class="btn btn-success" type="submit" name="add_cart"><i class="fa fa-shopping-cart"></i> Add cart</button>
<button class="btn btn-info" type="submit" name="add_wishlist"><i class="fa fa-heart"></i> Add to Wishlist</button>
<?php
if (isset($_POST["add_wishlist"])) {
if (!isset($_SESSION["customer_email"])) {
  echo "<script>alert('You MUST Login to Add product to Wishlist')</script>";
  echo "<script>window.open('checkout.php','_self')</script>";
}else{
  $customer_session=$_SESSION['customer_email'];
  $get_customer ="select * from customers where customer_email='$customer_session'";
  $run_customer=mysqli_query($con,$get_customer);
  $row_customer=mysqli_fetch_array($run_customer);
  $customer_id=$row_customer['customer_id'];
  $select_wishlist="select * from wishlist where customer_id='$customer_id' AND product_id='$pro_id'";
  $run_wishlist=mysqli_query($con,$select_wishlist);
  $check_wishlist=mysqli_num_rows($run_wishlist);
  if ($check_wishlist==1) {
    echo "<script>alert('Already Added in Wishlist!');</script>";
    echo "<script>window.open('$pro_url','_self')</script>";
  }else{
    $insert_wishlist="insert into  wishlist(customer_id,product_id) values ('$customer_id','$pro_id')";
    $run_wishlist=mysqli_query($con,$insert_wishlist);
    if ($run_wishlist) {
      echo "<script>alert('Product Added Into Wishlist')</script>";
      echo "<script>window.open('$pro_url','_self')</script>";
    }
  }
}
}
?>
                </p>
              </form>

            </div><!--end of the card-->
          </div><!----end of col-md-6-->
        </div><!--end of the internal row-->
        <div class="card" id="details">
          <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active text-info" href="#description" data-toggle="tab">
   <?php
 if ($status=="product") {
 echo "Product Description";
 }else{
  echo "Bundle Description";
 }
   ?>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-info" href="#features" data-toggle="tab">Features</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-info" href="#video" data-toggle="tab">Sound And Video</a>
  </li>
</ul>
<div class="tab-content">
  <div id="description" class="tab-pane fade show active" role="tabpanel" aria-labelledby="v-pills-home-tab">
             <?php echo $pro_desc;?>
          </div>
<div id="features" class="tab-pane fade show " role="tabpanel" aria-labelledby="v-pills-home-tab">
             <?php echo $pro_features;?>
          </div>
<div id="video" class="tab-pane fade show" role="tabpanel" aria-labelledby="v-pills-home-tab">
             <?php echo $pro_video;?>
          </div>
</div>
        </div><!--end of the detail card-->
         <div class="row">
          <?php 
        if ($status=="product") {
          
        
          ?>
           <div class="col-md-3">
             <div class="card card-header">
               <h4 class="text-center">Also some searched for this products</h4>
             </div>
           </div><!---single product-->
            
              <?php 
        $get_products="SELECT * FROM products ORDER BY rand() LIMIT 0,3";
        $run_products = mysqli_query($db, $get_products);
        while ($row_products=mysqli_fetch_array($run_products)) {
          $pro_id = $row_products['product_id'];
      $pro_title = $row_products['product_title'];
      $pro_price = $row_products['product_price'];
      $pro_img1 = $row_products['product_img1'];
      $pro_label = $row_products['product_label'];
      $manufacturer_id = $row_products['manufacturer_id'];
      $get_manufacturer ="select * from manufacturers where manufacturer_id='$manufacturer_id'";
      $run_manufacturer = mysqli_query($db,$get_manufacturer);
      $row_manufacturer= mysqli_fetch_array($run_manufacturer);
      $manufacturer_name =$row_manufacturer['manufacturer_title'];
      $pro_psp_price=$row_products['product_psp_price'];
      $pro_url = $row_products['product_url'];
      if ($pro_label=="Sale" or $pro_label=="Gift" or $pro_label=="Offer"){
        $product_price = "<del>Kshs $pro_price</del>";
        $product_psp_price = " | Kshs $pro_psp_price";
      }else{
        $product_psp_price ="";
        $product_price = "Kshs $pro_price"; 
      }
      if ($pro_label ==""){}else{
        $product_label="
 <a href='#' style='color:black;' class='label sale'>
  <div class='thelabel'>$pro_label</div>
  <div class='label-backgroud'></div>
 </a>
        ";
      }
?>
    
    <div class="col-md-2 mb-2">
           <div class="product_detail">
           <div class="imgbox">
            <a href="<?php echo $pro_url;?>">
             <img src="admin_area/products_imges/<?php echo $pro_img1; ?>" alt="shoes" width="180px" height="200px"></a>
           </div>
           <div class="detail">
             <h2><a href="<?php echo $pro_url;?>"><?php echo $pro_title;?></a><div class="price"><?php echo $product_price; echo $product_psp_price;?></div><br><span><?php echo $pro_title;?></span></h2>
           <ul class="ulproduct">
             <li><span style="font-weight: bold;">Manufacturer:</span>&nbsp;<?php echo $manufacturer_name;?></li>
             </ul>
             <label class="labell">More</label>
             <a class="productlink" href="<?php echo $pro_url;?>">Detail</a>
             <a class="productlink" href="<?php echo $pro_url;?>">Add Cart</a>
           </div>
         </div>
          <?php echo " $product_label"; ?>
         </div>
    
    <?php }?>

  <?php }else{?>
   <div class="row mx-auto">
     <h5 class="text-center">Bundle Products</h5>
   </div>
   <?php 
   $get_bundle_product_relation="select *from bundle_product_relation where bundle_id='$pro_id' ";
   $run_bundle_product_relation=mysqli_query($con,$get_bundle_product_relation);
   while ($row_bundle_product_relation=mysqli_fetch_array($run_bundle_product_relation)) {
    $bundle_product_relation_id=$row_bundle_product_relation['product_id'];
    $get_products="select * from products where product_id='$bundle_product_relation_id'";
    $run_products=mysqli_query($con,$get_products);
    while ($row_products=mysqli_fetch_array($run_products)) {
     $pro_id = $row_products['product_id'];
      $pro_title = $row_products['product_title'];
      $pro_price = $row_products['product_price'];
      $pro_img1 = $row_products['product_img1'];
      $pro_label = $row_products['product_label'];
      $manufacturer_id = $row_products['manufacturer_id'];
      $get_manufacturer ="select * from manufacturers where manufacturer_id='$manufacturer_id'";
      $run_manufacturer = mysqli_query($db,$get_manufacturer);
      $row_manufacturer= mysqli_fetch_array($run_manufacturer);
      $manufacturer_name =$row_manufacturer['manufacturer_title'];
      $pro_psp_price=$row_products['product_psp_price'];
      $pro_url = $row_products['product_url'];
      if ($pro_label=="Sale" or $pro_label=="Gift" or $pro_label=="Offer"){
        $product_price = "<del>Kshs $pro_price</del>";
        $product_psp_price = " | Kshs $pro_psp_price";
      }else{
        $product_psp_price ="";
        $product_price = "Kshs $pro_price"; 
      }
      if ($pro_label ==""){}else{
        $product_label="
 <a href='#' style='color:black;' class='label sale'>
  <div class='thelabel'>$pro_label</div>
  <div class='label-backgroud'></div>
 </a>
        ";
      }
   ?>
   <div class="col-md-2 mb-2">
           <div class="product_detail">
           <div class="imgbox">
            <a href="<?php echo $pro_url;?>">
             <img src="admin_area/products_imges/<?php echo $pro_img1; ?>" alt="shoes" width="180px" height="200px"></a>
           </div>
           <div class="detail">
             <h2><a href="<?php echo $pro_url;?>"><?php echo $pro_title;?></a><div class="price"><?php echo $product_price; echo $product_psp_price;?></div><br><span><?php echo $pro_title;?></span></h2>
           <ul class="ulproduct">
             <li><span style="font-weight: bold;">Manufacturer:</span>&nbsp;<?php echo $manufacturer_name;?></li>
             </ul>
             <label class="labell">More</label>
             <a class="productlink" href="<?php echo $pro_url;?>">Detail</a>
             <a class="productlink" href="<?php echo $pro_url;?>">Add Cart</a>
           </div>
         </div>
          <?php echo " $product_label"; ?>
         </div>
<?php } }?>
<?php }?>
         </div>
      </div><!--end of col-12-->
    </div><!--end of the row-->
  </div>
</div>
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
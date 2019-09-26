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
			<li class="px-2">     
       <?php 
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
          <li class="inlineshop text-danger">Cart</li> 
        </ul>
      </div>
      <div class="row">
        <div class="col-md-9" id="cart">
         <div class="card">
           <form action="cart.php" method="post" enctype="multipart-form-data">
             <h1>Shopping cart</h1>
             <?php
            $ip_add = getRealUserIp();
            $select_cart = "SELECT * FROM cart WHERE p_add='$ip_add'";
            $run_cart = mysqli_query($con,$select_cart);
            $count = mysqli_num_rows($run_cart);            
             ?>
             <p class="text-muted">Your cart has. <?php echo $count;?> item</p>
             <div class="table-responsive">
               <table class="table">
                
                   <tr>
                     <th colspan="2">Products</th>
                     <th> Quantity</th>
                     <th>Unit Price</th>
                     <th> Size</th>
                     <th colspan="1"> Delete</th>
                     <th  colspan="2">Sub Total</th>
                   </tr>
                 
                
                  <?php
             $total=0;
             while ($row_cart = mysqli_fetch_array($run_cart)) {
               
             $pro_id = $row_cart['p_id'];
             $pro_size = $row_cart['size'];
             $pro_qty = $row_cart['qty'];
             $only_price = $row_cart['p_price'];
             $get_products = "SELECT * FROM products WHERE product_id='$pro_id'";
             $run_products = mysqli_query($con,$get_products);
             while ($row_products =mysqli_fetch_array($run_products)) {
              
             $product_title = $row_products['product_title'];
             $product_img1 = $row_products['product_img1'];
             $sub_total = $only_price* $pro_qty;
             $_SESSION['pro_qty']= $pro_qty;
             $total += $sub_total;
                  ?>
                   <tr>
                     <td>
                       <img src="admin_area/Products_imges/<?php echo $product_img1;?>" alt=" cart images" width="50px" height="50px">
                     </td>
                     <td>
                       <a href="#"><?php echo $product_title;?></a>
                     </td>
                     <td>
                       <input type="text" name="quantity" value="<?php echo $_SESSION['pro_qty'];?>" data-product_id="<?php echo $pro_id; ?>" class="quantity from-control" style="height: 20px; width: 25px;">
                     </td>
                     <td>
                       Kshs <?php echo $only_price?>
                     </td>
                     <td><?php echo $pro_size;?></td>
                     <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>"></td>
                     <td>Ksh <?php echo $sub_total;?></td>
                   </tr>
                   <?php } }?>
                 
                
                   <tr>
                     <th colspan="5">
                       Total
                     </th>
                     <th colspan="2">
                       Kshs <?php echo $total;?>
                     </th>
                   </tr>
                 
               </table>
               <div class="form-inline float-right">
                 <div class="form-group">
                   <label >Coupon Code:</label>
                   <input type="text" name="code" class="form-control">
                 </div>
                 <input type="submit" name="apply_coupon" value="Apply Coupon Code" class="btn btn-success">
               </div>
             </div>
               <div class="card-footer">
                 <div class="float-left">
                   <a href="index.php" class="btn btn-primary">
                     <i class="fas fa-arrow-alt-circle-left"></i> Continue Shopping
                   </a>
                 </div><!--end float left-->
                 <div class="float-right">
                   <button class="btn btn-info" name="update" type="submit" value="Update Cart">
                     <i class="fas fa-recycle"></i>Update Cart
                   </button>
                   <a href="checkout.php" class="btn btn-success">To CheckOut <i class="fas fa-arrow-alt-circle-right"></i></a>
                 </div><!--end float right-->
               </div>
           </form>
         </div>
         <?php 
      #for the coupon code...
      if (isset($_POST['apply_coupon'])) {
         $code = $_POST['code'];
         if ($code=="") {

         }else{
          $get_coupons = "select * from coupons where coupon_code=$code";
          $run_coupons = mysqli_query($con,$get_coupons);
          $check_coupons = mysqli_num_rows($run_coupons);
           if ($check_coupons==1) {
              $row_coupons = mysqli_fetch_array($run_coupons);
              $coupon_pro = $row_coupons['product_id'];
              $coupon_price= $row_coupons['coupon_price'];
              $coupon_limit = $row_coupons['coupon_limit'];
              $coupon_used = $row_coupons['coupon_used'];
              if ($coupon_limit==$coupon_used) {
                echo "<script>alert('The coupon code Has Expired!');</script>";
              }else{
                $get_cart = "select * from cart where p_id='$coupon_pro' AND p_add='$ip_add'";
                $run_cart = mysqli_query($con,$get_cart);
                $check_cart = mysqli_num_rows($run_cart);
                if ($check_cart==1) {
                   $add_used ="update coupons set coupon_used=coupon_used+1 where coupon_code='$code'";
                   $run_used=mysqli_query($con,$add_used);
                   $update_cart = "update cart set p_price='$coupon_price' where p_id='$coupon_pro' AND p_add='$ip_add'";
                   $run_update = mysqli_query($con,$update_cart);
                   echo "<script>alert('Your Coupon Code Has Been Applied Successefully ');</script>";
                  echo "<script>window.open('cart.php','_self');</script>";

                  }else{
                    echo "<script>alert('Product Does Not Exist in cart ');</script>";
                  }
              }
           }else{
            echo "<script>alert('Your Coupon Code is Not Valid');</script>";
           }
         }
       } 
         ?>
         <?php 
         function update_cart(){
          global $con;
          if (isset($_POST['update'])) {
            foreach ($_POST[remove] as $remove_id) {
              $delete_product = "DELETE FROM cart WHERE p_id='$remove_id'";
              $run_delete = mysqli_query($con,$delete_product);
              if ($run_delete) {
                echo"<script>window.open('cart.php','_self');</script>";
              }
            }
         }
       }
        echo @$up_cart = update_cart();
         ?>
         <div class="row">
           <div class="col-md-3">
             <div class="card card-header">
               <h4 class="text-center">Also some searched for this products</h4>
             </div>
           </div><!---single product-->
           <?php 
        $get_products = "SELECT * FROM products ORDER BY rand() LIMIT 0,3";
        $run_products = mysqli_query($con, $get_products); 
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
      $pro_url=$row_products['product_url'];
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
    
    <div class="col-md-3 mb-3">
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
           
         </div>
        </div><!--end of the col-9--->
        <div class="col-md-3">
          <div class="card" id="order-summary">
            <div class="card-header">
              <h4>OrderSummary</h4>
            </div>
            <p>
              Shipping and additional cost are calculated base on the values you have entered
            </p>
            <div class="table-responsive">
              <table class="table">
                
                  <tr>
                    <td>Order Subtotal</td>
                    <th>Khs <?php echo $total;?>/=</th>

                  </tr>
                  <tr>
                    <td>
                      Shipping and Handling 
                    </td>
                    <th>Ksh 00.00/=</th>
                  </tr>
                  <tr>
                    <td>Tax</td>
                    <th>Ksh 00.00/=</th>
                  </tr>
                   <tr class="total">
                     <td>Total</td>
                     <th>Kshs <?php echo $total;?>/=</th>
                   </tr>
                
              </table>
            </div><!---end the table--->
          </div>
        </div><!--this is the side bar for the summary purposes-->
      </div><!--this is the working area for the carts end-->
    </div><!--end of direction row--->
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
        $(this).toggleClass("animate");
      });
    });
  </script>
  <script>
    $(document).ready(function(data){
      $(document).on('keyup','.quantity',function(){
        var id=$(this).data("product_id");
        var quantity = $(this).val();
        if (quantity !='') {
          $.ajax({
            url:"change.php",
            method:"POST",
            data:{id:id,quantity:quantity},
            success:function(data){
              $("body").load('cart_body.php');
            }
          });
        }
      });
    });
  </script>
</body>
</html>
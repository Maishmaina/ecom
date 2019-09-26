<?php 
//thi is the code to validate the Login of the adm
 session_start();
 include("include/db.php");
 if (!isset($_SESSION['admin_email'])) {
 	echo "<script>window.open('login.php','_self');</script>";
 }else{

 
?>
<?php
   #this is the code for the  sction bar...
$admin_session=$_SESSION['admin_email'];
$get_admin = "select * from admins where admin_email='$admin_session'";
$run_admin=mysqli_query($con,$get_admin);
$row_admin=mysqli_fetch_array($run_admin);
$admin_id = $row_admin['admin_id'];
$admin_name = $row_admin['admin_name'];
$admin_email=$row_admin['admin_email'];
$admin_image=$row_admin['admin_image'];
$admin_county=$row_admin['admin_county'];
$admin_job=$row_admin['admin_job'];
$admin_contact=$row_admin['admin_contact'];
$admin_about=$row_admin['admin_about'];

$get_products="select * from products";
$run_products=mysqli_query($con,$get_products);
$count_products = mysqli_num_rows($run_products);

$get_customers ="select * from customers";
$run_customers = mysqli_query($con,$get_customers);
$count_customers = mysqli_num_rows($run_customers);

$get_p_categories = "select * from product_categories";
$run_p_categories = mysqli_query($con,$get_p_categories);
$count_p_categories=mysqli_num_rows($run_p_categories);

$get_pedding_orders="select * from pending_orders";
$run_pedding_orders = mysqli_query($con,$get_pedding_orders);
$count_pedding_orders = mysqli_num_rows($run_pedding_orders);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>EA||C</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;lang=en" /><!--for the google fonts-->

   <link rel="stylesheet" href="css/bootstrap.css"><!--bootstrap-->
  <link rel="stylesheet" href="awesomefonts/all.css"><!--webIcon-->
	<link rel="stylesheet" type="text/css" href="css/style.css"><!--my css styles-->
	
</head>
<body>
	<div id="wrapper">
		<?php include("include/sidebar.php");?>
		<div id="page-wrapper">
			<div class="container-fluid mt-5 pt-5">
				<?php 
          if (isset($_GET['dashboard'])) {
          	include("dashboard.php");
          }
          if (isset($_GET['insert_product'])) {
          	include("insert_product.php");
          }
          if (isset($_GET['view_products'])) {
          include("view_products.php");
          }
          if (isset($_GET['delete_product'])) {
          	include("delete_product.php");
          }
          if (isset($_GET['edit_product'])) {
          	include("edit_product.php");
          }
          if (isset($_GET['insert_p_cat'])) {
            include("insert_p_cat.php");
          } 
          if (isset($_GET['view_p_cats'])) {
           include("view_p_cats.php");
          }
          if (isset($_GET['delete_p_cat'])) {
           include("delete_p_cat.php");
          }
          if (isset($_GET['edit_p_cat'])) {
           include("edit_p_cat.php");
          }
          if (isset($_GET['insert_cat'])) {
           include("insert_cat.php");
          }
          if (isset($_GET['view_cats'])) {
           include("view_cats.php");
          }
          if (isset($_GET['delete_cat'])) {
           include("delete_cat.php");
          }
          if (isset($_GET['edit_cat'])) {
           include("edit_cat.php");
          }
          if (isset($_GET['insert_slide'])) {
           include("insert_slide.php");
          }
          if (isset($_GET['view_slides'])) {
           include("view_slides.php");
          }
          if (isset($_GET['delete_slide'])) {
           include("delete_slide.php");
          }
          if (isset($_GET['edit_slide'])) {
           include("edit_slide.php");
          }
          if (isset($_GET['view_customers'])) {
           include("view_customers.php");
          }
          if (isset($_GET['customer_delete'])) {
           include("customer_delete.php");
          }
          if (isset($_GET['view_orders'])) {
           include("view_orders.php");
          }
           if (isset($_GET['order_delete'])) {
           include("order_delete.php");
          }
           if (isset($_GET['view_payments'])) {
           include("view_payments.php");
          }
           if (isset($_GET['payment_delete'])) {
           include("payment_delete.php");
          }
          if (isset($_GET['insert_user'])) {
           include("insert_user.php");
          }
          if (isset($_GET['view_users'])) {
            include("view_users.php");
          }
          if (isset($_GET['user_delete'])) {
            include("user_delete.php");
          }
          if (isset($_GET['user_profile'])) {
            include("user_profile.php");
          }
          if(isset($_GET['insert_box'])){
            include("insert_box.php");
          }
          if (isset($_GET['view_boxs'])) {
            include("view_boxs.php");
          }
          if (isset($_GET['delete_box'])) {
            include("delete_box.php");
          }
          if (isset($_GET['edit_box'])) {
            include("edit_box.php");
          }
          if (isset($_GET['insert_term'])) {
            include("insert_term.php");
          }
          if (isset($_GET['view_terms'])) {
            include("view_terms.php");
          }
          if (isset($_GET['delete_term'])) {
            include("delete_term.php");
          }
          if (isset($_GET['edit_term'])) {
            include("edit_term.php");
          }
          if (isset($_GET['edit_css'])) {
            include("edit_css.php");
          }
          if (isset($_GET['insert_manufacturer'])) {
            include("insert_manufacturer.php");
          }
          if (isset($_GET['view_manufacturers'])) {
            include("view_manufacturers.php");
          }
          if (isset($_GET['delete_manufacturer'])) {
            include("delete_manufacturer.php");
          }
          if (isset($_GET['edit_manufacturer'])) {
            include("edit_manufacturer.php");
          }
          if (isset($_GET['insert_coupon'])) {
            include("insert_coupon.php");
          }
          if (isset($_GET['view_coupons'])) {
            include("view_coupons.php");
          }
          if (isset($_GET['delete_coupon'])) {
          include("delete_coupon.php");
          }
          if (isset($_GET['edit_coupon'])) {
            include("edit_coupon.php");
          }
          if (isset($_GET['insert_icon'])) {
            include("insert_icon.php");
          }
          if (isset($_GET['view_icons'])) {
            include("view_icons.php");
          }
          if (isset($_GET['delete_icon'])) {
            include("delete_icon.php");
          }
          if (isset($_GET['edit_icon'])) {
            include("edit_icon.php");
          }
          if (isset($_GET['insert_bundle'])) {
            include("insert_bundle.php");
          }
          if (isset($_GET['view_bundles'])) {
            include("view_bundles.php");
          }
          if (isset($_GET['delete_bundle'])) {
            include("delete_bundle.php");
          }
          if (isset($_GET['edit_bundle'])) {
           include("edit_bundle.php");
          }
          if (isset($_GET['insert_relation'])) {
          include("insert_relation.php");
          }
          if (isset($_GET['view_relations'])) {
            include("view_relations.php");
          }
          if (isset($_GET['delete_rel'])) {
            include("delete_rel.php");
          }
          if (isset($_GET['edit_rel'])) {
            include("edit_rel.php");
          }
          if (isset($_GET['edit_contact_us'])) {
            include("edit_contact_us.php");
          }
          if (isset($_GET['insert_inquiry'])) {
            include("insert_inquiry.php");
          }
          if (isset($_GET['view_inquiry'])) {
            include("view_inquiry.php");
          }
          if (isset($_GET['delete_inquiry'])) {
            include("delete_inquiry.php");
          }
          if (isset($_GET['edit_inquiry'])) {
           include("edit_inquiry.php");
          }
          if (isset($_GET['edit_about_us'])) {
            include("edit_about_us.php");
          }
          if (isset($_GET['insert_service'])) {
            include("insert_service.php");
          }
          if (isset($_GET['view_services'])) {
            include("view_services.php");
          }
          if (isset($_GET['delete_service'])) {
            include("delete_service.php");
          }
          if (isset($_GET['edit_service'])) {
            include("edit_service.php");
          }
				?>
			</div>
		</div>
	</div>
<script src="awesomefonts/all.js"></script><!--WebIcons-->
<script src="js/bootstrapjquery.js"></script><!--jquerywork--> 
<script src="js/bootstrap.js"></script><!--bootstrap js-->
</body>
</html>
<?php }?>
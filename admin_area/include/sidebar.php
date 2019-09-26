<?php 
 if (!isset($_SESSION['admin_email'])) {
 	echo "<script>window.open('login.php','_self');</script>";
 }else{


?>
<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color:#090909;">   
<a href="#" class="navbar-brand text-light">Admin Panel</a>
	<!-- <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarNavDropdown">
		<span class="navbar-toggler-icon"></span>
	</button> -->
	<div class="container mr-5 pr-5">
		<ul class="navbar-nav ml-auto top-nav mr-5">
		<li class="nav-item dropdown mr-auto">
			<a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fab fa-adn"></i>&nbsp;<?php echo $admin_name;?><span class="sr-only">(current)</span></a>
           <div class="dropdown-menu" aria-labellledby="navbarDropdownMenuLin">			
			<a href="index.php?user_profile=<?php echo $admin_id;?>" class="dropdown-item"><i class="fa fa-fw fa-user"></i>&nbsp;Profile</a>
		   <a href="index.php?view_products" class="dropdown-item"><i class="fas fa-ship"></i>&nbsp;Products <span class="badge badge-pill badge-info"><?php echo $count_products;?></span></a>
		   <a href="index.php?view_customer" class="dropdown-item"><i class="fas fa-fighter-jet"></i>&nbsp;Customer <span class="badge badge-pill badge-info"><?php echo $count_customers;?></span></a>
	       <a href="index.php?view_cats" class="dropdown-item"><i class="fas fa-atom"></i>&nbsp;Prod.Categories<span class="badge badge-pill badge-info"><?php echo $count_p_categories;?></span></a>
	       <div class="dropdown-divider"></div>
	       <a href="logout.php" class="dropdown-item">
	       	<i class="fa f-fw fa-power-off"></i>&nbsp;Logout
	       </a>
		</div>
	</li>
	</ul>
	</div>
	 </nav>
	 <!--for the sidebar connection-->

<nav class="nav flex-column">
 <ul class="navbar-nav side-nav pt-3">
			<li class="nav-item">
				<a class="nav-link text-light" href="index.php?dashboard">
					<i class="fas fa-users-cog"></i>&nbsp;Dashboard
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-light" data-toggle="collapse" data-target="#products" href="#">
					<i class="fas fa-toggle-on"></i>&nbsp;Products
					<i class="fas fa-angle-double-down"></i>
				</a>
			</li>
			<ul id="products" class="collapse">
				<li class="nav-item">
					<a  class="nav-link text-light" href="index.php?insert_product">Insert Products</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-light" href="index.php?view_products">View Products</a>
				</li>
			</ul><!--end of single nesting-->
			<li class="nav-item">
				<a class="nav-link text-light" data-toggle="collapse" data-target="#bundles" href="#">
					<i class="fab fa-fort-awesome"></i>&nbsp;Bundles
					<i class="fas fa-angle-double-down"></i>
				</a>
			</li>
			<ul id="bundles" class="collapse">
				<li class="nav-item">
					<a  class="nav-link text-light" href="index.php?insert_bundle">Insert Bundle</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-light" href="index.php?view_bundles">View Bundles</a>
				</li>
			</ul><!--end of single nesting-->
			<li class="nav-item">
				<a class="nav-link text-light" data-toggle="collapse" data-target="#relations" href="#">
					<i class="fab fa-accusoft"></i>&nbsp;Asign to Bundles
					<i class="fas fa-angle-double-down"></i>
				</a>
			</li>
             <ul id="relations" class="collapse">
				<li class="nav-item">
					<a  class="nav-link text-light" href="index.php?insert_relation">Insert Relation</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-light" href="index.php?view_relations">View Relations</a>
				</li>
			</ul><!--end of single nesting-->
			<li class="nav-item">
				<a class="nav-link text-light" data-toggle="collapse" data-target="#icons" href="#">
					<i class="fab fa-alipay"></i>&nbsp;Icons
					<i class="fas fa-angle-double-down"></i>
				</a>
			</li>
			<ul id="icons" class="collapse">
				<li class="nav-item">
					<a  class="nav-link text-light" href="index.php?insert_icon">Insert Icon</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-light" href="index.php?view_icons">View Icons</a>
				</li>
			</ul><!--end of single nesting-->
         <li class="nav-item">
         	<a href="#" data-toggle="collapse" data-target="#manufacturer" class="nav-link text-light">
         		<i class="fas fa-sort-alpha-up"></i>
         		&nbsp;Manufacturers
         		<i class="fas fa-angle-double-down"></i>
         	</a>
         </li>
         <ul id="manufacturer" class="collapse">
         	<li class="nav-item">
         		<a href="index.php?insert_manufacturer" class="nav-link text-light">Insert Manufacturer</a>
         	</li>
         	<li class="nav-item">
         		<a href="index.php?view_manufacturers" class="nav-link text-light">View Manufacturers</a>
         	</li>
         </ul>
       <li class="nav-item">
				<a class="nav-link text-light" data-toggle="collapse" data-target="#p_cat" href="#">
					<i class="fas fa-chart-line"></i>&nbsp;Products Categories
					<i class="fas fa-angle-double-down"></i>
				</a>
			</li>
			<ul id="p_cat" class="collapse">
				<li class="nav-item">
					<a  class="nav-link text-light" href="index.php?insert_p_cat">Insert Products Category</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-light" href="index.php?view_p_cats">View Products Categorries</a>
				</li>
			</ul><!--end of single nesting-->
			<li class="nav-item">
				<a class="nav-link text-light" data-toggle="collapse" data-target="#cat" href="#">
					<i class="fas fa-tags"></i>&nbsp;Category
					<i class="fas fa-angle-double-down"></i>
				</a>
			</li>
			<ul id="cat" class="collapse">
				<li class="nav-item">
					<a  class="nav-link text-light" href="index.php?insert_cat">Insert Category</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-light" href="index.php?view_cats">View Category</a>
				</li>
			</ul><!--end of single nesting-->
			<li><!--li srt for box-->
				<a href="" class="nav-link text-light" data-toggle="collapse" data-target="#box">
					<i class="fab fa-bandcamp"></i>&nbsp;Box section
					<i class="fas fa-angle-double-down"></i>
				</a>
			</li><!--li ends-->
			<ul id="box" class="collapse">
					<li class="nav-item">
					<a  class="nav-link text-light" href="index.php?insert_box">Insert Box</a>
				</li>
				<li class="nav-item">
					<a  class="nav-link text-light" href="index.php?view_boxs">View Boxs</a>
				</li>
				</ul><!--dropdown-->
				<li><!-- <li> for services srt -->
					<a href="#" class="nav-link text-light" data-toggle="collapse" data-target="#services">
						&nbsp;<i class="fas fa-code"></i>&nbsp;Services
						<i class="fas fa-angle-double-down"></i>
					</a>
				</li> 
				<ul id="services" class="collapse">
					<li class="nav-item" >
					<a href="index.php?insert_service" class="nav-link text-light">Insert Service</a>	
					</li>
					<li class="nav-item" >
					<a href="index.php?view_services" class="nav-link text-light">View Services</a>	
					</li>
				</ul>
				<li><!--li srt for contact-->
				<a href="#" class="nav-link text-light" data-toggle="collapse" data-target="#contact_us">
					<i class="fa fa-rocket"></i>&nbsp; Contact Us section
					<i class="fas fa-angle-double-down"></i>
				</a>
			</li><!--li ends-->
			<ul id="contact_us" class="collapse">
					<li class="nav-item">
					<a  class="nav-link text-light" href="index.php?edit_contact_us">Edit Contact Us</a>
				</li>
				<li class="nav-item">
					<a  class="nav-link text-light" href="index.php?insert_inquiry">Insert Inquiry Type</a>
				</li>
				<li class="nav-item">
					<a  class="nav-link text-light" href="index.php?view_inquiry">View Inquiry Type</a>
				</li>
				</ul><!--dropdown-->
				<li><!--li srt for box-->
				<a href="index.php?edit_about_us" class="nav-link text-light" >
					<i class="fa fa-rocket"></i>&nbsp; Edit About Us
				</a>
			</li><!--li ends-->
				<li><!--srt for the coupon -->
					<a href="" class="nav-link text-light" data-toggle="collapse" data-target="#coupons">
					<i class="fas fa-drafting-compass"></i>&nbsp;Coupons!
					<i class="fas fa-angle-double-down"></i>
				</a>
				</li>
				<ul id="coupons" class="collapse">
					<li class="nav-item">
					<a  class="nav-link text-light" href="index.php?insert_coupon">Insert Coupon</a>
				</li>
				<li class="nav-item">
					<a  class="nav-link text-light" href="index.php?view_coupons">View Coupons</a>
				</li>
				</ul><!--dropdown-->
			<li class="nav-item">
				<a class="nav-link text-light" data-toggle="collapse" data-target="#slides" href="#">
					<i class="fab fa-slideshare"></i>&nbsp;Slides
					<i class="fas fa-angle-double-down"></i>
				</a>
			</li>
			<ul id="slides" class="collapse">
				<li class="nav-item">
					<a  class="nav-link text-light" href="index.php?insert_slide">Insert Slide</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-light" href="index.php?view_slides">View Slides</a>
				</li>
			</ul><!--end of single nesting-->
			<li class="nav-item">
				<a href="index.php?edit_css" class="nav-link text-light">
					<i class="fab fa-css3-alt"></i>&nbsp;Edit CSS!
				</a>
			</li><!--end the css-->
			<li class="nav-item">
				<a class="nav-link text-light" data-toggle="collapse" data-target="#terms" href="#">
					<i class="fas fa-check-double"></i>&nbsp;Terms
					<i class="fas fa-angle-double-down"></i>
				</a>
			</li><!--end of the terms-->
			<ul id="terms" class="collapse">
				<li class="nav-item">
					<a  class="nav-link text-light" href="index.php?insert_term">Insert Term</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-light" href="index.php?view_terms">View Terms</a>
				</li>
			</ul>
			<li class="nav-item">
					<a  class="nav-link text-light" href="index.php?view_customers">
						<i class="fas fa-sort-alpha-up"></i>&nbsp;View Customers</a>
				</li>
				<li class="nav-item">
					<a  class="nav-link text-light" href="index.php?view_orders">
						<i class="fas fa-arrows-alt"></i>&nbsp;View Orders</a>
				</li><!--end of the sinlge item-->
				<li class="nav-item">
					<a  class="nav-link text-light" href="index.php?view_payments">
						<i class="fab fa-amazon-pay"></i>&nbsp;View Payment</a>
				</li><!--end of single item-->
				<li class="nav-item">
				<a class="nav-link text-light" data-toggle="collapse" data-target="#users" href="#">
					<i class="fas fa-cogs"></i>&nbsp;Users
					<i class="fas fa-angle-double-down"></i>
				</a>
			</li>
			<ul id="users" class="collapse">
				<li class="nav-item">
					<a  class="nav-link text-light" href="index.php?insert_user">Insert User</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-light" href="index.php?view_users">View Users</a>
				</li><!--single item-->
				<li class="nav-item">
					<a class="nav-link text-light" href="index.php?user_profile=<?php echo $admin_id;?>">Edit Profile</a>
				</li><!--single item-->
		</ul>
		<li class="nav-item">
		<a href="logout.php" class="nav-link text-light">
			<i class="fa fa-fw fa-power-off"></i>Logout
		</a>	
		</li><!--end of the side bar-->
</nav>


<?php }?>





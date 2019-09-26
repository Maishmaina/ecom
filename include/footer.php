<footer id="footer">
		<div class="container">
			<div class="row">
			<div class="col-md-4 three-col">
				<h4>Top Product Category</h4>
				<p>Find the most popular products Categories in the store.</p>
				<div class="row">
				<div class="col-md-6">
					<ul>
					<?php
                     $get_p_cats = "SELECT * FROM product_categories LIMIT 0,4";
                     $run_p_cats = mysqli_query($con, $get_p_cats);
                     while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {
                     	$p_cat_id = $row_p_cats['p_cat_id'];
                     	$p_cat_title = $row_p_cats['p_cat_title'];
                     	?>
                     	<li class="py-1"><i class="fa fa-shopping-cart"></i>&nbsp;<a class="footerlink" href="shop.php?p_cat=<?php echo $p_cat_id ?>"><?php echo $p_cat_title ?> </a></li>
                     <?php }?>  
					</ul>
			</div>
				<div class="col-md-6 ">
				<ul>
					<?php
                     $get_p_cats = "SELECT * FROM product_categories LIMIT 4,7";
                     $run_p_cats = mysqli_query($con,$get_p_cats);
                     while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {
                     	$p_cat_id = $row_p_cats['p_cat_id'];
                     	$p_cat_title = $row_p_cats['p_cat_title'];
                     	?>
                     	<li class="py-1"><i class="fa fa-shopping-cart"></i>&nbsp;<a class="footerlink" href="shop.php?p_cat=<?php echo $p_cat_id ?>"><?php echo $p_cat_title ?> </a></li>
                     <?php }?>  
					</ul></div></div>
				<form action="" method="POST">
					<input type="email" placeholder="Subscribe" class="text-center"><button class="btn1"><i class="fas fa-envelope-open"></i></button>
				</form>
			</div>
			<div class="col-md-4 mid-row">
				<h4>Follow Us</h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
				<div class="special-icon">
					<a href="#"><i class="fab fa-facebook-f text-danger fa-2x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="#"><i class="fab fa-google-plus-g text-danger fa-2x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="#"><i class="fab fa-whatsapp text-danger fa-2x"></i></a>
				</div>
			</div> 
			<div class="col-md-4 contact pl-5">
				<h4>Office</h4>
				<p><i class="fas fa-map-marker-alt design"></i>&nbsp;Karatina:<span class="number">0100</span></p>
				<p><i class="fas fa-phone design"></i>&nbsp;Kenya call:<span class="number">(254)774259319</span></p>
				<p><i class="fas fa-envelope-open design"></i>&nbsp;Email:<span class="number"><a href="mailto:@jukalia.com" class="infor"> jukalia@gmail.com</a></span></p>
				<p class="text-danger"><a class="text-danger" href="terms.php">Term And Condition</a></p>
			</div>
		</div>
		</div>
	</footer>
	<!--ceate the copyright str--->
	<div id="coyright" class="bg-dark text-light py-2">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<p class="float-left">&copy; 2019</p>
				</div>
				<div class="col-md-6">
					<p class="float-right">SchoolProject</p>
				</div>
			</div>
		</div>
	</div>
	<!--ceate the copyright end--->

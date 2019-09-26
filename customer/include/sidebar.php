<div class="card sidebar-menu">
	<div class="card-header">			<?php
      $customer_session = $_SESSION['customer_email'];
      $get_customer = "select * from customers where customer_email='$customer_session'";
      $run_customer = mysqli_query($con,$get_customer);
      $row_customer = mysqli_fetch_array($run_customer);
      $customer_image = $row_customer['customer_image'];
      $customer_name = $row_customer['customer_name'];
      if (!isset($_SESSION['customer_email'])) {
      	
      }else{?>
<img class="img-fluid" src="customer_image/<?php echo $customer_image;?>" alt="customer profile" style="height: 60px; width: 60px;">
 <br>
<h3 class="card-title">Name:<?php echo $customer_name; ?></h3>

    <?php  }
			?>		
	</div>
	<div class="card-body">
		<ul class="nav nav-pills flex-column">
		<li class="nav-item">
			<a class="nav-link <?php if(isset($_GET['my_orders'])){echo 'active';}?> " href="my_account.php?my_orders"><i class="fas fa-align-justify"></i> My Order</a>
		</li>
		<li class=" nav-item">
			<a class="nav-link <?php if(isset($_GET['pay_offline'])){echo ' active '; }?>" href="my_account.php?pay_offline"> <i class="fa fa-bolt"></i> Pay Offline</a>
		</li>
			<li class=" nav-item">
			<a class="nav-link <?php if(isset($_GET['edit_account'])){echo ' active '; }?>" href="my_account.php?edit_account"> <i class="far fa-edit"></i> Edit Account</a>
		</li>
		<li class=" nav-item">
			<a class="nav-link <?php if(isset($_GET['change_pass'])){echo ' active '; }?>" href="my_account.php?change_pass"> <i class="fa fa-user"></i> Change Password</a>
		</li>
		<li class="nav-item">
			<a href="my_account.php?my_wishlist" class="nav-link <?php if (isset($_GET['my_wishlist'])){ echo 'active';} ?>"><i class="fa fa-heart"></i>&nbsp;Wishlist</a>
		</li>
		<li class=" nav-item">
			<a class="nav-link <?php if(isset($_GET['delete_account'])){echo ' active '; }?>" href="my_account.php?delete_account"> <i class="far fa-edit"></i> Delete Account</a>
		</li>
		<li class=" nav-item">
			<a class="nav-link" href="logout.php">Logout</a>
		</li>

		</ul>
	</div>
</div>
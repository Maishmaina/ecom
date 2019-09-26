<div class="card">
	<?php
 $session_email = $_SESSION['customer_email'];
 $select_customer = "SELECT * FROM customers WHERE customer_email='$session_email'";
 $run_customer = mysqli_query($con,$select_customer);
 $row_customer = mysqli_fetch_array($run_customer);
$customer_id = $row_customer['customer_id'];
	?>
	<h1 class="text-center">Payment Option Available</h1>
	<p class="lead text-center">
		 <a href="order.php?c_id=<?php echo $customer_id; ?>">Pay Offline</a>
	</p>
	<center>
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
			  <input type="hidden" name="business" value="johndoe@gmail.com">
			  <input type="hidden" name="cmd" value="_cart">
			  <input type="hidden" name="upload" value="1">
			  <input type="hidden" name="currency_code" value="USD">
			  <input type="hidden" name="return" value="http://127.0.0.1:8090/ecom/paypal_order.php?c_id=<?php echo $customer_id;?>">
			  <input type="hidden" name="cancel_return" value="http://127.0.0.1:8090/ecom/index.php">
			  <?php
			  $i=0;
			  $ip_add=getRealUserIp();
			  $get_cart="select * from cart where p_add='$ip_add'";
			  $run_cart=mysqli_query($con,$get_cart);
			  while($row_cart=mysqli_fetch_array($run_cart)){
         $pro_id=$row_cart['p_id'];
         $pro_qty=$row_cart['qty'];
         $pro_price=$row_cart['p_price'];

         $get_products="select * from products where product_id='$pro_id'";
         $run_products =mysqli_query($con,$get_products);
         $row_products=mysqli_fetch_array($run_products);

         $ptoduct_title=$row_products['product_title'];
         $i++;
			  ?>
<input type="hidden" value="<?php echo $product_title; ?>" name="item_name_<?php echo $i;?>">

<input type="hidden" value="<?php echo $i; ?>" name="item_number_<?php echo $i;?>">
<input type="hidden" value="<?php echo $pro_price; ?>" name="amount_<?php echo $i;?>">
<input type="hidden" value="<?php echo $pro_qty; ?>" name="quantity_<?php echo $i;?>">
			<?php }?>
			<input type="image" name="submit" width="500" height="270" src="images/PayPalall.png">
		</form>
	</center>
</div>
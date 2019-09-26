<?php
  $db = mysqli_connect("localhost","root","","ecom_store");
  #For getting the ip address
  function getRealUserIp(){
    switch(true){
      case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
      case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
      case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
      default : return $_SERVER['REMOTE_ADDR'];
    }
 }#end function IP
   #srt of the Count item in the cart
 function items(){
 global $db;
  $ip_add =getRealUserIp();
  $get_items  = "SELECT * FROM cart WHERE p_add='$ip_add'";
  $run_items = mysqli_query($db, $get_items);
  $count_items = mysqli_num_rows($run_items);
  echo $count_items;
 }#end items in the carts
 #show the total products dynamically srt
function total_price(){
  global $db;
  $ip_add =getRealUserIp();
  $total =0;
  $select_cart ="SELECT * FROM cart WHERE p_add='$ip_add'";
  $run_cart = mysqli_query($db,$select_cart);
  while ($record = mysqli_fetch_array($run_cart)) {
    $pro_id=$record['p_id'];
    $pro_qty=$record['qty'];
  $get_price = "SELECT * FROM products WHERE product_id='$pro_id'";
  $run_price = mysqli_query($db,$get_price);
  while ($row_price = mysqli_fetch_array($run_price)) {
    $sub_total = $row_price['product_price']*$pro_qty;
    $total += $sub_total;
  }
  }
  echo $total;
}
 
  function getPro(){
  	global $db;
  	$get_products = "SELECT * FROM products ORDER BY 1 DESC LIMIT 0,8";
  	$run_products = mysqli_query($db, $get_products);
  	while ($row_products=mysqli_fetch_array($run_products)) {
  		$pro_id = $row_products['product_id'];
  		$pro_title = $row_products['product_title'];
  		$pro_price = $row_products['product_price'];
  		$pro_img1 = $row_products['product_img1'];
?>
  	
     <div class="col-md-3">
      <div class="product card text-center">
        <a href="detail.php?pro_id =<?php echo '$pro_id';?>" class="text-center">
          <img src="admin_area/products_imges/<?php echo $pro_img1;?>" class="img-fluid resize" alt="Image not Found" style=" height: 70px; width: 150px;">
        </a>
        <div class="text">
          <h3><a href="detail.php?pro_id =<?php echo $pro_id;?>"><?php echo $pro_title;?></a></h3>
          <div class="text-info">Kshs <?php echo $pro_price?>/=</div>
          <p class="button">
            <a href="detail.php?pro_id =<?php echo $pro_id;?>" class="btn btn-info"> View Detail</a>
            <a href="detail.php?pro_id =<?php echo $pro_id;?>" class="btn btn-success"> <i class="fa fa-shopping-cart"></i></a>
          </p>
        </div>
      </div>
     </div>
  	
  	<?php }?>
 <?php } ?>
 
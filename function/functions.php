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

 #add to cart function  srt=>17/8/2019=removed the function to the detail.php to correct the error
 #end of the add_cart function
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
  
    $sub_total = $record['p_price']*$pro_qty;
    $total += $sub_total;
  }
  echo $total;
}
//get product in the main index.php below
  function getPro(){
  	global $db;
  	$get_products = "SELECT * FROM products ORDER BY 1 DESC LIMIT 0,8";
  	$run_products = mysqli_query($db,$get_products);
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
 <?php } 
 /*this is the php function that get the produt to display in the category */

/*srt of the the getCat*/

 #Get the products within the selected category and products cats
  //end of the dynamic products category
#getcatpro srt
#getcatpro end
/*
30th/04/2019...working on the new functions
<><><><><><><>
*/ 
#getProduct fn srt
function getProducts(){
  /// getProducts function Code Starts ///

global $db;

$aWhere = array();

/// Manufacturers Code Starts ///

if(isset($_REQUEST['man'])&&is_array($_REQUEST['man'])){

foreach($_REQUEST['man'] as $sKey=>$sVal){

if((int)$sVal!=0){

$aWhere[] = 'manufacturer_id='.(int)$sVal;

}

}

}

/// Manufacturers Code Ends ///

/// Products Categories Code Starts ///

if(isset($_REQUEST['p_cat'])&&is_array($_REQUEST['p_cat'])){

foreach($_REQUEST['p_cat'] as $sKey=>$sVal){

if((int)$sVal!=0){

$aWhere[] = 'p_cat_id='.(int)$sVal;

}

}

}

/// Products Categories Code Ends ///

/// Categories Code Starts ///

if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){

foreach($_REQUEST['cat'] as $sKey=>$sVal){

if((int)$sVal!=0){

$aWhere[] = 'cat_id='.(int)$sVal;

}

}

}

/// Categories Code Ends ///

$per_page=8;

if(isset($_GET['page'])){

$page = $_GET['page'];

}else {

$page=1;

}

$start_from = ($page-1) * $per_page ;

$sLimit = " order by 1 DESC LIMIT $start_from,$per_page";

$sWhere = (count($aWhere)>0?' WHERE '.implode(' or ',$aWhere):'').$sLimit;

$get_products = "select * from products  ".$sWhere;

$run_products = mysqli_query($db,$get_products);

while($row_products=mysqli_fetch_array($run_products)){

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

echo "

<div class='col-md-3 mb-2'>
           <div class='product_detail'>
           <div class='imgbox'>
            <a href='$pro_url'>
             <img src='admin_area/products_imges/$pro_img1' alt='shoes' width='180px' height='200px'></a>
           </div>
           <div class='detail'>
             <h2><a href='$pro_url'>$pro_title</a><div class='price'>$product_price $product_psp_price</div><br><span>$pro_title</span></h2>
           <ul class='ulproduct'>
             <li><span style='font-weight: bold;'>Manufacturer:</span>&nbsp;$manufacturer_name</li>
             </ul>
             <label class='labell'>More</label>
             <a class='productlink' href='$pro_url'>Detail</a>
             <a class='productlink' href='$pro_url'>Add Cart</a>
           </div>
         </div>
         $product_label
         </div>

";

}
/// getProducts function Code Ends ///






}
//get pagination function
function getPaginator(){
  /// getPaginator Function Code Starts ///

$per_page = 8;

global $db;

$aWhere = array();

$aPath = '';

/// Manufacturers Code Starts ///

if(isset($_REQUEST['man'])&&is_array($_REQUEST['man'])){

foreach($_REQUEST['man'] as $sKey=>$sVal){

if((int)$sVal!=0){

$aWhere[] = 'manufacturer_id='.(int)$sVal;

$aPath .= 'man[]='.(int)$sVal.'&';

}

}

}

/// Manufacturers Code Ends ///

/// Products Categories Code Starts ///

if(isset($_REQUEST['p_cat'])&&is_array($_REQUEST['p_cat'])){

foreach($_REQUEST['p_cat'] as $sKey=>$sVal){

if((int)$sVal!=0){

$aWhere[] = 'p_cat_id='.(int)$sVal;

$aPath .= 'p_cat[]='.(int)$sVal.'&';

}

}

}

/// Products Categories Code Ends ///

/// Categories Code Starts ///

if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){

foreach($_REQUEST['cat'] as $sKey=>$sVal){

if((int)$sVal!=0){

$aWhere[] = 'cat_id='.(int)$sVal;

$aPath .= 'cat[]='.(int)$sVal.'&';

}

}

}

/// Categories Code Ends ///

$sWhere = (count($aWhere)>0?' WHERE '.implode(' or ',$aWhere):'');

$query = "select * from products ".$sWhere;

$result = mysqli_query($db,$query);

$total_records = mysqli_num_rows($result);

$total_pages = ceil($total_records / $per_page);

echo "<li class='page-item'><a class='page-link' href='shop.php?page=1";

if(!empty($aPath)){ echo "&".$aPath; }

echo "' >".'Previous Page'."</a></li>";

for ($i=1; $i<=$total_pages; $i++){

echo "<li class='page-item'><a class='page-link'  href='shop.php?page=".$i.(!empty($aPath)?'&'.$aPath:'')."' >".$i."</a></li>";

};

echo "<li class='page-item'><a class='page-link'  href='shop.php?page=$total_pages";

if(!empty($aPath)){ echo "&".$aPath; }

echo "' >".'Next Page'."</a></li>";

/// getPaginator Function Code Ends ///
}
 ?>


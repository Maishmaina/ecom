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
			<li class="px-2"><?php 
   if (!isset($_SESSION['customer_email'])) {
     echo "<a  href='checkout.php'>User Account</a>";
   }else{
    echo "<a  href='customer/my_account.php?my_orders'>Account</a>";
   }
    ?></li>
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
<!--for the lange compueters end hear end the navbar-->
<!--this is the working area of the shop content and the files within srt --->
<div id="content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ul class=" container kitchen card my-2">
          <li class="inlineshop"><a href="index.php">Home</a></li>
          <li class="inlineshop text-danger">Shop</li> 
        </ul>
      </div>
    </div><!--end of direction row--->
    <div class="row">
      <div class="col-md-3">
        <?php require 'include/sidebar.php';?>
      </div><!---end of the col-3--->
      <div class="col-md-9">
         <div class="card">
          <h1 class="text-info">Shop</h1>
          <p class="text-dark"> This is the Shop that every one fit in and have something to purchase. we are motivated to workhard and more effective in all the method of what we do in that we can get you OUR Customer satisfied </p>
        </div>

        <div class="row" id="Products">
        <?php
       getProducts();
        ?>
        </div>
 <nav aria-label="..."class=" ml-5 mt-2">
  <ul class="pagination">
    <?php getPaginator(); ?>
  </ul>
</nav>
<!--dynamic content added  row for the producs-->



    
      </div><!--end of the main content col-9-->
      <div id="wait" style="position: absolute; top: 40%; left: 45%; padding: 100px; padding-top: 200px;">
        
      </div><!--loader ends-->
    </div><!--end of the row-->
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
    //JAVASCRIPT CODE FOR THE FILTER AND HIDE/SHOW METHOD..
    $(document).ready(function(){
//hide and show button
$('.nav-toggle').click(function(){
  $(".card-collapse,.collapse-data").slideToggle(700,function(){
    if($(this).css('display')=='none'){
      $(".hide-show").html('Show');
    }else{
      $(".hide-show").html('Hide');
    }
  });
});// end of hide and show 

///str Search Filter Code
$(function(){
$.fn.extend({
  filterTable: function(){
    return this.each(function(){
$(this).on('keyup',function(){
  var $this = $(this),
  search = $this.val().toLowerCase(),
  target = $this.attr('data-filters'),
  handle = $(target),
  rows= handle.find('li a');
  if (search== '') {
    rows.show();

  }else{
    rows.each(function(){
      var $this = $(this);
      $this.text().toLowerCase().indexOf(search)=== -1 ? $this.hide() : $this.show();
    });
  }

});
    });
  }
});
$('[data-action="filter"][id="dev-table-filter"]').filterTable();
});

    });  
  </script>
  <script>
 $(document).ready(function(){
 
  // getProducts Function Code Starts 

  function getProducts(){
  
  // Manufacturers Code Starts 

    var sPath = ''; 

var aInputs = $('li').find('.get_manufacturer');

var aKeys = Array();

var aValues = Array();

iKey = 0;

$.each(aInputs,function(key,oInput){

if(oInput.checked){

aKeys[iKey] =  oInput.value

};

iKey++;

});

if(aKeys.length>0){

var sPath = '';

for(var i = 0; i < aKeys.length; i++){

sPath = sPath + 'man[]=' + aKeys[i]+'&'; 

}

}

// Manufacturers Code ENDS 

// Products Categories Code Starts 

var aInputs = Array();

var aInputs = $('li').find('.get_p_cat');

var aKeys = Array();

var aValues = Array();

iKey = 0;

$.each(aInputs,function(key,oInput){

if(oInput.checked){

aKeys[iKey] =  oInput.value

};

iKey++;

});

if(aKeys.length>0){

for(var i = 0; i < aKeys.length; i++){

sPath = sPath + 'p_cat[]=' + aKeys[i]+'&';

}

}

// Products Categories Code ENDS 

   // Categories Code Starts 

var aInputs = Array();

var aInputs = $('li').find('.get_cat');

var aKeys  = Array();

var aValues = Array();

iKey = 0;

    $.each(aInputs,function(key,oInput){

    if(oInput.checked){

    aKeys[iKey] =  oInput.value

};

    iKey++;

});

if(aKeys.length>0){

    for(var i = 0; i < aKeys.length; i++){

    sPath = sPath + 'cat[]=' + aKeys[i]+'&';

}

}

   // Categories Code ENDS 
   
   // Loader Code Starts 

$('#wait').html('<img src="images/load.gif">'); 

// Loader Code ENDS

// ajax Code Starts 

$.ajax({

url:"load.php", 
 
method:"POST",
 
data: sPath+'sAction=getProducts', 
 
success:function(data){
 
 $('#Products').html('');  
 
 $('#Products').html(data);
 
 $("#wait").empty(); 
 
}  

});  

    $.ajax({
url:"load.php",  
method:"POST",  
data: sPath+'sAction=getPaginator',  
success:function(data){
$('.pagination').html('');  
$('.pagination').html(data);
}  

    });

// ajax Code Ends 
   
   }

   // getProducts Function Code Ends    

$('.get_manufacturer').click(function(){ 

getProducts(); 

});


  $('.get_p_cat').click(function(){ 

getProducts();

}); 

$('.get_cat').click(function(){ 

getProducts(); 

});
 
 
 });  
  </script>
</body>
</html>
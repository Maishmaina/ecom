<?php
$aMan  = array();

$aPCat = array();

$aCat  = array();

/// Manufacturers Code Starts ///

if(isset($_REQUEST['man'])&&is_array($_REQUEST['man'])){

foreach($_REQUEST['man'] as $sKey=>$sVal){

if((int)$sVal!=0){

$aMan[(int)$sVal] = (int)$sVal;

}

}

}

/// Manufacturers Code Ends ///

/// Products Categories Code Starts ///

if(isset($_REQUEST['p_cat'])&&is_array($_REQUEST['p_cat'])){

foreach($_REQUEST['p_cat'] as $sKey=>$sVal){

if((int)$sVal!=0){

$aPCat[(int)$sVal] = (int)$sVal;

}

}

}

/// Products Categories Code Ends ///

/// Categories Code Starts ///

if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){

foreach($_REQUEST['cat'] as $sKey=>$sVal){

if((int)$sVal!=0){

$aCat[(int)$sVal] = (int)$sVal;

}

}

}

/// Categories Code Ends ///
?>
<div class="card sidebar-menu">
	<div class="card-header">
		<h6 class="card-title">
			Manufacturers
			<div class="float-right">
				<a href="#" style="color: black;">
					<span class="nav-toggle hide-show ">Hide</span>
				</a>
			</div>
		</h6>
	</div>
	<div class="card-collapse collapse-data">
		<div class="card-body">
			<div class="input-group">
				<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-manufacture" placeholder="Filter Manufacturer">
				<div class="input-group-prepend"><a href="" class="input-group-text"><i class="fa fa-search"></i></a></div>
			</div>
		</div> 
		<div class="card-body scroll-menu">
			<ul class="nav flex-column nav-pills nav-stacked category-menu" id="dev-manufacture">
				<?php
$get_manufacturer = "select * from manufacturers where manufacturer_top='yes'";
$run_manufacturer = mysqli_query($con,$get_manufacturer);
while ($row_manufacturer = mysqli_fetch_array($run_manufacturer)) {
	$manufacturer_id = $row_manufacturer['manufacturer_id'];
	$manufacturer_title = $row_manufacturer['manufacturer_title'];
	$manufacturer_image = $row_manufacturer['manufacturer_image'];
	if ($manufacturer_image == "") {
		
	}else{
		$manufacturer_image = "<img src='admin_area/other_images/$manufacturer_image' width='30px' height='30px'>&nbsp;";
	}
	echo "
     <li class='checkbox checkbox-primary' style='background:#dddddd;'>
     <a>
    <label>
   <input";
   if (isset($aMan[$manufacturer_id])) {echo "checked='checked'";}
   echo"

    type='checkbox' value='$manufacturer_id' name='manufacturer' class='get_manufacturer'>
   <span> $manufacturer_image $manufacturer_title</span>
    </label>
     </a>
     </li>
	";
}
$get_manufacturer = "select * from manufacturers where manufacturer_top='no'";
$run_manufacturer = mysqli_query($con,$get_manufacturer);
while ($row_manufacturer=mysqli_fetch_array($run_manufacturer)) {
	$manufacturer_id=$row_manufacturer['manufacturer_id'];
	$manufacturer_title=$row_manufacturer['manufacturer_title'];
	$manufacturer_image=$row_manufacturer['manufacturer_image'];
	if ($manufacturer_image=="") {
		
	}else{
		$manufacturer_image = "<img src='admin_area/other_images/$manufacturer_image' width='30px' height='30px'>&nbsp;";
	}
	echo "
    <li class='checkbox checkbox-primary'>
     <a>
    <label>
   <input";
   if (isset($aMan[$manufacturer_id])) {echo "checked='checked'";}
   echo" type='checkbox' value='$manufacturer_id' name='manufacturer' class='get_manufacturer' > 
   <span> $manufacturer_image $manufacturer_title</span>
    </label>
     </a>
     </li>
	";
}
#id='manufacturer'..check out
				?>
			</ul>
		</div> 
	</div>
</div>
<div class="card sidebar-menu">
	<div class="card-header">
		<h6 class="card-title">
			Prod. Categories
			<div class="float-right">
				<a href="#" style="color:black;">
					<span class="nav-toggle hide-show ">Hide</span>
				</a>
			</div>
		</h6>
	</div>
	<div class="card-collapse collapse-data">
		<div class="card-body">
			<div class="input-group">
				<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-p-cats" placeholder="Filter P. Cats">
				<div class="input-group-prepend"><a href="" class="input-group-text"><i class="fa fa-search"></i></a></div>

			</div>
		</div>
        <div class="card-body scroll-menu">
        	<ul class="nav flex-column nav-pills nav-stacked category-menu" id="dev-p-cats">
        		<?php
           $get_p_cats = "select * from product_categories where p_cat_top='yes'";
           $run_p_cat=  mysqli_query($con,$get_p_cats);
           while ($row_p_cats = mysqli_fetch_array($run_p_cat)) {
           	$p_cat_id = $row_p_cats['p_cat_id'];
           	$p_cat_title = $row_p_cats['p_cat_title'];
           	$p_cat_image = $row_p_cats['p_cat_image'];
           	if ($p_cat_image =="") {
           		
           	}else{
           		$p_cat_image= "<img src='admin_area/other_images/$p_cat_image' width='30px' height='30px'>&nbsp;";
           	}
           	echo "
    <li class='checkbox checkbox-primary' style='background:#dddddd;'>
     <a>
    <label>
   <input";
   if (isset($aPCat[$p_cat_id])) {echo "checked='checked'";}
   echo" type='checkbox' value='$p_cat_id' name='p_cat' class='get_p_cat' id='p_cat'>
   <span> $p_cat_image $p_cat_title</span>
    </label>
     </a>
     </li>
	";
           }

           #p_cat with the no as the top
            $get_p_cats = "select * from product_categories where p_cat_top='no'";
           $run_p_cat=  mysqli_query($con,$get_p_cats);
           while ($row_p_cats = mysqli_fetch_array($run_p_cat)) {
           	$p_cat_id = $row_p_cats['p_cat_id'];
           	$p_cat_title = $row_p_cats['p_cat_title'];
           	$p_cat_image = $row_p_cats['p_cat_image'];
           	if ($p_cat_image =="") {
           		
           	}else{
           		$p_cat_image= "<img src='admin_area/other_images/$p_cat_image' width='30px' height='30px'>&nbsp;";
           	}
           	echo "
    <li class='checkbox checkbox-primary'>
     <a>
    <label>
   <input";
   if (isset($aPCat[$p_cat_id])) {echo "checked='checked'";}
   echo " type='checkbox' value='$p_cat_id' name='p_cat' class='get_p_cat' id='p_cat'>
   <span> $p_cat_image $p_cat_title</span>
    </label>
     </a>
     </li>
	";
           }

        		?>
        	</ul>
        </div>
	</div>
</div><!---end of the product category ---->
<div class="card sidebar-menu">
<div class="card-header">
	<h6 class="card-title">
		Categories
		<div class="float-right">
			<a href="#" style="color:black;">
				<span class="nav-toggle hide-show">Hide</span>
			</a>
		</div>
	</h6>
</div>	
<div class="card-collapse collapse-data">
	<div class="card-body">
		<div class="input-group">
			<input type="text" id="dev-table-filter" data-action="filter" data-filters="#dev-cats" class="form-control" placeholder="Filter Cats.">
			<div class="input-group-prepend">
				<a href="" class="input-group-text"><i class="fa fa-search"></i></a>
			</div>

		</div>
	</div>
	<div class="card-body scroll-menu">
		<ul class="nav flex-column nav-pills nav-stacked category-menu" id="dev-cats">
			<?php

         $get_cat = "select * from categories where cat_top='yes'";
         $run_cat=mysqli_query($con,$get_cat);
         while ($row_cat=mysqli_fetch_array($run_cat)) {
         	$cat_id=$row_cat['cat_id'];
         	$cat_title=$row_cat['cat_title'];
         	$cat_image=$row_cat['cat_image'];
         	if ($cat_image=="") {
         		
         	}else{
         		$cat_image="<img src='admin_area/other_images/$cat_image' width='30px' height='30px'>&nbsp;";
         	}
         	echo "<li class='checkbox checkbox-primary' style='background:#dddddd;'>
         <a>
         <label>
     <input";
     if (isset($aCat[$cat_id])) {echo "checked='checked'";}
     echo" type='checkbox' value='$cat_id' name='cat' class='get_cat' id='cat'>
     <span> $cat_image $cat_title</span>
         </label></a>
         	</li>";
         }
           $get_cat = "select * from categories where cat_top='no'";
         $run_cat=mysqli_query($con,$get_cat);
         while ($row_cat=mysqli_fetch_array($run_cat)) {
         	$cat_id=$row_cat['cat_id'];
         	$cat_title=$row_cat['cat_title'];
         	$cat_image=$row_cat['cat_image'];
         	if ($cat_image=="") {
         		
         	}else{
         		$cat_image="<img src='admin_area/other_images/$cat_image' width='30px' height='30px'>&nbsp;";
         	}
         	echo "<li class='checkbox checkbox-primary'>
         <a>
         <label>
     <input";
     if (isset($aCat[$cat_id])) {echo "checked='checked'";}
     echo " type='checkbox' value='$cat_id' name='cat' class='get_cat' id='cat'>
     <span> $cat_image $cat_title</span>
         </label></a>
         	</li>";
         }
			?>
		</ul>
	</div>
</div>
</div><!---end of the product category ---->
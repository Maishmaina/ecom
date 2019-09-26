<?php
  $customer_session = $_SESSION['customer_email'];
  $get_customer="select* from customers where customer_email='$customer_session'";
  $run_customer = mysqli_query($con,$get_customer);
  $row_customer = mysqli_fetch_array($run_customer);
  $customer_id = $row_customer['customer_id'];
  $customer_name = $row_customer['customer_name'];
  $customer_email = $row_customer['customer_email'];
  $customer_county = $row_customer['customer_county'];
  $customer_city = $row_customer['customer_city'];
  $customer_contact = $row_customer['customer_contact'];
  $customer_address = $row_customer['customer_address'];
  $customer_image = $row_customer['customer_image'];
  

?>
<h2 class="text-center">Edit Your Account</h2>
<form action="" method="post" enctype="multipart/form-data">
	<div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fab fa-cuttlefish"></i></div>
        </div>
        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Customer Name" name="c_name" value="<?php echo $customer_name;?>">
      </div><!--end of the single input-->
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fab fa-cuttlefish"></i></div>
        </div>
        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Customer Email" name="c_email" value="<?php echo $customer_email;?>">
      </div><!--end of the single input-->
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fab fa-cuttlefish"></i></div>
        </div>
        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Customer County" name="c_county" value="<?php echo $customer_county;?>">
      </div><!--end of the single input-->
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fab fa-cuttlefish"></i></div>
        </div>
        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Customer city" name="c_city" value="<?php echo $customer_city;?>">
      </div><!--end of the single input-->
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fab fa-cuttlefish"></i></div>
        </div>
        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Customer Phone" name="c_contact" value="<?php echo $customer_contact;?>">
      </div><!--end of the single input-->
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fab fa-cuttlefish"></i></div>
        </div>
        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Customer Address" name="c_address" value="<?php echo $customer_address;?>">
      </div><!--end of the single input-->
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fab fa-cuttlefish"></i></div>
        </div>
        <input type="file" class="form-control" id="inlineFormInputGroup" name="c_image">
      </div><!--end of the single input-->
      <br>
        <img class="img-fluid" src="customer_image/<?php echo $customer_image;?>" alt="customer profile" height="50px" width="50px">
         <div class="text-center">
        <button class="btn btn-primary" type="submit" name="update">
          <i class="fas fa-share-square"></i>Submit
        </button>
      </div>
</form>
<?php
 if (isset($_POST['update'])) {
   $update_id=$customer_id;
   $c_name = $_POST['c_name'];
   $c_email = $_POST['c_email'];
   $c_county = $_POST['c_county'];
   $c_city = $_POST['c_city'];
   $c_contact = $_POST['c_contact'];
   $c_address = $_POST['c_address'];
   $c_image = $_FILES['c_image']['name'];
   $c_image_temp = $_FILES['c_image']['temp_name'];
   move_uploaded_file($c_image_temp,"customer_image/$c_image");
   $update_customer = "update customers set customer_name='$c_name', customer_email='$c_email',customer_county='$c_county', customer_city='$c_city',customer_contact='$c_contact',customer_address='$c_address',customer_image='$c_image' where customer_id='$update_id'";
   $run_customer = mysqli_query($con,$update_customer);
   if ($run_customer) {
    echo "<script>alert('Your account has been updated Please Login again');</script>";
    echo "<script>window.open('logout.php','_self');</script>";
   }
 }
?>
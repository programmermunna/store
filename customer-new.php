<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php

if(isset($_GET['msg'])){
  $msg = $_GET['msg'];
}
if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $time = time();

  $file_name = $_FILES['file']['name'];
  $file_tmp = $_FILES['file']['tmp_name'];
  move_uploaded_file($file_tmp,"upload/$file_name");

  $sql = "INSERT INTO customer(name,email,phone,address,city,file,time) VALUES('$name','$email','$phone','$address','$city','$file_name','$time')";
  $query = mysqli_query($conn,$sql);
  if($query){
  $msg = "Successfully Created New Customer!";
  header("location:customer-new.php?msg=$msg");
  }else{
  echo "Something is worng!";
  }
}

?>
    <!-- Main Content -->
    <main class="main_content">
<!-- Side Navbar Links -->
<?php include("common/sidebar.php");?>
<!-- Side Navbar Links -->

      <!-- Page Content -->
      <section class="content_wrapper">
        <!-- Page Details Title -->
        <div class="page_details">
          <div>
            <a href="index.php" class="go_home"><small>Home</small></a>
            <small>/</small>
            <small>Add Customer</small>
          </div>
        </div> 

        <!-- Page Main Content -->
        <div class="add_page_main_content">
          <h1 class="add_page_title">Add New Customer</h1> 
          <?php if(isset($msg)){ ?><div class="alert_success"><?php echo $msg; ?></div><?php }?>
          <form id="" action="" method="POST" enctype="multipart/form-data">
            <div>
              <label>Full Name</label>
              <input type="text" name="name" placeholder="Full name" class="input" />
            </div>
            <div>
              <label>Email</label>
              <input type="text" name="email" placeholder="Email" class="input" />
            </div>
            <div>
              <label>Phone</label>
              <input type="text" name="phone" placeholder="Phone" class="input" />
            </div>
            <div>
              <label>Address</label>
              <input type="text" name="address" placeholder="Address" class="input" />
            </div>
            <div>
              <label>City</label>
              <input type="text" name="city" placeholder="City" class="input" />
            </div>
            <div>
              <label>Photo</label>
              <input type="file" name="file" title="profile" placeholder="City" />
            </div>
            <input class="btn submit_btn" name="submit" type="submit" value="Submit" />
          </form>
        </div>
      </section>
      <!-- Page Content -->
    </main>
<!-- Side Navbar Links -->
<?php include("common/footer.php");?>
<!-- Side Navbar Links -->
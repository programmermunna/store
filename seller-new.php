<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php 

if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $shop = $_POST['shop'];
  $ac_holder = $_POST['ac_holder'];
  $ac_number = $_POST['ac_number'];
  $bank = $_POST['bank'];
  $branch = $_POST['branch'];
  $city = $_POST['city'];
  $time = time();

  $file_name = $_FILES['file']['name'];
  $file_tmp = $_FILES['file']['tmp_name'];
  move_uploaded_file($file_tmp,"upload/$file_name");

  $sql = "INSERT INTO seller(name,email,phone,address,shop,ac_holder,ac_number,bank,branch,city,file,time) VALUES('$name','$email','$phone','$address','$shop','$ac_holder','$ac_number','$bank','$branch','$city','$file_name','$time')";
  $query = mysqli_query($conn,$sql);
  if($query){
    $msg = "Successfully Created New Seller!";
  }else{
    $msg = "Something is worng!";
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
            <small>Add Seller</small>
          </div>
        </div>

        <!-- Page Main Content -->
        <div class="add_page_main_content">
          <h1 class="add_page_title">Add New Seller</h1>
          <form id="new_seller_form" action="" method="POST" enctype="multipart/form-data">
          <?php if(isset($msg)){ ?>
              <div class="alert_success"><?php echo $msg; ?></div>
             <?php }?>
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
              <label>Shop Name</label>
              <input type="text" name="shop" placeholder="Shop Name" class="input" />
            </div>
            <div>
              <label>Account Holder</label>
              <input type="text" name="ac_holder" placeholder="Account Holder" class="input" />
            </div>
            <div>
              <label>Account Number</label>
              <input type="text" name="ac_number" placeholder="Account Number" class="input" />
            </div>
            <div>
              <label>Bank Name</label>
              <input type="text" name="bank" placeholder="Bank Name" class="input" />
            </div>
            <div>
              <label>Branch Name</label>
              <input type="text" name="branch" placeholder="Branch Name" class="input" />
            </div>
            <div>
              <label>City</label>
              <input type="text" name="city" placeholder="City" class="input" />
            </div>
            <div>
              <label>Photo</label>
              <input type="file" name="file" title="profile" placeholder="City" />
            </div>
            <button class="btn submit_btn" name="submit" type="submit">Submit</button>
          </form>
        </div>
      </section>
      <!-- Page Content -->
    </main>
<!-- Side Navbar Links -->
<?php include("common/footer.php");?>
<!-- Side Navbar Links -->
<?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>

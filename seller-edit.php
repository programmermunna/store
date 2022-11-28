<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php
if(isset($_GET['id'])){
  $id = $_GET['id'];
}
$row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM seller WHERE id='$id'"));


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

  $sql = "UPDATE seller SET name='$name', email='$email', phone='$phone', address='$address', shop='$shop', ac_holder='$ac_holder', ac_number='$ac_number', bank='$bank', branch='$branch', city='$city', file='$file_name', time='$time' WHERE id='$id'";
  $query = mysqli_query($conn,$sql);
  if($query){
    $msg = "Successfully Updated Seller!";
    header("location:seller-edit.php?msg=$msg&&id=$id");
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
            <a href="all.php"><small>All Seller</small></a>
            <small>/</small>
            <small>Edit Seller</small>
          </div>
        </div>

        <!-- Page Main Content -->
        <div class="add_page_main_content">
          <div class="add_page_title">
            <span>Seller Information</span>
            <a href="seller-view.php?id=<?php echo $id;?>">
              <span class="eye_icon"></span>
            </a>
          </div>
          <?php if(isset($msg)){ ?>
            <div class="alert_success"><?php echo $msg; ?></div>
            <?php }?>

          <form id="edit_seller_form" action="" method="POST" enctype="multipart/form-data">
          <div>
            <label>Full Name</label>
            <input type="text" name="name" class="input" value="<?php echo $row['name']?>" />
            </div>
            <div>
            <label>Email</label>
            <input type="text" name="email" class="input" value="<?php echo $row['email']?>" />
            </div>
            <div>
            <label>Phone</label>
            <input type="text" name="phone" class="input" value="<?php echo $row['phone']?>" />
            </div>
            <div>
            <label>Address</label>
            <input type="text" name="address" class="input" value="<?php echo $row['address']?>" />
            </div>
            <div>
            <label>Shop Name</label>
            <input type="text" name="shop" class="input" value="<?php echo $row['shop']?>" />
            </div>
            <div>
            <label>Account Holder</label>
            <input type="text" name="ac_holder" class="input" value="<?php echo $row['ac_holder']?>" />
            </div>
            <div>
            <label>Account Number</label>
            <input type="text" name="ac_number" class="input" value="<?php echo $row['ac_number']?>" />
            </div>
            <div>
            <label>Bank Name</label>
            <input type="text" name="bank" class="input" value="<?php echo $row['bank']?>" />
            </div>
            <div>
            <label>Branch Name</label>
            <input type="text" name="branch" class="input" value="<?php echo $row['branch']?>" />
            </div>
            <div>
            <label>City</label>
            <input type="text" name="city" class="input" value="<?php echo $row['city']?>" />
            </div>
            <div>
            <label for="change_photo">
            <img width="80" height="80" class="rounded" src="upload/<?php echo $row['file']?>"/>
            <span>Change Photo</span>
            </label>
            <input type="file" name="file" title="profile" id="change_photo" />
            </div>
            <input class="btn submit_btn" name="submit" type="submit" value="Update" />
          </form>
        </div>
      </section>
      <!-- Page Content -->
    </main>
<!-- Side Navbar Links -->
<?php include("common/footer.php");?>
<!-- Side Navbar Links -->
<?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>

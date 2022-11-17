<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php
if(isset($_GET['id'])){
  $id = $_GET['id'];
}
$row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM customer WHERE id='$id'"));


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

  if(empty($file_name)){
    $sql = "UPDATE customer SET name='$name', email='$email', phone='$phone', address='$address',city='$city',time='$time' WHERE id='$id'";
  }else{
  $sql = "UPDATE customer SET name='$name', email='$email', phone='$phone', address='$address',city='$city', file='$file_name', time='$time' WHERE id='$id'";
  }
  
  $query = mysqli_query($conn,$sql);
  if($query){
  $msg = "Successfully Updated Customer!";
  header("location:customer-edit.php?msg=$msg&&id=$id");
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
            <a href="customer-all.php"><small>All Customer</small></a>
            <small>/</small>
            <small>Edit Customer</small>
          </div>
        </div>

        <!-- Page Main Content -->
        <div class="add_page_main_content">
          <div class="add_page_title">
            <span>Customer Information</span>
            <a href="customer-view.php?id=<?php echo $id;?>">
              <span class="eye_icon"></span>
            </a>
          </div>
          
          <form id="edit_customer_form" action="" method="POST" enctype="multipart/form-data">
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
            <input class="btn submit_btn" name="submit" type="submit" valu="Update" />
          </form>
        </div>
      </section>
      <!-- Page Content -->
    </main>
<!-- Side Navbar Links -->
<?php include("common/footer.php");?>
<!-- Side Navbar Links -->
<?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>


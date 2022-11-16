<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php



if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $country = $_POST['country'];
  $website = $_POST['website'];
  $time = time();

  $sql = "UPDATE setting SET name='$name',email='$email',phone='$phone',address='$address',city='$city',country='$country',website='$website',time='$time' WHERE id=1";
  $query = mysqli_query($conn,$sql);
  if($query){
   $msg = "Successfully Updated Setting!";
   header("location:setting-index.php?msg=$msg");
  }else{
   $msg = "Something is worng!";
  }
}
if(isset($_GET['msg'])){
    $msg = $_GET['msg'];
}


$row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM setting WHERE id=1"));
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
            <small>Setting</small>
          </div>
        </div>

        <!-- Page Main Content -->
        <div class="add_page_main_content">
          <h1 class="add_page_title">UPDATE COMPANY INFORMATIONS</h1>
          <form id="setting_form" action="" method="POST" enctype="multipart/form-data">
            <div>
              <label>Company Name</label>
              <input type="text" name="name"value="<?php echo $row['name']?>"class="input"/>
            </div>
            <div>
              <label>Email</label>
              <input type="text" name="email" value="<?php echo $row['email']?>" class="input" />
            </div>
            <div>
              <label>Company Phone/Mobile</label>
              <input type="text" name="phone" value="<?php echo $row['phone']?>" class="input" />
            </div>

            <div>
              <label>Company Address</label>
              <input type="text" name="address" value="<?php echo $row['address']?>" class="input" />
            </div>

            <div>
              <label>City</label>
              <input type="text" name="city" value="<?php echo $row['city']?>" class="input" />
            </div>
            <div>
              <label>Country</label>
              <input type="text" name="country" value="<?php echo $row['country']?>" class="input" />
            </div>
            <div>
              <label>website</label>
              <input type="text" name="website" value="<?php echo $row['website']?>" class="input" />
            </div>            
            <input class="btn submit_btn" name="submit" type="submit" value="Update" />
          </form>
          
          <?php 
          if(isset($_POST['add'])){
            $file_name = $_FILES['file']['name'];
            $file_tmp = $_FILES['file']['tmp_name'];
            move_uploaded_file($file_tmp,"upload/$file_name");
            $update = mysqli_query($conn,"UPDATE setting SET logo='$file_name'");
            if($update){
              $msg = "Logo Update Successfully";
              header("location:setting-index.php?msg=$msg");
            }
          }elseif(isset($_POST['remove'])){
            $update = mysqli_query($conn,"UPDATE setting SET logo=''");
            if($update){
              $msg = "Logo Removed Successfully";
              header("location:setting-index.php?msg=$msg");
            }
          }          
          ?>
          <div class="add_remove_div">
            <form action="" method="POST" enctype="multipart/form-data">
            <img src="upload/<?php echo $row['logo']?>">
            <p>Requered Size: 200*150</p>
            <input style="background:#338fff;" class="add_remove_img" type="file" name="file" class="input">
            <input class="add_remove_img" name="add" type="submit" value="Add" />
            <input class="add_remove_img" name="remove" type="submit" value="Remove" />
          </form>
          </div>




        </div>
      </section>
      <!-- Page Content -->
    </main>
<!-- Side Navbar Links -->
<?php include("common/footer.php");?>
<!-- Side Navbar Links -->
<?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>

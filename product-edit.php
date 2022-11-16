<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php
if(isset($_GET['id'])){
  $id = $_GET['id'];
}
$row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM product WHERE id='$id'"));


if(isset($_POST['submit'])){
  $product_name = $_POST['product_name'];
  $sell_price = $_POST['sell_price'];
  $brand = $_POST['brand'];
  $category = $_POST['category'];
  $date = $_POST['date'];
  $product_code = $_POST['product_code'];
  $vat = $_POST['vat'];
  $time = time();

  $file_name = $_FILES['file']['name'];
  $file_tmp = $_FILES['file']['tmp_name'];
  move_uploaded_file($file_tmp,"upload/$file_name");

  $sql = "UPDATE product SET product_name='$product_name', sell_price='$sell_price', brand='$brand', category='$category', date='$date', product_code='$product_code', vat='$vat', file='$file_name', time='$time' WHERE id='$id'";
  $query = mysqli_query($conn,$sql);
  if($query){
   $msg = "Successfully Updated Product!";
   header("location:product-edit.php?msg=$msg&&id=$id");
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
            <a href="all.php"><small>All Product</small></a>
            <small>/</small>
            <small>Edit Product</small>
          </div>
        </div>

        <!-- Page Main Content -->
        <div class="add_page_main_content">
          <div class="add_page_title">
            <span>Product Information</span>
            <a href="product-view.php?id=<?php echo $id;?>">
              <span class="eye_icon"></span>
            </a>
          </div>
          <?php if(isset($msg)){ ?>
            <div class="alert_success"><?php echo $msg; ?></div>
            <?php }?>

          <form id="edit_product_form" action="" method="POST" enctype="multipart/form-data">
          <div>
            <label>Product Name</label>
            <input type="text" value="<?php echo $row['product_name']?>" name="product_name" class="input" />
            </div>

            <div>
            <label>Price</label>
            <input type="text" value="<?php echo $row['sell_price']?>" name="sell_price" class="input" />
            </div>

            <div>
            <label>Select Brand</label>
            <select name="brand" class="select_input">
              <option selected value="<?php echo $row['brand']?>"><?php echo $row['brand']?></option>
              <?php
              $brand = mysqli_query($conn,"SELECT * FROM brand");
              while($row2 = mysqli_fetch_assoc($brand)){ ?>
              <option value="<?php echo $row2['name']?>"><?php echo $row2['name']?></option>                
              <?php } ?>  
            </select>
            </div>
            

            <div>
            <label>Select Category</label>
            <select name="category" class="select_input">
              <option selected value="<?php echo $row['category']?>"><?php echo $row['category']?></option>
              <?php
              $category = mysqli_query($conn,"SELECT * FROM category");
              while($row3 = mysqli_fetch_assoc($category)){ ?>
              <option value="<?php echo $row3['category']?>"><?php echo $row3['category']?></option>           
              <?php } ?> 
            </select>
            </div>

            <div>
            <label>Date</label>
            <input type="text" class="input" value="<?php echo $row['date']?>" name="date" />
            </div>

            <div>
            <label>Product ID</label>
            <input type="text" value="<?php echo $row['product_code']?>" name="product_code" class="input" />
            </div>

            <div>
            <label>Vat</label>
            <input type="text" value="<?php echo $row['vat']?>" name="vat" class="input" />
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

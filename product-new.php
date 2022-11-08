<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php 
if(isset($_GET['msg'])){
  $msg = $_GET['msg'];
}
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
  $sql = "INSERT INTO product(product_name,sell_price,product_code,vat,brand,category,date,file,time) VALUES('$product_name','$sell_price','$product_code','$vat','$brand','$category','$date','$file_name','$time')";
  $query = mysqli_query($conn,$sql);
  if($query){
   $msg = "Successfully Created New Product!";
   header("location:product-new.php?msg=$msg");
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
            <small>Add Product</small>
          </div>
        </div>

        <!-- Page Main Content -->
        <div class="add_page_main_content">
          <h1 class="add_page_title">Add New Product</h1>
          <form id="new_product_form" action="" method="POST" enctype="multipart/form-data">
          <?php if(isset($msg)){ ?>
              <div class="alert_success"><?php echo $msg; ?></div>
             <?php }?>
            <div>
              <label>Product Name</label>
              <input type="text" name="product_name" placeholder="Product name" class="input" />
            </div>

            <div>
              <label>Price</label>
              <input type="number" name="sell_price" placeholder="price" class="input" />
            </div>

            <div>             
              <label>Select Brand</label>
              <select name="brand" class="select_input">
              <option style="display:none;" selected >Select Brand</option>
              <?php $brand = mysqli_query($conn,"SELECT * FROM brand"); 
              while($row = mysqli_fetch_assoc($brand)){ ?>
              <option value="<?php echo $row['name']?>"><?php echo $row['name']?></option>
              <?php }?>
              </select>
            </div>

            <div>
              <label>Select Category</label>
              <select name="category" class="select_input">
                <option selected >Select category</option>
                <option value="Hyundai">Hyundai</option>
                <option value="Archar">Archar</option>
                <option value="Mitshubishi">Mitshubishi</option>
                <option value="Echovell">Echovell</option>
                <option value="Joyota">Joyota</option>
                <option value="Motorbike">Motorbike</option>
              </select>
            </div>

            <div>
              <label>Date</label>
              <input type="text" name="date" class="input" placeholder="mm/dd/yy" />
            </div>

            <div>
              <label>Product ID</label>
              <input type="text" name="product_code" placeholder="Product id" class="input" />
            </div>

            <div>
              <label>Vat</label>
              <input type="text" name="vat" placeholder="Product vat" class="input" />
            </div>

            <div>
              <label>Product Image</label>
              <input type="file" name="file" title="profile" />
            </div>
            <button name="submit" class="btn submit_btn" type="submit">Submit</button>
          </form>
        </div>
      </section>
      <!-- Page Content -->
    </main>
<!-- Side Navbar Links -->
<?php include("common/footer.php");?>
<!-- Side Navbar Links -->
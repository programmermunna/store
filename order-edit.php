<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php
if(isset($_GET['id'])){
  $id = $_GET['id'];
}
$row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM product WHERE id='$id'"));
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
            <a href="all.php"><small>Order Edit</small></a>
            <small>/</small>
            <small>Edit Order</small>
          </div>
        </div>

        <!-- Page Main Content -->
        <div class="add_page_main_content">
          <div class="add_page_title">
            <span>Order Information</span>
            <a href="product-view.php?id=<?php echo $id;?>">
              <span class="eye_icon"></span>
            </a>
          </div>

          <form id="edit_product_form">
          <div>
            <label>Product Name</label>
            <input type="text" value="<?php echo $row['product_name']?>" name="product_name" class="input" />
            </div>

            <div>
            <label>Sell Price</label>
            <input type="text" value="<?php echo $row['sell_price']?>" name="sell_price" class="input" />
            </div>

            <div>
            <label>Select Category</label>
            <select name="category" class="select_input">
              <option disabled>Select category</option>
              <option selected value="<?php echo $row['category']?>"><?php echo $row['category']?></option>
              <option value="Archar">Archar</option>
              <option value="Mitshubishi">Mitshubishi</option>
              <option value="Echovell">Echovell</option>
              <option value="Joyota">Joyota</option>
              <option value="Motorbike">Motorbike</option>
            </select>
            </div>

            <div>
            <label>Select Seller</label>
            <select name="seller" class="select_input">
              <option disabled>Select seller</option>
              <option selected value="<?php echo $row['seller']?>"><?php echo $row['seller']?></option>
              <option value="Steve">Steve</option>
              <option value="Asif">Asif</option>
              <option value="Villers">Villers</option>
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
            <label for="change_photo">
            <img width="80" height="80" class="rounded" src="upload/<?php echo $row['file']?>"/>
            <span>Change Photo</span>
            </label>
            <input type="file" title="profile" id="change_photo" />
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

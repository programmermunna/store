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
            <a href="all.php"><small>All Product</small></a>
            <small>/</small>
            <small>View Product</small>
          </div>
        </div>

        <!-- Page Main Content -->
        <div class="add_page_main_content">
          <div class="add_page_title">
            <span>Product view</span>
            <a href="product-edit.php?id=<?php echo $id;?>">
              <span class="edit_icon"></span>
            </a>
          </div>
          <form id="view_product_form">
          <div>
        <img
        width="200"
        height="200"
        class="rounded"
        src="upload/<?php echo $row['file']?>"
        />
    </div>

           <div>
              <b>Product Name</b>
              <p><?php echo $row['product_name']?></p>
            </div>

            <div>
              <b>Price</b>
              <p><?php echo $row['sell_price']?></p>
            </div>

            <div>
              <b>Brand</b>
              <p><?php echo $row['brand']?></p>
            </div>

            <div>
              <b>Category</b>
              <p><?php echo $row['category']?></p>
            </div>

            <div>
              <b>Date</b>
              <p><?php echo $row['date']?></p>
            </div>

            <div>
              <b>Product ID</b>
              <p><?php echo $row['product_code']?></p>
            </div>

            <div>
              <b>Vat</b>
              <p><?php echo $row['vat']?></p>
            </div>
          </form>
        </div>
      </section>
      <!-- Page Content -->
    </main>
<!-- Side Navbar Links -->
<?php include("common/footer.php");?>
<!-- Side Navbar Links -->
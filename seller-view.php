<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php
if(isset($_GET['id'])){
  $id = $_GET['id'];
}
$row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM seller WHERE id='$id'"));
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
            <small>View Seller</small>
          </div>
        </div>

        <!-- Page Main Content -->
        <div class="add_page_main_content">
          <div class="add_page_title">
            <span>Seller view</span>
            <a href="seller-edit.php?id=<?php echo $id;?>">
              <span class="edit_icon"></span>
            </a>
          </div>
          <form id="view_seller_form">
          <div>
            <b>Name</b>
            <p><?php echo $row['name']?></p>
            </div>
            <div>
            <b>Email</b>
            <p><?php echo $row['email']?></p>
            </div>
            <div>
            <b>Phone</b>
            <p><?php echo $row['phone']?></p>
            </div>
            <div>
            <b>Address</b>
            <p><?php echo $row['address']?></p>
            </div>
            <div>
            <b>Shop Name</b>
            <p><?php echo $row['shop']?></p>
            </div>
            <div>
            <b>Account Holder</b>
            <p><?php echo $row['ac_holder']?></p>
            </div>
            <div>
            <b>Account Number</b>
            <p><?php echo $row['ac_number']?></p>
            </div>
            <div>
            <b>Bank Name</b>
            <p><?php echo $row['bank']?></p>
            </div>
            <div>
            <b>Branch Name</b>
            <p><?php echo $row['branch']?></p>
            </div>
            <div>
            <b>City</b>
            <p><?php echo $row['city']?></p>
            </div>
            <div>
            <b>Profile Photo</b>
            <img
            width="80"
            height="80"
            class="rounded"
            src="upload/<?php echo $row['file']?>"
            />
            </div>
          </form>
        </div>
      </section>
      <!-- Page Content -->
    </main>
<!-- Side Navbar Links -->
<?php include("common/footer.php");?>
<!-- Side Navbar Links -->
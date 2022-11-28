<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php
if(isset($_GET['id'])){
  $id = $_GET['id'];
}
$row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM employee WHERE id='$id'"));
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
            <a href="all.php"><small>All employee</small></a>
            <small>/</small>
            <small>View employee</small> 
          </div>
        </div>
 
        <!-- Page Main Content -->
        <div class="add_page_main_content">
          <div class="add_page_title">
            <span>employee view</span> 
            <a href="employee-edit.php?id=<?php echo $id;?>">
              <span class="edit_icon"></span>
            </a>
          </div>
          <form id="view_employee_form">
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
            <b>Salary</b>
            <p><?php echo $row['salary']?></p>
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


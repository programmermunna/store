<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php
if(isset($_GET['id'])){
  $id = $_GET['id'];
}
$expense = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM expense WHERE id=$id"));

if(isset($_POST['submit'])){
  $eating_cost = $_POST['eating_cost'];
  $marketing_cost = $_POST['marketing_cost'];
  $helth_cost = $_POST['helth_cost'];
  $store_cost = $_POST['store_cost'];
  $employee_cost = $_POST['employee_cost'];
  $other_cost = $_POST['other_cost'];
  $time = time();

  $sql = "UPDATE expense SET eating_cost='$eating_cost', marketing_cost='$marketing_cost', helth_cost='$helth_cost', store_cost='$store_cost', employee_cost='$employee_cost', other_cost='$other_cost',time='$time' WHERE id=$id"; 
  $query = mysqli_query($conn,$sql);
  if($query){
    $msg = "Successfully Updated";
    header("location:expense-edit.php?id=$id&&msg=$msg");
  }else{
     echo "Somethings error! Please try again.";  
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
            <small>Expence Edit</small>
          </div>
        </div>

        <!-- Page Main Content -->
        <div class="add_page_main_content">
          <h1 class="add_page_title">Expence Edit
              </h1>
          <form id="setting_form" action="" method="POST" enctype="multipart/form-data">
            <div>
              <label>Eating Cost</label>
              <input type="number" name="eating_cost" class="input" value="<?php echo $expense['eating_cost']; ?>" />
            </div>
            <div>
              <label>Marketing Cost</label>
              <input type="number" name="marketing_cost" class="input" value="<?php echo $expense['marketing_cost']; ?>" />
            </div>
            <div>
              <label>Helth Cost</label>
              <input type="number" name="helth_cost" class="input" value="<?php echo $expense['helth_cost']; ?>" />
            </div>
            <div>
              <label>Store Cost</label>
              <input type="number" name="store_cost" class="input" value="<?php echo $expense['store_cost']; ?>" />
            </div>
            <div>
              <label>Employee Cost</label>
              <input type="number" name="employee_cost" class="input" value="<?php echo $expense['employee_cost']; ?>" />
            </div>
            <div>
              <label>Other Cost</label>
              <input type="number" name="other_cost" class="input" value="<?php echo $expense['other_cost']; ?>" />
            </div>
            <input name="submit" class="btn submit_btn" type="submit" value="Update" />
          </form>
        </div>
      </section>
      <!-- Page Content -->
    </main>
<!-- Side Navbar Links -->
<?php include("common/footer.php");?>
<!-- Side Navbar Links -->
<?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>
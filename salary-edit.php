<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php
if(isset($_GET['id'])){
  $emp_id = $_GET['id'];
}

$time = time()-2592000;

$eployee = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM employee WHERE admin_id=$id AND id=$emp_id"));
$salary = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM salary WHERE admin_id=$id AND emp_id=$emp_id AND time>$time"));

if(isset($_POST['submit'])){
  $pay = $_POST['pay'];
  $status = $_POST['status'];
  $time = time();

  $sql = "UPDATE salary SET pay = pay+'$pay',status='$status',time='$time' WHERE admin_id=$id AND emp_id=$emp_id"; 
  $query = mysqli_query($conn,$sql);
  if($query){
    $msg = "Payment Salary Successfully";
    header("location:salary.php?msg=$msg");
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
            <small>Admin</small>
          </div>
        </div>

        <!-- Page Main Content -->
        <div class="add_page_main_content">
            <h1 class="add_page_title">Salary Edit
                </h1>
            <form id="setting_form" action="" method="POST" enctype="multipart/form-data">
            <div>
                <label>Photo</label>
                <img style="width:100px;height:100px;margin:0 auto;" src="upload/<?php echo $eployee['file']?>" alt="">
            </div>
            <div>
                <label>Name</label>
                <input disabled type="text" class="input" value="<?php echo $eployee['name']; ?>" />
            </div>
            <div>
                <label>Salary</label>
                <input disabled type="number" class="input" value="<?php echo $eployee['salary']; ?>" />
            </div>

           <?PHP if($salary['status']=='advance'){ ?>            
            <div>
              <label>Advance</label>
              <input disabled type="number" class="input" value="<?php echo $salary['pay']; ?>" />
            </div>           
            <?php }?>

            <div>
                <label>Due</label>
                <input disabled type="number" class="input" value="<?php echo  $eployee['salary']-$salary['pay']; ?>" />
            </div>
            <div>
                <label>Pay</label>
                <input type="text" name="pay" class="input" value="<?php echo $eployee['salary']-$salary['pay'];?>" />
            </div>
            <div>
                <label>Status</label>
                <select name="status" class="input">
                        <option value="advance">Advance</option>
                        <option value="salary">Salary</option>
                </select>
            </div>
            <input name="submit" class="btn submit_btn" type="submit" value="Pay Salary"/>
          </form>
        </div>
      </section>
      <!-- Page Content -->
    </main>
<!-- Side Navbar Links -->
<?php include("common/footer.php");?>
<!-- Side Navbar Links -->
<?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>

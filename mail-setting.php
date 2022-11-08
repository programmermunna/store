<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php

if(isset($_POST['mail_setting'])){
  $smtp_host = $_POST['smtp_host'];
  $smtp_port = $_POST['smtp_port'];
  $smtp_user_name = $_POST['smtp_user_name'];
  $smtp_user_pass = $_POST['smtp_user_pass'];
  $smtp_security = $_POST['smtp_security'];
  $site_email = $_POST['site_email'];
  $site_replay_email = $_POST['site_replay_email'];

  $sql = "UPDATE mail_setting SET smtp_host='$smtp_host',smtp_port='$smtp_port',smtp_user_name='$smtp_user_name',smtp_user_pass='$smtp_user_pass',smtp_security='$smtp_security',site_email='$site_email',site_replay_email='$site_replay_email' WHERE id='1'";
  $query = mysqli_query($conn,$sql);
  if($query){
    $msg = "Successfully Updated";
    header("location:mail-setting.php?msg=$msg");
  }else{
    $msg = "Somethings error! Please try again.";
  
  }


}
if(isset($_GET['msg'])){
    $msg = $_GET['msg'];
}
$row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM mail_setting WHERE id=1"));
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
            <small>Mail</small>
          </div>
        </div>

        <!-- Page Main Content -->
        <div class="add_page_main_content">
          <h1 class="add_page_title">UPDATE MAIL INFORMATIONS
              <?php if(isset($msg)){ ?>
              <div class="alert_success"><?php echo $msg; ?></div>
             <?php }?></h1>
          <form id="setting_form" action="" method="POST" enctype="multipart/form-data">
          <div>
              <label>Smtp Host</label>
              <input type="text" name="smtp_host" class="input" value="<?php echo $row['smtp_host']; ?>" />
            </div>
            <div>
              <label>Smtp Port</label>
              <input type="text" name="smtp_port" class="input" value="<?php echo $row['smtp_port']; ?>" />
            </div>
            <div>
              <label>Smtp Username</label>
              <input type="text" name="smtp_user_name" class="input" value="<?php echo $row['smtp_user_name']; ?>" />
            </div>
            <div>
              <label>Smtp Password</label>
              <input type="text" name="smtp_user_pass" class="input" value="<?php echo $row['smtp_user_pass']; ?>" />
            </div>
            <div>
              <label>Smtp Security (SSL/TLS)</label>
              <input type="text" name="smtp_security" class="input" value="<?php echo $row['smtp_security']; ?>" />
            </div>
            <div>
              <label>Site Email</label>
              <input type="text" name="site_email" class="input" value="<?php echo $row['site_email']; ?>" />
            </div>
            <div>
              <label>Site Replay Email</label>
              <input type="text" name="site_replay_email" class="input" value="<?php echo $row['site_replay_email']; ?>" />
            </div>
            <input name="mail_setting" class="btn submit_btn" type="submit" value="Update" />
          </form>
        </div>
      </section>
      <!-- Page Content -->
    </main>
<!-- Side Navbar Links -->
<?php include("common/footer.php");?>
<!-- Side Navbar Links -->
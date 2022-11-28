<?php include("common/header.php")?>
<?php include("common/sidebar.php")?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  <?php include("common/navbar.php")?>
<?php
if(isset($_POST['submit'])){
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
  }
}
$mail = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM mail_setting WHERE id=1"));
?>
  <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Mail Setting</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-4">

                <div class="order-view">
                  <div class="edit">
                      <form action="" method="POST">
                        <div class="profile">
                          <div style="display:block">
                              <div>
                                <label for="name">SMTP HOST</label>
                                <input name="smtp_host" type="text" value="<?php echo $mail['smtp_host']?>">
                              </div>
                              <div>
                                <label for="email">SMTP PORT</label>
                                <input name="smtp_port" type="text" value="<?php echo $mail['smtp_port']?>">
                              </div>
                              <div>
                                <label for="address">SMTP USER NAME</label>
                                <input name="smtp_user_name" type="text" value="<?php echo $mail['smtp_user_name']?>">
                              </div>
                              <div>
                                <label for="address">SMTP PASSWORD</label>
                                <input name="smtp_user_pass" type="text" value="<?php echo $mail['smtp_user_pass']?>">
                              </div>
                              <div>
                                <label for="address">SMTP Security</label>
                                <input name="smtp_security" type="text" value="<?php echo $mail['smtp_security']?>">
                              </div>
                              <div>
                                <label for="address">SITE EMAIL</label>
                                <input name="site_email" type="text" value="<?php echo $mail['site_email']?>">
                              </div>
                              <div>
                                <label for="address">REPLAY EMAIL</label>
                                <input name="site_replay_email" type="text" value="<?php echo $mail['site_replay_email']?>">
                              </div>
                          </div>
                          <div>                            
                            <input name="submit" class="submit_btn" type="submit" value="Save">
                          </div>
                        </div>
                      </form>
                      </div>
                      <div class="view">
                        <div class="view-content" style="margin-left:50px;width:100%">
                        <div class="view-img">
                          <img style="width:100%" src="../upload/mail.jpg">
                        </div>
                      </div>
                </div>


            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  
  <?php include("common/footer.php")?>
  <?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>

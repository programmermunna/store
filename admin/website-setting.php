<?php include("common/header.php")?>
<?php include("common/sidebar.php")?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  <?php include("common/navbar.php")?>
<?php
if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $facebook = $_POST['facebook'];
  $linkedin = $_POST['linkedin'];
  $mail = $_POST['mail'];
  $youtube = $_POST['youtube'];
  $footer_text = $_POST['footer_text'];

  $sql = "UPDATE website_setting SET name='$name',email='$email',address='$address',facebook='$facebook',linkedin='$linkedin',mail='$mail',youtube='$youtube',footer_text='$footer_text' WHERE id='1'";
  $query = mysqli_query($conn,$sql);
  if($query){
    $msg = "Successfully Updated";
    header("location:website-setting.php?msg=$msg");
  }
}
$website = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM website_setting WHERE id=1"));
?>
  <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Website Setting</h6>
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
                                <label for="name">Website Name</label>
                                <input name="name" type="text" value="<?php echo $website['name']?>">
                              </div>
                              <div>
                                <label for="email">Email</label>
                                <input name="email" type="text" value="<?php echo $website['email']?>">
                              </div>
                              <div>
                                <label for="name">Address</label>
                                <input name="address" type="text" value="<?php echo $website['address']?>">
                              </div>
                              <div>
                                <label for="facebook">Facebook</label>
                                <input name="facebook" type="text" value="<?php echo $website['facebook']?>">
                              </div>
                              <div>
                                <label for="linkedin">Linkedin</label>
                                <input name="linkedin" type="text" value="<?php echo $website['linkedin']?>">
                              </div>
                              <div>
                                <label for="mail">Mail</label>
                                <input name="mail" type="text" value="<?php echo $website['mail']?>">
                              </div>
                              <div>
                                <label for="youtube">Youtube</label>
                                <input name="youtube" type="text" value="<?php echo $website['youtube']?>">
                              </div>
                              <div>
                                <label for="footer_text">Footer Text</label>
                                <input name="footer_text" type="text" value="<?php echo $website['footer_text']?>">
                              </div>
                          </div>
                          <div>                            
                            <input name="submit" class="submit_btn" type="submit" value="Save">
                          </div>
                        </div>
                      </form>


                      <?php 
                      if(isset($_POST['add'])){
                        $file_name = $_FILES['file']['name'];
                        $file_tmp = $_FILES['file']['tmp_name'];
                        move_uploaded_file($file_tmp,"upload/$file_name");
                        $update = mysqli_query($conn,"UPDATE website_setting SET logo='$file_name'");
                        if($update){
                          $msg = "Logo Update Successfully";
                          header("location:website-setting.php?msg=$msg");
                        }
                      }elseif(isset($_POST['remove'])){
                        $update = mysqli_query($conn,"UPDATE website_setting SET logo=''");
                        if($update){
                          $msg = "Logo Removed Successfully";
                          header("location:website-setting.php?msg=$msg");
                        }
                      }          
                      ?>
                      <div style="display:block;text-align:center;margin:30px auto;">
                      <form action="" method="POST" enctype="multipart/form-data">
                          <img style="padding-bottom:30px;max-width:100%" src="../upload/<?php echo $website['logo']?>" alt="Logo">
                          <br>
                          <input type="file" name="file">
                          <input type="submit" name="add" value="Add">
                          <input type="submit" name="remove" value="remove">
                        </div>
                      </form>
                      </div>

                      <div class="view">
                        <div class="view-content" style="margin-left:50px;width:100%">
                          <div class="view-img">
                            <img style="width:100%" src="../upload/setting.webp">
                          </div>
                        </div>
                      </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </main>  
  <?php include("common/setting.php")?>
  <?php include("common/footer.php")?>
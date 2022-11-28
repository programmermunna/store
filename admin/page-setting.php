<?php include("common/header.php")?>
<?php include("common/sidebar.php")?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  <?php include("common/navbar.php")?>
<?php
if(isset($_POST['about_btn'])){
  $about = $_POST['about'];

  $sql = "UPDATE pages SET about='$about' WHERE id=1";
  $query = mysqli_query($conn,$sql);
  if($query){
    $msg = "Successfully Updated";
    header("location:page-setting.php?msg=$msg");
  }
}
if(isset($_POST['terms_btn'])){
  $terms = $_POST['terms'];

  $sql = "UPDATE pages SET terms='$terms' WHERE id=1";
  $query = mysqli_query($conn,$sql);
  if($query){
    $msg = "Successfully Updated";
    header("location:page-setting.php?msg=$msg");
  }
}
$pages = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM pages WHERE id=1"));
?>
  <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Page</h6>
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
                                <label for="about">About Page</label>
                                <textarea name="about" class="summernote"><?php echo $pages['about']?></textarea>
                              </div>
                          </div>
                          <div>
                          <input name="about_btn" class="submit_btn" type="submit" value="Save">
                          </div>
                          <br>
                          <div style="display:block">
                              <div>
                                <label for="terms">Terms Page</label>
                                <textarea name="terms" class="summernote"><?php echo $pages['terms']?></textarea>
                              </div>
                          </div>
                          <div>                            
                            <input name="terms_btn" class="submit_btn" type="submit" value="Save">
                          </div>
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

  <script>    
    $('.summernote').summernote({
    placeholder: 'Write here details',
    tabsize: 2,
    height: 200,
    toolbar: [
    ['style', ['style']],
    ['font', ['bold', 'underline', 'clear']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['table', ['table']],
    ['insert', ['link', 'picture', 'video']],
    ['view', ['fullscreen', 'codeview', 'help']]
    ]
});
  </script>


  
  <?php include("common/footer.php")?>
  <?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>


  
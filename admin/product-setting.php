<?php include("common/header.php")?>
<?php include("common/sidebar.php")?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  <?php include("common/navbar.php")?>
<?php
if(isset($_POST['submit'])){
  $price = $_POST['price'];
  $title = $_POST['title'];
  $summery = $_POST['summery'];
  $mini_content = $_POST['mini_content'];
  $content = $_POST['content'];

  $sql = "UPDATE product_setting SET price='$price',title='$title',summery='$summery',mini_content='$mini_content',content='$content' WHERE id='1'";
  $query = mysqli_query($conn,$sql);
  if($query){
    $msg = "Successfully Updated";
    header("location:product-setting.php?msg=$msg");
  }
}
$product = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM product_setting WHERE id=1"));
?>
  <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Product </h6>
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
                                <label for="price">Price</label>
                                <input name="price" type="text" value="<?php echo $product['price']?>">
                              </div>
                              <div>
                                <label for="title">Title</label>
                                <input name="title" type="text" value="<?php echo $product['title']?>">
                              </div>
                              <div>
                                <label for="summery">Summery</label>
                                <textarea style="width:100%;border:1px solid #ddd;padding:10px" class="summernote" name="summery" rows="5"><?php echo $product['summery']?></textarea>
                              </div>
                              <div>
                                <label for="mini_content">Mini Content</label>
                                <textarea style="width:100%;border:1px solid #ddd;padding:10px" class="summernote" name="mini_content" rows="5"><?php echo $product['mini_content']?></textarea>
                              </div>
                              <div>
                                <label for="content">Content</label>
                                <textarea name="content" class="summernote"><?php echo $product['content']?></textarea>
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
                        move_uploaded_file($file_tmp,"../upload/$file_name");
                        $update = mysqli_query($conn,"UPDATE product_setting SET file='$file_name'");
                        if($update){
                          $msg = "Image Update Successfully";
                          header("location:product-setting.php?msg=$msg");
                        }
                      }elseif(isset($_POST['remove'])){
                        $update = mysqli_query($conn,"UPDATE product_setting SET file=''");
                        if($update){
                          $msg = "Image Removed Successfully";
                          header("location:product-setting.php?msg=$msg");
                        }
                      }          
                      ?>
                      <div style="display:block;text-align:center;margin:30px auto;">
                      <form action="" method="POST" enctype="multipart/form-data">
                        <label for="">Feather Image</label>
                          <img style="padding-bottom:30px;max-width:100%" src="../upload/<?php echo $product['file']?>" alt="Logo">
                          <br>
                          <input class="input_file" type="file" name="file">
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

  <?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>



  
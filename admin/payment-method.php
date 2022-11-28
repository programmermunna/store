<?php include("common/header.php")?>
<?php include("common/sidebar.php")?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  <?php include("common/navbar.php")?>
<?php
if(isset($_POST['submit'])){
  $pmn_method = $_POST['pmn_method'];
  $pmn_number = $_POST['pmn_number'];

  $sql = "INSERT INTO payment_method(pmn_method,pmn_number) VALUE('$pmn_method','$pmn_number')";
  $query = mysqli_query($conn,$sql);
  if($query){
    $msg = "Successfully Inserted";
    header("location:payment-method.php?msg=$msg");
  }
}
$pmn_method = mysqli_query($conn,"SELECT * FROM payment_method");
?>
  <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Payment Method </h6>
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
                                <label for="name">Payment Method</label>
                                <select style="width:100%;padding:5px;border:1px solid #979797bf;border-radius:2px;" name="pmn_method" id="">
                                  <option value="Bkash">Bkash</option>
                                  <option value="Nogod">Nogod</option>
                                  <option value="Rocket">Rocket</option>
                                  <option value="Upay">Upay</option>
                                  <option value="Bank">Bank</option>
                                </select>
                              </div>
                              <div>
                                <label for="name">Payment Number</label>
                                <input required name="pmn_number" type="text">
                              </div>
                          </div>
                          <div>                            
                            <input name="submit" class="submit_btn" type="submit" value="Save">
                          </div>
                        </div>
                      </form>

                    <div class="payment_area">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Payment method</th>
                          <th>Payment Number</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        while($row = mysqli_fetch_assoc($pmn_method)){
                        ?>
                        <tr>
                          <td><?php echo $row['pmn_method']?></td>
                          <td><?php echo $row['pmn_number']?></td>
                          <td>
                            <a href="payment-edit.php?id=<?php echo $row['id']?>">Edit</a>
                            <a href="delete.php?src=payment-method&&id=<?php echo $row['id']?>">Delete</a>
                          </td>
                        </tr>
                        <?php }?>
                      </tbody>
                    </table>
                    </div>


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
    $('#summernote').summernote({
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



  
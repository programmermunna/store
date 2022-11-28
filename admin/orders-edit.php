<?php include("common/header.php")?>
<?php include("common/sidebar.php")?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  <?php include("common/navbar.php")?>
<?php
if(isset($_GET['src'])){
  $src = $_GET['src'];
  $id = $_GET['id'];
}

$user_data = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM admin_info WHERE id=$id"));
$order_data = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM orders WHERE user_id=$id"));
?>
<?php ob_start() ?>
<div style="background-color:#fff;font-family: Open Sans, sans-serif;font-size:100%;font-weight:400;line-height:1.4;color:#000;">
  <table style="max-width:670px;margin:50px auto 10px;border:1px solid gray;box-shadow:0 0 6px gray !important;">
    <thead>
      <tr>
        <th style="text-align:left;padding:20px"><img style="max-width: 150px;" src="https://www.bangladeshisoftware.com/wp-content/uploads/2022/09/2222_vectorized.png" alt="bachana tours"></th>
        <th style="text-align:right;font-weight:400;padding:20px">Date: <?php echo date("d-m-Y");?></th>
      </tr>
    </thead>
    <tbody> 
      <tr>
        <td style="height:35px;"></td>
      </tr>
      <tr>
        <td colspan="2" style="border: solid 1px #ddd; padding:10px 20px;">
          <p style="font-size:14px;margin:0 0 6px 0;"><span style="font-weight:bold;display:inline-block;min-width:150px">Order status</span><b style="color:green;font-weight:normal;margin:0">
          <?php if($order_data['status']=='Pending'){echo 'Success';}else{ echo 'Pending';}?>
          </b></p>
          <p style="font-size:14px;margin:0 0 6px 0;"><span style="font-weight:bold;display:inline-block;min-width:146px">Payment Number</span> <?php echo $order_data['pmn_number'];?></p>
          <p style="font-size:14px;margin:0 0 6px 0;"><span style="font-weight:bold;display:inline-block;min-width:146px">Transaction ID</span> <?php echo $order_data['trans_id'];?></p>
          <p style="font-size:14px;margin:0 0 0 0;"><span style="font-weight:bold;display:inline-block;min-width:146px">Order amount</span> ৳<?php echo $order_data['amount'];?></p>
        </td>
      </tr>
      <tr>
        <td style="height:35px;"></td>
      </tr>
      <tr>
        <td style="width:50%;padding:20px;vertical-align:top">
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bolder;font-size:18px;text-decoration:underline"><b>User</b></p>
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px">Name</span> <?php echo $user_data['name'];?></p>
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Email</span> <?php echo $user_data['email'];?></p>
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Address</span> <?php echo $user_data['address'];?></p>
        </td>
      </tr>

    </tbody>
    <tfooter>
      <tr>
        <td colspan="2" style="font-size:14px;padding:30px 20px">
          <strong style="display:block;margin:0 0 10px 0;">Regards</strong> <?php echo $website['name'];?><br><br>
          <b>Email:</b> <?php echo $website['email'];?><br>
          <b>Address:</b> <?php echo $website['address'];?>
        </td>
      </tr>
    </tfooter>
  </table>
</div>
<?php $email_template = ob_get_clean()?>
<?php
if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $address = $_POST['address'];

  $pmn_method = $_POST['pmn_method'];
  $pmn_number = $_POST['pmn_number'];
  $trans_id = $_POST['trans_id'];
  $years = $_POST['years'];
  $years_num = $years;
  $years = ($years*365)*86400;
  $years = time()+$years;
  $amount = $_POST['amount'];
  $status = $_POST['status'];
  $time = time();

  $user_update = mysqli_query($conn,"UPDATE admin_info SET name='$name', email='$email', address='$address',permision='$status' WHERE id=$id");
  $order_update = mysqli_query($conn,"UPDATE orders SET pmn_method='$pmn_method', pmn_number='$pmn_number', trans_id='$trans_id', years='$years', years_num='$years_num', amount='$amount', status='$status' WHERE user_id=$id");

  if($user_update && $order_update && $order_data['status'] !== $status){

  $sub = "Congratulations for Purchase Store Managment Software";
  
  $smtp_host = $mail['smtp_host'];
  $smtp_username = $mail['smtp_user_name'];
  $smtp_password = $mail['smtp_user_pass'];
  $smtp_port = $mail['smtp_port'];
  $smtp_secure = $mail['smtp_security'];
  $site_email = $mail['site_email'];
  $site_name = $mail['site_replay_email'];
  
  $address = $email;
  $subject = $sub;
  $body =  $email_template;
  $send = sendVarifyCode($smtp_host,$smtp_username,$smtp_password,$smtp_port,$smtp_secure,$site_email,$site_name,$address,$body,$subject);
  
 $msg = 'Successfully Updated.';
 header("location:$src.php?msg=$msg");
  }else{
  $msg = 'Order Eidt Successfully.';
 header("location:$src.php?msg=$msg");
  }
}
?>
  <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3"><?php echo $order_data['status']?> Orders</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-4">

                <div class="order-view">
                  <div class="edit">
                      <form action="" method="POST">
                        <div class="profile">
                          <div>
                              <div>
                                <label for="name">Name</label>
                                <input name="name" type="text" value="<?php echo $user_data['name']?>">
                              </div>
                              <div>
                                <label for="email">Email</label>
                                <input name="email" type="text" value="<?php echo $user_data['email']?>">
                              </div>
                              <div>
                                <label for="address">Address</label>
                                <input name="address" type="text" value="<?php echo $user_data['address']?>">
                              </div>
                          </div>
                          <div>
                              <div>
                                <label for="pmn_method">Payment Method</label>
                                <input name="pmn_method" type="text" value="<?php echo $order_data['pmn_method']?>">
                              </div>
                              <div>
                                <label for="pmn_number">Payment Number</label>
                                <input name="pmn_number" type="text" value="<?php echo $order_data['pmn_number']?>">
                              </div>
                              <div>
                                <label for="trans_id">Transection ID</label>
                                <input name="trans_id" type="text" value="<?php echo $order_data['trans_id']?>">
                              </div>
                          </div>
                          <div>
                            <select name="years">
                              <option style="visibility :hidden" selected value="<?php echo $order_data['years_num']?>"><?php echo $order_data['years_num']?> Years</option>
                              <option value="1">1 Years</option>
                              <option value="2">2 Years</option>
                              <option value="3">3 Years</option>
                              <option value="4">5 Years</option>
                              <option value="10">10 Years</option>
                            </select>
                          </div>

                          <div>
                              <div style="width:100%;margin:0;padding:0;">
                                <input name="amount" type="text" value="<?php echo $order_data['amount']?>">
                              </div>
                          </div>

                          <div>
                            <select name="status">
                              <?php
                                if($order_data['status']=='Pending'){ ?>
                              <option selected value="Pending">Pending</option>
                              <option value="Success">Success</option>
                            <?php    }else{ ?>
                              <option value="Pending">Pending</option>
                              <option selected value="Success">Success</option>
                              <?php }?>
                            </select>
                          </div>

                          <div>                            
                            <input name="submit" class="submit_btn" type="submit" value="Save">
                          </div>
                        </div>
                      </form>
                      </div>
                      <div class="view">
                        <div class="view-content">
                          <h3><?php echo strtoupper($user_data['name']);?></h3>
                          <h6><?php echo $user_data['email']?></h6>
                          <h6><?php echo $user_data['address']?></h6>
                          <p>Time: <b><?php echo $order_data['years_num']?> years</b></p>
                          <p>Payment Method: <b><?php echo $order_data['pmn_method']?></b></p>
                          <p>Payment Number: <b><?php echo $order_data['pmn_number']?></b></p>
                          <p>Transection ID: <b><?php echo $order_data['trans_id']?></b></p>
                          <p>Amount: <b><?php echo $order_data['amount']?>৳</b></p>
                          <p>Remainder: <b><?php $years = $order_data['years'];remainder($years);?></b></p>
                          <?php
                          if($order_data['status']=='Pending'){ ?>
                          <p>Status: <b style="color:red"><?php echo $order_data['status']?></b></p>
                        <?php }else{?>
                          <p>Status: <b style="color:green"><?php echo $order_data['status']?></b></p>  
                          <?php }?>
                        </div>
                        <div class="view-img">
                          <img src="../upload/avatar.jpg">
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

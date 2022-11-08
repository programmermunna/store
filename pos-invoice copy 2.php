<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php
if(isset($_GET['msg'])){ $msg = $_GET['msg'];}

if(isset($_GET['order'])){
  $order = $_GET['order'];
  $customer = $_GET['customer'];
  $status = $_GET['status'];

}
  $setting = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM setting WHERE id=1"));
  $customer = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM customer WHERE id='$customer'"));
  $row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM tmp_product WHERE order_no='$order' AND status='$status' ORDER BY id DESC"));

  $total_subtotal = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(subtotal) AS totalsum FROM tmp_product WHERE order_no='$order'"));
  $total_total = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(total) AS totalsum FROM tmp_product WHERE order_no='$order'"));
  $total_vat = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(vat_cost) AS totalsum FROM tmp_product WHERE order_no='$order'"));

 
?>

<?php ob_start(); ?>
<!-- Main Content -->
<main >

    <!-- Page Content -->
    <section style="color:black; max-width:700px; width:100%;margin:0 auto">
        <!-- Page Main Content -->
        <div>
            <h2 style="text-align:center;"><?php echo $setting['name'];?></h2>
            <p style="text-align:center;"><span><?php echo $setting['email'];?></span> , <span><?php echo $setting['address'];?></span></p>
            <div>
                <p style="text-align:left">Today</p>
                <p style="text-align:left"><?php echo date("d-m-Y")?></p>
            </div>
            <div>
                <p style="text-align:right"><b>Invoice Time:</b> <?php $time = $row['time'];echo date('d-m-y',$time);?></p>
                <p style="text-align:right"><b>invoice Status:</b> <span ><?php echo $row['status'];?></span> </p>
            </div>
            <div>
                <div>
                    <p><b>Name: </b><?php echo $customer['name'];?></p>
                    <p><b>Email: </b><?php echo $customer['email'];?></p>
                    <p><b>Phone: </b><?php echo $customer['phone'];?></p>
                    <p><b>Address:</b> <?php echo $customer['address'];?></p>
                    <p><b>Shop Name:</b> <?php echo $customer['shop'];?></p>
                </div>
            </div>
            <div >
                <div >
                    <table class="table" style="text-align:center;margin:30px auto;">
                        <thead>                        
                            <tr style="font-size:20px;background:#92588B;color:#fff;padding:20px;margin:0;padding:0;">
                                <th ">
                                </th>
                                <th ">
                                </th>
                                <th ">
                                </th>
                                <th ">
                                    <span>ORDER# <?php echo $order;?></span>
                                </th>
                                <th ">
                                </th>
                                <th ">
                                </th>
                            </tr>                      
                            <tr style="border:2px solid #dfdfdf;font-size:20px;">
                                <th ">
                                    <span>#</span>
                                </th>
                                <th ">
                                    <span style="padding:5px 50px">Product</span>
                                </th>
                                <th ">
                                    <span style="padding:5px 50px">Code</span>
                                </th>
                                <th ">
                                    <span style="padding:5px 50px">Quantity</span>
                                </th>
                                <th ">
                                    <span style="padding:5px 50px">Cost</span>
                                </th>
                                <th ">
                                    <span style="padding:5px 50px">Total</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody >
                          <?php 
                          $item = mysqli_query($conn,"SELECT * FROM tmp_product WHERE order_no='$order' AND product_name!='' ORDER BY id DESC");
                          $i = 0;
                          while($row2 = mysqli_fetch_assoc($item)){ $i++ ?>
                            <tr style="border:2px solid #dfdfdf">
                                <td ><?php echo $i;?></td>
                                <td ><?php echo $row2['product_name'];?></td>
                                <td ><?php echo $row2['product_code'];?></td>
                                <td ><?php echo $row2['quantity'];?></td>
                                <td >$<?php echo $row2['subtotal'];?></td>
                                <td >$<?php echo $row2['total'];?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div >
                <div>
                    <p><b>Payment By:</b> <?php echo $row['pay_method'];?></p>
                    <!-- <p><b>Payment By:</b> <?php //echo $customer['bank'];?></p> -->
                    <p><b>Pay:</b> <?php echo $row['amount'];?></p>
                    <p><b>Due:</b> <?php echo $total_total['totalsum']-$row['amount'];?></p>
                </div>
                <div>
                    <p style="text-align:right"><b>Sub total:</b> $<?php echo $total_subtotal['totalsum'];?></p>
                    <p style="text-align:right"><b>VAT:</b> $<?php echo $total_vat['totalsum'];?></p>
                </div>
            </div>
            <div >
                <b><h2 style="text-align:right">Total: $<?php echo $total_total['totalsum'];?></h2></b>
            </div>
    </section>
    <!-- Page Content -->
</main>
<?php echo $my_var = ob_get_clean();?>

<!-- Main Content -->
<main class="main_content">
    <!-- Side Navbar Links -->
    <?php include("common/sidebar.php");?>
    <!-- Side Navbar Links -->

    <!-- Page Content -->
    <section class="content_wrapper">
        <!-- Page Details Title -->
        <form action="" method="POST" enctype="multipart/form-data">
        <div class="page_details">
            <div>
                <a href="index.php" class="go_home"><small>Home</small></a>
                <small>/</small>
                <small>View Details</small>
            </div>
        </div>
        <!-- Page Main Content -->
        <div class="w-full p-5 bg-white shadow rounded invoice_details_wrapper" id="invoice_details_wrapper">
            <h2 style="text-align:center;"><?php echo $setting['name'];?></h2>
            <p style="text-align:center;"><span><?php echo $setting['email'];?></span> , <span><?php echo $setting['address'];?></span></p>
            <p style="text-align:center;"><?php echo $setting['address'];?></p>
            <div class="pb-5 binvoice-b flex flex-col items-end">
                <p>Today</p>
                <b><?php echo date("d-m-Y")?></b>
            </div>
            <div class="flex flex-col md:flex-row justify-between items-start pt-5">
                <div>
                    <p><b>Name: </b><?php echo $customer['name'];?></p>
                    <p><b>Email: </b><?php echo $customer['email'];?></p>
                    <p><b>Phone: </b><?php echo $customer['phone'];?></p>
                    <p><b>Address:</b> <?php echo $customer['address'];?></p>
                    <p><b>Shop Name:</b> <?php echo $customer['shop'];?></p>
                </div>
                <div>
                    <p><b>Invoice Time:</b> <?php $time = $row['time'];echo date('d-m-y',$time);?></p>
                    <p><b>invoice Status:</b> <span class="px-1.5 py-0.5 rounded bg-yellow-100"><?php echo $row['status'];?></span> </p>
                </div>
            </div>
            <div class="py-7">
                <div class="table_sub_parent capitalize">
                    <table class="table">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="table_th">
                                    <span>#</span>
                                </th>
                                <th class="table_th">
                                    <span>Product Name</span>
                                </th>
                                <th class="table_th">
                                    <span>Product Code</span>
                                </th>
                                <th class="table_th">
                                    <span>Quantity</span>
                                </th>
                                <th class="table_th">
                                    <span>Unit Cost</span>
                                </th>
                                <th class="table_th">
                                    <span>Total</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="invoices_wrapper" class="text-sm">
                          <?php 
                          $item = mysqli_query($conn,"SELECT * FROM tmp_product WHERE order_no='$order' AND product_name!='' ORDER BY id DESC");
                          $i = 0;
                          while($row2 = mysqli_fetch_assoc($item)){ $i++ ?>
                            <tr>
                                <td class="p-3 binvoice text-center"><?php echo $i;?></td>
                                <td class="p-3 binvoice text-center"><?php echo $row2['product_name'];?></td>
                                <td class="p-3 binvoice text-center"><?php echo $row2['product_code'];?></td>
                                <td class="p-3 binvoice text-center"><?php echo $row2['quantity'];?></td>
                                <td class="p-3 binvoice text-center">$<?php echo $row2['subtotal'];?></td>
                                <td class="p-3 binvoice text-center">$<?php echo $row2['total'];?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="text-lg flex flex-col md:flex-row justify-between items-start">
                <div>
                    <p><b>Payment By:</b> <?php echo $row['pay_method'];?></p>
                    <!-- <p><b>Payment By:</b> <?php //echo $customer['bank'];?></p> -->
                    <p><b>Pay:</b> <?php echo $row['amount'];?></p>
                    <p><b>Due:</b> <?php echo $total_total['totalsum']-$row['amount'];?></p>
                </div>
                <div>
                    <p><b>Sub total:</b> $<?php echo $total_subtotal['totalsum'];?></p>
                    <p><b>VAT:</b> $<?php echo $total_vat['totalsum'];?></p>
                </div>
            </div>
            <div class="binvoice-t mt-4 pt-4 text-3xl text-left md:text-right">
                <p>Total: $<?php echo $total_total['totalsum'];?></p>
            </div>
            <div class="invoice_btn_area binvoice-t mt-4 pt-4 flex justify-end items-center gap-2">
            <?php if(isset($msg)){ ?><div class="alert_success"><?php echo $msg; ?></div> <?php }?>
                <button onclick="window.print()"
                    class="btn text-base bg-gray-700 hover:bg-gray-800 focus:bg-gray-600 focus:ring text-white w-fit h-10 px-5 flex_center rounded-sm"><svg
                        xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5 4v3H4a2 2 0 00-2 2v3a2 2 0 002 2h1v2a2 2 0 002 2h6a2 2 0 002-2v-2h1a2 2 0 002-2V9a2 2 0 00-2-2h-1V4a2 2 0 00-2-2H7a2 2 0 00-2 2zm8 0H7v3h6V4zm0 8H7v4h6v-4z"
                            clip-rule="evenodd" />
                    </svg></button>
                <input type="submit" name="submit"  class="btn text-base bg-green-600 hover:bg-green-700 focus:bg-green-500 focus:ring text-white w-fit h-10 px-5 flex_center rounded-sm" value="Send Mail" />

                </form>
            </div>
    </section>
    <!-- Page Content -->
</main>







<?php 
if(isset($_GET['order'])){
$order = $_GET['order'];
$customer = $_GET['customer'];
$status = $_GET['status'];

}
//-----------send invoice info in email 
if(isset($_POST['submit'])){

    $my_var;  
    $email =  $customer['email'];


    $mail = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM mail_setting WHERE id=1"));

    $smtp_host = $mail['smtp_host'];
    $smtp_username = $mail['smtp_user_name'];
    $smtp_password = $mail['smtp_user_pass'];
    $smtp_port = $mail['smtp_port'];
    $smtp_secure = $mail['smtp_security'];
    $site_email = $mail['site_email'];
    $site_name = $mail['site_replay_email'];
    $address = $email;
    $body = $my_var;
    $subject = 'OTP verification';
    $send = sendVarifyCode($smtp_host,$smtp_username,$smtp_password,$smtp_port,$smtp_secure,$site_email,$site_name,$address,$body,$subject);

      if($send){
        $msg = 'This invoice has been sent successfully!';
        header("location:pos-invoice.php?msg=$msg&&order=$order&&customer=$customer&&status=$status");
      }




}

           
?>

<!-- Side Navbar Links -->
<?php include("common/footer.php");?>
<!-- Side Navbar Links -->





----

<main style="background:#dfdfdf;padding:30px">

    <!-- Page Content -->
    <section style="color:#000; max-width:700px; width:100%;margin:0 auto;padding:20px;background:#fff">
        <!-- Page Main Content -->
            <div>
            <!-- <h2 style="text-align:center;"><?php echo $setting['name'];?></h2>
            <p style="text-align:center;"><span><?php echo $setting['email'];?></span> , <span><?php echo $setting['address'];?></span></p> -->
            <h2 style="background:#065CB6;color:#fff;padding:20px;">Order: #8364</h2>
            <div style="padding:20px">
                <p>You have received the folloing order;Bangladeshsoftware.com</p>
            </div>
            <div style="padding:20px">
                <p ><b>Invoice Time:</b> <?php $time = $row['time'];echo date('d-m-y',$time);?></p>
                <p ><b>invoice Status:</b> <span ><?php echo $row['status'];?></span> </p>
            </div>
            
            <div >
                <div >
                    <table class="table" style="text-align:center;margin:30px auto;">
                        <thead>                     
                            <tr style="border:2px solid #dfdfdf;font-size:20px;">
                                <th ">
                                    <span style="padding:5px 50px">Product</span>
                                </th>
                                <th ">
                                    <span style="padding:5px 50px">Quantity</span>
                                </th>
                                <th ">
                                    <span style="padding:5px 50px">Price</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody >
                          <?php 
                          $item = mysqli_query($conn,"SELECT * FROM tmp_product WHERE order_no='$order' AND product_name!='' ORDER BY id DESC");
                          $i = 0;
                          while($row2 = mysqli_fetch_assoc($item)){ $i++ ?>
                            <tr style="border:2px solid #dfdfdf">
                                <td ><?php echo $row2['product_name'];?></td>
                                <td ><?php echo $row2['quantity'];?></td>
                                <td >$<?php echo $row2['subtotal'];?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div>
                <div style="color:#065CB6;padding:20px 0;font-size:25px;font-weight:700">Billing address</div>
                <div style="border:2px solid #E5E5E5;padding:10px;">
                    <p><b></b><?php echo $customer['name'];?></p>
                    <p><b></b><?php echo $customer['email'];?></p>
                    <p><b></b><?php echo $customer['phone'];?></p>
                    <p><b></b> <?php echo $customer['address'];?></p>
                </div>
            </div>
            <div >
                <div>
                    <p><b>Payment By:</b> <?php echo $row['pay_method'];?></p>
                    <!-- <p><b>Payment By:</b> <?php //echo $customer['bank'];?></p> -->
                    <p><b>Pay:</b> <?php echo $row['amount'];?></p>
                    <p><b>Due:</b> <?php echo $total_total['totalsum']-$row['amount'];?></p>
                </div>
                <div>
                    <p style="text-align:right"><b>Sub total:</b> $<?php echo $total_subtotal['totalsum'];?></p>
                    <p style="text-align:right"><b>VAT:</b> $<?php echo $total_vat['totalsum'];?></p>
                </div>
            </div>
            <div >
                <b><h2 style="text-align:right">Total: $<?php echo $total_total['totalsum'];?></h2></b>
            </div>
    </section>
    <!-- Page Content -->
</main>



<!-- ----- pay , due, method ---------------- -->
<div >
                <div>
                    <p><b>Payment By:</b> <?php echo $row['pay_method'];?></p>
                    <!-- <p><b>Payment By:</b> <?php //echo $customer['bank'];?></p> -->
                    <p><b>Pay:</b> <?php echo $row['amount'];?></p>
                    <p><b>Due:</b> <?php echo $total_total['totalsum']-$row['amount'];?></p>
                </div>
                <div>
                    <p style="text-align:right"><b>Sub total:</b> $<?php echo $total_subtotal['totalsum'];?></p>
                    <p style="text-align:right"><b>VAT:</b> $<?php echo $total_vat['totalsum'];?></p>
                </div>
            </div>
            <div >
                <b><h2 style="text-align:right">Total: $<?php echo $total_total['totalsum'];?></h2></b>
            </div>
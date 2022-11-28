<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php
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
<main>
    <!-- Page Content -->
    <h2 style="max-width:600px; width:100%;margin:0 auto;background:#065CB6;color:#fff;padding:30px;"><?php echo $setting['name'];?></h2>
    <section style="max-width:600px; width:100%;margin:0 auto;padding:2%;border:1px solid #dfdfdf;color:#000;">
        <!-- Page Main Content -->
        <div>
            <div style="padding:0 10px">
                <p ><b>Date:</b> <?php $time = $row['time'];echo date('d-m-y',$time);?></p>
                <p ><b>Status:</b> <span ><?php echo $row['status'];?></span> </p>
                <p ><b>Order no#</b> <span ><?php echo $order?></span> </p>
            </div>
            
            <div >
                <div >
                    <table class="table" style="text-align:left;margin:30px auto;width:100%;border-collapse: collapse;">
                        <thead>                     
                            <tr style="border:2px solid #dfdfdf;font-size:20px;">
                                <th style="border:1px solid #dfdfdf;padding:10px">
                                    brand
                                </th>
                                <th style="border:1px solid #dfdfdf;padding:10px">
                                    Product
                                </th>
                                <th style="border:1px solid #dfdfdf;padding:10px">
                                    Quantity
                                </th>
                                <th style="border:1px solid #dfdfdf;padding:10px">
                                    Price
                                </th>
                            </tr>
                        </thead>
                        <tbody >
                          <?php 
                          $item = mysqli_query($conn,"SELECT * FROM tmp_product WHERE order_no='$order' AND product_name!='' ORDER BY id DESC");
                          $i = 0;
                          while($row2 = mysqli_fetch_assoc($item)){ $i++ ?>
                            <tr style="border:2px solid #dfdfdf;">
                                <td style="border:1px solid #dfdfdf;padding:10px;"><?php echo $row2['brand'];?></td>
                                <td style="border:1px solid #dfdfdf;padding:10px;"><?php echo $row2['product_name'];?></td>
                                <td style="border:1px solid #dfdfdf;padding:10px;"><?php echo $row2['quantity'];?></td>
                                <td style="border:1px solid #dfdfdf;padding:10px;">৳<?php echo $row2['subtotal'];?></td>
                            </tr>
                            <?php } ?>
                            <tr style="border:2px solid #dfdfdf;">
                                <td style="border:1px solid #dfdfdf;padding:10px;" colspan="3"><b>Vat</b></td>
                                <td style="border:1px solid #dfdfdf;padding:10px;"><b>৳<?php echo $total_vat['totalsum'];?></b></td>
                            </tr>
                            <tr style="border:2px solid #dfdfdf;">
                                <td style="border:1px solid #dfdfdf;padding:10px;" colspan="3"><b>Subtotal</b></td>
                                <td style="border:1px solid #dfdfdf;padding:10px;"><b>৳<?php echo $total_subtotal['totalsum'];?></b></td>
                            </tr>
                            <tr style="border:2px solid #dfdfdf;">
                                <td style="border:1px solid #dfdfdf;padding:10px;" colspan="3"><b>Total</b></td>
                                <td style="border:1px solid #dfdfdf;padding:10px;"><b>৳<?php echo $total_total['totalsum'];?></b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div>
                <div style="color:#065CB6;padding:20px 0;font-size:25px;font-weight:700">Billing address</div>
                <div style="border:2px solid #E5E5E5;padding:3px 10px;">
                    <p><?php echo $customer['name'];?></p>
                    <p><?php echo $customer['email'];?></p>
                    <p><?php echo $customer['phone'];?></p>
                    <p><?php echo $customer['address'];?></p>
                </div>
            </div>
            <div style="margin-top:20px">Congratulations on the sale.</div>
            <div style="margin-bottom:20px 0">Copyright @ <?php echo $setting['website'];?></div>
        </div>
    </section>
    <!-- Page Content -->
</main>
<?php $my_var = ob_get_clean();?>

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
                                    <span>Brand</span>
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
                                <td class="p-3 binvoice text-center"><?php echo $row2['brand'];?></td>
                                <td class="p-3 binvoice text-center"><?php echo $row2['product_name'];?></td>
                                <td class="p-3 binvoice text-center"><?php echo $row2['product_code'];?></td>
                                <td class="p-3 binvoice text-center"><?php echo $row2['quantity'];?></td>
                                <td class="p-3 binvoice text-center">৳<?php echo $row2['subtotal'];?></td>
                                <td class="p-3 binvoice text-center">৳<?php echo $row2['total'];?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="text-lg flex flex-col md:flex-row justify-between items-start">
                <div>
                    <p><b>Payment By:</b> <?php echo $row['pay_method'];?></p>
                    <p><b>Pay:</b> ৳<?php echo $row['amount'];?></p>
                    <p><b>Due:</b> ৳<?php echo $total_total['totalsum']-$row['amount'];?></p>
                </div>
                <div>
                    <p><b>Sub total:</b> ৳<?php echo $total_subtotal['totalsum'];?></p>
                    <p><b>VAT:</b> ৳<?php echo $total_vat['totalsum'];?></p>
                </div>
            </div>
            <div class="binvoice-t mt-4 pt-4 text-3xl text-left md:text-right">
                <p>Total: ৳<?php echo $total_total['totalsum'];?></p>
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
    $subject = 'Congratulations For Purchase Product.';
    $send = sendVarifyCode($smtp_host,$smtp_username,$smtp_password,$smtp_port,$smtp_secure,$site_email,$site_name,$address,$body,$subject);

    $msg = 'Mail was sent successfully.';
    header("location:pos-invoice.php?msg=$msg");

}         
?>
<!-- Side Navbar Links -->
<?php include("common/footer.php");?>
<!-- Side Navbar Links -->
<?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>

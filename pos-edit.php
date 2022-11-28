<!-- Header -->
<?php include("common/header.php"); ?>
<!-- Header -->
<?php
if (isset($_GET['order'])) {
  $order = $_GET['order'];
  $customer_id = $_GET['customer'];
}

 $customer_info = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM customer WHERE id=$customer_id"));
 $customer =  $customer_info['name'];
 $time = time();

 $total_quantity = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(quantity) AS totalsum FROM tmp_product WHERE order_no='$order'"));
 $total_subtotal = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(subtotal) AS totalsum FROM tmp_product WHERE order_no='$order'"));
 $total_total = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(total) AS totalsum FROM tmp_product WHERE order_no='$order'"));
 $total_vat = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(vat_cost) AS totalsum FROM tmp_product WHERE order_no='$order'"));

if (isset($_POST['submit'])) {
  $amount = $_POST['amount'];
  $status = $_POST['status'];
  $time = time();
  $row2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tmp_product WHERE order_no='$order' AND customer_id='$customer_id'"));                
  $amount = $row2['amount']+$amount;

  $sql = "UPDATE tmp_product SET amount='$amount',status='$status',time='$time' WHERE order_no='$order' AND customer_id='$customer_id'";
  $query = mysqli_query($conn,$sql);
  if($query){
   $msg = "Successfully Updated Order!";
   header("location:order-pending.php?msg=$msg");
  }
}

?>
<!-- Main Content -->
<main class="main_content">
  <!-- Side Navbar Links -->
  <?php include("common/sidebar.php"); ?>
  <!-- Side Navbar Links -->

  <!-- Page Content -->
  <section class="content_wrapper">
    <!-- Page Details Title -->
    <div class="page_details">
      <div>
        <a href="index.php" class="go_home"><small>Home</small></a>
        <small>/</small>
        <small>Edti Order</small>
      </div>
    </div>

    <!-- Page Main Content -->
    <h4 class="p-3 rounded bg-gray-50 shadow text-base font-semibold tracking-wider">
    Edti Order
    </h4>
    <div class="w-full flex flex-col-reverse lg:flex-row gap-3">



      <div class="w-full lg:w-12/12">
        <div class="w-full mx-auto bg-white shadow-lg rounded-md border overflow-hidden border-gray-200">
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="w-full black">
              <div class="w-full overflow-x-auto">
                <table class="table-auto w-full">
                  <thead>
                    <tr class="bg-blue-400">
                      <th class="table_th">
                        <span class="text-white">Name</span>
                      </th>
                      <th class="table_th">
                        <span class="text-white">Quantity</span>
                      </th>
                      <th class="table_th">
                        <span class="text-white">Price</span>
                      </th>
                      <th class="table_th">
                        <span class="text-white">Vat</span>
                      </th>
                      <th class="table_th">
                        <span class="text-white">Sub Total</span>
                      </th>
                      <th class="table_th">
                        <span class="text-white">Total</span>
                      </th>
                    </tr>
                  </thead>
                  <tbody id="selected_products_wrapper" class="text-sm divide-y divide-gray-300">
                    <?php
                    $tmp_product = mysqli_query($conn, "SELECT * FROM tmp_product WHERE order_no='$order' AND product_name!='' ORDER BY id DESC");
                    $i = 0;
                    while ($row = mysqli_fetch_assoc($tmp_product)) {
                      $i++ ?>
                      <tr>
                        <!-- <td class="pt-5 pl-5">No data</td> -->

                        <td class="p-3 border text-center"><?php echo $row['product_name']; ?></td>
                        <td class="p-3 border text-center"><?php echo $row['quantity']; ?></td>
                        <td class="p-3 border text-center">$<?php echo $row['sell_price']; ?></td>
                        <td class="p-3 border text-center"><?php echo $row['vat']?>%</td>
                        <td class="p-3 border text-center">$<?php echo $row['subtotal']?></td> 
                        <td class="p-3 border text-center">$<?php echo $row['total']?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
                <br />
              </div>
            </div>
            <div class="bg-white">
              <div class="bg-blue-500 text-lg text-white py-3">
                <div class="flex_center gap-5 py-1">
                  <p>Quantity:</p>
                  <p id="pos_quantity"><?php echo $total_quantity['totalsum'];?> items</p>
                </div>
                <div class="flex_center gap-5 py-1">
                  <p>Sub Total:</p>
                  <p id="pos_total">$ <?php echo $total_subtotal['totalsum'];?></p>
                </div>
                <div class="flex_center gap-5 py-1">
                  <p>Vat:</p>
                  <p id="pos_vat">$ <?php echo $total_vat['totalsum'];?></p>
                </div>
                <div class="flex_center flex-col py-5 mt-2.5 border-t text-2xl">
                  <p>Total:</p>
                  <p id="pos_total">$ <?php echo $total_total['totalsum'];?></p>
                </div>
              </div>
              <?php $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tmp_product WHERE order_no='$order' AND customer_id='$customer_id'"));?>
              <div class="p-5 flex flex-col items-left gap-3">
                <b>Customer</b>
                <input disabled type="text" value="<?php echo $customer ?>" class="border-4 border-gray-100 p-1 w-full outline-none bg-gray-100 rounded focus:ring">
                <b>Pay</b>
                <input disabled type="text" value=" <?php echo $row['amount'];?>" class="border-4 border-gray-100 p-1 w-full outline-none bg-gray-100 rounded focus:ring">
                <b>Due</b>
                <input disabled type="text" value=" <?php                                
                echo $total_total['totalsum']-$row['amount'];?>" class="border-4 border-gray-100 p-1 w-full outline-none bg-gray-100 rounded focus:ring">
                <b>Add Amount</b>
                <input required name="amount" type="number" placeholder="amount" class="border-4 border-gray-100 p-1 w-full outline-none bg-gray-100 rounded focus:ring">
                <b>Status</b>
                <select name="status" class="border-4 border-gray-100 p-1 w-full outline-none bg-gray-100 rounded focus:ring">
                  <option value="Pending">Pending</option>
                  <option value="Success">Success</option>
                </select>
                <input class="btn bg-blue-500 focus:bg-blue-700 active:bg-blue-700 hover:bg-blue-600 text-white p-2 focus:ring rounded" type="submit" name="submit" value="Update Order">
              </div>
            </div>
          </form>
        </div>
      </div>

    </div>
  </section>
</main>

<?php include("common/footer.php"); ?>
<!-- Side Navbar Links -->
<?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>

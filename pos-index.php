<!-- Header -->
<?php include("common/header.php"); ?>
<!-- Header -->
<?php
if (isset($_GET['order'])) {
  $order = $_GET['order'];
}

$total_quantity = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(quantity) AS totalsum FROM tmp_product WHERE order_no='$order'"));
$total_subtotal = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(subtotal) AS totalsum FROM tmp_product WHERE order_no='$order'"));
$total_total = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(total) AS totalsum FROM tmp_product WHERE order_no='$order'"));
$total_vat = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(vat_cost) AS totalsum FROM tmp_product WHERE order_no='$order'"));


$all_customer = mysqli_query($conn, "SELECT * FROM customer WHERE admin_id=$id ORDER BY id DESC");
if (isset($_POST['submit'])) {
  $customer_id = $_POST['customer_id'];
  $pay_method = $_POST['pay_method'];
  $amount = $_POST['amount'];
  $status = $_POST['status'];

  $date = date("F Y",time());
  $time = time();


  $product_check = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tmp_product WHERE order_no='$order' AND admin_id=$id"));
  if ($product_check == true) {
    $customer_check = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM customer WHERE id='$customer_id' AND admin_id=$id"));
    if ($customer_check == true) {

      $sql = "INSERT INTO tmp_product(admin_id,order_no,customer_id,pay_method,amount,status,date,time) VALUES($id,'$order','$customer_id','$pay_method','$amount','$status','$date','$time')";
      $query = mysqli_query($conn, $sql);
      if ($query) {
        header("location:pos-invoice.php?order=$order&&customer=$customer_id&&status=$status");
      }
    } else {
      $msg = "Customer not found. Please Create customer";
      header("location:pos-index.php?msg=$msg&&order=$order");
    }
  } else {
    $msg = "Please select some product";
    header("location:pos-index.php?msg=$msg&&order=$order");
  }
}



// --------------------add product here 
if(isset($_POST['product_add'])){
    $product_name = $_POST['product_name'];
    $sell_price = $_POST['sell_price'];
    $brand = $_POST['brand'];
    $category = $_POST['category'];
    $date = $_POST['date'];
    $product_code = rand(1000,9999999);
    $vat = $_POST['vat'];
    $time = time();
  
    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    move_uploaded_file($file_tmp,"upload/$file_name");

    $sql = "INSERT INTO product(admin_id,product_name,sell_price,product_code,vat,brand,category,date,file,time) VALUES($id,'$product_name','$sell_price','$product_code','$vat','$brand','$category','$date','$file_name','$time')";
    $query = mysqli_query($conn,$sql);
    if($query){
     $msg = "Successfully Created New Product!";
     header("location:pos-index.php?msg=$msg&&order=$order");
    }else{
     $msg = "Something is worng!";
    }
  }

// --------------------add customer here 
if(isset($_POST['customer_add'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $time = time();

  $file_name = $_FILES['file']['name'];
  $file_tmp = $_FILES['file']['tmp_name'];
  move_uploaded_file($file_tmp,"upload/$file_name");

  $sql = "INSERT INTO customer(admin_id,name,email,phone,address,city,file,time) VALUES($id,'$name','$email','$phone','$address','$city','$file_name','$time')";
  $query = mysqli_query($conn,$sql);
  if($query){
  $msg = "Successfully Created New Customer!";
  header("location:customer-new.php?msg=$msg");
  }else{
  echo "Something is worng!";
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
                <small>Point Of Sale</small>
            </div>
        </div>

        <!-- Page Main Content -->
        <h4 class="p-3 rounded bg-gray-50 shadow text-base font-semibold tracking-wider page_heading">
            <span>POS (Point Of Sale)</span>
             <div>
                <button class="product_btn px-4 py-2 text-sm bg-blue-600 text-white rounded focus:ring">Add Product</button> 
                <button class="customer_btn  px-4 py-2 text-sm bg-blue-600 text-white rounded focus:ring">Add Customer</button>
            </div>
            
        </h4>
        <div class="py-5 flex flex-wrap gap-2 justify-start">
        </div>

        <div class="w-full flex flex-col-reverse lg:flex-row gap-3 flex_order">
            <div class="w-full lg:w-6/12 flex_order_left">
                <div style="position:relative;"
                    class="w-full mx-auto bg-white shadow-lg rounded border overflow-hidden border-gray-200">


                    <div class="table_header_left pos_category">
                        <div class="relative categories_ul_ref_parent">
                            <ul class="categories_ul_ref ring-2 mt-2 ring-gray-100 rounded"></ul>
                            <button class="hide_categories_ul_ref_parent absolute right-2 top-2 text-xs px-2 py-1 bg-gray-100 hover:bg-gray-200 rounded">hide<button>
                        </div>
                    </div>

                    <header class="table_header">
                        <div style="position:relative;" class="table_header_left">
                            <input id="category_input" style="width:300px;" type="text" placeholder="Select categroy" />
                        </div>

                        <form action="" method="POST">
                            <div class="table_header_right">
                                <input id="src_text" type="search" name="src_text" placeholder="Search Product" />
                                <input style="cursor:pointer;" type="submit" name="search" class="btn" value="Search" />
                            </div>
                        </form>
                    </header>

                    <div class="table_parent">
                        <div class="table_sub_parent">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="table_th">
                                            <div class="table_th_div">
                                                <span>Name</span>
                                            </div>
                                        </th>
                                        <th class="table_th">
                                            <span>Image</span>
                                        </th>
                                        <th class="table_th">
                                            <div class="table_th_div">
                                                <span>Brand</span>
                                            </div>
                                        </th>
                                        <th class="table_th">
                                            <div class="table_th_div">
                                                <span>Price</span>
                                            </div>
                                        </th>
                                        <th class="table_th">
                                            <span>Action</span>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody id="pos_products_wrapper" class="text-sm">
                            <?php
                            if (isset($_POST['search'])) {
                                $src_text = trim($_POST['src_text']);
                                $sql = "SELECT * FROM product WHERE product_name = '$src_text' OR brand = '$src_text' OR sell_price = '$src_text' AND admin_id=$id ORDER BY id DESC";
                                $search_query = mysqli_query($conn, $sql);
                            }
                            if (isset($search_query)) {
                                $i = 0;
                                while ($row = mysqli_fetch_assoc($search_query)) {
                                $i++ ?>
                                    <tr class="">
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['product_name'] ?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="w-full h-full flex_center">
                                                <img class="rounded-sm" src="upload/<?php echo $row['file'] ?>"
                                                    width="60" height="60" alt="" />
                                            </div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['brand'] ?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['sell_price']?>৳</div>
                                        </td>

                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="w-full flex_center">
                                                <a class="btn w-7 h-7 flex_center rounded focus:ring bg-teal-500 text-white text-xl"
                                                    href="porduct_add.php?order=<?php echo $order; ?>&&pr_id=<?php echo $row['product_code'] ?>&&vat=<?php echo $row['vat'] ?>">+</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php }
                            } else {
                                $showRecordPerPage = 6;
                                if (isset($_GET['page']) && !empty($_GET['page'])) {
                                $currentPage = $_GET['page'];
                                } else {
                                $currentPage = 1;
                                }
                                $startFrom = ($currentPage * $showRecordPerPage) - $showRecordPerPage;
                                $totalEmpSQL = "SELECT * FROM product WHERE admin_id=$id ORDER BY id DESC";
                                $allEmpResult = mysqli_query($conn, $totalEmpSQL);
                                $totalEmployee = mysqli_num_rows($allEmpResult);
                                $lastPage = ceil($totalEmployee / $showRecordPerPage);
                                $firstPage = 1;
                                $nextPage = $currentPage + 1;
                                $previousPage = $currentPage - 1;
                                $empSQL = "SELECT * FROM product WHERE admin_id=$id ORDER BY id DESC LIMIT $startFrom, $showRecordPerPage";
                                $query = mysqli_query($conn, $empSQL);
                                $i = 0;
                                while ($row = mysqli_fetch_assoc($query)) {
                                $i++; ?>
                                    <tr class="">
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['product_name'] ?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="w-full h-full flex_center">
                                                <img class="rounded-sm" src="upload/<?php echo $row['file'] ?>"
                                                    width="60" height="60" alt="" />
                                            </div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['brand'] ?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['sell_price']?>৳</div>
                                        </td>

                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="w-full flex_center">
                                                <a class="btn w-7 h-7 flex_center rounded focus:ring bg-teal-500 text-white text-xl"
                                                    href="porduct_add.php?order=<?php echo $order; ?>&&pr_id=<?php echo $row['product_code'] ?>&&vat=<?php echo $row['vat'] ?>">+</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php }
                  } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php
                      if (!isset($_POST['search'])) { ?>
                    <br>
                    <div class="w-full" style="display: flex; justify-content: space-between;">

                        <nav aria-label="Page navigation">
                            <ul class="pagination_buttons">

                                <?php if ($currentPage >= 2) { ?>
                                <li class="pagination"><a class="page-link"
                                        href="?order=<?php echo $order; ?>&&page=<?php echo $previousPage ?>">Previws</a>
                                </li>
                                <?php } ?>
                                <?php if ($currentPage != $firstPage) { ?>
                                <li class="pagination">
                                    <a class="page-link"
                                        href="?order=<?php echo $order ?>&&page=<?php echo $firstPage ?>">
                                        <span class="page-link" aria-hidden="true">1</span>
                                    </a>
                                </li>
                                <?php } ?>

                                <li class="pagination active"><a class="page-link active"
                                        href="?order=<?php echo $order ?>&&page=<?php echo $currentPage ?>"><?php echo $currentPage ?></a>
                                </li>

                                <?php if ($currentPage < $lastPage) { ?>
                                <li class="pagination "><a class="page-link"
                                        href="?order=<?php echo $order ?>&&page=<?php echo $currentPage + 1 ?>"><?php echo $currentPage + 1 ?></a>
                                </li>
                                <?php } ?>

                                <?php if ($currentPage < $lastPage) { ?>
                                <li class="pagination "><a class="page-link"
                                        href="?order=<?php echo $order ?>&&page=<?php echo $currentPage + 1 + 1 ?>"><?php echo $currentPage + 1 + 1 ?></a>
                                </li>
                                <?php } ?>

                                <?php if ($currentPage < $lastPage) { ?>
                                <li class="pagination "><a class="page-link"
                                        href="?order=<?php echo $order ?>&&page=<?php echo $currentPage + 1 + 1 + 1 ?>"><?php echo $currentPage + 1 + 1 + 1 ?></a>
                                </li>
                                <?php } ?>

                                <?php if ($currentPage < $lastPage) { ?>
                                <li class="pagination"><a class="page-link"
                                        href="?order=<?php echo $order ?>&&page=<?php echo $nextPage ?>">Next</a></li>
                                <?php } ?>

                                <li class="pagination">
                                    <a class="page-link"
                                        href="?order=<?php echo $order ?>&&page=<?php echo $lastPage ?>"
                                        aria-label="Next">
                                        <span aria-hidden="true">Last</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <div class="pagination_buttons">Page <?php echo $currentPage ?> of <?php echo $lastPage ?></div>
                    </div>
                    <?php } ?>

                </div>
            </div>

            <div class="w-full lg:w-6/12 flex_order_right">
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
                                            <th class="table_th">
                                                <span class="text-white">Action</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="selected_products_wrapper" class="text-sm divide-y divide-gray-300">
                                        <?php
                                        $tmp_product = mysqli_query($conn, "SELECT * FROM tmp_product WHERE order_no='$order' AND admin_id=$id ORDER BY id DESC");
                                        while ($row = mysqli_fetch_assoc($tmp_product)) { ?>
                                        <tr>
                                            <!-- <td class="pt-5 pl-5">No data</td> -->

                                            <td class="p-3 border text-center"><?php echo $row['product_name']; ?></td>
                                            <td class="p-3 border text-center">
                                                <div class="text-center flex_center gap-1">
                                                    <input value="<?php echo $row['quantity']; ?>" type="number"
                                                        name="quantity"
                                                        class="selected_quantity_input w-12 p-1 rounded border-2 text-center" />

                                                    <a href="quantity_add.php?order=<?php echo $order; ?>&&pr_id=<?php echo $row['product_code']; ?>&&quantity=1"
                                                        class="qnt_check_button quantity_check_bnt btn w-7 h-7 flex_center rounded focus:ring bg-teal-500 text-white text-xl">✔</a>
                                                </div>
                                            </td>
                                            <td class="p-3 border text-center">৳<?php echo $row['sell_price']; ?></td>
                                            <td class="p-3 border text-center"><?php echo $row['vat'] ?>%</td>
                                            <td class="p-3 border text-center">৳<?php echo $row['subtotal'] ?></td>
                                            <td class="p-3 border text-center">৳<?php echo $row['total'] ?></td>
                                            <td class="p-3 border text-center">
                                                <div class="w-full flex_center">
                                                    <a href="delete.php?src=delete_item&&order=<?php echo $order; ?>&&id=<?php echo $row['product_code']; ?>"
                                                        class="btn px-2 py-1 rounded focus:ring bg-red-500 text-white text-xs">Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <br />
                            </div>
                        </div>
                        <div class="bg-white">
                            <div class="bg-blue-500 text-lg text-white py-2">
                                <div class="flex_center gap-5 py-1">
                                    <p>Quantity:</p>
                                    <p id="pos_quantity"><?php echo $total_quantity['totalsum']; ?> items</p>
                                </div>
                                <div class="flex_center gap-5 py-1">
                                    <p>Sub Total:</p>
                                    <p id="pos_total">৳<?php echo $total_subtotal['totalsum']; ?></p>
                                </div>
                                <div class="flex_center gap-5 py-1">
                                    <p>Vat:</p>
                                    <p id="pos_vat">৳<?php echo $total_vat['totalsum']; ?></p>
                                </div>
                                <div class="flex_center flex-col py-5 mt-2.5 border-t text-2xl">
                                    <p>Total:</p>
                                    <p id="pos_total">৳<?php echo $total_total['totalsum']; ?></p>
                                </div>
                            </div>
                            <div class="p-5 flex flex-col items-left gap-3">

                                <div style="display: flex; gap:10px;">
                                    <select id="customer_select"
                                        class="border-4 border-gray-100 p-1 w-full outline-none bg-gray-100 rounded focus:ring">
                                        <option style="display:none;" selected value="" disabled>Select Customer
                                        </option>
                                        <?php while ($row = mysqli_fetch_assoc($all_customer)) { ?>
                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                        <?php } ?>
                                    </select> <span style="padding-top:10px;"> OR </span>
                                    <input required name="customer_id" id="customer_id"
                                        class="border-4 border-gray-100 p-1 w-full outline-none bg-gray-100 rounded focus:ring"
                                        type="search" placeholder="Customer ID">
                                </div>

                                <select required name="pay_method"
                                    class="border-4 border-gray-100 p-1 w-full outline-none bg-gray-100 rounded focus:ring">
                                    <option style="display:none;" selected disabled>Payment Method</option>
                                    <option value="Handcash">Handcash</option>
                                    <option value="Online">Online</option>
                                </select>

                                <input required name="amount" type="number" placeholder="amount"
                                    class="border-4 border-gray-100 p-1 w-full outline-none bg-gray-100 rounded focus:ring">
                                <select required name="status"
                                    class="border-4 border-gray-100 p-1 w-full outline-none bg-gray-100 rounded focus:ring">
                                    <option value="Success">Success</option>
                                    <option value="Pending">Pending</option>
                                </select>
                                <input
                                    class="btn bg-blue-500 focus:bg-blue-700 active:bg-blue-700 hover:bg-blue-600 text-white p-2 focus:ring rounded"
                                    type="submit" name="submit" value="Create Invoice">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- here I am am added Product popup -->
                <form action="" method="POST" enctype="multipart/form-data"> 
                    <div class="add_category_wrapper product_block" style="display:none;">
                        <div class="hide_add_new_cat fixed inset-0 w-full h-screen bg-black bg-opacity-50 z-40"></div>
                        <div class="fixed w-[96%] md:w-[500px] p-5 inset-0 m-auto bg-white rounded shadow z-50 h-fit">
                        <h1 style="text-align:center;" class="p-4 border-b">
                            Add Product
                        </h1>

                        <div style="padding:15px 0;" class="add_product_main">
                            <label>Product Name</label>
                            <input type="text" name="product_name" placeholder="Product name" class="input" />
                            </div>

                            <div>
                            <label>Price</label>
                            <input type="number" name="sell_price" placeholder="price" class="input" />
                            </div>

                            <div style="padding:15px 0;">             
                            <label>Select Brand</label>
                            <select style="border-width:0px;" name="brand" class="input">
                            <option style="display:none;" selected >Select Brand</option>
                            <?php $brand = mysqli_query($conn,"SELECT * FROM brand WHERE admin_id=$id"); 
                            while($row = mysqli_fetch_assoc($brand)){ ?>
                            <option value="<?php echo $row['name']?>"><?php echo $row['name']?></option>
                            <?php }?>
                            </select>
                            </div>

                            <div style="padding-bottom:15px;">
                            <label>Select Category</label>
                            <select style="border-width:0px;" name="category" class="input">
                            <?php $brand = mysqli_query($conn,"SELECT * FROM category WHERE admin_id=$id"); 
                            while($row = mysqli_fetch_assoc($brand)){ ?>
                                <option style="display:none;" selected >Select category</option>
                                <option value="<?php echo $row['category']?>"><?php echo $row['category']?></option>
                            <?php }?>
                            </select>
                            </div>

                            <div>
                            <label>Date</label>
                            <input type="text" name="date" class="input" placeholder="mm/dd/yy" />
                            </div>

                            <div>
                            <label>Vat</label>
                            <input type="text" name="vat" placeholder="Product vat" class="input" />
                            </div>
                            <br>
                            <div>
                            <input type="file" name="file" title="profile" />
                            </div>

                        <div class="p-4 flex items-center justify-end gap-x-3 border-t mt-4">
                          <button class="btn w-fit p-2 bg-blue-600 text-white rounded focus:ring-2" type="submit" name="product_add">Add Product</button>
                          <button class="btn w-fit p-2 bg-red-400 text-white rounded focus:ring-2 hide_add_new_cat">Cancel</button>
                        </div>
                        </div>
                    </div>
                </form>


                <!-- here I am am added cusomer popur -->
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="add_category_wrapper customer_block" style="display: none;">
                        <div class="hide_add_new_cat fixed inset-0 w-full h-screen bg-black bg-opacity-50 z-40"></div>
                        <div class="fixed w-[96%] md:w-[500px] p-5 inset-0 m-auto bg-white rounded shadow z-50 h-fit">
                        <h1 style="text-align:center;" class="p-4 border-b ">
                            Add Customer
                        </h1>

                        <div style="padding:15px 0;">
                            <label>Full Name</label>
                            <input type="text" name="name" placeholder="Full name" class="input" />
                            </div>
                            <div>
                            <label>Email</label>
                            <input type="text" name="email" placeholder="Email" class="input" />
                            </div>
                            <div>
                            <label>Phone</label>
                            <input type="text" name="phone" placeholder="Phone" class="input" />
                            </div>
                            <div>
                            <label>Address</label>
                            <input type="text" name="address" placeholder="Address" class="input" />
                            </div>
                            <div>
                            <label>City</label>
                            <input type="text" name="city" placeholder="City" class="input" />
                            </div>
                            <br>
                            <div>
                            <input type="file" name="file" title="profile" />
                            </div>

                        <div class="p-4 flex items-center justify-end gap-x-3 border-t mt-4">
                          <button class="btn w-fit p-2 bg-blue-600 text-white rounded focus:ring-2" type="submit" name="customer_add">Add Customer</button>
                          <button class="btn w-fit p-2 bg-red-400 text-white rounded focus:ring-2 hide_add_new_cat">Cancel</button>
                        </div>
                        </div>
                    </div>
                </form>
    </section>
</main>


<script>

//add product popup
let product_btn = document.querySelector(".product_btn");
let product_block = document.querySelector(".product_block");

product_btn.addEventListener("click", ()=>{
    product_block.style.display="block";
});

//add cusomer popup
let customer_btn = document.querySelector(".customer_btn");
let customer_block = document.querySelector(".customer_block");

customer_btn.addEventListener("click", ()=>{
    customer_block.style.display="block";
});


//category option dynamic
let category_input = document.querySelector("#category_input");
let pos_category = document.querySelector(".pos_category");


category_input.addEventListener("click",()=>{
  pos_category.style.display = "block";
});

//category add
let category = document.getElementById('cate_select');
category?.addEventListener("change", function() {
    document.getElementById("src_text").setAttribute('value', this.value)
})

//customer add
let customer = document.getElementById('customer_select');
customer?.addEventListener("change", function() {
    document.getElementById("customer_id").setAttribute('value', this.value)
})

//product add with quantity
const all_qnt_check_button = document.querySelectorAll('.qnt_check_button')
const all_selected_quantity_input = document.querySelectorAll('.selected_quantity_input')

for (let i = 0; i < all_selected_quantity_input.length; i++) {
    all_selected_quantity_input[i].addEventListener('change', e => {
        const prev = all_qnt_check_button[i].getAttribute('href')
        const latest = prev.slice(0, prev.length - 1) + (e.target.value > 0 ? e.target.value : 1);
        e.target.value = e.target.value > 0 ? e.target.value : 1
        all_qnt_check_button[i].setAttribute('href', latest)
        all_qnt_check_button[i].innerHTML = ` <a href='${latest}' style="cursor:pointer;">✔</a> `;
    })
}
</script>


<!-- footer -->
<?php include("common/footer.php"); ?>
<!-- footer -->
<?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>

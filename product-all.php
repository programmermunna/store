<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php 
if(isset($_POST['submit'])){
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
     header("location:product-all.php?msg=$msg");
    }else{
     $msg = "Something is worng!";
    }
  }
?>
<!-- Main Content -->
<main class="main_content">
    <!-- Side Navbar Links -->
    <?php include("common/sidebar.php");?>
    <!-- Side Navbar Links -->

    <!-- Page Content -->
    <section class="content_wrapper">
        <!-- Page Details Title -->
        <div class="page_details">
            <div>
                <a href="index.php" class="go_home"><small>Home</small></a>
                <small>/</small>
                <small>All Products</small>
            </div>
        </div>

        <!-- Page Main Content -->
        <section class="page_main_content">
            <div class="main_content_container">
                <!-- Table -->
                <div class="table_content_wrapper">
                    <div class="page_title">
                        <h4>ALL PRODUCTS</h4>
                    </div>
                    <header class="table_header">
                        <div class="table_header_left">
                            <button
                                class="add_brand_btn show_add_new_cat px-4 py-2 text-sm bg-blue-600 text-white rounded focus:ring">Add Product</button>
                        </div>

                        <form action="" method="POST">
                            <div class="table_header_right">
                                <input type="search" name="src_text" placeholder="Search Product" />
                                <input style="cursor:pointer;" type="submit" name="search" class="btn"
                                    placeholder="Search" />
                            </div>
                        </form>
                    </header>
                    <div style="margin:20px;overflow:auto">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="table_th">
                                    <div class="table_th_div"><span>Sl.</span></div>
                                </th>
                                <th class="table_th">
                                    <div class="table_th_div"><span>name</span></div>
                                </th>
                                <th class="table_th">
                                    <div class="table_th_div"><span>price</span></div>
                                </th>
                                <th class="table_th">
                                    <div class="table_th_div"><span>code</span></div>
                                </th>
                                <th class="table_th">
                                    <div class="table_th_div"><span>brand</span></div>
                                </th>
                                <th class="table_th">
                                    <div class="table_th_div"><span>category</span></div>
                                </th>
                                <th class="table_th">
                                    <div class="table_th_div"><span>date</span></div>
                                </th>
                                <th class="table_th">
                                    <div class="table_th_div"><span>Image</span></div>
                                </th>
                                <th class="table_th">
                                    <div class="table_th_div"><span>Action</span></div>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="customers_wrapper" class="text-sm">
                            <?php
                                if(isset($_POST['search'])){
                                    $src_text = trim($_POST['src_text']);
                                    $sql = "SELECT * FROM product WHERE product_name = '$src_text' OR sell_price = '$src_text' OR product_code = '$src_text' OR brand = '$src_text' OR category = '$src_text' OR date = '$src_text' AND admin_id=$id";
                                    $search_query = mysqli_query($conn,$sql);
                                 }
                                 if(isset($search_query)){
                                    $i = 0;
                                    while($row = mysqli_fetch_assoc($search_query)){$i++ ?>
                            <tr>
                                <td class="p-3 border whitespace-nowrap">
                                    <div class="text-center"><?php echo $i?></div>
                                </td>
                                <td class="p-3 border whitespace-nowrap">
                                    <div class="text-center"><?php echo $row['product_name']?></div>
                                </td>
                                <td class="p-3 border whitespace-nowrap">
                                    <div class="text-center"><?php echo $row['sell_price']?></div>
                                </td>
                                <td class="p-3 border whitespace-nowrap">
                                    <div class="text-center"><?php echo $row['product_code']?></div>
                                </td>
                                <td class="p-3 border whitespace-nowrap">
                                    <div class="text-center"><?php echo $row['brand']?></div>
                                </td>
                                <td class="p-3 border whitespace-nowrap">
                                    <div class="text-center"><?php echo $row['category']?></div>
                                </td>
                                <td class="p-3 border whitespace-nowrap">
                                    <div class="text-center"><?php echo $row['date']?></div>
                                </td>
                                <td class="p-3 border whitespace-nowrap">
                                    <div class="text-center"><img class="row_img"
                                            src="upload/<?php echo $row['file']?>"></div>
                                </td>
                                <td class="p-3 border whitespace-nowrap">
                                    <div class="w-full flex_center gap-1">
                                        <a class="btn table_edit_btn"
                                            href="product-edit.php?id=<?php echo $row['id']?>">Edit</a>
                                        <a class="btn table_edit_btn"
                                            href="delete.php?src=product&&id=<?php echo $row['id']?>">Delete</a>
                                        <a class="btn table_edit_btn"
                                            href="product-view.php?id=<?php echo $row['id']?>">View</a>
                                    </div>
                                </td>
                            </tr>
                            <?php }}else{
                                    // ------------ 
                                $showRecordPerPage = 8;
                                if(isset($_GET['page']) && !empty($_GET['page'])){
                                    $currentPage = $_GET['page'];
                                }else{
                                    $currentPage = 1;
                                }
                                $startFrom = ($currentPage * $showRecordPerPage) - $showRecordPerPage;
                                $totalEmpSQL = "SELECT * FROM product WHERE admin_id=$id ORDER BY id DESC";
                                $allEmpResult = mysqli_query($conn, $totalEmpSQL);
                                $totalEmployee = mysqli_num_rows($allEmpResult);
                                $lastPage = ceil($totalEmployee/$showRecordPerPage);
                                $firstPage = 1;
                                $nextPage = $currentPage + 1;
                                $previousPage = $currentPage - 1;
                                $empSQL = "SELECT * FROM product WHERE admin_id=$id ORDER BY id DESC LIMIT $startFrom, $showRecordPerPage";
                                $query = mysqli_query($conn, $empSQL);
                                $i = 0;
                                while($row = mysqli_fetch_assoc($query)){ $i++;
                                // $i=0; while($row = mysqli_fetch_assoc($query)){ $i++ 
                                ?>
                            <tr>
                                <td class="p-3 border whitespace-nowrap">
                                    <div class="text-center"><?php echo $i?></div>
                                </td>
                                <td class="p-3 border whitespace-nowrap">
                                    <div class="text-center"><?php echo $row['product_name']?></div>
                                </td>
                                <td class="p-3 border whitespace-nowrap">
                                    <div class="text-center"><?php echo $row['sell_price']?></div>
                                </td>
                                <td class="p-3 border whitespace-nowrap">
                                    <div class="text-center"><?php echo $row['product_code']?></div>
                                </td>
                                <td class="p-3 border whitespace-nowrap">
                                    <div class="text-center"><?php echo $row['brand']?></div>
                                </td>
                                <td class="p-3 border whitespace-nowrap">
                                    <div class="text-center"><?php echo $row['category']?></div>
                                </td>
                                <td class="p-3 border whitespace-nowrap">
                                    <div class="text-center"><?php echo $row['date']?></div>
                                </td>
                                <td class="p-3 border whitespace-nowrap">
                                    <div class="text-center"><img class="row_img"
                                            src="upload/<?php echo $row['file']?>"></div>
                                </td>
                                <td class="p-3 border whitespace-nowrap">
                                    <div class="w-full flex_center gap-1">
                                        <a class="btn table_edit_btn"
                                            href="product-edit.php?id=<?php echo $row['id']?>">Edit</a>
                                        <a class="btn table_edit_btn"
                                            href="delete.php?src=product&&id=<?php echo $row['id']?>">Delete</a>
                                        <a class="btn table_edit_btn"
                                            href="product-view.php?id=<?php echo $row['id']?>">View</a>
                                    </div>
                                </td>
                            </tr>
                            <?php  } ?>
                        </tbody>
                    </table>
                    </div>
                    <!-- -------------pagination---------------- -->
                    <br>
                    <div class="w-full" style="display: flex; justify-content: space-between;">

                        <nav aria-label="Page navigation">
                            <ul class="pagination_buttons">

                                <?php if($currentPage >= 2) { ?>
                                <li class="pagination"><a class="page-link"
                                        href="?page=<?php echo $previousPage ?>">Previws</a>
                                </li>
                                <?php } ?>
                                <?php if($currentPage != $firstPage) { ?>
                                <li class="pagination">
                                    <a class="page-link" href="?page=<?php echo $firstPage ?>">
                                        <span class="page-link" aria-hidden="true">1</span>
                                    </a>
                                </li>
                                <?php } ?>

                                <li class="pagination active"><a class="page-link active"
                                        href="?page=<?php echo $currentPage ?>"><?php echo $currentPage ?></a></li>

                                <?php if($currentPage < $lastPage) { ?>
                                <li class="pagination "><a class="page-link"
                                        href="?page=<?php echo $currentPage+1 ?>"><?php echo $currentPage+1 ?></a></li>
                                <?php } ?>

                                <?php if($currentPage < $lastPage) { ?>
                                <li class="pagination "><a class="page-link"
                                        href="?page=<?php echo $currentPage+1+1 ?>"><?php echo $currentPage+1+1 ?></a>
                                </li>
                                <?php } ?>

                                <?php if($currentPage < $lastPage) { ?>
                                <li class="pagination "><a class="page-link"
                                        href="?page=<?php echo $currentPage+1+1+1 ?>"><?php echo $currentPage+1+1+1 ?></a>
                                </li>
                                <?php } ?>

                                <?php if($currentPage < $lastPage) { ?>
                                <li class="pagination"><a class="page-link"
                                        href="?page=<?php echo $nextPage ?>"><?php //echo $nextPage  ?>Next</a></li>
                                <?php } ?>

                                <li class="pagination">
                                    <a class="page-link" href="?page=<?php echo $lastPage ?>" aria-label="Next">
                                        <span aria-hidden="true">Last</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <div class="pagination_buttons">Page <?php echo $currentPage ?> of <?php echo $lastPage ?></div>
                    </div>
                    <?php } ?>
                    <!-- -------------pagination---------------- -->
                </div>
            </div>
            </div>
            </div>
        </section>
    </section>
    <!-- Page Content -->



    <form action="" method="POST">
        <div class="add_category_wrapper add_brand" style="display: none;">
            <div class="hide_add_new_cat fixed inset-0 w-full h-screen bg-black bg-opacity-50 z-40"></div>
            <div class="fixed w-[96%] md:w-[500px] inset-0 m-auto p-5 bg-white rounded shadow z-50 h-fit add_product_main">
                <h3 class="p-4 border-b text-center">
                    Add New Product
                </h3>

                <div>
                    <label>Product Name</label>
                    <input type="text" name="product_name" placeholder="Product name" class="input" />
                </div>

                <div>
                    <label>Price</label>
                    <input type="number" name="sell_price" placeholder="price" class="input" />
                </div>

                <div>
                    <label>Select Brand</label>
                    <select style="display:block;width:100%;height:35px;margin-top:5px;" name="brand" class="select_input">
                        <option style="display:none;" selected>Select Brand</option>
                        <?php $brand = mysqli_query($conn,"SELECT * FROM brand"); 
                        while($row = mysqli_fetch_assoc($brand)){ ?>
                        <option value="<?php echo $row['name']?>"><?php echo $row['name']?></option>
                        <?php }?>
                    </select>
                </div>

                <div>
                    <label>Select Category</label>
                    <select style="display:block;width:100%;height:35px;margin-top:5px;" name="category" class="select_input">
                    <option style="display:none;" selected >Select category</option>
                    <?php $brand = mysqli_query($conn,"SELECT * FROM category"); 
                            while($row = mysqli_fetch_assoc($brand)){ ?>
                                <option value="Hyundai"><?php echo $row['category']?></option>
                            <?php }?>
                    </select>
                </div>

                <div>
                    <label>Date</label>
                    <input type="date" name="date" class="input" placeholder="mm/dd/yy" />
                </div>

                <div>
                    <label>Vat</label>
                    <input type="text" name="vat" placeholder="Product vat" class="input" />
                </div>

                <div>
                    <label>Product Image</label>
                    <input type="file" name="file" title="profile" />
                </div>

                <div class="p-4 flex items-center justify-end gap-x-3 border-t mt-4">
                    <button class="btn w-fit p-2 bg-blue-600 text-white rounded focus:ring-2" type="submit"
                        name="submit">Create Product</button>
                    <button
                        class="btn w-fit p-2 bg-red-400 text-white rounded focus:ring-2 hide_add_new_cat">Cancel</button>
                </div>
            </div>
        </div>
    </form>

    <script>
    let add_brand_btn = document.querySelector(".add_brand_btn");
    let add_brand = document.querySelector(".add_brand");
    let edit_brand_btn = document.querySelector(".edit_brand_btn");
    let edit_brand = document.querySelector(".edit_brand");

    add_brand_btn.addEventListener("click", () => {
        add_brand.style.display = "block";
    });

    edit_brand_btn.addEventListener("click", () => {
        edit_brand.style.display = "block";
    });
    </script>


</main>
<!-- Side Navbar Links -->
<?php include("common/footer.php");?>
<!-- Side Navbar Links -->
<?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>

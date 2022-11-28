<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php 
if(isset($_POST['submit'])){
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
    header("location:customer-all.php?msg=$msg");
    }else{
    echo "Something is worng!";
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
                <small>All Customer's</small>
            </div>
        </div>

        <!-- Page Main Content -->
        <section class="page_main_content">
            <div class="main_content_container">
                <!-- Table -->
                <div class="table_content_wrapper">
                    <div class="page_title">
                        <h4>ALL CUSTOMERS</h4>
                    </div>
                    <header class="table_header">
                        <div class="table_header_left">
                            <button
                                class="add_brand_btn show_add_new_cat px-4 py-2 text-sm bg-blue-600 text-white rounded focus:ring">Add
                                Customer</button>
                        </div>
                        <form action="" method="POST">
                            <div class="table_header_right">
                                <input type="search" name="src_text" placeholder="Search Customer" />
                                <input style="cursor:pointer;" type="submit" name="search" class="btn"
                                    placeholder="Search" />
                            </div>
                        </form>
                    </header>

                    <div class="table_parent">
                        <div class="table_sub_parent">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="table_th">
                                            <div class="table_th_div"><span>Sl.</span></div>
                                        </th>
                                        <th class="table_th">
                                            <div class="table_th_div"><span>Name</span></div>
                                        </th>
                                        <th class="table_th">
                                            <div class="table_th_div"><span>Email</span></div>
                                        </th>
                                        <th class="table_th">
                                            <div class="table_th_div"><span>Phone</span></div>
                                        </th>
                                        <th class="table_th">
                                            <div class="table_th_div"><span>Address</span></div>
                                        </th>
                                        <th class="table_th">
                                            <div class="table_th_div"><span>City</span></div>
                                        </th>
                                        <th class="table_th">
                                            <div class="table_th_div"><span>Photo</span></div>
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
                                    $sql = "SELECT * FROM customer WHERE name = '$src_text' OR email = '$src_text' OR phone = '$src_text' OR address = '$src_text' OR city = '$src_text' AND admin_id=$id";
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
                                            <div class="text-center"><?php echo $row['name']?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['email']?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['phone']?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['address']?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['city']?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><img class="row_img"
                                                    src="upload/<?php echo $row['file']?>"></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="w-full flex_center gap-1">
                                                <a class="btn table_edit_btn"
                                                    href="customer-edit.php?id=<?php echo $row['id']?>">Edit</a>
                                                <a class="btn table_edit_btn"
                                                    href="delete.php?src=customer&&id=<?php echo $row['id']?>">Delete</a>
                                                <a class="btn table_edit_btn"
                                                    href="customer-view.php?id=<?php echo $row['id']?>">View</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php }}else{
                                // --------
                                $showRecordPerPage = 8;
                                if(isset($_GET['page']) && !empty($_GET['page'])){
                                    $currentPage = $_GET['page'];
                                }else{
                                    $currentPage = 1;
                                }
                                $startFrom = ($currentPage * $showRecordPerPage) - $showRecordPerPage;
                                $totalEmpSQL = "SELECT * FROM customer WHERE admin_id=$id ORDER BY id DESC";
                                $allEmpResult = mysqli_query($conn, $totalEmpSQL);
                                $totalEmployee = mysqli_num_rows($allEmpResult);
                                $lastPage = ceil($totalEmployee/$showRecordPerPage);
                                $firstPage = 1;
                                $nextPage = $currentPage + 1;
                                $previousPage = $currentPage - 1;
                                $empSQL = "SELECT * FROM customer WHERE admin_id=$id ORDER BY id DESC LIMIT $startFrom, $showRecordPerPage";
                                $query = mysqli_query($conn, $empSQL);
                                $i = 0;
                                while($row = mysqli_fetch_assoc($query)){ $i++;
                                // $i=0; while($row = mysqli_fetch_assoc($query )){ $i++ 
                                ?>
                                    <tr>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $i?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['name']?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['email']?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['phone']?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['address']?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['city']?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><img class="row_img"
                                                    src="upload/<?php echo $row['file']?>"></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="w-full flex_center gap-1">
                                                <a class="btn table_edit_btn"
                                                    href="customer-edit.php?id=<?php echo $row['id']?>">Edit</a>
                                                <a class="btn table_edit_btn"
                                                    href="delete.php?src=customer&&id=<?php echo $row['id']?>">Delete</a>
                                                <a class="btn table_edit_btn"
                                                    href="customer-view.php?id=<?php echo $row['id']?>">View</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php  } ?>

                                </tbody>
                            </table>
                        </div>
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
        </section>
    </section>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="add_category_wrapper add_brand" style="display: none;">
            <div class="hide_add_new_cat fixed inset-0 w-full h-screen bg-black bg-opacity-50 z-40"></div>
            <div
                class="fixed w-[96%] md:w-[500px] inset-0 m-auto p-5 bg-white rounded shadow z-50 h-fit add_product_main">
                <h3 class="p-4 border-b text-center">
                    Add New Customer
                </h3>

                <div>
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
                <div>
                    <label>Photo</label>
                    <input type="file" name="file" title="profile" placeholder="City" />
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









    <!-- Page Content -->
</main>
<!-- Side Navbar Links -->
<?php include("common/footer.php");?>
<!-- Side Navbar Links -->
<?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>

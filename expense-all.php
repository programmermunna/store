<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php 

if(isset($_POST['select'])){
    $date = $_POST['month']." ".$_POST['year'];
}else{
   $date = date("F Y",time());
}

$eating_cost = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(eating_cost) FROM expense WHERE admin_id=$id AND date='$date' "));
$eating_cost = $eating_cost['SUM(eating_cost)'];

$marketing_cost = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(marketing_cost) FROM expense WHERE admin_id=$id AND date='$date' "));
$marketing_cost = $marketing_cost['SUM(marketing_cost)'];

$helth_cost = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(helth_cost) FROM expense WHERE admin_id=$id AND date='$date' "));
$helth_cost = $helth_cost['SUM(helth_cost)'];

$store_cost = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(store_cost) FROM expense WHERE admin_id=$id AND date='$date' "));
$store_cost = $store_cost['SUM(store_cost)'];

$employee_cost = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(employee_cost) FROM expense WHERE admin_id=$id AND date='$date' "));
$employee_cost = $employee_cost['SUM(employee_cost)'];

$other_cost = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(other_cost) FROM expense WHERE admin_id=$id AND date='$date' "));
$other_cost = $other_cost['SUM(other_cost)'];

$total_cost = $eating_cost+$marketing_cost+$helth_cost+$store_cost+$employee_cost+$other_cost;


if(isset($_POST['submit'])){
    $eating_cost = $_POST['eating_cost'];
    $marketing_cost = $_POST['marketing_cost'];
    $helth_cost = $_POST['helth_cost'];
    $store_cost = $_POST['store_cost'];
    $employee_cost = $_POST['employee_cost'];
    $other_cost = $_POST['other_cost'];
    $date = date("F Y",time());
    $time = time();
  
    $sql = "INSERT INTO expense(admin_id,eating_cost,marketing_cost,helth_cost,store_cost,employee_cost,other_cost,date,time) VALUES($id,'$eating_cost','$marketing_cost','$helth_cost','$store_cost','$employee_cost','$other_cost','$date','$time')";
    $query = mysqli_query($conn,$sql);
    if($query){
    $msg = "Successfully Created New expense!";
    header("location:expense-all.php?msg=$msg");
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
                <small>All expense's</small>
            </div>
        </div>

        <!-- Page Main Content -->
        <section class="page_main_content">
            <div class="main_content_container">
                <!-- Table -->
                <div class="table_content_wrapper">
                    <div class="page_title">
                        <h4>ALL expense</h4>
                    </div>
                    <header class="table_header">
                        <div class="table_header_left">
                            <button class="add_brand_btn show_add_new_cat px-4 py-2 text-sm bg-blue-600 text-white rounded focus:ring">Add expense</button>
                        </div>
                        <div>
                            <form action="" method="POST">
                                <div class="table_header_right">
                                <select name="month" class="input">
                                    <?php
                                    if(isset($_POST['month'])){ ?>
                                        <option selected value="<?php echo $_POST['month']?>"><?php echo $_POST['month']?></option>                                        
                                    <?php  }?>
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                </select>
                                <select name="year" class="input">
                                    <?php
                                    if(isset($_POST['month'])){ ?>
                                        <option selected value="<?php echo $_POST['year']?>"><?php echo $_POST['year']?></option>                                        
                                    <?php  }?>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                    <option value="2028">2028</option>
                                    <option value="2029">2029</option>
                                    <option value="2030">2030</option>
                                </select>
                                <input style="cursor:pointer;" name="select" type="submit" class="btn" placeholder="Search" />
                            </div>
                        </form>
                        </div>

                        <form action="" method="POST">
                        <?php 
                            if(isset($_POST['select'])){ ?>
                            <div class="table_header_right">
                                <input disabled type="search" name="src_text" placeholder="Search Expense" />
                                <input disabled style="cursor:pointer;" type="submit" name="search" class="btn" placeholder="Search" />
                            </div>
                           <?php }else{?>
                            <div class="table_header_right">
                                <input type="search" name="src_text" placeholder="Search Expense" />
                                <input style="cursor:pointer;" type="submit" name="search" class="btn" placeholder="Search" />
                            </div>
                            <?php }?>
                        </form>
                    </header>

                    <div class="table_parent">
                        <div class="table_sub_parent">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="table_th">
                                            <div class="table_th_div"><span>Date</span></div>
                                        </th>
                                        <th class="table_th">
                                            <div class="table_th_div"><span>Eating Cost</span></div>
                                        </th>
                                        <th class="table_th">
                                            <div class="table_th_div"><span>Marketing Cost</span></div>
                                        </th>
                                        <th class="table_th">
                                            <div class="table_th_div"><span>Helth Cost</span></div>
                                        </th>
                                        <th class="table_th">
                                            <div class="table_th_div"><span>Store Cost</span></div>
                                        </th>
                                        <th class="table_th">
                                            <div class="table_th_div"><span>Employee Cost</span></div>
                                        </th>
                                        <th class="table_th">
                                            <div class="table_th_div"><span>Other Cost</span></div>
                                        </th>
                                        <th class="table_th">
                                            <div class="table_th_div"><span>Action</span></div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="expenses_wrapper" class="text-sm">
                                    <?php
                                if(isset($_POST['search'])){
                                    $src_text = trim($_POST['src_text']);
                                    $sql = "SELECT * FROM expense WHERE (eating_cost = '$src_text' OR  marketing_cost = '$src_text' OR  helth_cost = '$src_text' OR  store_cost = '$src_text' OR  employee_cost = '$src_text' OR  other_cost = '$src_text') AND date='$date' AND admin_id=$id";
                                    $search_query = mysqli_query($conn,$sql);
                                 }
                                 if(isset($search_query)){
                                    while($row = mysqli_fetch_assoc($search_query)){ ?>
                                    <tr>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo date("d-m-y",$row['time']);?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['eating_cost']?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['marketing_cost']?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['helth_cost']?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['store_cost']?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['employee_cost']?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['other_cost']?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="w-full flex_center gap-1">
                                                <a class="btn table_edit_btn"
                                                    href="expense-edit.php?id=<?php echo $row['id']?>">Edit</a>
                                                <a class="btn table_edit_btn"
                                                    href="delete.php?src=expense&&id=<?php echo $row['id']?>">Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php  } ?>
                                    <tr>
                                        <th class="table_th">
                                            <div class="table_th_div"><span style="margin:0 auto;">Total</span></div>
                                        </th>
                                        <th class="table_th">
                                            <div class="table_th_div"><span style="margin:0 auto;">=<?php echo $eating_cost;?>৳</span></div>
                                        </th>
                                        <th class="table_th">
                                            <div class="table_th_div"><span style="margin:0 auto;">=<?php echo $marketing_cost;?>৳</span></div>
                                        </th>
                                        <th class="table_th">
                                            <div class="table_th_div"><span style="margin:0 auto;">=<?php echo $helth_cost;?>৳</span></div>
                                        </th>
                                        <th class="table_th">
                                            <div class="table_th_div"><span style="margin:0 auto;">=<?php echo $store_cost;?>৳</span></div>
                                        </th>
                                        <th class="table_th">
                                            <div class="table_th_div"><span style="margin:0 auto;">=<?php echo $employee_cost;?>৳</span></div>
                                        </th>
                                        <th class="table_th">
                                            <div class="table_th_div"><span>=<?php echo $other_cost;?>৳</span></div>
                                        </th>
                                        <th class="table_th">
                                            <div class="table_th_div"><span style="margin:0 auto;">Total=<?php echo $total_cost;?>৳</span></div>
                                        </th>
                                    </tr>
                                    <?php }else{
                                // --------
                                $showRecordPerPage = 8;
                                if(isset($_GET['page']) && !empty($_GET['page'])){
                                    $currentPage = $_GET['page'];
                                }else{
                                    $currentPage = 1;
                                }
                                $startFrom = ($currentPage * $showRecordPerPage) - $showRecordPerPage;
                                $totalEmpSQL = "SELECT * FROM expense WHERE admin_id=$id AND date='$date' ORDER BY id DESC";
                                $allEmpResult = mysqli_query($conn, $totalEmpSQL);
                                $totalexpense = mysqli_num_rows($allEmpResult);
                                $lastPage = ceil($totalexpense/$showRecordPerPage);
                                $firstPage = 1;
                                $nextPage = $currentPage + 1;
                                $previousPage = $currentPage - 1;
                                $empSQL = "SELECT * FROM expense WHERE admin_id=$id AND date='$date' ORDER BY id DESC LIMIT $startFrom, $showRecordPerPage";
                                $query = mysqli_query($conn, $empSQL);
                                while($row = mysqli_fetch_assoc($query)){ 
                                ?>
                                   <tr>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo date("d-m-y",$row['time']);?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['eating_cost']?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['marketing_cost']?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['helth_cost']?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['store_cost']?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['employee_cost']?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['other_cost']?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="w-full flex_center gap-1">
                                                <a class="btn table_edit_btn"
                                                    href="expense-edit.php?id=<?php echo $row['id']?>">Edit</a>
                                                <a class="btn table_edit_btn"
                                                    href="delete.php?src=expense&&id=<?php echo $row['id']?>">Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php  } ?>
                                    <tr>
                                        <th class="table_th">
                                            <div class="table_th_div"><span style="margin:0 auto;">Total</span></div>
                                        </th>
                                        <th class="table_th">
                                            <div class="table_th_div"><span style="margin:0 auto;">=<?php echo $eating_cost;?>৳</span></div>
                                        </th>
                                        <th class="table_th">
                                            <div class="table_th_div"><span style="margin:0 auto;">=<?php echo $marketing_cost;?>৳</span></div>
                                        </th>
                                        <th class="table_th">
                                            <div class="table_th_div"><span style="margin:0 auto;">=<?php echo $helth_cost;?>৳</span></div>
                                        </th>
                                        <th class="table_th">
                                            <div class="table_th_div"><span style="margin:0 auto;">=<?php echo $store_cost;?>৳</span></div>
                                        </th>
                                        <th class="table_th">
                                            <div class="table_th_div"><span style="margin:0 auto;">=<?php echo $employee_cost;?>৳</span></div>
                                        </th>
                                        <th class="table_th">
                                            <div class="table_th_div"><span>=<?php echo $other_cost;?>৳</span></div>
                                        </th>
                                        <th class="table_th">
                                            <div class="table_th_div"><span style="margin:0 auto;">Total=<?php echo $total_cost;?>৳</span></div>
                                        </th>
                                    </tr>
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
                    Add New expense
                </h3>

                <div>
              <label>Eating Cost</label>
              <input type="number" name="eating_cost" class="input" value="<?php echo $expense['eating_cost']; ?>" />
            </div>
            <div>
              <label>Marketing Cost</label>
              <input type="number" name="marketing_cost" class="input" value="<?php echo $expense['marketing_cost']; ?>" />
            </div>
            <div>
              <label>Helth Cost</label>
              <input type="number" name="helth_cost" class="input" value="<?php echo $expense['helth_cost']; ?>" />
            </div>
            <div>
              <label>Store Cost</label>
              <input type="number" name="store_cost" class="input" value="<?php echo $expense['store_cost']; ?>" />
            </div>
            <div>
              <label>Employee Cost</label>
              <input type="number" name="employee_cost" class="input" value="<?php echo $expense['employee_cost']; ?>" />
            </div>
            <div>
              <label>Other Cost</label>
              <input type="number" name="other_cost" class="input" value="<?php echo $expense['other_cost']; ?>" />
            </div>

            <div class="p-4 flex items-center justify-end gap-x-3 border-t mt-4">
                <button class="btn w-fit p-2 bg-blue-600 text-white rounded focus:ring-2" type="submit" name="submit">Create expense</button>
                <button class="btn w-fit p-2 bg-red-400 text-white rounded focus:ring-2 hide_add_new_cat">Cancel</button>
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

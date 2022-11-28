<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php 

if(isset($_POST['select'])){
    $date = $_POST['month']." ".$_POST['year'];
}else{
   $date = date("F Y",time());
}


if(isset($_POST['submit'])){
    $employee = $_POST['employee'];
    $status = $_POST['status'];
    $amount = $_POST['amount'];
    $date = date("F Y",time());
    $time = time();
    
    $salary = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM salary WHERE admin_id=$id AND emp_id=$employee"));
    $salary_date = $salary['date'];
    if($salary_date == $date){
        $msg = "Already Inserted. Please Add Another or Edit";
        header("location:salary.php?msg=$msg");
  }else{
    $sql = "INSERT INTO salary(admin_id,emp_id,status,pay,date,time) VALUES($id,'$employee','$status','$amount','$date','$time')";
    $query = mysqli_query($conn,$sql);
    if($query){
    $msg = "Operation Successfully";
    header("location:salary.php?msg=$msg");
    }
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
                <small>Salary</small>
            </div>
        </div>

        <!-- Page Main Content -->
        <section class="page_main_content">
            <div class="main_content_container">
                <!-- Table -->
                <div class="table_content_wrapper">
                    <div class="page_title" style="display:flex;justify-content:space-between">
                        <h4>Salary</h4>
                        <h4><?php echo date("F-Y",time());?></h4>
                    </div>
                    <header class="table_header">
                        <div class="table_header_left">
                            <button class="add_brand_btn show_add_new_cat px-4 py-2 text-sm bg-blue-600 text-white rounded focus:ring">Add Salary</button>
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
                                <input disabled type="search" name="src_text" placeholder="Search Salary" />
                                <input disabled style="cursor:pointer;" type="submit" name="search" class="btn" placeholder="Search" />
                            </div>
                           <?php }else{?>
                            <div class="table_header_right">
                                <select name="" class="input" id="ad_sa">
                                    <option style="display:none;">Select</option>
                                    <option value="advance">Advance</option>
                                    <option value="salary">Salary</option>
                                </select>
                                <input type="search" name="src_text" placeholder="Search Salary"  id="src_id"/>
                                <input style="cursor:pointer;" type="submit" name="search" class="btn" placeholder="Search" />
                            </div>
                            <?php }?>
                        </form>
                    </header>

                    <script>
                        let ad_sa = document.querySelector("#ad_sa")
                        let src_id = document.querySelector("#src_id")
                        ad_sa.addEventListener("change",function(){
                            src_id.value= ad_sa.value;
                        });
                    </script>

                    <div class="table_parent">
                        <div class="table_sub_parent">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="table_th">
                                            <div class="table_th_div"><span>Sl.</span></div>
                                        </th>                                        
                                        <th class="table_th">
                                            <div class="table_th_div"><span>Photo</span></div>
                                        </th>
                                        <th class="table_th">
                                            <div class="table_th_div"><span>Name</span></div>
                                        </th>
                                        <th class="table_th">
                                            <div class="table_th_div"><span>salary</span></div>
                                        </th>
                                        <th class="table_th">
                                            <div class="table_th_div"><span>Pay</span></div>
                                        </th>
                                        <th class="table_th">
                                            <div class="table_th_div"><span>Status</span></div>
                                        </th>
                                        <th class="table_th">
                                            <div class="table_th_div"><span>Action</span></div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="employees_wrapper" class="text-sm">
                                    <?php
                                if(isset($_POST['search'])){
                                    $src_text = trim($_POST['src_text']);                                    
                                    $sql = "SELECT salary.*,employee.* FROM salary INNER JOIN employee ON salary.emp_id=employee.id WHERE (employee.name = '$src_text' OR employee.salary = '$src_text' OR salary.pay = '$src_text' OR salary.status = '$src_text') AND salary.date='$date' AND salary.admin_id=$id";
                                    $search_query = mysqli_query($conn,$sql);
                                 }
                                 if(isset($search_query)){
                                    $i = 0;
                                    while($row = mysqli_fetch_assoc($search_query)){$i++;
                                        $emp_id = $row['emp_id'];
                                        $emp = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM employee WHERE id=$emp_id"));
                                         ?>
                                   <tr>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $i?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><img class="row_img" src="upload/<?php echo $emp['file']?>"></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $emp['name']?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $emp['salary']?>৳</div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['pay']?>৳</div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <?php if($row['status']=='advance'){ ?>                                                
                                            <div class="text-center" style="background:red;color:white;padding:5px;border-radius: 5px;"><?php echo $row['status']?></div>                                           
                                          <?php }else{?>
                                            <div class="text-center" style="background:green;color:white;padding:5px;border-radius: 5px;"><?php echo $row['status']?></div>
                                            <?php  }?>

                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="w-full flex_center gap-1">
                                                <a class="btn table_edit_btn"
                                                    href="salary-edit.php?id=<?php echo $row['emp_id']?>">Edit</a>
                                                <a class="btn table_edit_btn"
                                                    href="delete.php?src=salary&&id=<?php echo $row['id']?>">Delete</a>
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
                                $totalEmpSQL = "SELECT * FROM salary WHERE admin_id=$id  AND date='$date' ORDER BY id DESC";
                                $allEmpResult = mysqli_query($conn, $totalEmpSQL);
                                $totalEmployee = mysqli_num_rows($allEmpResult);
                                $lastPage = ceil($totalEmployee/$showRecordPerPage);
                                $firstPage = 1;
                                $nextPage = $currentPage + 1;
                                $previousPage = $currentPage - 1;
                                $empSQL = "SELECT * FROM salary WHERE admin_id=$id AND date='$date' ORDER BY id DESC LIMIT $startFrom, $showRecordPerPage";
                                $query = mysqli_query($conn, $empSQL);
                                $i = 0;
                                while($row = mysqli_fetch_assoc($query)){ $i++;
                                    $emp_id = $row['emp_id'];
                                    $emp = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM employee WHERE id=$emp_id"));
                                ?>
                                    <tr>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $i?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><img class="row_img" src="upload/<?php echo $emp['file']?>"></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $emp['name']?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $emp['salary']?>৳</div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['pay']?>৳</div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <?php if($row['status']=='advance'){ ?>                                                
                                            <div class="text-center" style="background:red;color:white;padding:5px;border-radius: 5px;"><?php echo $row['status']?></div>                                           
                                          <?php }else{?>
                                            <div class="text-center" style="background:green;color:white;padding:5px;border-radius: 5px;"><?php echo $row['status']?></div>
                                            <?php  }?>

                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="w-full flex_center gap-1">
                                                <a class="btn table_edit_btn"
                                                    href="salary-edit.php?id=<?php echo $row['emp_id']?>">Edit</a>
                                                <a class="btn table_edit_btn"
                                                    href="delete.php?src=salary&&id=<?php echo $row['id']?>">Delete</a>
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
                    <h3 class="p-4 border-b text-center">Salary</h3><div>
                    <label>Employee</label>
                    <select name="employee" class="input">
                        <?php 
                        $emp = mysqli_query($conn,"SELECT * FROM employee WHERE admin_id=$id");
                        while($row = mysqli_fetch_assoc($emp)){?>
                        <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
                        <?php }?>
                    </select>
                </div>
                <div>
                    <label>Status</label>
                    <select name="status" class="input">
                        <option value="advance">Advance</option>
                        <option value="salary">Salary</option>
                    </select>
                </div>
                <div>
                    <label>Amount</label>
                    <input type="number" name="amount" placeholder="Amount" class="input" />
                </div>

                <div class="p-4 flex items-center justify-end gap-x-3 border-t mt-4">
                    <button class="btn w-fit p-2 bg-blue-600 text-white rounded focus:ring-2" type="submit" name="submit">Create Salary</button>
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

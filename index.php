<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php 
     
    $date = date("F Y",time());

    $product = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM product WHERE admin_id=$id"));
    $pending_order = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tmp_product WHERE status='Pending' AND admin_id=$id"));
    $success_order = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tmp_product WHERE status='Success' AND admin_id=$id"));
    $customer = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM customer WHERE admin_id=$id"));
    $employee = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM employee WHERE admin_id=$id"));

    $total_salary = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(pay) FROM salary WHERE admin_id=$id"));
    $total_salary = $total_salary['SUM(pay)'];

    /////////////////Toatal amount/////////////////
    $total_amount = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(total) FROM tmp_product WHERE admin_id=$id"));
    $total_pending = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(amount) FROM tmp_product WHERE status='Pending' AND admin_id=$id"));
    $total_success = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(amount) FROM tmp_product WHERE status='Success' AND admin_id=$id"));


    $total_amount = $total_amount['SUM(total)'];
    $success_amount = $total_success['SUM(amount)'];
    $pendign_amount = $total_pending['SUM(amount)'];
    $due_amount = $total_amount-($success_amount+$pendign_amount);
    /////////////////////////////////////////////////////////////


    /////////////////this month amount/////////////////
    $m_total_amount = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(total) FROM tmp_product WHERE admin_id=$id AND date='$date'"));
    $m_total_amount = $m_total_amount['SUM(total)'];
    /////////////////////////////////////////////////////////////

    $eating_cost = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(eating_cost) FROM expense WHERE admin_id=$id"));
    $eating_cost = $eating_cost['SUM(eating_cost)'];
    
    $marketing_cost = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(marketing_cost) FROM expense WHERE admin_id=$id"));
    $marketing_cost = $marketing_cost['SUM(marketing_cost)'];
    
    $helth_cost = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(helth_cost) FROM expense WHERE admin_id=$id"));
    $helth_cost = $helth_cost['SUM(helth_cost)'];
    
    $store_cost = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(store_cost) FROM expense WHERE admin_id=$id"));
    $store_cost = $store_cost['SUM(store_cost)'];
    
    $employee_cost = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(employee_cost) FROM expense WHERE admin_id=$id"));
    $employee_cost = $employee_cost['SUM(employee_cost)'];
    
    $other_cost = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(other_cost) FROM expense WHERE admin_id=$id"));
    $other_cost = $other_cost['SUM(other_cost)'];

    $total_cost = $eating_cost+$marketing_cost+$helth_cost+$store_cost+$employee_cost+$other_cost;

    $total_profit = $total_amount-$total_cost;

    /////////////////////This month //////////////////////////////
    $m_eating_cost = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(eating_cost) FROM expense WHERE admin_id=$id AND date='$date'"));
    $m_eating_cost = $m_eating_cost['SUM(eating_cost)'];
    
    $m_marketing_cost = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(marketing_cost) FROM expense WHERE admin_id=$id AND date='$date'"));
    $m_marketing_cost = $m_marketing_cost['SUM(marketing_cost)'];
    
    $m_helth_cost = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(helth_cost) FROM expense WHERE admin_id=$id AND date='$date'"));
    $m_helth_cost = $m_helth_cost['SUM(helth_cost)'];
    
    $m_store_cost = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(store_cost) FROM expense WHERE admin_id=$id AND date='$date'"));
    $m_store_cost = $m_store_cost['SUM(store_cost)'];
    
    $m_employee_cost = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(employee_cost) FROM expense WHERE admin_id=$id AND date='$date'"));
    $m_employee_cost = $m_employee_cost['SUM(employee_cost)'];
    
    $m_other_cost = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(other_cost) FROM expense WHERE admin_id=$id AND date='$date'"));
    $m_other_cost = $m_other_cost['SUM(other_cost)'];
    
    
    $m_total_salary = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(pay) FROM salary WHERE admin_id=$id AND date='$date'"));
    $m_total_salary = $m_total_salary['SUM(pay)'];


    $m_total_cost = $m_eating_cost+$m_marketing_cost+$m_helth_cost+$m_store_cost+$m_employee_cost+$m_other_cost;

    $m_total_profit = $m_total_amount-$m_total_cost;


?>
    <!-- Main Content -->
    <main class="w-full flex bg-gray-100">
      <!-- Side Navbar Links -->
      <?php include('common/sidebar.php')?>
      <!-- Side Navbar Links -->

      <!-- Content -->
      <section class="content_wrapper">

        <br>
          <div style="width:100%;background:#ddd;"><h3 style="text-align:center;padding:5px;color:#1f54dd;font-weight:bold;">Total</h3></div>
        <br>

        <div class="home_content">        
           <!-- ------box------ -->
          <div class="home_card">
            <div>
              <div class="card_top">
                <div class="card_top_icon from-blue-500 to-blue-600">&#x2637</div>
                <div class="card_top_info">
                  <p class="card_top_numbers">৳<?php echo $total_cost; ?></p>                  
                </div>
              </div>
              <div class="card_bottom">
                <div class="card_percentage">
                  <p style="margin: 0 auto;">Total Expense</p>
                </div>
                <div class="card_line">
                  <div style="width: 100%" class="from-blue-500 via-blue-600 to-blue-700"></div>
                </div>
              </div>
            </div>
          </div>

           <!-- ------box------ -->
          <div class="home_card">
            <div>
              <div class="card_top">
                <div class="card_top_icon from-blue-500 to-blue-600">&#x2637</div>
                <div class="card_top_info">
                  <p class="card_top_numbers">৳<?php echo $total_profit; ?></p>                  
                </div>
              </div>
              <div class="card_bottom">
                <div class="card_percentage">
                  <p style="margin: 0 auto;">Total Profit</p>
                </div>
                <div class="card_line">
                  <div style="width: 100%" class="from-blue-500 via-blue-600 to-blue-700"></div>
                </div>
              </div>
            </div>
          </div>

           <!-- ------box------ -->
          <div class="home_card">
            <div>
              <div class="card_top">
                <div class="card_top_icon from-blue-500 to-blue-600">&#x2637</div>
                <div class="card_top_info">
                  <p class="card_top_numbers">৳<?php echo $total_amount; ?></p>                  
                </div>
              </div>
              <div class="card_bottom">
                <div class="card_percentage">
                  <p style="margin: 0 auto;">Total Amount</p>
                </div>
                <div class="card_line">
                  <div style="width: 100%" class="from-blue-500 via-blue-600 to-blue-700"></div>
                </div>
              </div>
            </div>
          </div>

           <!-- ------box------ -->
          <div class="home_card">
            <div>
              <div class="card_top">
                <div class="card_top_icon from-blue-500 to-blue-600">&#x2637</div>
                <div class="card_top_info">
                  <p class="card_top_numbers">৳<?php echo $pendign_amount; ?></p>                  
                </div>
              </div>
              <div class="card_bottom">
                <div class="card_percentage">
                  <p style="margin: 0 auto;">Pending Amount</p>
                </div>
                <div class="card_line">
                  <div style="width: 100%" class="from-blue-500 via-blue-600 to-blue-700"></div>
                </div>
              </div>
            </div>
          </div>

           <!-- ------box------ -->
          <div class="home_card">
            <div>
              <div class="card_top">
                <div class="card_top_icon from-blue-500 to-blue-600">&#x2637</div>
                <div class="card_top_info">
                  <p class="card_top_numbers">৳<?php echo $due_amount; ?></p>                  
                </div>
              </div>
              <div class="card_bottom">
                <div class="card_percentage">
                  <p style="margin: 0 auto;">Due Amount</p>
                </div>
                <div class="card_line">
                  <div style="width: 100%" class="from-blue-500 via-blue-600 to-blue-700"></div>
                </div>
              </div>
            </div>
          </div>

           <!-- ------box------ -->
          <div class="home_card">
            <div>
              <div class="card_top">
                <div class="card_top_icon from-blue-500 to-blue-600">&#x2637</div>
                <div class="card_top_info">
                  <p class="card_top_numbers">৳<?php echo $success_amount; ?></p>                  
                </div>
              </div>
              <div class="card_bottom">
                <div class="card_percentage">
                  <p style="margin: 0 auto;">Success Amount</p>
                </div>
                <div class="card_line">
                  <div style="width: 100%" class="from-blue-500 via-blue-600 to-blue-700"></div>
                </div>
              </div>
            </div>
          </div>

           <!-- ------box------ -->
          <!-- <div class="home_card">
            <div>
              <div class="card_top">
                <div class="card_top_icon from-blue-500 to-blue-600">&#x2637</div>
                <div class="card_top_info">
                  <p class="card_top_numbers"><?php echo $pending_order; ?></p>                  
                </div>
              </div>
              <div class="card_bottom">
                <div class="card_percentage">
                  <p style="margin: 0 auto;">Pending Order</p>
                </div>
                <div class="card_line">
                  <div style="width: 100%" class="from-blue-500 via-blue-600 to-blue-700"></div>
                </div>
              </div>
            </div>
          </div> -->

           <!-- ------box------ -->
          <!-- <div class="home_card">
            <div>
              <div class="card_top">
                <div class="card_top_icon from-blue-500 to-blue-600">&#x2637</div>
                <div class="card_top_info">
                  <p class="card_top_numbers"><?php echo $success_order; ?></p>                  
                </div>
              </div>
              <div class="card_bottom">
                <div class="card_percentage">
                  <p style="margin: 0 auto;">Success Order</p>
                </div>
                <div class="card_line">
                  <div style="width: 100%" class="from-blue-500 via-blue-600 to-blue-700"></div>
                </div>
              </div>
            </div>
          </div> -->

           <!-- ------box------ -->
          <!-- <div class="home_card">
            <div>
              <div class="card_top">
                <div class="card_top_icon from-blue-500 to-blue-600">&#x2637</div>
                <div class="card_top_info">
                  <p class="card_top_numbers"><?php echo $product; ?></p>                  
                </div>
              </div>
              <div class="card_bottom">
                <div class="card_percentage">
                  <p style="margin: 0 auto;">All Product</p>
                </div>
                <div class="card_line">
                  <div style="width: 100%" class="from-blue-500 via-blue-600 to-blue-700"></div>
                </div>
              </div>
            </div>
          </div> -->

           <!-- ------box------ -->
          <!-- <div class="home_card">
            <div>
              <div class="card_top">
                <div class="card_top_icon from-blue-500 to-blue-600">&#x2637</div>
                <div class="card_top_info">
                  <p class="card_top_numbers"><?php echo $customer; ?></p>                  
                </div>
              </div>
              <div class="card_bottom">
                <div class="card_percentage">
                  <p style="margin: 0 auto;">All Customer</p>
                </div>
                <div class="card_line">
                  <div style="width: 100%" class="from-blue-500 via-blue-600 to-blue-700"></div>
                </div>
              </div>
            </div>
          </div> -->

           <!-- ------box------ -->
           <div class="home_card">
            <div>
              <div class="card_top">
                <div class="card_top_icon from-blue-500 to-blue-600">&#x2637</div>
                <div class="card_top_info">
                  <p class="card_top_numbers"><?php echo $total_salary; ?></p>                  
                </div>
              </div>
              <div class="card_bottom">
                <div class="card_percentage">
                  <p style="margin: 0 auto;">Total Salary</p>
                </div>
                <div class="card_line">
                  <div style="width: 100%" class="from-blue-500 via-blue-600 to-blue-700"></div>
                </div>
              </div>
            </div>
          </div>

           <!-- ------box------ -->
          <div class="home_card">
            <div>
              <div class="card_top">
                <div class="card_top_icon from-blue-500 to-blue-600">&#x2637</div>
                <div class="card_top_info">
                  <p class="card_top_numbers"><?php echo $employee; ?></p>                  
                </div>
              </div>
              <div class="card_bottom">
                <div class="card_percentage">
                  <p style="margin: 0 auto;">All Employee</p>
                </div>
                <div class="card_line">
                  <div style="width: 100%" class="from-blue-500 via-blue-600 to-blue-700"></div>
                </div>
              </div>
            </div>
          </div>          

          
        </div>

        <br>
        <div style="width:100%;background:#ddd;"><h3 style="text-align:center;padding:5px;color:#1f54dd;font-weight:bold;">This Month</h3></div>
        <br>

        <div class="home_content">

           <!-- ------box------ -->
          <div class="home_card">
            <div>
              <div class="card_top">
                <div class="card_top_icon from-blue-500 to-blue-600">&#x2637</div>
                <div class="card_top_info">
                  <p class="card_top_numbers">৳<?php echo $m_total_cost; ?></p>                  
                </div>
              </div>
              <div class="card_bottom">
                <div class="card_percentage">
                  <p style="margin: 0 auto;">This Month Expense</p>
                </div>
                <div class="card_line">
                  <div style="width: 100%" class="from-blue-500 via-blue-600 to-blue-700"></div>
                </div>
              </div>
            </div>
          </div>
           <!-- ------box------ -->
          <div class="home_card">
            <div>
              <div class="card_top">
                <div class="card_top_icon from-blue-500 to-blue-600">&#x2637</div>
                <div class="card_top_info">
                  <p class="card_top_numbers">৳<?php echo $m_total_profit; ?></p>                  
                </div>
              </div>
              <div class="card_bottom">
                <div class="card_percentage">
                  <p style="margin: 0 auto;">This Month Profit</p>
                </div>
                <div class="card_line">
                  <div style="width: 100%" class="from-blue-500 via-blue-600 to-blue-700"></div>
                </div>
              </div>
            </div>
          </div>
           <!-- ------box------ -->
          <div class="home_card">
            <div>
              <div class="card_top">
                <div class="card_top_icon from-blue-500 to-blue-600">&#x2637</div>
                <div class="card_top_info">
                  <p class="card_top_numbers">৳<?php echo $m_total_amount; ?></p>                  
                </div>
              </div>
              <div class="card_bottom">
                <div class="card_percentage">
                  <p style="margin: 0 auto;">This Month Amount</p>
                </div>
                <div class="card_line">
                  <div style="width: 100%" class="from-blue-500 via-blue-600 to-blue-700"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="home_card">
            <div>
              <div class="card_top">
                <div class="card_top_icon from-blue-500 to-blue-600">&#x2637</div>
                <div class="card_top_info">
                  <p class="card_top_numbers">৳<?php echo $m_total_salary; ?></p>                  
                </div>
              </div>
              <div class="card_bottom">
                <div class="card_percentage">
                  <p style="margin: 0 auto;">This Month Salary</p>
                </div>
                <div class="card_line">
                  <div style="width: 100%" class="from-blue-500 via-blue-600 to-blue-700"></div>
                </div>
              </div>
            </div>
          </div>

          
        </div>





      </section>
      <!-- Content -->
    </main>

<!-- Side Navbar Links -->
<?php include("common/footer.php");?>
<!-- Side Navbar Links -->
<?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>

<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php 
     
    $product = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM product WHERE admin_id=$id"));
    $pending_order = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tmp_product WHERE status='Pending' AND admin_id=$id"));
    $success_order = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tmp_product WHERE status='Success' AND admin_id=$id"));
    $customer = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM customer WHERE admin_id=$id"));

    $total_amount = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(total) FROM tmp_product WHERE admin_id=$id"));
    $total_pending = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(amount) FROM tmp_product WHERE status='Pending' AND admin_id=$id"));
    $total_success = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(amount) FROM tmp_product WHERE status='Success' AND admin_id=$id"));


    $total_amount = $total_amount['SUM(total)'];
    $success_amount = $total_success['SUM(amount)'];
    $pendign_amount = $total_pending['SUM(amount)'];
    $due_amount = $total_amount-($success_amount+$pendign_amount);
?>
    <!-- Main Content -->
    <main class="w-full flex bg-gray-100">
      <!-- Side Navbar Links -->
      <?php include('common/sidebar.php')?>
      <!-- Side Navbar Links -->

      <!-- Content -->
      <section class="content_wrapper">
        <h4 class="text-xl font-medium">Dashboard</h4>
        <br />
        <div class="home_content">

           <!-- ------box------ -->
          <div class="home_card">
            <div>
              <div class="card_top">
                <div class="card_top_icon from-blue-500 to-blue-600">&#x2637</div>
                <div class="card_top_info">
                  <p class="card_top_numbers">$<?php echo $total_amount; ?></p>                  
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
                  <p class="card_top_numbers">$<?php echo $pendign_amount; ?></p>                  
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
                  <p class="card_top_numbers">$<?php echo $due_amount; ?></p>                  
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
                  <p class="card_top_numbers">$<?php echo $success_amount; ?></p>                  
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
          <div class="home_card">
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
          </div>

           <!-- ------box------ -->
          <div class="home_card">
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
          </div>

           <!-- ------box------ -->
          <div class="home_card">
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
          </div>

           <!-- ------box------ -->
          <div class="home_card">
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
          </div>

          
        </div>
      </section>
      <!-- Content -->
    </main>

<!-- Side Navbar Links -->
<?php include("common/footer.php");?>
<!-- Side Navbar Links -->
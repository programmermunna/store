<?php include("common/header.php")?>
<?php include("common/sidebar.php")?>
<?php 

$orders = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(amount) AS amount FROM orders"));
$total_amount = $orders['amount'];

$total_users = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM admin_info"));
$total_pending_orders = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM orders WHERE status='Pending'"));
$total_success_orders = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM orders WHERE status='Success'"));

$orders = mysqli_query($conn,"SELECT orders.*, admin_info.* FROM orders INNER JOIN admin_info ON orders.user_id=admin_info.id WHERE orders.status='Pending' ORDER BY orders.id DESC LIMIT 3");

$renew = mysqli_query($conn,"SELECT renew.*, admin_info.* FROM renew INNER JOIN admin_info ON renew.user_id=admin_info.id WHERE renew.status='Pending' ORDER BY renew.id DESC LIMIT 3");

$users = mysqli_query($conn,"SELECT * FROM admin_info ORDER BY id DESC LIMIT 3");

?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  <?php include("common/navbar.php")?>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">weekend</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Total Sell Amount</p>
                <h4 class="mb-0">৳<?php echo $total_amount;?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <!-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">৳5000 </span>Last Purchase</p> -->
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Total Users</p>
                <h4 class="mb-0"><?php echo $total_users;?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <!-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">Abir hossen </span> Last User</p> -->
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Pending Orders</p>
                <h4 class="mb-0"><?php echo $total_pending_orders;?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <!-- <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">sohag hosen</span> Last Pending Order</p> -->
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Success Orders</p>
                <h4 class="mb-0"><?php echo $total_success_orders;?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <!-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">Sohag mia </span>Last Success Orders</p> -->
            </div>
          </div>
        </div>
      </div>
<br>
<br>
      <div class="row mb-4">
        <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
          <div class="card">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-lg-6 col-7">
                  <h6>This Month Orders</h6>
                </div>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive">
                  <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Years</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Amount</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $time = time()-2592000;
                  $result = mysqli_query($conn,"SELECT Orders.*, admin_info.* FROM orders INNER JOIN admin_info ON orders.user_id=admin_info.id WHERE orders.time>$time ORDER BY orders.id DESC LIMIT 7");
                  while($data= mysqli_fetch_assoc($result)){?>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../upload/<?php echo $data['file'];?>" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?php echo $data['name'];?></h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?php echo $data['email'];?></p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?php echo $data['years_num'];?></p>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $data['amount'];?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo date("d-m-y",$data['time']);?></span>
                      </td>
                      <td class="align-middle text-center">
                        <?php 
                        if($data['status']=='Pending'){ ?>
                      <span class="text-xs font-weight-bold badge badge-sm bg-gradient-danger"><?php echo $data['status'];?></span>
                      <?php  }else{?>
                        <span class="text-xs font-weight-bold badge badge-sm bg-gradient-success"><?php echo $data['status'];?></span>
                        <?php }?>
                      </td>
                    </tr>
                        <?php }?>
                  </tbody>
                </table>




              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="card h-100">
            <div class="card-header pb-0">
              <h6>Activities</h6>
            </div>
            <div class="card-body p-3">
              <div class="timeline timeline-one-side">

                <div class="timeline-block mb-3">
                    <span class="timeline-step">
                      <i class="material-icons text-success text-gradient">notifications</i>
                    </span>

                    <?php while($row = mysqli_fetch_assoc($renew)){?>
                    <div class="timeline-content">
                      <h6 class="text-dark text-sm font-weight-bold mb-0"><?php echo $row['name']?> <i style="color:orange">Renew Request</i></h6>
                      <p class="text-secondary font-weight-bold text-xs mt-1 mb-0"><?php echo time_elapsed_string($row['time'],true);?></p>
                    </div>
                    <?php }?>
                    <span class="timeline-step">
                      <i class="material-icons text-success text-gradient">notifications</i>
                    </span>
                    <?php while($row1 = mysqli_fetch_assoc($orders)){?>
                    <div class="timeline-content">
                      <h6 class="text-dark text-sm font-weight-bold mb-0"><?php echo $row1['name']?> <i style="color:green">created a new order</i></h6>
                      <p class="text-secondary font-weight-bold text-xs mt-1 mb-0"><?php echo time_elapsed_string($row1['time'],true);?></p>
                    </div>
                    <?php }?>
                    <span class="timeline-step">
                      <i class="material-icons text-success text-gradient">notifications</i>
                    </span>
                    <?php while($row2 = mysqli_fetch_assoc($users)){?>
                    <div class="timeline-content">
                      <h6 class="text-dark text-sm font-weight-bold mb-0"><?php echo $row2['name']?> <i style="color:blue">created a new account</i></h6>
                      <p class="text-secondary font-weight-bold text-xs mt-1 mb-0"><?php echo time_elapsed_string($row2['join_date'],true);?></p>
                    </div>
                    <?php }?>

                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </main>  
  
  <?php include("common/footer.php")?>
 
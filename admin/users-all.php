<?php include("common/header.php")?>
<?php include("common/sidebar.php")?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  <?php include("common/navbar.php")?>
  <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 search_bar">
                <h6 class="text-white text-capitalize ps-3">Users All</h6>
                <div class="top_search">
                  <form action="" method="POST">
                    <input name="src" type="text">
                    <button name="search" type="submit">Search</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Photo</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Address</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Join Date</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Order Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php 
                  if(isset($_POST['search'])){
                    $src_text = trim($_POST['src']);
                    $sql = "SELECT * FROM admin_info WHERE name='$src_text' OR email='$src_text' OR address='$src_text' OR permision='$src_text'";
                    $search_query = mysqli_query($conn,$sql);
                  }
                  if(isset($search_query)){
                  while($data = mysqli_fetch_assoc($search_query)){; 
                  ?>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../upload/<?php echo $data['file'];?>" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                          </div>
                        </div>
                      </td>                      
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $data['name'];?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $data['email'];?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $data['address'];?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo date("d-m-y",$data['join_date']);?></span>
                      </td>
                      <td class="align-middle text-center">
                        <?php if($data['permision']=='Pending'){ ?>
                          <span class="text-xs font-weight-bold badge badge-sm bg-gradient-danger"><?php echo $data['permision'];?></span>
                     <?php }else{?>
                        <span class="text-xs font-weight-bold badge badge-sm bg-gradient-success"><?php echo $data['permision'];?></span>
                        <?php }?>
                      </td>
                      <td style="text-align:center">
                        <a href="users-edit.php?src=users-all&&id=<?php echo $data['id'];?>" class="badge badge-sm bg-gradient-success">View</a>
                        <a href="delete.php?src=users&&id=<?php echo $data['id'];?>" class="badge badge-sm bg-gradient-success">Delete</a>
                      </td>
                    </tr>
                  <?php }}else{
                if (isset($_GET['page_no']) && $_GET['page_no']!="") {
                  $page_no = $_GET['page_no'];} else {$page_no = 1;}
                  $total_records_per_page = 6;
                  $offset = ($page_no-1) * $total_records_per_page;
                  $previous_page = $page_no - 1;
                  $next_page = $page_no + 1;
                  $adjacents = "2"; 

                  $result_count = mysqli_query($conn,"SELECT * FROM admin_info");
                  $total_records = mysqli_num_rows($result_count);
                  $total_no_of_pages = ceil($total_records / $total_records_per_page);
                  $second_last = $total_no_of_pages - 1;

                  $result = mysqli_query($conn,"SELECT * FROM admin_info LIMIT $offset, $total_records_per_page");
                  while($data= mysqli_fetch_assoc($result)){?>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../upload/<?php echo $data['file'];?>" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                          </div>
                        </div>
                      </td>                      
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $data['name'];?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $data['email'];?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $data['address'];?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo date("d-m-y",$data['join_date']);?></span>
                      </td>
                      <td class="align-middle text-center">
                        <?php if($data['permision']=='Pending'){ ?>
                          <span class="text-xs font-weight-bold badge badge-sm bg-gradient-danger"><?php echo $data['permision'];?></span>
                     <?php }else{?>
                        <span class="text-xs font-weight-bold badge badge-sm bg-gradient-success"><?php echo $data['permision'];?></span>
                        <?php }?>
                      </td>
                      <td style="text-align:center">
                        <a href="users-edit.php?src=users-all&&id=<?php echo $data['id'];?>" class="badge badge-sm bg-gradient-success">View</a>
                        <a href="delete.php?src=users&&id=<?php echo $data['id'];?>" class="badge badge-sm bg-gradient-success">Delete</a>
                      </td>
                    </tr>
                    <?php }?>
                  </tbody>
                </table>


              <!-- /* ----------paginations----------- */ -->
              <style>
                .paginations>ul{box-shadow: 0 0 1px gray;margin: 0;padding: 10px;}
                .paginations>ul>li{list-style: none;display: inline-block;line-height: 2.5;}
                .paginations>ul>li>a{padding: 5px 10px;margin:5px;background: #fff;font-weight: bolder;box-shadow: 0px 0px 2px gray;}
                .paginations>ul>li>a:hover{background: #E8503C;color: #fff;}
                .active>a{background: #E8503C !important;color: #fff !important;}
                .page_of{padding-top: 10px;}
                @media only screen and (max-width: 850px){.page_of{display: none;}}
              </style>

              <div style="display:flex;justify-content:space-between;padding:10px 20px;">
                  <div class="paginations">
                    <ul>
                      <?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>
                        
                      <li <?php if($page_no <= 1){ echo "class=''"; } ?>>
                      <a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Previous</a>
                      </li>
                          
                        <?php 
                      if ($total_no_of_pages <= 10){  	 
                        for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
                          if ($counter == $page_no) {
                          echo "<li class=''><a>$counter</a></li>";	
                            }else{
                              echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                            }
                            }
                      }
                      elseif($total_no_of_pages > 10){
                        
                      if($page_no <= 4) {			
                      for ($counter = 1; $counter < 8; $counter++){		 
                          if ($counter == $page_no) {
                          echo "<li class='active'><a>$counter</a></li>";	
                            }else{
                              echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                            }
                            }
                        echo "<li><a>...</a></li>";
                        echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
                        echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
                        }

                      elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
                        echo "<li><a href='?page_no=1'>1</a></li>";
                        echo "<li><a href='?page_no=2'>2</a></li>";
                            echo "<li><a>...</a></li>";
                            for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
                              if ($counter == $page_no) {
                          echo "<li class='active'><a>$counter</a></li>";	
                            }else{
                              echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                            }                  
                          }
                          echo "<li><a>...</a></li>";
                        echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
                        echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
                                }
                        
                        else {
                            echo "<li><a href='?page_no=1'>1</a></li>";
                        echo "<li><a href='?page_no=2'>2</a></li>";
                            echo "<li><a>...</a></li>";

                            for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
                              if ($counter == $page_no) {
                          echo "<li class='active'><a>$counter</a></li>";	
                            }else{
                              echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                            }                   
                                    }
                                }
                      }
                    ?>
                        
                      <li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
                      <a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Next</a>
                      </li>
                        <?php if($page_no < $total_no_of_pages){
                        echo "<li><a href='?page_no=$total_no_of_pages'>Last</a></li>";
                        } ?>
                    </ul>
                  </div>
                  <div class="page_of">
                    <div><strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong></div>
                  </div>
                </div>
                <!-- /* ----------paginations----------- */ -->
                <?php }?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>  
  
  <?php include("common/footer.php")?>
  <?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>

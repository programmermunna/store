<?php include("common/home-header.php")?>
<?php 
if($landing_id<1){
    $msg = "Please Login First";
    header("location:user-login.php?msg=$msg");
}
if(isset($_POST['submit'])){    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    move_uploaded_file($file_tmp,"upload/$file_name");

    if(empty($file_name)){
        $update = mysqli_query($conn,"UPDATE admin_info SET name='$name', email='$email', address='$address' WHERE id=$landing_id");
    }else{
        $update = mysqli_query($conn,"UPDATE admin_info SET name='$name', email='$email', address='$address',file='$file_name' WHERE id=$landing_id");
    }

    if($update){
        $msg = "Successfully Updated!";
        header("location:my-account.php?msg=$msg");
    }
}

?>
        <main>
            <section class="hero">
                <div class="container">
                    <div class="hero-inner">

						<div class="hero-copy" style="padding-top:0;">
                            <form action="" method="POST" enctype="multipart/form-data">
                            <div class="order">
                                <div class="order-itmes">
                                    <label for="name">Name</label>
                                    <input  name="name" type="text" value="<?php echo $user_info['name']?>">
                                </div>
                                <div class="order-itmes">
                                    <label for="email">Email</label>
                                    <input  name="email" type="text" value="<?php echo $user_info['email']?>">
                                </div>
                                <div class="order-itmes">
                                    <label for="address">Address</label>
                                    <input name="address" type="text" value="<?php echo $user_info['address']?>">
                                </div>
                                <div class="order-itmes">
                                    <label for="address">Photo</label>
                                    <input name="file" type="file" style="width:100%;">
                                </div>
                                <input name="submit" class="submit_btn" type="submit" value="Save">
                            </div>
                            </form>
						</div>

						<div class="hero-media my_account">                            
                            <div>
                            <h3><?php echo $user_info['name']?></h3>
                            <p><?php echo $user_info['email']?></p>
                            <p><?php echo $user_info['address']?></p>
                            <span>renew: <b><?php if(isset($order_info['years_num'])){echo $order_info['years_num']." Years"; }else{echo "Unavailable";}?></b></span>
                            <span>Payment Method: <b><?php if(isset($order_info['pmn_method'])){echo $order_info['pmn_method'];}else{echo "Unavailable";}?></b></span>
                            <span>Payment Number: <b><?php if(isset($order_info['pmn_number'])){echo $order_info['pmn_number'];}else{echo "Unavailable";}?></b></span>
                            <span>Transection ID: <b><?php if(isset($order_info['trans_id'])){echo $order_info['trans_id'];}else{echo "Unavailable";}?></b></span>
                            <span>Amount: <b><?php if(isset($order_info['amount'])){echo $order_info['amount']." ৳";}else{echo "Unavailable";}?></b></span>
                            <span>Remainder: <b><?php if(isset($order_info['years'])){$years = $order_info['years'];remainder($years);}else{echo "Unavailable";}?></b></span>
                            
                            <?php  if($user_info['permision']=='Success'){ ?>
                                <span>Status: <b style="color:green">Success</b></span>
                                <?php  }elseif(isset($order_info['status'])=='Pending'){ ?>
                                <span>Status: <b style="color:red">Pending</b></span>
                            <?php  }else{?>                           
                                <span>Status: <b>No Dashboard</b></span>
                            <?php  }?>

                                
                            <?php 
                            if(isset($order_info['status'])){
                                if($order_info['status']=='Success'){ ?>
                            <span style="margin-top:10px;"><b><a class="submit_btn" href="order.php">Renew Now</a></b></span>
                            <?php }}?>






                            </div>
                            <div>
							<img src="upload/<?php echo $user_info['file']?>">
                            </div>
						</div>
                    </div>
                </div>
            </section>
        </main>
<?php include("common/home-footer.php")?>
<?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>


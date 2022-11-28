<?php include("common/home-header.php")?>
<?php
if($landing_id>0){
  header("location:home.php");
}
if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pass = md5($_POST['pass']);
    $cpass = md5($_POST['cpass']);
    $time = time();

    if (filter_var($email, FILTER_VALIDATE_EMAIL)){
      $check = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM admin_info WHERE email='$email'"));
    if($check>0){
        $msg = "Alrady Have Account. Please Login";
        header("location:user-signin.php?msg=$msg");
      }else{
      if($pass==$cpass){
        $insert = mysqli_query($conn,"INSERT INTO admin_info(`name`, `email`, `pass`, `join_date`) VALUE('$name', '$email', '$pass', '$time')");
        $row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM admin_info WHERE email='$email' AND pass='$pass'"));
        if($row>0){
        $landing_id = $row['id'];
        $_SESSION['landing_id'] = $landing_id;
        setcookie('landing_id', $landing_id , time()+2592000);
        $insert = mysqli_query($conn,"INSERT INTO category(admin_id,category,parent_id) VALUE($landing_id,'Uncategories',0)");
        header('location:my-account.php');
        }else{
          $msg = "Something is worng!";
          header("location:user-signin.php?msg=$msg");
        }
      }else{
        $msg = "Password and Confirm Password are not match!";
        header("location:user-signin.php?msg=$msg");
      }
    }
  }


  
}
?>
        <main>
            <section class="hero">
                <div class="container">
                    <div class="hero-inner">

						<div class="hero-copy" style="margin:0 auto">
                            <form action="" method="POST">
                            <div class="order">
                                <div class="order-itmes">
                                    <label for="name">Name</label>
                                    <input name="name" type="text">
                                </div>
                                <div class="order-itmes">
                                    <label for="email">Email</label>
                                    <input name="email" type="email">
                                </div>
                                <div class="order-itmes">
                                    <label for="pass">Password</label>
                                    <input name="pass" type="password">
                                </div>
                                <div class="order-itmes">
                                    <label for="cpass">Confirm Password</label>
                                    <input name="cpass" type="password">
                                </div>
                                <input name="submit" class="submit_btn" type="submit" value="Submit">
                            </div>
                            </form>
						</div>
                    </div>
                </div>
            </section>
        </main>
<?php include("common/home-footer.php")?>
<?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>


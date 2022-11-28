<?php include("common/home-header.php")?>
<?php 
if($landing_id>0){
    header("location:home.php");
}
if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pass = md5($_POST['pass']);
    if (filter_var($email, FILTER_VALIDATE_EMAIL)){
    $row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM admin_info WHERE email='$email' AND pass='$pass'"));
    if($row>0){
    $landing_id = $row['id'];
    $_SESSION['landing_id'] = $landing_id;
    setcookie('landing_id', $landing_id , time()+2592000);
      header('location:my-account.php');
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
                                    <label for="email">Email</label>
                                    <input name="email" type="text">
                                </div>
                                <div class="order-itmes">
                                    <label for="pass">Password</label>
                                    <input name="pass" type="password">
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


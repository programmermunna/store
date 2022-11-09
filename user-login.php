<?php include("common/home-header.php")?>
<?php 
if($user_id>0){
    header("location:home.php");
}
if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pass = md5($_POST['pass']);
    if (filter_var($email, FILTER_VALIDATE_EMAIL)){
    $row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM user_info WHERE email='$email' AND pass='$pass'"));
    if($row>0){
    $user_id = $row['id'];
    $_SESSION['user_id'] = $user_id;
    setcookie('user_id', $user_id , time()+86000);
      header('location:home.php');
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
                                    <input name="pass" type="text">
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

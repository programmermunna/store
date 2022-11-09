<?php include("common/home-header.php")?>
<?php
if($user_id>0){
  header("location:home.php");
}
if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pass = md5($_POST['pass']);
    $cpass = md5($_POST['cpass']);
    $time = time();

    if (filter_var($email, FILTER_VALIDATE_EMAIL)){
      $check = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM user_info WHERE email='$email'"));
    if($check>0){
        $err = "Alrady Have Account. Please Login";
        header("location:user-signin.php?err=$err");
      }else{
      if($pass==$cpass){
        $insert = mysqli_query($conn,"INSERT INTO user_info(`name`, `email`, `pass`, `time`) VALUE('$name', '$email', '$pass', '$time')");
        $row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM user_info WHERE email='$email' AND pass='$pass'"));
        if($row>0){
        $user_id = $row['id'];
        $_SESSION['user_id'] = $user_id;
        setcookie('user_id', $user_id , time()+86000);
        header('location:home.php');
        }
      }else{
        $err = "Password and Confirm Password are not match!";
        header("location:user-signin.php?err=$err");
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
                                    <input name="email" type="text">
                                </div>
                                <div class="order-itmes">
                                    <label for="pass">Password</label>
                                    <input name="pass" type="text">
                                </div>
                                <div class="order-itmes">
                                    <label for="cpass">Confirm Password</label>
                                    <input name="cpass" type="text">
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

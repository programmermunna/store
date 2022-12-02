<?php include("include/functions.php");

if(isset($_SESSION['admin_id'])){
  $id = $_SESSION['admin_id'];
  if($id>0){
    header('location:index.php');
  }
} 
if(isset($_COOKIE['admin_id'])){
  $id = $_COOKIE['admin_id'];
  if($id>0){
    header('location:index.php');
  }
}


if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pass = md5($_POST['pass']);
    if (filter_var($email, FILTER_VALIDATE_EMAIL)){
    $row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM admin_info WHERE email='$email' AND pass='$pass' AND permision='Success'"));
    if($row>0){
    $id = $row['id'];
    $name = $row['name'];
    $_SESSION['admin_id'] = $id;
    setcookie('admin_id', $id , time()+2592000);
    header('location:index.php');
    }else{
      $msg = "You are not ablable. Please purchase first."; 
      header("location:login.php?msg=$msg");
    } 
  }else{
    $msg = "Email is not Vali.";
    header("location:login.php?msg=$msg");
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="dist/css/login.css" />
    <link rel="stylesheet" href="dist/css/styles.css" />
    <link rel="stylesheet" href="dist/css/custom.css" />
</head>

<body class="bg-gray-100">
    <section class="login">
        <div class="login_box">
            <div class="left">
                <div class="contact">
                    <form action="" method="POST" >
                        <h3>LOGIN</h3>
                        <input name="email" type="email" placeholder="EMAIL">
                        <input name="pass" type="password" placeholder="PASSWORD">
                        <button style="background:#EB75A4" name="submit" type="submit" class="submit">LOGIN</button>
                    </form>
                </div>
            </div>
            <div class="right">
                <div class="right-text">
                    <h2>Store Management</h2>
                    <h5>Sell Product With Digital System</h5>
                    <a href='order.php' style="background:#fff;color:#000;margin-top:20px;" target="_blank" name="submit">Purchase Now</a>
                </div>
                <div class="right-inductor"><img
                        src="https://lh3.googleusercontent.com/fife/ABSRlIoGiXn2r0SBm7bjFHea6iCUOyY0N2SrvhNUT-orJfyGNRSMO2vfqar3R-xs5Z4xbeqYwrEMq2FXKGXm-l_H6QAlwCBk9uceKBfG-FjacfftM0WM_aoUC_oxRSXXYspQE3tCMHGvMBlb2K1NAdU6qWv3VAQAPdCo8VwTgdnyWv08CmeZ8hX_6Ty8FzetXYKnfXb0CTEFQOVF4p3R58LksVUd73FU6564OsrJt918LPEwqIPAPQ4dMgiH73sgLXnDndUDCdLSDHMSirr4uUaqbiWQq-X1SNdkh-3jzjhW4keeNt1TgQHSrzW3maYO3ryueQzYoMEhts8MP8HH5gs2NkCar9cr_guunglU7Zqaede4cLFhsCZWBLVHY4cKHgk8SzfH_0Rn3St2AQen9MaiT38L5QXsaq6zFMuGiT8M2Md50eS0JdRTdlWLJApbgAUqI3zltUXce-MaCrDtp_UiI6x3IR4fEZiCo0XDyoAesFjXZg9cIuSsLTiKkSAGzzledJU3crgSHjAIycQN2PH2_dBIa3ibAJLphqq6zLh0qiQn_dHh83ru2y7MgxRU85ithgjdIk3PgplREbW9_PLv5j9juYc1WXFNW9ML80UlTaC9D2rP3i80zESJJY56faKsA5GVCIFiUtc3EewSM_C0bkJSMiobIWiXFz7pMcadgZlweUdjBcjvaepHBe8wou0ZtDM9TKom0hs_nx_AKy0dnXGNWI1qftTjAg=w1920-h979-ft"
                        alt=""></div>
            </div>
        </div>
    </section>
</body>
</html>

<?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>

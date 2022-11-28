<?php include("include/functions.php");

if(isset($_SESSION['admin_id'])){
  $id = $_SESSION['admin_id'];
}elseif(isset($_COOKIE['admin_id'])){
  $id = $_COOKIE['admin_id'];  
}

if(isset($id)){
  $check = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM admin_info WHERE id=$id"));
  if($check['permision']=='Success'){
    header('location:index.php');
  }
  
}

if(isset($_SESSION['landing_id'])){
   $landing_id = $_SESSION['landing_id'];  
}elseif(isset($_COOKIE['landing_id'])){
   $landing_id = $_COOKIE['landing_id'];
}

if(isset($landing_id)){
  $user = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM admin_info WHERE id=$landing_id"));
  if($user['permision'] == 'Success'){
    $demo_email = "";
    $demo_pass = "";
  }else{
    $demo_email = "admin@gmail.com";
    $demo_pass = "1234";
  }
}else{
  $demo_email = "admin@gmail.com";
  $demo_pass = "1234";
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
                        <input name="email" type="email" placeholder="EMAIL" value="<?php if(isset($demo_email)){ echo $demo_email;}?>">
                        <input name="pass" type="password" placeholder="PASSWORD" value="<?php if(isset($demo_pass)){ echo $demo_pass;}?>">
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
            </div>
        </div>
    </section>
</body>
</html>
<?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>

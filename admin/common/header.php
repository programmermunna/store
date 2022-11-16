<?php include('../include/functions.php');
if(isset($_SESSION['super_admin_id'])){
   $id = $_SESSION['super_admin_id'];
   $getUser = "SELECT * FROM super_admin WHERE id='$id'";
   $userQuery = mysqli_query($conn,$getUser);
   $user = mysqli_fetch_assoc($userQuery);   
}elseif(isset($_COOKIE['super_admin_id'])){
  $id = $_COOKIE['super_admin_id'];
}else{
  $id = 0;
}
if(isset($_SESSION['super_admin_id'])){
  $id = $_SESSION['super_admin_id'];
}
if($id<1){
  header('location:login.php');
}

$website = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM website_setting WHERE id=1"));
$mail = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM mail_setting WHERE id=1"));
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../upload/<?php echo $website['favicon']?>">
  <title><?php echo $website['name']?></title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

<!-- SUMMERNOTE TEXTAREA -->
<script src="https://code.jquery.com/jquery-3.2.1.js" crossorigin="anonymous"></script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js" crossorigin="anonymous"></script>    
  <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css" rel="stylesheet" />

  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/custom.css">
</head>
<body class="g-sidenav-show  bg-gray-200">

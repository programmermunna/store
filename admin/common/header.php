<?php include('../include/functions.php');

// if(!session_start()){ session_start();}
// if(isset($_SESSION['admin_id'])){
//    $id = $_SESSION['admin_id'];
//    $getUser = "SELECT * FROM admin_info WHERE id='$id'";
//    $userQuery = mysqli_query($conn,$getUser);
//    $user = mysqli_fetch_assoc($userQuery);   
// }elseif(isset($_COOKIE['admin_id'])){
//   $id = $_COOKIE['admin_id'];
// }else{
//   $id = 0;
// }
// if(isset($_SESSION['admin_id'])){
//   $id = $_SESSION['admin_id'];
// }
// if($id<1){
//   header('location:index.php');
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <title>Store Management Software</title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/custom.css">
</head>
<body class="g-sidenav-show  bg-gray-200">

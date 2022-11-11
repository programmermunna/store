<?php include("../include/functions.php");
if(isset($_GET['src'])){
    $src = $_GET['src'];
    $id = $_GET['id'];
}
switch ($src) {
    case "pending-orders":
        if(mysqli_query($conn,"DELETE FROM orders WHERE user_id=$id") && mysqli_query($conn,"DELETE FROM user_info WHERE id=$id")){
            $msg = "Successfully Deleted!";
            header("location:$src.php?msg=$msg");
        }
      break;
    default:
    header("location:index.php");
  }

























?>
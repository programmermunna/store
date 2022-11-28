<?php include("../include/functions.php");
if(isset($_GET['src'])){
    $src = $_GET['src'];
    $id = $_GET['id'];
}
switch ($src) {
    case "pending-orders":
        if(mysqli_query($conn,"DELETE FROM orders WHERE user_id=$id")){
            $msg = "Successfully Deleted!";
            header("location:$src.php?msg=$msg");
        }
      break;
    case "success-orders":
        if(mysqli_query($conn,"DELETE FROM orders WHERE user_id=$id")){
            $msg = "Successfully Deleted!";
            header("location:$src.php?msg=$msg");
        }
      break;
    case "renew-orders":
        if(mysqli_query($conn,"DELETE FROM renew WHERE user_id=$id")){
            $msg = "Successfully Deleted!";
            header("location:$src.php?msg=$msg");
        }
      break;
    case "users":
        if(mysqli_query($conn,"DELETE FROM admin_info WHERE id=$id")){
            $msg = "Successfully Deleted!";
            header("location:$src-all.php?msg=$msg");
        }
      break;
    case "payment-method":
        if(mysqli_query($conn,"DELETE FROM payment_method WHERE id=$id")){
            $msg = "Successfully Deleted!";
            header("location:$src.php?msg=$msg");
        }
      break;
    default:
    header("location:index.php");
  }

























?>
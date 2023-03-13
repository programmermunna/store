<?php include("include/functions.php");

if (isset($_GET['src'])) {
  $src = $_GET['src'];
  $order = $_GET['order'];
  $id = $_GET['id'];
}

$action = "$src";
switch ($action) {
  case "customer":
    $customer = mysqli_query($conn, "DELETE FROM customer WHERE id=$id;");
    $msg = "Customer has beeen delted!";
    header("location:customer-all.php?msg=$msg");
    break;
  case "category":
    $category = mysqli_query($conn, "DELETE FROM category WHERE category !='Uncategories' id=$id;");
    $msg = "category has beeen delted!";
    header("location:category-all.php?msg=$msg");
    break;
  case "product":
    $product = mysqli_query($conn, "DELETE FROM product WHERE id=$id;");
    $msg = "product has beeen delted!";
    header("location:product-all.php?msg=$msg");
    break;
  case "pending":
    $pending = mysqli_query($conn, "DELETE FROM tmp_product WHERE order_no=$order");
    $msg = "Has beeen delted!";
    header("location:order-pending.php?msg=$msg");  
    break;
  case "success":
    $success = mysqli_query($conn, "DELETE FROM product WHERE id=$id AND status='Success'");
    $msg = "Has beeen delted!";
    header("location:success.php?msg=$msg");
    break;
  case "delete_item":
    $product_item = mysqli_query($conn, "DELETE FROM tmp_product WHERE order_no='$order' AND product_code='$id'");
    header("location:pos-index.php?order=$order");
    break;
  case "brand":
    $brand = mysqli_query($conn, "DELETE FROM brand WHERE id='$id'");
    $msg = "Has beeen delted!";
    header("location:brand.php?msg=$msg");
    break;
  default:
    echo "Something is wrong! Please try again.";
}

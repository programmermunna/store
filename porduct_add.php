<?php include("common/header.php");

if(isset($_GET['pr_id'])){
      $order = $_GET['order'];
      $pr_id = $_GET['pr_id'];
      $vat = $_GET['vat'];
}
  $date = date("F Y",time());

  $tmp_product = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tmp_product WHERE order_no = '$order' AND product_code = $pr_id"));

  $product = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM product WHERE product_code='$pr_id'"));
  $brand = $product['brand'];
  $pr_name = $product['product_name'];
  $sell_price = $product['sell_price'];

  if(!$tmp_product['product_code']==$pr_id && !$order_no['order_no']==$order){
    $product_add = mysqli_query($conn,"INSERT INTO tmp_product(admin_id,brand,order_no,product_code,product_name,sell_price,quantity,vat,date) VALUE($id,'$brand','$order','$pr_id','$pr_name','$sell_price',1,'$vat','$date')");
    if($product_add){
      $tmp_product = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tmp_product WHERE order_no = '$order' AND product_code = $pr_id"));

      $product_vat = ($tmp_product['sell_price']/100)*$vat; 
      $subtotal = ($tmp_product['sell_price'] * $tmp_product['quantity']);
      $total = ($tmp_product['sell_price'] * $tmp_product['quantity'])+($tmp_product['quantity']*$product_vat);      

      $update = mysqli_query($conn,"UPDATE tmp_product SET subtotal='$subtotal',total=$total,vat_cost='$product_vat'  WHERE order_no = '$order' AND product_code = $pr_id");

      header("location:pos-index.php?order=$order");
    }

  }else{
    header("location:pos-index.php?order=$order");
  }






?>
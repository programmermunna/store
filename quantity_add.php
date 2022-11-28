<?php include("include/functions.php");

if(isset($_GET['order'])){
 $order = $_GET['order'];
 $pr_id = $_GET['pr_id'];
 $quantity = $_GET['quantity'];
}
$quantity_update = mysqli_query($conn,"UPDATE tmp_product SET quantity='$quantity' WHERE order_no='$order' AND product_code='$pr_id'");
if($quantity_update){
$tmp_product = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tmp_product WHERE order_no='$order' AND product_code ='$pr_id' ORDER BY id DESC"));
  $vat = ($tmp_product['sell_price']/100)*$tmp_product['vat'];
  $subtotal = ($tmp_product['sell_price'] * $tmp_product['quantity']);
  $total = ($tmp_product['sell_price'] * $tmp_product['quantity'])+($tmp_product['quantity']*$vat);
  $vat_cost = $tmp_product['quantity']*$vat;
  
 $insert_total = mysqli_query($conn,"UPDATE tmp_product SET subtotal='$subtotal',total='$total',vat_cost='$vat_cost' WHERE order_no='$order' AND product_code='$pr_id'");
 if($insert_total){
   header("location:pos-index.php?order=$order");

 }

}

?>
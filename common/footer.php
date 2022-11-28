<?php
$category = mysqli_query($conn, "SELECT * FROM category WHERE admin_id=$id");
$arr = array();
while ($row = mysqli_fetch_assoc($category)) {
    $arr[] = $row;
}
 $json_array = json_encode($arr);
?>

<script> 
const categories = <?php echo $json_array; ?>
</script>

    <!-- Main Content -->
    <script src="dist/js/header.js"></script>
    <script src="dist/js/svg_icons.js"></script>
    <script src="dist/js/sidebar_nav.js"></script>
    <!-- <script src="dist/js/point-of-sale.js"></script> -->
    <script src="dist/js/invoice.js"></script> 
    <script src="dist/js/categories.js"></script>
  </body>
</html>
<?php
ob_flush();
?>











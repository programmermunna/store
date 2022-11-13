<?php 
//============Logout with session & cookie========//
setcookie('super_admin_id', $id , time() - 2592000);
if(!session_start()){session_start();}
if(isset($_SESSION['super_admin_id'])){
    unset($_SESSION['super_admin_id']);
    session_destroy();
    header('location:login.php');
}
header('location:login.php');

?>
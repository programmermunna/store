<?php include("include/functions.php");
    setcookie('user_id', $user_id, time() - 86000);
    if (isset($_SESSION['user_id'])) {
        unset($_SESSION['user_id']);
        session_destroy();
        header('location:home.php');
    }
    header('location:home.php');

?>
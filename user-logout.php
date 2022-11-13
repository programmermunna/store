<?php include("include/functions.php");
    setcookie('landing_id', $landing_id, time() - 2592000);
    if (isset($_SESSION['landing_id'])) {
        unset($_SESSION['landing_id']);
        session_destroy();
        header('location:home.php');
    }
    header('location:home.php');

?>
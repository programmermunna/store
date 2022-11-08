<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "warranty";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);
if($conn){
    echo "";
}else{
    
    echo "error";
}

?>
<?php include('../include/functions.php'); ?>
<?php 
//============session&cookie========//

// if(!session_start()){session_start();}  
// if(isset($_SESSION['admin_id'])){
//   $id = $_SESSION['admin_id'];
//   if($id>0){
//     header('location:home.php');
//   }
// } 
// if(isset($_COOKIE['admin_id'])){
//   $id = $_COOKIE['admin_id'];
//   if($id>0){
//     header('location:home.php');
//   }
// }

//============Login========//

// if(isset($_POST['login'])){
//   $phone =$_POST['phone'];
//   $pass = md5($_POST['pass']); 
//   $row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM admin_info WHERE phone='$phone' AND pass='$pass'"));
//   if($row>0){
//       $id = $row['id'];
//       $_SESSION['admin_id'] = $id;
//       setcookie('admin_id', $id , time()+86000);
//       header('location:home.php');
//   } 
// }

?>

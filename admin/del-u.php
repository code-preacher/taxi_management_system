<?php 
ob_start();
session_start();
include '../inc/checklogin.php';
checkLogin();
$id=$_GET['id'];
?>

<?php
include '../inc/config.php';
$j=mysqli_query($con,"delete from user where id='$id'");
 if ($j) {
  $_SESSION['umsg']= '<div class="alert alert-success hide alert-dismissible fade show" role="alert">
  <strong>User was successfully deleted....</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
 header("location:view-user.php");
 } else {
  $_SESSION['umsg']='<div class="alert alert-danger hide alert-dismissible fade show" role="alert">
  <strong>Error deleting user....</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>'; 
 header("location:view-user.php");
 }
 


?>



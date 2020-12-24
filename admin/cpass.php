<?php
ob_start();
session_start();
include '../inc/checklogin.php';
checkLogin();
 include('../inc/config.php');

if(isset($_POST['submit'])){
$name=$_POST['name'];
$password=$_POST['password'];
$email=$_POST['email'];


$ql=mysqli_query($con,"update admin set name='$name',email='$email',password='$password' where email='".$_SESSION['email']."'");

if($ql){
$_SESSION['pmsg']='<div class="alert alert-success hide alert-dismissible fade show" role="alert">
  <strong>Data was successfully updated....</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
$_SESSION['email']=$email;
}
else{
$_SESSION['pmsg']='<div class="alert alert-danger hide alert-dismissible fade show" role="alert">
  <strong>Data was not successfully updated....</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
}

header("location:profile.php");
?>
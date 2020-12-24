<?php
ob_start();
session_start();
include '../inc/checklogin.php';
checkLogin();
 include('../inc/config.php');

if(isset($_POST['submit'])){
  $name=$_POST['name'];
  $email=$_POST['email'];
  $password=$_POST['password'];
   $phone=$_POST['phone'];
    $address=$_POST['address'];

$ql=mysqli_query($con,"update user set name='$name',email='$email',password='$password',phone='$phone',address='$address' where email='".$_SESSION['email']."'");

if($ql){
$_SESSION['smsg']='<div class="alert alert-success hide alert-dismissible fade show" role="alert">
  <strong>Profile was successfully updated....</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
$_SESSION['email']=$email;
}
else{
$_SESSION['smsg']='<div class="alert alert-danger hide alert-dismissible fade show" role="alert">
  <strong>Error updating profile....</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
}

header("location:profile.php");
?>
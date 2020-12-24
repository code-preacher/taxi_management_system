<?php
session_start();
error_reporting(0);
include '../inc/checklogin.php';
checkLogin();
?>
<?php
include("../inc/config.php");
if(isset($_POST['submit'])){
  $name=$_POST['name'];
  $email=$_POST['email'];
  $password=$_POST['password'];
   $phone=$_POST['phone'];
    $address=$_POST['address'];
  $date=date("d-m-y @ g:i A");
$da=mysqli_query($con,"insert into user(name,email,password,phone,address,date_created) values('$name','$email','$password','$phone','$address','$date')");
if ($da) {
$_SESSION['zmsg']='<div class="alert alert-success hide alert-dismissible fade show" role="alert">
  <strong>New User was created successfully....</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
} else {
  $_SESSION['zmsg']='<div class="alert alert-danger hide alert-dismissible fade show" role="alert">
  <strong>Error creating account....</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>TAXI RESERVATION SYSTEM</title>

  <?php
include 'inc/header.php';
  ?>



  <div id="wrapper">
<?php
include 'inc/sidebar.php';
?>


    <div id="content-wrapper">
        <?php
               if (!empty($_SESSION['zmsg'])) {
                      echo $_SESSION['zmsg'];
                       $_SESSION['zmsg']="";
               }
         
               ?>

<div class="container-fluid col-lg-7">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register New User</div>
      <div class="card-body">
        <form action="#" method="post">
          <div class="form-group">
           <div class="form-label-group">
                  <input type="text" id="FullName" name="name" class="form-control" placeholder="FullName" required="required" autofocus="autofocus">
                  <label for="FullName">Fullname</label>
                </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
                  <input type="email" id="Email" class="form-control" name="email" placeholder="Email" required="required">
                  <label for="Email">Email</label>
                </div>
          </div>
          <div class="form-group">
          <div class="form-label-group">
                  <input type="text" id="Password" name="password" class="form-control" placeholder="Password" required="required">
                  <label for="Password">Password</label>
                </div>
          </div>
          <div class="form-group">
        <div class="form-label-group">
                  <input type="text" id="Phone" name="phone" class="form-control" placeholder="Phone Number" required="required">
                  <label for="Phone">Phone Number</label>
                </div>
          </div>
          <div class="form-group">
           <div class="form-label-group">
              <input type="text" id="Address" name="address" class="form-control" placeholder="Address" required="required">
              <label for="Address">Address</label>
            </div>
          </div>
          
          <div class="form-group">
        <button type="submit" name="submit" class="btn btn-primary btn-block">Add User</button>
          </div>
         
        </form>
       
      </div>
    </div>
<br/>

  </div>

      <!-- /.container-fluid -->
<!-- Main close -->

<?php
include 'inc/footer.php';
?>
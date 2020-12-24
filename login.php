<?php
session_start();
error_reporting(0);
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



    <div id="content-wrapper">

<div class="container-fluid col-lg-4">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form action="inc/check.php" method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email" required="required" autofocus="autofocus">
              <label for="inputEmail">Please enter your email:</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="required">
              <label for="inputPassword">Please enter your password:</label>
            </div>
          </div>
          
          <div class="form-group">
        <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
          </div>
         
        </form>
        <div class="text-center">
         <a class="d-block small mt-3" href="reg.php">Create an Account</a>
          <a class="d-block small mt-3" href="index.html"><i class="fa fa-home"></i>&nbsp;&nbsp;&nbsp;Back to Home</a>
        </div>
      </div>
    </div>
<br/>

      <?php
               if (!empty($_SESSION['msg'])) {
                      echo $_SESSION['msg'];
                       $_SESSION['msg']="";
               }
         
               ?>
  </div>



      <!-- /.container-fluid -->
<!-- Main close -->

<?php
include 'inc/footer.php';
?>
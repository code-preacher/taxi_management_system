
<?php 
ob_start();
session_start();
include '../inc/checklogin.php';
checkLogin();
include('../inc/config.php');
$fd=mysqli_query($con,"SELECT * FROM admin WHERE email='".$_SESSION['email']."'");
$pv=mysqli_fetch_array($fd);
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

<div class="container-fluid col-lg-12">
  
      <?php
        if (!empty($_SESSION['pmsg'])) {
           echo $_SESSION['pmsg'];
           $_SESSION['pmsg']="";
         }   
        ?>
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">My Profile</div>
      <div class="card-body">
        <form action="cpass.php"  method="post" >
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputName" class="form-control" name="name" value="<?php echo $pv['name']; ?>" required="required" autofocus="autofocus">
              <label for="inputName">Full Name</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputEmail" class="form-control" name="email"value="<?php echo $pv['email']; ?>"required=" " required="required" autofocus="autofocus">
              <label for="inputEmail">Email</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputPassword" class="form-control" name="password" value="<?php echo $pv['password']; ?>" required="required" autofocus="autofocus">
              <label for="inputName">Password</label>
            </div>
          </div>
          
         

          <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block" name="submit">Update Profile</button>
          </div>
         
        </form>
        <div class="text-center">
         
        </div>
      </div>
    </div>
  </div>
      <!-- /.container-fluid -->
<!-- Main close -->

<?php
include 'inc/footer.php';
?>
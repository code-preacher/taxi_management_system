
<?php 
ob_start();
session_start();
include '../inc/checklogin.php';
checkLogin();
include('../inc/config.php');
$fd=mysqli_query($con,"SELECT * FROM user WHERE email='".$_SESSION['email']."'");
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
        if (!empty($_SESSION['smsg'])) {
           echo $_SESSION['smsg'];
           $_SESSION['smsg']="";
         }   
        ?>
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">My Profile</div>
      <div class="card-body">
        <form action="cpass.php" method="post">
          <div class="form-group">
           <div class="form-label-group">
                  <input type="text" id="FullName" name="name" value="<?php echo $pv['name']; ?>" class="form-control" placeholder="FullName" required="required" autofocus="autofocus">
                  <label for="FullName">Fullname</label>
                </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
                  <input type="email" id="Email" class="form-control" name="email" value="<?php echo $pv['email']; ?>" placeholder="Email" required="required">
                  <label for="lastName">Email</label>
                </div>
          </div>
          <div class="form-group">
          <div class="form-label-group">
                  <input type="text" id="Password" name="password" value="<?php echo $pv['password']; ?>" class="form-control" placeholder="Password" required="required">
                  <label for="Password">Password</label>
                </div>
          </div>
          <div class="form-group">
        <div class="form-label-group">
                  <input type="text" id="Phone" name="phone" value="<?php echo $pv['phone']; ?>" class="form-control" placeholder="Phone Number" required="required">
                  <label for="Phone">Phone Number</label>
                </div>
          </div>
          <div class="form-group">
           <div class="form-label-group">
              <input type="text" id="Address" name="address" value="<?php echo $pv['address']; ?>" class="form-control" placeholder="Address" required="required">
              <label for="Address">Address</label>
            </div>
          </div>
          
          <div class="form-group">
        <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
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
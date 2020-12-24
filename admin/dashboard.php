<?php
ob_start();
session_start();
error_reporting(0);
include '../inc/checklogin.php';
include '../inc/config.php';
checkLogin();
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

<!-- Main open -->
      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-users"></i>
                </div>
                <div class="mr-5">
<?php 
$cn=mysqli_query($con,"select * from user");
$nc=mysqli_num_rows($cn);
echo " ALL USERS : ".$nc;

?>
               </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="view-user.php">
                <span class="float-left">View Users</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-book"></i>
                </div>
                <div class="mr-5">
<?php 
$jn=mysqli_query($con,"select * from booking");
$pc=mysqli_num_rows($jn);
echo "ALL BOOKINGS: ".$pc;

?>
               <br><br><br>  </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="view-os.php">
                <span class="float-left">View Bookings</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>

          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-info o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-car"></i>
                </div>
                <div class="mr-5">
<?php 
$jl=mysqli_query($con,"select * from car");
$pl=mysqli_num_rows($jl);
echo "ALL CARS: ".$pl;

?>
               <br><br><br>  </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="view-car.php">
                <span class="float-left">View Car</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>


          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-dark o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-road"></i>
                </div>
                <div class="mr-5">
<?php 
$jp=mysqli_query($con,"select * from routes");
$pp=mysqli_num_rows($jp);
echo "ALL ROUTES: ".$pp;

?>
               <br><br><br>  </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="view-routes.php">
                <span class="float-left">View Routes</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-user"></i>
                </div>
                <div class="mr-5">My Profile</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="profile.php">
                <span class="float-left">View Profile</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-arrow-right"></i>
                </div>
                <div class="mr-5">Logout <br><br><br> </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="../inc/logout.php" data-toggle="modal" data-target="#logoutModal">
                <span class="float-left">Logout</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>


      

      </div>
      <!-- /.container-fluid -->
<!-- Main close -->

<?php
include 'inc/footer.php';
?>
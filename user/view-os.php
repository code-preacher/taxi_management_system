<?php 
ob_start();
session_start();
include '../inc/checklogin.php';
checkLogin();
include('../inc/config.php');
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
          <li class="breadcrumb-item active">View Booking</li>
        </ol>
<?php
               if (!empty($_SESSION['nmsg'])) {
                      echo $_SESSION['nmsg'];
                       $_SESSION['nmsg']="";
               }
         
               ?>


<!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-book"></i>
            MY BOOKING</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Routes</th>
                    <th>Fare</th>
                    <th>Payment Reference</th>
                    <th>Payment Status</th>
                    <th>Delivery Status</th>
                    <th>Car Info</th>
                    <th>Time</th>
                    
                    <th>Date</th>
                    <th>Date of Booking</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Print Receipt</th>
                  </tr>
                </thead>
                
                <tbody>
<?php

 $seat=mysqli_query($con,"SELECT * FROM booking WHERE email='".$_SESSION['email']."' order by id desc");
 $c=0;
 while($dy=mysqli_fetch_array($seat)){
  $c++;
?>
                  <tr>
                   <td><?php echo $c; ?></td>
                   <td><?php echo $dy['routes']; ?></td>
                   <td><?php echo "₦".$dy['price']; ?></td>
              
                    <td><?php echo $dy['payment_ref']; ?></td>
    <td><?php 

if ($dy['payment_status']=='1') {
 echo "<i class='fa fa-check-circle text-success'></i>";
} else {
   echo "<i class='fa fa-times-circle text-danger'></i>";
}

?></td>
                  
    <td><?php 

if ($dy['delivery_status']=='1') {
 echo "<i class='fa fa-check-circle text-success'></i>";
} else {
   echo "<i class='fa fa-times-circle text-danger'></i>";
}

?></td>
                    <td><?php echo $dy['car']; ?></td>
                    <td><?php echo $dy['time']; ?></td>
                   
                    <td><?php echo $dy['date']; ?></td>
                    <td><?php echo $dy['date_created']; ?></td>
                     <td><a href="add-s3.php?id=<?php echo $dy['id']; ?>" onClick="return confirm('Are you sure you want to edit this record?')"><i class="fa fa-edit"></i></a></td>
                     <td><a href="del-os.php?id=<?php echo $dy['id']; ?>" onClick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash"></i></a></td>
                      <td><a href="print-os.php?id=<?php echo $dy['id']; ?>"><i class="fa fa-print"></i></a></td>
              
                    
                  </tr>
                <?php
}
                ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->
<!-- Main close -->

<?php
include 'inc/footer.php';
?>
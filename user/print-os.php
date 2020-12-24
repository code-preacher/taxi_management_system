<?php 
ob_start();
session_start();
include '../inc/checklogin.php';
checkLogin();
include('../inc/config.php');


 $seat=mysqli_query($con,"SELECT * FROM booking WHERE id='".$_GET['id']."' order by id desc");
 $dy=mysqli_fetch_array($seat);
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
          <li class="breadcrumb-item active">Print Booking</li>
        </ol>




   <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="col-lg-12 mt">
          <div class="row content-panel">
            <div class="col-lg-10 col-lg-offset-1">
              <div class="invoice-body">
                
                
                <!-- /pull-right -->
                <div class="clearfix"></div>
                <br>
                <br>
                <br>
                <div class="row">
                  <div class="col-md-9">
                    <h4><?php echo $dy['name']; ?></h4>
                    <address>
                  <strong>Taxi Reservation.</strong><br>
                  234 Great Ave, Suite 600<br>
                  Maitama, CA 94107<br>
                  <abbr title="Phone">P:</abbr> (234) 8168472495
                </address>
                  </div>
                  <!-- /col-md-9 -->
                  <div class="col-md-3">
                    <br>
                    <div>
                      <div class="pull-left"> <b>PAYMENT REFERENCE: </b></div>
                      <div class="pull-right"><?php echo $dy['payment_ref']; ?></div>
                      <div class="clearfix"></div>
                    </div>
                    <div>
                      <!-- /col-md-3 --><br>
                      <div class="pull-left"><b> BOOKED DATE : </b></div>
                      <div class="pull-right"> <?php echo $dy['date_created']; ?> </div>
                      <div class="clearfix"></div>
                    </div>
                    <!-- /row -->
                    <br>
                    <div class="well well-small green">
                      <div class="pull-left"> <b>Fare : </b> </div>
                      <div class="pull-right"> <?php echo "₦".$dy['price']; ?> </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <!-- /invoice-body -->
                </div>
                <!-- /col-lg-10 -->
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width:60px" class="text-center">NAME</th>
                       <th class="text-left">CAR DESCRIPTION</th>
                      <th class="text-left">ROUTE</th>
                      <th style="width:140px" class="text-right">FARE</th>
                      <th style="width:90px" class="text-right">TOTAL</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="text-center"><?php echo $dy['name']; ?></td>
                      <td ><?php echo $dy['car']; ?></td>
                      <td class="text-left"><?php echo $dy['routes']; ?></td>
                      <td class="text-right"><?php echo "₦".$dy['price']; ?></td>
                      <td class="text-right"><?php echo "₦".$dy['price']; ?></td>
                      
                    </tr>
                    <tr>
                     
                      <td colspan="4"><b>TIME OF DEPARTURE :</b>&nbsp;&nbsp;<?php echo $dy['time']; ?>&nbsp;&nbsp;|&nbsp;&nbsp;
                      <b>DATE OF DEPARTURE :</b>&nbsp;&nbsp;<?php echo $dy['date']; ?>

                    </td>
                  
                    
                      
                    </tr>

                    
                    <tr>
                      <td colspan="2" rowspan="4">
                        <h4>Terms and Conditions</h4>
                        <p>Thank you for your patronage. We do expect payment within 2 days, so please process this invoice within that time. .</p>
                      </td>
                      
                    </tr>
                    
                    <tr><td>&nbsp;</td>
                      <td class="text-right no-border">
                        <div class="well well-small green"><strong>Total</strong></div>
                      </td>
                      <td class="text-right"><strong><?php echo "₦".$dy['price']; ?></strong></td>
                    </tr>

                    <tr>
                      <td colspan="4" rowspan="4">
                        <span>Payment Status : 
                          <?php 

if ($dy['payment_status']=='1') {
 echo "<i class='fa fa-check-circle text-success'></i>";
} else {
   echo "<i class='fa fa-times-circle text-danger'></i>";
}

?>
             </span>
             &nbsp;&nbsp;|&nbsp;&nbsp;

                        <span>Delivery Status :
                          <?php 

if ($dy['delivery_status']=='1') {
 echo "<i class='fa fa-check-circle text-success'></i>";
} else {
   echo "<i class='fa fa-times-circle text-danger'></i>";
}

?>
                          
                        </span><br><br>

&nbsp;&nbsp;<button class="btn-primary" onclick="window.print()"><i class="fa fa-print"></i>&nbsp;Print Receipt</button>


                        
                      </td>
                      
                    </tr>
                  </tbody>
                </table>
                <br>
                <br>


              </div>
              <!--/col-lg-12 mt -->
      </section>
      <!-- /wrapper -->
    </section>



      </div>
      <!-- /.container-fluid -->
<!-- Main close -->

<?php
include 'inc/footer.php';
?>
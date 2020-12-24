<?php
session_start();
error_reporting(0);
include '../inc/checklogin.php';
checkLogin();
?>
<?php
include("../inc/config.php");


$bd=mysqli_query($con,"SELECT * FROM booking WHERE id='".$_GET['id']."'");
$vv=mysqli_fetch_array($bd);


if(isset($_POST['submit'])){

  $pn=$_POST['pn'];
  $ck=$_POST['ck'];
  $tm=$_POST['time'];
  $dt=$_POST['date'];
  $rf=str_shuffle(rand(uniqid(),99999999));


$ty=mysqli_query($con,"SELECT * FROM routes WHERE routes='".$_POST['pn']."'");
$tx=mysqli_fetch_array($ty);
$pr=$tx['price'];
$date=date("d-m-y @ g:i A");

$fd=mysqli_query($con,"SELECT * FROM user WHERE email='".$_SESSION['email']."'");
$pv=mysqli_fetch_array($fd);
$cn=$pv['name'];
$em=$pv['email'];

$da=mysqli_query($con,"update booking set name='$cn',email='$em',routes='$pn',price='$pr',car='$ck',time='$tm',date='$dt',date_created='$date' where id='".$_GET['id']."' ") ;

if ($da) {
$_SESSION['nmsg']='<div class="alert alert-success hide alert-dismissible fade show" role="alert">
  <strong>Booking was successful Updated, car will be assigned to you in a short while....</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
header("location:view-os.php");
} else {
  $_SESSION['nmsg']='<div class="alert alert-danger hide alert-dismissible fade show" role="alert">
  <strong>Error Updating Booking....</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
header("location:view-os.php");
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

<div class="container-fluid col-lg-12">
  <?php
               if (!empty($_SESSION['qmsg'])) {
                      echo $_SESSION['qmsg'];
                       $_SESSION['qmsg']="";
               }
         
               ?>
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Edit Taxi Booking </div>
      <div class="card-body">
       <form action="#" method="post">
      
           <div class="form-group">
 
              <label>Please choose routes of choice below : </label>           
              <select name="pn" required="required" autofocus="autofocus" class="form-control" style="height: 60px;">
                  <option value="<?php echo $vv['routes'];  ?>"><?php echo $vv['routes'].' ( Fare: ₦'.$vv['price'].' )';  ?></option>
                <?php
                $rt=mysqli_query($con,"select * from routes order by id desc");
                while ($f=mysqli_fetch_array($rt)) {
               ?>
                <option value="<?php echo $f['routes'];  ?>"><?php echo $f['routes'].' ( costs: ₦'.$f['price'].' )';  ?></option>
              
<?php } ?>
              </select>
            
          </div>

          <div class="form-group">
         <label>Time of Departure : Format (hh:mm:ii) eg 12:20:pm</label>
                  <input type="time" id="Time" name="time" class="form-control" value="<?php echo $vv['time'];  ?>" required="required" autofocus="autofocus">
              </div>

<div class="form-group">
  <label for="Date">Date of Departure : Format (mm/dd/yy) eg 09/03/19</label>
                  <input type="date" id="Date" name="date" class="form-control" value="<?php echo $vv['date'];  ?>" required="required" autofocus="autofocus">
                </div>

                 <div class="form-group">
 
              <label>Please choose driver/car to allocate below : </label>           
              <select name="ck" required="required" autofocus="autofocus" class="form-control" style="height: 60px;">
                <option value="<?php echo $vv['car'];  ?>"><?php echo $vv['car'];  ?></option>
                <?php
                $rt=mysqli_query($con,"select * from car order by id desc");
                while ($f=mysqli_fetch_array($rt)) {
               ?>
                <option value="<?php echo 'Car : '.$f['name'].' '.$f['model'].',Driver : '.$f['dname'].' '.$f['dno'];  ?>"><?php echo 'Car : '.$f['name'].' '.$f['model'].', Driver : '.$f['dname'].' : '.$f['dno'];  ?></option>
              
<?php } ?>
              </select>
            
          </div>


          </div>



         
<br/>
          <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block" name="submit">Update</button>
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
<?php
session_start();
error_reporting(0);
include '../inc/checklogin.php';
checkLogin();
?>
<?php
include("../inc/config.php");


$ty=mysqli_query($con,"SELECT * FROM booking WHERE id='".$_GET['id']."'");
$tx=mysqli_fetch_array($ty);


if(isset($_POST['submit'])){
extract($_POST);
  $date=date("d-m-y @ g:i A");
$da=mysqli_query($con,"update booking set car='$pn' where id='".$_GET['id']."' ");
if ($da) {
$_SESSION['nmsg']='<div class="alert alert-success hide alert-dismissible fade show" role="alert">
  <strong>Car/Driver has been Allocated....</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
header("location:view-os.php");
} else {
  $_SESSION['nmsg']='<div class="alert alert-danger hide alert-dismissible fade show" role="alert">
  <strong>Error Allocating Car/Driver....</strong>
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
      <div class="card-header">Allocate Driver/Car</div>


      <div class="card-body">
       <form action="#" method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputName" class="form-control" value="<?php echo $tx['name'] ?>" disabled="disabled" required="required" autofocus="autofocus">
              <label for="inputName">Customer Name</label>
            </div>
          </div>
         
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputPrice" class="form-control" value="<?php echo $tx['routes'] ?>" disabled="disabled" required="required" autofocus="autofocus">
              <label for="inputPrice">Route</label>
            </div>
          </div>

           <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="Car" class="form-control" value="<?php echo $tx['car'] ?>" disabled="disabled" required="required" autofocus="autofocus">
              <label for="Car">Selected Driver/Car</label>
            </div>
          </div>




           <div class="form-group">
 
              <label>Please allocate driver/car below : </label>           
              <select name="pn" required="required" autofocus="autofocus" class="form-control" style="height: 60px;">
                <?php
                $rt=mysqli_query($con,"select * from car order by id desc");
                while ($f=mysqli_fetch_array($rt)) {
               ?>
                <option value="<?php echo 'Car : '.$f['name'].' '.$f['model'].',Driver : '.$f['dname'].' '.$f['dno'];  ?>"><?php echo 'Car : '.$f['name'].' '.$f['model'].', Driver : '.$f['dname'].' : '.$f['dno'];  ?></option>
              
<?php } ?>
              </select>
            
          </div>

          <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block" name="submit">Allocate</button>
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
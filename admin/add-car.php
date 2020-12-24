<?php
session_start();
error_reporting(0);
include '../inc/checklogin.php';
checkLogin();
?>
<?php
include("../inc/config.php");
if(isset($_POST['submit'])){
extract($_POST);
$cid='TAXI_'.str_shuffle(rand(uniqid(),99999999));
$date=date("d-m-y @ g:i A");
$da=mysqli_query($con,"insert into car(cid,name,model,color,dname,dno,date) values('$cid','$name','$model','$color','$dname','$dno','$date')");
if ($da) {
$_SESSION['qmsg']='<div class="alert alert-success hide alert-dismissible fade show" role="alert">
  <strong>Car was created successfully....</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
} else {
  $_SESSION['qmsg']='<div class="alert alert-danger hide alert-dismissible fade show" role="alert">
  <strong>Error Adding Car....</strong>
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

<div class="container-fluid col-lg-12">
  <?php
               if (!empty($_SESSION['qmsg'])) {
                      echo $_SESSION['qmsg'];
                       $_SESSION['qmsg']="";
               }
         
               ?>
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Add Car</div>

      <div class="card-body">
       <form action="#" method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputName" class="form-control" name="name" placeholder="Car Name" required="required" autofocus="autofocus">
              <label for="inputName">Car Name</label>
            </div>
          </div>
         
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputModel" class="form-control" name="model" placeholder="Car Model" required="required" autofocus="autofocus">
              <label for="inputModel">Car Model</label>
            </div>
          </div>

            <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputColor" class="form-control" name="color" placeholder="Car Color" required="required" autofocus="autofocus">
              <label for="inputColor">Car Color</label>
            </div>
          </div>

            <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputDname" class="form-control" name="dname" placeholder="Car Driver Name" required="required" autofocus="autofocus">
              <label for="inputDname">Car Driver Name</label>
            </div>
          </div>


            <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputDno" class="form-control" name="dno" placeholder="Car Driver Number" required="required" autofocus="autofocus">
              <label for="inputDno">Car Driver Number</label>
            </div>
          </div>

          <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block" name="submit">Add Car</button>
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
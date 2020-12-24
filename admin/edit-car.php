<?php
session_start();
error_reporting(0);
include '../inc/checklogin.php';
checkLogin();
$id=$_GET['id'];
?>
<?php
include("../inc/config.php");

$ax=mysqli_query($con,"SELECT * FROM car where id='$id'");
$bx=mysqli_fetch_array($ax);

if(isset($_POST['submit'])){
extract($_POST);
  $date=date("d-m-y @ g:i A");
$da=mysqli_query($con,"update car set name='$name',model='$model',color='$color',dname='$dname',dno='$dno' where id='$id'  ");
if ($da) {
$_SESSION['umsg']='<div class="alert alert-success hide alert-dismissible fade show" role="alert">
  <strong>Car was updated successfully....</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
header("location:view-car.php");
} else {
  $_SESSION['umsg']='<div class="alert alert-danger hide alert-dismissible fade show" role="alert">
  <strong>Error updating Car....</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
header("location:view-car.php");
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

    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Update Car Info</div>

      <div class="card-body">
       <form action="#" method="post">

         <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputName" class="form-control" name="name" value="<?php echo $bx['name'] ?>"  required="required" autofocus="autofocus">
              <label for="inputName">Car Name</label>
            </div>
          </div>
         
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputModel" class="form-control" name="model" value="<?php echo $bx['model'] ?>" required="required" autofocus="autofocus">
              <label for="inputModel">Car Model</label>
            </div>
          </div>

            <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputColor" class="form-control" name="color" value="<?php echo $bx['color'] ?>" required="required" autofocus="autofocus">
              <label for="inputColor">Car Color</label>
            </div>
          </div>

            <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputDname" class="form-control" name="dname" value="<?php echo $bx['dname'] ?>" required="required" autofocus="autofocus">
              <label for="inputDname">Car Driver Name</label>
            </div>
          </div>

          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputDno" class="form-control" name="dno" value="<?php echo $bx['dno'] ?>" required="required" autofocus="autofocus">
              <label for="inputDno">Car Driver Number</label>
            </div>
          </div>

        
          <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block" name="submit">Update Car</button>
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
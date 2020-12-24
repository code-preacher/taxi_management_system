<?php
session_start();
error_reporting(0);
include '../inc/checklogin.php';
checkLogin();
$id=$_GET['id'];
?>
<?php
include("../inc/config.php");

$ax=mysqli_query($con,"SELECT * FROM routes where id='$id'");
$bx=mysqli_fetch_array($ax);

if(isset($_POST['submit'])){
extract($_POST);
  $date=date("d-m-y @ g:i A");
$da=mysqli_query($con,"update routes set routes='$n',price='$pr',date='$date' where id='$id'  ");
if ($da) {
$_SESSION['umsg']='<div class="alert alert-success hide alert-dismissible fade show" role="alert">
  <strong>Route was updated successfully....</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
header("location:view-routes.php");
} else {
  $_SESSION['umsg']='<div class="alert alert-danger hide alert-dismissible fade show" role="alert">
  <strong>Error updating Route....</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
header("location:view-routes.php");
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
      <div class="card-header">Update Route</div>

      <div class="alert alert-info hide alert-dismissible fade show" role="alert">
  <strong>Updating route name should be in this format Source-Destination eg Highlevel-Wadata....</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div>

      <div class="card-body">
       <form action="#" method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputName" class="form-control" name="n" value="<?php echo $bx['routes'] ?>" placeholder="Route Name" required="required" autofocus="autofocus">
              <label for="inputName">Route Name</label>
            </div>
          </div>
         
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputPrice" class="form-control" name="pr"value="<?php echo $bx['price'] ?>" placeholder="Route Fare" required="required" autofocus="autofocus">
              <label for="inputPrice">Route Fare</label>
            </div>
          </div>

          <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block" name="submit">Update Route</button>
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
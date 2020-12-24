
<?php 
ob_start();
session_start();
include '../inc/checklogin.php';
checkLogin();
include('../inc/config.php');

 if(isset($_POST['comment'])) {
    $chat=$_POST['chat'];
    $date=date("d-m-y @ g:i A");
    $ad='Admin';
   $q = $con->prepare('insert into complain (name,chat,date) values (?, ?, ?)');
    $q->bind_param('sss',$ad,$chat,$date);
    $q->execute() ; }
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
      <div class="card-header">Reply Complain</div>
      <div class="card-body">

 <form action="#" method="post">
    
    <br>

     
        <textarea name="chat" cols="60" rows="3" required="required" class="input" placeholder="Reply complain"></textarea>


      
        <label>
        <input type="submit" name="comment"  value="Reply" class="submit">
        </label>

</div>
    </form>  <br><br>
   
 
<?php
  $seat=mysqli_query($con,"SELECT * FROM complain order by id desc");
 while($row3=mysqli_fetch_array($seat)){
 $chat=$row3['chat'];    
  $name=$row3['name'];
 $date=$row3['date'];
?>

                <div class="col-lg-10 offset-lg-1">
                    <div class="card">
                        <div style="padding: 2px;">
                           <?php echo $chat."<br/>"."<hr/><div class='offset-lg-6'>".$name."&nbsp;&nbsp;&nbsp;@&nbsp;&nbsp;".$date."</div>"; ?>

                        </div>
                    </div><br/><br/>
                </div>
                
               
<?php          
 }
         
?>
 
    </div>
    </div>
  </div>

      <!-- /.container-fluid -->
<!-- Main close -->

<?php
include 'inc/footer.php';
?>
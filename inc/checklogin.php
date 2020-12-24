<?php
function checkLogin()
{
	if($_SESSION['login']=="")
	{	
	$_SESSION['msg']='<div class="alert alert-danger hide alert-dismissible fade show" role="alert">
  <strong>You must login to access requested page...</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';

		header("Location: ../login.php");
	}

}

?>
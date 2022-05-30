<?php
require 'configs/db.php';

$txtEmail = '';

if(isset($_GET['txtEmail'])) {
$txtEmail = $_GET['txtEmail'];




} // end of txtEmail

$passchecker = '';
$alert = '';
if(isset($_POST['btnResetPwd'])) {
$txtNewPwd = $_POST['txtNewPwd'];
$txtConfirmPwd = $_POST['txtConfirmPwd'];


if($txtNewPwd != $txtConfirmPwd) {
$passchecker = 'Password does not much please try again.';
$alert = 'alert alert-danger';
} else if($txtNewPwd == $txtConfirmPwd) {

	$updatePwd ="UPDATE user SET user_password='$txtNewPwd' WHERE user_email='$txtEmail'";

if ($conn->query($updatePwd) === TRUE) {
  $passchecker = "Record updated successfully";
  $alert = "alert alert-success";
} else {
  echo "Error updating record: " . $conn->error;
}

}


} // END OF BTN RESET P



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title>Reset Password</title>
	<style type="text/css">
	  	.reset-main-container {
	  		width: 50%;
	  		margin:  auto;
	  		box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
	  		padding: 8px;
	  	}

	  	.img-reset {
	  		width: 50%;
	  	}

	  	@media only screen and (max-width: 600px) {
   .reset-main-container {
   width: 100%;
  }
}

	  </style>
	</style>
</head>
<body>



<div class="reset-main-container">
	<div class="<?php echo $alert; ?>" id="alertTimeout"><h4><?php echo $passchecker; ?></h4></div>
	<div class="img-child">
		<img src="local_img/laligaLogo.png" alt="laliga logo" class="img-reset">
	</div>
	<div>
		<form class="form-control" method="POST" action="">
		<label><h5>Enter the new password</h5></label>
		<br>
		<label><h5>This is a response to attempt change password by email: <?php echo $txtEmail; ?></h5></label>
		<br>
		<input type="password" name="txtNewPwd" class="form-control" required placeholder="enter new password..">
		<br>
		<input type="password" name="txtConfirmPwd" class="form-control" required placeholder="confirm password..">
		<br>	
		<input type="submit" name="btnResetPwd" value="Save" class="btn btn-outline-primary">
	</form>
	</div>
</div>



<script type="text/javascript">
	
	setTimeout(function() {
		document.getElementById("alertTimeout").style.display = 'none';
	}, 4000);

</script>

</body>
</html>
<?php include 'inc/header.php'; ?>

<?php 
session_start();


$alertLog = '';
$alertClass = '';
$txtLogUser = '';
$txtLogPwd = '';
if(isset($_POST['btnLogin'])) {
$txtLogUser = trim($_POST['txtLogUser']);
$txtLogPwd = trim($_POST['txtLogPwd']);

// CHECK IF DATA EXIST 
$sqlCheckUser = "SELECT * FROM users WHERE user_username='$txtLogUser' AND user_pass='$txtLogPwd'";
$sqlQueryLogin = mysqli_query($conn, $sqlCheckUser);
$sqlResultCheck = mysqli_num_rows($sqlQueryLogin);


if($sqlResultCheck > 0) {

	// query user logins 
	$sqlLog = "SELECT * FROM users WHERE user_username='$txtLogUser'";
	$queryLog = mysqli_query($conn, $sqlLog);
	$resultLog = mysqli_fetch_assoc($queryLog);
	echo $resultLog['user_type'];

	if ($resultLog['user_type'] == 'Player') {
		$_SESSION['user_id'] = $resultLog['user_id'];
		$_SESSION['user_type'] = $resultLog['user_type'];
		$_SESSION['user_username'] = $resultLog['user_username'];
		$_SESSION['user_email'] = $resultLog['user_email'];
		$_SESSION['user_firstname'] = $resultLog['user_firstname'];
		$_SESSION['user_lastname'] = $resultLog['user_lastname'];
		$_SESSION['user_address'] = $resultLog['user_address'];
		$_SESSION['user_subs'] = $resultLog['user_subs'];
		$_SESSION['user_dob'] = $resultLog['user_dob'];
		$_SESSION['user_brgy'] = $resultLog['user_brgy'];

		header("Location: player_home_ses.php");

	} else if ($resultLog['user_type'] == 'Scout') {
		$_SESSION['user_id'] = $resultLog['user_id'];
		$_SESSION['user_type'] = $resultLog['user_type'];
		$_SESSION['user_username'] = $resultLog['user_username'];
		$_SESSION['user_email'] = $resultLog['user_email'];
		$_SESSION['user_firstname'] = $resultLog['user_firstname'];
		$_SESSION['user_lastname'] = $resultLog['user_lastname'];
		$_SESSION['user_address'] = $resultLog['user_address'];
		$_SESSION['user_subs'] = $resultLog['user_subs'];
		$_SESSION['user_dob'] = $resultLog['user_dob'];
		$_SESSION['user_brgy'] = $resultLog['user_brgy'];
		header("Location: scout_home_ses.php");

	}



	
 } elseif($sqlResultCheck <= 0) {
	$alertClass = "alert alert-danger";
 	$alertLog = "Invalid user information. Please try again";
}




} // END OF BTN LOGIN




 ?>



<style type="text/css">
.log-main-container {
	width: 50%;
	margin: auto;
	padding: 8px;
	box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
}

.img-container {
	text-align: center;
 justify-content: center;
}
.child-img-container {
width: 10em;
border-radius: 50%;

}


@media only screen and (max-width: 500px) {
  .log-main-container  {
    width: 100%;
	margin: auto;
  }
}

</style>
<br>
<br>


<div class="log-main-container">
	<div class="<?php echo $alertClass; ?>" role="alert">
   		<?php echo $alertLog; ?>
	</div>
	<div>
		<div class="img-container">
			<!-- image goes here -->
			<img src="assets/laligaLogo.png" alt="laliga logo" class="child-img-container">
		</div>
		<form class="form-control" action="" method="POST">
			<br>	
			<label>Username:</label>
			<input type="text" name="txtLogUser" class="form-control" required placeholder="enter username">
			<br>
			<label>Password:</label>
			<input type="password" name="txtLogPwd" class="form-control" required placeholder="enter password">
			<br>
			<input type="submit" name="btnLogin" value="Sign in" class="btn btn-outline-primary">
		</form>
	</div>
</div>



<?php include 'inc/footer.php'; ?>
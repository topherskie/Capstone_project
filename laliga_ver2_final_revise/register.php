<?php include 'inc/header.php'; ?>

<?php 	

$brgy = "SELECT * FROM brgy";
$brgyQuery = mysqli_query($conn, $brgy);






$alert = ' ';
$alertMsg = ' ';
if(isset($_POST['btnRegister'])) {
$txtUserName = $_POST['txtUserName'];
$txtEmail = $_POST['txtEmail'];
$txtFirstName = $_POST['txtFirstName'];
$txtMi = $_POST['txtMi'];
$txtLastName = $_POST['txtLastName'];
$txtPwd = $_POST['txtPwd'];
$txtUserType = $_POST['txtUserType'];
$txtDob = $_POST['txtDob'];
$txtBrgy = $_POST['txtBrgy'];



// check if username or email exist in the system - 
$sqlReg = "SELECT * FROM users WHERE user_username='$txtUserName' OR user_email='$txtEmail'";
$sqlCheckTbl = mysqli_query($conn, $sqlReg);
$sqlResultCheck = mysqli_num_rows($sqlCheckTbl);

if($sqlResultCheck > 0) {
	//echo 'data already exist';
	$alert = 'alert alert-danger';
	$alertMsg = 'The Username or Email Already Exist, Please try again.';
} elseif ($sqlResultCheck <= 0) {
	$sqlRegUser = "INSERT INTO users (user_username, user_pass, user_firstname, user_mi, user_lastname, user_email, user_type, user_dob, user_brgy) VALUES('$txtUserName', '$txtPwd', '$txtFirstName', '$txtMi', '$txtLastName', '$txtEmail', '$txtUserType', '$txtDob', '$txtBrgy')";

	if ($conn->query($sqlRegUser) === TRUE) {
			$alert = 'alert alert-success';
  		$alertMsg = "Successfully Registered.";
		} else {
 	 echo "Error: " . $sql . "<br>" . $conn->error;
	}
} // end if else if



} // END OF btnRegister


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
width:  10em;
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
	<div class="<?php echo $alert; ?>" role="alert">
  		<?php echo $alertMsg; ?>
	</div>
	<div>
		<div class="img-container">
			<!-- image goes here -->
			<img src="assets/laligaLogo.png" alt="laliga logo" class="child-img-container">
		</div>
		<form class="form-control" action="" method="POST">
			<br>	
			<label>Username:</label>
			<input type="text" name="txtUserName" class="form-control" placeholder="enter username" required>
			<br>
			<label>Email:</label>
			<input type="email" name="txtEmail" class="form-control" placeholder="enter email" required>
			<br>
			<label>Firstname:</label>
			<input type="text" name="txtFirstName" class="form-control" placeholder="enter firstname" required>
			<br>
			<label>MI:</label>
			<input type="text" name="txtMi" class="form-control" placeholder="optional MI" required>
			<br>
			<label>Lastname:</label>
			<input type="text" name="txtLastName" class="form-control" placeholder="enter lastname" required>
			<br>
			<label>Password:</label>
			<input type="password" name="txtPwd" class="form-control" placeholder="enter password" required>
			<br>
			<label>Date of birth:</label>
			<input type="date" name="txtDob" class="form-control" placeholder="enter dob" required>
			<br>

			<label>Barangay:</label>
			<select name="txtBrgy" class="form-control">
				<?php while($rowBrgy = $brgyQuery->fetch_assoc()): ?>
					<option value="<?php echo $rowBrgy['brg_name']; ?>"><?php echo $rowBrgy['brg_name']; ?></option>
				<?php endwhile; ?>
			</select>
			<br>

			<label>Register as Scout / Player</label>
			<select name="txtUserType" class="form-control">
				<option value="Player">Player</option>
				<option value="Scout">Scout</option>
			</select>
			<br>	
			<input type="submit" name="btnRegister" value="Register" class="btn btn-outline-primary" required>
		</form>
	</div>
</div>

<br>
<br>
<br>	




<?php include 'inc/footer.php'; ?>
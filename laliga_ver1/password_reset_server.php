<?php 

require 'configs/db.php';

$sentEmail = '';
if(isset($_GET['btnResetPwd'])) {
$txtEmailPwd = $_GET['txtEmailPwd'];

// check if email exist 

$checkEmailExist = "SELECT * FROM user WHERE user_email='$txtEmailPwd'";
$queryEmailData = mysqli_query($conn, $checkEmailExist);
$checkEmailResult = mysqli_num_rows($queryEmailData);

if($checkEmailResult <= 0) {
	echo 'Email Does not exist';
} else {
  $checkEmailSet = "SELECT * FROM user WHERE user_email='$txtEmailPwd'";
  $queryEmailDataSets = mysqli_query($conn, $checkEmailSet);
  $fetchEmail = mysqli_fetch_assoc($queryEmailDataSets);
  $sentEmail = $fetchEmail['user_email'];



}




} // END OF MAIN BTN RESET PASSWORD


 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>Reset Password Link</title>
 	 	<script src="https://smtpjs.com/v3/smtp.js"></script>
 </head>
 <body>
 



<!-- edit the href base on live link -->
<!-- this will route to password_reset_confirm.php with a get email to locate the acc and reset password -->
 <script type="text/javascript">
const sentEmail = "<?php echo $sentEmail; ?>";

const resetPwd = `
	<div>
		<h1>Laliga Pilipinas</h1>
		<br>
		<a href='password_reset_confirm.php?txtEmail=${sentEmail}'>Click link to reset password</a>
		<p>Email sample template</p>
	</div>
`;

 Email.send({
    Host : "smtp.elasticemail.com",
    Username : "tophersanchez777@gmail.com",
    Password : "E51A979BF7F40C7BC792FD2D7EEEA1BC8C2E",
    To : sentEmail,
    From : "tophersanchez777@gmail.com",
    Subject : "Accept Match Request Laliga Pilipinas",
    Body : resetPwd,
	}).then((message) => {
  	console.log(message);
 });



 </script>
 </body>
 </html>
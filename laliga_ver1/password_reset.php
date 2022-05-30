<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Password reset</title>
	  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
</head>
<body>
<br>

<div class="reset-main-container">
	<div class="img-child">
		<img src="local_img/laligaLogo.png" alt="laliga logo" class="img-reset">
	</div>
	<div>
		<form class="form-control" method="GET" action="password_reset_server.php">
		<label><h5>Enter email to send link Reset Password:</h5></label>
		<br>
		<input type="email" name="txtEmailPwd" class="form-control" required placeholder="enter existing email..">
		<br>	
		<input type="submit" name="btnResetPwd" value="Send" class="btn btn-outline-primary">
	</form>
	</div>
</div>


</body>
</html>
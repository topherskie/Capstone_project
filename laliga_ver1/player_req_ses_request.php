
<?php 
require "configs/db.php";
require "configs/server.php"; 
$sesUserType = $_SESSION['user_type'];
$sesUser = $_SESSION['user_username'];
$sesIdno =  $_SESSION['user_idno'];
$sesFname = $_SESSION['user_fname'];
$sesLname = $_SESSION['user_lname'];
$sesUserEmail = $_SESSION['user_email'];
echo $sesIdno;
echo $sesUser;
echo $sesUserType;
echo $sesUserEmail;
	
$sqlMatchRequest = "SELECT * FROM match_requesters WHERE user_idno='$sesIdno'";
$sqlMr = mysqli_query($conn, $sqlMatchRequest);






 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Player Requests</title>
	

	<script src="https://smtpjs.com/v3/smtp.js"></script>
	<style type="text/css">
		.re-req-container {
			padding: 8px;
			width: 50%;
			margin:  auto;
			box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
		}

		@media only screen and (max-width: 600px) {
  .re-req-container {
    width: 100%;
  }
} /*end of media quries*/

	</style>
</head>
<body>
<div><h1>Player Request</h1></div>




	<?php while($mrRows = $sqlMr->fetch_assoc()): ?>
		<?php if($mrRows['mr_status'] == 'pending'): ?> 
		<div class="re-req-container">
			<div>
				<p>Match ID: <?php echo $mrRows['mr_idno']; ?></p>
				<p>Player requester name: <?php echo $mrRows['ses_fullname']; ?></p>
				<p>Desc: <?php echo $mrRows['cm_about']; ?></p>
				<p>Match date: <?php echo $mrRows['mr_date_requested']; ?></p>
				<p>Match status: <?php echo $mrRows['mr_status']; ?></p>
			</div>
		
		
		
		
		<form action="player_match_accept_req.php" method="POST" class="form-group">
			<input type="hidden" name="matchCmIdno" value="<?php echo $mrRows['cm_idnos']; ?>">	
			<input type="hidden" name="matchReqIdno" value="<?php echo $mrRows['requester_idno']; ?>">
			<input type="hidden" name="cmAfullname" value="<?php echo $mrRows['cm_fullname']; ?>">		
			<input type="hidden" name="sesAfullname" value="<?php echo $mrRows['ses_fullname']; ?>">	
			<input type="hidden" name="reAemail" value="<?php echo $mrRows['requester_email']; ?>">	
			<input type="submit" name="btnAcceptMatch" class="btn btn-outline-primary" value="Accept" id="btnAcceptData">
		</form>

<!-- decline match -->
		<form action="player_match_decline_req.php" method="GET" class="form-group">
			<input type="hidden" name="mrIdno" value="<?php echo $mrRows['mr_idno']; ?>">	
			<input type="hidden" name="sesFullname" value="<?php echo $mrRows['ses_fullname']; ?>">	
				<input type="hidden" name="reqEmail" value="<?php echo $mrRows['requester_email']; ?>">	
				<input type="hidden" name="cmFullname" value="<?php echo $mrRows['cm_fullname']; ?>">	
				<input type="hidden" name="cmAbout" value="<?php echo $mrRows['cm_about']; ?>">	
			<input type="submit" name="btnRemoveRequest"  id="sendMail" class="btn btn-outline-primary profile-form" value="Decline" id="Decline">
		</form>

	</div>
<?php elseif($mrRows['mr_status'] == 'Accept'): ?>	

	<div class="re-req-container">
			<div>
				<p>Match ID: <?php echo $mrRows['mr_idno']; ?></p>
				<p>Player name: <?php echo $mrRows['ses_fullname']; ?></p>
				<p>Desc: <?php echo $mrRows['cm_about']; ?></p>
				<p>Match date: <?php echo $mrRows['mr_date_requested']; ?></p>
			    <p class="btn btn-success">Match status: <?php echo $mrRows['mr_status']; ?></p>
			</div>
		</div>


 

	<?php endif; ?>		
	<?php endwhile; ?>	
</div>



<script type="text/javascript">
		 const btnAcceptData = document.getElementById('btnAcceptData');
	 btnAcceptData.addEventListener("click", function() {
	 	alert("Match Accepted!");
	 });






</script>


</body>
</html>
<?php 
require "configs/db.php";
require "configs/server.php"; 
$sesUserType = $_SESSION['user_type'];
$sesUser = $_SESSION['user_username'];
$sesIdno =  $_SESSION['user_idno'];
$sesFname = $_SESSION['user_fname'];
$sesLname = $_SESSION['user_lname'];
$fullname = $sesFname. ' ' . $sesLname;
echo $sesIdno;
echo $sesUser;
echo $sesUserType;
echo $fullname;


$sqlMatchRequest = "SELECT * FROM match_requesters WHERE requester_idno='$sesIdno'";
$sqlMr = mysqli_query($conn, $sqlMatchRequest);
//$resultMr = mysqli_fetch_assoc($sqlMr);
//print_r($resultMr);

//echo $resultMr['mr_status'];






// Delete record
if(isset($_POST['btnRemoveRequest'])) {

	$matchMrIdno = $_POST['matchMrIdno'];
	$matchReqIdno = $_POST['matchReqIdno'];


	$sqlDeleteMR = "DELETE FROM match_requesters WHERE mr_idno='$matchMrIdno' AND requester_idno='$matchReqIdno'";

	if ($conn->query($sqlDeleteMR) === TRUE) {
 		 echo "Record deleted successfully";
 		 header("location: profile_ses_state.php");
		} else {
  		echo "Error deleting record: " . $conn->error;
	}

}


 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>Player Request Render</title>
	<style type="text/css">
		.re-match-container {
			padding: 8px;
			width: 50%;
			margin:  auto;
			box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
		}

		@media only screen and (max-width: 600px) {
  .re-match-container {
    width: 100%;
  }
} /*end of media quries*/

	</style>
	
</head>
<body>
<h1>hello players</h1>


<div>
	<?php while($mrRows = $sqlMr->fetch_assoc()): ?>
		<?php if($mrRows['mr_status'] == 'pending'): ?> 
			<div class="re-match-container">

		<div class="re-match-container">
			<div>
				<p>Match ID: <?php echo $mrRows['mr_idno']; ?></p>
				<p>Player name: <?php echo $mrRows['cm_fullname']; ?></p>
				<p>Desc: <?php echo $mrRows['cm_about']; ?></p>
				<p>Match date: <?php echo $mrRows['mr_date_requested']; ?></p>
				<p>Match status: <?php echo $mrRows['mr_status']; ?></p>
			</div>
		</div>
			<br>

		<form action="player_req_ses_match.php" method="POST" class="form-group">
			<input type="hidden" name="matchMrIdno" value="<?php echo $mrRows['mr_idno']; ?>">	
			<input type="hidden" name="matchReqIdno" value="<?php echo $mrRows['requester_idno']; ?>">	
			<input type="submit" class="btn btn-outline-primary" name="btnRemoveRequest" value="Cancel Request" id="btnAlertRemoval">
		</form>

	</div>
		<?php elseif($mrRows['mr_status'] == 'Accept'): ?>	
		
		
		<div class="re-match-container">
			<div>
				<p>Match ID: <?php echo $mrRows['mr_idno']; ?></p>
				<p>Player name: <?php echo $mrRows['cm_fullname']; ?></p>
				<p>Desc: <?php echo $mrRows['cm_about']; ?></p>
				<p>Match date: <?php echo $mrRows['mr_date_requested']; ?></p>
			    <p class="btn btn-success">Match status: <?php echo $mrRows['mr_status']; ?></p>
			</div>
		</div>

		<?php endif; ?>		
		
	<?php endwhile; ?>	
</div>



<script type="text/javascript">
	
	const btnAlertRemoval = document.getElementById("btnAlertRemoval");

	btnAlertRemoval.addEventListener("click", function() {
		alert("Remove Successfully!");
	})


</script>
</body>
</html>
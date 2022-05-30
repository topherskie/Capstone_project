<?php include 'inc/header_login_state.php'; ?>
<?php 	
echo  $sesIdno . "<BR>";
  echo $sesUser . "<BR>";;
  echo  $sesUserType . "<BR>";
  echo $sesFname;
  echo $sesLname;

  $eventId = '';
 
  if(isset($_GET['eventId'])) {
    $eventId = $_GET['eventId'];
  }
$eventId;
  

  $sqlTeams = "SELECT * FROM teams WHERE event_idno='$eventId'";
  $sqlteamQuery = mysqli_query($conn, $sqlTeams);






// use to calculate final score 
  $team_Idno = [];
  $sqlFinalTeam = "SELECT * FROM teams WHERE event_idno='$eventId'";
  $sqlFinalTeamQuery = mysqli_query($conn, $sqlFinalTeam);
  
  
  while($rowTeamIdno = $sqlFinalTeamQuery->fetch_assoc()) {
  	array_push($team_Idno, $rowTeamIdno['team_id']);
  }

  // $_SESSION['team1'] = $team_Idno[0];
  // $_SESSION['team2'] = $team_Idno[1];
  // $_SESSION['team3'] = $team_Idno[2];
  // $_SESSION['team4'] = $team_Idno[3];
  $team_Idno[0];
  $team_Idno[1];
 $team_Idno[2];
  $team_Idno[3];


  ?>

  <!DOCTYPE html>
  <html>
  <head>
  	<meta charset="utf-8">
  	<title>Single Elimnation Round</title>
  	<style type="text/css">
  		.teams-main-container {
  			display: flex;
  			padding: 8px;
  			margin:  9px;

  		}

  		.child-card {
  			width: 50%;
  			text-align: center;
  		}

  		.img-logo {
  			  height: 40%;
  			  width: 100%;
  		}

  		.anal-container {
  			text-align: center;
  		}

  	@media only screen and (max-width: 600px) {
  		*{
  			box-sizing: border-box;
  		}
 .teams-main-container {
    display: block;
    width: 100%;
    margin: auto;
  }

  .child-card {

  			width: 100%;
  		}

} /*end of media*/	


  	</style>
  </head>
  <body>
    $eventId
<div class="anal-container">
  <a href="<?php echo "calcLoader_score_ses_state.php?eventId=".$eventId; ?>" class="btn btn-outline-success">Calculate Scores</a>
</div>
 <div class="teams-main-container">
 	<?php while($rowTeams = $sqlteamQuery->fetch_assoc()): ?>
  		<div class="card child-card">
  		<img class="card-img-top img-logo" src="<?php echo "team_logo/".$rowTeams['team_logo']; ?>" alt="Card image cap">
  			<div class="card-body">

    			<form action="tour_score_update_ses_state.php" method="POST" class="form-control">
    				<input type="hidden" name="txtTeam_id" value="<?php echo $rowTeams['team_id']; ?>">
					<div><h4>Total Pts: </h4>
						<?php 
							$teamTotalPoints = $rowTeams['1st_quarter'] +  $rowTeams['2nd_quarter'] + $rowTeams['3rd_quarter'] + $rowTeams['4th_quarter'];

							echo $teamTotalPoints;

						 ?>
					</div>
    				<label>1st Quarter</label>
    				<input type="number" name="oneQ" value="<?php echo $rowTeams['1st_quarter']; ?>">
    		
    				<label>2nd Quarter</label>
    				<input type="number" name="twoQ" value="<?php echo $rowTeams['2nd_quarter']; ?>">

    				<label>3rd Quarter</label>
    				<input type="number" name="threeQ" value="<?php echo $rowTeams['3rd_quarter']; ?>">

    				<label>4th Quarter</label>
    				<input type="number" name="fourQ" value="<?php echo $rowTeams['4th_quarter']; ?>">

    				<br><br>
<!-- use to route back to specific event_idno -->
  <input type="hidden" name="eventId" value="<?php echo $eventId; ?>">
    				<input type="submit" name="btnSaveScore" value="Save" class="btn btn-outline-primary">
    			</form>



  				</div>
			</div>

	<?php endwhile; ?>
 </div>
  
  </body>
  </html>
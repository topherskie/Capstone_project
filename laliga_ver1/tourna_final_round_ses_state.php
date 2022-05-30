<?php include 'inc/header_login_state.php'; ?>
<?php 	
// echo  $sesIdno . "<BR>";
//   echo $sesUser . "<BR>";;
//   echo  $sesUserType . "<BR>";
//   echo $sesFname;
//   echo $sesLname;
  $event_idnos = '';

  if($_GET['eventId']) {
    $event_idnos = $_GET['eventId'];
  }
  $event_idnos;

//   echo  $event_idnos;

// session from tournament_bracket_ses_state.php



$teamsInfo = [];
$sqlGetallTeamId = "SELECT * FROM teams WHERE event_idno='$event_idnos'";
$queryTeamId = mysqli_query($conn, $sqlGetallTeamId);

while($rowTeamId = mysqli_fetch_assoc($queryTeamId)) {
  array_push($teamsInfo, $rowTeamId['team_id']);
}



 $team1 = $teamsInfo[0];
 $team2 = $teamsInfo[1]; 
 $team3 = $teamsInfo[2];
 $team4 = $teamsInfo[3];

echo $team1;




// team 1
$sqlTeam1 = "SELECT * FROM teams WHERE team_id='$team1'";
$sqlQueryTeam1 = mysqli_query($conn, $sqlTeam1);
$sqlResultTeam1 = mysqli_fetch_assoc($sqlQueryTeam1);
$totalScoreTeam1 = $sqlResultTeam1['1st_quarter'] + $sqlResultTeam1['2nd_quarter'] + $sqlResultTeam1['3rd_quarter'] + $sqlResultTeam1['4th_quarter'];
$resultTeam1 = $sqlResultTeam1['event_idno'];
$resultTeamLogo1 = $sqlResultTeam1['team_logo'];
$teamName1 = $sqlResultTeam1['team_name'];

echo "<br>";

$sqlTeam2 = "SELECT * FROM teams WHERE team_id='$team2'";
$sqlQueryTeam2 = mysqli_query($conn, $sqlTeam2);
$sqlResultTeam2 = mysqli_fetch_assoc($sqlQueryTeam2);
$resultTeam2 = $sqlResultTeam2['event_idno'];
$resultTeamLogo2 = $sqlResultTeam2['team_logo'];
$totalScoreTeam2 = $sqlResultTeam2['1st_quarter'] + $sqlResultTeam2['2nd_quarter'] + $sqlResultTeam2['3rd_quarter'] + $sqlResultTeam2['4th_quarter'];
$teamName2 = $sqlResultTeam2['team_name'];

echo "<br>";

$sqlTeam3 = "SELECT * FROM teams WHERE team_id='$team3'";
$sqlQueryTeam3 = mysqli_query($conn, $sqlTeam3);
$sqlResultTeam3 = mysqli_fetch_assoc($sqlQueryTeam3);
$totalScoreTeam3 = $sqlResultTeam3['1st_quarter'] + $sqlResultTeam3['2nd_quarter'] + $sqlResultTeam3['3rd_quarter'] + $sqlResultTeam3['4th_quarter'];
$resultTeam3 = $sqlResultTeam3['event_idno'];
$resultTeamLogo3 = $sqlResultTeam3['team_logo'];
$teamName3 = $sqlResultTeam3['team_name'];


echo "<br>";

$sqlTeam4 = "SELECT * FROM teams WHERE team_id='$team4'";
$sqlQueryTeam4 = mysqli_query($conn, $sqlTeam4);
$sqlResultTeam4 = mysqli_fetch_assoc($sqlQueryTeam4);
$totalScoreTeam4 = $sqlResultTeam4['1st_quarter'] + $sqlResultTeam4['2nd_quarter'] + $sqlResultTeam4['3rd_quarter'] + $sqlResultTeam4['4th_quarter'];
$resultTeam4 = $sqlResultTeam4['event_idno'];
$resultTeamLogo4 = $sqlResultTeam4['team_logo'];
$teamName4 = $sqlResultTeam4['team_name'];

 

// check the scores here
// test 1
if($totalScoreTeam1 < $totalScoreTeam2) {
  echo "Team " . $sqlResultTeam2['team_name'] . ' defeated ' . $sqlResultTeam1['team_name'];

  $checkTeamExist2 = "SELECT * FROM team_finals WHERE tf_name='$teamName2'";
  $checkQuery2 = mysqli_query($conn, $checkTeamExist2);
  $checkTeam2 = mysqli_num_rows($checkQuery2);

  // check first if data exist
  if($checkTeam2 > 0) {
    echo "data exist";
  } else {
    $insertWinner2 = "INSERT INTO team_finals (event_idno, tf_name, tf_logo) VALUES('$resultTeam2', '$teamName2', '$resultTeamLogo2')";
  $queryWinner2 = mysqli_query($conn, $insertWinner2);
  }




} else if($totalScoreTeam2 < $totalScoreTeam1) {
  echo "Team " . $sqlResultTeam1['team_name'] . ' defeated ' . $sqlResultTeam2['team_name'];

  $checkTeamExist1 = "SELECT * FROM team_finals WHERE tf_name='$teamName1'";
  $checkQuery1 = mysqli_query($conn, $checkTeamExist1);
  $checkTeam1 = mysqli_num_rows($checkQuery1);

    // check first if data exist
  if($checkTeam1 > 0) {
    echo "data exist";
  } else {
   $insertWinner1 = "INSERT INTO team_finals (event_idno, tf_name, tf_logo) VALUES('$resultTeam1', '$teamName1', '$resultTeamLogo1')";
  $queryWinner1 = mysqli_query($conn, $insertWinner1);
  }

} 


echo "<br>";


// test 2
if($totalScoreTeam3 < $totalScoreTeam4) {
    
    $checkTeamExist4 = "SELECT * FROM team_finals WHERE tf_name='$teamName4'";
  $checkQuery4 = mysqli_query($conn, $checkTeamExist4);
  $checkTeam4 = mysqli_num_rows($checkQuery4);

   if($checkTeam4 > 0) {
    echo "data exist";
  } else {
   $insertWinner4 = "INSERT INTO team_finals (event_idno, tf_name, tf_logo) VALUES('$resultTeam4', '$teamName4', '$resultTeamLogo4')";
  $queryWinner4 = mysqli_query($conn, $insertWinner4);
  }


} else if($totalScoreTeam4 < $totalScoreTeam3) {
  echo "Team " . $sqlResultTeam3['team_name'] . ' defeated ' . $sqlResultTeam4['team_name'];

    $checkTeamExist3 = "SELECT * FROM team_finals WHERE tf_name='$teamName3'";
  $checkQuery3 = mysqli_query($conn, $checkTeamExist3);
  $checkTeam3 = mysqli_num_rows($checkQuery3);

   if($checkTeam3 > 0) {
    echo "data exist";
  } else {
   $insertWinner3 = "INSERT INTO team_finals (event_idno, tf_name, tf_logo) VALUES('$resultTeam3', '$teamName3', '$resultTeamLogo3')";
  $queryWinner3 = mysqli_query($conn, $insertWinner3);
  }

} 



// $query all from team_finals 
$sqlFinalTeams = "SELECT * FROM team_finals WHERE event_idno='$event_idnos'";
$sqlQueryData = mysqli_query($conn, $sqlFinalTeams);




// update scores
if(isset($_POST['btnSubmitFs'])) {
$tfIdno = $_POST['tfIdno'];
$oneTf = $_POST['oneTf'];
$twoTf = $_POST['twoTf'];
$threeTf = $_POST['threeTf'];
$fourTf = $_POST['fourTf'];

$updateFinalScores = "UPDATE team_finals SET one_score='$oneTf', two_score='$twoTf', three_score='$threeTf',
four_score='$fourTf' WHERE tf_idno='$tfIdno'";

$updateQueryScores = mysqli_query($conn, $updateFinalScores);



} // END OF btnSubmitFs


// $event_idnos 

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Final Round</title>
  <style type="text/css">
   * {
  box-sizing: border-box;
  }

.teams-main-container {
  display: flex;
}

.child-card {
        width: 50%;
        text-align: center;
      }

.img-logo {
          height: 50%;
          width: 100%;
      }

.card-container {
  margin: 8px;
  text-align: center;
}

.form-css {
  width: 50%;
  margin: auto;
}

.anal-container {
  text-align: center;
}


/* Create two equal columns that floats next to each other */
 .fr-container {
        text-align: center;
        color: green;
       
        width: 50%;
        margin: auto;
      }

    .img-logo {
          height: 40%;
          width: 100%;
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

      .img-logo {
          height: 40%;
          width: 100%;
      }

    }

  </style>
</head>
<body>

  <div class="fr-container">
    <h4>Final Round</h4>
  </div>

event_idnos
 <div class="anal-container">
  <a href="<?php echo "calcLoaderFinal_score_ses_state.php?eventId=".$event_idnos; ?>" class="btn btn-outline-success">Save Winner</a>
</div>
<br>

<div class="teams-main-container">

  <?php while($rowFinalTeams = $sqlQueryData->fetch_assoc()): ?>

      <div class="card child-card">
      <img class="card-img-top img-logo" src="<?php echo "team_logo/".$rowFinalTeams['tf_logo']; ?>" alt="Card image cap">
        <div class="card-body">
            <div>Total Score: <?php  echo $rowFinalTeams['one_score'] + $rowFinalTeams['two_score'] + $rowFinalTeams['three_score'] + $rowFinalTeams['four_score']; ?></div>
            <form class="form-control form-css" method="POST" action="tour_final_update_ses_state.php">
              <input type="hidden" name="tfIdno" value="<?php echo $rowFinalTeams['tf_idno']; ?>">
              <label>1st Quarter</label>
              <input type="number"  min="0" name="oneTf" value="<?php echo $rowFinalTeams['one_score']; ?>" class="form-control">

              <label>2nd Quarter</label>
              <input type="number"  min="0" name="twoTf" value="<?php echo $rowFinalTeams['two_score']; ?>" class="form-control">


              <label>3rd Quarter</label>
              <input type="number"  min="0" name="threeTf" value="<?php echo $rowFinalTeams['three_score']; ?>" class="form-control">


              <label>4th Quarter</label>
              <input type="number"  min="0" name="fourTf" value="<?php echo $rowFinalTeams['four_score']; ?>" class="form-control">

              <br>

              <!-- use to track the event -->
              <input type="hidden" name="eventId" value="<?php echo $event_idnos; ?>">
              <input type="submit" name="btnSubmitFs" value="Save" class="btn btn-outline-primary"> 

            </form>


          </div>
      </div>



<?php endwhile; ?>

</div>
  

</body>
</html>
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


$arrayFinalScore = [];
$selectFinalsScore = "SELECT * FROM team_finals WHERE event_idno='$event_idnos'";
$sqlFinalScoreQuery = mysqli_query($conn, $selectFinalsScore);

while($rowTeamIdno = $sqlFinalScoreQuery->fetch_assoc()) {
    array_push($arrayFinalScore, $rowTeamIdno['tf_idno']);
}

echo "<br>";
$arrayFs1 = $arrayFinalScore[0];
echo "<br>";
$arrayFs2 = $arrayFinalScore[1];


// 1st  
$totalFinalPoints1 = 0;
$selectTeam1 = "SELECT * FROM team_finals WHERE tf_idno='$arrayFs1'";
$queryTeam1 = mysqli_query($conn, $selectTeam1);
$resultTeam1 = mysqli_fetch_assoc($queryTeam1);
$totalFinalPoints1 = $resultTeam1['one_score'] + $resultTeam1['two_score'] + $resultTeam1['three_score'] + $resultTeam1['four_score'];
echo $resultTeam1['tf_name'];
$tfIdno1 = $resultTeam1['tf_idno'];

echo $totalFinalPoints1;

echo "<br>";


// 2nd 
$totalFinalPoints2 = 0;
$selectTeam2 = "SELECT * FROM team_finals WHERE tf_idno='$arrayFs2'";
$queryTeam2 = mysqli_query($conn, $selectTeam2);
$resultTeam2 = mysqli_fetch_assoc($queryTeam2);
$totalFinalPoints2 = $resultTeam2['one_score'] + $resultTeam2['two_score'] + $resultTeam2['three_score'] + $resultTeam2['four_score'];
echo $resultTeam2['tf_name'];
$tfIdno2 = $resultTeam2['tf_idno'];



echo $totalFinalPoints2;


// compare data 
if($totalFinalPoints1 < $totalFinalPoints2) {
  $win2 = "Win";
  $lose1 = "Lose";
  $updateFinalScores2 = "UPDATE team_finals SET tf_finalScore='$totalFinalPoints2', game_result='$win2' WHERE tf_idno='$tfIdno2'";
  $resultUpdateFinalScores2 = mysqli_query($conn, $updateFinalScores2);


  $updateFinalScores1 = "UPDATE team_finals SET tf_finalScore='$totalFinalPoints1', game_result='$lose1' WHERE tf_idno='$tfIdno1'";
  $resultUpdateFinalScores1 = mysqli_query($conn, $updateFinalScores1);

} else if($totalFinalPoints1 > $totalFinalPoints2) {
  $win1 = "Win";
  $lose2 = "Lose";
  $updateFinalScores1 = "UPDATE team_finals SET tf_finalScore='$totalFinalPoints1', game_result='$win1' WHERE tf_idno='$tfIdno1'";
  $resultUpdateFinalScores1 = mysqli_query($conn, $updateFinalScores1);


  $updateFinalScores2 = "UPDATE team_finals SET tf_finalScore='$totalFinalPoints2', game_result='$lose2' WHERE tf_idno='$tfIdno2'";
  $resultUpdateFinalScores2 = mysqli_query($conn, $updateFinalScores2);

}




// UPDATE THE GAME STATUS TO FINISHED
$gameStatEnd = "Finished";
$updateGameStatus = "UPDATE promote_tournament SET promo_status='$gameStatEnd' WHERE event_idno='$event_idnos'";


if ($conn->query($updateGameStatus) === TRUE) {
  //echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Final Calculation</title>
  <style type="text/css">
  *{padding:0;margin:0}.wrapper{height:100vh;display:flex;justify-content:center;align-items:center; }.checkmark__circle{stroke-dasharray: 166;stroke-dashoffset: 166;stroke-width: 2;stroke-miterlimit: 10;stroke: #7ac142;fill: none;animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards}.checkmark{width: 56px;height: 56px;border-radius: 50%;display: block;stroke-width: 2;stroke: #fff;stroke-miterlimit: 10;margin: 10% auto;box-shadow: inset 0px 0px 0px #7ac142;animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both}.checkmark__check{transform-origin: 50% 50%;stroke-dasharray: 48;stroke-dashoffset: 48;animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards}@keyframes stroke{100%{stroke-dashoffset: 0}}@keyframes scale{0%, 100%{transform: none}50%{transform: scale3d(1.1, 1.1, 1)}}@keyframes fill{100%{box-shadow: inset 0px 0px 0px 30px #7ac142}}
  </style>
</head>
<body>

<?php echo $event_idnos; ?>


<div class="wrapper"> <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"> <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/> <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
</svg>
</div>





<script type="text/javascript">
const eventId = "<?php echo $event_idnos; ?>";



  setTimeout(function() {
    window.location.href = `tourna_final_round_ses_state.php?eventId=${eventId}`;
  }, 3000);
</script>
</body>
</html>




<!-- 

*remove all event name on basketball_teams so teams can rejoin another tournament after the game.
perform a delete query on basketball_teams table base on event_name.
 -->
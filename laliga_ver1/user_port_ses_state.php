
<?php include 'inc/header_login_state.php'; ?>
<?php 
  
  // echo  $sesIdno . "<BR>";
  // echo $sesUser . "<BR>";;
  // echo  $sesUserType . "<BR>";
  // echo $sesFname;
  // echo $sesLname;


  $sqlGetData = "SELECT * FROM player_stats WHERE user_idnoStats='$sesIdno'";
$sqlQuery = mysqli_query($conn, $sqlGetData);
$sqlCheckDataUsers = mysqli_num_rows($sqlQuery);

if($sqlCheckDataUsers <= 0) {
  echo 'No stats yet!';
} else {

  $sqlGetData = "SELECT * FROM player_stats WHERE user_idnoStats='$sesIdno'";
  $sqlQueryStatsUser = mysqli_query($conn, $sqlGetData);

}


// SELECT SUM(stat_pts) FROM player_stats WHERE stat_idno = 14;
// total points
$sqlTotalPoints = "SELECT SUM(stat_pts) AS total_points FROM player_stats WHERE user_idnoStats ='$sesIdno'";
$sqlQuerySelect = mysqli_query($conn, $sqlTotalPoints);
$checkDataTotalPoints = mysqli_num_rows($sqlQuerySelect);

$playerTotalPoints = '';
if($checkDataTotalPoints <= 0) {

  echo 'no total points yet';

}else {
$sqlTotalPoints = "SELECT SUM(stat_pts) AS total_points FROM player_stats WHERE user_idnoStats ='$sesIdno'";
$sqlQuerySelect = mysqli_query($conn, $sqlTotalPoints);
$playerTotalPoints = mysqli_fetch_assoc($sqlQuerySelect);

// echo $playerTotalPoints['total_points'];

} // end of total points




// TOTAL THE ROWS
$sqlToTalRow = "SELECT COUNT(user_idnoStats) AS total_rows FROM player_stats WHERE user_idnoStats='$sesIdno'";
$sqlQuerySelectCount = mysqli_query($conn, $sqlToTalRow);
$sqlCheckRowsCount = mysqli_num_rows($sqlQuerySelectCount);
$sqlResultSelectCountRows = '';

if($sqlCheckRowsCount <= 0) {
  echo 'no total row yet';
} else {

$sqlToTalRow = "SELECT COUNT(user_idnoStats) AS total_rows FROM player_stats WHERE user_idnoStats='$sesIdno'";
$sqlQuerySelectCount = mysqli_query($conn, $sqlToTalRow);
$sqlResultSelectCountRows = mysqli_fetch_assoc($sqlQuerySelectCount);

// echo "<br>";
// echo $sqlResultSelectCountRows['total_rows'];
// echo "<br>";

} // END OF COUNT ROWS

$resultTotalPoints = 0;
$resultTotalPoints = $playerTotalPoints['total_points']; 
$resultRowCount = 0;
$resultRowCount = $sqlResultSelectCountRows['total_rows'];

$sums = '';

if(empty($resultRowCount)) {
	$sums;
} else {
$sums = $resultTotalPoints / $resultRowCount;
}


?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Portfolio</title>
  <style type="text/css">
  	.main-score-container {
  		border:  5px solid #0AA1DD;
  		text-align: center;
  		width: 50%;
  		margin: auto;
  		padding: 8px;
  		border-radius: 0.6em;
  	}
  </style>
</head>
<body>

  <div class="main-score-container">
    <div><h4>Total pts made: <?php echo $resultTotalPoints; ?></h4></div>
    <div><h4>Total Pts Average: <?php echo round($sums, 2); ?></h4></div>
     <div>
    <a href="profile_ses_state.php" class="btn btn-outline-primary">Profile</a>
  </div>
  </div>
  <div class="container"  style="overflow-x: auto;">
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col-sm-">PLAYER NAME</th>
      <th scope="col-sm-">PTS</th>
      <th scope="col-sm-">REB</th>
      <th scope="col-sm-">AST</th>
      <th scope="col-sm-">TOV</th>
      <th scope="col-sm-">STL</th>
      <th scope="col-sm-">BLK</th>
      <th scope="col-sm-">Round games</th>
      <th scope="col-sm-">Event name</th>
      <th scope="col-sm-">Event type</th>
      <th scope="col-sm-">Event start</th>
      <th scope="col-sm-">Game award</th>
    </tr>
  </thead>

  <tbody>
<?php while($rowStatsUser = $sqlQuery->fetch_assoc()): ?>
    <tr>
       <td><?php echo $rowStatsUser['player_name']; ?></td>
      <td><?php echo $rowStatsUser['stat_pts']; ?></td>
      <td><?php echo $rowStatsUser['stat_reb']; ?></td>
      <td><?php echo $rowStatsUser['stat_ast']; ?></td>
      <td><?php echo $rowStatsUser['stat_tov']; ?></td>
      <td><?php echo $rowStatsUser['stat_stl']; ?></td>
      <td><?php echo $rowStatsUser['stat_blk']; ?></td>
      <td><?php echo $rowStatsUser['round_games']; ?></td>
      <td><?php echo $rowStatsUser['event_name']; ?></td>
      <td><?php echo $rowStatsUser['event_gameType']; ?></td>
      <td><?php echo $rowStatsUser['event_date']; ?></td>
       <td><?php echo $rowStatsUser['game_award']; ?></td>
    </tr>
<?php endwhile; ?>
  </tbody>
</table>
  </div>

<?php include 'inc/footer.php'; ?>
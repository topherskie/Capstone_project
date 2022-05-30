<?php include 'inc/header_login_state.php'; ?>
<?php include 'player_stat_del_ses_state.php'; ?>
<?php
  echo  $sesIdno . "<BR>";
 //  echo $sesUser . "<BR>";;
 //  echo  $sesUserType . "<BR>";
 //  echo $sesFname;
 //  echo $sesLname;

  //   $eventSession = $_SESSION['event_name'];
  // $eventGameTypeSession = $_SESSION['event_gametype'];
  // $event_idnoSession = $_SESSION['event_idno'];

// $eventDate = '';
// // query the event date
// $getEventStart = "SELECT * FROM promote_tournament WHERE event_idno='$event_idnoSession'";
// $queryEventStart = mysqli_query($conn, $getEventStart);
// $eventStartResult = mysqli_fetch_assoc($queryEventStart);

//$eventDate = $eventStartResult['event_start'];

$playerIdno = '';
$txtPlayerNameStats = '';
if(isset($_GET['btnStats'])) {
    $playerIdno = $_GET['txtPlayerIdnoStats'];
    $txtPlayerNameStats = $_GET['txtPlayerNameStats'];

   echo $playerIdno;
}



   $playerIdno;



// INSERT DATA TO THE PLAYER STATS
if(isset($_POST['btnSaveStats'])) {

$statPts = $_POST['statPts'];
$statReb = $_POST['statReb'];
$statAst = $_POST['statAst'];
$statTov = $_POST['statTov'];
$statStl = $_POST['statStl'];
$statBlk = $_POST['statBlk'];
$statGa = $_POST['gameAward'];
$roundGames = $_POST['roundGames'];

$eventType = $_POST['eventType'];
$eventName = $_POST['eventName'];
$eventDateStart = $_POST['eventDateStart'];

$sqlInsertPlayerStats = "INSERT INTO player_stats (user_idnoStats, player_name, stat_pts, stat_reb, stat_ast, stat_tov, stat_stl, stat_blk, round_games, game_award, event_name, event_gameType, event_date) VALUES ('$playerIdno', '$txtPlayerNameStats', '$statPts', '$statReb', '$statAst', '$statTov', '$statStl', '$statBlk', '$roundGames', '$statGa', '$eventName', '$eventType', '$eventDateStart')";
    


if ($conn->query($sqlInsertPlayerStats) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sqlInsertPlayerStats . "<br>" . $conn->error;
}

} // END OF INSERT DATA




// render data from database
$sqlRenderStats = "SELECT * FROM player_stats WHERE user_idnoStats = '$playerIdno'";
$sqlQueryRowStats = mysqli_query($conn, $sqlRenderStats);
$sqlCheckRowStats = mysqli_num_rows($sqlQueryRowStats);


if($sqlCheckRowStats <= 0) {
    echo 'No stats yet for the player.';
} else {
$sqlRenderStats = "SELECT * FROM player_stats WHERE user_idnoStats = '$playerIdno'";
$sqlQueryRowStats = mysqli_query($conn, $sqlRenderStats);

}


// query the current user base on GET to retrieve the IMAGE
$sqlImgCheck = "SELECT * FROM user WHERE user_idno='$playerIdno'";
$sqlQueryUser = mysqli_query($conn, $sqlImgCheck);
$sqlCheckData = mysqli_num_rows($sqlQueryUser);

$checkUserImgResult = '';
if($sqlCheckData <= 0) {
    echo 'no data yet';
} else {
    $sqlImgCheck = "SELECT * FROM user WHERE user_idno='$playerIdno'";
    $sqlQueryUser = mysqli_query($conn, $sqlImgCheck);
    $checkUserImgResult = mysqli_fetch_assoc($sqlQueryUser);
}





// QUERY PROMOTOURNAMMENT BASE ON user idno to get the event type, promo, event start. for GAME TYPE
$sqlCheckPromoGameType = "SELECT * FROM promote_tournament WHERE user_idno='$sesIdno'";
$sqlQueryPromo = mysqli_query($conn, $sqlCheckPromoGameType);


// FOR EVENT NAME
$sqlCheckPromoEventName = "SELECT * FROM promote_tournament WHERE user_idno='$sesIdno'";
$sqlQueryEventName = mysqli_query($conn, $sqlCheckPromoEventName);


// GET EVENT START
$sqlCheckPromoEventDateStart = "SELECT * FROM promote_tournament WHERE user_idno='$sesIdno'";
$sqlQueryEventDateStart = mysqli_query($conn, $sqlCheckPromoEventDateStart);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Player Stats</title>
    <style type="text/css">
        .stats-main-container {
            width:  50%;
            margin: auto;
        }

        .container {
            width:  80%;
            margin: auto; 
        }

        .img-circle-user {
            border-radius: 50%;
            width: 80%;
        }

        .pl-stats-container {
            text-align: center;
        }
    </style>
</head>
<body>
 
 <div class="pl-stats-container">
    <h4>Player Stats Per Game</h4>
</div>

    



<div class="stats-main-container">
    <form method="POST" action="">
        <input type="number" name="statPts" placeholder="enter player points" class="form-control">
        <br>
        <input type="number" name="statReb" placeholder="enter player rebounds" class="form-control">
        <br>
        <select name="roundGames" class="form-control">
            <option value="1st Game">1st Round</option>
            <option value="2nd Game">2nd Round</option>
            <option value="3rd Game">3rd Round</option>
            <option value="Final Game">Final Round</option>
        </select>

        <br>

         <select name="gameAward" class="form-control">
            <option value="None">None</option>
            <option value="MVP">MVP</option>
            <option value="Rising Star">Rising Star</option>
            <option value="Most Defensive Player">Most Defensive Player</option>
            <option value="Most Offensive Player">Most Offensive Player</option>
        </select>
        <br>

        <select name="eventType" class="form-control">
            <?php while($rowEventType = $sqlQueryPromo->fetch_assoc()): ?>
             <option value="<?php echo $rowEventType['event_gametype']; ?>"><?php echo $rowEventType['event_gametype']; ?></option>
            <?php endwhile; ?>
        </select>


         <br>

        <select name="eventName" class="form-control">
            <?php while($rowEventName = $sqlQueryEventName->fetch_assoc()): ?>
             <option value="<?php echo $rowEventName['event_name']; ?>"><?php echo $rowEventName['event_name']; ?></option>
            <?php endwhile; ?>
        </select>

         <br>

        <select name="eventDateStart" class="form-control">
            <?php while($rowEventDateStart = $sqlQueryEventDateStart->fetch_assoc()): ?>
             <option value="<?php echo $rowEventDateStart['event_start']; ?>"><?php echo $rowEventDateStart['event_start']; ?></option>
            <?php endwhile; ?>
        </select>


        <br>
        <input type="number" name="statAst" placeholder="enter player assists" class="form-control">
        <br>
        <input type="number" name="statTov" placeholder="enter player turnovers" class="form-control">
        <br>
        <input type="number" name="statStl" placeholder="enter player steals" class="form-control">
        <br>
        <input type="number" name="statBlk" placeholder="enter player blocks" class="form-control">
        <br>

        <input type="submit" name="btnSaveStats" value="Save player Stats" class="btn btn-outline-primary">
    </form>
</div>



<div class="container" style="overflow-x: auto;">

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col-sm-">
      PLAYER ID
  </th>
      <th scope="col-sm-">PLAYER NAME</th>
      <th scope="col-sm-">PTS</th>
      <th scope="col-sm-">REB</th>
      <th scope="col-sm-">AST</th>
      <th scope="col-sm-">TOV</th>
      <th scope="col-sm-">STL</th>
      <th scope="col-sm-">BLK</th>
      <th scope="col-sm-">Round games</th>
      <th scope="col-sm-">Event name</th>
    <th scope="col-sm-">Game award</th>
      <th scope="col-sm-">Event type</th>
      <th scope="col-sm-">Event date</th>
      <th scope="col-sm-">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php while($rowStats = $sqlQueryRowStats->fetch_assoc()): ?>
    <tr>
      <td>
       <div>
            <img src="<?php echo 'img_profiles/'.$checkUserImgResult['img_profile']; ?>" class="img-circle-user">
       </div>
        <?php echo $rowStats['user_idnoStats']; ?></td>
      <td><?php echo $rowStats['player_name']; ?></td>
      <td><?php echo $rowStats['stat_pts']; ?></td>
      <td><?php echo $rowStats['stat_reb']; ?></td>
      <td><?php echo $rowStats['stat_ast']; ?></td>
      <td><?php echo $rowStats['stat_tov']; ?></td>
      <td><?php echo $rowStats['stat_stl']; ?></td>
      <td><?php echo $rowStats['stat_blk']; ?></td>
       <td><?php echo $rowStats['round_games']; ?></td>
      <td><?php echo $rowStats['event_name']; ?></td>
      <td><?php echo $rowStats['game_award']; ?></td>
      <td><?php echo $rowStats['event_gameType']; ?></td>
      <td><?php echo $rowStats['event_date']; ?></td>
      <td>
        
            <form action="" method="POST">
                <input type="hidden" name="txtStatIdno" value="<?php echo $rowStats['stat_idno']; ?>">
                <input type="submit" name="btnDeleteStats" value="X" class="btn btn-outline-primary">
            </form>
            
        </td>
    </tr>
  <?php endwhile; ?>
  </tbody>

</table>
</div>

<h1>helo</h1>






<!-- footer  -->
<?php include 'inc/footer.php'; ?>
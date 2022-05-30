<?php include 'inc/header_login_state.php'; ?>
<?php
 // echo  $sesIdno . "<BR>";
 //  echo $sesUser . "<BR>";;
 //  echo  $sesUserType . "<BR>";
 //  echo $sesFname;
 //  echo $sesLname;
// $eventSession = $_SESSION['event_name'];
//   $eventGameTypeSession = $_SESSION['event_gametype'];
$sqlSelectPlayerTeamsResultsS = '';

if(isset($_GET['btnGetRoster'])) {
    $txtTeam = $_GET['txtTeam'];

$sqlSelectPlayerTeams = "SELECT * FROM recruit_inivites WHERE team='$txtTeam'";
$sqlSelectPlayerTeamsResults = mysqli_query($conn, $sqlSelectPlayerTeams);
$sqlCheckTeamsRows = mysqli_num_rows($sqlSelectPlayerTeamsResults);

if($sqlCheckTeamsRows < 0) {
    echo 'no data yet';
} else {

  $sqlSelectPlayerTeamsS = "SELECT * FROM recruit_inivites WHERE team='$txtTeam'";
$sqlSelectPlayerTeamsResultsS = mysqli_query($conn, $sqlSelectPlayerTeamsS);

}



} // END OF MAIN IF ELSE



?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Tournament</title>
</head>
<body>


<div class="" style="overflow-x: auto;">
 
 <table class="table">
  <thead>
    <tr>    
      <th scope="col">Player Idno:</th>
      <th scope="col">Player name:</th>
      <th scope="col">Player position:</th>
      <th scope="col">Team:</th>
    </tr>
  </thead>
  <?php while($rowTeamsData = $sqlSelectPlayerTeamsResultsS->fetch_assoc()): ?>
  <tbody>
    <tr>
      <td>
        <form action="player_byTeam_stat.php" method="GET">
        
          <input type="hidden" name="txtPlayerIdnoStats" value="<?php echo $rowTeamsData['player_idno']; ?>">
           
           <input type="hidden" name="txtPlayerNameStats" value="<?php echo $rowTeamsData['player_name']; ?>">
          <input type="submit" name="btnStats" value="<?php echo $rowTeamsData['player_idno']; ?>" class="btn btn-outline-success">
        </form>
      </td>
      <td><?php echo $rowTeamsData['player_name']; ?></td>
      <td><?php echo $rowTeamsData['player_position']; ?></td>
      <td><?php echo $rowTeamsData['team']; ?></td>
    </tr>
  </tbody>
<?php endwhile; ?>
</table>   

</div>










<!-- footer  -->
<?php include 'inc/footer.php'; ?>
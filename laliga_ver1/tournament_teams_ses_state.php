<?php include 'inc/header_login_state.php'; ?>
<?php 
 echo  $sesIdno . "<BR>";
  echo $sesUser . "<BR>";;
  echo  $sesUserType . "<BR>";
  echo $sesFname;
  echo $sesLname;
  //$eventSession = $_SESSION['event_name'];
  //$eventGameTypeSession = $_SESSION['event_gametype'];
  //$event_idnoSession = $_SESSION['event_idno'];
// initial state



// sample
$eventType = '';
$eventGameTypeSession = '';
$event_idnoSession = '';
$eventName = '';
if(isset($_GET['btnTeams'])) {
$eventName = $_GET['eventName'];
$eventType = $_GET['eventType'];
$event_idnoSession = $_GET['eventPromoIdno'];
}// dont use session
echo $event_idnoSession;
echo $eventName;
  // INSERT TEAM DATA
if (isset($_POST['btnAddTeams'])) {
      
   $txtEventIdno = $_POST['txtEventIdno'];
    $team1 = trim($_POST['team1']);
    $team2 = trim($_POST['team2']);
    $team3 = trim($_POST['team3']);
    $team4 = trim($_POST['team4']);



    
    $one_quarter = 0;
    $two_quarter = 0;
    $three_quarter = 0;
    $four_quarter = 0;

      $sqlTeams = "INSERT INTO teams (event_idno, team_name, event_name, 1st_quarter, 2nd_quarter, 3rd_quarter, 4th_quarter, event_type, user_idno) VALUES 
      ('$txtEventIdno', '$team1', '$eventName', '$one_quarter', '$two_quarter', '$three_quarter', '$four_quarter', '$eventType', '$sesIdno'),
      ('$txtEventIdno', '$team2', '$eventName', '$one_quarter', '$two_quarter', '$three_quarter', '$four_quarter', '$eventType', '$sesIdno'),
      ('$txtEventIdno', '$team3', '$eventName', '$one_quarter', '$two_quarter', '$three_quarter', '$four_quarter', '$eventType', '$sesIdno'),
      ('$txtEventIdno', '$team4', '$eventName', '$one_quarter', '$two_quarter', '$three_quarter', '$four_quarter', '$eventType', '$sesIdno')";
      

      if ($conn->query($sqlTeams) === TRUE) {
            echo "Team added";

        // TEAM 1    
        $sqlLogo1 = "SELECT * FROM basketball_teams WHERE team_name='$team1'";
        $sqlQueryLogo1 = mysqli_query($conn, $sqlLogo1);
        $sqlResult1 = mysqli_fetch_assoc($sqlQueryLogo1);    
        $addLogoToTeams1 = $sqlResult1['team_logo'];

        
        $sqlUpdateLogo1 = "UPDATE teams SET team_logo='$addLogoToTeams1' WHERE team_name='$team1'";
        $sqlQueryLogoTeams1 = mysqli_query($conn, $sqlUpdateLogo1);



        // TEAM 2
        $sqlLogo2 = "SELECT * FROM basketball_teams WHERE team_name='$team2'";
        $sqlQueryLogo2 = mysqli_query($conn, $sqlLogo2);
        $sqlResult2 = mysqli_fetch_assoc($sqlQueryLogo2);    
        $addLogoToTeams2 = $sqlResult2['team_logo'];

        // team1
        $sqlUpdateLogo2 = "UPDATE teams SET team_logo='$addLogoToTeams2' WHERE team_name='$team2'";
        $sqlQueryLogoTeams2 = mysqli_query($conn, $sqlUpdateLogo2);

        

         // TEAM 3
        $sqlLogo3 = "SELECT * FROM basketball_teams WHERE team_name='$team3'";
        $sqlQueryLogo3 = mysqli_query($conn, $sqlLogo3);
        $sqlResult3 = mysqli_fetch_assoc($sqlQueryLogo3);    
        $addLogoToTeams3 = $sqlResult3['team_logo'];

        // team 3
        $sqlUpdateLogo3 = "UPDATE teams SET team_logo='$addLogoToTeams3' WHERE team_name='$team3'";
        $sqlQueryLogoTeams3 = mysqli_query($conn, $sqlUpdateLogo3);



         // TEAM 4
        $sqlLogo4 = "SELECT * FROM basketball_teams WHERE team_name='$team4'";
        $sqlQueryLogo4 = mysqli_query($conn, $sqlLogo4);
        $sqlResult4 = mysqli_fetch_assoc($sqlQueryLogo4);    
        $addLogoToTeams4 = $sqlResult4['team_logo'];

        // team1
        $sqlUpdateLogo4 = "UPDATE teams SET team_logo='$addLogoToTeams4' WHERE team_name='$team4'";
        $sqlQueryLogoTeams4 = mysqli_query($conn, $sqlUpdateLogo4);








            
      } else {
        echo "Error: " . $sqlTeams . "<br>" . $conn->error;
      
      }

} // END OF TEAM INSERT



// CHECK INFO
//$eventPromoIdno;
$hideTeamInputs = '';
$sqlCheckEventExist = "SELECT * FROM teams WHERE event_idno='$sesIdno'";
$resultCheckEventExist = $conn->query($sqlCheckEventExist);


if ($resultCheckEventExist->num_rows > 0) {
  // output data of each row
  echo "data event idno exist!";
  $hideTeamInputs = 'hideTeamFields';
} else {
  echo "0 results";
}



// QUERY ALL TEAMS  RENDER
$sqlRenderTeams = "SELECT * FROM teams WHERE user_idno='$sesIdno'"; // trial test
$resultRenderTeams = $conn->query($sqlRenderTeams);



// UPDATE PLAYER NAME 
if(isset($_POST['btnEditTeamName'])) {
  $txtTeamIdno = $_POST['txtTeamIdno'];
  $teamEditName = $_POST['teamEditName'];

  $sqlUpdateTeamName ="UPDATE teams SET team_name='$teamEditName' WHERE team_id='$txtTeamIdno'";
  if ($conn->query($sqlUpdateTeamName) === TRUE) {
  header("Location: tournament_teams_confirm_state.php");
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

}




// QUERY TEAMS 
$sqlCheckDataTeamsRender = '';
$sqlJoinTeams = "SELECT * FROM basketball_teams WHERE event_name='$eventName'";
$sqlCheckDataTeams = mysqli_query($conn, $sqlJoinTeams);
$sqlResultTeams = mysqli_num_rows($sqlCheckDataTeams);

if($sqlResultTeams <= 0) {
  echo 'no teams sqlResultTeams';
} else {
  $sqlJoinTeams = "SELECT * FROM basketball_teams WHERE event_name='$eventName'";
  $sqlCheckDataTeamsRender1 = mysqli_query($conn, $sqlJoinTeams);

   $sqlJoinTeams = "SELECT * FROM basketball_teams WHERE event_name='$eventName'";
  $sqlCheckDataTeamsRender2 = mysqli_query($conn, $sqlJoinTeams);

   $sqlJoinTeams = "SELECT * FROM basketball_teams WHERE event_name='$eventName'";
  $sqlCheckDataTeamsRender3 = mysqli_query($conn, $sqlJoinTeams);

   $sqlJoinTeams = "SELECT * FROM basketball_teams WHERE event_name='$eventName'";
  $sqlCheckDataTeamsRender4 = mysqli_query($conn, $sqlJoinTeams);
}


// remove teams 
if(isset($_POST['btnRemove'])) {
$txtTeamIdno = $_POST['txtTeamIdno'];
$sqlDelTeams = "DELETE FROM teams WHERE event_idno='$txtTeamIdno'";
$sqlResultDelTeams = mysqli_query($conn, $sqlDelTeams);

if($sqlRenderTeams == TRUE) {
  header("Location: tournament_ses_state.php");
}

}// END OF BTN REMOVE


?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Teams</title>
    <style type="text/css">
        .main-team-container {
            width:  50%;
            margin: auto;
        }

        .hideTeamFields {
          display:  none;
        }

        .teams-render-container {
          border:  0.2px solid grey;
          width:60%;
            margin: auto;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;
        }

    </style>
</head>
<body>
<div>
    <a href="tournament_ses_state.php">Back</a>
</div>

<h1><?php //echo $eventSession; ?></h1>


<div class="teams-render-container shadow-lg p-3 mb-5 bg-white rounded" style="overflow-x: auto;">

    
    <table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">Team name</th>
      <th scope="col">1st Quarter</th>
      <th scope="col">2nd Quarter</th>
      <th scope="col">3rd Quarter</th>
      <th scope="col">4th Quarter</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
   <?php while($rowTeams = $resultRenderTeams->fetch_assoc()): ?>
  <tbody>
    <tr>
      <th scope="row">
       
     
        <form method="GET" action="teams_tourna_ses_state.php">
          <input type="hidden" name="txtTeam" value="<?php echo $rowTeams['team_name']; ?>">
          <input type="submit" class="btn btn-outline-primary" name="btnGetRoster" value="<?php echo $rowTeams['team_name']; ?>">
        </form>
      </th>
      <td><?php echo $rowTeams['1st_quarter']; ?></td>
      <td><?php echo $rowTeams['2nd_quarter']; ?></td>
      <td><?php echo $rowTeams['3rd_quarter']; ?></td>
      <td><?php echo $rowTeams['4th_quarter']; ?></td>
      <td>
        <!-- <button class="btn btn-primary btnTeamEdit">Remove</button> -->

        <div class="team-edit">
         <form action="tournament_teams_confirm_state.php" method="POST">
            <input type="hidden" name="txtTeamIdno" value="<?php echo $rowTeams['event_idno']; ?>">
            <input type="submit" name="btnRemove" value="X" class="btn btn-primary">
         </form>

        </div>
      </td>
      
    </tr>
    <tr>
     
  <?php endwhile; ?>
</table>
  
  

</div> <!-- end of main container -->



 

<div class="main-team-container <?php echo $hideTeamInputs; ?>">
<form method="POST" action="tournament_teams_ses_state.php">
  <h4>Add team names:</h4>
  <div class="form-group">



      <label class="">Team 1</label>
      <select name="team1" class="form-control">
           <?php while($rowTeams1 = $sqlCheckDataTeamsRender1->fetch_assoc()): ?>
      <option value="<?php echo $rowTeams1['team_name']; ?>"><?php echo $rowTeams1['team_name']; ?></option>
             <?php endwhile; ?> 
      </select>

        <label class="">Team 2</label>
      <select name="team2" class="form-control">
           <?php while($rowTeams2 = $sqlCheckDataTeamsRender2->fetch_assoc()): ?>
      <option value="<?php echo $rowTeams2['team_name']; ?>"><?php echo $rowTeams2['team_name']; ?></option>
             <?php endwhile; ?> 
      </select>

         <label class="">Team 3</label>
      <select name="team3" class="form-control">
           <?php while($rowTeams3 = $sqlCheckDataTeamsRender3->fetch_assoc()): ?>
      <option value="<?php echo $rowTeams3['team_name']; ?>"><?php echo $rowTeams3['team_name']; ?></option>
             <?php endwhile; ?> 
      </select>


         <label class="">Team 4</label>
      <select name="team4" class="form-control">
           <?php while($rowTeams4 = $sqlCheckDataTeamsRender4->fetch_assoc()): ?>
      <option value="<?php echo $rowTeams4['team_name']; ?>"><?php echo $rowTeams4['team_name']; ?></option>
             <?php endwhile; ?> 
      </select>

     


  </div>

  <input type="hidden" name="txtEventIdno" value="<?php echo $event_idnoSession; ?>">
  <input type="submit" name="btnAddTeams" class="btn btn-primary" value="SAVE TEAMS">
</form>

<div>


  <hr>


  <!-- render teams info -->






<script type="text/javascript">
  
 
  const teamEdit = document.querySelectorAll(".team-edit");


 

// $(".team-edit").hide();
//   $(".btnTeamEdit").click(function() {
//     $(".team-edit").toggle();
//   })


</script>

<!-- footer  -->
<?php include 'inc/footer.php'; ?>
<?php 
  
require "configs/db.php";
require "configs/server.php"; 
$sesUserType = $_SESSION['user_type'];
$sesUser = $_SESSION['user_username'];
$sesIdno =  $_SESSION['user_idno'];
$sesFname = $_SESSION['user_fname'];
$sesLname = $_SESSION['user_lname'];

// render data
$sqlRetrieveData = "SELECT * FROM recruit_inivites WHERE recruit_idno='$sesIdno'";
$resultRetrieveData = mysqli_query($conn, $sqlRetrieveData);



// CREATE A TEAM
if(isset($_POST['btnCreateTeam'])) { 
  $txtTeamName = trim($_POST['txtTeamName']);

  //check if user already create a team
  $sqlCheckTeam = "SELECT * FROM recruit_inivites WHERE recruits_idno= '$sesIdno'";
  $resultCheckTeam = $conn->query($sqlCheckTeam);

  if($resultCheckTeam->num_rows > 0) {
    echo 'sorry records already exist';
  } else {

    $sqlInsertNewTeam = "INSERT INTO basketball_teams (recruits_idno, team_name) VALUES('$sesIdno', '$txtTeamName')";

    if ($conn->query($sqlInsertNewTeam) === TRUE) {
      echo "New record created successfully";
      header("Location: profile_ses_state.php");
    }   else {
      echo "Error: " . $sqlInsertNewTeam . "<br>" . $conn->error;
    }


  }

} // END OF MAIN IF ELSE 



// RETRIEVE TEAM 
$resultTeamIdno = '';
$resultTeamName = '';
$sqlRetrieveTeams = "SELECT * FROM basketball_teams WHERE recruits_idno='$sesIdno'";
$resultRetrieveTeams = $conn->query($sqlRetrieveTeams);
if ($resultRetrieveTeams->num_rows > 0) {
   // output data of each row
  $rowTeams = $resultRetrieveTeams->fetch_assoc();
  $resultTeamIdno = $rowTeams['team_idno'];
  $resultTeamName = $rowTeams['team_name'];



} else {
  echo "0 results";
}



// remove player 
if(isset($_POST['btnRemovePlayer'])) {
  $txtRemovePlayerIdno = $_POST['txtRemovePlayerIdno'];
  $sqlRemovePlayer = "DELETE FROM recruit_inivites WHERE player_idno='$txtRemovePlayerIdno'";
  if ($conn->query($sqlRemovePlayer) === TRUE) {
   echo "Record deleted successfully";
    header("Location: profile_ses_state.php");
    } else {
    echo "Error deleting record: " . $conn->error;
  }
}



// ADD PLAYER TO THE TEAM ROSTER
if(isset($_POST['btnAddRoster'])) {
  $txtAddPlayerIdno = $_POST['txtAddPlayerIdno'];
  $txtAddRecruitIdno = $_POST['txtAddRecruitIdno'];
  $sqlUpdatesPlayer = "UPDATE recruit_inivites SET team='$resultTeamName', team_idnos='$resultTeamIdno' WHERE player_idno='$txtAddPlayerIdno' AND recruit_idno='$txtAddRecruitIdno'";
  if ($conn->query($sqlUpdatesPlayer) === TRUE) {
  echo "Record updated successfully";
   header("Location: profile_ses_state.php");
} else {
  echo "Error updating record: " . $conn->error;
}

} // END OF ADD PLAYER IF ELSE



if(isset($_POST['btnRemoveRoster'])) {
  $txtAddPlayerIdno = $_POST['txtAddPlayerIdno'];
  $txtAddRecruitIdno = $_POST['txtAddRecruitIdno'];
  $sqlUpdatesPlayer = "UPDATE recruit_inivites SET team='', team_idnos='' WHERE player_idno='$txtAddPlayerIdno' AND recruit_idno='$txtAddRecruitIdno'";
  if ($conn->query($sqlUpdatesPlayer) === TRUE) {
  echo "Record updated successfully";
   header("Location: profile_ses_state.php");
} else {
  echo "Error updating record: " . $conn->error;
}

} // END OF ADD PLAYER IF ELSE


// QUERY DATA 
$sqlRenderTeamRoster = "SELECT team_name, player_name, player_idno, team_logo  FROM basketball_teams INNER JOIN recruit_inivites ON basketball_teams.team_name = recruit_inivites.team WHERE recruits_idno='$sesIdno'";
$resultRenderTeamRoster = mysqli_query($conn, $sqlRenderTeamRoster);



// remove to roster
if(isset($_POST['removeRoster'])) {
$txtUnsetTeam = $_POST['txtUnsetTeam'];
$data = '';
$sqlRemovePlayerToRoster = "UPDATE recruit_inivites SET team='$data' WHERE player_idno='$txtUnsetTeam'";
$sqlResult = mysqli_query($conn, $sqlRemovePlayerToRoster);
if($sqlResult === TRUE) {
   header("Location: profile_ses_state.php");
}



} // END OF line



// UPDATE THE PLAYER POSITION 
if(isset($_POST['btnPos'])) {
$txtPos = $_POST['txtPos'];
$txtInviteIdno = $_POST['txtInviteIdno'];
$sqlUpdate = "UPDATE recruit_inivites SET player_position='$txtPos' WHERE invite_idno='$txtInviteIdno'";

if (mysqli_query($conn, $sqlUpdate)) {
  echo "Record updated successfully";
  header("Location: profile_ses_state.php");
} else {
  echo "Error updating record: " . mysqli_error($conn);
}


} // END OF BTNPOS




// ADD LOGO TO THE TEAM
if(isset($_POST['btnAddLogo'])) { // use update
  $txtTeamLogo = $_POST['txtTeamLogo']; 
  $filenameLogo = $_FILES["txtTeamLogo"]["name"];
  $tempname = $_FILES["txtTeamLogo"]["tmp_name"];  
  $folder = "team_logo/".$filenameLogo;  

  if(!empty($filenameLogo)) {
    $sqlUpdateAddLogo = "UPDATE basketball_teams SET team_logo='$filenameLogo' WHERE recruits_idno='$sesIdno'";


      if (mysqli_query($conn, $sqlUpdateAddLogo) === TRUE) {
      echo "Record updated successfully";
      header('Location: profile_ses_state.php');
    } else {
      echo "Error updating record: " . $conn->error;
    }

  } else {
    echo 'invalid data info IMAGE';
  }




  
// Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }




} // end of if else




// update team name
if(isset($_POST['btnUpdateTeamName'])) {
$txtCurrentTeamIdno = $_POST['txtCurrentTeamIdno'];
$txtChangeTeamName = $_POST['txtChangeTeamName'];
$updateTeamName = "UPDATE basketball_teams SET team_name='$txtChangeTeamName' WHERE team_idno='$txtCurrentTeamIdno'";

if ($conn->query($updateTeamName) === TRUE) {
  //echo "Record updated successfully";
   header('Location: profile_ses_state.php');
} else {
  echo "Error updating record: " . $conn->error;
}


} // END OF UPDATE TEAM NAME

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>My Team</title>

  <style type="text/css">
   .main-team-container {
     /*border:  2px solid gray;*/
     padding:  7px;
     margin: 8px;
     border-radius: 1em;
     box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
   }

   .child-team-container {
     border:  3px solid #035397;
     padding:  8px;
     border-radius: 1em;
   }

   .child-player-container {
     border:  3px solid #035397;
     padding:  7px;
     border-radius: 1em;
   }

   .team-title {
    color: #143F6B;
   }

   .form-team-container {
    width: 50%;
    margin: auto;
   }

   .team-banner {
    /*border-radius: 50%;*/
    
   }

   img {
     
    width: 6em;
    height: 6em;
   }

   .data-img {
    width: 6em;
    height: 6em;
   }

  </style>
</head>
<body>
<div>
 

<div class="form-team-container">
   <form method="POST" action="myTeam_ses_state.php" class="form-control">

     <input type="text" name="txtTeamName" placeholder="Enter Team name.." required> <!--check first if team name exist -->
     <br>
     <input type="submit" name="btnCreateTeam" class="btn btn-outline-primary" value="Create team">
   </form>   
  </div>



<div class="main-team-container" style="overflow-x: auto;">
  <h4 class="team-title">Current Team Roster:<?php echo $resultTeamName; ?></h4>
  <form class="form-control" enctype="multipart/form-data" action="myTeam_ses_state.php" method="POST">
    <input type="file" name="txtTeamLogo" class="btn btn-outline-primary" required> 
    <input type="submit" name="btnAddLogo" value="Add Team Logo" class="btn btn-outline-primary">
  </form>


<!-- udpate team name curcial yet -->
  <form action="myTeam_ses_state.php" method="POST" class="form-control">
    <input type="hidden" name="txtCurrentTeamIdno" value="<?php echo $resultTeamIdno; ?>">
    <input type="hidden" name="txtChangeTeamName" class="form-group"  placeholder="enter new team name.."required> 
 <input type="hidden" name="btnUpdateTeamName" value="Update team name" class="btn btn-outline-primary">
  </form>



  <br>
  <div class="child-team-container" style="overflow-x: auto;">
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Player ID</th>
      <th scope="col">Player Name</th>
      <th scope="col">Team</th>
      <th>Banner</th>
      <th>Action</th>
    </tr>
  </thead> 

   <?php while($rowDataInfoRoster = $resultRenderTeamRoster->fetch_assoc()): ?>
    <tbody>
        <tr>
           <th scope="row"><?php echo $rowDataInfoRoster['player_idno']; ?></th>
          <td><?php echo $rowDataInfoRoster['player_name']; ?></td>
          <td><?php echo $rowDataInfoRoster['team_name']; ?></td>
          <td>
            <div class="team-banner">
            <object class="data-img" data="<?php echo "team_logo/".$rowDataInfoRoster['team_logo']; ?>">
            <img src="team_logo/defaultTeam_logo.jpg" alt="Team Logo">
            </object>
            </div>
          </td>
          <td>
            <form action="myTeam_ses_state.php" method="POST">
              <input type="hidden" name="txtUnsetTeam" value="<?php echo $rowDataInfoRoster['player_idno']; ?>">
              <input type="submit" name="removeRoster" value="UNSET" class="btn btn-outline-primary">
            </form>
          </td>
        </tr>
    </tbody>
<?php endwhile; ?>

</table>
  </div>



  <br>
  
  <div class="child-player-container" style="overflow-x: auto;"> 
      

      <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Player ID</th>
      <th scope="col">Player Name</th>
      <th scope="col">Invite Status</th>
      <th scope="col">Team</th>
      <th scope="col">Position</th>
      <th scope="col">Action</th>
    </tr>
  </thead>

  <?php while($rowDataInfo = $resultRetrieveData->fetch_assoc()): ?>

   <?php if($rowDataInfo['invite_status'] == 'pending'): ?> 
  <tbody>

    <tr>
      <th scope="row"><?php echo $rowDataInfo['player_idno']; ?></th>
      <td><?php echo $rowDataInfo['player_name']; ?></td>
      <td><?php echo $rowDataInfo['invite_status']; ?></td>
      <td><?php echo $rowDataInfo['team']; ?></td>
      <td><?php echo $rowDataInfo['player_position']; ?></td>
      <td>
        <form action="myTeam_ses_state.php" method="POST">
          
          <br>
          <input type="hidden" name="txtRemovePlayerIdno" value="<?php echo $rowDataInfo['player_idno']; ?>">
          <input type="submit" name="btnRemovePlayer" class="btn btn-outline-primary" value="REMOVE">
        </form>
        <form action="checkBio_player_ses_state.php" method="POST">
          <input type="hidden" name="txtCheckPlayerBio" value="<?php echo $rowDataInfo['player_idno']; ?>">
          <input type="submit" name="btnPlayerBio" class="btn btn-outline-primary" value="Player Bio">
        </form>
      </td>
    </tr>
  </tbody>

<?php elseif($rowDataInfo['invite_status'] == 'accept'): ?>
  <tbody>

    <tr>
      <th scope="row"><?php echo $rowDataInfo['player_idno']; ?></th>
      <td><?php echo $rowDataInfo['player_name']; ?></td>
      <td><?php echo $rowDataInfo['invite_status']; ?></td>
      <td><?php echo $rowDataInfo['team']; ?></td>
      <td>
        <?php echo $rowDataInfo['player_position']; ?>
      </td>
      <td>


        <form method="POST" action="myTeam_ses_state.php">
          <select name="txtPos" class="form-control">
            <option value="Point Guard">Point Guard</option>
            <option value="Shooting Guard">Shooting Guard</option>
            <option value="Power Forward">Power Forward</option>
            <option value="Small Forward">Small Forward</option>
            <option value="Center">Center</option>
            <option value="Guard">Guard</option>
            <option value="Point Forward<">Point Forward</option>
            <option value="Forward">Forward</option>
            <option value="Center">Center</option>
            <option value="Swingman">Swingman</option>
          </select>
 
          <input type="hidden" name="txtInviteIdno" value="<?php echo $rowDataInfo['invite_idno']; ?>">
          <input type="submit" name="btnPos"  value="Player Pos" class="btn btn-outline-primary">
        </form>





        <form action="myTeam_ses_state.php" method="POST">
          <input type="hidden" name="txtAddRecruitIdno" value="<?php echo $rowDataInfo['recruit_idno']; ?>">
           <input type="hidden" name="txtAddPlayerIdno" value="<?php echo $rowDataInfo['player_idno']; ?>">
          <input type="submit" name="btnAddRoster" class="btn btn-outline-primary" value="ROSTER">
         
          <input type="hidden" name="txtRemovePlayerIdno" value="<?php echo $rowDataInfo['player_idno']; ?>">
          <br>
          <input type="submit" name="btnRemovePlayer" class="btn btn-outline-primary" value="REMOVE">
        </form>
       
        <form action="checkBio_player_ses_state.php" method="POST">
          <input type="hidden" name="txtCheckPlayerBio" value="<?php echo $rowDataInfo['player_idno']; ?>">
         
          <input type="submit" name="btnPlayerBio" class="btn btn-outline-primary" value="Player Bio">
        </form>
      </td>
    </tr>
  </tbody>
 <?php endif; ?>

<?php endwhile; ?>

</table>




  </div>
  

</div>



</div>
</body>
</html>
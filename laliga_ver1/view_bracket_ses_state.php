<?php require_once 'inc/header_login_state.php'; ?>
<?php
 // echo  $sesIdno . "<BR>";
 //  echo $sesUser . "<BR>";;
 //  echo  $sesUserType . "<BR>";
 //  echo $sesFname;
 //  echo $sesLname;

   $sesIdno . "<BR>";
  $sesUser . "<BR>";;
    $sesUserType . "<BR>";
   $sesFname;
  $sesLname;

  error_reporting(0);

  $eventId = '';

  if(isset($_GET['eventId'])) {
    $eventId = $_GET['eventId']; 
  }
$eventId;

// render all teams 
  $team1 = '';
  $team2 = '';
  $team3 = '';
  $team4 = '';
  $renderArrayTeam = [];
  $sqlRenderTeamsStat = "SELECT * FROM TEAMS WHERE event_idno='$eventId'";
  $sqlRenderStats = mysqli_query($conn, $sqlRenderTeamsStat);

  while($renderRowsTeam = $sqlRenderStats->fetch_assoc()) {
    array_push($renderArrayTeam, $renderRowsTeam['team_id']);
  }

  $team1 = $renderArrayTeam[0];
  $team2 = $renderArrayTeam[1];
  $team3 = $renderArrayTeam[2];
  $team4 = $renderArrayTeam[3];

  // echo $team1;
  // echo $team2;
  // echo $team3;
  // echo $team4;


// team1
  $teamName1 = '';
  $teamScore1 = 0;

$sqlcheckTeam1 = "SELECT * FROM teams WHERE team_id='$team1'";
$sqlQueryCheckTeam1 = mysqli_query($conn, $sqlcheckTeam1);
$sqlCheckRowTeam1 = mysqli_num_rows($sqlQueryCheckTeam1);

if($sqlCheckRowTeam1 <= 0) {
  echo 'no records yet';
} else {

    $sqlTeam1 = "SELECT * FROM teams WHERE team_id='$team1'";
  $sqlQueryTeam1 = mysqli_query($conn, $sqlTeam1);
  $sqlFetchTeam1 = mysqli_fetch_assoc($sqlQueryTeam1);

  $teamName1 = $sqlFetchTeam1['team_name'];
  $teamScore1 = $sqlFetchTeam1['1st_quarter'] + $sqlFetchTeam1['2nd_quarter'] + $sqlFetchTeam1['3rd_quarter'] + $sqlFetchTeam1['4th_quarter'];

}





// team2
 $teamName2 = '';
 $teamScore2 = 0;

$sqlcheckTeam2 = "SELECT * FROM teams WHERE team_id='$team2'";
$sqlQueryCheckTeam2 = mysqli_query($conn, $sqlcheckTeam2);
$sqlCheckRowTeam2 = mysqli_num_rows($sqlQueryCheckTeam2);

if($sqlCheckRowTeam2 <= 0) {
  echo 'no records yet';
} else {

    $sqlTeam2 = "SELECT * FROM teams WHERE team_id='$team2'";
  $sqlQueryTeam2 = mysqli_query($conn, $sqlTeam2);
  $sqlFetchTeam2 = mysqli_fetch_assoc($sqlQueryTeam2);

  $teamName2 = $sqlFetchTeam2['team_name'];
  $teamScore2 = $sqlFetchTeam2['1st_quarter'] + $sqlFetchTeam2['2nd_quarter'] + $sqlFetchTeam2['3rd_quarter'] + $sqlFetchTeam2['4th_quarter'];

}




// team3
 $teamName3 = '';
 $teamScore3 = 0;

$sqlcheckTeam3 = "SELECT * FROM teams WHERE team_id='$team3'";
$sqlQueryCheckTeam3 = mysqli_query($conn, $sqlcheckTeam3);
$sqlCheckRowTeam3 = mysqli_num_rows($sqlQueryCheckTeam3);

if($sqlCheckRowTeam3 <= 0) {
  echo 'no records yet';
} else {

  $sqlTeam3 = "SELECT * FROM teams WHERE team_id='$team3'";
  $sqlQueryTeam3 = mysqli_query($conn, $sqlTeam3);
  $sqlFetchTeam3 = mysqli_fetch_assoc($sqlQueryTeam3);

  $teamName3 = $sqlFetchTeam3['team_name'];
  $teamScore3 = $sqlFetchTeam3['1st_quarter'] + $sqlFetchTeam3['2nd_quarter'] + $sqlFetchTeam3['3rd_quarter'] + $sqlFetchTeam3['4th_quarter'];

}









  // team4
 $teamName4 = '';
 $teamScore4 = 0;

$sqlcheckTeam4 = "SELECT * FROM teams WHERE team_id='$team4'";
$sqlQueryCheckTeam4 = mysqli_query($conn, $sqlcheckTeam4);
$sqlCheckRowTeam4 = mysqli_num_rows($sqlQueryCheckTeam4);

if($sqlCheckRowTeam4 <= 0) {
  echo 'no records yet';
} else {

  $sqlTeam4 = "SELECT * FROM teams WHERE team_id='$team4'";
  $sqlQueryTeam4 = mysqli_query($conn, $sqlTeam4);
  $sqlFetchTeam4 = mysqli_fetch_assoc($sqlQueryTeam4);

  $teamName4 = $sqlFetchTeam4['team_name'];
  $teamScore4 = $sqlFetchTeam4['1st_quarter'] + $sqlFetchTeam4['2nd_quarter'] + $sqlFetchTeam4['3rd_quarter'] + $sqlFetchTeam4['4th_quarter'];

}







// render finalist scores 
$teamFinal1 = '';
$teamFinal2 = '';
$finalTeamsIdno = [];
$sqlFinals = "SELECT * FROM team_finals WHERE event_idno='$eventId'";
$queryFinalTeams = mysqli_query($conn, $sqlFinals); 
$queryCheckTeamFinals = mysqli_num_rows($queryFinalTeams);

if($queryCheckTeamFinals <= 0) {
  echo "no data";
} else {

  $sqlTeamsFinals = "SELECT * FROM team_finals WHERE event_idno='$eventId'";
  $queryTeams = mysqli_query($conn, $sqlTeamsFinals);

  while($renderRowFinalTeams = $queryTeams->fetch_assoc()) {
    array_push($finalTeamsIdno, $renderRowFinalTeams['tf_idno']);
  }

} // end of if else 

$teamFinal1 =  $finalTeamsIdno[0];
$teamFinal2 =  $finalTeamsIdno[1];




// query upperteam
$tfTeam1 = "";
$tfTotalPoints1 = 0;
$checkFirstTeam1 = "SELECT * FROM team_finals WHERE tf_idno='$teamFinal1'";
$checkQueryFirstTeam1 =  mysqli_query($conn, $checkFirstTeam1);
$resultFirstTeam1 = mysqli_num_rows($checkQueryFirstTeam1);

if($resultFirstTeam1 <= 0) {
  echo "no data yet for finals query team 1";
} else {

  $checkFirstTeamOne = "SELECT * FROM team_finals WHERE tf_idno='$teamFinal1'";
  $checkQueryFirstTeamOne =  mysqli_query($conn, $checkFirstTeamOne);
  $tfTeam1 = mysqli_fetch_assoc($checkQueryFirstTeamOne);

}

//echo $tfTeam1['tf_name'];
$tfTotalPoints1 = $tfTeam1['one_score'] + $tfTeam1['two_score'] + $tfTeam1['three_score'] + $tfTeam1['four_score'];

$tfTotalPoints1;




// query lowerteam
$tfTeam2 = "";
$tfTotalPoints2 = 0;
$checkFirstTeam2 = "SELECT * FROM team_finals WHERE tf_idno='$teamFinal2'";
$checkQueryFirstTeam2 = mysqli_query($conn, $checkFirstTeam2);
$resultFirstTeam2 = mysqli_num_rows($checkQueryFirstTeam2);

if($resultFirstTeam2 <= 0) {
  echo "no data yet for finals query team 1";
} else {

  $checkFirstTeam2 = "SELECT * FROM team_finals WHERE tf_idno='$teamFinal2'";
  $checkQueryFirstTeamTwo =  mysqli_query($conn, $checkFirstTeam2);
  $tfTeam2 = mysqli_fetch_assoc($checkQueryFirstTeamTwo);

}


$tfTeam2['tf_name'];
$tfTotalPoints2 = $tfTeam2['one_score'] + $tfTeam2['two_score'] + $tfTeam2['three_score'] + $tfTeam2['four_score'];

$tfTotalPoints2;





// QUERY THE WINNER OF THE GAME 
$sqlFinalTeamsResult = "SELECT * FROM team_finals WHERE event_idno='$eventId'";
$checkQueryTeamFinals = mysqli_query($conn, $sqlFinalTeamsResult); 











// retrieve all players
$rowRI1 = '';
$rowRI2 = '';
$rowRI3 = '';
$rowRI4 = '';


 $teamName1;
$sqlCheckRecruitInvites1 = "SELECT * FROM recruit_inivites WHERE team='$teamName1'";
$queryRI1 = mysqli_query($conn, $sqlCheckRecruitInvites1);
$checkRI1 = mysqli_num_rows($queryRI1);

if($checkRI1 <= 0) {
  'no data yet';
} else {

  $sqlGetRI1 = "SELECT * FROM recruit_inivites WHERE team='$teamName1'";
  $queryGetRI1 = mysqli_query($conn, $sqlGetRI1); 

}



 $teamName2;
$sqlCheckRecruitInvites2 = "SELECT * FROM recruit_inivites WHERE team='$teamName2'";
$queryRI2 = mysqli_query($conn, $sqlCheckRecruitInvites2);
$checkRI2 = mysqli_num_rows($queryRI2);

if($checkRI2 <= 0) {
  'no data yet';
} else {

  $sqlGetRI2 = "SELECT * FROM recruit_inivites WHERE team='$teamName2'";
  $queryGetRI2 = mysqli_query($conn, $sqlGetRI2); 

}




 $teamName3;
$sqlCheckRecruitInvites3 = "SELECT * FROM recruit_inivites WHERE team='$teamName3'";
$queryRI3 = mysqli_query($conn, $sqlCheckRecruitInvites3);
$checkRI3 = mysqli_num_rows($queryRI3);

if($checkRI3 <= 0) {
  'no data yet';
} else {

  $sqlGetRI3 = "SELECT * FROM recruit_inivites WHERE team='$teamName3'";
  $queryGetRI3 = mysqli_query($conn, $sqlGetRI3); 

}



 $teamName4;
$sqlCheckRecruitInvites4 = "SELECT * FROM recruit_inivites WHERE team='$teamName4'";
$queryRI4 = mysqli_query($conn, $sqlCheckRecruitInvites4);
$checkRI4 = mysqli_num_rows($queryRI4);

if($checkRI4 <= 0) {
  'no data yet';
} else {

  $sqlGetRI4 = "SELECT * FROM recruit_inivites WHERE team='$teamName4'";
  $queryGetRI4 = mysqli_query($conn, $sqlGetRI4); 

}





?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="dist/jquery.bracket.min.js"></script>

<link href="dist/jquery.bracket.min.css" rel="stylesheet">
<style type="text/css">
    .main-bracket-container {
      
       width: 100%;
       margin: auto;
       padding:  30px;
       justify-content: center;
       align-items: center;
       box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;

    }

    .child-demo-container {
       /*border:  2px solid black;*/
      
        width: 30%;
       margin: auto;

    }

    .br-container {
      text-align: center;
    }

    .data-finals-container {
      width: 50%;
      margin: auto;
      box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
    }

    .final-score-color {
      color:  green;
      font-weight: bold;
    }

    .img-team-logo {
     border-radius: 50%;
            width: 70%;

    }


    .render-team-container {
       box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
     display: flex;
    justify-content: center;
    justify-items: center;
    padding: 8px;
    margin: 9px;
    }

    .team-one {
      
       box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
     
    }

    .team-two {
     
        box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
     
    }


    .team-three {
      
        box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
      
    }


    .team-four {
        box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
      
     
    }

    th {
      color: green;
    }



    @media only screen and (max-width: 600px) {
 .child-demo-container {
    width: 100%;
       margin: auto;

  }

  .data-finals-container {
    width: 100%;
    margin: auto;
  }

  .render-team-container {
    width: 100%;
    display: block;
  }
  

} /*end of media queries*/

</style>
</head>
<body>

<div class="main-bracket-container">
  <div class="br-container"><label><h4>Bracket List</h4></label></div>
   <div class="demo child-demo-container">
   </div>
</div>

<br>

<div class="data-finals-container" style="overflow-x: auto;">
 
  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Game Id</th>
      <th scope="col">Team Name</th>
      <th scope="col">1st Quarter</th>
      <th scope="col">2nd Quarter</th>
      <th scope="col">3rd Quarter</th>
      <th scope="col">4th Quarter</th>
      <th scope="col">Final Score</th>
    </tr>
  </thead>
  <tbody>
<?php while($rowFinals = $checkQueryTeamFinals->fetch_assoc()): ?>
    <?php if($rowFinals['tf_finalScore'] == NULL): ?>
      <?php echo 'no data yet game still in progress'; ?>

    <?php elseif($rowFinals['tf_finalScore'] == TRUE): ?>
      <tr>
      <th scope="row">
       <div class=""><img src=" <?php echo "team_logo/".$rowFinals['tf_logo']; ?>" alt="" class="img-team-logo"></div>
        <?php echo $rowFinals['tf_idno']; ?></th>
      <td><?php echo $rowFinals['tf_name']; ?></td>
      <td><?php echo $rowFinals['one_score']; ?></td>
      <td><?php echo $rowFinals['two_score']; ?></td>
      <td><?php echo $rowFinals['three_score']; ?></td>
      <td><?php echo $rowFinals['four_score']; ?></td>
      <td class="final-score-color"><?php echo $rowFinals['tf_finalScore']; ?></td>
    </tr>
    <?php endif; ?>
<?php endwhile; ?>
  </tbody>
</table>


</div>



<div class="render-team-container">

<div class="team-one" style="overflow-x: auto;">
  
  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Team</th>
      <th scope="col">Full</th>
      <th scope="col">Pos</th>
    </tr>
  </thead>
  <tbody>
  <?php while($rowRI1 = $queryGetRI1->fetch_assoc()): ?>
    <tr>
      <th scope="row"><?php echo $rowRI1['player_idno']; ?></th>
      <td><?php echo $rowRI1['team']; ?></td>
       <td><a href="<?php echo "viewPP_ses_state.php?userIdno=".$rowRI1['player_idno']; ?>"><?php echo $rowRI1['player_name']; ?></a></td>
      <td><?php echo $rowRI1['player_position']; ?></td>
    </tr>
  <?php endwhile; ?>
  </tbody>
</table>


</div>



<div class="team-two" style="overflow-x: auto;">
  
  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Team</th>
      <th scope="col">Name</th>
      <th scope="col">Pos</th>
    </tr>
  </thead>
  <tbody>
    <?php while($rowRI2 = $queryGetRI2->fetch_assoc()): ?>
    <tr>
      <th scope="row"><?php echo $rowRI2['player_idno']; ?></th>
      <td><?php echo $rowRI2['team']; ?></td>
      <td><a href="<?php echo "viewPP_ses_state.php?userIdno=".$rowRI2['player_idno']; ?>"><?php echo $rowRI2['player_name']; ?></a></td>
      <td><?php echo $rowRI2['player_position']; ?></td>
    </tr>
  <?php endwhile; ?>
  </tbody>
</table>  


</div>



<div class="team-three" style="overflow-x: auto;">
   
   <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Team</th>
      <th scope="col">Name</th>
      <th scope="col">Pos</th>
    </tr>
  </thead>
  <tbody>
    <?php while($rowRI3 = $queryGetRI3->fetch_assoc()): ?>
    <tr>
      <th scope="row"><?php echo $rowRI3['player_idno']; ?></th>
      <td><?php echo $rowRI3['team']; ?></td>
       <td><a href="<?php echo "viewPP_ses_state.php?userIdno=".$rowRI3['player_idno']; ?>"><?php echo $rowRI3['player_name']; ?></a></td>
      <td><?php echo $rowRI3['player_position']; ?></td>
    </tr>
  <?php endwhile; ?>
  </tbody>
</table> 

</div>



<div class="team-four" style="overflow-x: auto;">

  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Team</th>
      <th scope="col">Name</th>
      <th scope="col">Pos</th>
    </tr>
  </thead>
  <tbody>
     <?php while($rowRI4 = $queryGetRI4->fetch_assoc()): ?>
    <tr>
      <th scope="row"><?php echo $rowRI4['player_idno']; ?></th>
      <td><?php echo $rowRI4['team']; ?></td>
      <td><a href="<?php echo "viewPP_ses_state.php?userIdno=".$rowRI4['player_idno']; ?>"><?php echo $rowRI4['player_name']; ?></a></td>
      <td><?php echo $rowRI4['player_position']; ?></td>
    </tr>
  <?php endwhile; ?>
  </tbody>
</table>
  
</div>


</div>












<script type="text/javascript">
let teamName1 = "<?php echo $teamName1; ?>";
let teamScore1 = "<?php echo $teamScore1; ?>";

let teamName2 = "<?php echo $teamName2; ?>";
let teamScore2 = "<?php echo $teamScore2; ?>";

let teamName3 = "<?php echo $teamName3; ?>";
let teamScore3 = "<?php echo $teamScore3; ?>";

let teamName4 = "<?php echo $teamName4; ?>";
let teamScore4 = "<?php echo $teamScore4; ?>";





// QUERY THE SCORE
let upperTeamPoints1 = "<?php echo $tfTotalPoints1; ?>";
let lowerTeamPoints2 = "<?php echo $tfTotalPoints2; ?>";




console.log(teamName1);
console.log(teamScore1);

    var singleElimination = {
  "teams": [              // Matchups
    [teamName1, teamName2], // First match
    [teamName3, teamName4]  // Second match
  ],
  "results": [            // List of brackets (single elimination, so only one bracket)
    [                     // List of rounds in bracket
      [                   // First round in this bracket
        [parseInt(teamScore1), parseInt(teamScore2)],           // Team 1 vs Team 2
        [parseInt(teamScore3), parseInt(teamScore4)]            // Team 3 vs Team 4
      ],
      [                   // Second (final) round in single elimination bracket
        [parseInt(upperTeamPoints1), parseInt(lowerTeamPoints2)],           // Match for first place
        [0, 0]            // Match for 3rd place
      ]
    ]
  ]
}



$('.demo').bracket({
  init: singleElimination
});
</script>
</body>
</html>
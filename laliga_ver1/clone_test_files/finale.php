<?php include 'inc/header_login_state.php'; ?>

<?php
echo  $sesIdno . "<BR>";
 echo $sesUser . "<BR>";;
 echo  $sesUserType . "<BR>";
 echo $sesFname;
 echo $sesLname;

 
 $newArray = [];
 $eventPromoIdno = '';
 if(isset($_GET['btnStart'])) {
     $eventPromoIdno = $_GET['eventPromoIdno'];

     $sqlRetrieveGame = "SELECT * FROM teams WHERE user_idno='$sesIdno' AND event_idno='$eventPromoIdno'";
     $resultRetrieveGame = $conn->query($sqlRetrieveGame);



    while($rowTeams = mysqli_fetch_assoc($resultRetrieveGame)) {

      array_push($newArray, $rowTeams); 

  }

  $eventPromoIdno;
echo "<br>";
echo $newArray[0]['team_name'];
echo $newArray[0]['team_score'];
echo $newArray[0]['team_id'];
echo "<br>";
echo $newArray[1]['team_name'];
echo $newArray[1]['team_score'];
echo $newArray[1]['team_id'];
echo "<br>";
echo $newArray[2]['team_name'];
echo $newArray[2]['team_score'];
echo $newArray[2]['team_id'];
echo "<br>";
echo $newArray[3]['team_name'];
echo $newArray[3]['team_score'];
echo $newArray[3]['team_id'];



 } // end of main if else




// QUERY THE FINALIST SCORE
$finalScoreArray = [];
$sqlFinalistScore = "SELECT * FROM team_finals WHERE event_idno='$eventPromoIdno'";
$resultFinalistScore = $conn->query($sqlFinalistScore);
while($rowFinalScore = mysqli_fetch_assoc($resultFinalistScore)) {

  array_push($finalScoreArray, $rowFinalScore); 

}
echo $finalScoreArray[0]['final_score'];
echo $finalScoreArray[1]['final_score'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="dist/jquery.bracket.min.js"></script>
    <link href="dist/jquery.bracket.min.css" rel="stylesheet">
    <title>Bracket Testnet</title>
    <style>
* {
  box-sizing: border-box;
}

      .main-bracket-container {
        text-align: center;
        border: 2px solid black;
        padding: 25px;
        margin: 12px;
        display:flex;
        justify-content: center;

      }

      .demo-container {
          border: 2px solid black;
          padding: 12px;
          margin: 6px;
      }

      .demo2-container {
          border: 2px solid black;
          padding: 12px;
          margin: 6px;
      }


      /* RESPONSIVE */
      @media screen and (max-width: 680px) {
  .main-bracket-container {
    display: block;
  }
}

    </style>
</head>
<body>

  <!-- render bracket  -->

   <div class="main-bracket-container">
       <div class="demo demo-container" id="resize">
         <div>
           
         </div>
       </div>
       <div class="demo2-container">
            <label for=""><?php echo $newArray[0]['team_name'];  ?></label>
            <br>
           <input type="number" name="" id="txtScore0" value="" min="0" class="form-control" >
           <br>
           <label for=""><?php echo $newArray[1]['team_name'];  ?></label>
           <br>
           <input type="number" name="" id="txtScore1" value="" min="0" class="form-control" >
           <br>
           <label for=""><?php echo $newArray[2]['team_name'];  ?></label>
           <br>
           <input type="number" name="" id="txtScore2" value="" min="0" class="form-control" >
           <br>
           <label for=""><?php echo $newArray[3]['team_name'];  ?></label>
           <br>
           <input type="number" name="" id="txtScore3" value="" min="0" class="form-control">
            <br><br>
           <button class="btn btn-outline-primary"  id="btnSaveScores">1st Round</button>

           
       </div>

       <div class="demo2-container">
         <form action="tournament_bracket_postFinals_state.php" method="POST">
         <input type="hidden" name="tn0" value="<?php echo $newArray[0]['team_name']; ?>">
         <input type="hidden" name="ts0" value="<?php echo $newArray[0]['team_score']; ?>">

         <input type="hidden" name="tn1" value="<?php echo $newArray[1]['team_name']; ?>">
         <input type="hidden" name="ts1" value="<?php echo $newArray[1]['team_score']; ?>">

         <input type="hidden" name="tn2" value="<?php echo $newArray[2]['team_name']; ?>">
         <input type="hidden" name="ts2" value="<?php echo $newArray[2]['team_score']; ?>">

         <input type="hidden" name="tn3" value="<?php echo $newArray[3]['team_name']; ?>">
         <input type="hidden" name="ts3" value="<?php echo $newArray[3]['team_score']; ?>">
         

       <label for="">Championship round</label>
       <br>
       <input type="hidden" name="eventIdnoF" value="<?php echo $eventPromoIdno; ?>">
       <input type="number" min="0" class="form-control" name="finalScore1" >
       <br>
       <input type="number" min="0" class="form-control"  name="finalScore2">
        <br>
       <input type="submit" class="btn btn-outline-primary"  name="btnFinalRound" value="Final round">
       </form>
       </div>
   </div>




<script type="text/javascript" defer>

  let eventIdno = "<?php echo $eventPromoIdno; ?>"; // to track the event idno
let txtScore0 = document.getElementById("txtScore0");
let txtScore1 = document.getElementById("txtScore1");
let txtScore2 = document.getElementById("txtScore2");
let txtScore3 = document.getElementById("txtScore3");

const btnSaveScores = document.getElementById("btnSaveScores");
const btnFinalRound = document.getElementById("btnFinalRound");

const team0 = "<?php echo $newArray[0]['team_name']; ?>";
const team1 = "<?php echo $newArray[1]['team_name']; ?>";
const team2 = "<?php echo$newArray[2]['team_name']; ?>";
const team3 = "<?php echo$newArray[3]['team_name']; ?>";

let teamScore0 = parseInt("<?php echo $newArray[0]['team_score']; ?>");
let teamScore1 =  parseInt("<?php echo $newArray[1]['team_score']; ?>");
let teamScore2 = parseInt("<?php echo $newArray[2]['team_score']; ?>");
let teamScore3 = parseInt("<?php echo $newArray[3]['team_score']; ?>");

let teamId0 = "<?php echo $newArray[0]['team_id'];  ?>";
let teamId1 = "<?php echo $newArray[1]['team_id'];  ?>";
let teamId2 = "<?php echo $newArray[2]['team_id'];  ?>";
let teamId3 = "<?php echo $newArray[3]['team_id'];  ?>";


// insert into teams or create another for finals
if (teamScore0 > teamScore1) {
  console.log('team score 0: ', teamScore0);
} else if (teamScore1 > teamScore0 ) {
  console.log('team score 1: ', teamScore1);
}


  var singleElimination = {
      teams : [
        [team0, team1], /* first matchup */
        [team2, team3]  /* second matchup */
      ],
      results : [
        [[teamScore0, teamScore1], [teamScore2, teamScore3]],       /* first round */
        [[34, 21], [0, 0]]        /* second round */
      ]
    }


  $(function() {
      $('.demo').bracket({
        init: singleElimination /* data to initialize the bracket with */ })
    })

    // EVENT FUNC 
    btnSaveScores.addEventListener("click", function() {
      console.log(teamId0);
console.log(txtScore0.value);
      $(document).ready(function(){
      $.post("tournament_bracket_post_state.php", {

        team_score0: parseInt(txtScore0.value),
        team_id0: teamId0,
        team_score1: parseInt(txtScore1.value), 
        team_id1: teamId1,
        team_score2: parseInt(txtScore2.value),
        team_id2: teamId2,
        team_score3: parseInt(txtScore3.value),
        team_id3: teamId3

    },
    function(data, status){
     alert("Data: " + data + "\nStatus: " + status);
     window.location.href = `tournament_bracket_ses_state.php?eventPromoIdno=${eventIdno}&btnStart=Start`;
    });

  }); // END OF JQUERTY FUNC


    }); // end of btnSaveScores








</script>

<?php include 'inc/footer.php'; ?>
